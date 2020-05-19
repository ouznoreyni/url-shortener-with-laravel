@extends('layouts.base')

@section('content')
<h1>Vous pouvez trouver votre url raccourci ci dessus:</h1>
<a href="{{ Config('app.url') }}/{{ $urlshortened }}">{{ $urlshortened }}</a>
@endsection
