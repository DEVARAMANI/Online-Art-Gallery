<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <title>Update Customer</title>
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

    $custemail = $_GET['custemail'];
    
    $select = mysqli_query($con,"SELECT * FROM `Customer` WHERE `email` = '$custemail'");
    $custquerry = mysqli_fetch_assoc($select);

    ?>
    <div class="container">
        <h1>Welcome to the Art Gallery</h1>
        <p>Please update the customer details</p>

        <form action="" method="post">
            <input type="text" name="custid" value="<?php echo $custquerry['cust_id']?>" placeholder="Enter the ID of customer" required>
            <input type="text" name="name" id="name" value="<?php echo $custquerry['name']?>" placeholder="Enter the name of customer" required>

            <input type="email" name="email" id="email" value="<?php echo $custquerry['email']?>" placeholder="Enter your email id please" required>

            <input type="text" name="phno" id="phno" value="<?php echo $custquerry['phno']?>" placeholder="Enter your valid phone number" required maxlength="10">
            <input type="text" name="address" id="address" value="<?php echo $custquerry['address']?>" placeholder="Enter your address" required>
            <input onclick = "checker() "class='but' type="submit" name="button" value="Update"></input>

        </form>

    </div>

    <?php

    if (isset($_POST['button'])) {
        if (!$con) {
            die("Connection to this database failed due to " . mysqli_connect_error());
        }
        $id = $_POST['custid'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phno = $_POST['phno'];
        $address = $_POST['address'];

        $sqlquerry = mysqli_query($con,"UPDATE `customer` SET `cust_id`='$id',`name`='$name',`email`='$email',`phno`='$phno',`address`='$address' WHERE `email` ='$custemail'");

        mysqli_query($con,"UPDATE `signup` SET `name`='$name',`email`='$email',`phno`='$phno',`address`='$address' WHERE `email`='$custemail'");

        header("location: admin.php");
    }
    ?>
<script>
        function checker(){
            var result = confirm('Are You Sure you wanna update it?');
            if(result == false){
                event.preventDefault();
         }
        }
    </script>
</body>

</html>