<?php
    include_once ('../config.php');
    if(isset($_POST['firststep']))
    {
        include_once (ROOT.'/models/Money.php');
        $money = new Money;
        $sum = $money->getMoneySum(); //проверка наличия денег в кассе
        if($sum > 0) //если деньги есть, тогда тип приза "деньги" участвует в розыгрыше
        {    
            $first = 1;
        }



        $type = 1;
        //$type = rand(1,3); // получаем тип приза 1 - деньги; 2 - балы; 3 - предмет
        if($type == 1) //приз - деньги
        {
            $data['sum'] = $sum;
            $data['type'] = $type;
            echo json_encode($data);
        }
    }




        
    