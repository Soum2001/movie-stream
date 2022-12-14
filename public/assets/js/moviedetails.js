function movie_details(movie_id) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Accept': 'application/json',
        },
        url: 'fetch_cast',
        type: 'get',
        data: { movie_id: movie_id },
        success: function (response) {
            $("#home").html("");
            //document.getElementById(home).innerHTML = "";
            jQuery('.image_body').html(response);
        }
    });
}
function search() {
    var search = $("#search_name").val();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Accept': 'application/json',
        },
        url: 'search',
        type: 'get',
        data: { search_item: search },
        success: function (response) {
            $("#home").html("");
            // //document.getElementById(home).innerHTML = "";
            jQuery('.search').html(response);
        }
    });
}
function add_to_list(poster_path) {

    $.ajax({
        url: '../add_to_list',
        type: 'get',
        data: { poster_path : poster_path },
        success: function (response) {
            var jsonData = JSON.parse(JSON.stringify(response));
            if (jsonData.dbStatus) {
                $('#add_list').modal('show');
            }
            else {
                toastr.error('Login to add custom lists');
            }
            //      $("#home").html("");
            //     // //document.getElementById(home).innerHTML = "";
            //      jQuery('.search').html(response);
        }
    });
}
function new_list(poster_path,movie_id){

    var list_name = $("#list_name").val();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Accept': 'application/json',
        },
        url: '../create_new_list',
        type: 'post',
        data: { list_name : list_name ,poster_path : poster_path ,movie_id : movie_id },
        success: function (response) {
            var jsonData = JSON.parse(JSON.stringify(response));
            if (jsonData.dbStatus) {
                toastr.success(jsonData.dbMessage);
                $("#add_new_list").modal('hide');
            }
            else {
                toastr.error(jsonData.dbMessage);
                $("#add_new_list").modal('hide');
            }
            //      $("#home").html("");
            //     // //document.getElementById(home).innerHTML = "";
            //      jQuery('.search').html(response);
        }
    });
}
function new_list_page()
{
    $("#add_new_list").modal('show');
    $('#add_list').modal('hide');
}
function select_list(id,poster_path,movie_id)
{
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Accept': 'application/json',
        },
        url: '../add_to_list',
        type: 'post',
        data: { id :id,poster_path : poster_path ,movie_id : movie_id },
        success: function (response) {
            var jsonData = JSON.parse(JSON.stringify(response));
            if (jsonData.dbStatus) {
                toastr.success(jsonData.dbMessage);
                $("#add_new_list").modal('hide');
            }
            else {
                toastr.error(jsonData.dbMessage);
                $("#add_new_list").modal('hide');
            }
            //      $("#home").html("");
            //     // //document.getElementById(home).innerHTML = "";
            //      jQuery('.search').html(response);
        }
    });
    
}
function all_movie_list(list_name)
    {
        $.ajax({
        
            url: '../list_of_collection',
            type: 'get',
            data: {list_name : list_name},
            // success: function (response) {
            //     var jsonData = JSON.parse(JSON.stringify(response));
            //     if (jsonData.dbStatus) {
            //         toastr.success(jsonData.dbMessage);
            //         $("#add_new_list").modal('hide');
            //     }
            //     else {
            //         toastr.error(jsonData.dbMessage);
            //         $("#add_new_list").modal('hide');
            //     }
            //     //      $("#home").html("");
            //     //     // //document.getElementById(home).innerHTML = "";
            //     //      jQuery('.search').html(response);
            // }
        });
    }