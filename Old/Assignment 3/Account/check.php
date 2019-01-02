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
      <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "registration";

      if (isset($_POST['user']))
      {
         $user = $_POST['user'];
         $lastused = $_POST['user'];
      } else
      {
         $user = 'None';
      }
      $_SESSION['user2'] = $user;
      if (isset($_POST["reset"]))
      {
         //$_SESSION['user'] =$_POST['user'];
         $_SESSION['user2'] = $user;
      }
      try
      {
         // create connection
         $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
         // Check connection
         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $sql = "SELECT * FROM `account` WHERE `User` = '$user';";
         // use exec() because no results are returned
         $stmt = $conn->prepare($sql);
         $success = $stmt->execute();

         if ($success)
         {
            //echo "<p>query checks out</p>";
            //echo "<p>{$stmt->rowCount()} rows were affected by your query.</p>";
            //echo $user;
         }
         //search to see is user exist.
         $stmt = $conn->prepare("SELECT `User` FROM `account` WHERE `User` = '$user';");
         $stmt->execute();

         //feteching result and storing into variable result.
         $result = $stmt->fetchColumn();

         if ($result !== $user)
         {
            $result = "User not found";
         }
      } catch (PDOException $e)
      {
         echo $sql . "<br>" . $e->getMessage();
      }
      ?>
      <fieldset id="options">
         <form action="change.php" method="post">
            <p>
               <?php
               echo $result;
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

            $stmt = $conn->prepare("SELECT `Password` FROM `account` WHERE `User` = '$user';");
            $stmt->execute();

            //feteching result and storing into variable result.
            $result2 = $stmt->fetchColumn();
            ?>

            <button class="Confirm" type="submit" name="Change">Change</button>
         </form>

         <form action="check.php" method="post" id="lever">
            <button type="submit" name="reset" value="1">Reset</button>         
         </form>

      </fieldset>

   </body>
</html>