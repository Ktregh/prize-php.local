<?php
    include_once ('../config.php');
    include_once (ROOT.'/models/User.php');
    if(isset($_POST['firststep']))
    {
        include_once (ROOT.'/models/Money.php');
        $money = new Money;
        $sum = $money->getMoneySum(); //проверка наличия денег в кассе
        if($sum > 0) //если деньги есть, тогда тип приза "деньги" участвует в розыгрыше
        {    
            $first = 1;
        }
        $type = 2;
        //$type = rand($first,3); // получаем тип приза 1 - деньги; 2 - балы; 3 - предмет
        if($type == 1) //приз - деньги
        {
            if($sum < 100)
            {
                $data['moneyprize'] = rand(1, $sum); //если денег меньше 100
            }
            else
            {
                $data['moneyprize'] = rand(1, 100);
            }
            $_SESSION['moneyprize'] = $data['moneyprize'];
            $money->minusMoneySum($data['moneyprize']);
            $data['type'] = $type;
            echo json_encode($data);
        }
        if($type == 2) //приз - бонусы
        {
            $data['bonusprize'] = rand(100, 200); 
            $user = new User;
            $login = $_SESSION['login'];
            $bonussum = $user->getBonus($login);
            $bonusresult = $user->plusBonus($login, $data['bonusprize']);
            
            
        }
        if($type == 3) //приз - предметы
        {
        
        }
    }
    if(isset($_POST['changemoney']))
    {
        
        $moneyprize = $_SESSION['moneyprize'];
        $login = $_SESSION['login'];
        $change = $moneyprize * 2; //коэффициент обмена денег на бонусы
        $user = new User();
        $bonusresult = $user->plusBonus($login, $change);
        if($bonusresult)
        {
            $data['result'] = "Деньги успешно переведены в баллы";
            $data['bonus'] = $user->getBonus($login);
        }
        else 
        {
            $data['result'] = "Что-то пошло не так";
        }
        echo json_encode($data);
    }




        
    