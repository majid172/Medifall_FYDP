<?php
 session_start();
 session_destroy();
 echo "<script> location.href='orgLogin.php'; </script>";
?>