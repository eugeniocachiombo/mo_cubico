@section('title', 'Configurações')
<div class="content" style="background: {{ $darkmode ? '' : 'rgba(200,200,200,50)' }};">

    @include('inc.header')

    <style>
        .switch {
          position: relative;
          display: inline-block;
          width: 50px;
          height: 26px;
        }
        
        .switch input {
          opacity: 0;
          width: 0;
          height: 0;
        }
        
        .slider {
          position: absolute;
          cursor: pointer;
          top: 0;
          left: 0;
          right: 0;
          bottom: 0;
          background-color: #ccc;
          transition: 0.4s;
          border-radius: 26px;
        }
        
        .slider:before {
          position: absolute;
          content: "";
          height: 22px;
          width: 22px;
          left: 2px;
          bottom: 2px;
          background-color: white;
          transition: 0.4s;
          border-radius: 50%;
        }
        
        input:checked + .slider {
          background-color: #222;
        }
        
        input:checked + .slider:before {
          transform: translateX(24px);
        }
        </style>
        

    <div class="container  px-4">
        <div class=" {{ $darkmode ? 'bg-secondary' : 'bg-white' }}" style="min-height: 67vh">
            <div class="col-12 mt-4">
                <div class="container">
                    <h3 class="pt-3 {{ $darkmode ? '' : 'text-dark' }}">Configurações</h3>
                    <hr>
                    <div class="darkmode-toggle">
                        <label class="switch">
                            <input type="checkbox" wire:change="save" wire:model="darkmode">
                            <span class="slider round"></span>
                        </label>
                        <b>Modo Escuro</b>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    @include('inc.footer')
</div>
