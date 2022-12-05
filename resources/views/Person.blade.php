@include('layouts.Header')

<body class="hold-transition layout-top-nav">
    <div class="wrapper">
        @include('layouts.Nav')
        <br>
        <div class="container movie-details-header">
            <div class="row">
                <div class="col-sm-5 text-center">
                    <img src="https://www.themoviedb.org/t/p/w300_and_h450_face{{ $person_details['profile_path'] }}">
                    <br>
                    <div class="social_links">
                        <div>
                            <a class="social_link" title="Visit Facebook" href="https://www.facebook.com/milliebobbybrown" target="_blank" rel="noopener" data-role="tooltip"><i class="fas fa-facebook"></i></a>
                        </div>
                        <div>
                            <a class="social_link" title="Visit Twitter" href="https://twitter.com/Milliestopshate" target="_blank" rel="noopener" data-role="tooltip"><span class="glyphicons_v2 twitter"></span></a>
                        </div>
                        <div>
                            <a class="social_link" title="Visit Instagram" href="https://instagram.com/milliebobbybrown/" target="_blank" rel="noopener" data-role="tooltip"><span class="glyphicons_v2 instagram"></span></a>
                        </div>
                    </div>
                    <h3><b>Personal Info</b></h3>
                    <h5><b>Known For</b></h5>
                    <p>{{$person_details['known_for_department']}}</p>
                    <h5><b>Birthdate</b></h5>
                    <p>{{$person_details['birthday']}}</p>
                    <h5><b>Place Of Birth</b></h5>
                    <p>{{$person_details['place_of_birth']}}</p>
                </div>
                <div class="col-sm-7">
                    <h1><span><b>{{$person_details['name']}}</b></span></h1>

                    <h3><span><b>Biography</b></span></h3>
                    <p>{{$person_details['biography']}}</p>


                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
    @include('layouts.Footer')