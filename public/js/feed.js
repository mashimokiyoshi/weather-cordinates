$(function(){
    $('.fa-heart').click(function () {
        var post_id = $(this).attr('id');
        $(this).toggleClass("favorite");
        var favorite_count = $(this).next();
        if($(this).hasClass("favorite")){
            favorite_count.text(parseInt(favorite_count.text())+1);
        } else {
            favorite_count.text(parseInt(favorite_count.text())-1);
        }

        $.ajax({
            url: 'feed/ajax_register_favorite',
            type:'POST',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {post_id:post_id},
        })
        .done(function(result) {
            if(!result.change){
                $('#'+ post_id).toggleClass("favorite");
                alert('通信エラー');
            }
        })
        .fail(function(xhr,err){
            alert('通信エラー');
            $('#'+ post_id).toggleClass("favorite");
        });
        
    });

    $('.feed-image').on('click', function () {
        var form = $('form');
        form.attr('action', 'detail');
        var image_id = $(this).data('imageid');
        $('<input>').attr({
            'type': 'hidden',
            'name': 'image_id',
            'value': image_id
        }).appendTo(form);
        form.submit();
    });
})