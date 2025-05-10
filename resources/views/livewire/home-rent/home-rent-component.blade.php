@section('title', 'Imóveis')
<div class="content">

    @include('inc.header')

    <div class="container-fluid pt-4 px-4">
        <div class="row bg-secondary rounded align-items-center justify-content-center mx-0" style="min-height: 65vh">
            <div class="row pt-4 pb-2">
                @if (!Gate::allows('inquilino'))
                    <div class="col-6">
                        <h4>Registrar Imóvel</h4>
                    </div>
                    <div class="col-6 d-flex justify-content-end ">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add">
                            <i class="fas fa-plus-circle"></i> Registrar
                        </button>
                    </div>
                @endif
            </div>

            <div class="row">
                <hr>
            </div>

            <div class="col-12">
                <div class="bg-secondary">
                    <h6 class="mb-4">Lista de Imóveis em Renda</h6>
                    <div class="table-responsive">
                        <table class="table table-hover datatablePT py-4">
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
                                                <span class=" bg-dark text-white px-3"
                                                    style="font-size: 12px"><b>{{ number_format($home->price, 2, ',', '.') }}
                                                        Kz</b></span>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            {{ $home->description }} <br>
                                            <span class=" bg-dark text-white px-3"
                                                    style="font-size: 12px">
                                                    <b>
                                                        {{ $home->getAddress->description }},
                                                        {{ $home->getMunicipality->description }},
                                                        {{ $home->getProvince->description }}
                                                    </b>
                                            </span>
                                        </td>
                                        <td class="text-center">{{ $home->getOwner->first_name }}
                                            {{ $home->getOwner->last_name }}</td>
                                        @can('admin')
                                            <td class="text-center">{{ $home->getResponsible->first_name }}
                                                {{ $home->getResponsible->last_name }}</td>
                                        @endcan
                                        <td class="text-center">{{ ucfirst($home->status) }}</td>
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
    @include('livewire.home-rent.modal.add')
    @include('inc.footer')
</div>
