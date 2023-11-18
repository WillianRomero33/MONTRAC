@extends('layouts.app', ['pageSlug' => 'dashboard'])

@auth
<script type="text/javascript">
    window.location = "{{ url('/home') }}";//here double curly bracket
</script>
@else
@section('content')
<div class="header py-8 py-lg-10">
    <div class="container">
        <div class="header-body text-center mb-7">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-8">
                    <img class="" alt="" src="{{asset('black/img/bienvenidos.png')}}"  style=" width: 750px; height: 100px;"/>
                    <p class="text-lead " style="font-size: 60px;">
                        {{ __('Monitor de Medios de Transporte') }}
                    </p>
                </div>
                <img class="w-100" alt="" src="{{asset('black/img/zf-pacifico.jpg')}}" style="background-size:cover"/>
            </div>
        </div>
    </div>
</div>
@endsection
@endauth