<?php

include 'config.php';
session_start();

    $sql = "SELECT * FROM postq";
    $result = $conn->query($sql);
    if($result->num_rows >= 0){
?>

<!DOCTYPE html>
<html>
    <head>
        <title>HOME PAGE</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="home.css">
    </head>
    <body>
        <h1>QUORA FOR EV</h1>
        <div class="Navigation">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="postq.php">Post Questions</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
        <marquee behavior="alternate" direction="right">
            <h2 style="color:yellow;"><?php echo "WELCOME  " . $_SESSION['username']; ?></h2>
        </marquee>
        <div class="replybox" style="text-align:left;">
        <?php
        while($row = $result->fetch_assoc()) {
        ?>
        <p style="color: white; font-size:large;"><?php echo $row['question'];
        ?>
        <table>
        <?php $query1= "SELECT * FROM reply where qid=$row[id]";
        $res1=mysqli_query($conn,$query1);
        if(mysqli_num_rows($res1)>0)
		{
			while ($row1=mysqli_fetch_assoc($res1)) {
			echo "<tr><td>".$row1["reply"]."</td><td> -".
			$row1["ratings"]."(ratings)</td></tr>"; 
			}
		}
        ?>
        </table>
        <form action="reply.php" method="POST" >
        <textarea style="width:800px; height:40px;" name="reply" id="" cols="30" rows="10" minlength=10 maxlength=10000 required ></textarea>
        <?php $variable=$row['id']; echo '<input type="hidden" name="qid" value="'.$variable.'"/>'; ?>
        <table>
            <tr>
                <td style="color:orange;">Your Ratings:</td>
                <td>
                    <input type="radio" name="check" value="1" required>1
                    <input type="radio" name="check" value="2">2
                    <input type="radio" name="check" value="3">3
                    <input type="radio" name="check" value="4">4
                    <input type="radio" name="check" value="5">5
                </td>
            </tr>
        </table>
        <br>
        <button type="submit" name="submit" style="margin-bottom:30px;">Submit</button>
        </form>
        </p>
        <?php }} ?>
        </div>
    </body>
</html>