<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <title>Upload</title>
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
            padding: 0.1px 167px;
            cursor: pointer;
        }

        .option {
            display: flex;
            justify-content: center;
            align-items: center;
            width: auto;
        }

        option[value=""][disabled] {
            display: none;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Welcome to the Art Gallery</h1>
        <p>Upload your great art here </p>

        <form action="" method="post" enctype="multipart/form-data">

            <input type="text" name="art_name" id="name" placeholder="Enter name of the art">
            <div class="option">
                <input type="file" name="file" id="file">
                <!-- <input type="submit" name="submit" id="submit" value="Upload"> -->
            </div>
            <input type="email" name="email" placeholder="Enter your email ID">
            <input type="text" name="price" id="price" placeholder="Enter price of your art" required>
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Please give your art's decription"></textarea><br>
            <input class='but' type="submit" name="button" value="Upload"></a></input>

        </form>

    </div>

    <?php
    $server = "localhost";
    $username = "root";
    $passwd = "";
    $dbname = "art_gallery";

    $con = mysqli_connect($server, $username, $passwd, $dbname);

    if (isset($_POST['button']))
     {
        $query1 = mysqli_query($con, "SELECT * from `artist`  where `email`='$_POST[email]' ");
        $num = mysqli_num_rows($query1);
        if ($num > 0) 
        {
            while ($r = mysqli_fetch_array($query1))
            {
                $artist_id = $r['artist_id'];
                $artist_name = $r['artist_name'];
            }
            $tm = md5(time());
            $fnm = $_FILES["file"]["name"];
            $dst = "./arts/" . $tm . $fnm;
            move_uploaded_file($_FILES["file"]["tmp_name"], $dst);

            $query2 = mysqli_query($con, "INSERT INTO `art`(`art_name`, `artist_id`, `artist_name`, `price`, `date`, `art`,`desc`) VALUES ('$_POST[art_name]','$artist_id','$artist_name','$_POST[price]', current_timestamp(),'$dst','$_POST[desc]')");

            header("location: artist.php");
        }
    }
    ?>
</body>

</html>