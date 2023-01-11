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
                <li><a href="http://localhost/Restaurant_Review/AdminHome.php" class="cta">Home - Admin</a></li>
                <li><a href="http://localhost/Restaurant_Review/login.php" class="cta1">Log Out</a></li>
            </ul>
        </nav>

    </header>

    <div class="container my-5">
        <h2>List Of Logs</h2>

        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>Log Id</th>
                    <th>Message</th>
                    <th>User Id</th>

                </tr>
            </thead>

            <tbody>
                <?php
                include "databasequery.php";
                error_reporting(E_ERROR | E_PARSE);

                $sql = "SELECT * FROM logs";
                $result = $conn->query($sql);
                // output data of each row
                while ($row = $result->fetch()) {
                    $controlaccount1 = $conn->prepare('SELECT * , IF(UserId IS NOT NULL,UserId,0) FROM logs ');
                    $temp;








                    
                    if($row['UserId']==null)
                    {
                        $temp="System";
                    }
                    else
                    {
                        $temp = $row['UserId'];
                    }

                   
                    echo "
                        <tr>    
                        <td>$row[LogId] </td>
                        <td>$row[Message] </td>
                        <td>$temp </td>  
                        </tr>
                        
                        
                        ";


                }





                ?>



            </tbody>


        </table>




    </div>
</body>

</html>