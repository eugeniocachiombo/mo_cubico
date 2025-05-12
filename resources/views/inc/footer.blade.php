<!-- Footer Start -->
<div class="container-fluid pt-4 px-4">
    <div class="{{auth()->user()->getDarkMode ? 'bg-secondary' : 'bg-white' }} rounded-top p-4">
        <div class="row">
            <div class="col-12 col-sm-6 {{auth()->user()->getDarkMode ? '' : 'text-dark' }} text-center text-sm-start">
                &copy; 2025 <a href="#">@include('inc.namewebsite')</a>, Todos direitos reservados. 
            </div>
            <div class="col-12 col-sm-6 {{auth()->user()->getDarkMode ? '' : 'text-dark' }} text-center text-sm-end" style="font-weight: bold">
                @include('inc.developer')
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->