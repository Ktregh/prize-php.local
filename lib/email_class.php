<?php
class Mail {

    private $from;
    private $from_name = "";
    private $type = "text/html";
    private $encoding = "utf-8";
    private $notify = false;
    
    public function __construct($from)
    {
        $this->from = $from;
    }
    public function setFrom($from)
    {
        $this->from = $from;
    }
    public function setFromName($from_name)
    {
        $this->from_name = $from_name;
    }
    public function setType($type)
    {
        $this->type = $type;
    }
    public function setNotify($notify)
    {
        $this->notify = $notify;
    }
    public function setEncoding($encoding)
    {
        $this->encoding = $encoding;
    }
    public function send($to, $subject, $message)
    {
        $from = "=?utf-8?B?".base64_encode($this->from_name)."?="." <".$this->from.">"; 
        $headers = "From: ".$from."\r\nReply-To: ".$from."\r\nContent-type: ".$this->type."; charset=".$this->encoding."\r\n";
        if ($this->notify) $headers .= "Disposition-Notification-To: ".$this->from."\r\n"; 
        $subject = "=?utf-8?B?".base64_encode($subject)."?=";
        return mail($to, $subject, $message, $headers);
    }
}