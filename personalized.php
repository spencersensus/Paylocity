<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/personalized.css">
</head>

<?php
session_start();
require "printElement.php";
require_once "retrieve.php";
require "insert.php";

?>

    <body>
        <!-- personalized.php is exactly the same as index.php but instead I have replaced all the meat of the page with 
    the information provided in the creationPage.php. If you are confused about some of the divs please refer to the
    index.php comments -->
        <div class="container-fluid" id="bioContainer">
            <!--links to home and account -->
            <div class="headerRow">
                <a href="Account.php" class="nameLink">Name</a>
                <a href="index.php" class="homeLink">Home</a>
            </div>
            <div class="row-lg-12">
                <div class="col-lg-4 col-lg-offset-1 col-md-2 col-sm-2" id="picture">
                    <img src="retrieveImage.php?id=1" class="img-circle" id="profilePicture">
                </div>
                <!-- name and bio -->
                <div class="col-lg-7" id="bio">
                    <h1 class="name">
                        <?php printAboutInfo('name'); ?>
                    </h1>
                    <p>Hi There!</br>
                        <?php printAboutInfo('bio'); ?>
                        </br>
                        Thank you!
                    </p>
                    <div class="col-lg-2 col-lg-offset-1 col-md-1 col-sm-1" id="bio">
                        <a href="https://www.linkedin.com/in/spencer-woods-077978138">
                            <img src="images/linkdln.png" id="icons"> </a>
                    </div>
                    <div class="col-lg-2 col-lg-offset-1 col-md-1 col-sm-1" id="bio">
                        <a href="Resume-Spencer Woods.doc.pdf">
                            <img src="images/folder.png" id="icons">
                        </a>
                    </div>
                    <div class="col-lg-2 col-lg-offset-1 col-md-1 col-sm-1" id="bio">
                        <a href="https://www.facebook.com/spencer.j.woods.1">
                            <img src="images/facebook.png" id="icons"> </a>
                    </div>
                </div>
            </div>
        </div>
        <ul class="nav nav-tabs">
            <li class="active">
                <a data-toggle="tab" href="#home">Skills</a>
            </li>
            <li>
                <a data-toggle="tab" href="#skillTab">Experience</a>
            </li>
            <li>
                <a data-toggle="tab" href="#porfolioTab">Portfolio</a>
            </li>
            <li>
                <a data-toggle="tab" href="#contactTab">Contact</a>
            </li>
        </ul>
        <div class="tab-content col-lg-12">
            <div id="home" class="tab-pane fade in active col-lg-12">
                <div class="CS col-lg-6">
                    <h1>Computer Science</h1>
                    <?php
                $result = retrieveSkillsInfo('*');
                $length = 0;
                $count = 0;
                    foreach($result as $skill){
                        $length++;
                    }
                foreach($result as $skill){
                    if($count < ($length/2)){
                        echo '<h3>';
                        echo $skill['skill'] . '</br>';
                        echo '</h3>';
                        echo '<p>';
                        echo $skill['creationSkill'] . '</br>';
                        echo '</p>';
                        $count++;
                    }
                    else{
                        $count++;
                    }
                    }
                ?>

                </div>
                <div class="sales col-lg-6">
                    <h1>Sales/Business</h1>
                    <?php
                    $result = retrieveSkillsInfo('*');
                    $length = 0;
                    $count = 0;
                    foreach($result as $skill){
                        $length++;
                    }
                    foreach($result as $skill){
                        if($count >= ($length/2)){                    
                            echo '<h3>';
                            echo $skill['skill'] . '</br>';
                            echo '</h3>';
                            echo '<p>';
                            echo $skill['creationSkill'] . '</br>';
                            echo '</p>';
                            $count++;                 
                        }
                        else{
                            $count++;
                        }
                    }
                ?>
                </div>
            </div>
            <div id="skillTab" class="tab-pane fade">
                <div class=" info col-lg-6">
                    <h1>Experience</h1>

                    <?php
                $result = retrieveWorkHistoryInfo('*');
                $length = 0;
                $count = 0;
                    foreach($result as $skill){
                        $length++;
                    }
                foreach($result as $history){
                    if($count < $length){
                        echo '<h3>';
                        echo $history['company'] . '</br>';
                        echo '</h3>';
                        echo '<p>';
                        echo $history['workDescription'] . '</br>';
                        echo '</p>';
                        $count++;
                    }
                    else{
                        $count++;
                    }
                    }
                ?>
                </div>
                <div class=" info col-lg-6">
                    <h1>Contact Information</h1>

                    <?php
                $result = retrieveWorkHistoryInfo('*');
                $length = 0;
                $count = 0;
                    foreach($result as $skill){
                        $length++;
                    }
                foreach($result as $contact){
                    if($count < $length){
                        echo '<div class = "col-lg-6">';
                        echo '<h4>';
                        echo $contact['company'] . '</br>';
                        echo '</h4>';
                        echo '<p>';
                        echo 'Address ' . $history['address'] . ',' . $history['city'] . ',' .$history['state'] . $history['zip'] .'</br>';
                        echo '</p>';
                        echo '<p>';
                        echo 'phone: ' . $history['phone'] . '</br';
                        echo '</p>';
                        echo '</div>';
                        $count++;
                    }
                    else{
                        $count++;
                    }
                    }
                    if($count % 2 != 0){
                        echo '<div class = "col-lg-6">';
                        echo '<h4>';
                        echo $contact['company'] . '</br>';
                        echo '</h4>';
                        echo '<p>';
                        echo 'Address ' . $history['address'] . ',' . $history['city'] . ',' .$history['state'] . $history['zip'] .'</br>';
                        echo '</p>';
                        echo '<p>';
                        echo 'phone: ' . $history['phone'] . '</br';
                        echo '</p>';
                        echo '</div>';
                    }
                ?>

                        <h1>References</h1>
                        <div class="col-lg-12" id="reference" style="padding-left:0px">
                            <?php
                $result = retrieveReferenceInfo('*');
                $length = 0;
                $count = 0;
                    foreach($result as $skill){
                        $length++;
                    }
                foreach($result as $reference){
                    if($count < $length){
                        echo '<div class = "col-lg-6 id ="ref">';
                        echo '<h4>';
                        echo $reference['referenceName'] . '</br>';
                        echo '</h4>';
                        echo '<p>';
                        echo 'Email' . $reference['referenceEmail'] . '</br>';
                        echo '</p>';
                        echo '<p>';
                        echo 'phone:' . $reference['referencePhone'] . '</br';
                        echo '</p>';
                        echo '<p>';
                        echo 'Relationship' . $reference['referenceRelationship'] . '</br>';
                        echo '</p>';
                        echo '</div>';
                        $count++;
                    }
                    else{
                        $count++;
                    }
                    }
                    if($count % 2 != 0){
                        echo '<div class = "col-lg-6 id="ref">';
                        echo '<h4>';
                        echo $reference['referenceName'] . '</br>';
                        echo '</h4>';
                        echo '<p>';
                        echo 'Email' . $reference['referenceEmail'] . '</br>';
                        echo '</p>';
                        echo '<p>';
                        echo 'phone:' . $reference['referencePhone'] . '</br';
                        echo '</p>';
                        echo '<p>';
                        echo 'Relationship' . $reference['referenceRelationship'] . '</br>';
                        echo '</p>';
                        echo '</div>';
                    }
                ?>
                        </div>
                </div>
            </div>
            <div id="porfolioTab" class="tab-pane fade">
                <div class="col-lg-6">
                    <h1>portfolio</h1>
                    <?php
                $result = retrievePorfolioInfo('*');
                $length = 0;
                $count = 0;
                    foreach($result as $porf){
                        $length++;
                    }
                foreach($result as $porf){
                    if($count <= ($length/2)){
                        echo '<h3>';
                        echo $porf['language'] . '</br>';
                        echo '</h3>';
                        echo '<p>';
                        echo '<a href =' . $porf['projectLink'] . '>' . $porf['project'] . '</a>' .'</br>' ;
                        echo '</p>';
                        echo '<p>';
                        echo $porf['description'] . '</br';
                        echo '</p>';
                        $count++;
                    }
                    else{
                        $count++;
                    }
                }
                ?>
                </div>
                <div class="col-lg-6">
                    </br>
                    </br>
                    </br>
                    <?php
                $result = retrievePorfolioInfo('*');
                $length = 0;
                $count = 0;
                    foreach($result as $porf){
                        $length++;
                    }
                foreach($result as $porf){
                    if($count > ($length/2)){
                        echo '<h3>';
                        echo $porf['language'] . '</br>';
                        echo '</h3>';
                        echo '<p>';
                        echo "<a href='".$porf['projectLink']."'>".$porf['project']."</a>" . '</br>';
                        echo '</p>';
                        echo '<p>';
                        echo $porf['description'] . '</br';
                        echo '</p>';
                        $count++;
                    }
                    else{
                        $count++;
                    }
                }
                ?>
                </div>
            </div>
            <div id="contactTab" class="tab-pane fade">
                <h1>Contact</h1>
                <?php
            

            ?>
                    <p>Phone:
                        <?php printAboutInfo('phone');?>
                    </p>
                    <p>Address:4909 N Elsinore Ave. Meridian, ID. 83646</p>
                    <p>Email:
                        <?php printAboutInfo('email');?>
                    </p>
            </div>
        </div>
    </body>
    <script>
        var ImageURL = 'retrieveImage.php?';
        var data = 'id=' + id;
        $(document).ready(function () {
            console.log("HERE", ImageURL + data);
            $("#profilePicture").attr('src', ImageURL + data);
            $("#picture").attr('src', ImageURL + data);
        });
    </script>

</html>