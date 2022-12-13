@include('layouts.Header')

<body class="hold-transition layout-top-nav">
    <div class="wrapper">
        @include('layouts.Nav')
       
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">

                    <div class="row mb-2">

                        <div class="col-sm-6">
                            <h1>{{$list_name}}</h1>
                        </div>

                    </div>
                </div>
            </section>
            <section class="content">
                <div class="container-fluid">
                <div class="media-scroller">
                            @foreach($movie as $movie_item)
                            <div class="media-element">
                                <div class="card">
                                    <div class="card-body">
                                       <img class="img-fluid pad" src="https://www.themoviedb.org/t/p/w220_and_h330_face{{ $movie_item['poster_path'] }}" alt="Photo" style="object-fit: contain;width: 100%;height: 300px;">
                                    </div>
                                </div>
                            </div>
                           @endforeach
                        </div>
                </div>
            </section>
        </div>
    </div>
    @include('layouts.Footer')