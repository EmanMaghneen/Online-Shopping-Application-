<?php
session_start();
if( isset( $_COOKIE[ session_name() ] ) )
{
    setcookie( session_name(), '', time()-86400, '/' );
    
}

session_unset();

session_destroy();


?>
<span>See you next time!!! You can <a href="Login.php">Login</a> again</span>