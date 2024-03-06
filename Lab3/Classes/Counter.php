<?php
class Counter{
    private $visitorsCounter;

  public function __construct(){
    $this->visitorsCounter = 0;
  }

  public function incrementsCounter(){
    $this->visitorsCounter = $this->getCounter();
    $this->visitorsCounter++;
    $this->saveCounter();
  }

  public function saveCounter(){
    $fp = fopen(COUNTER_FILE, "w");

    if($fp){
        $input =  $this->visitorsCounter;
        if(fwrite($fp,$input)){
            fclose($fp);
            return true;
        }else{
            return false;
        }
     }else{
        return false;
     }
  }

  public function getCounter(){
    $counter = file(COUNTER_FILE);
    if (empty($counter)) {
        $counter = [0];
    } else {
        $counter[0] = intval($counter[0]);
    }
    return $counter[0];
  }
}