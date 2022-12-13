@include('layouts.Header')

<body class="hold-transition layout-top-nav">
    <div class="wrapper">
        @include('layouts.Nav')
        <!-- <div class="banner-image">
            <img src="assets/image/banner1.jpg" style="width:100%;height:232px;">
            <h2 class="user_name"><b>S</b></h2>
        </div> -->
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">

                    <div class="row mb-2">

                        <div class="col-sm-6">
                            <h1>My Lists</h1>
                        </div>

                    </div>
                </div>
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="card card-success">
                        <div class="card-body">
                            <div class="row">

                                @foreach($list as $item)
                                <div class="col-md-12 col-lg-6 col-xl-4">
                                    <div class="card mb-2 bg-gradient-dark">

                                        <img class="card-img-top" src="https://www.themoviedb.org/t/p/w1000_and_h563_face{{$item['poster_path']}}" alt="Dist Photo 1" style="opacity:0.5">
                                        <div class="card-img-overlay d-flex flex-column justify-content-center">

                                            <a href=" {{ url('all_movie_list/'.$item['list_name']) }}">
                                                <h1 class="text-primary text-white list"><b><i>{{$item['list_name']}}</i></b></h1>
                                            </a>
                                            <h3 class="text-primary text-white"><b><i></i></b></h3>
                                        </div>

                                    </div>
                                </div>

                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    @include('layouts.Footer')