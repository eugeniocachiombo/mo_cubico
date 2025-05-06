<!DOCTYPE html>
<html lang="pt-BR">

@include('inc.head')

<body>
    <div class="container-fluid position-relative d-flex p-0">
        
        @include('inc.loading')

        @include('inc.sidebar')


        <!-- Content Start -->
        {{$slot}}
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    @include('inc.foot')
</body>

</html>