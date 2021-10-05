<?php 

    include_once "../../header/header.php";    

?>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form action="../../inc/register.inc.php" method="post" class="user">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">                                    
                                        <input name="uid" type="text" class="form-control form-control-user" id="username"
                                            placeholder="Username">                                        
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">                                    
                                        <input name="name" type="text" class="form-control form-control-user" id="Name"
                                            placeholder="Your Name">                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input name="email" type="text" class="form-control form-control-user" id="Email"
                                        placeholder="Email Address">                                        
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input name="pwd" type="password" class="form-control form-control-user"
                                            id="Password" placeholder="Password">                                                
                                    </div>
                                    <div class="col-sm-6">
                                        <input name="pwdrepeat" type="password" class="form-control form-control-user"
                                            id="RepeatPassword" placeholder="Repeat Password">
                                    </div>
                                </div>
                                <button type="submit" name="submit" class="mb-3 btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>       
                                <?php 
                                    if( isset( $_GET[ "error" ] ) ) {
                                    
                                        if( $_GET[ "error" ] == "emptyinput" ) {
                                            echo "<p class='text-center text-danger'>Fill in all field</p>";
                                        }
                                        else if( $_GET[ "error" ] == "invaliduid" ) {
                                            echo "<p class='text-center text-danger'>Invalid Username</p>";
                                        }
                                        else if( $_GET[ "error" ] == "invalidemail" ) {
                                            echo "<p class='text-center text-danger'>Invalid Email</p>";
                                        }
                                        else if( $_GET[ "error" ] == "pwddontmatch" ) {
                                            echo "<p class='text-center text-danger'>Passwords dont match</p>";
                                        }
                                        else if( $_GET[ "error" ] == "uNameTaken" ) {
                                            echo "<p class='text-center text-danger'>Username is taken</p>";
                                        }
                                        else if( $_GET[ "error" ] == "stmtfailded" ) {
                                            echo "<p class='text-center text-danger'>Something went one, please try again</p>";
                                        }
                                        else if( $_GET[ "error" ] == "none" ) {
                                            echo "<p class='text-center text-success'>User signup success</p>";
                                        }
                                    }
                                ?>                                
                                <hr>
                                <a href="index.php" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.php" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.php">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>                          
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

<?php

include_once "../../footer/footer.php";

?>