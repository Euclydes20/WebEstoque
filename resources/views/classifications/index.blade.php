@extends('adminlte::page')

@section('title', config('adminlte.title'))
<meta name="csrf_token" content="{{ csrf_token() }}" />

@section('content_header')
    <span style="font-size:20px;">
        <i class="fa fa-database"></i> Lista de Classificações
    </span>
    <a href="{{ route('classifications.create') }}" class="btn btn-success btn-sm">
        <i class="fa fa-plus"></i> Inserir uma nova Classificação
    </a>

    <ol class="breadcrump">
        <li>
            <a href="{{ route('home') }}">Dashboard</a>
        </li>
        <li class="active">
            Lista de Classificações
        </li>
    </ol>

@stop

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-database"></i>
            Relação de registros de classificação
        </div>
    </div>

    <div class="panel-body">
        <table class="table table-striped table-bordered table-hover">
            <thead>
            </thead>
                <td>ID</td>
                <td>Descrição</td>
                <td>Data Criação</td>
                <td>Ações</td>
        </table>
        <tbody>
            @foreach($classifications as $c)
                <tr>
                    <td>{{ $c->id }}</td>
                    <td>{{ $c->descricao }}}</td>
                    <td>{{ $c->created_at->format("dd/mm/Y h:i") }}}</td>
                    <td>
                        <a href="{{ route('classifications.show') }}" class="btn btn-info btn-sm">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="{{ route('classifications.edit') }}" class="btn btn-warning btn-sm">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a href="{{ route('classifications.destroy') }}" class="btn btn-danger btn-sm">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </div>

    <div class="panel-footer">
        {{ $classifications->links() }}
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop