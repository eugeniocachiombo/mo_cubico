@section('title', 'Painel Principal')
<div class="content">

    @include('inc.header')

    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-home fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Total</p>
                        <h6 class="mb-0">{{ count($total) }}</h6>
                    </div>
                </div>
            </div>
            @if (!Gate::allows('inquilino'))
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-clock fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Pendentes</p>
                            <h6 class="mb-0">{{ count($pendings) }}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-check fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Validados</p>
                            <h6 class="mb-0">{{ count($validates) }}</h6>
                        </div>
                    </div>
                </div>
            @endif
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-hands fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Contratos</p>
                        <h6 class="mb-0">0</h6>
                    </div>
                </div>
            </div>
            @if (Gate::allows('inquilino'))
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-users fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Arrendadores</p>
                        <h6 class="mb-0">{{ count($owners) }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-users fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Intermediários</p>
                        <h6 class="mb-0">{{ count($intermediates) }}</h6>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
    <!-- Sale & Revenue End -->

    <!-- Users Chart Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-6">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Utilizadores</h6>
                        <a href="">Mostrar Tudo</a>
                    </div>
                    <canvas id="worldwide-sales"></canvas>
                </div>
            </div>
            <div class="col-sm-12 col-xl-6">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Documentos Emitidos</h6>
                        <a href="">Mostrar Tudo</a>
                    </div>
                    <canvas id="salse-revenue"></canvas>
                </div>
            </div>
        </div>
    </div>
    <!-- Sales Chart End -->

    <!--  Contratos Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Contratos Recentes</h6>
                <a href="">Mostrar Tudo</a>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-white">
                            <th scope="col"><input class="form-check-input" type="checkbox"></th>
                            <th scope="col">Data</th>
                            <th scope="col">Fatura</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input class="form-check-input" type="checkbox"></td>
                            <td>01 Jan 2045</td>
                            <td>INV-0123</td>
                            <td>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</td>
                            <td>$123</td>
                            <td>Pago</td>
                            <td><a class="btn btn-sm btn-primary" href="">Detalhe</a></td>
                        </tr>
                        <tr>
                            <td><input class="form-check-input" type="checkbox"></td>
                            <td>01 Jan 2045</td>
                            <td>INV-0123</td>
                            <td>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</td>
                            <td>$123</td>
                            <td>Pago</td>
                            <td><a class="btn btn-sm btn-primary" href="">Detalhe</a></td>
                        </tr>
                        <tr>
                            <td><input class="form-check-input" type="checkbox"></td>
                            <td>01 Jan 2045</td>
                            <td>INV-0123</td>
                            <td>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</td>
                            <td>$123</td>
                            <td>Pago</td>
                            <td><a class="btn btn-sm btn-primary" href="">Detalhe</a></td>
                        </tr>
                        <tr>
                            <td><input class="form-check-input" type="checkbox"></td>
                            <td>01 Jan 2045</td>
                            <td>INV-0123</td>
                            <td>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</td>
                            <td>$123</td>
                            <td>Pago</td>
                            <td><a class="btn btn-sm btn-primary" href="">Detalhe</a></td>
                        </tr>
                        <tr>
                            <td><input class="form-check-input" type="checkbox"></td>
                            <td>01 Jan 2045</td>
                            <td>INV-0123</td>
                            <td>{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</td>
                            <td>$123</td>
                            <td>Pago</td>
                            <td><a class="btn btn-sm btn-primary" href="">Detalhe</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Recent Contratos End -->

    <!-- Widgets End -->

    @include('inc.footer')
</div>
