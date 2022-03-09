<?php
//var_dump($all_records);

//echo "<h5>".$glasses->product_name."</h5>";

/*
foreach($glasses as $key=>$value){
    echo "<h5>".$key.":".$value."</h5>";
}
*/


/*
echo "<h5> made in canada </h5>";
foreach(canada_glasses as $glass){
    foreach($glass as $key=>$value){
        echo "<h5>".$key.":".$value."</h5>";
    }
}
*/

echo "<table border='1'>";
$record_index = 0;
foreach ($all_requrds as $item) {
    if ($record_index === 0) {
        echo "<tr>";
        foreach ($item as $key=>$value) {
            echo "<td> $key </td>";
        }
        echo "<td> Images </td>";
        echo "<td> Visit </td>";
        echo "</tr>";
    } 
        echo "<tr>";
        foreach ($item as $value) {
            echo "<td>$value </td>";
        }
        $image = explode(".",$item->Photo );
        $image =  $image[0]."tz".".png";
        echo "<td><img src='images/" .$image." '></td>";
        $current_url=(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']==='on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $current_url=explode("?",$current_url);
        $details=$current_url[0]."?glass=".$item->id;
        echo "<td><a href='".$details."'>Click to visit</a></td>";
        echo "</tr>";
   
   $record_index ++;
}
echo "</table>";
?>

<div> 
    <a href="<?php echo $previous_link;  ?>"> << Prev </a> | <a href="<?php echo $next_link;  ?>">  Next >> </a>
</div>
