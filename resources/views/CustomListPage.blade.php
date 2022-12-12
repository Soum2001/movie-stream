@include('layouts.Header')
<body class="hold-transition layout-top-nav">
    <div class="wrapper">
        @include('layouts.Nav')
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
                            @foreach($img as $image)
                            {{$image->poster_path}}
                                <div class="col-md-12 col-lg-6 col-xl-4">
                                    <div class="card mb-2 bg-gradient-dark">
                                        <img class="card-img-top"  alt="Dist Photo 1" style="opacity:0.5">
                                        <div class="card-img-overlay d-flex flex-column justify-content-center">
                                            <h1 class="text-primary text-white"><b><i></i></b></h1> 
                                        </div>
                                       
                                    </div>
                                </div>
                                @endforeach
                                <div class="col-md-12 col-lg-6 col-xl-4">
                                    <div class="card mb-2">
                                        <img class="card-img-top" src="assets/dist/img/photo2.png" alt="Dist Photo 2">
                                        <div class="card-img-overlay d-flex flex-column justify-content-center">
                                            <h5 class="card-title text-white mt-5 pt-2">Card Title</h5>
                                            <p class="card-text pb-2 pt-1 text-white">
                                                Lorem ipsum dolor sit amet, <br>
                                                consectetur adipisicing elit <br>
                                                sed do eiusmod tempor.
                                            </p>
                                            <a href="#" class="text-white">Last update 15 hours ago</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-6 col-xl-4">
                                    <div class="card mb-2">
                                        <img class="card-img-top" src="assets/dist/img/photo3.jpg" alt="Dist Photo 3">
                                        <div class="card-img-overlay">
                                            <h5 class="card-title text-primary">Card Title</h5>
                                            <p class="card-text pb-1 pt-1 text-white">
                                                Lorem ipsum dolor <br>
                                                sit amet, consectetur <br>
                                                adipisicing elit sed <br>
                                                do eiusmod tempor. </p>
                                            <a href="#" class="text-primary">Last update 3 days ago</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
                <i class="fas fa-chevron-up"></i>
            </a>
        </div>
    </div>
    @include('layouts.Footer')