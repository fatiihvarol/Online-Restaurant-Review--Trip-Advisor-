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
        .cta1 {
            background-color: #3333dc;
            color: #FFF;
            border-radius: 15px;
        }

        .cta1:hover {
            background-color: #209e52;
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
                <li><a href="http://localhost/Restaurant_Review/Homeafterlogin.php#" class="cta">Home</a></li>
                <li><a href="http://localhost/Restaurant_Review/login.php" class="cta1">Log Out</a></li>
            </ul>
        </nav>

    </header>

    <div class="container my-5">
        <h2>List Of Restaurants</h2>

        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>Restaurant Name</th>
                    <th> About Restaurant </th>
                    <th>Service Score</th>
                </tr>
            </thead>

            <tbody>
                <?php
                include "databasequery.php";


                $sql = "SELECT * FROM restaurants";
                $result = $conn->query($sql);
                $counter;
                $sum=0.00;
                // output data of each row
                while ($row = $result->fetch()) {
                    $controlaccount1 = $conn->prepare('SELECT Score FROM reviews where RestaurantId = ?');

                    $controlaccount1->execute([$row["RestaurantId"]]);
                    $log = $conn->prepare('INSERT INTO logs (UserId,Message) VALUES (?,?)');
                    $log->execute([
                        $row['UserId'],
                        'SELECT Score FROM reviews where RestaurantId = ?',


                    ]);

                    $counter = 0;
                    $sum = 0.00;
                    $final_score = 0;
                    while ($row9 = $controlaccount1->fetch()) {
                        $counter = $counter + 1;
                        $sum = $sum + $row9['Score'];
                    }
                    if ($counter!=0) {
                        $final_score =floatval($sum / $counter) ;
                        $sum = $final_score;
                    }
                    $final_score2=number_format((float) $final_score, 2, '.', '');
                   
                    echo "
                        <tr>    
        
                        <td>$row[RestaurantName] </td>
                        <td>$row[About] </td>
                        <td > $final_score2</td>
                        <td>  
                        <form >
                        <a style='background-color:white;' href='http://localhost/Restaurant_Review/Comment.php?id=$row[RestaurantId]' class='btn'>Comment</a>
                        <a style='background-color:white; 'href='http://localhost/Restaurant_Review/Restaurantcomments.php?id=$row[RestaurantId]' class='btn'>See All Comments</a>
                        <a style='background-color:white; 'href='http://localhost/Restaurant_Review/CustomerFoodPage.php?id=$row[RestaurantId]' class='btn'>See All Menu</a>
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