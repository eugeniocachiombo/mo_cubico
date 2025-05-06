<!DOCTYPE html>
<html lang="pt-B">

@include('inc.head')

<body>
    @include('inc.loading')
    
    {{$slot}}

    @include('inc.foot')
</body>

</html>