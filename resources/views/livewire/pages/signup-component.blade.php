@section('title', 'Criar Conta')
<div class="container-fluid">
    <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="col-12 col-lg-8">
            <div class="bg-white rounded p-4  my-4 mx-3">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <a href="/" class="">
                        <h3 class="text-primary">@include('inc.namewebsite')</h3>
                    </a>
                    <h3 class="text-primary">Criar Conta</h3>
                </div>
                <hr>

                <form class="container-fluid" wire:submit.prevent="save">
                    <div class="row" style="width: inherit">
                        <div class="col-12 col-md-6 form-floating mb-3">
                            <input type="text" wire:model="first_name" class="form-control" id="first_name"
                            style="border: 0.5px solid #222; 
                            color: black;
                            background: transparent"
                            placeholder="Nome">
                            <label class="ms-2" for="first_name">Nome</label>
                            @error('first_name')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-12 col-md-6 form-floating mb-3">
                            <input type="text" wire:model="last_name" class="form-control" id="last_name"
                            style="border: 0.5px solid #222; 
                            color: black;
                            background: transparent"
                            placeholder="Sobrenome">
                            <label class="ms-2" for="last_name">Sobrenome</label>
                            @error('last_name')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-12 col-md-6 form-floating mb-3">
                            <select wire:model="gender" 
                            style="border: 0.5px solid #222; 
                            color: black;
                            background-color: transparent"
                            class="form-select" id="gender">
                                <option value="">Selecione</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Feminino">Feminino</option>
                            </select>
                            <label class="ms-2" for="gender">Gênero</label>
                            @error('gender')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-12 col-md-6 form-floating mb-3">
                            <input type="date" wire:model="birth_date" class="form-control" id="birth_date"
                            style="border: 0.5px solid #222; 
                            color: black;
                            background: transparent"    
                            placeholder="Nascimento">
                            <label class="ms-2" for="birth_date">Nascimento</label>
                            @error('birth_date')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-12 col-md-6 form-floating mb-3">
                            <input type="email" wire:model="email" class="form-control" id="email"
                            style="border: 0.5px solid #222; 
                            color: black;
                            background: transparent"    
                            placeholder="E-mail">
                            <label class="ms-2" for="email">E-mail</label>
                            @error('email')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-12 col-md-6 form-floating mb-3">
                            <input type="number" wire:model="phone" class="form-control" id="phone"
                            style="border: 0.5px solid #222; 
                            color: black;
                            background: transparent"    
                            placeholder="Telefone">
                            <label class="ms-2" for="phone">Telefone</label>
                            @error('phone')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-12 col-md-6 form-floating mb-3">
                            <input type="password" wire:model="password" class="form-control" id="password"
                            style="border: 0.5px solid #222; 
                            color: black;
                            background: transparent"    
                            placeholder="Palavra-passe">
                            <label class="ms-2" for="password">Palavra-Passe</label>
                            @error('password')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-12 col-md-6 form-floating mb-4">
                            <input type="password" wire:model="confirmpassword" wire:change="check_password"
                            style="border: 0.5px solid #222; 
                            color: black;
                            background: transparent"    
                            class="form-control" id="confirmpassword" placeholder="Confirmar Palavra-passe">
                            <label class="ms-2" for="confirmpassword">Confirmar Passe</label>
                            @error('confirmpassword')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-12 col-md-6 form-floating mb-3">
                            <select wire:model="access_id" 
                            style="border: 0.5px solid #222; 
                            color: black;
                            background-color: transparent"
                            class="form-select" id="access_id">
                                <option value="">Selecione</option>
                                @foreach ($accesses as $item)
                                    <option value="{{ $item->id }}">{{ ucwords($item->description) }}</option>
                                @endforeach
                            </select>
                            <label class="ms-2" for="access_id">Tipo de Conta</label>
                            @error('access_id')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-2 gap-2">
                        <button type="submit" wire:loading.attr="disabled" wire:target="save"
                            class="btn btn-primary px-4 py-2">
                            <span wire:loading.remove wire:target="save">Cadastrar</span>
                            <span wire:loading wire:target="save">
                                <i class="fa fa-spinner fa-spin"></i> Cadastrar
                            </span>
                        </button>
                    
                        <small class="text-center mb-0 text-dark">
                           <b> Já tem uma conta? <a href="{{ route('pages.login') }}" class="text-primary fw-bold">Entrar</a></b>
                        </small>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
