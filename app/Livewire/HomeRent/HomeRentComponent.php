<?php

namespace App\Livewire\HomeRent;

use App\Models\Access;
use App\Models\Address;
use App\Models\Home;
use App\Models\Municipality;
use App\Models\Province;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithFileUploads;

class HomeRentComponent extends Component
{
    use WithFileUploads;

    public $edit;
    public $home_id;
    public $title;
    public $description;
    public $price;
    public $photo;
    public $owner;
    public $responsible;
    public $access_id;
    public $province_id;
    public $municipality_id;
    public $address_id;
    public $photoUrl;
    public $addressDesc;
    public $municipaltyDesc;
    public $municipalities = [];
    public $addresses = [];

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|min:0',
        'photo' => 'nullable|image',
        'owner' => 'required',
        'province_id' => 'required|exists:provinces,id',
        'municipality_id' => 'required|exists:municipalities,id',
        'address_id' => 'required|exists:addresses,id',
    ];

    protected $messages = [
        'title.required' => 'O campo título é obrigatório.',
        'title.string' => 'O título deve ser uma string.',
        'title.max' => 'O título deve ter no máximo 255 caracteres.',

        'description.required' => 'O campo descrição é obrigatório.',
        'description.string' => 'A descrição deve ser uma string.',

        'price.required' => 'O campo preço é obrigatório.',
        'price.min' => 'O preço não pode ser menor que 0.',

        'photo.image' => 'A foto deve ser uma imagem.',

        'owner.required' => 'O campo proprietário é obrigatório.',

        'province_id.required' => 'O campo província é obrigatório.',
        'province_id.exists' => 'A província selecionada não é válida.',

        'municipality_id.required' => 'O campo município é obrigatório.',
        'municipality_id.exists' => 'O município selecionado não é válido.',

        'address_id.required' => 'O campo endereço é obrigatório.',
        'address_id.exists' => 'O endereço selecionado não é válido.',
    ];

    public function render()
    {
        $this->getLocal();
        return view('livewire.home-rent.home-rent-component', [
            'users' => User::where("access_id", "!=", 1)->where("access_id", "!=", 4)->orderBy("first_name", "asc")->get(),
            'accesses' => Access::all(),
            'provinces' => Province::orderBy("description", "asc")->get(),
            'homes' => $this->getHomes(),
            "darkmode" => auth()->user()->getDarkMode ?? ''
        ])
            ->layout("components.layouts.app");
    }

    public function getHomes()
    {
        if (Gate::allows("admin") || Gate::allows("inquilino")) {
            return Home::all();
        } else {
            return Home::where("responsible", Auth::user()->id)->get();
        }
    }

    public function getLocal()
    {
        if ($this->province_id) {
            $this->municipalities = Municipality::where("province_id", $this->province_id)
                ->orderBy("description", "asc")->get();
        }

        if ($this->municipality_id && $this->province_id) {
            $this->addresses = Address::where("municipality_id", $this->municipality_id)
                ->where("province_id", $this->province_id)
                ->orderBy("description", "asc")->get();
        }
    }

    public function validateHome($home_id)
    {
        $home = Home::find($home_id);
        $home->status = "validado";
        $home->save();
        $this->dispatch('alerta', [
            'icon' => 'success',
            'title' => 'Sucesso',
            'html' => 'Operação realizada com sucesso',
        ]);
        $this->dispatch('atrazar_redirect', [
            'path' => '/imovéis/registros',
            'time' => 2000,
        ]);
    }

    public function save()
    {
        $this->validate();
        try {

            DB::beginTransaction();

            $photoPath = null;
            if ($this->photo) {
                $photoPath = $this->photo->store('imoveis-photos', 'public');
            }

            $priceRmPoint = str_replace(".", "", $this->price);
            $priceFinal = str_replace(",", ".", $priceRmPoint);

            Home::create([
                'title' => $this->title,
                'description' => $this->description,
                'price' => $priceFinal,
                'photo' => $photoPath,
                'owner' => $this->owner,
                'responsible' => Auth::user()->id,
                'address_id' => $this->address_id,
                'province_id' => $this->province_id,
                'municipality_id' => $this->municipality_id,
                'status' => 'pendente',
            ]);

            DB::commit();
            $this->dispatch('alerta', [
                'icon' => 'success',
                'title' => 'Sucesso',
                'html' => 'Operação realizada com sucesso',
            ]);
            $this->clearFilds();
            $this->dispatch('closemodal');
            $this->dispatch('atrazar_redirect', ['path' => '/imovéis/registros', 'time' => 2000]);
        } catch (\Throwable $th) {
            DB::rollBack();
            // dd($th->getMessage(), $th->getLine());
            $this->dispatch('alerta', [
                'icon' => 'error',
                'btn' => true,
                'title' => 'Falha',
                'html' => 'Erro ao realizar operação',
            ]);
        }
    }

    public function setData($home_id)
    {
        $this->edit = true;
        $home = Home::find($home_id);
        $this->title = $home->title;
        $this->description = $home->description;
        $this->price = number_format($home->price, 2, ",", ".");
        $this->owner = $home->owner;
        $this->responsible = Auth::user()->id;
        $this->province_id = $home->province_id;

        $this->municipalities = Municipality::where("province_id", $this->province_id)
            ->orderBy("description", "asc")->get();
        $this->municipality_id = $home->municipality_id;
        $this->addresses = Address::where("municipality_id", $this->municipality_id)
            ->where("province_id", $this->province_id)
            ->orderBy("description", "asc")->get();
        $this->address_id = $home->address_id;
    }

    public function update()
    {
        $this->validate();
        try {

            DB::beginTransaction();

            $photoPath = null;
            if ($this->photo) {
                $photoPath = $this->photo->store('imoveis-photos', 'public');
            }

            $priceRmPoint = str_replace(".", "", $this->price);
            $priceFinal = str_replace(",", ".", $priceRmPoint);

            Home::where("id", $this->home_id)->update([
                'title' => $this->title,
                'description' => $this->description,
                'price' => $priceFinal,
                'photo' => $photoPath,
                'owner' => $this->owner,
                'responsible' => Auth::user()->id,
                'address_id' => $this->address_id,
                'province_id' => $this->province_id,
                'municipality_id' => $this->municipality_id,
                'status' => 'pendente',
            ]);

            DB::commit();
            $this->dispatch('alerta', [
                'icon' => 'success',
                'title' => 'Sucesso',
                'html' => 'Operação realizada com sucesso',
            ]);
            $this->clearFilds();
            $this->dispatch('closemodal');
            $this->dispatch('atrazar_redirect', ['path' => '/imovéis/registros', 'time' => 2000]);
        } catch (\Throwable $th) {
            DB::rollBack();
            // dd($th->getMessage(), $th->getLine());
            $this->dispatch('alerta', [
                'icon' => 'error',
                'btn' => true,
                'title' => 'Falha',
                'html' => 'Erro ao realizar operação',
            ]);
        }
    }

    public function delete($home_id)
    {
        try {
            $home = Home::find($home_id);
            $home->delete();
            $this->dispatch('alerta', [
                'icon' => 'success',
                'title' => 'Sucesso',
                'html' => 'Operação realizada com sucesso',
            ]);
            $this->dispatch('atrazar_redirect', ['path' => '/imovéis/registros', 'time' => 2000]);
        } catch (\Throwable $th) {
            DB::rollBack();
            //dd($th->getMessage(), $th->getLine());
            $this->dispatch('alerta', [
                'icon' => 'error',
                'btn' => true,
                'title' => 'Falha',
                'html' => 'Erro ao realizar operação',
            ]);
        }
    }

    public function removePhoto()
    {
        $this->photo = null;
        $this->photoUrl = null;
    }

    public function updatedPhoto()
    {
        if ($this->photo) {
            $this->photoUrl = $this->photo->temporaryUrl();
        }
    }

    public function createAddress()
    {
        $this->validate([
            'addressDesc' => 'required|string|max:255',
            'province_id' => 'required|exists:provinces,id',
            'municipality_id' => 'required|exists:municipalities,id',
        ], [
            'province_id.required' => 'O campo província é obrigatório.',
            'province_id.exists' => 'A província selecionada não é válida.',
            'municipality_id.required' => 'O campo município é obrigatório.',
            'municipality_id.exists' => 'O município selecionado não é válido.',
            'addressDesc.required' => 'O campo endereço é obrigatório.',
        ]);

        $address = Address::create([
            'description' => $this->addressDesc,
            "province_id" => $this->province_id,
            "municipality_id" => $this->municipality_id,
        ]);

        $this->addresses = Address::where("municipality_id", $this->municipality_id)
            ->where("province_id", $this->province_id)
            ->orderBy("description", "asc")->get();
        $this->address_id = $address->id;
        $this->addressDesc = null;
        $this->dispatch('closemodalAddresses');
    }

    public function createMunicipality()
    {
        $this->validate([
            'municipaltyDesc' => 'required|string|max:255',
            'province_id' => 'required|exists:provinces,id',
        ], [
            'province_id.required' => 'O campo província é obrigatório.',
            'province_id.exists' => 'A província selecionada não é válida.',
            'municipaltyDesc.required' => 'O campo é obrigatório.',
        ]);

        $municipality = Municipality::create([
            'description' => $this->municipaltyDesc,
            "province_id" => $this->province_id,
        ]);

        $this->municipalities = Municipality::where("province_id", $this->province_id)
            ->orderBy("description", "asc")->get();
        $this->municipality_id = $municipality->id;
        $this->municipaltyDesc = null;
        $this->dispatch('closemodalMunicipality');
    }

    public function clearFilds()
    {
        $this->edit = null;
        $this->title = null;
        $this->description = null;
        $this->price = null;
        $this->photo = null;
        $this->owner = null;
        $this->address_id = null;
        $this->province_id = null;
        $this->municipality_id = null;
        $this->address_id = null;
    }

}
