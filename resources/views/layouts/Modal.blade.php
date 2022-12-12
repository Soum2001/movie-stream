<div class="modal fade" id="add_list" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">


            <input type="hidden" id="new_galley_id">
            <div class="modal-body" style="background-color:rgb(3,37,65)">
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}" />
                <h3><b style="color:white" onclick="new_list_page()">+ Create New List</b></h3><a>
                    <ul class="nav nav-pills ml-auto p-2">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" style="color:white">
                                List already have <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu">
                                @foreach($list as $list_details)
                                <!-- <a class="dropdown-item" tabindex="-1" id="add_gallery">{{$list_details->list_name}}</a> -->
                                <a class="dropdown-item" tabindex="-1" id='<?= $list_details['id']?>' onclick="select_list('<?= $list_details['id']?>','<?=$movie['poster_path']?>','<?=$movie['id']?>')">{{$list_details->list_name}}</a>
                                @endforeach
                            </div>
                        </li>
                    </ul>
            </div>


        </div>
    </div>
</div>
<div class="modal fade" id="add_new_list" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:rgb(3,37,65)">
                <h4 class="modal-title" id="exampleModalLabel" style="color:white">Add New List</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <input type="hidden" id="new_galley_id">
            <div class="modal-body" style="background-color:rgb(3,37,65)">
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}" />
                <label  style="color:white">List name</label>
                <input type="text" id="list_name" name="list_name" class="form-control sm">
            </div>
            <div class="modal-footer" style="background-color:rgb(3,37,65)">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="new_gallery" onclick="new_list('<?=$movie['poster_path']?>','<?=$movie['id']?>')">Add Gallery</button>
            </div>

        </div>
    </div>
</div>