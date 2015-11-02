@extends('app')

@section('extra-content')
<div id="decorative1" style="position:relative">
    <div class="container">

        <div class="divPanel headerArea">
            <div class="row-fluid">
                <div class="span12">

                    <div id="headerSeparator"></div>

                    <div class="row-fluid">
                        <div class="span6">

                            <div id="divHeaderText" class="page-content">
                                <div id="divHeaderLine1">Easy Order App</div><br />
                                <div id="divHeaderLine2">Bienvenido nuevamente, {{ Auth::user()->full_name }} !</div><br />
                            </div>

                        </div>
                        <div class="span6">
                            <!--Edit Camera Slider here-->
                            <div id="camera_wrap">
                                <div data-src="{{ asset('images/caprese.jpg') }}"><div class="camera_caption fadeFromBottom cap1">Iluminamos tu plato con un prisma culinario.</div></div>
                                <div data-src="{{ asset('images/plate.jpg') }}"><div class="camera_caption fadeFromBottom cap2">Almuerza en el crepusculo del buen comer.</div></div>
                                <div data-src="{{ asset('images/gourmandises.jpg') }}"><div class="camera_caption fadeFromBottom cap1">Calidad y servicio a la luz del solsticio.</div></div>
                            </div>
                            <!--End Camera Slider here-->

                        </div>
                    </div>

                    <div id="headerSeparator2"></div>

                </div>
            </div>

        </div>

    </div>
</div>

<div id="contentOuterSeparator"></div>

<div class="container">

    <div class="divPanel page-content">
        <!--Edit Main Content Area here-->
        <div class="row-fluid">

            <div class="span12" id="divMain">

                <h1>Bienvenido</h1>

                <p><strong>Bienvenido a Easy Order,</strong> la aplicación que le permitirá ordenar comida de manera sencilla y personalizada.</p>

                <p>En síntesis, usted podrá crear sus propios combos, seleccionando entre una varidad de platos, y asignando detalles particulares a cada plato. En su panel de usuario usted podrá seleccionar uno de los combos destacados, crear los suyos propios y ordenar su comida preferida.</p>

                <hr style="margin:45px 0 35px" />

                <div class="row-fluid">

                    <div class="span4">
                        <h4>Nosotros</h4>
                        <img src="{{ asset('images/home-1.jpg') }}" class="img-polaroid" style="margin:5px 0px 15px;" alt="">
                        <p>Easy Order es una compañía que busca poner a su disposición una varidad de platos, accesibles, personalizables y que los tendrá con usted en un tiempo programado o estimado. <br /></p>
                        <p><a class="btn btn-primary" style="margin:5px 0px 15px;">Leer más</a></p>
                    </div>

                    <div class="span4">
                        <h4>Nuestra pasión</h4>
                        <img src="{{ asset('images/home-2.jpg') }}" class="img-polaroid" style="margin:5px 0px 15px;" alt="">
                        <p>Lo que más amamos es conseguir su satisfacción en tema de tiempos. Usted puede solicitar un pedido en dos modalidades, pick-up y por delivery. Nuestra misión es evitarle la fatiga, facilitarle la vida y permitirle gozar de una buena comida. <br /></p>
                        <p><a class="btn btn-primary" style="margin:5px 0px 15px;">Learn more</a></p>
                    </div>

                    <div class="span4">
                        <h4>Modalidades</h4>
                        <img src="{{ asset('images/home-3.jpg') }}" class="img-polaroid" style="margin:5px 0px 15px;" alt="">
                        <p>En la modalidad de pick-up, usted viene a uno de nuestros locales a recoger su pedido, a partir del tiempo estimado, evitando esperas innecesarias. En el segundo caso, usted recibirá su pedido en la ubicación que ha indicado, sin retrasos, y con los detalles solicitados. <br /></p>
                        <p><a class="btn btn-primary" style="margin:5px 0px 15px;">Learn more</a></p>
                    </div>

                </div>

                <hr style="margin:45px 0 35px" />

                <div class="lead">
                    <h1>Variedad de platos y detalles.</h1>
                    <h3>¡ Sin límites ! Usted podrá ordenar cualquier combinación de platos.</h3>
                </div>
                <br />

                <div class="list_carousel responsive">
                    <ul id="list_photos">
                        <li><img src="{{ asset('carousal/muffin.jpg') }}" class="img-polaroid">  </li>
                        <li><img src="{{ asset('carousal/strawberries.jpg') }}" class="img-polaroid">  </li>
                        <li><img src="{{ asset('carousal/cheesecake.jpg') }}" class="img-polaroid">  </li>
                        <li><img src="{{ asset('carousal/peppers.jpg') }}" class="img-polaroid">  </li>
                        <li><img src="{{ asset('carousal/pomengranates.jpg') }}" class="img-polaroid">  </li>
                        <li><img src="{{ asset('carousal/refreshment.jpg') }}" class="img-polaroid">  </li>
                        <li><img src="{{ asset('carousal/kitchen.jpg') }}" class="img-polaroid">  </li>
                        <li><img src="{{ asset('carousal/soup.jpg') }}" class="img-polaroid">  </li>
                    </ul>
                </div>

                </br>

                <p>¿Se imagina poder solicitar sus platos preferidos? Pues no es solo eso, es que podrá solicitar cualquier combinación de ellos. Guardar estos pedidos y volver a pedirlos cuantas veces lo quiera. Usted podrá disfrutar los combos creados por usted mismo, y a precios justos.</p></br>
                <!--Edit Blockquote here-->
                <blockquote>

                    <h3 class="text-success">Sueño con un mundo donde pueda programar mi comida, sin restricciones ...</h3>
                    <small>Ramos Suyón <cite title="Source Title">Bitácora de un joven programador</cite></small>

                </blockquote>
                <!--/End Blockquote-->
                <p>No espere más y regístrese ya. Recuerde que es necesario registrarse para poder armar sus combos y consultar aquellos combos destacados. Al ingresar, usted podrá ver el menú del día y armar sus combos preferidos.</p>



            </div>

        </div>
        <!--End Main Content Area here-->

        <div id="footerInnerSeparator"></div>
    </div>

</div>
@endsection

@section('scripts')
    <script src="{{ asset('scripts/carousel/jquery.carouFredSel-6.2.0-packed.js') }}" type="text/javascript"></script>
    <script type="text/javascript">$('#list_photos').carouFredSel({ responsive: true, width: '100%', scroll: 2, items: {width: 320,visible: {min: 2, max: 6}} });</script>
    <script src="{{ asset('scripts/camera/scripts/camera.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('scripts/easing/jquery.easing.1.3.js') }}" type="text/javascript"></script>
    <script type="text/javascript">function startCamera() {$('#camera_wrap').camera({ fx: 'scrollLeft', time: 2000, loader: 'none', playPause: false, navigation: true, height: '65%', pagination: true });}$(function(){startCamera()});</script>
@endsection