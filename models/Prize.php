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
}