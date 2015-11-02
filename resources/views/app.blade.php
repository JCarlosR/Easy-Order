<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Easy Order</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="{{ asset('scripts/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('scripts/bootstrap/css/bootstrap-responsive.min.css') }}" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Icons -->
    <link href="{{ asset('scripts/icons/general/stylesheets/general_foundicons.css') }}" media="screen" rel="stylesheet" type="text/css" />
    <link href="{{ asset('scripts/icons/social/stylesheets/social_foundicons.css') }}" media="screen" rel="stylesheet" type="text/css" />
    <!--[if lt IE 8]>
    <link href="{{ asset('scripts/icons/general/stylesheets/general_foundicons_ie7.css') }}" media="screen" rel="stylesheet" type="text/css" />
    <link href="{{ asset('scripts/icons/social/stylesheets/social_foundicons_ie7.css') }}" media="screen" rel="stylesheet" type="text/css" />
    <![endif]-->
    <link rel="stylesheet" href="{{ asset('scripts/fontawesome/css/font-awesome.min.css') }}">
    <!--[if IE 7]>
    <link rel="stylesheet" href="{{ asset('scripts/fontawesome/css/font-awesome-ie7.min.css') }}">
    <![endif]-->

    <link href="{{ asset('scripts/carousel/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('scripts/camera/css/camera.css') }}" rel="stylesheet" type="text/css" />

    <link href="http://fonts.googleapis.com/css?family=Allura" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Aldrich" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Calligraffitti" rel="stylesheet" type="text/css">

    <link href="{{ asset('styles/custom.css') }}" rel="stylesheet" type="text/css" />
    @yield('styles')
</head>
<body id="pageBody">

<div id="decorative2">
    <div class="container">

        <div class="divPanel topArea notop nobottom">
            <div class="row-fluid">
                <div class="span12">

                    <div id="divLogo" class="pull-left">
                        <a href="{{ url('/') }}" id="divSiteTitle">Easy Order</a><br />
                        <a href="{{ url('/') }}" id="divTagLine">El placer de hacerlo tú mismo</a>
                    </div>

                    <div id="divMenuRight" class="pull-right">
                        <div class="navbar">
                            <button type="button" class="btn btn-navbar-highlight btn-large btn-primary" data-toggle="collapse" data-target=".nav-collapse">
                                NAVIGATION <span class="icon-chevron-down icon-white"></span>
                            </button>
                            <div class="collapse navbar-collapse">
                                <ul class="nav nav-pills ddmenu">
                                    @yield('menu-options')
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>


<div id="contentOuterSeparator"></div>


@if ($__env->yieldContent('content'))
    <div class="container">

        <div class="divPanel page-content">
            <!--Edit Main Content Area here-->
            <div class="row-fluid">

                <div class="span12" id="divMain">
                    @yield('content')
                </div>

            </div>
            <!--End Main Content Area here-->

            <div id="footerInnerSeparator"></div>
        </div>

    </div>
@endif

@yield('extra-content')

<div id="footerOuterSeparator"></div>

<div id="divFooter" class="footerArea">

    <div class="container">

        <div class="divPanel">

            <div class="row-fluid">
                <div class="span3" id="footerArea1">

                    <h3>Compañía</h3>

                    <p>Easy Order surge como una idea revolucionaria en una de las aulas de nuestra universidad. El año 2015 esta compañía fue fundada y no fin parece tener.</p>

                    <p>
                        <a href="#" title="Terms of Use">Terms of Use</a><br />
                        <a href="#" title="Privacy Policy">Privacy Policy</a><br />
                        <a href="#" title="FAQ">FAQ</a><br />
                        <a href="#" title="Sitemap">Sitemap</a>
                    </p>

                </div>
                <div class="span3" id="footerArea2">

                    <h3>Últimos posts</h3>
                    <p>
                        <a href="#" title="">Nuevo combo destacado</a><br />
                        <span style="text-transform:none;">2 hours ago</span>
                    </p>
                    <p>
                        <a href="#" title="">Nuevos detalles registrados</a><br />
                        <span style="text-transform:none;">5 hours ago</span>
                    </p>
                    <p>
                        <a href="#" title="">Pick-up con mejores estimaciones</a><br />
                        <span style="text-transform:none;">19 hours ago</span>
                    </p>
                    <p>
                        <a href="#" title="">VER TODOS LOS POSTS</a>
                    </p>

                </div>
                <div class="span3" id="footerArea3">

                    <h3>Nada mejor</h3>
                    <p>Comemos todos los días, sin embargo el arte de comer no decrece en ímpetu.
                        El ser insaciables, el desear romper la monotonía, no es algo malo de hecho.
                    </p>

                </div>
                <div class="span3" id="footerArea4">

                    <h3>Contacto</h3>

                    <ul id="contact-info">
                        <li>
                            <i class="general foundicon-phone icon"></i>
                            <span class="field">Phone:</span>
                            <br />
                            (123) 456 7890 / 456 7891
                        </li>
                        <li>
                            <i class="general foundicon-mail icon"></i>
                            <span class="field">Email:</span>
                            <br />
                            <a href="mailto:info@yourdomain.com" title="Email">info@yourdomain.com</a>
                        </li>
                        <li>
                            <i class="general foundicon-home icon" style="margin-bottom:50px"></i>
                            <span class="field">Address:</span>
                            <br />
                            123 Street<br />
                            12345 City, State<br />
                            Country
                        </li>
                    </ul>

                </div>
            </div>

            <br /><br />
            <div class="row-fluid">
                <div class="span12">
                    <p class="copyright">
                        Copyright © 2015 Easy Order. All Rights Reserved.
                    </p>

                    <p class="social_bookmarks">
                        <a href="#"><i class="social foundicon-facebook"></i> Facebook</a>
                        <a href=""><i class="social foundicon-twitter"></i> Twitter</a>
                        <a href="#"><i class="social foundicon-pinterest"></i> Pinterest</a>
                        <a href="#"><i class="social foundicon-rss"></i> Rss</a>
                    </p>
                </div>
            </div>
            <br />

        </div>

    </div>

</div>

<script src="{{ asset('scripts/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('scripts/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('scripts/default.js') }}" type="text/javascript"></script>

@yield('scripts')

</body>
</html>