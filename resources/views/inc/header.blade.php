<!-- Navbar Start -->
<nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
    <a href="/" class="navbar-brand d-flex d-lg-none me-4">
        <h2 class="text-primary mb-0"><img style="width: 40px" src="{{asset('assets/images/logo/redlogo.png')}}" alt=""></h2>
    </a>
    <a href="#" class="sidebar-toggler flex-shrink-0">
        <i class="fa fa-bars"></i>
    </a>
    <form class="d-none d-md-flex ms-4">
        <input class="form-control bg-dark border-0" type="search" placeholder="Pesquisar">
    </form>
    <div class="navbar-nav align-items-center ms-auto">
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <i class="fa fa-envelope me-lg-2"></i>
                <span class="d-none d-lg-inline-flex">Mensagens</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                <a href="#" class="dropdown-item">
                    <div class="d-flex align-items-center">
                        <img class="rounded-circle" src="img/user.jpg" alt=""
                            style="width: 40px; height: 40px;">
                        <div class="ms-2">
                            <h6 class="fw-normal mb-0">Jhon enviou uma mensagem</h6>
                            <small>15 minutos atrás</small>
                        </div>
                    </div>
                </a>
                <hr class="dropdown-divider">
                <a href="#" class="dropdown-item">
                    <div class="d-flex align-items-center">
                        <img class="rounded-circle" src="img/user.jpg" alt=""
                            style="width: 40px; height: 40px;">
                        <div class="ms-2">
                            <h6 class="fw-normal mb-0">Jhon enviou uma mensagem</h6>
                            <small>15 minutos atrás</small>
                        </div>
                    </div>
                </a>
                <hr class="dropdown-divider">
                <a href="#" class="dropdown-item">
                    <div class="d-flex align-items-center">
                        <img class="rounded-circle" src="img/user.jpg" alt=""
                            style="width: 40px; height: 40px;">
                        <div class="ms-2">
                            <h6 class="fw-normal mb-0">Jhon enviou uma mensagem</h6>
                            <small>15 minutos atrás</small>
                        </div>
                    </div>
                </a>
                <hr class="dropdown-divider">
                <a href="#" class="dropdown-item text-center">Ver todas as mensagens</a>
            </div>
        </div>
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <i class="fa fa-bell me-lg-2"></i>
                <span class="d-none d-lg-inline-flex">Notificações</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                <a href="#" class="dropdown-item">
                    <h6 class="fw-normal mb-0">Perfil atualizado</h6>
                    <small>15 minutos atrás</small>
                </a>
                <hr class="dropdown-divider">
                <a href="#" class="dropdown-item">
                    <h6 class="fw-normal mb-0">Novo usuário adicionado</h6>
                    <small>15 minutos atrás</small>
                </a>
                <hr class="dropdown-divider">
                <a href="#" class="dropdown-item">
                    <h6 class="fw-normal mb-0">Senha alterada</h6>
                    <small>15 minutos atrás</small>
                </a>
                <hr class="dropdown-divider">
                <a href="#" class="dropdown-item text-center">Ver todas as notificações</a>
            </div>
        </div>
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
                @if (auth()->user()->foto)
                    <a href="{{ asset('storage/' . auth()->user()->foto) }}">
                        <img class="rounded-circle" src="{{ asset('storage/' . auth()->user()->foto) }}"
                            alt="Foto de perfil" style="width: 40px; height: 40px;">
                    </a>
                    <span class="d-none px-2 d-lg-inline-flex">{{ ucwords(auth()->user()->first_name) }}
                        {{ ucwords(auth()->user()->last_name) }}</span>
                @else
                    <div class="d-flex justify-content-center align-items-center rounded-circle bg-secondary"
                        style="width: 40px; height: 40px;">
                        <i class="fa fa-images text-white"></i>
                    </div>
                    <span class="d-none px-2 d-lg-inline-flex">{{ ucwords(auth()->user()->first_name) }}
                        {{ ucwords(auth()->user()->last_name) }}</span>
                @endif
                
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                <a href="#" class="dropdown-item">Meu Perfil</a>
                <a href="#" class="dropdown-item">Configurações</a>
                <a href="{{ route('pages.logout') }}" class="dropdown-item">Sair</a>
            </div>
        </div>
    </div>
</nav>

<!-- Navbar End -->
