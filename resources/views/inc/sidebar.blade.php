<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-secondary navbar-dark">
        <a href="/" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary">@include('inc.namewebsite')</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                @if (auth()->user()->foto)
                    <a href="{{ asset('storage/' . auth()->user()->foto) }}">
                        <img class="rounded-circle" src="{{ asset('storage/' . auth()->user()->foto) }}" alt="Foto de perfil"
                        style="width: 40px; height: 40px;">
                    </a>
                @else
                    <div class="d-flex justify-content-center align-items-center rounded-circle bg-secondary"
                        style="width: 40px; height: 40px;">
                        <i class="fa fa-images text-white"></i>
                    </div>
                @endif

                <div
                    class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                </div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">{{ ucwords(auth()->user()->first_name) }}  
                </h6>
                <span>{{ ucwords(auth()->user()->getAccess->description) }}</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="{{route('home.dashboard')}}" class="nav-item nav-link {{\Illuminate\Support\Facades\Route::currentRouteName() == 'home.dashboard' ? 'active' : ''}}"><i class="fa fa-tachometer-alt me-2"></i>Painel</a>
            <a href="{{route('user.profile')}}" class="nav-item nav-link {{\Illuminate\Support\Facades\Route::currentRouteName() == 'user.profile' ? 'active' : ''}}"><i class="fa fa-user me-2"></i>Perfil</a>
            <a href="{{route('home-rent')}}" class="nav-item nav-link {{\Illuminate\Support\Facades\Route::currentRouteName() == 'home-rent' ? 'active' : ''}}""><i class="fa fa-home me-2"></i>Imóveis</a>
            <a href="form.html" class="nav-item nav-link"><i class="fa fa-search me-2"></i>Localizar</a>
            <a href="table.html" class="nav-item nav-link"><i class="fa fa-list me-2"></i>Pedidos</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="fa fa-file-alt  me-2"></i>Documentos</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="button.html" class="dropdown-item">Registrados</a>
                    <a href="typography.html" class="dropdown-item">Contratos</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="fa fa-map me-2"></i>Localidades</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="button.html" class="dropdown-item">Províncias</a>
                    <a href="typography.html" class="dropdown-item">Municípios</a>
                    <a href="element.html" class="dropdown-item">Endereço (Bairro/Rua)</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="fa fa-users me-2"></i>Utilizadores</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="signin.html" class="dropdown-item">Admin</a>
                    <a href="signup.html" class="dropdown-item">Inquilinos</a>
                    <a href="404.html" class="dropdown-item">Arrendadores</a>
                    <a href="blank.html" class="dropdown-item">Intermediários</a>
                </div>
            </div>
        </div>
    </nav>
</div>
<!-- Sidebar End -->
