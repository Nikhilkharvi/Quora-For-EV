<?php

include 'config.php';

error_reporting(0);

if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $confirmpass=$_POST['confirmpass'];
    $gender=$_POST['Gender'];
    $phone=$_POST['phonenumber'];
    $email=$_POST['email'];

    if($password == $confirmpass){
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($conn, $sql);

        if(!$result->num_rows > 0){
            $sql = "INSERT INTO users (username, password, confirmpass, gender, phone, email) VALUES('$username', '$password', '$confirmpass', '$gender', '$phone', '$email')";
            $result = mysqli_query($conn, $sql);
            if($result){
                echo "<script>alert('User registration Successfull.')</script>";
                $username= "";
                $_POST['password'] = "";
                $_POST['confirmpass'] = "";
                $gender= "";
                $phone= "";
                $email= "";
            }
            else{
                echo "<script>alert('Woops! Something went wrong.')</script>";
                header("refresh: 0.01; url=signin.php");
            }
        }
        else{
            echo "<script>alert('Woops! Username Already Exist.')</script>";
            header("refresh: 0.01; url=signin.php");
        }
    }
    else{
        echo "<script>alert('Password Not Matched.')</script>";
        header("refresh: 0.01; url=signin.php");
    }
}
?>



<!DOCTYPE html>
<html>
    <head>
        <title>SIGN IN</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="signin.css">
    </head>
    <body>
        <h1>QUORA FOR EV</h1>
        <center>
        <div class="Register">
            <img src="Image/user.png">
            <h3>REGISTER HERE</h3>
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
                        <td>Confirm Password:</td>
                        <td>
                            <input type="password" name="confirmpass" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Gender:</td>
                        <td>
                            <input type="radio" name="Gender" value="m" required>Male
                            <input type="radio" name="Gender" value="f" required>Female
                        </td>
                    </tr>
                    <tr>
                        <td>Phone:</td>
                        <td>
                            <input type="text" name="phonenumber" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td>
                            <input type="email" name="email" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="submit" value="Submit">
                        </td>
                        <td>
                            Already Member?<a href="index.php">Login</a>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="brands">
            <table>
                <tr>
                    <td><img src="Image/dell.jpg"></td>
                    <td><img src="Image/samsung.jpg"></td>
                    <td><img src="Image/nikon.jpg"></td>
                    <td><img src="Image/panasonic.jpg"></td>
                    <td><img src="Image/sony.jpg"></td>
                    <td><img src="Image/canon.jpg"></td>
                    <td><img src="Image/nokia.jpg"></td>
                    <td><img src="Image/lenovo.jpg"></td>
                </tr>
            </table>
        </div>
        </center>
    </body>
</html>