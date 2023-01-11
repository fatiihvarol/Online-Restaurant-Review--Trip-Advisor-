



<?php session_start();?>


<?php
 error_reporting(E_ERROR | E_PARSE);





?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEU CENG YELP</title>
    <style>
        body {
            margin-left: 0;
            margin-bottom: 0;
            margin-top: 0;
            height: 100%;
            width: 100%;
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

        .cta1 {
            background-color: #3333dc;
            color: #FFF;
            border-radius: 15px;
        }

        .cta1:hover {
            background-color: #209e52;
            color: #FFF;
        }

        .container {
            width: 100%;
            min-height: 100vh;

            padding: 5%;
            background-image: linear-gradient(rgba(100, 8, 51, 0.9), rgba(0, 8, 51, 0.9)), url("images/Home.jpg");
            background-size: 100% 100%;
            background-position: center;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
            position: fixed;

        }

        .search-bar {
            width: 150%;
            max-width: 600px;
            background: rgba(255, 255, 255, 0.2);
            display: flex;
            align-items: center;
            border-radius: 60px;
            padding: 10px 20px;
            backdrop-filter: blur(4px) saturate(180%);
        }

        .search-bar input {
            background: transparent;
            flex: 1;
            border: 0;
            outline: none;
            padding: 24px 20px;
            font-size: 20px;
            color: #920b35;
        }

        ::placeholder {
            color: #0b1292;
        }

        .search-bar button img {
            width: 35px;
        }

        .search-bar button {
            border: 0;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            background: #58629b;

            cursor: pointer;
        }
    </style>
</head>



<body>
    <header>
        <a href="/Restaurant_Review/Home.php" class="logo">DEU CENG YELP</a>
        <nav>
          
            <ul <?php echo $style;?>>
                <li><a href="/Restaurant_Review/Login.php" class="cta1" name = "loginbutton">Login</a></li>
                <li><a href="/Restaurant_Review/Signup.php" class="cta">Sign Up</a></li>
                <li><a href="/Restaurant_Review/RestaurantSignup.php" class="cta">Restourant Sign Up</a></li>
            </ul>
        
            
        </nav>
    </header>

    <div class="container">
        
    </div>
</body>

</html>