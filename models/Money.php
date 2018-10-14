<?php
include_once ('../config.php');
include_once (ROOT.'/models/Db.php');
class Money extends Db
{
    public function getMoneySum()
    {
        $db = new Db;
        $query = "SELECT * FROM `money`";
        $money = $db->selectRow($query);
        return $money['sum'];
    }       
}