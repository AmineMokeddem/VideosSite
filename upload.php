<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Video</title>
    <link rel="stylesheet" href="Font/Cairo.ttf"/>
    <link rel="stylesheet" href="CSS/style.css"/>
</head>
<body>
    <div class="container">
        <div class="upload-content">
            <center>
                <img src="Images/logo.png" alt="logo of website" class="logo">
            </center>
            <div class="upload-infos">
                <form method="POST" enctype="multipart/form-data">
                    <input type="file" name="file"/>
                    <input type="text" name="title" id="title" placeholder="Enter your title"/>
                    <input type="text" name="description" id="description" placeholder="Enter your description"/>
                    <input type="submit" value="upload video" name='upload'/>
                </form>
            </div>
            <a href="index.php">Go to App</a>
        </div>
    </div>
    <?php
        include("config.php");
        if(isset($_POST['upload'])){
            $title = $_POST['title'];
            $description = $_POST['description'];
            $videoFileName = $_FILES['file']['name'];
            $videoFileSize = $_FILES['file']['size'];
            $videoFileFormat = pathinfo($videoFileName,PATHINFO_EXTENSION);
            $extensionsVideo = array("mp4",'3gp','gpeg','avi');
            $maxsize = 10485760;
            if($title!='' && $description!='' && $videoFileName!=''){
                if($videoFileSize > $maxsize){
                    echo "<center class ='wrong-text'><h3>Video Up To 10MB !</h3></center>";
                }
                else{
                    if(in_array($videoFileFormat,$extensionsVideo)){
                            try{
                                $query = $pdo->prepare("INSERT INTO videos 
                                                        (name,location,title,subject)
                                                    VALUES
                                                        (:name,:location,:title,:subject);");
                                $query->execute(array(
                                    ":name"=>$videoFileName,
                                    ":location"=> "Videos/".$title.".mp4",
                                    ":title"=>$title,
                                    ":subject"=>$description
                                ));
                                move_uploaded_file($_FILES['file']['tmp_name'],"Videos/".$title.".mp4");
                                echo "<center class ='succeed'><h3>Video Uploaded</h3></center>";
                            }
                            catch(PDOException $e){
                                if(str_contains($e->getMessage(),"Duplicate entry")){
                                    echo "<center class ='wrong-text'><h3>Change the title of the video please !</h3></center>";
                                }
                            }
                            
                            
                    }
                    else
                    echo "<center class ='wrong-text'><h3>Format video not accepted!</h3></center>";
                }
            }
            else
                echo "<center class ='wrong-text'><h3>You need some information!</h3></center>";
        }   
    ?>
</body>
</html>