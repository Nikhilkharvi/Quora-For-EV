<?php
error_reporting(0);
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

//Databse connection
$conn = new mysqli('localhost','root','','login_shopping');
if($conn->connect_error)
{
    die('Connection Failed :'.$conn->connect_error);
}
else{
    $stmt = $conn->prepare("insert into contact(name,phone,email,subject,message) values(?,?,?,?,?)");
    $stmt->bind_param("sisss",$name,$phone,$email,$subject,$message);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>CONTACT US</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="contact.css">
    </head>
    <body>
        <div class="Navigation">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="postq.php">Post Questions</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
        <div class="container">
            <h2>Connect with us</h2>
            <p>We would love to respond to your queries and help you succed. Feel free to get in touch with us.</p>
        </div>
        <div class="contact-box">
            <div class="contact-left">
                <h3>Send your request</h3>
                <form action=" " method="POST">
                <form>
                    <div class="input-row">
                        <div class="input-group">
                            <label>Name</label>
                            <input type="text" placeholder="Nikhil" name="name">
                        </div>
                        <div class="input-group">
                            <label>Phone</label>
                            <input type="text" placeholder="+91 9000000000" name="phone">
                        </div>
                    </div>
                    <div class="input-row">
                        <div class="input-group">
                            <label>Email</label>
                            <input type="email" placeholder="nikhilkharvi199@gmail.com" name="email">
                        </div>
                        <div class="input-group">
                            <label>Subject</label>
                            <input type="text" placeholder="Subject" name="subject">
                        </div>
                    </div>
                    <label>Message</label>
                    <textarea rows="5" name="message" minlength="10" maxlength="1000" required></textarea>
                    <button type="submit">Send</button>
                </form>
            </form>
            </div>
            <div class="contact-right">
                <h3>Reach Us</h3>
                <table>
                    <tr>
                        <td>Email</td>
                        <td>nikhilkharvi199@gmail.com</td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>+91 90000 00000</td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>#123, First floor,<br> 7th cross, Junior boys hostel,<br> Vk road, Bengaluru 560001</td>
                    </tr>
                </table>
            </div>
        </div>
    </body>
</html>