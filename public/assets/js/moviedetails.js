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
function new_list(){
    var list_name = $("#list_name").val();
    
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Accept': 'application/json',
        },
        url: '../create_new_list',
        type: 'post',
        data: { list_name : list_name },
        success: function (response) {
            var jsonData = JSON.parse(JSON.stringify(response));
            if (jsonData.dbStatus) {
                toastr.success(jsonData.dbMessage);
            }
            else {
                toastr.error(jsonData.dbMessage);
            }
            //      $("#home").html("");
            //     // //document.getElementById(home).innerHTML = "";
            //      jQuery('.search').html(response);
        }
    });
}