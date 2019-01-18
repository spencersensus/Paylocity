<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">
    <script src="js/jquery.payform.min.js" charset="utf-8"></script>
    <link rel="stylesheet" type="text/css" href="css/creationPage.css">


</head>
<?php 
session_start();
//If the user is done with the resume, then they will click on "create resume" button which will then set the bit value to
// 1 which means that they have succesfully created their own resume which will now be linked in the Account.php page.
if(isset($_POST['createResume'])){
    require_once "insert.php";
    $oldUser = $_SESSION['user'];
    $bit = "1";
    insertBitInfo($oldUser,$bit);
    }
//submits the information from the skill form to the db into the table 'Skills'.
if(isset($_POST['subSkill'])){
    require_once "insert.php";
    $oldUser = $_SESSION['user'];
    $count = 0;
    foreach($_POST["skill"] as $s){
    $tempSkill = $_POST["skill"][$count];
    $tempCreation = $_POST["creationSkill"][$count];
    insertSkillInfo($oldUser,$tempSkill,$tempCreation);
    $count++;
    }
}
//submits the information from the About form to the db into the table 'About'
if(isset($_POST['subPersonal'])){
    require_once "insert.php";
    echo "HERE";
    $oldUser = $_SESSION['user'];
    $name = $_POST["creationName"];
    $email = $_POST["creationEmail"];
    $phone = $_POST["creationPhone"];
    $bio = $_POST["creationBio"];
    $profilePicture = $_POST["profilePicture"];
    insertPersonalInfo($oldUser,$name,$email,$phone,$bio,$profilePicture);
}
//submits the information from the Company form to the db into the table 'WorkHistory'
if(isset($_POST['subCompany'])){
    require_once "insert.php";
    $oldUser = $_SESSION['user'];
    $count = 0;
    foreach($_POST["company"] as $comp){
    $company = $_POST["company"][$count];
    $phone = $_POST["phone"][$count];
    $City = $_POST["City"][$count];
    $Address = $_POST["Address"][$count];
    $State = $_POST["State"][$count];
    $zip = $_POST["zip"][$count];
    $workDescription = $_POST["workDescription"][$count];
    insertCompanyInfo($oldUser,$company,$phone,$City,$Address,$State,$zip,$workDescription);
    $count++;
    }
}
//submits the information form the Reference form to the db into the table 'References'
if(isset($_POST['subReference'])){
    require_once "insert.php";
    $oldUser = $_SESSION['user'];
    $count = 0;
    foreach($_POST["reference"] as $ref){
    $reference = $_POST["reference"][$count];
    $refPhone = $_POST["refPhone"][$count];
    $email = $_POST["email"][$count];
    $relationship = $_POST["relationship"][$count];
    insertReferenceInfo($oldUser,$reference,$refPhone,$email,$relationship);
    $count++;
    }
}
//submits the information from the Porfolio form to the db into the table 'Porfolio'
if(isset($_POST['subPorf'])){
    require_once "insert.php";
    $oldUser = $_SESSION['user'];
    $count = 0;
    foreach($_POST["language"] as $lang){
    $language = $_POST["language"][$count];
    $project = $_POST["project"][$count];
    $description = $_POST["description"][$count];
    $link = $_POST["link"][$count];
    insertPorfInfo($oldUser,$language,$project,$description,$link);
    $count++;
    }
}

?>

<body>
    <!-- outside container -->
    <div class="container-fluid" id="#bioContainer2">
        <!-- inner container -->
        <div class="innerContainer col-lg-8 col-lg-offset-2">
            <div class="col-lg-12">
                <h1 class="createTitle">Create Your Resume</h1>
            </div>
            <div class = "col-lg-12">
            <h2>About You </h2>
            </div>
            <div class="col-lg-12" id="aboutForm">
                <form method="post" target="frame" class="needs-validation">
                    <!-- about you -->
                    <div class="form-group col-md-6 col-lg-6">
                        <label for="creationName">Name</label>
                        <input type="text" name="creationName" id="name" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6 col-lg-6">
                        <label for="creationEmail">Email</label>
                        <input type="text" name="creationEmail" id="email" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6 col-lg-6">
                        <label for="creationPhone">Phone</label>
                        <input type="text" name="creationPhone" id="phone" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6 col-lg-6">
                        <label for="creationBio">Short Biography</label>
                        <textarea name="creationBio" id="bio" class="form-control" required></textarea>
                    </div>
                    <div class="form-group col-md-612 col-lg-12">
                        <label for="profilePicture">Profile Picture URL</label>
                        <input type="text" name="profilePicture" id="profilePicture" class="form-control" required>
                    </div>
                    <button type="submit" name="subPersonal" value="submit" id="subPersonal" class="btn btn-primary">Next</button>
                    <button type="button" id="skipPers" class="btn btn-primary">Skip</button>
                </form>
            </div>
            <!-- end about you -->
            <!-- start skill forms -->
            <div class = "col-lg-12" id = "aboutSkills">
            <h2>Skills</h2>
            </div>
            <div class="col-lg-12" id="skillForm">
                <form method="post" target="frame" class = "needs-validation">
                    <div class="innerSkillContainer col-lg-12">
                        <div class="form-group col-md-3 col-lg-3">
                            <label for="Skill">Skill</label>
                            <input type="text" name="skill[]" class="form-control" required>
                        </div>
                        <div class="form-group col-md-9 col-lg-9">
                            <label for="inputSkill">Skill Explanation</label>
                            <textarea name="creationSkill[]" class="form-control" required></textarea>
                        </div>
                    </div>
                    <button type="button" name="addRow" id="addSkillRow" class="btn btn-primary">Add</button>
                    <button type="submit" name="subSkill" id="subSkill" class="btn btn-primary">Next</button>
                    <button type="button" id="skipSkill" class="btn btn-primary">Skip</button>
                </form>
            </div>
            <!-- end skill forms -->

            <!-- start company form 1 -->
            <div class = "col-lg-12" id = "aboutCompany">
            <h2>Work Experience</h2>
            </div>
            <div class="col-lg-12" id="companyForm">
                <form method="post" target="frame" class="needs-validation">
                    <div class="innerCompanyContainer col-lg-12">
                        <div class="form-group col-md-12 col-lg-12">
                            <label for="Company">Company</label>
                            <input type="text" name="company[]" class="form-control" required>
                        </div>
                        <div class="form-group col-md-12 col-lg-12">
                            <label for="PhoneNumber">Phone Number</label>
                            <input type="text" name="phone[]" class="form-control" required>
                        </div>
                        <div class="form-group col-md-12 col-lg-12">
                            <label for="Address">Address</label>
                            <input type="text" name="Address[]" class="form-control" required>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-lg-6">
                                <label for="inputCity">City</label>
                                <input type="text" name="City[]" class="form-control" id="inputCity" required>
                            </div>
                            <div class="form-group col-md-4 col-lg-4">
                                <label for="inputState">State</label>
                                <select name="State[]" id="inputState" class="form-control">
                                    <option selected>Choose...</option>
                                    <option value="AL">Alabama</option>
                                    <option value="AK">Alaska</option>
                                    <option value="AZ">Arizona</option>
                                    <option value="AR">Arkansas</option>
                                    <option value="CA">California</option>
                                    <option value="CO">Colorado</option>
                                    <option value="CT">Connecticut</option>
                                    <option value="DE">Delaware</option>
                                    <option value="DC">District Of Columbia</option>
                                    <option value="FL">Florida</option>
                                    <option value="GA">Georgia</option>
                                    <option value="HI">Hawaii</option>
                                    <option value="ID">Idaho</option>
                                    <option value="IL">Illinois</option>
                                    <option value="IN">Indiana</option>
                                    <option value="IA">Iowa</option>
                                    <option value="KS">Kansas</option>
                                    <option value="KY">Kentucky</option>
                                    <option value="LA">Louisiana</option>
                                    <option value="ME">Maine</option>
                                    <option value="MD">Maryland</option>
                                    <option value="MA">Massachusetts</option>
                                    <option value="MI">Michigan</option>
                                    <option value="MN">Minnesota</option>
                                    <option value="MS">Mississippi</option>
                                    <option value="MO">Missouri</option>
                                    <option value="MT">Montana</option>
                                    <option value="NE">Nebraska</option>
                                    <option value="NV">Nevada</option>
                                    <option value="NH">New Hampshire</option>
                                    <option value="NJ">New Jersey</option>
                                    <option value="NM">New Mexico</option>
                                    <option value="NY">New York</option>
                                    <option value="NC">North Carolina</option>
                                    <option value="ND">North Dakota</option>
                                    <option value="OH">Ohio</option>
                                    <option value="OK">Oklahoma</option>
                                    <option value="OR">Oregon</option>
                                    <option value="PA">Pennsylvania</option>
                                    <option value="RI">Rhode Island</option>
                                    <option value="SC">South Carolina</option>
                                    <option value="SD">South Dakota</option>
                                    <option value="TN">Tennessee</option>
                                    <option value="TX">Texas</option>
                                    <option value="UT">Utah</option>
                                    <option value="VT">Vermont</option>
                                    <option value="VA">Virginia</option>
                                    <option value="WA">Washington</option>
                                    <option value="WV">West Virginia</option>
                                    <option value="WI">Wisconsin</option>
                                    <option value="WY">Wyoming</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputZip">Zip</label>
                                <input type="text" name="zip[]" class="form-control" id="inputZip" required>
                            </div>
                            <div class="form-group col-md-12 col-lg-12">
                                <label for="workDescription">Work Description</label>
                                <textarea name="workDescription[]" class="form-control" required></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="button" name="addRow" id="addCompanyRow" class="btn btn-primary">Add</button>
                    <button type="submit" name="subCompany" id="subCompany" class="btn btn-primary">Next</button>
                    <button type="button" id="skipCompany" class="btn btn-primary">Skip</button>
                </form>
            </div>
            <!-- end company form 1 -->

            <!-- start references 1 -->
            <div class = "col-lg-12" id = "aboutReference">
            <h2>References</h2>
            </div>
            <div class="col-lg-12" id="referenceForm">
                <form method="post" target="frame" class="needs-validation">
                    <div class="innerReferenceContainer col-lg-12">
                        <div class="form-group col-md-6 col-lg-6">
                            <label for="Reference">Reference Name</label>
                            <input type="text" name="reference[]" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6 col-lg-6">
                            <label for="PhoneNumber">Phone Number</label>
                            <input type="text" name="refPhone[]" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6 col-lg-6">
                            <label for="Email">Email</label>
                            <input type="text" name="email[]" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6 col-lg-6">
                            <label for="Relationship">Relationship</label>
                            <input type="text" name="relationship[]" class="form-control" required>
                        </div>
                    </div>
                    <button type="button" name="addRow" id="addReferenceRow" class="btn btn-primary">Add</button>
                    <button type="submit" name="subReference" id="subReference" class="btn btn-primary">Next</button>
                    <button type="button" id="skipRef" class="btn btn-primary">Skip</button>
                </form>
            </div>
            <!-- end references 1 -->

            <!-- start porfolio -->
            <div class = "col-lg-12" id = "aboutProjects">
            <h2>Projects</h2>
            </div>
            <div class="col-lg-12" id="porfolioForm">
                <form method="post" target="frame" class="needs-validation" required>
                    <div class="innerPorfolioContainer col-lg-12">
                        <div class="form-group col-md-3 col-lg-3">
                            <label for="Language">Language</label>
                            <input type="text" name="language[]" class="form-control" required>
                        </div>
                        <div class="form-group col-md-3 col-lg-3">
                            <label for="Project">Project</label>
                            <input type="text" name="project[]" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6 col-lg-6">
                            <label for="Description">Description</label>
                            <textarea name="description[]" class="form-control" required></textarea>
                        </div>
                        <div class="form-group col-md-12 col-lg-12">
                            <label for="ProjectLink">Project Link</label>
                            <textarea name="link[]" class="form-control" required></textarea>
                        </div>
                    </div>
                    <button type="button" name="addRow" id="addPorfolioRow" class="btn btn-primary">Add</button>
                    <button type="submit" name="subPorf" id="subPorf" class="btn btn-primary">Next</button>
                    <button type="button" id="skipPorf" class="btn btn-primary">Skip</button>
                </form>
            </div>
            <!-- end porfolio -->
            <form action="personalized.php" method="post" class="subButton">
                <button type="submit" name="createResume" id="submitButton" class="btn btn-primary">Create Resume</button>
            </form>
        </div>
    </div>
</body>
<script>

    // function to stop the submission of forms without all required fields being filled.
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        else{
            if( $("#aboutForm").css('display') == 'block'){
                $("#aboutForm").hide();
                $("#skillForm").show();
            }
            else if( $("#skillForm").css('display') == 'block'){
                $("#skillForm").hide();
                $("#companyForm").show();
            }
            else if( $("#companyForm").css('display') == 'block'){
                $("#companyForm").hide();
                $("#referenceForm").show();
            }
            else if( $("#referenceForm").css('display') == 'block'){
                $("#referenceForm").hide();
                $("#porfolioForm").show();
            }
            else if( $("#PorfForm").css('display') == 'block'){
                $("#porfolioForm").hide();
            }
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
    //The add___ functions add another replica form to the end of the previous form. This is good for allowing the
    //user to input multiple entries at once.
    $("#addSkillRow").click(function () {
        $(".innerSkillContainer").append('<div class="form-group col-md-3 col-lg-3"><label for="Username">Skill</label><input type="text" name="skill[]" class="form-control"></div><div class="form-group col-md-9 col-lg-9"><label for="inputAddress">Skill Explanation</label><textarea name="creationSkill[]" class="form-control"></textarea></div>');

    });
    $("#addCompanyRow").click(function () {
        $(".innerCompanyContainer").append('<div class="form-group col-md-12 col-lg-12"> <label for="Company">Company</label> <input type="text" name="company[]" class="form-control"> </div> <div class="form-group col-md-12 col-lg-12"> <label for="PhoneNumber">Phone Number</label> <input type="text" name="phone[]" class="form-control"> </div> <div class="form-group col-md-12 col-lg-12"> <label for="Address">Address</label> <input type="text" name="Address[]" class="form-control"> </div> <div class="form-row"> <div class="form-group col-md-6 col-lg-6"> <label for="inputCity">City</label> <input type="text" name="City[]" class="form-control" id="inputCity"> </div> <div class="form-group col-md-4 col-lg-4"> <label for="inputState">State</label> <select name="State[]" id="inputState" class="form-control"> <option selected>Choose...</option> <option value="AL">Alabama</option> <option value="AK">Alaska</option> <option value="AZ">Arizona</option> <option value="AR">Arkansas</option> <option value="CA">California</option> <option value="CO">Colorado</option> <option value="CT">Connecticut</option> <option value="DE">Delaware</option> <option value="DC">District Of Columbia</option> <option value="FL">Florida</option> <option value="GA">Georgia</option> <option value="HI">Hawaii</option> <option value="ID">Idaho</option> <option value="IL">Illinois</option> <option value="IN">Indiana</option> <option value="IA">Iowa</option> <option value="KS">Kansas</option> <option value="KY">Kentucky</option> <option value="LA">Louisiana</option> <option value="ME">Maine</option> <option value="MD">Maryland</option> <option value="MA">Massachusetts</option> <option value="MI">Michigan</option> <option value="MN">Minnesota</option> <option value="MS">Mississippi</option> <option value="MO">Missouri</option> <option value="MT">Montana</option> <option value="NE">Nebraska</option> <option value="NV">Nevada</option> <option value="NH">New Hampshire</option> <option value="NJ">New Jersey</option> <option value="NM">New Mexico</option> <option value="NY">New York</option> <option value="NC">North Carolina</option> <option value="ND">North Dakota</option> <option value="OH">Ohio</option> <option value="OK">Oklahoma</option> <option value="OR">Oregon</option> <option value="PA">Pennsylvania</option> <option value="RI">Rhode Island</option> <option value="SC">South Carolina</option> <option value="SD">South Dakota</option> <option value="TN">Tennessee</option> <option value="TX">Texas</option> <option value="UT">Utah</option> <option value="VT">Vermont</option> <option value="VA">Virginia</option> <option value="WA">Washington</option> <option value="WV">West Virginia</option> <option value="WI">Wisconsin</option> <option value="WY">Wyoming</option> </select> </div> <div class="form-group col-md-2"> <label for="inputZip">Zip</label> <input type="text" name="zip[]" class="form-control" id="inputZip"><div class="form-group col-md-12 col-lg-12"><label for="workDescription">Work Description</label><textarea name="workDescription[]" class="form-control"></textarea></div> </div> </div>');
    });

    $("#addReferenceRow").click(function () {
        $(".innerReferenceContainer").append('<div class="form-group col-md-6 col-lg-6"> <label for="Reference">Reference Name</label> <input type="text" name="reference[]" class="form-control"> </div> <div class="form-group col-md-6 col-lg-6"> <label for="PhoneNumber">Phone Number</label> <input type="text" name="refPhone[]" class="form-control"> </div> <div class="form-group col-md-6 col-lg-6"> <label for="Email">Email</label> <input type="text" name="email[]" class="form-control"> </div> <div class="form-group col-md-6 col-lg-6"> <label for="Relationship">Relationship</label> <input type="text" name="relationship[]" class="form-control"> </div>');
    });
    $("#addPorfolioRow").click(function () {
        $(".innerPorfolioContainer").append('<div class="form-group col-md-3 col-lg-3"> <label for="Language">Language</label> <input type="text" name="language[]" class="form-control"> </div> <div class="form-group col-md-3 col-lg-3"> <label for="Project">Project</label> <input type="text" name="project[]" class="form-control"> </div> <div class="form-group col-md-6 col-lg-6"> <label for="Description">Description</label> <textarea name="description[]" class="form-control"></textarea> <div class="form-group col-md-12 col-lg-12"><label for="ProjectLink">Project Link</label><textarea name="link[]" class="form-control"></textarea></div></div>');
    });
    // the skip__ functions skip the form entirely. This allow the user to skip certain forms.
    $("#skipPers").click(function () {
        $("#aboutForm").hide();
        $("#skillForm").show();
    });

    $("#skipSkill").click(function () {
        $("#skillForm").hide();
        $("#companyForm").show();
    });
    $("#skipCompany").click(function () {
        $("#companyForm").hide();
        $("#referenceForm").show();
    });

    $("#skipRef").click(function () {
        $("#referenceForm").hide();
        $("#porfolioForm").show();
    });

    $("#skipPorf").click(function () {
        $("#porfolioForm").hide();
    });

</script>
<iframe name="frame"></iframe>

</html>