<?php

require 'lib/password.php';

function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}

// Checks for empty input fields
function emptyInputRegister( $uid, $name, $email, $pwd, $pwdRepeat ) {

    $results;
    if ( empty( $uid ) || empty( $name ) || empty( $email ) || empty( $pwd ) || empty( $pwdRepeat ) ) {
        $results = true;
    }
    else {
        $results = false;
    }
    return $results;    
}

// Checks for invalid username field
function invalidUid( $uid ) {

    $results;
    if ( !preg_match( "/^[a-zA-Z0-9]*$/", $uid) ) {
        $results = true;
    }
    else {
        $results = false;
    }
    return $results;
}

// Checks for invalid email field
function invalidEmail( $email ) {

    $results;
    if ( !preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email) ) {
        $results = true;
    }
    else {
        $results = false;
    }
    return $results;
}

// checks if pwd match
function pwdMatch( $pwd, $pwdRepeat ) {

    $results;
    if ( $pwd !== $pwdRepeat ) {
        $results = true;
    }
    else {
        $results = false;
    }
    return $results;
}

// Checks if username and email exists and login form
function uIdExists( $conn, $uid, $email ) {

    $sql = "SELECT * FROM users WHERE username = ? OR email = ?;";
    $stmt = mysqli_stmt_init( $conn );
    if ( !mysqli_stmt_prepare( $stmt, $sql ) ) {

        header( "location: ../page-templates/login/register.php?error=stmtfailded" );
        exit();

    }

    mysqli_stmt_bind_param( $stmt, "ss", $uid, $email );
    mysqli_stmt_execute( $stmt );
    
    $resultsData = mysqli_stmt_get_result( $stmt );

    if ( $row = mysqli_fetch_assoc( $resultsData ) ) {

        return $row;

    }
    else {

        $results = false;
        return $results;

    }

    mysqli_stmt_close( $stmt );
}

// Create the user in the database
function createUser( $conn, $name, $email, $uid, $pwd ) {

    $sql = "INSERT INTO users ( name, password, email, username ) VALUES ( ?, ?, ?, ? );";
    $stmt = mysqli_stmt_init( $conn );
    if ( !mysqli_stmt_prepare( $stmt, $sql ) ) {

        header( "location: ../page-templates/login/register.php?error=stmtfailed" );
        exit();

    }

    $hashedPwd = password_hash( $pwd, PASSWORD_DEFAULT );

    mysqli_stmt_bind_param( $stmt, "ssss", $name, $email, $uid, $hashedPwd );
    mysqli_stmt_execute( $stmt );    
    mysqli_stmt_close( $stmt );

    header( "location: ../page-templates/login/register.php?error=none" );
    exit();
    
}

// ON LOGIN!! Checks for empty input fields 
function emptyInpuLogin( $uid, $pwd ) {

    $results;
    if ( empty( $uid ) || empty( $pwd ) ) {
        $results = true;
    }
    else {
        $results = false;
    }
    return $results;    
}

// ON LOGIN!! Checks for empty input fields 
function loginUser( $conn, $uid, $pwd ) {

    $uidExists = uIdExists( $conn, $uid, $uid ) {

        if ( $uidExists === false ) {
            header( "location: ../page-templates/login/register.php?error=wronglogin" ); 
            exit();
        }

        $pwdHashed = $uidExists[ "password" ];
        $checkPwd = password_verify( $pwd, $pwdHashed );    

        if ( $checkPwd === false ) {
            header( "location: ../page-templates/login/register.php?error=wronglogin" ); 
            exit();
        }
        elseif ( $checkPwd === false ) {
            session_start();
            $_SESSION[ "id" ] = $uidExists[ "id" ];
            $_SESSION[ "username" ] = $uidExists[ "username" ];
            header( "location: ../idex.php" );
            exit();
        }
    }
}