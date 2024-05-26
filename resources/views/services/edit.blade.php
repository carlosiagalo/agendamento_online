@extends('layouts.main')

@section('title', 'Editando ' . $service->title)

@section('content')
<div id="service-create-container" class="col-md-6 offset-md-3">
    <h1>Editando: {{$service->title}}</h1>
    <form action="/services/update/{{$service->id}}" method="POST" id="form-create" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="image">Imagem serviço:</label>
            <input type="file" class="form-control" id="image" name="image" class="form-control-file">
            <img src="/img/services/{{$service->image}}" alt="{{$service->title}}" class="img-preview">
        </div>
        <div class="form-group">
            <label for="title">Serviço:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Título do serviço" value="{{$service->title}}">
        </div>
        <div class="form-group">
            <label for="description">Descrição:</label>
            <textarea name="description" id="description" class="form-control" placeholder="Descrição do serviço">{{$service->description}}</textarea>
        </div>
        <div class="form-group">
            <label for="price">Valor:</label>
            <input type="text" class="form-control" id="price" name="price" placeholder="Valor" value="{{$service->price}}">
        </div>
        <div class="form-group">
            <label for="duration">Duração:</label>
            <input type="time" class="form-control" id="duration" name="duration" placeholder="Horário" value="{{$service->duration}}">
        </div>
        <div class="form-group">
            <label for="profissional">Profissional:</label>
            <input type="text" class="form-control" id="profissional" name="profissional" placeholder="Nome do profissional" value="{{$service->profissional}}">
        </div>
        <div class="form-group">
            <label for="local">Local:</label>
            <select name="local" id="local" class="form-control">
                <option value="Sala 1">Selecione a sala</option>
                <option value="Sala 1" {{$service->local == "Sala 1" ? "selected" : ""}}>Sala 01</option>
                <option value="Sala 2" {{$service->local == "Sala 2" ? "selected" : ""}}>Sala 02</option>
                <option value="Sala 3" {{$service->local == "Sala 3" ? "selected" : ""}}>Sala 03</option>
                <option value="Sala 4" {{$service->local == "Sala 4" ? "selected" : ""}}>Sala 04</option>
                <option value="Sala 5" {{$service->local == "Sala 5" ? "selected" : ""}}>Sala 04</option>
            </select>
        </div>
        <div class="form-group">
            <label for="payments">Formas de pagamento:</label>
            <div class="form-group">
                <input type="checkbox" name="payments[]" value="Dinheiro"> Dinheiro
            </div>
            <div class="form-group">
                <input type="checkbox" name="payments[]" value="Pix"> PIX
            </div>
            <div class="form-group">
                <input type="checkbox" name="payments[]" value="Cartão de Crédito"> Cartão Crédito
            </div>
            <div class="form-group">
                <input type="checkbox" name="payments[]" value="Cartão de Débito"> Cartão Débito
            </div>
        </div>
        <input type="submit" value="Editar Serviço" class="btn btn-primary" style="margin-top: 15px;">
    </form>
</div>
@endsection