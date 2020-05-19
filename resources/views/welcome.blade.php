@extends('layouts.base')

@section('content')
<form method="POST">
    {{ csrf_field() }}
    <div class="container">
        <div class="row">
            <div class="col-xl-9 mx-auto">
                <h1 class="mb-5 text-center mt-5">Meilleur Raccourcisseur Url
                </h1>
            </div>
            <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                <form>
                    <div class="form-row">
                        <div class="col-12 col-md-9 mb-2 mb-md-0">
                            <input type="text" name="url"
                                class="form-control form-control-lg"
                                placeholder="Entrer l'url que vous voullez raccourcir...">
                        </div>
                        <div class="col-12 col-md-3">
                            <button type="submit"
                                class="btn btn-block btn-lg btn-primary">Raccourcir</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--
    <input type="text" name="url" id="url"
        placeholder="Entrer l'url que vous voullez raccourcir">
    <input type="submit" value="Raccourcir" name="raccourcir">
</form>
-->
    @endsection
