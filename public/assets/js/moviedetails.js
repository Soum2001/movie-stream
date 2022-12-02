function movie_details(movie_id)
{
    
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Accept': 'application/json', 
        },
        url:'fetch_cast',
        type:'get',
        data:{movie_id:movie_id},
        success:function(response){
         
            jQuery('#image_body').html(response);
        }
    });
}