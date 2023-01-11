<?php session_start();
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

        a {
            color: #FFF;
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

        .cta1 {
            background-color: #3333dc;
            color: #FFF;
            border-radius: 15px;
        }

        .cta1:hover {
            background-color: #209e52;
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
        <a class="logo">DEU CENG YELP</a>
        <nav>
            <ul>
                <li><a href="http://localhost/Restaurant_Review/Home.php" class="cta">Log Out</a></li>
                <li><a href="http://localhost/Restaurant_Review/TakeFoodsfromMain.php" class="cta1">Add Food</a></li>
                <li><a href="http://localhost/Restaurant_Review/TakeBeveragesfromMain.php" class="cta1">Add
                        Beverages</a></li>
            </ul>
        </nav>

    </header>



    <div class="container my-5">
        <h2>List Of Foods</h2>

        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>Food Name</th>
                    <th>Food Description</th>
                    <th>Food Price</th>
                    <th>Hot</th>
                </tr>
            </thead>

            <tbody>
                <?php
                error_reporting(E_ERROR | E_PARSE);

                include "databasequery.php";

                if (!isset($_GET["id"])) {
                    header("location:/Restaurant_View/Homeafterlogin");
                    exit();
                }
                $id = $_GET["id"];
                $sql5 = "SELECT UserId from Restaurants where RestaurantId = $id";
                $result5 = $conn->query($sql5);
                $row5 = $result5->fetch();

                $log = $conn->prepare('INSERT INTO logs (UserId,Message) VALUES (?,?)');
                $log->execute([
                    $row5['UserId'],
                    'SELECT UserId from Restaurants where RestaurantId = $id',


                ]);




                $_Temprestaurantid = $row3['UserId'];
                

                $_SESSION['TempRestId'] = $_Temprestaurantid;


                $sql1 = "SELECT * FROM foods where RestaurantId = $id";
                $result1 = $conn->query($sql1);
                $log = $conn->prepare('INSERT INTO logs (UserId,Message) VALUES (?,?)');
                $log->execute([
                    $row5['UserId'],
                    'SELECT * FROM foods where RestaurantId = $id',


                ]);

                // output data of each row
                while ($row1 = $result1->fetch()) {
                    $tempHot="";
                    if ($row1['isHot']==1) {
                        $tempHot = "Yes";
                    }else {
                        $tempHot = "No";
                    }
                    echo "
                        <tr>    
        
                        <td>$row1[FoodName] </td>
                        <td>$row1[FoodDescription] </td>
                        <td>$row1[FoodPrice]</td>
                        <td>$tempHot</td>
                        <td>  
                        <form >
                        
                        
                        </td>
                        </tr>
                        
                        
                        ";


                }





                ?>



            </tbody>


        </table>




    </div>



    <div class="container my-5">
        <h2>List Of Beverages</h2>

        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>Beverage Name</th>
                    <th> Beverage Description </th>
                    <th>Beverage Price</th>
                    <th>Alcoholic</th>

                </tr>
            </thead>

            <tbody>
                <?php

                include "databasequery.php";


                if (!isset($_GET["id"])) {
                    header("location:/Restaurant_View/Homeafterlogin");
                    exit();
                }
                $id = $_GET["id"];
                $sql3 = "SELECT UserId from Restaurants where RestaurantId = $id";
                $result3 = $conn->query($sql3);
                $row3 = $result3->fetch();

                $_Temprestaurantid = $row3['UserId'];
                ;

                $_SESSION['TempRestId'] = $_Temprestaurantid;

                $sql2 = "SELECT * FROM beverages where RestaurantId = $id";
                $result2 = $conn->query($sql2);

                // output data of each row
                while ($row2 = $result2->fetch()) {
                    $tempAlc="";
                    if ($row2['isAlcoholic']==1) {
                        $tempAlc = "Yes";
                    }else {
                        $tempAlc = "No";
                    }
                    echo "
                        <tr>    
        
                        <td>$row2[BeverageName] </td>
                        <td>$row2[BeverageDescription] </td>
                        <td>$row2[BeveragePrice]</td>
                        <td>$tempAlc</td>
                        <td>  
                        <form >
                       
                        
                        </td>
                        </tr>
                        
                        
                        ";


                }





                ?>



            </tbody>


        </table>




    </div>


</body>

</html>