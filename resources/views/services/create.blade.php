@extends('layouts.main')

@section('title', 'Criar Serviços')

@section('content')
<div id="service-create-container" class="col-md-6 offset-md-3">
    <h1>Criei seu serviço</h1>
    <form action="/services" method="POST" id="form-create" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="image">Imagem serviço:</label>
            <input type="file" class="form-control" id="image" name="image" class="form-control-file">
        </div>
        <div class="form-group">
            <label for="title">Serviço:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Título do serviço">
        </div>
        <div class="form-group">
            <label for="description">Descrição:</label>
            <textarea name="description" id="description" class="form-control" placeholder="Descrição do serviço"></textarea>
        </div>
        <div class="form-group">
            <label for="price">Valor:</label>
            <input type="text" class="form-control" id="price" name="price" placeholder="Valor">
        </div>
        <div class="form-group">
            <label for="duration">Duração:</label>
            <input type="time" class="form-control" id="duration" name="duration" placeholder="Horário">
        </div>
        <div class="form-group">
            <label for="profissional">Profissional:</label>
            <input type="text" class="form-control" id="profissional" name="profissional" placeholder="Nome do profissional">
        </div>
        <div class="form-group">
            <label for="local">Local:</label>
            <select name="local" id="local" class="form-control">
                <option value="Sala 1">Selecione a sala</option>
                <option value="Sala 1">Sala 01</option>
                <option value="Sala 2">Sala 02</option>
                <option value="Sala 3">Sala 03</option>
                <option value="Sala 4">Sala 04</option>
                <option value="Sala 5">Sala 04</option>
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
        <input type="submit" value="Criar Serviço" class="btn btn-primary" style="margin-top: 15px;">
    </form>
</div>
@endsection