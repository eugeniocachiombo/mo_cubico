{{--<i class="fa fa-home me-2"></i>--}}
@php
    $darkM = auth()->user()->getDarkMode ?? false;
    $logo = $darkM ? 'redlogo' : 'blacklogo'; 
@endphp
<img style="width: 30px" src="{{asset('assets/images/logo/'.$logo.'.png')}}" alt=""> 
<span class="{{$darkM ? '' : 'text-dark' }}">MÔkubico</span> 