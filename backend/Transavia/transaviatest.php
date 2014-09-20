<?php
$url = "TransaviaCopy2.csv";

$transaviaArray = [];

$flightNumber = "HV6583";
$row = 0;
$found =false ;
$personsInGroup =[];
$currentHighest = 0;


if (($handle = fopen($url, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 0, ",")) !== FALSE)    
    {
    //    print( $row);
  //      print ("<br >");
        if (($data[1].$data[2] == $flightNumber))
        {
            $digits = $data[3];
            $year1 = substr($digits, -4);
            $month1 = substr(substr($digits, -6),2);
            $day1 = substr($digits,strlen($digits)-6);

            $year2 = substr($currentHighest, -4);
            $month2 = substr(substr($currentHighest, -6),2);
            $day2 = substr($digits,strlen($currentHighest)-6);

            //check if the date is more recent than the one we had in storage, if it is, remove the groups in storage and continue
            if ($year1 < $year2) 
            {
                continue;
            }
            if ($year1 > $year2)
            {
                $currentHighest = $digits;
            }
            if ($year1 == $year2)
            {
                //check month now
                if ($month1 < $month2) 
                {
                    continue;
                }
                if ($month1 > $month2)
                {
                    $currentHighest = $digits;
                    $personsInGroup =[];
                }
                if ($month1 == $month2)
                {
                   //check day now
                    if ($day1 < $day2) 
                    {
                        continue;
                    }
                    if ($day1 > $day2)
                    {
                        $currentHighest = $digits;
                        $personsInGroup =[];
                    }
                }
            }
            //we have skipped if the date was lower or equal to the newest date.
            
            
        
            //we found our flight
            //print_r($data[0].";".$data[1].$data[2].";".$data[3].$data[4]);
            $found = true;
            if(array_key_exists($data[0],$personsInGroup))
            {
            $personsInGroup[$data[0]] = $personsInGroup[$data[0]]+1;
            }
            else
            {
                $personsInGroup[$data[0]] = 1;
            }
            
        }
        $row++;
    }
    print_r($personsInGroup);
    fclose($handle);
}




?> 