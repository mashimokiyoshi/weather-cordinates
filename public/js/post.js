$(function(){

    var wW = window.innerWidth;
    if(wW > 375){
        wW = 375;
    }
    
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
    
    
    $('.upload-result').on('click', function () {
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

    $('.image-post').on('click', function () {
        $("#image_upload").submit();
    });

    $('#pref').on('change', function () { 
        var city_num = $(this).val();
        getCurrentCityWeather(city_num);
    });

    function getCurrentCityWeather(city_num) {
        $.ajax({
            url: 'ajax_get_weather',
            type:'POST',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {city_num:city_num},
        })
        .done(function(result) {
            console.log(result);
            $('.weather-icon').children('img').attr('src', 'http://openweathermap.org/img/w/'+ result.weather.icon +'.png');
            $('.description').text(result.weather.description_jp);
            var temperature = result.temperature.day == null ?  '---' : result.temperature.day;
            $('.temperature').text(temperature + '℃');
        })
        .fail(function(xhr,err){
            alert('通信エラー');
        });
    }
})