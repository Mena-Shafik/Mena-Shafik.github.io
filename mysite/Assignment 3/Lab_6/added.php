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
      <style>
      </style>
   </head>
   <body>
      <?php
      $servername = "localhost";
      $username = "shafikm";
      $password = "991149931";
      $dbname = "registration";
      if (isset($_POST['firstname']))
      {
         $name = $_POST['firstname'];
      } else
      {
         $name = 'none';
      }
      if (isset($_POST['lastname']))
      {
         $last = $_POST['lastname'];
      } else
      {
         $last = 'none';
      }
      if (isset($_POST['address']))
      {
         $address = $_POST['address'];
      } else
      {
         $address = 'none';
      }
      if (isset($_POST['city']))
      {
         $city = $_POST['city'];
      } else
      {
         $city = 'none';
      }
      if (isset($_POST['province']))
      {
         $province = $_POST['province'];
      } else
      {
         $province = 'none';
      }
      if (isset($_POST['zip']))
      {
         $zip = $_POST['zip'];
      } else
      {
         $zip = 'none';
      }
      if (isset($_POST['hphone']))
      {
         $hphone = $_POST['hphone'];
      } else
      {
         $hphone = 'none';
      }
      if (isset($_POST['wphone']))
      {
         $wphone = $_POST['wphone'];
      } else
      {
         $wphone = 'none';
      }
      if (isset($_POST['fax']))
      {
         $fax = $_POST['fax'];
      } else
      {
         $fax = 'none';
      }
      if (isset($_POST['site']))
      {
         $site = $_POST['site'];
      } else
      {
         $email = 'none';
      }
      if (isset($_POST['email']))
      {
         $email = $_POST['email'];
      } else
      {
         $email = 'none';
      }
//      $name = $_POST['firstname'];
//      $last = $_POST['lastname'];
//      $address = $_POST['address'];
//      $city = $_POST['city'];
//      $province = $_POST['province'];
//      $zip = $_POST['zip'];
//      $hphone = $_POST['hphone'];
//      $wphone = $_POST['wphone'];
//      $fax = $_POST['fax'];
//      $email = $_POST['email'];

         try
         {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO `user data` (`Firstname`, `Lastname`, `Address`, `City`, `Province`, `ZIP`, `HomePhone`, `WorkPhone`, `FaxNumber`, `Website`, `Email`)
            VALUES ('$name','$last','$address','$city','$province','$zip','$hphone','$wphone','$fax','$site','$email')";
            // use exec() because no results are returned
            $conn->exec($sql);
            echo "New record created successfully";
         } catch (PDOException $e)
         {
            echo $sql . "<br>" . $e->getMessage();
         }

         $conn = null;
         ?>

   </body>
</html>
