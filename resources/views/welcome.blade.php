<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Lenin Albán, Josué Tello">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Bienvenidos - Distribuidora "El Perno" </title>
    <link rel="shortcut icon" type="image/png" href="https://www.equirentas.com.mx/favicon.png">


    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">

    <!-- Bootstrap core CSS -->
    @vite(['resources/assets/dist/css/bootstrap.min.css',
    'resources/cover/index.html',
    'resources/cover/cover.html',
    'resources/css/carousel.css',
    'resources/cover/carousel.rtl.css',
    'resources/js/js_views/bootstrap.bundle.min.js',
    ' resources/js/js_views/bootstrap.bundle.min.js.map'


    ])


    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
    </style>

    </style>

</head>

<body>

    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="">Distribuidora - "El Perno"</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#"></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"></a>
                        </li>
                    </ul>
                        @auth
                        Bienvenido {{Auth::user()->username}}
                        <li><a> </a></li>
                        <a href="{{ route('home') }}"><button class="btn btn-lg btn-primary" >Sistema</button></a>
                        <li><a> </a></li>
                        
                        <form action="/logout" method="POST">
                            @csrf
                            <a href="{{ route('login') }}"><button class="btn btn-lg btn-primary" >Cerrar Sesión</button></a>
                        </form>
                        @else       
                        <a href="{{ route('login') }}"><button class="btn btn-lg btn-primary" >Ingreso</button></a>
                        <li><a> </a></li> 
                        @endauth
                </div>
            </div>
        </nav>
    </header>

    <main>

        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <svg class="bd-placeholder-img" width="100%" height="100%" aria-hidden="true"
                        preserveAspectRatio="xMidYMid slice" focusable="false">

                        <rect width="100%" height="100%"><img
                                src="fotos/304792234_506544771478638_9177035121027356824_n.jpg" /></rect>
                    </svg>

                    <div class="container">
                        <div class="carousel-caption text-end">
                            <img src="fotos/logo.png" / width="200 " height="200">
                        </div>
                    </div>
                </div>


                <!--         /////////////////////   -->
                <div class="carousel-item">
                    <svg class="bd-placeholder-img" width="100%" height="100%" src="fotos/koala-630117__340.jpg"
                        aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <rect width="100%" height="100%"><img src="fotos/renta_maquinaria_ligera_01.jpg" /></rect>
                    </svg>

                    <div class="container">
                        <div class="carousel-caption text-end">
                            <img src="fotos/logo.png" / width="200 " height="200">
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"
                        aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <rect width="100%" height="100%"><img src="fotos/imagen1-png.png" /></rect>
                    </svg>

                    <div class="container">
                        <div class="carousel-caption text-end">
                            <img src="fotos/logo.png" / width="200 " height="200">
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>


        <!-- Marketing messaging and featurettes
  ================================================== -->
        <!-- Wrap the rest of the page in another container to center all the content. -->

        <div class="container marketing">

            <!-- Three columns of text below the carousel -->
            <div class="row">
                <div class="col-lg-4">

                    <svg class="bd-placeholder-img rounded-circle" width="140" height="140" src="fotos/2501230_0.jpg"
                        xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140"
                        preserveAspectRatio="xMidYMid slice" focusable="false">
                        <img src="fotos/dewalt-logo.jpg" / width="140 " height="140">
                        <rect width="100%" height="100%" fill="#777" />
                    </svg>

                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <svg class="bd-placeholder-img rounded-circle" width="140" height="140"
                        xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140"
                        preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <img src="fotos/weg-vector-logo.png" / width="140 " height="140">
                        <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777"
                            dy=".3em"></text>
                    </svg>

                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <svg class="bd-placeholder-img rounded-circle" width="140" height="140"
                        xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140"
                        preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <img src="fotos/777e.png" / width="140 " height="140">
                        <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777"
                            dy=".3em"></text>
                    </svg>

                </div><!-- /.col-lg-4 -->

                <h2 class="featurette-heading">Trabaje con las Mejores Marcas <span class="text-muted"> en Máquinas y
                        Herramientas de construcción</span></h2>

            </div><!-- /.row -->


            <!-- START THE FEATURETTES -->

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading">Productividad <span class="text-muted"></span></h2>
                    <p class="lead">Reduzca gastos de almaceniamiento y mantenimientos de equipo.</p>
                </div>
                <div class="col-md-5">
                    <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="100"
                        height="100" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500"
                        preserveAspectRatio="xMidYMid slice" focusable="false">
                        <img src="fotos/Caroteadora de Diamante DM 280 4.jpeg" / width="200 " height="200">
                        <rect width="80%" height="80%" fill="#eee" /><text x="50%" y="50%" fill="#aaa" dy=".3em">
                    </svg>
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7 order-md-2">
                    <h2 class="featurette-heading">Eficiencia <span class="text-muted"></span></h2>
                    <p class="lead">Optimiza los tiempos en tus obras con los diversos equipos que ponemos a tus
                        órdenes, mejorarás tu productividad por hora y por hombre.</p>
                </div>
                <div class="col-md-5 order-md-1">
                    <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="100"
                        height="100" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500"
                        preserveAspectRatio="xMidYMid slice" focusable="false">
                        <img src="fotos/constructores-2.jpg" / width="200 " height="200">
                        <rect width="100%" height="100%" fill="#eee" /><text x="50%" y="50%" fill="#aaa"
                            dy=".3em"></text>
                    </svg>

                </div>
            </div>

            <hr class="featurette-divider">

            <!-- /END THE FEATURETTES -->

        </div><!-- /.container -->


        <!-- FOOTER -->
        <footer class="container">
            <p class="float-end"> Todos los derechos reservados</p>
            <p>&copy; 2023 Company, Inc. &middot;
            </p>
        </footer>
    </main>





</body>

</html>