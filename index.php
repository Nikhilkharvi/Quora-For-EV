<?php

include 'config.php';

session_start();

if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $password=$_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username' AND password ='$password'";
    $result = mysqli_query($conn, $sql);
    if($result->num_rows > 0){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location: home.php");
    }
    else{
        echo "<script>alert('Woops! Username or Password is wrong.')</script>";
        header("refresh: 0.01; url=index.php");
    }
}
?>



<!DOCTYPE html>
<html>
    <head>
        <title>LOGIN PAGE</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="login.css">
    </head>
    <body>
        <center>
        <div class="Login">
            <h3>LOGIN HERE</h3>
            <form action=" " method="POST">
                <table>
                    <tr>
                        <td>Username:</td>
                        <td>
                            <input type="text" name="username" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td>
                            <input type="password" name="password" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="submit" value="Login">
                        </td>
                        <td>
                            Not yet a Member?<a href="signin.php">Register</a>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        </center>
    </body>
</html>