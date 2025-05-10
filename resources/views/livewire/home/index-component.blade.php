@section('title', 'Página Inicial')
<div>

    <!-- Header Start -->
    <div class="container-fluid bg-dark px-0">
        <div class="row gx-0 wow fadeIn" data-wow-delay="0.1s">
            <div class="col-lg-3 bg-primary d-none d-lg-block">
                <a href="/"
                    class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                    <h1 class="m-0 display-6 text-white text-uppercase">@include('inc.namewebsitewhite')</h1>
                </a>
            </div>
            <div class="col-lg-9">
                <div class="row gx-0 d-none d-lg-flex bg-dark">
                    <div class="col-6 px-5 text-start">
                        <div class="h-100 d-inline-flex align-items-center py-2 me-4">
                            <i class="fa fa-envelope text-primary me-2"></i>
                            <p class="mb-0">info@example.com</p>
                        </div>
                    </div>
                    <div class="col-6 px-5 text-end">
                        <div class="h-100 d-inline-flex align-items-center py-2">
                            <i class="fa fa-phone-alt text-primary me-2"></i>
                            <p class="mb-0">+012 345 6789</p>
                        </div>
                    </div>
                </div>
                <nav class="navbar navbar-expand-lg navbar-dark p-3 p-lg-0 px-lg-5" style="background: #111111;">
                    <a href="/" class="navbar-brand d-block d-lg-none">
                        <h1 class="m-0 display-4 text-primary text-uppercase">@include('inc.namewebsite')</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-bs-toggle="collapse"
                        data-bs-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="/" class="nav-item nav-link active">Início</a>
                            <a href="#about" class="nav-item nav-link">Quem Somos</a>
                            <a href="#mission" class="nav-item nav-link">Nossa Missão</a>
                            <a href="#team" class="nav-item nav-link">Equipa</a>
                            <a href="#contact" class="nav-item nav-link">Contactos</a>
                        </div>
                        <div class="d-none d-lg-flex align-items-center py-2">
                            <a class="btn btn-outline-secondary ms-2 py-2" href="{{ route('pages.login') }}">
                                <i class="fas fa-user pe-1"></i> <span class="text-light">Entrar</span>
                            </a>
                            <a class="btn btn-outline-secondary ms-2 py-2" href="{{route('pages.signup')}}">
                                <i class="fas fa-user pe-1"></i> <span class="text-light">Criar Conta</span>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Hero Start -->
    <div class="container-fluid p-5 mb-5 bg-dark text-secondary">
        <div class="row g-5 py-5">
            <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                <h1 class="display-4 text-secondary text-center mb-0">Encontre aqui o seu novo lar</h1>
            </div>
            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                <img class="img-fluid rounded mb-3"
                    src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80">
                <p>
                    <i class="bi bi-arrow-down animate-up-down" style="font-size: 3rem;"></i>
                </p>
                <p class="mb-0 text-light">
                    Conectamos proprietários e inquilinos de forma simples e rápida. Cadastre seu imóvel com poucos
                    cliques e encontre o inquilino ideal sem complicação.
                </p>
            </div>
            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s" style="min-height: 500px;">
                <div class="position-relative h-100">
                    <img class="position-absolute w-100 h-100 rounded"
                        src="https://images.unsplash.com/photo-1580587771525-78b9dba3b914?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80"
                        style="object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                <p class="text-light">
                    Quer alugar sem dores de cabeça? Use nossos filtros avançados e encontre a casa dos seus sonhos com
                    total segurança e agilidade.
                </p>
                <p>
                    <i class="bi bi-arrow-up animate-up-down" style="font-size: 3rem;"></i>
                </p>
                <img class="img-fluid rounded"
                    src="https://images.unsplash.com/photo-1572120360610-d971b9d7767c?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80">
            </div>
        </div>
    </div>
    <!-- Hero End -->



    <!-- About Start -->
    <div id="about" class="container-fluid p-5">
        <div class="row gx-5">
            <div class="col-lg-5 mb-5 mb-lg-0 wow fadeIn" data-wow-delay="0.1s" style="min-height: 500px;">
                <div class="position-relative h-100">
                    <div class="position-absolute top-0 start-0 animate-rotate" style="width: 160px; height: 160px;">
                        <img class="img-fluid" src="" alt="">
                    </div>
                    <img class="position-absolute w-40 h-40 rounded-circle rounded-bottom rounded-end"
                        src="{{asset('assets/images/logo/whitelogo.png')}}" style="object-fit: cover;" alt="Sobre nós">
                </div>
            </div>
            <div class="col-lg-7">
                <div class="mb-4 wow fadeIn" data-wow-delay="0.2s">
                    <h5 class="section-title">Sobre Nós</h5>
                    <h1 class="display-6 mb-0">Facilitando o Aluguel de Casas com Praticidade</h1>
                </div>
                <p class="mb-4 wow fadeIn" data-wow-delay="0.3s">
                    Somos uma empresa dedicada a conectar proprietários e inquilinos de forma simples e segura.
                    Aqui, os donos de casas podem cadastrar suas casas para aluguel, enquanto os interessados
                    conseguem buscar a moradia ideal de forma rápida e eficiente.
                </p>
                <div class="row">
                    <div id="owners" style="height: 5px" class="col-sm-6 wow fadeIn" data-wow-delay="0.4s">
                        <div class="bg-light rounded p-4">
                            <i class="fas fa-home fa-2x text-white"></i>
                            <h4>Cadastro de Casas</h4>
                            <p class="mb-0 text-white">
                                Proprietários podem anunciar suas casas para aluguel de forma fácil,
                                alcançando um grande número de potenciais inquilinos.
                            </p>
                        </div>
                    </div>
                    <div id="tenants" style="height: 5px" class="col-sm-6 wow fadeIn mb-5" data-wow-delay="0.5s">
                        <div class="bg-light rounded p-4">
                            <i class="fas fa-search fa-2x text-white"></i>
                            <h4>Busca por Casas</h4>
                            <p class="mb-0 text-white">
                                Inquilinos encontram o imóvel perfeito usando nossos filtros inteligentes
                                de busca, localizando rapidamente casas que atendem suas necessidades.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->



    <!-- Fatos Início -->
    <div id="fatos" class="container-fluid bg-dark facts p-5 mt-5 " >
        <div class="row gx-5 gy-4 py-5 mt-5">
            <div class="col-lg-3 col-md-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="d-flex">
                    <div class="rounded-circle d-flex align-items-center justify-content-center mb-3"
                        style="width: 80px; height: 80px; background: #111111;">
                        <i class="fa fa-calendar-alt fs-4 text-primary"></i>
                    </div>
                    <div class="ps-4">
                        <h5 class="text-white">Anos de Experiência</h5>
                        <h1 class="display-5 text-secondary mb-0" data-toggle="counter-up">10</h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeIn" data-wow-delay="0.2s">
                <div class="d-flex">
                    <div class="rounded-circle d-flex align-items-center justify-content-center mb-3"
                        style="width: 80px; height: 80px; background: #111111;">
                        <i class="fa fa-users fs-4 text-primary"></i>
                    </div>
                    <div class="ps-4">
                        <h5 class="text-white">Clientes Satisfeitos</h5>
                        <h1 class="display-5 text-secondary mb-0" data-toggle="counter-up">1500</h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeIn" data-wow-delay="0.3s">
                <div class="d-flex">
                    <div class="rounded-circle d-flex align-items-center justify-content-center mb-3"
                        style="width: 80px; height: 80px; background: #111111;">
                        <i class="fa fa-home fs-4 text-primary"></i>
                    </div>
                    <div class="ps-4">
                        <h5 class="text-white">Casas Cadastrados</h5>
                        <h1 class="display-5 text-secondary mb-0" data-toggle="counter-up">800</h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeIn" data-wow-delay="0.4s">
                <div class="d-flex">
                    <div class="rounded-circle d-flex align-items-center justify-content-center mb-3"
                        style="width: 80px; height: 80px; background: #111111;">
                        <i class="fa fa-handshake fs-4 text-primary"></i>
                    </div>
                    <div class="ps-4">
                        <h5 class="text-white">Contratos Realizados</h5>
                        <h1 class="display-5 text-secondary mb-0" data-toggle="counter-up">500</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fatos Fim -->

    <!-- mission Start -->
    <div id="mission" class="container-fluid p-5">
        <div class="row gx-5">
            <div class="col-lg-12">
                <div class="mb-4 wow fadeIn" data-wow-delay="0.2s">
                    <h5 class="section-title">Nossa Missão</h5>
                    <h1 class="display-6 mb-0">Facilitar o sonho de se conseguir um doce lar atendendo sempre as suas necessidades, desejos e expectativas.</h1>
                </div>
                <p class=" wow fadeIn" data-wow-delay="0.3s">
                    Este projeto é referente a uma plataforma web de intermediação imobiliária, 
                    que conecta os proprietários de imóveis a potenciais compradores e arrendatários, 
                    oferecendo uma experiência rápida, segura e transparente. 
                    A proposta busca profissionalizar o sector frente à concorrência informal 
                    representada pelos intermediários informais, entregando um serviço confiável, 
                    com atendimento personalizado e tecnologia de ponta.
                </p>
            </div>
        </div>
    </div>
    <!-- mission End -->


    <!-- Recursos Início -->
    <div id="recursos" class="container-fluid feature position-relative p-5 pb-0 ">
        <div class="row g-5 gb-5">
            <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="feature-item rounded text-center p-5">
                    <i class="fas fa-home fa-3x"></i>
                    <h3 class="my-4">Cadastro Fácil</h3>
                    <p class="text-light">
                        Cadastre seu imóvel rapidamente com fotos, descrição e preço. Simples e prático para alcançar
                        mais inquilinos.
                    </p>
                    <a class="font-body" style="letter-spacing: 1px;" href="">Saiba Mais <i
                            class="bi bi-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay="0.3s">
                <div class="feature-item rounded text-center p-5">
                    <i class="fas fa-search fa-3x"></i>
                    <h3 class="my-4">Busca Inteligente</h3>
                    <p class="text-light">
                        Encontre casas ideais usando filtros por localização, preço, número de quartos e muito mais.
                    </p>
                    <a class="font-body" style="letter-spacing: 1px;" href="">Saiba Mais <i
                            class="bi bi-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay="0.5s">
                <div class="feature-item rounded text-center p-5">
                    <i class="fas fa-headset fa-3x"></i>
                    <h3 class="my-4">Suporte Personalizado</h3>
                    <p class="text-light">
                        Nossa equipe está pronta para ajudar proprietários e inquilinos em todas as etapas do processo.
                    </p>
                    <a class="font-body" style="letter-spacing: 1px;" href="">Saiba Mais <i
                            class="bi bi-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-lg-12 col-md-6 text-center wow fadeIn" data-wow-delay="0.1s">
                <h1 class="display-4 text-secondary mb-4">
                    <span class="text-primary">30% de Desconto</span><br> nas Taxas de Cadastro Este Mês
                </h1>
                <a href="" class="btn btn-primary py-3 px-5">Cadastre seu Imóvel</a>
            </div>
        </div>
    </div>
    <!-- Recursos Fim -->


    <!-- Team Start -->
    <div id="team" class="container-fluid p-5">
        <div class="mb-5 text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px; margin: auto;">
            <h5 class="section-title">Nossa Equipe</h5>
            <h1 class="display-6 mb-0">Pessoas que Transformam Espaços em Experiências</h1>
        </div>
        <div class="row g-5 mt-4">
            <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="team-item position-relative">
                    <div class="position-relative overflow-hidden rounded-circle rounded-bottom rounded-end">
                        <img class="img-fluid w-100" src="img/team-1.jpg" alt="">
                        <div class="team-overlay">
                            <div class="d-flex align-items-center justify-content-start">
                                <a class="btn btn-light btn-square rounded-circle mx-1" href="#"><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-light btn-square rounded-circle mx-1" href="#"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-light btn-square rounded-circle mx-1" href="#"><i
                                        class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="position-absolute start-0 bottom-0 d-flex flex-column justify-content-center w-100 rounded-bottom text-center"
                        style="height: 100px; background: rgba(34, 36, 41, .9);">
                        <h5 class="text-light">Joana Silva</h5>
                        <p class="small text-uppercase text-secondary m-0" style="letter-spacing: 3px;">Especialista
                            em Locação Sustentável</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay="0.3s">
                <div class="team-item position-relative">
                    <div class="position-relative overflow-hidden rounded-circle rounded-bottom rounded-end">
                        <img class="img-fluid w-100" src="img/team-2.jpg" alt="">
                        <div class="team-overlay">
                            <div class="d-flex align-items-center justify-content-start">
                                <a class="btn btn-light btn-square rounded-circle mx-1" href="#"><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-light btn-square rounded-circle mx-1" href="#"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-light btn-square rounded-circle mx-1" href="#"><i
                                        class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="position-absolute start-0 bottom-0 d-flex flex-column justify-content-center w-100 rounded-bottom text-center"
                        style="height: 100px; background: rgba(34, 36, 41, .9);">
                        <h5 class="text-light">Carlos Mendes</h5>
                        <p class="small text-uppercase text-secondary m-0" style="letter-spacing: 3px;">Consultor de
                            Bem-Estar & Espaços Verdes</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay="0.5s">
                <div class="team-item position-relative">
                    <div class="position-relative overflow-hidden rounded-circle rounded-bottom rounded-end">
                        <img class="img-fluid w-100" src="img/team-3.jpg" alt="">
                        <div class="team-overlay">
                            <div class="d-flex align-items-center justify-content-start">
                                <a class="btn btn-light btn-square rounded-circle mx-1" href="#"><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-light btn-square rounded-circle mx-1" href="#"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-light btn-square rounded-circle mx-1" href="#"><i
                                        class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="position-absolute start-0 bottom-0 d-flex flex-column justify-content-center w-100 rounded-bottom text-center"
                        style="height: 100px; background: rgba(34, 36, 41, .9);">
                        <h5 class="text-light">Mariana Costa</h5>
                        <p class="small text-uppercase text-secondary m-0" style="letter-spacing: 3px;">Coordenadora
                            de Experiência do Hóspede</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->



    <!-- Testimonial Start -->
    <div class="container-fluid p-0 my-5">
        <div class="row g-0">
            <div class="col-lg-12 bg-dark p-5 overflow-hidden wow fadeIn" data-wow-delay="0.3s"
                style="border-bottom-right-radius: 50%;">
                <div class="mb-5">
                    <h5 class="section-title">Depoimentos</h5>
                    <h1 class="display-3 text-secondary mb-0">O que nossos clientes dizem</h1>
                </div>
                <div class="owl-carousel testimonial-carousel">
                    <div class="testimonial-item">
                        <p class="fs-4 fw-normal text-light mb-4">
                            <i class="fa fa-quote-left text-primary me-3"></i>
                            Alugar a Casa Verde Horizonte foi uma experiência transformadora! O espaço é lindo,
                            confortável e totalmente alinhado com nossos valores veganos. Nos sentimos em casa desde o
                            primeiro dia.
                        </p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid rounded-circle" src="img/testimonial-1.jpg" alt="">
                            <div class="ps-4">
                                <h5 class="text-secondary">Amanda Reis</h5>
                                <span class="small text-uppercase text-secondary"
                                    style="letter-spacing: 3px;">Empreendedora Sustentável</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <p class="fs-4 fw-normal text-light mb-4">
                            <i class="fa fa-quote-left text-primary me-3"></i>
                            Ficamos no Chalé Eco Montanha no fim de semana e foi mágico! Um refúgio perfeito para quem
                            busca paz, natureza e um estilo de vida consciente. Recomendo muito!
                        </p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid rounded-circle" src="img/testimonial-2.jpg" alt="">
                            <div class="ps-4">
                                <h5 class="text-secondary">Ricardo Lima</h5>
                                <span class="small text-uppercase text-secondary"
                                    style="letter-spacing: 3px;">Fotógrafo de Natureza</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <p class="fs-4 fw-normal text-light mb-4">
                            <i class="fa fa-quote-left text-primary me-3"></i>
                            O Apto Vegano Urbano foi perfeito para minha temporada na cidade. Ambiente acolhedor,
                            decoração consciente e perto de tudo. Nunca pensei que poderia me sentir tão bem fora de
                            casa!
                        </p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid rounded-circle" src="img/testimonial-3.jpg" alt="">
                            <div class="ps-4">
                                <h5 class="text-secondary">Fernanda Martins</h5>
                                <span class="small text-uppercase text-secondary"
                                    style="letter-spacing: 3px;">Designer Gráfica</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->




    <!-- Footer Start -->
    <div id="contact" class="container-fluid bg-dark text-secondary px-5">
        <div class="row gx-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="col-lg-12 col-md-6">
                <div class="row gx-5">
                    <div class="col-lg-4 col-md-12 pt-5 mb-5">
                        <h3 class="text-light mb-4">Fale Conosco</h3>
                        <div class="d-flex mb-2">
                            <i class="bi bi-geo-alt text-primary me-2"></i>
                            <p class="mb-0">Maianga, Luanda, Angola</p>
                        </div>
                        <div class="d-flex mb-2">
                            <i class="bi bi-envelope-open text-primary me-2"></i>
                            <p class="mb-0">contato@aluguelcasas.com</p>
                        </div>
                        <div class="d-flex mb-2">
                            <i class="bi bi-telephone text-primary me-2"></i>
                            <p class="mb-0">+55 11 91234-5678</p>
                        </div>
                        <div class="d-flex mt-4">
                            <a class="btn btn-primary btn-square rounded-circle me-2" href="#"><i
                                    class="fab fa-twitter"></i></a>
                            <a class="btn btn-primary btn-square rounded-circle me-2" href="#"><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-primary btn-square rounded-circle me-2" href="#"><i
                                    class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-primary btn-square rounded-circle" href="#"><i
                                    class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                        <h3 class="text-light mb-4">Links Úteis</h3>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="#"><i
                                    class="bi bi-arrow-right text-primary me-2"></i>Início</a>
                            <a class="text-secondary mb-2" href="#about"><i
                                    class="bi bi-arrow-right text-primary me-2"></i>Sobre Nós</a>
                            <a class="text-secondary mb-2" href="#mission"><i
                                    class="bi bi-arrow-right text-primary me-2"></i>Nossa Missão</a>
                            <a class="text-secondary mb-2" href="#team"><i
                                    class="bi bi-arrow-right text-primary me-2"></i>Equipa</a>
                            <a class="text-secondary mb-2" href="#"><i
                                    class="bi bi-arrow-right text-primary me-2"></i>Nossas Casas</a>
                            <a class="text-secondary" href="#contact"><i
                                    class="bi bi-arrow-right text-primary me-2"></i>Contacto</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                        <h3 class="text-light mb-4">Mais Informações</h3>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="#"><i
                                    class="bi bi-arrow-right text-primary me-2"></i>Como Funciona</a>
                            <a class="text-secondary mb-2" href="#"><i
                                    class="bi bi-arrow-right text-primary me-2"></i>Intermediários</a>
                            <a class="text-secondary mb-2" href="#"><i
                                    class="bi bi-arrow-right text-primary me-2"></i>Arrendadores</a>
                            <a class="text-secondary mb-2" href="#"><i
                                    class="bi bi-arrow-right text-primary me-2"></i>Dicas</a>
                            <a class="text-secondary mb-2" href="#"><i
                                    class="bi bi-arrow-right text-primary me-2"></i>Blog</a>
                            <a class="text-secondary" href="#"><i
                                    class="bi bi-arrow-right text-primary me-2"></i>Ajuda</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-4 py-lg-0 px-5" style="background: #111111;">
        <div class="row gx-5">
            <div class="col-lg-8">
                <div class="py-lg-4 text-md-start">
                    <p class="text-light mb-0">&copy; 2025 <a href="#">@include('inc.namewebsite')</a>, Todos
                        direitos reservados.
                    </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="py-lg-4 text-center credit">
                    <p class="text-light mb-0">@include('inc.developer')</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->
</div>
