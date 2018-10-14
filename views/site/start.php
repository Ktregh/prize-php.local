<div class="startdiv">
    <div class="divbutton" style="margin-top: 100px;" id="startbutton">
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
        <div id="prizediv" style="display: none;">
            <button id="getprize">Получить приз</button>
            <button id="refuseprize">Отказаться от приза</button>
        </div>
    </div>
   
</div>
 <div class="divbutton" style="display: none; margin-top: 50px;" id="mainbutton">
        <a class="buttonstart" href="/">
            На главную
        </a>
    </div>
<script>
    var type = 0;
    $('#start').click(function()
    {
        $('#startbutton').remove();
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
        }, 1);
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
                prize = data.prize;
                alert(prize);
                /*result = data.result;
                bonus = data.bonus;*/
                getPrize2();
           });
            
        }
        function getPrize2()
        {
            switch(type)
            {
               case 1:
                   $('#imgprize').attr('src', '/img/1.png');
                   $('#textp').html('Вы выиграли денежный приз - ' + prize + ' денег!');
                   $('#moneydiv').css({'display' : 'block'});
                   break;
                case 2:
                    $('#imgprize').attr('src', '/img/2.png')
                    $('#textp').html('Вы выиграли баллы - ' + prize + ' баллов! У Вас на счету ' + bonus + ' баллов!');
                    $('#bonus').html(bonus);
                    $('#mainbutton').css({'display' : 'block'});
                    break;
                case 3:
                    $('#imgprize').attr('src', '/img/3.png');
                    $('#textp').html('Вы выиграли приз - ' + prize);
                    $('#prizediv').css({'display' : 'block'});
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
        $('#mainbutton').css({'display' : 'block'});
        $('#moneydiv').remove();
    });
});
</script>