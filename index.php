<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <title>Art Gallery</title>
    <style>
        /* {
            margin: 0;
            padding: 0;
        } */

        .contain {
            display: flex;
            justify-content: center;
            height: auto;
            width: 100%;
        }

        .container {
            max-width: 100%;
            background-color: antiquewhite;
            margin: auto;
            opacity: 0.9;
            text-align: center;
            padding: 5px 20px;
        }

        h1 {
            text-align: center;
            font-family: 'Acme', sans-serif;
        }

        .but {
            color: #000000;
            background: white;
            border-radius: 17px;
            padding: 1px 105px;
            cursor: pointer;
        }

        li {
            list-style-type: none;
        }

        a {
            margin-right: 30px;
            text-decoration: none;
            color: rgb(28, 28, 27);
            font-weight: 600;

        }


        ul {
            display: flex;
            flex-direction: row;
            justify-content: right;

        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            border-color: #96D4D4;
            border-style: solid;
        }

        nav,
        a:hover {
            font-weight: 900;
            color: black;
        }

        main {
            padding: 15px;
        } 
    </style>
</head>

<body>
    <div class="container">
        <h1>Art Gallery</h1>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="regi.html">Register/Log In</a>
                <li>
            </ul>
        </nav>
    </div>
    <main>
        <form action="POST" enctype="multipart/form-data">
            <div class="contain">
                <table width=80% cellpadding="5">
                    <thead>
                        <tr>
                            <th>Art</th>
                            <th width=7%>Art ID</th>
                            <th width=15%>Art Name</th>
                            <th width=15%>Artist Name</th>
                            <th>Description</th>
                            <th width=8%>Price</th>
                        </tr>
                    </thead>
                    <?php

                    $server = "localhost";
                    $username = "root";
                    $passwd = "";
                    $dbname = "art_gallery";

                    $con = mysqli_connect($server, $username, $passwd, $dbname);

                    $art = "SELECT * from `art` ";
                    $var = mysqli_query($con, $art);
                    while ($row = mysqli_fetch_array($var)) {
                        $image = $row['art'];
                        $art_id = $row['art_id'];
                        $artist_name = $row['artist_name'];
                        $name = $row['art_name'];
                        $price = $row['price'];
                        $desc = $row['desc'];
                    ?>
                        <tr>
                            <td align="center" valign="Middle"><a href=""="<?php echo $name; ?>"><img src="<?php echo $image; ?>" alt="<?php echo $name; ?>" width="45%"></a></td>
                            <td align="Center" valign="middle"><?php echo $art_id; ?></td>
                            <td align="Center" valign="middle"><?php echo $name; ?></td>
                            <td align="Center" valign="middle"><?php echo $artist_name; ?></td>
                            <td align="Center" valign="middle"><?php echo $desc; ?></td>
                            <td align="Center" valign="middle">Rs. <?php echo $price; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </form>

    </main>

</body>

</html>