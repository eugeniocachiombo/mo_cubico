<?php

namespace App\Livewire\User\Component;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class SetPhoto extends Component
{
    use WithFileUploads;

    public $photo;

    public function updatedphoto()
    {
        $this->validate([
            'photo' => 'image|max:10048'
        ], [
            'photo.image' => 'Aceita arquivo de imagem',
            'photo.max' => 'Aceita somente 10MB',
        ]);
        $user = User::find(Auth::user()->id);
        if ($user->photo) {
            Storage::delete('public/' . $user->photo);
        }
        $path = $this->photo->store('profile_photos', 'public');
        $user->photo = $path;
        $user->save();
        $this->dispatch('alerta', [
            'icon' => 'success',
            'btn' => true,
            'title' => 'Sucesso',
            'html' => 'Foto carregada com sucesso'
        ]);
    }
    public function render()
    {
        return view('livewire.user.component.set-photo');
    }
}
