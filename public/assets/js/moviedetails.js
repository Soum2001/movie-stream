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
        data: { search_item : search },
        success: function (response) {
             $("#home").html("");
            // //document.getElementById(home).innerHTML = "";
             jQuery('.search').html(response);
        }
    });
}