@section('title', 'Autenticação')
<div class="container-fluid" style="background: rgba(200,200,200,50)">
    <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
            <div class="rounded p-4 p-sm-5 my-4 mx-3 card-animated" style="background: whitesmoke">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <a href="/" class="">
                        <h3 class="text-primary">@include('inc.namewebsite')</h3>
                    </a>
                    <h3 class="text-secondary">Entrar</h3>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" wire:model='emailphone' class="form-control" 
                    id="floatingInput" style="background: whitesmoke"
                        placeholder="name@example.com">
                    <label for="floatingInput">Email ou Telefone</label>
                    @error('emailphone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-floating mb-4">
                    <input type="password" wire:model='password' class="form-control" 
                    id="floatingPassword" style="background: whitesmoke"
                        placeholder="Password">
                    <label for="floatingPassword">Senha</label>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="form-check">
                        <input type="checkbox" wire:model="remember_me" class="form-check-input " id="exampleCheck1">
                        <label class="form-check-label text-dark" for="exampleCheck1">Lembrar-me</label>
                    </div>
                    <a href="">Esqueceu a Senha?</a>
                </div>
                <button wire:click.prevent='authenticate' type="submit" class="btn btn-dark py-3 w-100 mb-4" wire:loading.attr="disabled"
                    wire:target="authenticate">
                    <span wire:loading.remove wire:target="authenticate">Entrar</span>
                    <span wire:loading wire:target="authenticate">
                        <i class="fa fa-spinner fa-spin"></i> 
                    </span></button>
                <p class="text-center mb-0">Não tem uma conta? <a href="{{route('pages.signup')}}">Cadastre-se</a></p>
            </div>
        </div>
    </div>
</div>
<!-- Fim da Autenticação -->
</div>
