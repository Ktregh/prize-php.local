<div class="startdiv">
    <div class="divbutton" style="margin-top: 100px;">
        <a class="buttonstart" id="start">
            Испытать удачу!
        </a>
    </div>
    <div style="text-align: center; margin-top: 10px;">
        <img style="width: 300px; height: 225px"  id="imgprize" alt="" src=""/>
    </div>
    <div style="">
        
    </div>
</div>

<script>
    $('#start').click(function()
    {
       $('.divbutton').css({'display' : 'none'});
        $type = Math.floor(Math.random() * (3));//получаем тип приза 0 - деньги; 1 - балы; 2 - предмет
        
        
        var images = [{
            url: "/img/0.png", // Картинка
            timeout: 200 // Задержка для картинки
        }, {
            url: "/img/1.png", // Картинка
            timeout: 200
        }, {
            url: "/img/2.png", // Картинка
            timeout: 200
        }],
        i = 0,
        z = 0,
        timeout;
        function changeBackground()
        {
            clearTimeout(timeout);
            $('#imgprize').attr('src', function() {
            if (i >= images.length)
            {
               i = 0;
               z++;
            }
            timeout = setTimeout(changeBackground, images[i].timeout);
            if(z > 5)
            {
                $('.divbutton').css({'display' : 'block'});
                return false;
            }
            else
            {
                return images[i++].url; 
            }
            
            });
        }
        changeBackground();        
        
        
       
       
        function getPrize()
        {
            switch($type)
            {
               case 0:

                   break;
                case 1:

                   break;
                case 2:

                   break;
               default:
                     break;
           }
       }


    });
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
</script>