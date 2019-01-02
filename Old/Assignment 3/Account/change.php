<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
?>
<html>
   <head>
      <meta charset="UTF-8">
      <title></title>
   </head>
   <body>

      <fieldset id="options">

         <p>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "registration";
            try
            {
               // create connection
               $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
               // Check connection
               $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               
            } catch (PDOException $e)
            {
               echo $sql . "<br>" . $e->getMessage();
            }
            $user2 = $_SESSION['user2'];

            if (isset($_POST['password']))
            {
               $pass1 = $_POST['password'];
            } else
            {
               $pass1 = 'None';
            }

            if (isset($_POST['npassword']))
            {
               $pass2 = $_POST['npassword'];
            } else
            {
               $pass2 = 'None';
            }

            if (isset($_POST['npassword2']))
            {
               $pass3 = $_POST['npassword2'];
            } else
            {
               $pass3 = 'None';
            }
            echo $user2;
            echo $pass1;
            echo $pass2;
            echo $pass3;

            
            //$sql = "SELECT `Password` FROM `account` WHERE `User` = '$user2';";
            // use exec() because no results are returned
            $stmt = $conn->prepare("SELECT `Password` FROM `account` WHERE `User` = '$user2';");
            $stmt->execute();
            $result = $stmt->fetchColumn();
            //fetching result and storing into variable result.
            echo $result;
            if ($result === $pass1)
            {
               //$result2 = "Password incorrect.";
               echo "correct";
               if ($pass2 === $pass3)
               {
                  $stmt = $conn->prepare("UPDATE `account` SET `Password`= '$pass2' WHERE `User` = '$user2';");
                  if ($stmt->execute())
                  {
                     echo '<p> "new pass check"</p>';
                  }
               }
            } else
            {
               echo '<p> "pass fail"</p>';
               
            }
            ?>
      </fieldset>
   </body>
</html>
