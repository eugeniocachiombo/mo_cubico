<!-- Navbar Start -->
<nav
    class="navbar navbar-expand {{ auth()->user()->getDarkMode ? 'bg-secondary' : 'bg-white' }} navbar-dark sticky-top px-4 py-0">
    <a href="/" class="navbar-brand d-flex d-lg-none me-4">
        @php
            $logo = auth()->user()->getDarkMode ? 'redlogo' : 'blacklogo';
        @endphp
        <h2 class="text-primary mb-0"><img style="width: 40px" src="{{ asset('assets/images/logo/' . $logo . '.png') }}"
                alt=""></h2>
    </a>
    <a href="#" class="sidebar-toggler flex-shrink-0 ">
        <i class="fa fa-bars {{ auth()->user()->getDarkMode ? '' : 'text-white' }}"></i>
    </a>
    <form class="d-none d-md-flex ms-4">
        <input class="form-control {{ auth()->user()->getDarkMode ? 'bg-dark border-0' : '' }} "
            style="{{ auth()->user()->getDarkMode ? '' : 'background: transparent' }}" type="search"
            placeholder="Pesquisar">
    </form>
    <div class="navbar-nav align-items-center ms-auto">
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <i class="fa fa-envelope me-lg-2 {{ auth()->user()->getDarkMode ? '' : 'text-white' }}"></i>
                <span
                    class="d-none d-lg-inline-flex {{ auth()->user()->getDarkMode ? '' : 'text-dark' }}">Mensagens</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                @for ($i = 1; $i <= 3; $i++)
                    <a href="#" class="dropdown-item">
                        <div class="d-flex align-items-center">
                            @if (auth()->user()->photo)
                                <img class=" rounded-circle" src="{{ asset('storage/' . auth()->user()->photo) }}"
                                    alt="photo de perfil" style="width: 40px; height: 40px;">
                            @else
                                <div class="border d-flex justify-content-center align-items-center rounded-circle bg-secondary"
                                    style="width: 40px; height: 40px;">
                                    <i class="fa fa-images text-white"></i>
                                </div>
                            @endif
                            <div class="ms-2">
                                <h6 class="fw-normal mb-0">{{ucwords(auth()->user()->first_name)}} enviou uma mensagem</h6>
                                <small>15 minutos atrás</small>
                            </div>
                        </div>
                    </a>
                    <hr class="dropdown-divider">
                @endfor
                <a href="#" class="dropdown-item text-center">Ver todas as mensagens</a>
            </div>
        </div>
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <i class="fa fa-bell me-lg-2 {{ auth()->user()->getDarkMode ? '' : 'text-white' }}"></i>
                <span
                    class="d-none d-lg-inline-flex {{ auth()->user()->getDarkMode ? '' : 'text-dark' }}">Notificações</span>
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
                @if (auth()->user()->photo)
                    <img class="img-fluid rounded-circle" src="{{ asset('storage/' . auth()->user()->photo) }}"
                        alt="photo de perfil" style="width: 40px; height: 40px;">
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
                <a href="{{ route('user.profile') }}" class="dropdown-item text-white">Meu Perfil</a>
                <a href="{{ route('user.config') }}" class="dropdown-item text-white">Configurações</a>
                <a href="{{ route('pages.logout') }}" class="dropdown-item text-white">Sair</a>
            </div>
        </div>
    </div>
</nav>

<!-- Navbar End -->
