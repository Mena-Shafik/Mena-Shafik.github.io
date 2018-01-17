<?php
session_start();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" title="Style1" href="css/Style1.css">
        <link rel="alternate stylesheet" type="text/css" title="Style2" href="css/Style2.css">
        <!-- Latest compiled and minified CSS -->
        <link rel="shortcut icon" href="/favicon.png" type="image/x-icon" />
        <link rel="icon" type="image/png" href="http://104.167.98.73/favicon.png" />
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/login.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        <!-- style switcher script-->
        <script type="text/javascript" src="js/styleswitcher.js"></script> 
        <title></title>
        <style>
            #choice
            {
                display: inline-block;
            }
            #main{
                background-color: #ee0013;
                border: 4px solid black;
                color: #f9bd13;
                border-radius: 5px;
                padding-top: 10px;
                width: 300px;
                margin: 0 auto;
                margin-top: 60px;
            }

            p{
                //margin: 5px;
                margin: auto;
                width: 60%;
                //border:3px solid #8AC007;
                padding: 10px;

            }
            button{

                margin: 10px;
                margin-left: 30%;
            }
            #change{

                margin: 10px;
                margin-left: 19%;
                margin-right: -3%;
            }
        </style>
    </head>
    <body> 
         <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span> 
                    </button>
                    <button id="Dark" type="button" class="navbar-toggle mob" onclick="chooseStyle('Style2',60);return false;" name="theme" value="D" data-target="#Dark">
                        L
                    </button>
                    <button id="Light" type="button" class="navbar-toggle mob"  onclick="chooseStyle('Style1',60);return false;" name="theme" value="L" data-target="#Light">
                        D
                    </button>
                    <a class="navbar-brand" href="#"> ^_^ </a>
                    <ul class="dropdown-menu">
                        <li><a href="assignment 1.html">Assignment 1</a></li>
                        <li><a href="assignment 2.html">Assignment 2</a></li>
                        <li><a href="Assignment 3">Assignment 3</a></li>
                        <li><a href="Assignment 3/slotmachine">Assignment 4</a></li> 
                        <li><a href="tims">Assignment 5</a></li> 
                        <li><a href="#">Assignment 6</a></li> 
                    </ul>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">

                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.html">Home</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Assignments
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="assignment 1.html">Assignment 1</a></li>
                                <li><a href="assignment 2.html">Assignment 2</a></li>
                                <li><a href="Assignment 3">Assignment 3</a></li>
                                <li><a href="Assignment 3/slotmachine">Assignment 4</a></li> 
                                <li><a href="tims">Assignment 5</a></li> 
                                <li><a href="#">Assignment 6</a></li> 
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Web Links
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="https://www.sheridancollege.ca/">Sheridan Home Page</a></li>
                                <li><a href="http://mobile.sheridanc.on.ca/~scottsam/info16206_s15/">Class Plan</a></li>        
                            </ul>
                        </li>
                        <li><a href="pictures.html">Pictures</a></li> 
                        <li><a href="journal.html">Journal</a></li> 
                        <li><a href="about.html">About</a></li> 
                        <li><a href="resume.html">Resume</a></li> 
                    </ul>
                    <ul class="nav navbar-nav navbar-right" >
                        
                        <li><input type="submit" onclick="chooseStyle('Style1',60);return false;"   name="theme" value="D" id="Dark" class="nonmob"></li>
                        <li><input type="submit" onclick="chooseStyle('Style2',60);return false;" name="theme" value="L" id="Light" class="nonmob"></li>
                        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                        <li><a  href="#" data-toggle="modal" data-target="#login-modal"><span class="glyphicon glyphicon-log-in"></span> Login</a>
                            <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="loginmodal-container">
                                        <h1>Login to Your Account</h1><br>
                                        <form action="check.php" method="post">
                                            <input type="text" name="user" placeholder="Username">
                                            <input type="password" name="pass" placeholder="Password">
                                            <input type="submit" name="login" class="login loginmodal-submit" value="Login">
                                        </form>

                                        <div class="login-help">
                                            <a href="#">Register</a> - <a href="#">Forgot Password</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "Cutlets";
        $dbname = "Web";
        if (isset($_POST['user'])) {
            $user = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_STRING);
            $_SESSION['user'] = $user;
        } else {
            $user = $_SESSION['user'];
        }
        if (isset($_POST['pass'])) {
            $pass1 = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING);
            $_SESSION['pass'] = $pass1;
        } else {
            $pass1 = $_SESSION['pass'];
        }
        if (isset($_POST["reset"])) {
            //$_SESSION['user'] =$_POST['user'];
            $_SESSION['user'] = $user;
        }
        try {
            // create connection
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // Check connection
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM `account` WHERE `username` = '$user';";
            // use exec() because no results are returned
            $stmt = $conn->prepare($sql);
            $success = $stmt->execute();
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

        $stmt = $conn->prepare("SELECT `username` FROM `account` WHERE `username` = '$user' AND `password` = '$pass1';");
        $stmt->execute();

        //feteching result and storing into variable result.
        $result = $stmt->fetchColumn();
        
        if ($result !== $user) {
            $result = "User not found or password is incorrect.";
        }
        ?>
        <form id="main" action="change.php" method="post" id="choice">
            <p>
        <?php
        echo $result;
        //var_dump ($result);
        ?>
            </p>
            <p>
                Existing Password: 
                <input type="text" required="" title="first name" name="password">
            </p>
            <p>
                New Password: 
                <input type="text"  required="" title="last name" name="npassword">
            </p>
            <p>
                Confirm New Password: 
                <input type="text"   required="" title="address" name="npassword2">
            </p>

<?php
if (isset($_POST['password'])) {
    $pass1 = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
} else {
    $pass1 = 'None';
}

if (isset($_POST['npassword'])) {
    $pass2 = filter_input(INPUT_POST, 'npassword', FILTER_SANITIZE_STRING);
} else {
    $pass2 = 'None';
}

if (isset($_POST['npassword2'])) {
    $pass3 = filter_input(INPUT_POST, 'npassword2', FILTER_SANITIZE_STRING);
} else {
    $pass3 = 'None';
}

$stmt = $conn->prepare("SELECT `password` FROM `account` WHERE `username` = '$user';");
$stmt->execute();

//feteching result and storing into variable result.
$result2 = $stmt->fetchColumn();
?>

            <div>
                <form action="change.php" method="post" id="choice">
                    <button id="change" class="Confirm" type="submit" id="choice" name="Change">Change</button>
                </form>
                <form action="check.php" method="post" id="choice">
                    <button type="submit" name="reset" id="reset" value="1">Reset</button>         
                </form>
                <form action="index.html" method="post" id="choice">
                    <button type="submit" name="back" id="back" value="1">Back</button>         
                </form>
            </div>

        </form>





    </body>
</html>