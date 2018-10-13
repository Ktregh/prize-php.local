<?php
class Validation
{
    public static function clean($value)
    {
        for($i = 0; $i < count($value); $i++)
        {
            $value[$i] = trim($value[$i]);
            $value[$i] = stripslashes($value[$i]);
            $value[$i] = strip_tags($value[$i]);
            $value[$i] = htmlspecialchars($value[$i]);
        }
        return $value;
    }
}

