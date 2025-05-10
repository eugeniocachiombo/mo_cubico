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
use Livewire\Component;
use Livewire\WithFileUploads;

class HomeRentComponent extends Component
{
    use WithFileUploads;

    public $edit;
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

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
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
        'price.numeric' => 'O preço deve ser um número.',
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
        return view('livewire.home-rent.home-rent-component', [
            'users' => User::where("access_id", "!=", 1)->where("access_id", "!=", 4)->get(),
            'accesses' => Access::all(),
            'provinces' => Province::all(),
            'municipalities' => Municipality::all(),
            'addresses' => Address::all(),
            'homes' => $this->getHomes(),
        ])
            ->layout("components.layouts.app");
    }

    public function getHomes()
    {
        if(Auth::user()->access_id == 1){
            return Home::all();
        }else{
            return Home::where("responsible", Auth::user()->id);
        }
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

            Home::create([
                'title' => $this->title,
                'description' => $this->description,
                'price' => $this->price,
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
                'btn' => true,
                'title' => 'Sucesso',
                'html' => 'Operação realizada com sucesso',
            ]);
            $this->clear();
            $this->dispatch('closemodal');
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

        // Limpa os campos
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

    public function clear()
    {
        $this->title = '';
        $this->description = '';
        $this->price = '';
        $this->photo = '';
        $this->owner = '';
        $this->address_id = '';
        $this->province_id = '';
        $this->municipality_id = '';
        $this->address_id = '';
    }

}
