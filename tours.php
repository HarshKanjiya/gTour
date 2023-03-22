<?php include_once("./db/connection.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>G tour</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link href="css/style.css" rel="stylesheet" />

    <link href="./components/layout/Header/Header.styles.css" rel="stylesheet" />
    <link href="css/dashboard.styles.css" rel="stylesheet" />

    <style>
        .wrappe {
            background-color: #fff;
            height: max-content;
            width: 100vw;
            display: flex;
            flex-direction: column;
            gap: 2rem;
            padding: 1rem;
            padding-top: 10vh;
            color: #252525;
        }

        .users-wrappe {
            padding: 1rem;
            background-color: #fff;
            border: 2px solid #fff;
            border-radius: 11px;
            width: 100%;
            gap: 0.5rem;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            box-shadow:
                0px 1.2px 2.2px rgba(0, 0, 0, 0.014),
                0px 3px 5.3px rgba(0, 0, 0, 0.02),
                0px 5.6px 10px rgba(0, 0, 0, 0.025),
                0px 10.1px 17.9px rgba(0, 0, 0, 0.03),
                0px 18.8px 33.4px rgba(0, 0, 0, 0.036),
                0px 45px 80px rgba(0, 0, 0, 0.05);
        }

        .tour-wrappe {
            width: 100%;
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 1rem;
        }

        .tour {
            display: flex;
            flex-direction: column;
            padding: 1rem;
            border-radius: 9px;
            gap: 1rem;
            border: 1px solid #d1d1d1;
            overflow: hidden;
            height: max-content;
            width: 250px;
        }

        .tour img {
            width: 100%;
            border-radius: 6px;
            aspect-ratio: 5/4;
            background-size: cover;
        }

        .tour button {
            background-color: #2bb594;
            padding: 0.7rem;
            border: none;
            border-radius: 6px;
            color: white;
        }
    </style>

    <script src="https://kit.fontawesome.com/0439b6ee0f.js" crossorigin="anonymous"></script>
</head>

<body>

    <!-- header -->
    <?php include('./components/layout/Header/Header.php') ?>

    <div class="wrappe">

        <!-- //* Tour list -->
        <div class="users-wrappe">
            <h2>Our Tours</h2>
            <div class="tour-wrappe">
                <?php

                $query = "select * from tourData";
                $result = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    ?>

                    <div class="tour">
                        <img src=" <?php echo $row["image"] ?> " alt="" />
                        <p>
                            <?php echo $row["places"] ?>
                        </p>
                        <p>
                            <?php echo $row["price"] ?> ₹ per Person
                        </p>
                        <form action="bookTour.php" method="post">
                            <input hidden value="<?php echo $row["id"] ?>" name="tourID" />
                            <button>BOOK</button>
                        </form>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>