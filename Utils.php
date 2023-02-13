<?php

function generateJsonFile($dbData, $ModelPath){
    // data stored in an array called posts
    require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . $ModelPath);
    $data = Array();
    $years = [];
    $months = [];
    $days = [];
    
    foreach ($dbData as $d) {
        $begin = new DateTime($d->getStartDate());
        $end = new DateTime($d->getEndDate());
        $end->modify('+1 day');
        $interval = DateInterval::createFromDateString('1 day');
        $period = new DatePeriod($begin, $interval, $end);
        if ($begin !== $end) {
            foreach ($period as $dt) {  
                array_push($days, [$dt->format("d") => [
                    "startTime" => "08:00",
                    "endTime" => "16:00",
                    "text" => $d->getName()
            ]]);
                $arrayToPush = [$dt->format("m")=>$days];    
                $yearArrayToPush = [$dt->format("Y")=>$arrayToPush];   
                
                if ($dt->format("m") != $dt->modify('+1 day')->format("m") || 
                        $dt->format("d.m.Y") == $end->format("d.m.Y")) {
                            if (!in_array($arrayToPush, $months)) {
                                array_push($months, $arrayToPush);
                            }
                            if (!in_array($yearArrayToPush, $years)) {
                                array_push($years, $yearArrayToPush);
                            }
                            $days = [];

                    }
               }
            array_push($data, ...$years);
            $_SESSION["userVacationData"] = $data;    

        } 
    }
}


?>