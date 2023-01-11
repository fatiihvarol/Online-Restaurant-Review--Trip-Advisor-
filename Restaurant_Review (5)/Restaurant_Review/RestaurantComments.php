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
        h2{color: aquamarine;}
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
        <h2>All User Comments</h2>
       
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>Restaurant Name</th>
                    <th> Username </th>
                    <th> Score </th>
                    <th>Review</th>
                </tr>
            </thead>

            <tbody>
                <?php
                error_reporting(E_ERROR | E_PARSE);
                include "databasequery.php";

                if ($_SERVER['REQUEST_METHOD']=='GET') {
                   if (!isset($_GET["id"])) {
                        header("location:/Restaurant_View/Homeafterlogin");
                    exit();
                   }
                    $id = $_GET["id"];
                }
                
                $sql = "SELECT * FROM reviews where RestaurantId = $id";
                $result = $conn->query($sql);
                
                    // output data of each row
                    while ($row = $result->fetch()) {
                         $controlaccount = $conn->prepare("SELECT * FROM restaurants where RestaurantId = ? ");
                         $RestId = $row['RestaurantId'];
                         $controlaccount->execute([$RestId]);
                         $row2 = $controlaccount->fetch();

                         $log = $conn->prepare('INSERT INTO logs (UserId,Message) VALUES (?,?)');
                         $log->execute([
                             $row5['UserId'],
                             'SELECT * FROM restaurants where RestaurantId = ?',
     
     
                         ]);



                         $controlaccount2 = $conn->prepare("SELECT * FROM users where UserId = ? ");
                         $RestId2 = $row['UserId'];
                         $controlaccount2->execute([$RestId2]);
                         $row3 = $controlaccount2->fetch();

                         $log = $conn->prepare('INSERT INTO logs (UserId,Message) VALUES (?,?)');
                         $log->execute([
                             $row3['UserId'],
                             'INSERT INTO logs (UserId,Message) VALUES (?,?)',
     
     
                         ]);

                        echo "
                        <tr>    
        
                        <td>$row2[RestaurantName] </td>
                        <td>$row3[Username] </td>
                        <td>$row[Score]</td>
                         <td>$row[Message]</td>
                        
                        </tr>
                        
                        
                        ";
                        
                        
                    }
                

               


                ?>



            </tbody>
            

        </table>




    </div>
</body>

</html>