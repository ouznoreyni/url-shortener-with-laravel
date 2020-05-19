@extends('layouts.base')

@section('content')
<form method="POST">
    {{ csrf_field() }}
    <div class="container">
        <div class="row">
            <div class="col-xl-9 mx-auto">
                <h1 class="mb-5 text-white text-center mt-5">Raccourcisseur Url
                </h1>
            </div>
            <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                <form>
                    <div class="form-row">
                        <div class="col-12 col-md-9 mb-2 mb-md-0">
                            <input type="text" name="url"
                                class="form-control form-control-lg"
                                placeholder="exemple: http://ousmane.com"
                                value="{{ old('url') }}">
                        </div>
                        <div class="col-12 col-md-3">
                            <button type="submit"
                                class="btn btn-block btn-lg btn-warning">Raccourcir</button>
                        </div>

                        {!!
                        $errors->first(
                        'url',
                        '<div
                            class="col-12 col-md-9 mb-2 mb-md-0 text-warning text-center mt-3 font-weight-bold">
                            :message
                        </div>
                        ')
                        !!}
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
