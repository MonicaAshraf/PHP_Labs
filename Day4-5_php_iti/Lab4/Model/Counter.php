<?php
class Counter{
    public static function increase(){
        $counts=file("count.txt");
        $counts[0]++;
        $fp=fopen("count.txt",'w');
        fwrite($fp,$counts[0]++);
        fclose($fp);
    }
}