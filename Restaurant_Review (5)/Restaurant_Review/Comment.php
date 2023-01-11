<?php
error_reporting(E_ERROR | E_PARSE);
include "databasequery.php";
session_start();
    if (!isset($_GET["id"])) {
        header("location:/Restaurant_View/Homeafterlogin");
        exit();
    }
    $id = $_GET["id"];



if (array_key_exists('reviewbutton',$_POST)) {
    
 
    if (isset($_SESSION['UserId'])) {
        $_TempUserId = $_SESSION['UserId'];
    } else {
        die('$' . "_SESSION['TempUserId'] isn't set because you had never been at file one");
    }
    $Review = $_POST['Message'];
    $Score = $_POST['Score'];
    
    

if ($numberofaccount > 0) {
   // echo "<script type='text/javascript'>alert('You have already a review');</script>";

} else {
    
    $controlaccount1 = $conn->prepare('INSERT INTO reviews (Message,Score,UserId,RestaurantId) VALUES (?,?,?,?)');
    $controlaccount1->execute([
        $Review,
        $Score,
        $_TempUserId,
        $id
    ]);
    $log = $conn->prepare('INSERT INTO logs (UserId,Message) VALUES (?,?)');
    $log->execute([
        $_TempUserId,
        'INSERT INTO reviews (Message,Score,UserId,RestaurantId) VALUES (?,?,?,?)',
        

    ]);
}
    header("Location:http://localhost/Restaurant_Review/Homeafterlogin.php");
}




?>




<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEU CENG YELP</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap');

        body {
            margin-left: 0;
            margin-bottom: 0;
            margin-top: 0;
            height: 100%;
            font-family: 'Quicksand', sans-serif;
            background-image: linear-gradient(to right, rgba(100, 8, 51, 0.9), rgba(0, 8, 51, 0.9))
        }

        textarea {
            border-radius: 6%;
        }

        a {
            text-decoration: none;
        }

        li {
            list-style-type: none;
        }

        h2 {
            position: absolute;
            left: 10px;
            top: 70px;
        }

        h4 {
            color: #FFF;
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

        tr {
            color: white;
        }

        h2 {
            color: aquamarine;
        }
    </style>
</head>



<body style="background-image: image(src='images/Home.jpg');">



    <header>
        <a href="/Restaurant_Review/Home.php" class="logo">DEU CENG YELP</a>
        <nav>
            <ul>
                <li><a href="http://localhost/Restaurant_Review/Homeafterlogin.php#" class="cta">Home</a></li>
            </ul>
        </nav>

    </header>

    <div class="container my-5">
        <h2>USER COMMENT PAGE </h2>



        <tbody>
            <?php
            include "databasequery.php";
            $sql = "SELECT * FROM restaurants";
            $result = $conn->query($sql);
            $log = $conn->prepare('INSERT INTO logs (UserId,Message) VALUES (?,?)');
            $log->execute([
                $_TempUserId,
                'SELECT * FROM restaurants',

            ]);?>
            <br>
            <br>
            <form method="POST" action="#">
                <h4>Your Score:</h4>
                <input type="number" name="Score" min="1" max="5" required><br>
                <h4>Your Comment:</h4>
                <textarea name="Message" rows="5" cols="50" required></textarea>
                <br>
                <input name="reviewbutton" type="submit" value="Submit">
                
            </form>




        </tbody>







    </div>
</body>

</html>