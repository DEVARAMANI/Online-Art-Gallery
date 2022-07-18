<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <title>Sign up</title>
    <!-- <style>
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
    </style> -->
</head>

<body>

    <div class="container">
        <h1>Welcome to the Art Gallery</h1>
        <p>Please fill the details to sign in</p>

        <form action="" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name please" required>
            <div class="option">
                <select name="category" id="category">
                    <option disabled selected>Select category</option>
                    <option>Artist</option>
                    <option>Customer</option>
                </select>
            </div>
            <input type="email" name="email" id="email" placeholder="Enter your email id please" required>

            <input type="text" name="phno" id="phno" placeholder="Enter your valid phone number" required maxlength="10">
            <input type="text" name="address" id="address" placeholder="Enter your address" required>
            <input type="password" name="passwd" id="passwd" placeholder="Enter your password" required>
            <input type="password" name="passwdc" id="passwdc" placeholder="Confirm password" required><br>
            <input class='but' type="submit" name="button" value="Sign Up"></input>

        </form>

    </div>
    <?php
    $server = "localhost";
    $username = "root";
    $passwd = "";
    $dbname = "art_gallery";

    $con = mysqli_connect($server, $username, $passwd, $dbname);

    if (isset($_POST['button'])) {
        if (!$con) {
            die("Connection to this database failed due to " . mysqli_connect_error());
        }

        $name = $_POST['name'];
        $category = $_POST['category'];
        $email = $_POST['email'];
        $phno = $_POST['phno'];
        $address = $_POST['address'];
        $passwd = $_POST['passwd'];

        if($_POST['passwd']!=$_POST['passwdc']){
            echo "<script>alert('Password didnt matched');</script>";
        }
        else{
            $sql = mysqli_query($con, "INSERT INTO `signup` (`name`, `category`, `email`, `phno`, `address`, `passwd`) VALUES ('$name','$category','$email','$phno','$address','$passwd')");

            if ($category == 'Artist') {
                $querry = mysqli_query($con, "INSERT INTO `artist`(`artist_name`, `email`, `phno`, `address`) VALUES ('$_POST[name]','$_POST[email]','$_POST[phno]','$_POST[address]')");
                header('location: artist.php');
            } else if ($category == 'Customer') {
                $querry2 = mysqli_query($con, "INSERT INTO `customer`(`name`, `email`, `phno`, `address`) VALUES ('$_POST[name]','$_POST[email]','$_POST[phno]','$_POST[address]')");
                header('location: cust.php');
            }
        }

       
    }
    ?>
</body>

</html>