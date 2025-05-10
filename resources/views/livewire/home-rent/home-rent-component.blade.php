@section('title', 'Imóveis')
<div class="content">

    @include('inc.header')

    <div class="container-fluid pt-4 px-4">
        <div class="row bg-secondary rounded align-items-center justify-content-center mx-0" style="min-height: 65vh">
            <div class="row pt-4 pb-2">
                <div class="col-6">
                    <h4>Registrar Imóvel</h4>
                </div>
                <div class="col-6 d-flex justify-content-end ">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add">
                        <i class="fas fa-plus-circle"></i> Registrar
                    </button>
                </div>
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
                                    <th scope="col">#</th>
                                    <th scope="col">Título</th>
                                    <th scope="col">Descrição</th>
                                    <th scope="col">Preço</th>
                                    <th scope="col">Proprietário</th>
                                    @if (auth()->user()->access_id == 1)
                                        <th scope="col">Responsável</th>
                                    @endif
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($homes as $index => $home)
                                    <tr class="text-dark">
                                        <th>{{ $home->id }}</th>
                                        <td>{{ $home->title }}</td>
                                        <td>{{ $home->description }}</td>
                                        <td>{{ $home->price }}</td>
                                        <td>{{ $home->getOwner->first_name }} {{ $home->getOwner->last_name }}</td>
                                        @if (auth()->user()->access_id == 1)
                                            <td>{{ $home->getResponsible->first_name }} {{ $home->getResponsible->last_name }}</td>
                                        @endif
                                        <td>{{ ucfirst($home->status) }}</td>
                                    </tr>
                                @endforeach

                                @if ($homes->isEmpty())
                                    <tr>
                                        <td colspan="6" class="text-center">Nenhum imóvel encontrado.</td>
                                    </tr>
                                @endif
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
