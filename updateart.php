<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <title>Update Art</title>
    <style>
        .container {
            max-width: 55%;
            background-color: antiquewhite;
            margin: auto;
            opacity: 0.9;
            text-align: center;
        }

        a {
            margin-right: 30px;
            text-decoration: none;
            color: rgb(28, 28, 27);
            font-weight: 600;

        }

        h1 {
            text-align: center;
            font-family: 'Acme', sans-serif;
        }

        p {
            text-align: center;
            font-family: 'Acme', sans-serif;
        }

        input,
        textarea {
            padding: 2px 110px;
            width: 55%;
            text-align: left;
            margin: 2px;
        }

        form {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .but {
            color: #000000;
            background: white;
            border-radius: 17px;
            padding: 0.1px 23px;
            cursor: pointer;
        }

        .option {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100px;
        }

        option[value=""][disabled] {
            display: none;
        }
    </style>
</head>

<body>

    <?php
    $server = "localhost";
    $username = "root";
    $passwd = "";
    $dbname = "art_gallery";

    $con = mysqli_connect($server, $username, $passwd, $dbname);

    $artid = $_GET['artid'];
    
    $select = mysqli_query($con,"SELECT * FROM `art` WHERE `art_id` = '$artid'");
    $artquerry = mysqli_fetch_assoc($select);

    ?>
    <div class="container">
        <h1>Welcome to the Art Gallery</h1>
        <p>Please Update the details of art</p>

        <form action="" method="post">
            <input type="text" name="artname" placeholder="Enter the art name" value="<?php echo $artquerry['art_name'];?>" required>
            <input type="textarea" name="desc" placeholder="Enter the description of the art" value="<?php echo $artquerry['desc'];?>" required>
            <input type="text" name="price" placeholder="Enter the price of the art" value="<?php echo $artquerry['price'];?>" required>
            <input onclick="checker()" class='but' type="submit" name="button" value="Update"></input>

        </form>

    </div>

    <?php

    if (isset($_POST['button'])) {
        if (!$con) {
            die("Connection to this database failed due to " . mysqli_connect_error());
        }
        $artname = $_POST['artname'];
        $desc = $_POST['desc'];
        $price = $_POST['price'];

        mysqli_query($con,"UPDATE `art` SET `art_name`='$artname',`price`='$price',`date`=current_timestamp(),`desc`='$desc' WHERE `art_id`='$artid'");

        echo "<script>alert('Update Successfull');</script>";

        header("location: admin.php");
    }
    ?>
<script>
        function checker(){
            var result = confirm('Are You Sure you wanna update it');
            if(result == false){
                event.preventDefault();
         }
        }
    </script>

</body>

</html>