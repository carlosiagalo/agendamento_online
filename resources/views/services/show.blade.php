@extends('layouts.main')

@section('title', $service->title)

@section('content')

<div class="col-md-10 offset-md-1">
    <div class="row">
        <div id="image-container" class="col-md-6">
            <img src="/img/services/{{$service->image}}" class="img-fluid" alt="{{$service->title}}">
        </div>
        <div id="info-container" class="col-md-6">
            <h1>{{$service->title}}</h1>
            <p class="service-local"><ion-icon name="location-outline"></ion-icon>{{$service->local}}</p>
            <p class="service-profissional"><ion-icon name="person-outline"></ion-icon>{{$service->profissional}}</p>
            <p class="service-price"><ion-icon name="cash-outline"></ion-icon>{{$service->price}}</p>
            <p class="service-duration"><ion-icon name="hourglass-outline"></ion-icon>{{$service->duration}}</p>
            <h6>Formas de pagamento</h6>
            <ul id="payments-list">
                @foreach($service->payments as $payment)
                    <li><ion-icon name="play-outline"></ion-icon><span>{{$payment}}</span></li>
                @endforeach
            </ul>
            <form action="POST" action="/services/join/{{$service->id}}">
                @csrf
            <a
              onclick="event.preventDefault();
               this.closest('form').submit();"
                  href="/services/join/{{$service->id}}" 
                  class="btn btn-primary" id="service-submit">Agendar serviço</a>
            </form>
        </div>
        <div class="col-md-12" id="description-container">
            <h3>Detalhes do serviço:</h3>
            <p class="service-description">{{$service->description}}</p>
        </div>
    </div>
</div>

@endsection