@extends('layouts.app')

@section('content')
    <div class="header py-7 py-lg-8">
        <div class="container">
            <div class="header-body text-center mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                        <h1 class="text-white">{{ __('Bienvenido!') }}</h1>
                        <p class="text-lead text-light">
                            {{ __('Monitor de Medios de Transporte') }}
                        </p>
                    </div>
                    <img class="w-100" alt="" src="{{asset('black/img/zf-pacifico.jpg')}}" style="background-image:url('black/img/zf-pacifico.jpg'), background-size:cover"/>
                </div>
            </div>
        </div>
    </div>
@endsection
