<?php

    session_start();

    





?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
   
</head>
<body>

    <a href="index.php">Logout</a>
    
    <div id="chat_div">

   
    <?php

include 'connector.php';


$readq = "SELECT * FROM chats;";
$resuls = $conncetion->query($readq);
while($row = $resuls->fetch_assoc()){

    if($_SESSION['userid']==$row['sid']){
        echo "<div class='chat sender'>" .$row['chat'] ."</div>";
    }

    else{
        echo "<div class='chat receiver'>";
        echo "<p>Username : " .$row['sid'] ."<br>";
        echo $row['chat'];
        echo "</div>";
    }

    
}

?>



        
        
        
        
    </div>

    <div id="typehere">
        <form action="send.php" method="post">
            <textarea name="chat_input" id="typechat" placeholder="type here.........." required></textarea>
            <button type="submit" name="chat_submit">Send</button>
        </form>
    </div>


    <script src="script.js"></script>
</body>
</html>












