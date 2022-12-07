@include('layouts.Header')

<body class="hold-transition layout-top-nav">
    <div class="wrapper">
        @include('layouts.Nav')
        <section class="content">
            <div class="container-fluid">
                <div id="home">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <h2 class="display-5 text-info">Search Your Movies/TV Shows</h2>
                            <form action="simple-results.html">
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-xs btn-info active">
                                        <input type="radio" name="options" id="option_a1" value="movie" class="option">
                                        Movie
                                    </label>
                                    <label class="btn btn-xs btn-info">
                                        <input type="radio" name="options" id="option_a2" value="tv" class="option">
                                        TV Show
                                    </label>
                                </div>
                                <div class="input-group mt-2">
                                    <input type="search" class="form-control form-control-lg" placeholder="Type your keywords here" id="search_name">
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-lg btn-default" onclick="search()">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <br>
                    <div class="container-fluid">
                        <h3>Popular Movies</h3>
                        <div class="media-scroller">
                            @foreach($movie_data['results'] as $movie)
                            <div class="media-element">
                                <div class="card">
                                    <div class="card-body">
                                        <a href=" {{ url('fetch_cast/'.$movie['id']) }}"><img class="img-fluid pad" src="https://www.themoviedb.org/t/p/w220_and_h330_face{{ $movie['poster_path'] }}" alt="Photo" style="object-fit: contain;width: 100%;height: 300px;"></a>
                                    </div>
                                    <div class="card-footer">
                                        <h4 class="text-2xl text-gray-900 font-semibold mb-2">{{ $movie['title'] }} ({{ date('Y',strtotime($movie['release_date'])) }})</h4>
                                        <div class="flex items-center space-x-2 tracking-wide pb-1">
                                            <div>
                                                <b class="text-gray-500">Release Date</b>
                                                <span class="leading-6 text-sm">{{ $movie['release_date'] }}</span>
                                            </div>
                                            <div>
                                                <b class="text-gray-500">Rating</b>
                                                <span class="leading-6 text-sm">{{ $movie['vote_average'] }}</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <h3>Popular TV Show</h3>
                        <div class="media-scroller">
                            @foreach($tv['results'] as $tv_data)
                            <div class="media-element">
                                <div class="card">
                                    <div class="card-body">
                                        <img class="img-fluid pad" src="https://www.themoviedb.org/t/p/w220_and_h330_face{{ $tv_data['poster_path'] }}" alt="Photo" style="object-fit: contain;width: 100%;height: 300px;" onclick="tv_details(<?= $movie['id'] ?> )">
                                    </div>
                                    <div class="card-footer">
                                        <h4 class="text-2xl text-gray-900 font-semibold mb-2">{{ $tv_data['original_name'] }}</h4>
                                        <div class="flex items-center space-x-2 tracking-wide pb-1">
                                            <div>
                                                <b class="text-gray-500">Release Date</b>
                                                <span class="leading-6 text-sm">{{ $tv_data['first_air_date'] }}</span>
                                            </div>
                                            <div>
                                                <b class="text-gray-500">Rating</b>
                                                <span class="leading-6 text-sm">{{ $tv_data['vote_average'] }}</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="search">

                </div>
            </div>
        </section>
    </div>
    <!-- /.content -->
    @include('layouts.Footer')

    <!-- <body class="sidebar-mini sidebar-collapse" style="height: auto;">
    <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
        <div class="container">
            <a href="../../index3.html" class="navbar-brand">
                <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>
            <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse order-3" id="navbarCollapse">

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="index3.html" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Contact</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Dropdown</a>
                        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                            <li><a href="#" class="dropdown-item">Some action </a></li>
                            <li><a href="#" class="dropdown-item">Some other action</a></li>
                            <li class="dropdown-divider"></li>

                            <li class="dropdown-submenu dropdown-hover">
                                <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Hover for action</a>
                                <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                                    <li>
                                        <a tabindex="-1" href="#" class="dropdown-item">level 2</a>
                                    </li>

                                    <li class="dropdown-submenu">
                                        <a id="dropdownSubMenu3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">level 2</a>
                                        <ul aria-labelledby="dropdownSubMenu3" class="dropdown-menu border-0 shadow">
                                            <li><a href="#" class="dropdown-item">3rd level</a></li>
                                            <li><a href="#" class="dropdown-item">3rd level</a></li>
                                        </ul>
                                    </li>

                                    <li><a href="#" class="dropdown-item">level 2</a></li>
                                    <li><a href="#" class="dropdown-item">level 2</a></li>
                                </ul>
                            </li>

                        </ul>
                    </li>
                </ul>

                <form class="form-inline ml-0 ml-md-3">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">

                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">

                            <div class="media">
                                <img src="../../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>

                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">

                            <div class="media">
                                <img src="../../dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>

                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">

                            <div class="media">
                                <img src="../../dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>

                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <br>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <h2 class="display-5 text-info">Search Your Movies/TV Shows</h2>
                    <form action="simple-results.html">
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-xs btn-info active">
                                <input type="radio" name="options" id="option_a1" autocomplete="off" checked="">
                                Movie
                            </label>
                            <label class="btn btn-xs btn-info">
                                <input type="radio" name="options" id="option_a2" autocomplete="off">
                                TV Show
                            </label>
                        </div>
                        <div class="input-group mt-2">
                            <input type="search" class="form-control form-control-lg" placeholder="Type your keywords here">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-lg btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


     -->