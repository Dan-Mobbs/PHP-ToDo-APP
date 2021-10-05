<?php

session_start();
session_unset();
session_destroy();

header( "location: ../page-templates/login/login.php" );
exit();
