<?php
 //echo "first project";
 $erroMessage=array();
 if(isset($_POST["submit"]))
 {
     foreach($_POST as $element)
     {
         if(empty($element))
         {
           $erroMessage[]="All fields are Required"; 
         }
     }//end_foreach

//Validation_Name
  $name=$_POST["name"];
  if(isset($name))
  {   
      $newName=trim($name,"\t");
      if(empty($name)&& empty($newName) )
      {
        $erroMessage[]="Name is Required"; 
      }
      if(strlen($name)>100)
      {
         $erroMessage[]="Name Length should be less than 100 characters"; 
      }
  }
  
    
  



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
  }
 
   




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
}

 


 //All_Feild_is_full
 if(empty($erroMessage)){
     die("<center>Thank You for submitting form!  <br>  Name : $name <br>  Emai : $email  <br>  Message : $message</center>");
 }

 }//end_isset_submit


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
        <form id="contact_form" action="#" method="POST" enctype="multipart/form-data">

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