@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Perfil de Usuario</h1>
        <p>Bienvenido a tu perfil, {{ Auth::user()->name }}.</p>
    </div>
@endsection
