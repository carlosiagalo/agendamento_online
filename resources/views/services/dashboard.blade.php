@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>
        Meus serviços
    </h1>
</div>

<div class="col-md-10 offset-md-1 dashboard-services-container">
    @if(count($services) > 0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Clientes</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $service)
                <tr>
                    <th scope="row">{{$loop->index + 1}}</th>
                    <td><a href="/services/{{$service->id}}">{{$service->title}}</a></td>
                    <td>0</td>
                    <td>
                        <a href="/services/edit/{{$service->id}}" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon> Editar</a>
                        <form action="/services/{{$service->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-btn" ><ion-icon name="trash-outline"></ion-icon>Deletar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Você ainda não possui serviços, para cadastrar <a href="/services/create">clique aqui!</a></p>
    @endif
</div>


@endsection