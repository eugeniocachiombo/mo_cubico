@section('title', 'Autenticação')
<div class="container-fluid" >
    <div class="row h-100 align-items-center justify-content-center" 
    style="min-height: 100vh;">
        <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
            <div class="bg-white rounded p-4 p-sm-5 my-4 mx-3">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <a href="/" class="">
                        <h3 class="text-dark">@include('inc.namewebsite')</h3>
                    </a>
                    <h3 class="text-primary">Entrar</h3>
                </div> <hr>
                <div class="form-floating mb-3">
                    <input type="email" wire:model='emailphone' 
                    class="form-control bg-transparent" style="border: 0.5px solid #222;" 
                    id="floatingInput"
                        placeholder="name@example.com">
                    <label for="floatingInput">Email ou Telefone</label>
                    @error('emailphone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-floating mb-4">
                    <input type="password" wire:model='password' 
                    class="form-control bg-transparent" style="border: 0.5px solid #222;" 
                    id="floatingPassword"
                        placeholder="Password">
                    <label for="floatingPassword">Senha</label>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="form-check">
                        <input type="checkbox" wire:model="remember_me" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Lembrar-me</label>
                    </div>
                    <a href="" class="text-primary fw-bold">Esqueceu a Senha?</a>
                </div>
                <button wire:click.prevent='authenticate' type="submit" class="btn btn-primary py-3 w-100 mb-4" wire:loading.attr="disabled"
                    wire:target="authenticate">
                    <span wire:loading.remove wire:target="authenticate">Entrar</span>
                    <span wire:loading wire:target="authenticate">
                        <i class="fa fa-spinner fa-spin"></i> 
                    </span></button>
                <p class="text-center mb-0">Não tem uma conta? 
                    <a href="{{route('pages.signup')}}" class="text-primary fw-bold">Cadastre-se</a></p>
            </div>
        </div>
    </div>
</div>
<!-- Fim da Autenticação -->
</div>
