<?php
function findTheColour($colour)
{
    switch ($colour) {
        case 'red':
            return 'It is red';
        case 'blue':
            return 'It is blue';
        case 'green':
            return 'It is green';
        default:
            return 'It does not match';
    }
}

//echo findTheColour('green'); // It is green
$arrColor = array("red","blue","green","black");
foreach($arrColor as $i){
    echo findTheColour($i)."<br>";
}

//$_SERVER : SUPER_GLOBAL_ARRAY
echo $_SERVER['PHP_SELF'];//Returns the filename of the currently executing script : /PHPinVisualStudioCode/try.php
echo "<br>";
echo $_SERVER['SCRIPT_NAME'];	//Returns the path of the current script : /PHPinVisualStudioCode/try.php
echo "<br>";
echo $_SERVER['GATEWAY_INTERFACE'];	//Returns the version of the Common Gateway Interface (CGI) the server is using : CGI/1.1
echo "<br>";
echo $_SERVER['SERVER_ADDR'];	//Returns the IP address of the host server :   ::1
echo "<br>";
echo $_SERVER['REMOTE_ADDR'];	//Returns the IP address from where the user is viewing the current page :  ::1
echo "<br>";
echo $_SERVER['SERVER_NAME'];	//Returns the name of the host server (such as www.w3schools.com) : 
echo "<br>";
echo $_SERVER['SERVER_SOFTWARE'];	//Returns the server identification string (such as Apache/2.2.24) : Apache/2.4.46 (Win64) OpenSSL/1.1.1h PHP/7.4.15
echo "<br>";
echo $_SERVER['SERVER_PROTOCOL'];	//Returns the name and revision of the information protocol (such as HTTP/1.1) : HTTP/1.1
echo "<br>";
echo $_SERVER['REQUEST_METHOD'];	//Returns the request method used to access the page (such as POST) : GET
echo "<br>";
echo $_SERVER['HTTP_REFERER'];	//Returns the complete URL of the current page (not reliable because not all user-agents support it) : http://localhost/PHPinVisualStudioCode/
echo "<br>";
echo $_SERVER['SERVER_ADMIN'];	//Returns the value given to the SERVER_ADMIN directive in the web server configuration file (if your script runs on a virtual host, it will be the value defined for that virtual host) (such as someone@w3schools.com)  : postmaster@localhost
echo "<br>";echo "<br>";echo "<br>";echo "<br>";
$i="hi,monica,23,alex";
$token = strtok($i, ",");
echo "first:   $token";echo "<br>";
echo "i:   $i";;echo "<br>";
while ($token !== false)
  {
  echo "$token<br>";
 $token = strtok(",");
 }
?>