<?php
session_start();
session_unset();
session_destroy();

header("Location: j1_login.php");
exit;

