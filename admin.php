<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <title>Admin</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .contain {
            display: flex;
            flex-direction: column;
            justify-content: center;
            flex-wrap: wrap;
            height: auto;
            width: 100%;
            align-items: center;
            margin: 21px auto;
        }

        .container {
            max-width: 100%;
            background-color: antiquewhite;
            margin: auto;
            opacity: 0.9;
            text-align: center;
            padding: 5px 20px;
        }

        h1,
        p,
        h2 {
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
        <p>Admin Portal</p>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="index.php">Log Out</a>
                
            </ul>
        </nav>
    </div>
    <main>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="contain">
                <table width=80% cellpadding="5">
                    <thead>
                        <h2>Arts</h2>
                        <tr>
                            <th>Art</th>
                            <th width=7%>Art ID</th>
                            <th width=15%>Art Name</th>
                            <th width=15%>Artist Name</th>
                            <th>Description</th>
                            <th width=8%>Price</th>
                            <th colspan="2">Operation</th>
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
                            <td align="Center" valign="middle"><a  href="updateart.php?artid=<?php echo $art_id; ?>"> Update</a></td>
                            <td align="Center" valign="middle"><a onclick="checker()" href="deleteart.php?artid=<?php echo $art_id; ?>">Delete</a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>


            <div class="contain">
                <table width=80% cellpadding="5">
                    <thead>
                        <h2>Artist</h2>
                        <tr>
                            <th width="8%">Artist ID</th>
                            <th width=15%>Artist Name</th>
                            <th width=17%>Email</th>
                            <th width=15%>Phone Number</th>
                            <th width="8%">Address</th>
                            <th colspan="2">Operation</th>
                        </tr>
                    </thead>
                    <?php

                    $artist = "SELECT * from `artist` ";
                    $var = mysqli_query($con, $artist);
                    while ($row = mysqli_fetch_array($var)) {
                        $artist_id = $row['artist_id'];
                        $artist_name = $row['artist_name'];
                        $email = $row['email'];
                        $phno = $row['phno'];
                        $address = $row['address'];
                    ?>
                        <tr>
                            <td align="center" valign="Middle"><?php echo $artist_id; ?></td>
                            <td align="Center" valign="middle"><?php echo $artist_name; ?></td>
                            <td align="Center" valign="middle"><?php echo $email; ?></td>
                            <td align="Center" valign="middle"><?php echo $phno; ?></td>
                            <td align="Center" valign="middle"><?php echo $address; ?></td>
                            <td align="Center" valign="middle"><a href="updateartist.php?artemail=<?php echo $email; ?>"> Update</a></td>
                            <td align="Center" valign="middle"><a onclick="checker()" href="deleteartist.php?artemail=<?php echo $email; ?>">Delete</a></td>

                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>


            <div class="contain">
                <table width=80% cellpadding="5">
                    <thead>
                        <h2>Customer</h2>
                        <tr>
                            <th width=12%>Customer ID</th>
                            <th width=15%>Customer Name</th>
                            <th width=18%>Email</th>
                            <th width=15%>Phone Number</th>
                            <th width=7%>Address</th>
                            <th colspan="2">Operation</th>
                        </tr>
                    </thead>
                    <?php


                    $cust = "SELECT * from `customer` ";
                    $var = mysqli_query($con, $cust);
                    while ($row = mysqli_fetch_array($var)) {
                        $cust_id = $row['cust_id'];
                        $name = $row['name'];
                        $email = $row['email'];
                        $phno = $row['phno'];
                        $address = $row['address'];
                    ?>
                        <tr>
                            <td align="center" valign="Middle"><?php echo $cust_id; ?></td>
                            <td align="Center" valign="middle"><?php echo $name; ?></td>
                            <td align="Center" valign="middle"><?php echo $email; ?></td>
                            <td align="Center" valign="middle"><?php echo $phno; ?></td>
                            <td align="Center" valign="middle"><?php echo $address; ?></td>
                            <td align="Center" valign="middle"><a  href="updatecust.php?custemail=<?php echo $email; ?>"> Update</a></td>
                            <td align="Center" valign="middle"><a onclick="checker()" href="deletecust.php?custemail=<?php echo $email; ?>">Delete</a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </table><br><br><br>
            </div>

            <div class="contain">
                <table width=80% cellpadding="5">
                    <thead>
                        <h2>Purchase</h2>
                        <tr>
                            <th>Purchase ID</th>
                            <th width=7%>Customer ID</th>
                            <th width=15%>Customer Name</th>
                            <th width=15%>Art ID</th>
                            <th width=15%>Art Name</th>
                            <th width=15%>Amount</th>
                            <th width=15%>Address</th>
                            <th width=15%>Date</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <?php

                    $pur = "SELECT * from `purchase` ";
                    $var = mysqli_query($con, $pur);
                    while ($row = mysqli_fetch_array($var)) {
                        $p_id = $row['p_id'];
                        $cust_id = $row['cust_id'];
                        $cust_name = $row['cust_name'];
                        $art_id = $row['art_id'];
                        $art_name = $row['art_name'];
                        $amt = $row['amt'];
                        $date = $row['date'];
                        $add = $row['address'];
                    ?>
                        <tr>
                            <td align="center" valign="Middle"><?php echo $p_id; ?></td>
                            <td align="Center" valign="middle"><?php echo $cust_id; ?></td>
                            <td align="Center" valign="middle"><?php echo $cust_name; ?></td>
                            <td align="Center" valign="middle"><?php echo $art_id; ?></td>
                            <td align="Center" valign="middle"><?php echo $art_name; ?></td>
                            <td align="Center" valign="middle"><?php echo $amt; ?></td>
                            <td align="Center" valign="middle"><?php echo $add; ?></td>
                            <td align="Center" valign="middle"><?php echo $date; ?></td>
                            <td align="Center" valign="middle"><a onclick="checker()" href="deletepur.php?pid=<?php echo $p_id; ?>">Delete</a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
            
               <div class="contain">
                <table width=80% cellpadding="5">
                    <thead>
                        <h2>Procedural Storage</h2>
                        <h2>
                        <input type="text" name="ID" id="ID" placeholder="Enter the Art-ID please">
                       
                        <div class="ID">
                         <input class='but' type="submit" name="button" value="GO"></input> 
                        </div>
                        </h2>
                        <tr>
                            <th width=7%>Art ID</th>
                            <th>Art Name</th>
                            <th width=15%>Artist ID</th>
                            <th width=15%>Artist Name</th>
                            <th>Price</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <?php
                    
                    if (isset($_POST['button'])) {
                        if (!$con) {
                            die("Connection to this database failed due to " . mysqli_connect_error());
                        }
                    $var = $_POST['ID'];

                    $result1= mysqli_query($con,"CALL get_arts('$var')");

                    while ($row = mysqli_fetch_array($result1)) {
                        $art_id = $row['art_id'];
                        $name = $row['art_name'];
                        $artist_id = $row['artist_id'];
                        $artist_name = $row['artist_name'];
                        $price = $row['price'];
                        $date = $row['date'];
                    ?>
                        <tr>
                           <td align="Center" valign="middle"><?php echo $art_id; ?></td>
                            <td align="Center" valign="middle"><?php echo $name; ?></td>
                            <td align="Center" valign="middle"><?php echo $artist_id; ?></td>
                            <td align="Center" valign="middle"><?php echo $artist_name; ?></td>
                            <td align="Center" valign="middle">Rs. <?php echo $price; ?></td>
                            <td align="Center" valign="middle"><?php echo $date; ?></td>
                        </tr>
                    <?php
                    }
                }
                    ?>
                </table>
            </div>
         

        </form>

    </main>
    <script>
        function checker(){
            var result = confirm('Are You Sure you wanna delete it');
            if(result == false){
                event.preventDefault();
         }
        }
    </script>

</body>

</html>