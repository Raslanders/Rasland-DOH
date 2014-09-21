<?php

Class Transaviatest {

    public function getPersonsInGroup($flightNumber)
    {
    $url = "../Transavia/transaviaCopy.csv";
    $transaviaArray = [];
    $found =false ;
    $personsInGroup =[];
    $currentHighest = 11011200;//make it a date lower than the lowest in the set
    
        
    
        if (($handle = fopen($url, "r")) !== FALSE) { //open the csv file
            while (($data = fgetcsv($handle, 0, ",")) !== FALSE)    //go through the lines of the csv file
            {
                if (($data[1].$data[2] == $flightNumber)) //if the flightnumber is equal to the flight number provided
                {

                    if ($this->highestDate($currentHighest,$data[3]) == $data[3] && $currentHighest != $data[3])//data[3] is higher than the currenthighest
                    {
                        $personsInGroup = [];
                    }
                    else if ($currentHighest != $data[3]) //then it was lower, so we do not add it
                    {
                     continue;   
                    }
                    //we have skipped if the date was lower as the newest date.
                    $currentHighest = $data[3];

                    //we found our flight
                    //print_r($data[0].";".$data[1].$data[2].";".$data[3].$data[4]);

                    if(array_key_exists($data[0],$personsInGroup))
                    {
                    $personsInGroup[$data[0]] = $personsInGroup[$data[0]]+1;
                    }
                    else
                    {
                        $personsInGroup[$data[0]] = 1;
                    }

                }

            }//end of while loop
            fclose($handle);
        }
        return($personsInGroup);
    }
    //Returns the highestDate of the two. If they are equal return the first.
    function highestDate($date1,$date2)
    {
                $year1 = substr($date1, -4);
                $month1 = substr(substr($date1, -6),0,2);
                $day1 = substr($date1,0,strlen($date1)-6);

                $year2 = substr($date2, -4);
                $month2 = substr(substr($date2, -6),0,2);
                $day2 = substr($date2,0,strlen($date2)-6);

                //check if the date is more recent than the one we had in storage, if it is we continue
                if ($year1 < $year2) 
                {
                    return($date2);
                }
                if ($year1 > $year2)
                {           
                    return($date1);
                }
                if ($year1 == $year2)
                {
                    //check month now
                    if ($month1 < $month2) 
                    {
                        return($date2);
                    }
                    if ($month1 > $month2)
                    {
                        return($date1);  
                    }
                    if ($month1 == $month2)
                    {
                       //check day now
                        if ($day1 < $day2) 
                        {
                            return($date2);
                        }
                        if ($day1 > $day2)
                        {
                            return($date1);
                        }
                    }
                }
        //equally high, so we return the first

       return($date1);
    }

    }
?> 