<?php
   session_start();
   require_once("vendor/autoload.php");
   if(isset($_POST["username"])){
       if(Login::Authenticate($_POST["username"],$_POST["password"])){
           $_SESSION["userid"]=5;
           header("Location : index.php?page=user"); 
       }
   }else{
   if(!Login::check_Login()){
       $page="login";
   }else{
   $my_user=new User("admin","admin123","monicaashraf534@gmail.com");
   //var_dump($my_user);
   $pages=array("login","user");
   $page=(isset($_GET["page"]) && in_array($_GET["page"],$pages))?
   $_GET["page"] : "login";
   }
   require_once("Views/$page.php");
}
?>