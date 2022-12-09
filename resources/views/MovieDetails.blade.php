@include('layouts.Header')

<body class="hold-transition layout-top-nav">
    <div class="wrapper">
        @include('layouts.Nav')
        <br>

        <div class="container movie-details-header">
            <div class="row">
                <div class="col-sm-5 text-center">
                    <img src="https://www.themoviedb.org/t/p/w300_and_h450_face{{ $movie['poster_path'] }}">
                </div>

                <div class="col-sm-7">
                    <h1><span><b>{{$movie['title']}}(2022)</b></span></h1>
                    <p>
                    <div class="row">
                        <div class="col-md-2">
                            <input type="text" class="knob" value="<?= $vote_average ?>" data-skin="tron" data-thickness="0.1" data-width="60" data-height="60" data-fgColor="#00a65a" readonly>
                        </div>
                        <div class="col-md-10">
                            <div class="score"><b>User<br>Score<br></b></div>
                            <div class="icon_list">
                                <i class="fas fa-list add_list" onclick="add_to_list('<?= $movie['poster_path'] ?>')" data-toggle="tooltip" data-html="true"></i>
                                <i class="fas fa-heart add_list"></i>
                                <i class="fas fa-bookmark add_list"></i>
                                <i class="fas fa-star add_list"></i>
                            </div>
                        </div>
                    </div>
                    </p>
                    <p class="text-muted">Genre:</span> @foreach($movie['genres'] as $geners){{ $geners['name'] }}, @endforeach

                    </p>

                    <h3><span><b>Overview</b></span></h3>
                    <p>{{$movie['overview']}}</p>

                    <hr>

                    <p><span class="text-muted">Date Released:</span>{{ Carbon\Carbon::parse($movie['release_date'])->toFormattedDateString() }}</p>

                    <p><span class="text-muted">Duration:</span> {{ floor($movie['runtime']/60)}}hr {{ $movie['runtime']%60}}mins</p>
                    <p><span class="text-muted">Budget:</span> ${{ number_format($movie['budget'])}}</p>
                    <p><span class="text-muted">Revenue:</span> ${{ number_format($movie['revenue']) }}</p>
                    @if($movie['status'] == "Released")
                    <p><span class="text-muted">Status:</span> <span style="color:green">{{ $movie['status'] }}</span></p>
                    @endif
                    @if($movie['status'] == "Canceled")
                    <p><span class="text-muted">Status:</span> <span style="color:red">{{ $movie['status'] }}</span></p>
                    @endif
                </div>



            </div>
            <div class="row">
                <div class="media-scroller">
                    @foreach($cast_details['cast'] as $cast)
                    <div class="media-element">
                        <div class="card">
                            <div class="card-body">
                                @if($cast['profile_path'] == "")
                                <a href=" {{ url('cast_details/'.$cast['id']) }}"><img class="img-fluid pad" src="{{url('assets/image/default-avatar.png')}}" alt="Photo" style="object-fit: contain;width: 100%; height:232px;"></a>
                                @elseif($cast['profile_path'] != "")
                                <a href=" {{ url('cast_details/'.$cast['id']) }}"><img class="img-fluid pad" src="https://www.themoviedb.org/t/p/w138_and_h175_face{{ $cast['profile_path'] }}" alt="Photo" style="object-fit: contain;width: 100%; height:232px;"></a>
                                @endif

                            </div>
                            <div class="card-footer">
                                <div class="flex items-center space-x-2 tracking-wide pb-1">
                                    <div>
                                        <span class="leading-6 text-bold"><b>{{ $cast['original_name'] }}</b></span>
                                    </div>
                                    <div>
                                        <i class="leading-6 text-sm">{{ $cast['character'] }}</i>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @include('layouts.Modal')
        </div>
    </div>
    <!-- /.content -->
    @include('layouts.Footer')