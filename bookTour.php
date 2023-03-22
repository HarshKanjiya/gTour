<?php
session_start();
if (!isset($_SESSION["email"])) {
    echo "
    <script type='text/javascript'>
        window.location.pathname = '/gtour/tours.php';
</script>
    ";
}
include_once "./db/connection.php";


if (!isset($_POST["tourID"])) {
    echo " <script type='text/javascript'>
        window.location.pathname = 'gtour/tours.php'; </script>";
}

$query = "SELECT * FROM `tourData` WHERE `id` = {$_POST["tourID"]} ";
$res = mysqli_query($connection, $query);
$data = $row = mysqli_fetch_assoc($res);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.styles.css" />
    <title>Tour Booking</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Kalam:wght@300;700&family=Pacifico&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap");

        body {
            margin: 0;
            padding: 0;
            font-family: "Poppins", sans-serif;
        }

        .form-wrappe {
            display: flex;
            gap: 1rem;
            width: 70vw;
            height: 70vh;
            box-shadow:
                2.8px 2.8px 2.2px rgba(0, 0, 0, 0.02),
                6.7px 6.7px 5.3px rgba(0, 0, 0, 0.028),
                12.5px 12.5px 10px rgba(0, 0, 0, 0.035),
                22.3px 22.3px 17.9px rgba(0, 0, 0, 0.042),
                41.8px 41.8px 33.4px rgba(0, 0, 0, 0.05),
                100px 100px 80px rgba(0, 0, 0, 0.07);
            padding: 1rem;
            border-radius: 9px;
            background-color: #fff;
        }

        .img-wpr {
            flex: 0.5;
            overflow: hidden;
            border-radius: 9px;

        }

        .form-wrappe form {
            flex: 0.5;
            height: 100%;
            display: flex;
            justify-content: space-between;
            flex-direction: column;
        }

        img {
            height: 100%;
            width: auto;
            transform: translate(-20%, 0);
        }

        .text {
            height: max-content;
        }

        .inp-wpr {
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 1rem;
        }

        button {
            padding: 1rem;
            font-size: 1.2rem;
            border: none;
            outline: none;
            background: royalblue;
            color: #fff;
            font-weight: 600;
            border-radius: 6px;
        }

        p {
            width: 100%;
        }

        input[type="date"] {
            background-color: royalblue;
            padding: 0.5rem 1rem;
            color: #ffffff;
            font-size: 18px;
            border: none;
            outline: none;
            border-radius: 5px;
        }

        ::-webkit-calendar-picker-indicator {
            background-color: #ffffff;
            padding: 5px;
            cursor: pointer;
            border-radius: 3px;
        }
    </style>
    <script src="https://kit.fontawesome.com/0439b6ee0f.js" crossorigin="anonymous"></script>

</head>

<body>
    <div class="login-wrapper">
        <div class='form-wrappe'>
            <div class="img-wpr">
                <img src="<?php echo $data["image"] ?>" />
            </div>
            <form action="tourBooking_loading.php" method="POST">
                <h2>
                    <?php echo $data["places"] ?>
                </h2>
                <div class="text">
                    <p>
                        places:
                        <?php echo $data["dep"] ?>
                    </p>
                    <p>
                        cost:
                        <?php echo $data["price"] ?> ₹ Per Person
                    </p>
                </div>

                <div>
                    <div class="inp-wpr">
                        <label>From </label>
                        <input name="from" min="<?php echo "20" . date('y-m-d') ?>" type="date" />
                    </div>
                    <br />
                    <div class="inp-wpr">
                        <label>To &nbsp;&nbsp;&nbsp;&nbsp; </label>
                        <input name="to" min="<?php echo "20" . date('y-m-d') ?>" type="date" />
                    </div>
                </div>

                <input hidden value="<?php echo $_POST["tourID"] ?>" name="tourID" />
                <input hidden value="<?php echo $data["places"] ?>" name="tourName" />

                <button>BOOK</button>
            </form>
        </div>
    </div>

</body>

</html>