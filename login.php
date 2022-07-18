<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <title>Log In</title>
    <style>
        .container {
            max-width: 55%;
            background-color: antiquewhite;
            margin: auto;
            opacity: 0.9;
            text-align: center;
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
    </style>
</head>

<body>

    <div class="container">
        <h1>Welcome to the Art Gallery</h1>
        <p>Log in our Databse!</p>

        <form action="" method="post">
            <input type="email" name="email" id="email" placeholder="Enter your email id please">
            <input type="password" name="passwd" id="passwd" placeholder="Enter your password">

            <button class='but' name='button'>Log In</button><br>


        </form>

    </div>

    <?php
    $server = "localhost";
    $username = "root";
    $passwd = "";
    $dbname = "art_gallery";

    $con = mysqli_connect($server, $username, $passwd, $dbname);

    if (!$con) {
        die("Connection to this database failed due to " . mysqli_connect_error());
    }

    session_start();
    if (isset($_POST['button'])) {
        $query = mysqli_query($con, "SELECT * from `signup` where `email`='$_POST[email]' and `passwd`='$_POST[passwd]' and `category`='Artist'");

        $query2 = mysqli_query($con, "SELECT * from `signup` where `email`='$_POST[email]' and `passwd`='$_POST[passwd]' and `category`='Customer'");

        $num = mysqli_num_rows($query);
        $num2 = mysqli_num_rows($query2);
        if ($_POST['email'] == "admin@art.com" && $_POST['passwd'] == "admin") {
            header("location: admin.php");
        } else if ($num <= 0  && $num2 <= 0) {
            echo "<script>alert('Email or Password is incorrect');</script>";
        } else {
            if ($num > 0 && $num2 <= 0) {
                header("location: artist.php");
            } else if ($num2 > 0 && $num <= 0) {
                header('location: cust.php');
            }
        }
    }
    ?>
</body>

</html>