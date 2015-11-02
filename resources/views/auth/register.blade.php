@extends('...app')

@section('menu-options')
    <li class="dropdown"><a href="{{ url('/') }}">Home</a></li>
    <li class="dropdown"><a href="{{ url('ingresar') }}">Ingresar</a></li>
    <li class="dropdown active"><a href="#">Registrar</a></li>
@endsection

@section('content')
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
    <div class="container">
        <header>
            <h1>Registro de usuario</h1>
        </header>
        <div class="row">
            <div class="col-md-6">
                <form action="{{ url('registro') }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="full_name">Nombre completo</label>
                        <input type="text" class="form-control" name="full_name" placeholder="Nombre completo">
                    </div>
                    <div class="form-group">
                        <label for="phone">Teléfono</label>
                        <input type="text" class="form-control" name="phone" placeholder="Teléfono">
                        </div>
                    <div class="form-group">
                        <label for="email">Correo electrónico</label>
                        <input type="email" class="form-control" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="username">Nombre de usuario</label>
                        <input type="text" class="form-control" name="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirmar contraseña</label>
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Registrar</button>
                </form>
            </div>
            <div class="col-md-6">
                <!--Edit Camera Slider here-->
                <div id="camera_wrap">
                    <div data-src="images/caprese.jpg"><div class="camera_caption fadeFromBottom cap1">Iluminamos tu plato con un prisma culinario.</div></div>
                    <div data-src="images/plate.jpg"><div class="camera_caption fadeFromBottom cap2">Almuerza en el crepusculo del buen comer.</div></div>
                    <div data-src="images/gourmandises.jpg"><div class="camera_caption fadeFromBottom cap1">Calidad y servicio a la luz del solsticio.</div></div>
                </div>
                <!--End Camera Slider here-->
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('scripts/camera/scripts/camera.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('scripts/easing/jquery.easing.1.3.js') }}" type="text/javascript"></script>
    <script type="text/javascript">function startCamera() {$('#camera_wrap').camera({ fx: 'scrollLeft', time: 2000, loader: 'none', playPause: false, navigation: true, height: '65%', pagination: true });}$(function(){startCamera()});</script>
@endsection