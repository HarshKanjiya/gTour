<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.styles.css" />
    <title>Authentication</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Kalam:wght@300;700&family=Pacifico&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap");

        body {
            margin: 0;
            padding: 0;
            font-family: "Poppins", sans-serif;

        }

        .test h1 {
            font-size: 5rem;
            line-height: 0;
            padding: 2rem;
        }

        .test {
            position: relative;
            height: max-content;
            width: max-content;
            min-width: 150px;
            border-radius: 8px;
            background-color: white;
            color: #252525;
            padding: 2rem 2.3rem;

            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1rem;

            box-shadow: 6px 6px 15px rgba(0, 0, 0, 0.15), -6px -6px 15px rgba(255, 255, 255, 0.15);
        }

        .test a {
            padding: 0.7rem 1rem;
            background-color: rgb(33, 170, 215);
            color: white;
            border-radius: 8px;
            transition: 300ms;
            border: 2px solid white;
            text-decoration: none;
            box-shadow: 0px 10px 15px -1px rgba(0, 0, 0, 0.20);
            animation: anim ease 200ms;
        }

        .test a:hover {
            box-shadow: none;
        }

        @keyframes anim {
            0% {
                transform: translate(0%, -10%);
            }

            50% {
                transform: translate(0%, 10%);
            }

            100% {
                transform: translate(0%, -10%);
            }
        }
    </style>
    <script src="https://kit.fontawesome.com/0439b6ee0f.js" crossorigin="anonymous"></script>

</head>

<body>
    <div class="login-wrapper">
        <?php


        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $type = $_POST["type"];

        session_start();

        include './db/connection.php';



        if ($type == "register") {
            register($name, $email, $password, $connection);
        } else if ($type == "login") {
            login($name, $email, $password, $connection);
        } else if ($type == "logout") {
            logout();
        }

        function register($name, $email, $password, $connection)
        {
            if (trim($name) == '' || trim($email) == '' || trim($password) == '') {
                echo "
                <div class='test' >
                <h1>😵‍💫</h1>
                <p>Invalid Data Entries</p>  
                <a href='javascript: history.back()'>
                <i class='fa-solid fa-back'></i>
                Go back</a>
                </div> ";
                return;
            }


            $existance = $connection->query("SELECT * FROM usersData");

            if ($existance->num_rows > 0) {
                while ($row = $existance->fetch_assoc()) {
                    if ($row['email'] == $email) {
                        echo "
                <div class='test' >
                <h1>😓</h1>
                <p>Email Already in User!</p>  
                <a href='javascript: history.back()'>
                <i class='fa-solid fa-back'></i>

                Go back</a>
                </div> ";
                        return;
                    }
                }
            }

            $res = $connection->query("INSERT INTO usersData (name,email,password) VALUES ('$name','$email','$password')");

            if ($res !== TRUE) {
                echo "
                <div class='test' >
                <h1>😵‍💫</h1>
                 <p>Something Went Wrong</p>  
                 <a href='javascript: history.back()'>
                 <i class='fa-solid fa-back'></i>
                 Go back</a>
                 </div> ";
                return;
            } else {

                $_SESSION["name"] = $name;
                $_SESSION["email"] = $email;
                $_SESSION["role"] = "user";

                echo "
                <div class='test' >
                <h1>✅</h1>
                 <p>Account Created</p>  
                 <script type='text/javascript'>
                 setTimeout(()=>{
                     window.location.pathname = '/gtour/';
                 },700);     
           
         </script>
        
                 </div>
                ";
            }
        }

        function login($name, $email, $password, $connection)
        {

            if (trim($email) == '' || trim($password) == '') {
                echo "
                <div class='test' >
                <h1>😵‍💫</h1>
                 <p>Invalid Data Entries</p>  
                 <a href='javascript: history.back()'>
                 <i class='fa-solid fa-back'></i>

                 Go back</a>
                 </div>
                 ";
                return;
            }


            $existance = $connection->query("SELECT * FROM usersData");

            if ($existance->num_rows > 0) {
                while ($row = $existance->fetch_assoc()) {
                    if ($row['email'] == $email) {

                        $_SESSION["name"] = $row["name"];
                        $_SESSION["email"] = $row["email"];
                        $_SESSION["role"] = $row["role"];


                        echo "
                            <div class='test' >
                            <h1>✅</h1>
                             <p>Logged in!</p>
                             </div>
                            <script type='text/javascript'>
                                setTimeout(()=>{
                                    window.location.pathname = '/gtour/';
                                },700);     
                            </script>
                            ";
                        return;
                    }
                }
            }



        }
        function logout()
        {
            session_destroy();

            echo "
            <div class='test' >
            <h1>✅</h1>
             <p>Logged out!</p>  
             </div>
            <script type='text/javascript'>
                    setTimeout(()=>{
                        window.location.pathname = '/gtour/';
                    },700);     
              
            </script>
            ";
        }

        ?>
    </div>

</body>

</html>