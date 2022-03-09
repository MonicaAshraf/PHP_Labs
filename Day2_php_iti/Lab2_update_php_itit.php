<?php
//session
session_start();
if(!isset($_SESSION["is_visited"])){
	echo "First Visit, Hello!";
	$_SESSION["is_visited"]=true;
   	
}else{
	$_SESSION["counter"] = isset($_SESSION["counter"]) ? $_SESSION["counter"] + 1 : 2;
	echo "you visited this page ".$_SESSION["counter"]." times"; 
	
}//end_session

 $erroMessage=array();
 if(isset($_POST["submit"]))
 {
    foreach($_POST as $key=>$value)
    {
		if(empty($value)) $erroMessage[] = "$key is required!";
	} //end_foreach_empty($value)
   
    
   //Validation_Name
  $name=$_POST["name"];
  if(isset($name))
  {   $name = trim($_POST["name"]);
      //$newName=trim($name,"\t");
      if(empty($name))
      {
        $erroMessage[]="Name is Required"; 
      }
      if(strlen($name)>100)
      {
         $erroMessage[]="Name Length should be less than 100 characters"; 
      }
  }//end_Validation_Name


  //Validation_Email
  $email=$_POST["email"];
  if(isset($email))
  {  
      if(empty($email))
      {
        $erroMessage[]="Email is Required";
      }
     if(!filter_var($email , FILTER_VALIDATE_EMAIL)) 
     {
        $erroMessage[]="Please input a valid email";
     }
  }//end_Validation_Email


  //Validation_TextMessage
$message=$_POST["message"];
if(isset($message))
{
    if(empty($message))
    {
        $erroMessage[]="message is Required"; 
    }
    if(strlen($message)>255)
    {
       $erroMessage[]="message Length should be less than 255 characters"; 
    }
}//end_Validation_TextMessage


//All_Feild_is_full
if(empty($erroMessage)){
    foreach($_POST as $key=>$value){
        if($key != "submit") echo "<br/><center>$key: $value </center>";}
        if(!file_exists("log.txt"))
        {
            $fp = fopen("log.txt","a+");
            $VisitedDate=date("F j Y g:i a");
            $line1="$VisitedDate,".$_SERVER['REMOTE_ADDR'].",".$_POST["email"].",".$_POST["name"];
            fwrite($fp,$line1.PHP_EOL);
            fclose($fp);
         
        }//exist
        else{
            $fp = fopen("log.txt","a+");
            $VisitedDate=date("F j Y g:i a");
            $line2="$VisitedDate,".$_SERVER['REMOTE_ADDR'].",".$_POST["email"].",".$_POST["name"];
            fwrite($fp,$line2.PHP_EOL);
            fclose($fp);
            }
    //
    die("<br/><center>Thank you for submitting the form!</center>");
}




/*
//apend_in_file
if(!file_exists("log.txt"))
{
    $fp = fopen("log.txt","a+");
    $VisitedDate=date("F j Y g:i a");
    if(isset($_POST["submit"]) && empty($erroMessage)){
    $line1="$VisitedDate,".$_SERVER['REMOTE_ADDR'].",".$_POST["email"].",".$_POST["name"];
    //$line1="VisitedDate,IpAddress,Email,Name";
    fwrite($fp,$line1.PHP_EOL);}
    fclose($fp);
        }
else{
    $fp = fopen("log.txt","a+");
    $VisitedDate=date("F j Y g:i a");
    //echo "$email,$name";
    if(isset($_POST["submit"]) && empty($erroMessage)){
    $line2="$VisitedDate,".$_SERVER['REMOTE_ADDR'].",".$_POST["email"].",".$_POST["name"];
    fwrite($fp,$line2.PHP_EOL);}
    fclose($fp);
    }
*/


}//end_if_isset_$_POST["submit"]   



//get_value
function get_default($element)
{
   if(isset($_POST[$element]))
   {
       echo $_POST[$element];
   }   
   else{
       echo "";
   }
}

/*
//Test_file
 if(!file_exists("log.txt") ){
    $fp = fopen("log.txt","a+");
    if(isset($_POST["submit"]) && empty($erroMessage)){
        foreach($_POST as $key=>$value){
            if($key !="submit"){
                $line="$key : $value";
               // echo "<div> key : $key  ,  value: $key </div>";
                fwrite($fp,$line.PHP_EOL);
            }
        }
    }
    fclose($fp);
}//end_if_file_exists
    
    else{
        $fp = fopen("log.txt","a+");
        if(isset($_POST["submit"]) && empty($erroMessage)){
            foreach($_POST as $key=>$value){
                if($key !="submit"){
                    $line="$key : $value";
                   // echo "<div > key : $key  ,  value: $key </div>";
                    fwrite($fp,$line.PHP_EOL);
                }
            }}
        fclose($fp);
        }
*/









?>
<html>
    <head>
        <title> contact form </title>
    </head>
    <body>
        <h3> Contact Form </h3>
        <div id="after_submit">
            <?php //To_Trace 
               foreach($erroMessage as $line){
                   echo "** $line <br/>";
               } 
            ?>
        </div>
        <form id="contact_form" action="Lab2_update_php_itit.php" method="POST" enctype="multipart/form-data">

            <div class="row">
                <label class="required" for="name">Your name:</label><br />
                <input id="name" class="input" name="name" type="text" value="<?php get_default("name"); ?>"   size="30" /><br />

            </div>
            <div class="row">
                <label class="required" for="email">Your email:</label><br />
                <input id="email" class="input" name="email" type="text" value="<?php get_default("email"); ?>" size="30" /><br />

            </div>
            <div class="row">
                <label class="required" for="message">Your message:</label><br />
                <textarea id="message" class="input" name="message" rows="7" cols="30"></textarea><br />

            </div>

            <input id="submit" name="submit" type="submit" value="Send email" />
            <input id="clear" name="clear" type="reset" value="clear form" />

        </form>
    </body>
</html>