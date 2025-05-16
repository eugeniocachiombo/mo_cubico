@php
    $page = \Illuminate\Support\Facades\Route::currentRouteName() == 'home.index';
@endphp
<div class="container-fluid card card-animated mt-4 {{$page ? 'bg-white' : 'bg-secondary' }}">
    <div class="container py-5">
        <div class="row text-center">
            <h3 class="{{$page ? 'text-dark' : '' }}"><i class="fas fa-home fa-2x"></i> Imóveis Disponíveis</h3>
        </div>
        <hr>
        <div id="homesCarousel" class="carousel slide " data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($homes->chunk(3) as $index => $homeChunk)
                
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                        <div class="row g-5 ">
                            @foreach ($homeChunk as $home)
                                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                                   
                                    <div class="position-relative mb-8">
                                        @if ($home->photo)
                                            <img class="img-fluid rounded card-animated" src="{{ asset('storage/' . $home->photo) }}"
                                                alt="Imagem do imóvel" style="object-fit: cover; height: 200px;">
                                        @else
                                            <div class="d-flex justify-content-center align-items-center bg-secondary"
                                                style="width: 100%; height: 200px;">
                                                <i class="fa fa-images text-white " style="font-size: 3rem;"></i>
                                            </div>
                                        @endif
                                        <div class="mt-3">
                                            <h5 class="{{$page ? 'text-dark' : '' }}">{{ $home->title }}</h5>
                                            <p class="mb-1 text-light">
                                                {{ $home->description }} <br>
                                                <span style="font-size: 18px"
                                                    class="badge bg-dark text-white">{{ number_format($home->price, 2, ',', '.') }}
                                                    Kz</span>
                                            </p>
                                            <span class="badge bg-dark text-white">
                                                <i class="fas fa-map"></i>
                                                <b>{{ $home->getAddress->description }},
                                                    {{ $home->getMunicipality->description }},
                                                    {{ $home->getProvince->description }}</b>
                                                    <a href="http://googlemap.com">
                                                        <button class="btn btn-primary btn-sm ms-2" type="button">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                    </a>
                                            </span>
                                        </div>
        
                                        <div class="mt-3 text-light">
                                            <h6 class="{{$page ? 'text-dark' : '' }}">Proprietário</h6>
                                            <div class="d-flex align-items-center">
                                                @if ($home->getOwner->photo)
                                                    <img class="rounded-circle"
                                                        src="{{ asset('storage/' . $home->getOwner->photo) }}"
                                                        alt="Foto do proprietário" style="width: 40px; height: 40px;">
                                                @else
                                                    <div class="d-flex justify-content-center align-items-center rounded-circle bg-secondary"
                                                        style="width: 40px; height: 40px;">
                                                        <i class="fa fa-user text-white"></i>
                                                    </div>
                                                @endif
                                                <div class="ms-3">
                                                    <b>{{ $home->getOwner->first_name }} {{ $home->getOwner->last_name }}</b>
                                                    <br>
                                                    <span><i class="fas fa-phone-alt"></i> {{ $home->getOwner->phone }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                
                @endforeach
            </div>
            <!-- Controles de navegação do carrossel -->
            <button class="carousel-control-prev " type="button" data-bs-target="#homesCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon  {{$page ? 'bg-dark' : '' }}" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next " type="button" data-bs-target="#homesCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon {{$page ? 'bg-dark' : '' }}" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>
