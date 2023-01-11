<?php
session_start();

if (array_key_exists('sup', $_POST)) {
    button1();
}
function button1()
{

    include "databasequery.php";
    $inputusername = $_POST["Username"];
    $inputpassword = $_POST["Password"];
    $inputfirstname = $_POST["Firstname"];
    $inputlastname = $_POST["Lastname"];
    $inputrestourantname = $_POST["Restaurantname"];
    $inputabout = $_POST["About"];


    $controlaccount = $conn->prepare("SELECT * FROM users WHERE Username = ?");
    $controlaccount->execute([$inputusername]);
    $numberofaccount = $controlaccount->rowCount();

    $row = $controlaccount->fetch();
    $log = $conn->prepare('INSERT INTO logs (UserId,Message) VALUES (?,?)');
    $log->execute([
        $row['UserId'],
        'SELECT * FROM users WHERE Username = ?',


    ]);
    //Login
    if ($numberofaccount > 0) {
        echo "change username";

    } else {
        $controlaccount = $conn->prepare('INSERT INTO users (name,surname,UserName,Password,UserType) VALUES (?,?,?,?,?)');
        $controlaccount->execute([
            $inputfirstname,
            $inputlastname,
            $inputusername,
            $inputpassword,
            1
        ]);
        $row = $controlaccount->fetch();
        $log = $conn->prepare('INSERT INTO logs (UserId,Message) VALUES (?,?)');
        $log->execute([
        $row['UserId'],
        'INSERT INTO users (name,surname,UserName,Password,UserType) VALUES (?,?,?,?,?)',


    ]);
        button2();




    }
}

function button2()
{
    include "databasequery.php";

    $inputusername = $_POST["Username"];
    $inputrestourantname = $_POST["Restaurantname"];
    $inputabout = $_POST["About"];

    $controlaccount1 = $conn->prepare('SELECT userid from users where username = ?');

    $controlaccount1->execute([$inputusername]);
    $row = $controlaccount1->fetch();

    $controlaccount2 = $conn->prepare('INSERT INTO restaurants (userid,restaurantname,about,typeid) VALUES (?,?,?,?)');
    $controlaccount2->execute([
        $row["userid"],
        $inputrestourantname,
        $inputabout,
        $_POST['types']
    ]);


    $controlaccount3 = $conn->prepare('SELECT restaurantid from restaurants where userid = ?');

    $controlaccount3->execute([$row["userid"]]);
    $row = $controlaccount3->fetch();
    $_restaurantid = $row['restaurantid'];

    $_SESSION['restaurantid'] = $_restaurantid;
    header("Location:/Restaurant_Review/TakeFoods.php");
}


?>



<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>

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
        <a href="/Restaurant_Review/Home.php" class="logo">DEU CENG YELP</a>
        <nav>
            <ul>
                <li><a href="/Restaurant_Review/Login.php" class="cta">Login</a></li>
                <li><a href="/Restaurant_Review/Signup.php" class="cta">Sign Up</a></li>
            </ul>
        </nav>
    </header>

    <form1 class="form1" method="POST" action="#">
        <form method="post">
            <div class="form-field">
                <input type="text" placeholder="Username" name="Username" required />
            </div>

            <div class="form-field">
                <input type="password" placeholder="Password" name="Password" required />
            </div>



            <div class="form-field">
                <input type="text" placeholder="First Name" name="Firstname" required />
            </div>

            <div class="form-field">
                <input type="text" placeholder="Last Name" name="Lastname" required />
            </div>


            <div class="form-field">
                <input type="text" placeholder="Restaurant Name" name="Restaurantname" required />
            </div>



            <div class="form-field">
                <input type="text" placeholder="About" name="About" required />
            </div>




            <form action="" method="post">
                <label for="types">Choose a type:</label>
                <select name="types" id="types">
                    <option value="1">Japanese</option>
                    <option value="2">Mexican</option>
                    <option value="3">Turkish</option>
                    <option value="4">American</option>
                    <option value="5">Italian</option>
                    <option value="6">Others</option>



                </select type="submit">



                <form>

                    <p></p>

                    <div class="form-field">
                        <button class="btn" type="submit" name="sup">Sign Up</button>
                    </div>


                    <form>
                        <form>
                            <form>
                                <form1>

                                    <body>