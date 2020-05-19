@extends('layouts.base')

@section('content')
<h1 class="text-center text-white">Vous pouvez trouver votre url raccourci ci
    dessus:</h1>
<div class="text-center text-warning mt-3 w-50 ml-5 offset-4 col-6">
    <a class="text-warning"
        href="{{ Config('app.url') }}/{{ $urlshortened }}">{{ $urlshortened }}</a>

</div>
@endsection
