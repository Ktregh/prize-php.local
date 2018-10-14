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
    public function minusMoneySum($moneyprize)
    {
        $db = new Db;
        $sum = $this->getMoneySum();
        $result = $sum - $moneyprize;
        $query = "UPDATE `money` SET sum = '.$result.' WHERE id = '1'";
        if($db->query($query))
        {
            return true;
        }
        else return false;
    }
}