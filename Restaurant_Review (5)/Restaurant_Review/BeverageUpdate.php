<?php
error_reporting(E_ERROR | E_PARSE);
include "databasequery.php";
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = $sql = "SELECT * FROM beverages where BeverageId=$id";
    $result1 = $conn->query($sql);
    $row1 = $result1->fetch();

}
$sql2 = $sql2 = "SELECT RestaurantId FROM beverages where BeverageId=$id";
$result2 = $conn->query($sql2);
$row2 = $result2->fetch();
if (array_key_exists('button',$_POST)) {
    
    $foodname = $_POST['BeverageName'];
    $fooddesc = $_POST['BeverageDescription'];
    $foodprice = $_POST['BeveragePrice'];
    $isHotTemp=$_POST["types1"];
    

    $sql = "UPDATE beverages " . "SET BeverageName='$foodname',BeverageDescription='$fooddesc',BeveragePrice='$foodprice',isAlcoholic='$isHotTemp'" . "WHERE BeverageId=$id ";
    $result2 = $conn->query($sql);

    $log = $conn->prepare('INSERT INTO logs (Message) VALUES (?)');
    $log->execute([
      
      "UPDATE beverages " . "SET BeverageName='$foodname',BeverageDescription='$fooddesc',BeveragePrice='$foodprice',isAlcoholic='$isHotTemp'" . "WHERE BeverageId=$id "
  
  
    ]);

    header('Location:http://localhost/Restaurant_Review/Restaurantafterlogin.php?id='."$row2[RestaurantId]" );
}




?>












<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter your items</title>
</head>

<body>
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
            background-color: #3333dc;
            color: #FFF;
            border-radius: 15px;
            visibility: hidden;
        }

        .cta:hover {
            background-color: #209e52;
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

        form .form-field:nth-child(3)::before {
            background-image: url(images/name.png);
            width: 16px;
            height: 16px;
        }

        form .form-field:nth-child(4)::before {
            background-image: url(images/lastname.png);
            width: 16px;
            height: 16px;
        }

        form .form-field:nth-child(5)::before {
            background-image: url(images/restaurantname.png);
            width: 16px;
            height: 16px;
        }

        form .form-field:nth-child(6)::before {
            background-image: url(images/about.png);
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



        label {
            font-family: Arial, Helvetica, sans-serif;
            color: #11be0e;
            font-weight: 100;
            font-weight: bold;
        }

        select {
            height: 30px;
            width: 100px;
        }
    </style>
    </head>

    <body>

        <header>
            <a  class="logo">DEU CENG YELP</a>
            <nav>
                <ul>
                    <li><a href="TakeFoods.php" class="cta">Add Food</a></li>
                    <li><a href="Login.php" class="cta">Login</a></li>
                </ul>
            </nav>
        </header>

        <form1 class="form1" method="POST" action="#">
            <form method="post">
                <div class="form-field">
                    <input type="text" value= <?php echo $row1['BeverageName'] ?> name="BeverageName" required />
                </div>

                <div class="form-field">
                    <input type="text" value= <?php echo $row1['BeverageDescription'] ?> name="BeverageDescription" required />
                </div>



                <div class="form-field">
                    <input type="number" value= <?php echo $row1['BeveragePrice'] ?> name="BeveragePrice" required />
                </div>

                <label for="types1">Is Alcoholic</label>
                    <select name="types1" id="types1">
                        <option value="1">Yes</option>
                        <option value="2">No</option>

                    </select type="submit">
                <form action="" method="post">
                    



                    



                    <form>

                        <p></p>

                        <div class="form-field">
                            <button class="btn" type="submit" name="button">Update Beverage</button>
                        </div>
                    <form>
                <form>
            <form>
        <form1>

    </body>

</html>