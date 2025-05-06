@section('title', 'Página de Erro')
<div class="container-fluid pt-4 px-4">
    <div class="row vh-100 bg-secondary rounded align-items-center justify-content-center mx-0">
        <div class="col-md-6 text-center p-4">
            <i class="bi bi-exclamation-triangle display-1 text-primary"></i>
            <h1 class="display-1 fw-bold">404</h1>
            <h1 class="mb-4">Página Não Encontrada</h1>
            <p class="mb-4">Desculpe, a página que você procurou não existe em nosso site! Talvez vá para a nossa página inicial ou tente usar a busca?</p>
            <a class="btn btn-primary rounded-pill py-3 px-5" href="{{route("pages.login")}}">Voltar para a Página Inicial</a>
        </div>
    </div>
</div>
