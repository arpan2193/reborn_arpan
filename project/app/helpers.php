<?php

if(!function_exists("getDollLength")){

    function getDollLength($length="", $lengthUnit=""){
        switch($lengthUnit){
            case "inch":
                return number_format($length).'" ('.number_format((2.54 * $length)).'cm)';
                break;
            case "cms":
                return number_format(($length/2.54)).'" ('.number_format($length).'cm)';
                break;
            case "feet":
                return number_format(($length*12)).'" ('.number_format(($length*30.48)).'cm)';
                break;
            case "meters":
                return number_format(($length*39.3701)).'" ('.number_format(($length*100)).'cm)';
                break;
            default:
                return '';
        }
    }
}

if(!function_exists("posted_time_calculation")){
    function posted_time_calculation($time){
        $date = date('m/d/Y h:i:s a', time());                                       
        $date1=date_create($time);
        $date2=date_create($date);
        $diff=date_diff($date1,$date2);
        return $days =$diff->format("%a days");  
    }
}


if(!function_exists('p')){
    function p($data){
        echo "<pre>";
        print_r($data);
        echo "<pre>";
        exit;
    }
}