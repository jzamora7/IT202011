<?php
//since this function call is included we can omit it here. Having multiple calls to session_start() will cause errors/warnings
//session_start();
// remove all session variables
echo "You're logged out (proof by dumping the session)<br>";
echo "<pre>" . var_export($_SESSION, true) . "</pre>";
sleep(3);
header("Location: login.php");
?>