<nav class="main-header navbar navbar-expand-md navbar-light navbar-navy">
    <div class="container">
        <a href="../../index3.html" class="navbar-brand">
            <img src="{{url('assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light"><b style="color:white">AdminLTE 3</b></span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="index3.html" class="nav-link"><b style="color:white">movies</b></a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link"><b style="color:white">Tv Shows</b></a>
                </li>

            </ul>

            <!-- SEARCH FORM -->

        </div>
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">

            <li class="nav-item dropdown">
                <b style="color:white"><a class="fas fa-plus nav-link" style="color:white; font-size:25px" href="logout" id="logout_btn" name="logout_btn"></a></b>
            </li>
            @if(Session::has('id'))
            <li class="nav-item dropdown">
                <a class="nav-link" href="logout" id="login" name="login"><b style="color:white">Logout</b></a>
            </li>
            @endif
            @if(!(Session::has('id')))
            <li class="nav-item dropdown">
                <a class="nav-link" href="login_page" id="login" name="login"><b style="color:white">Login</b></a>
            </li>
           @endif
            <li class="nav-item dropdown">
                <a class="nav-link" href="registeration_page" id="registeration_page" name="registeration_page"><b style="color:white">Join</b></a>
            </li>
            
        </ul>

    </div>
</nav>