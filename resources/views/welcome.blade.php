@extends('layouts.main')

@section('title','Agendamento Online')

@section('content')


<!-- <img src="/img/banner.jpg" alt="">  -->

<div id="search-container" class="col-md-12">
    <h1>Busque por serviço</h1>
    <form action="/" method="GET">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar">
    </form>
</div>
<div id="services-container" class="col-md-12">
    @if($search)
    <h2>Buscando por: <strong>{{$search}}</strong> </h2>
    @else
    <h2>Serviços</h2>
    @endif
    <p class="subtitle">Agende o seviço que deseja</p>
    <div id="cards-container" class="row">
        @foreach($services as $service)
        <div class="card col-md-3">
            <img src="/img/services/{{$service->image}}" alt="{{$service->title}}">
            <div class="card-body">
            <p class="card-price">{{$service->price}}</p>
                <h4 class="card-title"> {{$service->title}} </h4>
                <p class="card-profissional">{{$service->profissional}}</p>
                <p class="card-description">{{$service->description}}</p>
                
                <a href="/services/{{$service->id}}" class="btn btn-primary">Agendar</a>
            </div>
        </div>
        @endforeach
        @if(count($services) == 0 && $search)
            <p>Não foi possível encontrar serviços com o termo {{$search}}! <a href="/">Ver todos</a></p>
        @elseif(count($services) == 0)
            <p>Não há serviços cadastrados</p>
        @endif
    </div>
</div>

@endsection
