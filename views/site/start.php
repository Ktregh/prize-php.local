<div class="startdiv">
    <div class="divbutton" style="margin-top: 100px;">
        <a class="buttonstart" id="start">
            Испытать удачу!
        </a>
    </div>
    <div style="text-align: center; margin-top: 10px;">
        <img style="width: 300px; height: 225px"  id="imgprize" alt="" src=""/>
        <p id="textp" style="font-size: 20px;"></p>
        <div id="moneydiv" style="display: none;">
            <button id="getmoney">Получить на счёт</button>
            <button id="changemoney">Поменять на балы (1 к 2)</button>
        </div>
    </div>
</div>
<script>
    var type = 0;
    $('#start').click(function()
    {
        $('.divbutton').css({'display' : 'none'});
        var images = [{
            url: "/img/1.png", // Картинка
            timeout: 200 // Задержка для картинки
        }, {
            url: "/img/2.png", // Картинка
            timeout: 200
        }, {
            url: "/img/3.png", // Картинка
            timeout: 200
        }],
        i = 0,
        z = 0,
        timeout;
        function changeImg()
        {
            clearTimeout(timeout);
            $('#imgprize').attr('src', function() {
                if (i >= images.length)
                {
                   i = 0;
                   z++;
                }
                timeout = setTimeout(changeImg, images[i].timeout);
                if(z < 5)
                {
                    return images[i++].url; 
                }
            });
        }
        changeImg();        
        setTimeout(function ()
        {
            getPrize();
        }, 3000);
        function getPrize()
        {
            $.ajax
            ({
                url: '/controllers/AjaxController.php',
                type: 'POST',
                dataType: 'json',
                data:
                {
                    firststep:'yes'
                },
             }).done(function(data)
             {
                type = data.type;
                moneyprize = data.moneyprize;
                getPrize2();
           });
            
        }
        function getPrize2()
        {
            switch(type)
            {
               case 1:
                   $('#imgprize').attr('src', '/img/1.png');
                   $('#textp').html('Вы выиграли денежный приз - ' + moneyprize + ' денег!');
                   $('#moneydiv').css({'display' : 'block'});
                   break;
                case 2:
                    $('#imgprize').attr('src', '/img/2.png')
                    $('#textp').html('Вы выиграли балы');
                   break;
                case 3:
                    $('#imgprize').attr('src', '/img/3.png')
                    break;
               default:
                     break;
           }
       }
}); 
$('#changemoney').click(function()
{
    $.ajax
    ({
        url: '/controllers/AjaxController.php',
        type: 'POST',
        dataType: 'json',
        data:
        {
            changemoney:'yes'
        },
     }).done(function(data)
     {
        var result = data.result;
        var bonus = data.bonus;
        $('#bonus').html(bonus);
        $('#textp').html(result + '. У Вас на счету ' + bonus + ' баллов!');
    });
});
</script>