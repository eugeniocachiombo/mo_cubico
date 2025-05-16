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
<!-- Spinner Start -->

@php
    $darkM = auth()->user()->getDarkMode ?? false;
    $logo = $darkM ? 'redlogo' : 'blacklogo'; 
@endphp
<div id="spinner" class="show position-fixed translate-middle 
w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center"
style="background: {{ $darkM ? '' : 'white' }};">
    {{--<div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>--}}
    
    <div style="background: {{ $darkM ? '' : 'white' }}; min-width:inherit; min-height:100vh"
        class="container-fluid d-flex justify-content-center align-items-center">
        <div class="image-container">
            <img class="image-fluid" style="width: 100px"
                src="{{ asset('assets/images/logo/'.$logo.'.png') }}" alt="#" />
        </div>
    </div>
    
</div>
<!-- Spinner End -->