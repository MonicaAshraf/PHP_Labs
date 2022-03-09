<?php

 class Login{

    static function check_Login(){
       // var_dump($_SESSION);
       if(isset($_SESSION["userid"])&&is_numeric($_SESSION["userid"])){
        //logged in this visit   
        return true;
       }elseif(isset($_COOKIE["remember_me"])&& $_COOKIE["remember_me"]==correct_token){
                //logged in in a previous visit and checked remember me 
                $_SESSION["userid"]=5;
                return true;
       }
       else{
           return false;
       }
    }


    static function Authenticate($entered_username,$entered_password){
        if($entered_username == correct_username  && sha1($entered_password)==correct_upassword){
           if($remember_me)self::Remember();
            return true;
        }else{
            return false;
        }
    }

    static function Remember(){

        setcookie("remember_me","hcfjrgdjte5r77898fhdgfajf8gjyhjhvhgxesnkjbkuyvjtcfxdfxdsz",0);
    }


 }


?>