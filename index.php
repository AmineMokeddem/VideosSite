<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videos</title>
    <link rel="stylesheet" href="Font/Cairo.ttf"/>
    <link rel="stylesheet" href="CSS/style.css"/>
</head>
<body>

    <div class="videos-app">
        <?php
            include("config.php");
            $query = $pdo->prepare("SELECT * FROM videos");
            $query->execute();
            while($row = $query->fetchObject()){
                $videoFileLocation = $row->location;
                $title = $row->title;
                $subject = $row->subject;

                echo "<section class='video'>";
                echo '<video src="'.$videoFileLocation.'" muted loop></video>';
                echo "<footer>";
                echo "<div class='footer-left'>";
                echo "<h3>Amine MM</h3>";
                echo "<p>".$title."</p>";
                echo "<div class='btn-marquee'>";
                echo "<img src='Images/up.png' class='upimg'/>";
                echo "<marquee>".$subject."</marquee>";
                echo "</div>";
                echo "</div>";
                echo "<div class='footer-right'>";
                echo "<img src='Images/play.png'/>";
                echo "</div>";
                echo "</footer>";
                echo "</section>";
            }
        ?>
    </div>

    <script src="JS/script.js"></script>
</body>
</html>