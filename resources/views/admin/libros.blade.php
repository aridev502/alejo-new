<!DOCTYPE html>
<html>

<head>
    <title>{{config('app.name')}}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="stylesheet" type="text/css" href="{{asset('t2/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('t2/css/style.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <!-- script
    ================================================== -->
    <script src="{{asset('t2/js/modernizr.js')}}"></script>
</head>

<body data-bs-spy="scroll" data-bs-target="#navbar" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" tabindex="0">




    <header id="header" class="site-header header-scrolled position-fixed text-black bg-light">
        <nav id="header-nav" class="navbar navbar-expand-lg px-3 mb-3">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.html">
                    <img src="images/main-logo.png" class="logo">
                </a>
                <button class="navbar-toggler d-flex d-lg-none order-3 p-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#bdNavbar" aria-controls="bdNavbar" aria-expanded="false" aria-label="Toggle navigation">
                    <svg class="navbar-icon">
                        <use xlink:href="#navbar-icon"></use>
                    </svg>
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="bdNavbar" aria-labelledby="bdNavbarOffcanvasLabel">
                    <div class="offcanvas-header px-4 pb-0">
                        <a class="navbar-brand" href="index.html">
                            <img src="images/main-logo.png" class="logo">
                        </a>
                        <button type="button" class="btn-close btn-close-black" data-bs-dismiss="offcanvas" aria-label="Close" data-bs-target="#bdNavbar"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul id="navbar" class="navbar-nav text-uppercase justify-content-end align-items-center flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link me-4 active" href="/">Home</a>
                            </li>



                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>





    <div class="row">
        <div class="col text-center">
            <h1 style="margin-top: 5%;">{{$grado->nombre}}</h1>
        </div>





    </div>

    <div class="row p-3">
        @foreach ($cursos as $c)
        <div class="col-md-3 ">
            <div class="card table-responsive">
                <img class="card-img-top" src="holder.js/100x180/" alt="">
                <div class="card-body">
                    <h4 class="card-title text-uppercase">{{$c->nombre}}</h4>



                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (getLibrosToCuros($c->id) as $libro)
                            <tr>
                                <td>{{$libro->nombre}}</td>
                                <td>



                                    <!-- <img src="{{Storage::url('libros/' . $libro->url)}}" class="img-fluid" alt=""> -->

                                    <a href="{{Storage::url('libros/' . $libro->url)}}" class="btn btn-sm btn-success" download="{{$libro->url}}">Descargar</a>


                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>



                </div>
            </div>
        </div>
        @endforeach
    </div>


    <div id="footer-bottom">
        <div class="container">
            <div class="row d-flex flex-wrap justify-content-between">

                <div class="col-md-4 col-sm-6">
                    <div class="copyright">
                        <p>© Copyright <?php echo date('Y'); ?> {{config('app.name')}}.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('t2/js/jquery-1.11.0.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script type="text/javascript" src="{{asset('t2/js/bootstrap.bundle.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('t2/js/plugins.js')}}"></script>
    <script type="text/javascript" src="{{asset('t2/js/script.js')}}"></script>
</body>

</html>