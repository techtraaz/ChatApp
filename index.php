<?php

    include 'connector.php';

    if(isset($_POST['login-submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

       $loginq = "SELECT * FROM users";
       $results = $conncetion->query($loginq);
       while($row = $results->fetch_assoc()){
        if(($row['username']==$username)&&($row['password']==$password)){
            // echo "login success";
            session_start();
            $_SESSION['userid'] = $row['uid'];
            header("location:chathome.php");
            break;
        }
        else{
            echo "login failed";
        }
       }
    }


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
        *{
            color: blue;
        }
        body{
            background-color: black;
        }
        #login{
            width: 400px;
            height: 400px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            border: 2px solid grey;
            border-radius: 10px;
            box-shadow: 10px 10px 10px #888888;
            color:beige;
        }
    </style>
</head>
<body>

    <div id="login">

        <form action="index.php" method="post">
            <label for="username">Username : </label>
            <input type="text" name="username" required><br><br>

            <label for="password"> Password : </label>
            <input type="text" name="password" required><br>
            <button type="submit" name="login-submit">Login</button>
        </form>

        
    </div>
    
</body>
</html>