@section('title', 'Terminar Sessão')
<style>
    .image-container {
        position: relative;
        display: inline-block;
    }

    .image-container::before {
        content: '';
        position: absolute;
        top: -10px;
        left: -10px;
        width: calc(100% + 20px);
        height: calc(100% + 20px);
        border: 4px solid transparent;
        border-top: 4px solid #f00; /* Cor do spinner — pode trocar */
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    .image-fluid {
        border-radius: 30px;
        animation: anime 2s infinite;
    }

    @keyframes anime {
        0% {
            opacity: 20%;
        }
        50% {
            opacity: 100%;
        }
        100% {
            opacity: 20%;
        }
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }
</style>

<div style="background: #000; min-width:inherit; min-height:100vh"
    class="container-fluid d-flex justify-content-center align-items-center">
    <div class="image-container">
        <img class="image-fluid" style="width: 100px"
            src="{{ asset('assets/images/logo/redlogo.png') }}" alt="#" />
    </div>
</div>
