<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>EL PERNO</title>

    <link rel="shortcut icon" type="image/png" href="https://www.equirentas.com.mx/favicon.png">

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="../js/jquery-1.11.2.min.js"><\/script>')</script>
    @vite(['resources/css/normalize.css','resources/css/sweetalert2.css','resources/css/material.min.css','resources/css/material-design-iconic-font.min.css','resources/css/jquery.mCustomScrollbar.css','resources/css/main.css' ])
    @vite(['resources/js/js_views/material.min.js',
	'resources/js/js_views/sweetalert2.min.js',
	'resources/js/js_views/jquery.mCustomScrollbar.concat.min.js',
	'resources/js/js_views/main.js',
	'resources/js/js_views/jquery-1.11.2.min.js'
	])
</head>
<body>
	<!-- Notifications area -->
	<!-- Notifications area -->
	<section class="full-width container-notifications">
		<div class="full-width container-notifications-bg btn-Notification"></div>
	    <section class="NotificationArea">
	        <div class="full-width text-center NotificationArea-title tittles">Notificaciones </div>

	    </section>
	</section>
	<!-- navBar -->
	<!-- navLateral -->
	<div class="full-width navBar">
        <div class="full-width navBar-options">
            <i class="zmdi zmdi-more-vert btn-menu" id="btn-menu"></i>
            <div class="mdl-tooltip" for="btn-menu">Menu</div>
            <nav class="navBar-options-list">
                <ul class="list-unstyle">

                    <div class="dropdown">
                        <button type="button" data-bs-toggle="dropdown"
                            style="background-color:transparent; border:none;  width: 150px;" href="#"
                            class="btn btn-default btn-lg dropdown-toggle" data-toggle="dropdown"> Bienvenido {{ Auth::user()->username }} </button>
                        <div class="dropdown-content">
                            <br>
                          
                            <a href="#"> Ayuda </a>
                            <form action="/logout" method="POST">
                                @csrf
                                <a href="{{ route('login') }}" ><button type="button" data-bs-toggle="dropdown" style="background-color:transparent; border:none;" >Cerrar Sesión</button></a>
                            </form>
                        </div>
                    </div>
					<li class="btn-exit" id="btn-exit" >
                        <i class="zmdi zmdi-account"></i>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <figure class="full-width" style="height: 77px;">
        <style>
        .dropdown {
            display: inline-block;
            margin: 4px;
            border: #000000;
            position: relative;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            border: #000000;
            width: 100%;
            overflow: auto;
            box-shadow: 0px 20px 20px 0px rgba(0, 0, 0, 0.4);
        }

        .dropdown:hover .dropdown-content {
            display: block;
            border: #000000;
        }

        .dropdown-content a {
            display: block;
            border: #000000;
            color: #000000;
            padding: 5px;
            text-decoration: none;
        }

        .dropdown-content a:hover {
            color: #ffffff;
            background-color: #645858;
        }
        </style>

        <div class="navLateral-body-cl">

            <div class="btn-group">



                <img src="assets/img/avatar-male.png" alt="Avatar" class="navbar-brand"></button>


            </div>

        </div>


        <figcaption class="navLateral-body-cr hide-on-tablet">

            <span>{{ Auth::user()->username }} </span>
        </figcaption>

    </figure>

	<!-- navLateral -->
	<section class="full-width navLateral" id="Home">
 
	<script>
    window.auth_user = {!! json_encode([
        'id'     => auth()->user()->id,
        'usern'   => auth()->user()->username,
		'rol'   => auth()->user()->id_rol
    ]) !!};
	</script>
	</section>
	<!-- pageContent -->
	<section class="full-width pageContent" id="PersonaPageContent" >
	</section>	

</body>
@vite('resources/js/app.js')
</html>