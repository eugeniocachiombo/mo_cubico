@section('title', 'Perfil')
<div class="content" style="background: {{ $darkmode ? '' : 'rgba(200,200,200,50)' }};">

    @include('inc.header')


    <div class="container-fluid pt-4 px-4">
        <div class="row {{ auth()->user()->getDarkMode ? 'bg-secondary' : 'bg-white' }} rounded align-items-center justify-content-center mx-0"
            style="min-height: 65vh">

            <div class="row column1 py-4">
                <div class="col-md-12">
                    <div class="row">
                        <!-- profile image -->
                        <div class="col-lg-12">
                            <div class="full dis_flex center_text">

                                <div class="profile_contant mb-4">
                                    <div class="contact_inner ">
                                        <div class="d-flex align-items-center">
                                            <div class="position-relative" style="width: 40px; height: 40px;">
                                                @if (auth()->user()->photo)
                                                    <a href="{{ asset('storage/' . auth()->user()->photo) }}">
                                                        <img class=" rounded-circle"
                                                            src="{{ asset('storage/' . auth()->user()->photo) }}"
                                                            alt="photo de perfil" style="width: 40px; height: 40px;">
                                                    </a>
                                                @else
                                                    <div class="border d-flex justify-content-center align-items-center rounded-circle bg-secondary"
                                                        style="width: 40px; height: 40px;">
                                                        <i class="fa fa-images text-white"></i>
                                                    </div>
                                                @endif

                                                {{-- Livewire sobreposto e um pouco mais baixo --}}
                                                <div class="position-absolute " style="bottom: -10px; right: -6px;">
                                                    @livewire('user.component.set-photo')
                                                </div>
                                            </div>

                                            <h3 class="mx-2 mb-0 {{ auth()->user()->getDarkMode ? '' : 'text-dark' }}">
                                                {{ ucwords(auth()->user()->first_name) }}
                                                {{ ucwords(auth()->user()->last_name) }}</h3>
                                        </div>



                                    </div>

                                </div>
                            </div>
                            <!-- profile contant section -->
                            <div class="full inner_elements margin_top_30">
                                <div class="tab_style2">
                                    <div class="tabbar">
                                        <nav>
                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                <a class="nav-item nav-link {{ $tab == 'perfil' ? 'active' : '' }} "
                                                    wire:click="set_tab('perfil')" id="nav-contact-tab"
                                                    data-toggle="tab" href="#perfil" role="tab"
                                                    aria-selected="false">Perfil</a>
                                                <a class="nav-item nav-link {{ $tab == 'actualizar-dados' ? 'active' : '' }} "
                                                    wire:click="set_tab('actualizar-dados')" id="nav-home-tab"
                                                    data-toggle="tab" href="#actualizar-dados" role="tab"
                                                    aria-selected="true">Actualizar dados</a>
                                                <a class="nav-item nav-link {{ $tab == 'palavra-passe' ? 'active' : '' }} "
                                                    wire:click="set_tab('palavra-passe')" id="nav-profile-tab"
                                                    data-toggle="tab" href="#palavra-passe" role="tab"
                                                    aria-selected="false">Alterar Palavra-Passe</a>
                                            </div>
                                        </nav>
                                        <div class="tab-content" id="nav-tabContent">
                                            <div class="tab-pane fade {{ $tab == 'perfil' ? 'show active' : '' }} "
                                                id="perfil" role="tabpanel" aria-labelledby="nav-contact-tab">
                                                <h3 class="my-4 {{ auth()->user()->getDarkMode ? '' : 'text-dark' }}">
                                                    Dados Pessoais</h3>

                                                <ul class="list-unstyled" style="font-size: 15px">
                                                    <li class="my-3"><i class="fa fa-tag"></i> Gênero:
                                                        {{ ucwords($user->gender) }}</li>
                                                    <li class="my-3"><i class="fa fa-calendar"></i> Data de
                                                        nascimento:
                                                        {{ $this->format_birth_date($user->birth_date) }}
                                                    </li>
                                                    <li class="my-3"><i class="fa fa-tag"></i> Portador
                                                        BI/NIF:
                                                        {{ $user->nif ?? 'n/d' }}</li>
                                                    <li class="my-3"><i class="fa fa-envelope"></i> Email:
                                                        {{ ucwords($user->email) }}</li>
                                                    <li class="my-3"><i class="fa fa-phone-alt"></i> Telefone:
                                                        {{ ucwords($user->phone) }}</li>
                                                    <li class="my-3"><i class="fa fa-map"></i> Morada:
                                                        @if ($user->address_id)
                                                            {{ $user->getAddress->description }},
                                                            {{ $user->getAddress->getMunicipality->description }},
                                                            {{ $user->getAddress->getProvince->description }}
                                                        @else
                                                            n/d
                                                        @endif
                                                    </li>

                                                </ul>
                                            </div>
                                            <div class="tab-pane fade {{ $tab == 'actualizar-dados' ? 'show active' : '' }} "
                                                id="actualizar-dados" role="tabpanel" aria-labelledby="nav-home-tab">
                                                <div class="msg_list_main">
                                                    <h3
                                                        class="my-4 {{ auth()->user()->getDarkMode ? '' : 'text-dark' }}">
                                                        Actualizar dados</h3>
                                                    <hr>
                                                    <div class="row g-3">
                                                        <div class="col-md-6">
                                                            <label for="first_name">Nome</label>
                                                            <input
                                                                style="{{ auth()->user()->getDarkMode ? '' : 'border: 0.5px solid #222; color: black; background: transparent;' }}"
                                                                class="form-control" type="text"
                                                                wire:model='first_name' name="first_name"
                                                                id="first_name" />
                                                            @error('first_name')
                                                                <span class="text-danger mt-2">{{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="last_name">Sobrenome</label>
                                                            <input
                                                            style="{{ auth()->user()->getDarkMode ? '' : 'border: 0.5px solid #222; color: black; background: transparent;' }}"
                                                                class="form-control" type="text"
                                                                wire:model='last_name' name="last_name"
                                                                id="last_name" />
                                                            @error('last_name')
                                                                <span class="text-danger mt-2">{{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="gender">Gênero</label>
                                                            <select
                                                            style="{{ auth()->user()->getDarkMode ? '' : 'border: 0.5px solid #222; color: black; background: transparent;' }}"
                                                            class="form-select" wire:model='gender'
                                                                name="gender" id="gender">
                                                                <option value="">Selecione</option>
                                                                <option value="Masculino">Masculino</option>
                                                                <option value="Feminino">Feminino</option>
                                                            </select>
                                                            @error('gender')
                                                                <span class="text-danger mt-2">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="birth_date">Nascimento</label>
                                                            <input
                                                                style="{{ auth()->user()->getDarkMode ? '' : 'border: 0.5px solid #222; color: black; background: transparent;' }}"
                                                                class="form-control" type="date"
                                                                wire:model='birth_date' name="birth_date"
                                                                id="birth_date" />
                                                            @error('birth_date')
                                                                <span class="text-danger mt-2">{{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="email">E-mail</label>
                                                            <input
                                                                style="{{ auth()->user()->getDarkMode ? '' : 'border: 0.5px solid #222; color: black; background: transparent;' }}"
                                                                type="email" wire:model='email'
                                                                class="form-control" name="email" id="email" />
                                                            @error('email')
                                                                <span class="text-danger mt-2">{{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="phone">Telefone</label>
                                                            <input
                                                                style="{{ auth()->user()->getDarkMode ? '' : 'border: 0.5px solid #222; color: black; background: transparent;' }}"
                                                                type="number" wire:model='phone'
                                                                class="form-control" name="phone" id="phone" />
                                                            @error('phone')
                                                                <span class="text-danger mt-2">{{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class=" nif">NIF/BI</label>
                                                            <input
                                                                style="{{ auth()->user()->getDarkMode ? '' : 'border: 0.5px solid #222; color: black; background: transparent;' }}"
                                                                class="form-control" type="text" wire:model='nif'
                                                                name="nif" id="nif" />
                                                            @error('nif')
                                                                <span class="text-danger mt-2">{{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class=" province_id">Província</label>
                                                            <select
                                                            style="{{ auth()->user()->getDarkMode ? '' : 'border: 0.5px solid #222; color: black; background: transparent;' }}"
                                                            class="form-select" style="width: 100%"
                                                                wire:change='get_local' wire:model='province_id'
                                                                name="province_id" id="province_id">
                                                                <option value="">Selecione</option>
                                                                @foreach ($provinces as $item)
                                                                    <option value="{{ $item->id }}">
                                                                        {{ $item->description }}</option>
                                                                @endforeach
                                                            </select>

                                                            @error('province_id')
                                                                <span class="text-danger mt-2">{{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class=" municipality_id">Município</label>
                                                            <select
                                                            style="{{ auth()->user()->getDarkMode ? '' : 'border: 0.5px solid #222; color: black; background: transparent;' }}"
                                                            class="form-select" wire:change='get_local'
                                                                wire:model='municipality_id' name="municipality_id"
                                                                id="municipality_id">
                                                                <option value="">Selecione</option>
                                                                @foreach ($municipalities as $item)
                                                                    <option value="{{ $item->id }}">
                                                                        {{ $item->description }}</option>
                                                                @endforeach
                                                            </select>

                                                            @error('municipality_id')
                                                                <span class="text-danger mt-2">{{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class=" address_id">Morada</label>
                                                            <select
                                                            style="{{ auth()->user()->getDarkMode ? '' : 'border: 0.5px solid #222; color: black; background: transparent;' }}"
                                                            class="form-select" wire:model='address_id'
                                                                name="address_id" id="address_id">
                                                                <option value="">Selecione</option>
                                                                @foreach ($addresses as $item)
                                                                    <option value="{{ $item->id }}">
                                                                        {{ $item->description }}</option>
                                                                @endforeach
                                                            </select>

                                                            @error('address_id')
                                                                <span class="text-danger mt-2">{{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                        <div class="my-3 d-flex justify-content-end">
                                                            <button wire:click.prevent='update'
                                                                wire:loading.attr="disabled" wire:target="update"
                                                                class="btn btn-primary mt-5">
                                                                <span wire:loading.remove
                                                                    wire:target="update">Actualizar</span>
                                                                <span wire:loading wire:target="update">
                                                                    <i class="fa fa-spinner fa-spin"></i> Actualizar
                                                                </span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade {{ $tab == 'palavra-passe' ? 'show active' : '' }} "
                                                id="palavra-passe" role="tabpanel"
                                                aria-labelledby="nav-profile-tab">
                                                <h3 class="my-4 {{ auth()->user()->getDarkMode ? '' : 'text-dark' }}">Alterar Palavra-Passe</h3>
                                                <hr>
                                                <div class="row g-3 col-md-6">
                                                    <div class="col-md-7">
                                                        <label class="oldpassword">Antiga</label>
                                                        <input
                                                        style="{{ auth()->user()->getDarkMode ? '' : 'border: 0.5px solid #222; color: black; background: transparent;' }}"
                                                            wire:change='check_password' class="form-control"
                                                            type="password" wire:model='oldpassword'
                                                            name="oldpassword" id="oldpassword" />
                                                        @error('oldpassword')
                                                            <span class="text-danger mt-2">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-7">
                                                        <label class="newpassword">Nova</label>
                                                        <input
                                                            style="{{ auth()->user()->getDarkMode ? '' : 'border: 0.5px solid #222; color: black; background: transparent;' }}"
                                                            wire:change='check_password' class="form-control"
                                                            type="password" wire:model='newpassword'
                                                            name="newpassword" id="newpassword" />
                                                        @error('newpassword')
                                                            <span class="text-danger mt-2">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-7">
                                                        <label class="confirmpassword">Confirmar</label>
                                                        <input
                                                            style="{{ auth()->user()->getDarkMode ? '' : 'border: 0.5px solid #222; color: black; background: transparent;' }}"
                                                            wire:change='check_password' class="form-control"
                                                            type="password" wire:model='confirmpassword'
                                                            name="confirmpassword" id="confirmpassword" />
                                                        @error('confirmpassword')
                                                            <span class="text-danger mt-2">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="my-3">
                                                        <button wire:click.prevent='change_password'
                                                            wire:loading.attr="disabled" wire:target="change_password"
                                                            class="btn btn-primary mt-1">
                                                            <span wire:loading.remove
                                                                wire:target="change_password">Alterar</span>
                                                            <span wire:loading wire:target="change_password">
                                                                <i class="fa fa-spinner fa-spin"></i> Alterar
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end user profile section -->
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
    </div>
    @include('inc.footer')
</div>
@push('scripts')
    <script>
        /*   $(document).ready(function() {
                                        $('#province_id').select2({
                                            theme: 'bootstrap-5',
                                            width: "100%"
                                        });
                                        $('#province_id').on('change', function(e) {
                                            @this.set('province_id', $('#province_id').select2("val"));
                                            @this.get_local();
                                        });
                                    });*/
    </script>
@endpush
