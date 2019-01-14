$(function(){

    var wW = window.innerWidth;
    
    $('.noimage').css('width', wW);
    
    $uploadCrop = $('#upload-demo').croppie({
        enableExif: true,
        viewport: {
            width: wW * 0.75,
            height: wW * 0.75 * 1.3
        },
        boundary: {
            width: wW,
         　 height: wW * 1.2
        },
        showZoomer: false
    });
    
    $('#upload').on('change', function () { 
        $('#upload-demo').css("display","block");
        $('#noimage').css("display","none");
        var reader = new FileReader();
        reader.onload = function (e) {
            $uploadCrop.croppie('bind', {
                url: e.target.result
            });
        }
        reader.readAsDataURL(this.files[0]);
    });
    
    
    $('.upload-result').on('click', function (ev) {
        $uploadCrop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function (resp) {
            $.ajax({
                url: "ajaxUpload",
                type: "POST",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {"image":resp},
                success: function (data) {
                    $('#image_resp').val(data);
                    $("#move_detail").submit();
                }
            });
        });
    });

    $('.image-post').on('click', function (ev) {
        $("#image_upload").submit();
    });
})