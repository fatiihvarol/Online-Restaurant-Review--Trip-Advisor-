<?php
session_start();
include "databasequery.php";
 error_reporting(E_ERROR | E_PARSE);


  if (array_key_exists('button',$_POST)) {
    $inputusername = $_POST["Username"];
    $inputpassword = $_POST["Password"];

  $controlaccount = $conn->prepare("SELECT * FROM users WHERE UserName = ? and Password = ?");
  $controlaccount->execute([$inputusername, $inputpassword]);
  $numberofaccount = $controlaccount->rowCount();
  $row = $controlaccount->fetch();
  $enteredId = $row['UserId'];

  $log = $conn->prepare('INSERT INTO logs (UserId,Message) VALUES (?,?)');
  $log->execute([
    $enteredId,
    'SELECT * FROM users WHERE UserName = ? and Password = ?',


  ]);



  //Login
  if ($numberofaccount>0) {
    //echo "loged in";
    
    $_TempUserId = $row['UserId'];
    $_SESSION['UserId'] = $_TempUserId;
    if($row['UserType']==0)
    {
      header("Location:Homeafterlogin.php");
    }
    else if($row['UserType']==1)
    {
      


      $controlaccount1 = $conn->prepare("SELECT RestaurantId FROM restaurants WHERE UserId = ?");
    $controlaccount1->execute([$row['UserId']]);
    $row1 = $controlaccount1->fetch();
    $log = $conn->prepare('INSERT INTO logs (UserId,Message) VALUES (?,?)');
  $log->execute([
    $row1['UserId'],
    'SELECT * FROM users WHERE UserName = ? and Password = ?',


  ]);
      header("Location:Restaurantafterlogin.php?id=$row1[RestaurantId]");
    }
  }
  else {
    echo "<script type='text/javascript'>alert('Wrong Password or Username');</script>";
  }
  }














?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Login</title>

  <style>
    body {
      left: 0;
      top: 0;
      background-image: linear-gradient(rgba(100, 8, 51, 0.9), rgba(0, 8, 51, 0.9)), url("images/Home.jpg");
      width: 100%;
      height: 100%;
      background-size: cover;
      position: fixed;
      margin-left: 0;
      margin-bottom: 0;
      margin-top: 0;
      font-family: 'Quicksand', sans-serif;
    }

    a {
      text-decoration: none;
    }

    li {
      list-style-type: none;
    }

    header {
      display: flex;
      flex-direction: row;
      align-items: center;
      padding: 0px 10%;
      background-color: #920b35;
      justify-content: space-between;
    }

    .logo {
      color: #FFF;
      font-weight: 900;
    }

    nav ul {
      display: flex;
      flex-direction: row;
    }

    nav ul li {
      margin-left: 5px;
      margin-right: 5px;
    }

    nav ul li a {
      color: #FFF;
      display: block;
      padding: 10px 20px;
      border-radius: 1px;
    }

    nav ul li a:hover {
      color: #DC7633;
    }

    .cta {
      background-color: #DC7633;
      color: #FFF;
      border-radius: 15px;
    }

    .cta:hover {
      background-color: #D35400;
      color: #FFF;
    }


    .form1 {
      font-family: 'Lato', sans-serif;
      color: #4A4A4A;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      overflow: hidden;
      margin: 0;
      padding: 0;
    }

    form {
      width: 350px;
      position: relative;
    }

    form .form-field::before {
      font-size: 20px;
      position: absolute;
      left: 15px;
      top: 17px;
      color: #888888;
      content: " ";
      display: block;
      background-size: cover;
      background-repeat: no-repeat;
    }

    form .form-field:nth-child(1)::before {
      background-image: url(images/user-icon.png);
      width: 20px;
      height: 20px;
      top: 15px;
    }

    form .form-field:nth-child(2)::before {
      background-image: url(images/lock-icon.png);
      width: 16px;
      height: 16px;
    }

    form .form-field {
      display: -webkit-box;
      display: -ms-flexbox;
      display: flex;
      -webkit-box-pack: justify;
      -ms-flex-pack: justify;
      justify-content: space-between;
      -webkit-box-align: center;
      -ms-flex-align: center;
      align-items: center;
      margin-bottom: 1rem;
      position: relative;
    }

    form input {
      font-family: inherit;
      width: 100%;
      outline: none;
      background-color: #fff;
      border-radius: 4px;
      border: none;
      display: block;
      padding: 0.9rem 0.7rem;
      box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.16);
      font-size: 17px;
      color: #4A4A4A;
      text-indent: 40px;
    }

    form .btn {
      outline: none;
      border: none;
      cursor: pointer;
      display: inline-block;
      margin: 0 auto;
      padding: 0.9rem 2.5rem;
      text-align: center;
      background-color: #47AB11;
      color: #fff;
      border-radius: 4px;
      box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.16);
      font-size: 17px;
    }
  </style>

</head>

<body>
  <header>
    <a href="/Restaurant_Review/Home.php" class="logo">DEU CENG YELP</a>
    <nav>
      <ul>
        <li><a href="/Restaurant_Review/Signup.php" class="cta">Sign Up</a></li>
        <li><a href="/Restaurant_Review/RestaurantSignup.php" class="cta">Restourant Sign Up</a></li>
      </ul>
    </nav>
  </header>

  <form1 class="form1">
    <form method="POST" action="#">
      <div class="form-field">
        <input type="text" name="Username"  placeholder="Username" required />
      </div>

      <div class="form-field">
        <input type="password" name="Password"  placeholder="Password" required />
      </div>

      <div class="form-field">
        <button class="btn" name="button" type="submit">Log in</button>
      </div>

      
    </form>

  </form1>


</body>

</html>