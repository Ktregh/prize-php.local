<?php

    include_once ('../config.php');
    include_once (ROOT.'/models/Db.php');
    class Prize extends Db
    {
        public function checkPrizeQuantity()
        {
            $db = new Db;
            $query = "SELECT * FROM `prize` WHERE quantity < '0'";
            $prize = $db->selectRow($query);
            return $prize;
        }
        public function getPrize()
        {
            $db = new Db;
            $query = "SELECT * FROM `prize` WHERE quantity > '0'";
            $prize = $db->select($query);
            shuffle($prize);
            return $prize[0];
        }
        public function minusPrizeQuantity($prize)
        {
            $db = new Db;
            $query = "UPDATE `prize` SET quantity = `quantity` - 1 WHERE prize = {?}";
            if($db->query($query, array($prize)))
            {
                return true;
            }
            else return false;
        }
    }