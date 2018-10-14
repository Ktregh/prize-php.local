<?php
include_once (ROOT.'/models/Db.php');
class User extends Db
{
    private function checkUser($login, $password)
    {
        $db = new Db;
        $query = "SELECT * FROM `user` WHERE `name` = {?}";
        $user = $db->selectRow($query, array($login));
        if($user)
        {
            return true;
        }
        else
        {
            return false;
        }
    }       
    public function isAuth()
    {
        $login = $_SESSION["login"];
        $password = $_SESSION["password"];
        return $this->checkUser($login, $password);
    }
    public function login($login, $password)
    {
        //$password = md5($password);
        if($this->checkUser($login,$password))
        {
            
            $_SESSION["login"] = $login;
            $_SESSION["password"] = $password;
            $_SESSION["bonus"] = $this->getBonus($login);
            return true;
        }
        else return false;
    }
    public function getBonus($login)
    {
        $db = new Db;
        $query = "SELECT * FROM `user` WHERE `name` = {?}";
        $user = $db->selectRow($query, array($login));
        return $user['bonus'];
    }       
    public function plusBonus($login, $change)
    {
        $db = new Db;
        $bonus = $this->getBonus($login);
        $bonus += $change;
        $query = "UPDATE`user` SET bonus = '.$bonus.' WHERE `name` = {?}";
        if($db->query($query, array($login)))
        {
            return true;
        }
        else return false;
    }
    /*public function getRegCode($login)
    {
        $regcode = md5($login);
        return $regcode;
    }
    public function login_unique($login)
    {
        $db = new Db;
        $query = "SELECT * FROM `profile` WHERE `login` = {?}";
        $login2 = $db->selectCell($query, array($login));
        if($login2) return false;
        else return true;
    }*/
    public function getName($login)
    {
        $db = new Db;
        $query = "SELECT `name` FROM `user` WHERE `login` = {?}";
        $name = $db->selectCell($query, array($login));
        return $name;
    }
    /*public function getPassword()
    {
        $password = "";
        $arr = array(
       'a', 'b', 'c', 'd', 'e', 'f',
       'g', 'h', 'i', 'j', 'k', 'l',
       'm', 'n', 'o', 'p', 'q', 'r',
       's', 't', 'u', 'v', 'w', 'x',
       'y', 'z', 'A', 'B', 'C', 'D',
       'E', 'F', 'G', 'H', 'I', 'J',
       'K', 'L', 'M', 'N', 'O', 'P',
       'Q', 'R', 'S', 'T', 'U', 'V',
       'W', 'X', 'Y', 'Z', '1', '2',
       '3', '4', '5', '6', '7', '8',
       '9', '0', '#', '!', "?", "&");
        for ($i = 0; $i < 10; $i++)$password .= $arr[mt_rand(0, count($arr) - 1)];
        return $password;
    }*/
}
 