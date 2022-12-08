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
                        <i class="fas fa-list add_list" onclick="add_to_list('<?= $movie['poster_path'] ?>')" data-toggle="tooltip" data-html="true" title="<em>Tooltip</em> <u>with</u> <b>HTML</b>"></i>
                        <i class="fas fa-heart add_list"></i>
                        <i class="fas fa-bookmark add_list"></i>
                        <i class="fas fa-star add_list"></i>
                    </p>
                    <p class="text-muted">Genre:</span> @foreach($movie['genres'] as $geners){{ $geners['name'] }}, @endforeach

                    </p>

                    <h3><span><b>Overview</b></span></h3>
                    <p>{{$movie['overview']}}</p>

                    <hr>
                    <p><span class="text-muted">Date Released:</span> {{ $movie['release_date'] }}</p>
                    <p><span class="text-muted">Duration:</span> {{ $movie['runtime'] }}mins</p>
                    <p><span class="text-muted">Budget:</span> {{ $movie['budget'] }}</p>
                    <p><span class="text-muted">Revenue:</span> {{ $movie['revenue'] }}</p>
                    <p><span class="text-muted">Status:</span> {{ $movie['status'] }}</p>
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
                                        <span class="leading-6 text-sm">{{ $cast['original_name'] }}</span>
                                    </div>
                                    <div>
                                        <span class="leading-6 text-sm">{{ $cast['character'] }}</span>
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