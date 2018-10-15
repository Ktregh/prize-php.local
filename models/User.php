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
        public function getName($login)
        {
            $db = new Db;
            $query = "SELECT `name` FROM `user` WHERE `login` = {?}";
            $name = $db->selectCell($query, array($login));
            return $name;
        }
        public function getCard($login)
        {
            $db = new Db;
            $query = "SELECT * FROM `user` WHERE `name` = {?}";
            $user = $db->selectRow($query, array($login));
            return $user['card'];
        }
    }
 