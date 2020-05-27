
@extends('layouts.layout')

@section('content')
<h3>Editar Cliente</h3>

@include('form._errors')

{{ Form::model(
    $client,
    [
        'route' => ['clients.update', $client->id],
        'method' => 'PUT'
    ]
) }}

    @include('admin.clients._form')

{{ Form::close() }}
@endsection
