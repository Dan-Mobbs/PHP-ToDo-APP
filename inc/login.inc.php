<?php 

if ( isset( $_POST["sumbit"]) ) {

    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];

    require_once 'dbh.inc.php';
    require_once 'functions.php';

    if ( emptyInpuLogin( $uid, $pwd ) !== false ) {

        header( "location: ../page-templates/login/login.php?error=emptyinput" );
        exit();

    }    

    loginUser( $conn, $uid, $pwd );

}
else {
    header( "location: ../page-templates/login/login.php");
    exit();
}