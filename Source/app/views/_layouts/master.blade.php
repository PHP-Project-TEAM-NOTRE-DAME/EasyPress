<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>EasyPress</title>

    {{ HTML::style('css/bootstrap.min.css') }}
    {{ HTML::style('css/clean-blog.min.css') }}
    {{ HTML::style('css/style.css') }}
    {{ HTML::style('http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css') }}
    {{ HTML::style('http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic') }}
    {{ HTML::style('http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800') }}
    {{ HTML::style('lib/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}

    <link rel="shortcut icon" href="./img/pug.ico">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                {{ link_to_route('home.index', 'EasyPress', null, array('class' => 'navbar-brand')) }}
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        {{HTML::linkRoute('home.index','Home')}}
                    </li>
                    <li>
                        {{HTML::link('/other/about','About')}}
                    </li>
                    @if (Auth::check())
                    <li>
                        {{HTML::linkRoute('user.show', Auth::user()->username, ['id' => Auth::id()])}}
                    </li>
                    <li>
                        {{HTML::linkRoute('post.create','New post')}}
                    </li>
                    <li>
                        {{HTML::linkRoute('home.logout','Log out')}}
                    </li>
                    @else
                        <li>
                            {{HTML::linkRoute('home.login','Log in')}}
                        </li>
                        <li>
                            {{HTML::linkRoute('user.create','Register')}}
                        </li>
                        
                    @endif
                </ul>
                
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <div class="col-sm-3 col-md-3 pull-right">
            {{Form::open(array('route' => 'post.index', 'method' => 'get', 'class' => 'navbar-form', 'role' => 'search'))}}
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
                    <div class="input-group-btn">
                        <button class="btn search-button" type="submit">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </div>
                </div>
            {{Form::close()}}
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url({{asset('img/home.jpg')}})">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>EasyPress</h1>
                        <hr class="small">
                        <span class="subheading">To be or not to be <br> (a pug)</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        @yield('container')
    </div>

    <hr>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <ul class="list-inline text-center">
                        <li>
                            <a href="https://twitter.com/">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="https://facebook.com/">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="https://github.com/PHP-Project-TEAM-NOTRE-DAME/EasyPress">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <p class="copyright text-muted">Copyright &copy; EasyPress</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    {{ HTML::script('js/jquery.js') }}

    <!-- Bootstrap Core JavaScript -->
    {{ HTML::script('js/bootstrap.min.js') }}

    <!-- Custom Theme JavaScript -->
    {{-- HTML::script('js/clean-blog.js') --}}

    @yield('scripts');

</body>

</html>
