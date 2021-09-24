<?php

error_reporting(0);

$question = $_POST['question'];
$conn = new mysqli('localhost','root','','login_shopping');
if($conn->connect_error)
{
    die('Connection Failed :'.$conn->connect_error);
}
else{
    $stmt = $conn->prepare("insert into postq(question) values(?)");
    $stmt->bind_param("s",$question);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>POST YOUR QUESTIONS</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="postq.css">
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
        <div class="contact-box">
            <div class="contact-left">
                <h3>Type your question here</h3>
                <form action=" " method="POST">
                <form>
                    <textarea rows="5" name="question" minlength=10 maxlength=100 required ></textarea>
                  
                    <button type="submit">Send</button>
                </form>
                </form>
            </div>
        </div>
    </body>
</html>