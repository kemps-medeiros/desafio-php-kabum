<?php
session_start();

unset($_SESSION['userLogged']);

echo "<html><script type='text/javascript'>
 window.location.replace('../index.html')</script></html>";

?>



