<?php
class Req
{
    function http_post_curl($card, $sum)
    {
        $xml = '<?xml version="1.0" encoding="UTF-8"?>
                <request version="1.0">
                    <merchant>
                        <id>103662</id>
                        <signature>4ffc6115832fe6526710e7c7a15aeb11eeecd063</signature>
                    </merchant>
                    <data>
                        <oper>cmt</oper>
                        <wait>30</wait>
                        <test>0</test>
                        <payment id="2657374">
                            <prop name="b_card_or_acc" value="'.$card.'" />
                            <prop name="amt" value="'.$sum.'" />
                            <prop name="ccy"  value="UAH" />
                            <prop name="b_name" value="FIOletovo" />
                            <prop name="details" value="testVisa" />
                        </payment>
                    </data>
                </request>';
        $url = 'https://api.privatbank.ua/p24api/pay_visa';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/xml'));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
        $output = curl_exec($ch);
        curl_close($ch);
        libxml_use_internal_errors(true);
        $result = simplexml_load_string($output);
        if($result[0]->data->payment['state'])
            return true;
        else
            return false;
    }
}