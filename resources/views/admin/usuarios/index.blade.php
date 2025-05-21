@extends('adminlte::page')

@section('title', 'Lista de Usuarios')

@section('content_header')
    <h1>Lista de Usuarios</h1>
@stop

@section('content')
   @livewire('admin.users-index')
@stop

@section('css')
   
@stop

@section('js')
    <script> console.log('Página de usuarios'); </script>
@stop
