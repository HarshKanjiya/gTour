<?php session_start(); ?>

<nav>
    <div class="nav-img">
        <img src="./assets/Gtour_logo.png" alt="logo" />
    </div>
    <div class="nav-nav">
        <a href="/gtour/tours.php" class="nav-ele">Tours</a>
        <a class='nav-ele'>Contact Us</a>
        <a class="nav-ele">About us</a>

        <?php

        if (isset($_SESSION["role"])) {
            if ($_SESSION["role"] == "admin") {
                echo "<a class='nav-ele' href='/gtour/dashboard.php' >Dashboard</a>";
            }
        }
        ?>

    </div>
    <div class="nav-nav">
        <?php

        $userExistance = isset($_SESSION["name"]);

        if ($userExistance) {
            echo " 
            <div class='profile-opt' style='display:flex;flex-direction:raw;gap:1rem;align-items:center;' >
             <div class='profile-opt-name'>hi, " . $_SESSION['name'] . " </div> 
             <a href='mybookings.php' class='nav-ele'>My Bookings</a>

             <form action='./auth_loading.php' method='post'>
             <input hidden name='type' value='logout' />
             <input hidden name='name' value='' />
             <input hidden name='email' value='' />
             <input hidden name='password' value='' />
             <button
             style='color:white;background:tomato;outline:none;padding:0.5rem 1rem;border-radius:9px;border:none'>sign out</button>
             </form>
            </div>
            ";
        } else {
            echo '<a class="nav-login" href="login.php" >login</a>';
        }
        ?>
    </div>
</nav>

<?php


?>