<?php
$imported_content=file("log.txt");
foreach($imported_content as $i)
{    //var_dump($i);echo "<br>";
    //echo "$i <br>";
    //echo strstr($i,",",true); 
    $token = strtok($i, ",");
 while ($token !== false)
   {
   echo "$token<br>";
  $token = strtok(",");
  }
    echo "<br>";
    echo "--------------------------------------------------------------------------------------------------------------------------";
    echo "<br> <br> <br>";
}

echo "--------------------------------------Second_way---------------------------------------------------------------------";
    echo "<br> <br> <br>";

foreach($imported_content as $index){
    $arr=explode(",",$index);
    echo"Visited date :  ".$arr[0]."<br>";
    echo"Ip Address :  ".$arr[1]."<br>";
    echo"Email :  ".$arr[2]."<br>";
    echo"Name :  ".$arr[3]."<br>";
    echo "--------------------------------------------------------------------------------------------------------------------------";
    echo "<br> <br> <br>";
}



echo"<br>";echo"<br>";echo"<br>";echo"<br>";
//var_dump($imported_content);
//$imported_content_2=file_get_contents("log.txt");
//var_dump($imported_content_2.PHP_EOL);
echo"<br>"; echo"<br>";
//print_r($imported_content_2);
echo"<br>";echo"<br>";
//print_r($imported_content);
echo "<br> <br> <br>";
$str=implode(",",$imported_content);
var_dump($str);
?>