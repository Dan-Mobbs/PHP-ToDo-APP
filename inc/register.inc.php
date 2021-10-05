<?php

if ( isset($_POST["submit"]) ) {
        
    $uid = $_POST["uid"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if ( emptyInputRegister( $uid, $name, $email, $pwd, $pwdRepeat ) !== false ) {

        header( "location: ../page-templates/login/register.php?error=emptyinput" );
        exit();

    }

    if ( invalidUid( $uid ) !== false ) {

        header( "location: ../page-templates/login/register.php?error=invaliduid" );
        exit();

    }

    if ( invalidEmail( $email ) !== false ) {

        header( "location: ../page-templates/login/register.php?error=invalidemail" );
        exit();

    }

    if ( pwdMatch( $pwd, $pwdRepeat ) !== false ) {

        header( "location: ../page-templates/login/register.php?error=pwddontmatch" );
        exit();

    }
    
    if ( uIdExists( $conn, $uid, $email ) !== false ) {

        header( "location: ../page-templates/login/register.php?error=uNameTaken" );
        exit();

    }

    /** *
     * optional eror handlers
     * 
     * - check for pwd length and for characters
     * 
    */

    createUser( $conn, $name, $pwd, $email, $uid );   

}
else {

    header( "location: ../page-templates/login/register.php" );
    exit();

}
