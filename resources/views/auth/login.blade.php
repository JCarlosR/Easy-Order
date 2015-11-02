@extends('...app')

@section('menu-options')
    <li class="dropdown"><a href="{{ url('/') }}">Home</a></li>
    <li class="dropdown active"><a href="#">Ingresar</a></li>
    <li class="dropdown"><a href="{{ url('registro') }}">Registrar</a></li>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <header>
                    <h1>Inicio de sesión</h1>
                </header>
                <form action="{{ url('ingresar') }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="username">Usuario</label>
                        <input type="text" class="form-control" name="username" placeholder="Usuario">
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Ingresar</button>
                </form>
            </div>
        </div>
    </div>
@endsection