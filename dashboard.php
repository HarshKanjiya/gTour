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

    .user {
      display: flex;
      justify-content: space-between;
      align-items: center;
      border: 1px solid #c0c0c0;
      padding: 1rem;
      border-radius: 5px;
    }

    .user-left {
      display: flex;
      flex-direction: column;
      gap: 0.3rem;
    }

    .user-right {
      display: flex;
      gap: 1rem;
      align-items: center;
    }

    .user-right button {
      border: none;
      outline: none;
      border-radius: 4px;
      padding: 0.6rem 1rem;
      color: #fff;
      background-color: tomato;
    }

    .new-tour-wrapper {
      display: flex;
      width: 100%;
      flex-direction: column;
      gap: 1rem;
      width: 50%;
      margin: auto;
    }

    input,
    textarea {
      border-radius: 7px 7px 0 0;
      border: none;
      outline: none;
      padding: 0.7rem 1rem;
      border-bottom: 2px solid #909090;
      background-color: #f5f5f5;
      overflow: hidden;
    }

    .new-tour-wrapper button {
      width: 100%;
      padding: 1rem;
      background-color: royalblue;
      border: none;
      outline: none;
      border-radius: 6px;
      color: #FFF;
      font-weight: 600;
      font-size: 1.1rem;
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
      background-color: tomato;
      padding: 0.7rem;
      border: none;
      border-radius: 6px;
      color: white;
    }

    .order {
      padding: 1rem;
      background-color: #fff;
      border: 2px solid #fff;
      border-radius: 11px;
      width: 100%;
      gap: 0.5rem;
      display: flex;
      flex-direction: column;
      overflow: hidden;
    }
  </style>

  <script src="https://kit.fontawesome.com/0439b6ee0f.js" crossorigin="anonymous"></script>
</head>

<body>

  <!-- header -->
  <?php include('./components/layout/Header/Header.php') ?>

  <div class="wrappe">



    <?php
    // session_start();
    
    if (isset($_SESSION['role'])) {
      if ($_SESSION['role'] != 'admin') {
        echo "
        <script type='text/javascript'>
            window.location.pathname = '/gtour/';
        </script>";
      }
    } else {
      echo "
      <script type='text/javascript'>
          window.location.pathname = '/gtour/';
      </script>";

    }

    ?>

    <div class="users-wrappe">
      <h2>List of Bookings</h2>

      <?php
      include "./db/connection.php";
      $query = "select * from orderData";
      $result = mysqli_query($connection, $query);

      while ($row = mysqli_fetch_assoc($result)) { ?>

        <div class="order">
          <div class="user">
            <div class="user-left">
              <p>
                Tour:&nbsp;
                <?php echo $row["tourName"] ?>
              </p>
              <p>
                Email:&nbsp;
                <?php echo $row["email"] ?>
              </p>
              <p>
                From:&nbsp;
                <?php echo $row["fromDate"] ?>
              </p>
              <p>
                To:&nbsp;
                <?php echo $row["toDate"] ?>
              </p>
            </div>
          </div>

        </div>

        <?php
      }
      ?>
    </div>


    <div class="users-wrappe">
      <h2>List of Users</h2>

      <?php
      include "./db/connection.php";
      $query = "select * from usersData";
      $result = mysqli_query($connection, $query);

      while ($row = mysqli_fetch_assoc($result)) { ?>

        <div class="user">
          <div class="user-left">
            <p>
              name:
              <?php echo $row["name"] ?>
            </p>
            <p>
              email:&nbsp;
              <?php echo $row["email"] ?>
            </p>
          </div>
          <div class="user-right">
            <?php echo $row["role"] ?>

            <form method="post" action="/gtour/adminOPTs.php">
              <input hidden value="delete-user" name="opt" />
              <?php echo "<input name='id-to-delete' hidden value='" . $row["user_id"] . "'/>" ?>
              <button type="submit" name="delete-user-button">Delete</button>
            </form>
          </div>
        </div>

        <?php
      }
      ?>
    </div>

    <!-- //*New Tour  -->
    <div class="users-wrappe">
      <h2>Add New Tour</h2>
      <form class="new-tour-wrapper" method="post" action="/gtour/adminOPTs.php" enctype="multipart/form-data">
        <input hidden value="upload-tour" name="opt" />
        <input placeholder="tour places" name="tourPlaces" type="text" />
        <textarea placeholder="tour Depscription" name="tourDepp" type="text"></textarea>
        <input placeholder="tour cost" name="tourCost" type="text" />
        <input type="file" name="uploadFile" />
        <button type="submit">SUBMIT</button>
      </form>
    </div>

    <!-- //* Tour list -->
    <div class="users-wrappe">
      <h2>Tours</h2>

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
            <button>REMOVE</button>
          </div>

          <?php
        }
        ?>
      </div>
    </div>
  </div>
</body>

</html>