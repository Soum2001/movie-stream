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
                                        <a href=" {{ url('movie_details/'.$movie['id']) }}"><img class="img-fluid pad" src="https://www.themoviedb.org/t/p/w220_and_h330_face{{ $movie['poster_path'] }}" alt="Photo" style="object-fit: contain;width: 100%;height: 300px;"></a>
                                    </div>
                                    <div class="card-footer">
                                        <h4 class="text-2xl text-gray-900 font-semibold mb-2">{{ $movie['title'] }} ({{ date('Y',strtotime($movie['release_date'])) }})</h4>
                                        <div class="flex items-center space-x-2 tracking-wide pb-1">
                                            <div>
                                                <i class="text-gray-500">Release Date</i>
                                                <span class="leading-6 text-bold">{{Carbon\Carbon::parse($movie['release_date'])->toFormattedDateString()}}</span>
                                            </div>
                                            <div>
                                                <span class="text-gray-500">Rating</span>
                                                <span class="leading-6 text-bold">{{ $movie['vote_average'] }}</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <br>
                        <h3>Popular TV Show</h3>
                        <div class="media-scroller">
                            @foreach($tv['results'] as $tv_data)
                            <div class="media-element">
                                <div class="card">
                                    <div class="card-body">
                                        <a href=" {{ url('tv_details/'.$tv_data['id']) }}"> <img class="img-fluid pad" src="https://www.themoviedb.org/t/p/w220_and_h330_face{{ $tv_data['poster_path'] }}" alt="Photo" style="object-fit: contain;width: 100%;height: 300px;" )></a>
                                    </div>
                                    <div class="card-footer">
                                        <h4 class="text-2xl text-gray-900 font-semibold mb-2">{{ $tv_data['original_name'] }}</h4>
                                        <div class="flex items-center space-x-2 tracking-wide pb-1">
                                            <div>
                                                <span class="text-gray-500">Release Date</span>
                                                <span class="leading-6 text-bold">{{ Carbon\Carbon::parse($tv_data['first_air_date'] )->toFormattedDateString()}}</span>
                                            </div>
                                            <div>
                                                <span class="text-gray-500">Rating</span>
                                                <span class="leading-6 text-bold">{{ $tv_data['vote_average'] }}</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <br>
                        @if(!($custom_list->isEmpty()))
                        <h3>Custom List</h3>
                        @endif
                        <div class="media-scroller">
                           
                             @foreach($custom_list as $custom_path)
                            <div class="media-element">
                                <div class="card">
                                    <div class="card-body">
                                        <img class="img-fluid pad" src="https://www.themoviedb.org/t/p/w220_and_h330_face{{$custom_path['poster_path']}}" alt="Photo" style="object-fit: contain;width: 100%;height: 300px;" )></a>
                                    </div>
                                    <div class="card-footer">
                                        <h4 class="text-2xl text-gray-900 font-semibold mb-2">{{ $tv_data['original_name'] }}</h4>
                                        <div class="flex items-center space-x-2 tracking-wide pb-1">
                                            <div>
                                                <span class="text-gray-500">Release Date</span>
                                                <span class="leading-6 text-bold">{{ Carbon\Carbon::parse($tv_data['first_air_date'] )->toFormattedDateString()}}</span>
                                            </div>
                                            <div>
                                                <span class="text-gray-500">Rating</span>
                                                <span class="leading-6 text-bold">{{ $tv_data['vote_average'] }}</span>
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

 