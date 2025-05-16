@section('title', 'Configurações')
<div class="content" style="background: {{ $darkmode ? '' : 'rgba(200,200,200,50)' }};">

    @include('inc.header')

    <div class="container  px-4">
        <div class=" {{ $darkmode ? 'bg-secondary' : 'bg-white' }}" style="min-height: 67vh">
            <div class="col-12 mt-4">
                <div class="container">
                    <h3 class="pt-3 {{ $darkmode ? '' : 'text-dark' }}">Configurações</h3>
                    <hr>
                    <div>
                        <b>Activar Modo Escuro:</b>
                        <input type="checkbox" wire:change='save' name="" id="" wire:model='darkmode'>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('inc.footer')
</div>
