<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <title>Purchase</title>
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

    $artID = $_GET['artid'];

    $select = mysqli_query($con, "SELECT * FROM `art` where `art_id`='$artID'");

    $result = mysqli_fetch_assoc($select);
    ?>
    <div class="container">
        <h1>Welcome to the Art Gallery</h1>
        <p>Thank you for purchasing our Amazing Arts</p>
        
        <form action="" method="post">
            <input type="text" name="id" id="id" value="<?php echo $result['art_id']; ?>" placeholder="Enter the Art ID" required>
            <input type="text" name="name" id="name" value="<?php echo $result['art_name']; ?>" placeholder="Enter the Art Name" required>
            <input type="email" name="email" id="email" placeholder="Enter your email id please" required>
            <input type="text" name="address" id="address" placeholder="Enter the address" required>
            <input type="text" name="amt" id="amt" value="<?php echo $result['price']; ?>" placeholder="Enter the Art Amount" required>
            <input class='but' type="submit" name="button" value="Purchase"></input>
        </form>

    </div>

    <?php
    if (isset($_POST['button'])){
        if (!$con) {
            die("Connection to this database failed due to " . mysqli_connect_error());
        }

        $art_id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $amt = $_POST['amt'];
        $address = $_POST['address'];

        $cust_id = mysqli_query($con, "SELECT `cust_id` from `customer` where `email`= '$email' ");
        $cust_name = mysqli_query($con, "SELECT `name` from `customer` where `email`= '$email' ");
        $num = mysqli_num_rows($cust_id);
        if ($num > 0) {
            $var = mysqli_fetch_array($cust_id);
            $var2 = mysqli_fetch_array($cust_name);
            $customer_id = $var['cust_id'];
            $customer_name = $var2['name'];

            mysqli_query($con, "INSERT INTO `purchase`(`cust_id`, `cust_name`, `art_id`, `art_name`, `amt`, `date`,`address`) VALUES('$customer_id','$customer_name','$art_id','$name','$amt',current_timestamp(),'$address')");

            header("location: cust.php");
        }
    }
    ?>
</body>

</html>