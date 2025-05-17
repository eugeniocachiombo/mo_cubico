@section('title', 'Imóveis')
<div class="content" style="background: {{ $darkmode ? '' : 'rgba(200,200,200,50)' }};">

    @include('inc.header')

    <div class="container-fluid pt-4 px-4">
        <div class="row {{ auth()->user()->getDarkMode ? 'bg-secondary' : 'bg-white' }} rounded align-items-center justify-content-center mx-0" style="min-height: 65vh">
            <div class="row pt-4 pb-2">
                <div class="col-6">
                    <h4 class="{{ auth()->user()->getDarkMode ? '' : 'text-dark' }}"><span class="text-danger">Lista</span> de Imóveis</h4>
                </div>
                @if (!Gate::allows('inquilino'))
                    <div class="col-6 d-flex justify-content-end ">
                        <button type="button" wire:click.prevent='clearFilds' class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add">
                            <i class="fas fa-plus-circle"></i> Registrar
                        </button>
                    </div>
                @endif
            </div>

            <div class="row">
                <hr>
            </div>

            <div class="col-12">
                <div class="{{ auth()->user()->getDarkMode ? 'bg-secondary' : 'bg-white' }}">
                    <h6 class="mb-4"></h6>
                    <div class="table-responsive" wire:ignore>
                        <table class="table table-hover datatablePT py-4 {{ auth()->user()->getDarkMode ? 'text-white' : '' }}">
                            <thead>
                                <tr class="bg-primary text-white">
                                    <th class="text-center" scope="col">#</th>
                                    <th class="text-center" scope="col">Título</th>
                                    <th class="text-center" scope="col">Descrição</th>
                                    <th class="text-center" scope="col">Proprietário</th>
                                    @can('admin')
                                        <th class="text-center" scope="col">Responsável</th>
                                    @endcan
                                    <th class="text-center" scope="col">Estado</th>
                                    <th class="text-center" scope="col">Acção</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($homes as $home)
                                    <tr class="text-dark">
                                        <th class="text-center">{{ $home->id }}</th>
                                        <td class="text-center ">
                                            <div class="d-flex justify-content-center ">
                                                @if ($home->photo)
                                                    <a href="{{ asset('storage/' . $home->photo) }}">
                                                        <img class="rounded-circle"
                                                            src="{{ asset('storage/' . $home->photo) }}"
                                                            alt="Foto de perfil" style="width: 40px; height: 40px;">
                                                    </a>
                                                @else
                                                    <div class="d-flex justify-content-center align-items-center rounded-circle bg-secondary"
                                                        style="width: 40px; height: 40px;">
                                                        <i class="fa fa-images text-white"></i>
                                                    </div>
                                                @endif
                                            </div>
                                            <div>
                                                {{ $home->title }} <br>
                                                <span class="badge bg-dark text-white px-3"
                                                    style="font-size: 12px"><b>{{ number_format($home->price, 2, ',', '.') }}
                                                        Kz</b></span>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            {{ $home->description }} <br>
                                            <span class="badge bg-dark text-white px-3" style="font-size: 12px">
                                                <i class="fas fa-map"></i> <b>
                                                    {{ $home->getAddress->description }},
                                                    {{ $home->getMunicipality->description }},
                                                    {{ $home->getProvince->description }}
                                                </b>
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center ">
                                                @if ($home->getOwner->photo)
                                                    <a href="{{ asset('storage/' . $home->getOwner->photo) }}">
                                                        <img class="rounded-circle"
                                                            src="{{ asset('storage/' . $home->getOwner->photo) }}"
                                                            alt="Foto de perfil" style="width: 40px; height: 40px;">
                                                    </a>
                                                @else
                                                    <div class="d-flex justify-content-center align-items-center rounded-circle bg-secondary"
                                                        style="width: 40px; height: 40px;">
                                                        <i class="fa fa-images text-white"></i>
                                                    </div>
                                                @endif
                                            </div>
                                            <div>
                                                {{ $home->getOwner->first_name }}
                                                {{ $home->getOwner->last_name }} <br>
                                                <span class="badge bg-dark text-white px-3" style="font-size: 12px">
                                                    <b>
                                                        <i class="fas fa-phone-alt"></i> {{ $home->getOwner->phone }}
                                                    </b>
                                                </span>
                                            </div>
                                        </td>
                                        @can('admin')
                                            <td class="text-center">{{ $home->getResponsible->first_name }}
                                                {{ $home->getResponsible->last_name }}</td>
                                        @endcan
                                        <td class="text-center">
                                            @if ($home->status == 'pendente')
                                                <span
                                                    class="badge bg-primary text-white">{{ ucfirst($home->status) }}</span>
                                                <br>

                                                @can('admin')
                                                    <button type="button"
                                                        wire:click.prevent='validateHome({{ $home->id }})'
                                                        class="btn mt-2 btn-sm btn-success text-white">
                                                        Validar
                                                    </button>
                                                @endcan
                                            @else
                                                <span
                                                    class="badge bg-success text-white">{{ ucfirst($home->status) }}</span>
                                            @endif
                                        </td>

                                        <td>
                                            <div class="d-flex">
                                                <button type="button" wire:click='setData({{ $home->id }})'
                                                    class="btn btn-sm btn-dark me-2" data-bs-toggle="modal"
                                                    data-bs-target="#add">
                                                    <i class="fas fa-pen"></i>
                                                </button>
                                                <button type="button" wire:click='delete({{ $home->id }})' class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Nenhum imóvel encontrado.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
    @include('inc.footer')
    @include('livewire.home-rent.modal.add')
</div>
