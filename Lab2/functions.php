<?php
function store_submits_to_file($name,$email){
 $fp = fopen(SUBMIT_FILE, "a+");

 if($fp){
    $input = date("Y-m-d H:i:s").",".$_SERVER['SERVER_ADDR'].","."$name,$email".PHP_EOL;
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

function display_all_submits(){
    $lines = file(SUBMIT_FILE);
    foreach($lines as $line){
        $words = explode(",",$line);
        $i=0;
        foreach($words as $word){
            if($i==0){
              echo"<h5>Visit date: $word</h5>";
            }elseif($i==1){
                echo"<h5>IP Adress: $word</h5>";
            }elseif($i==2){
                echo"<h5>Name: $word</h5>";
            }else{
                echo"<h5>Email: $word</h5>";
            }
            $i++;
        }
        echo"<hr>";
    }


}

?>