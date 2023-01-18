<<!DOCTYPE html>
    <html lang="en">

    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>

        <!-- <form onsubmit="echo.php" method="POST" >
            <input name="one" />
            <input name="two" />
            <button type="submit" >sub</button>
        </form> -->

        <?php
        // $a = $_POST['one'];
        // $b = $_POST['two'];

        // if($a > $b){
        //     echo $a;
        // }
        // else{
        //     echo $b;
        // }
        
        for ($a = 1; $a <= 1000; $a=$a+2){
            echo $a;
            echo '<br/>';
        }
        ?>

    </body>

    </html>