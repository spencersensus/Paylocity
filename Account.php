<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">
    <link rel="stylesheet" media="screen" type="text/css" href="css/colorpicker.css" />
    <script type="text/javascript" src="js/colorpicker.js"></script>
    <script src="js/script.js"></script>
    <script src="js/jquery.payform.min.js" charset="utf-8"></script>
    <link rel="stylesheet" type="text/css" href="css/Account.css">
    <link rel="stylesheet" type="text/css" href="css/demo.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<?php
session_start();
require "printElement.php";
require "insert.php";
//if the user updates their profile info then this piece of code will be activated
//This code will get the form data submitted and insert the information into the db along with a history log
if(isset($_POST['updateProfile'])){
    $oldUser = $_SESSION['user'];
    $user = $_POST["Username"];
    $_SESSION['user'] = $user;
    $pass = $_POST["Password"];
    $email = $_POST["Email"];
    $name = $_POST["fullName"];
    $phone = $_POST["phone"];
    $city = $_POST["City"];
    $address = $_POST["Address"];
    $state = $_POST["State"];
    $zip = $_POST["zip"];
    $comm = 'Updated Profile Info';
    $date = date("Y/m/d");
    insertHistory($oldUser,$comm,$date);
    insertProfileInfo($user,$pass,$email,$state,$zip,$city,$address,$oldUser,$phone,$name);
    password_hash($pass,PASSWORD_BCRYPT);
}

//if the user updates their billing info then this piece of code will be activated
//This code will get the form data submitted and insert the information into the db along with a history log
if(isset($_POST['updateBilling'])){
    $oldUser = $_SESSION['user'];
    $name = $_POST['nameOnCard'];
    $cardNumber = $_POST['cardNumber'];
    $code = $_POST['inputCode'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $expDate = $month . '/' . $year;
    $comm = 'Updated Billing Info';
    $date = date("Y/m/d");
    insertHistory($oldUser,$comm,$date);
    insertBillingInfo($oldUser,$name,$cardNumber,$code,$expDate);
}

//if the user updates their customization info then this piece of code will be activated
//This code will get the form data submitted and insert the information into the db along with a history log
if(isset($_POST['updateCustomization'])){
    $oldUser = $_SESSION['user'];
    $color = $_POST['color'];
    $font = $_POST['font'];
    $picture = $_POST['picture'];
    $_SESSION['backgroundColor'] = '#'. $color;
    $_SESSION['font'] = $font;
    $comm = 'Updated Background Color to ' . $color . ', font to ' . $font . ' and picture to ' . $picture;
    $date = date("Y/m/d");
    insertHistory($oldUser,$comm,$date);
    insertCustomizationInfo($oldUser,$color,$font,$picture);
}
        ?>

    <body>
        <!--start of html
            this code uses the bootstrap framework along with JQuery, php function calls and native css -->
        <div class="container-fluid" id="bioContainer">
            <div class="headerRow col-lg-12 col-lg-offset-9">
                <a href="index.php" class="nameLink">Home</a>
                <a href="#" class="logoutLink">Logout </a>
            </div>
            <div class="innerContainer col-lg-8 col-lg-offset-2">
                <div class="row">
                    <!-- profilePicture -->
                    <div class="profilePicture col-lg-4">
                        <img src="getImage.php?id=1" class="img-circle" id="profilePicture">
                    </div>
                    <!-- name -->
                    <div class="profileInfo col-lg-6 col-lg-offset-2">
                        <h1 class="nameTitle">Spencer Woods </h1>
                        <?php  
                        $result = retrievePersonalizedInfo('personalized'); 
                        foreach($result as $pers){
                            if($pers['personalized'] == "1"){
                                echo '<a href = personalized.php>Go To Resume</a>'.'</br>' ;
                            }
                        }
                        ?>
                        <a href=creationPage.php>Create New Resume</a>
                    </div>
                </div>
                <div class="row">
                    <!-- this form is hidden until 'edit' is clicked within the profile div. -->
                    <div class="col-lg-12" id="changeProfileInfo">
                        <form method="post">
                            <div class="form-row">
                                <div class="form-group col-md-6 col-lg-6">
                                    <label for="inputEmail4">Email</label>
                                    <input type="email" name="Email" class="form-control" id="inputEmail4" placeholder="Email">
                                </div>
                                <div class="form-group col-md-6 col-lg-6">
                                    <label for="inputPassword4">Password</label>
                                    <input type="password" name="Password" class="form-control" id="inputPassword4" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group col-md-12 col-lg-12">
                                <label for="Username">Username</label>
                                <input type="text" name="Username" class="form-control" id="Username" placeholder="Paylocity123">
                            </div>
                            <div class="form-group col-md-12 col-lg-12">
                                <label for="inputAddress">Address</label>
                                <input type="text" name="Address" class="form-control" id="inputAddress" placeholder="1234 Main St">
                            </div>
                            <div class="form-group col-md-12 col-lg-12">
                                <label for="FullName">Full Name</label>
                                <input type="text" name="fullName" class="form-control" id="Username" placeholder="John Smith">
                            </div>
                            <div class="form-group col-md-12 col-lg-12">
                                <label for="PhoneNumber">Phone Number</label>
                                <input type="text" name="phone" class="form-control" id="inputAddress" placeholder="555-555-555">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-lg-6">
                                    <label for="inputCity">City</label>
                                    <input type="text" name="City" class="form-control" id="inputCity">
                                </div>
                                <div class="form-group col-md-4 col-lg-4">
                                    <label for="inputState">State</label>
                                    <select name="State" id="inputState" class="form-control">
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
                                    <input type="text" name="zip" class="form-control" id="inputZip">
                                </div>
                            </div>
                            <button type="submit" name="updateProfile" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                    <!-- main profile div. is hidden when 'edit' is clicked and replaced with a form to change the contents
                    this section's data is connected to the db table "SignUp" -->
                    <div class="accountInfo col-lg-12">
                        <a href="#" data-toggle="collapse" data-target="#profile" id="accountPageTitles">Account</a>
                        <div id="profile" class="collapse in col-lg-12">
                            <div class="col-lg-3">
                                <h4>Full Name:</h4>
                                <h4>Username:</h4>
                                <h4>Phone Number: </h4>
                                <h4>Address:</h4>
                                <h4>Email:</h4>
                                <a href="#">
                                    <h4>Change password</h4>
                                </a>
                            </div>
                            <div class="col-lg-8">
                                <h4>
                                    <?php    
                                
                                printProfileInfo('name');
                                ?>
                                </h4>
                                <h4>
                                    <?php    
                                
                                printProfileInfo('userName');
                                ?>
                                </h4>
                                <h4>
                                    <?php    
                                
                                printProfileInfo('phone');
                                ?>
                                </h4>
                                <h4>
                                    <?php    
                                
                                printProfileInfo('Addr');
                                ?>
                                </h4>
                                <h4>
                                    <?php    
                        
                                printProfileInfo('email');
                                ?>
                                </h4>
                            </div>
                            <div class="col-lg-1">
                                <a href="#" id="editProfile">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- this form is hidden until 'editBilling' is clicked.  -->
                <div class="creditCardForm">
                    <div class="heading">
                        <h1>Billing Information</h1>
                    </div>
                    <div class="payment">
                        <form method="post">
                            <div class="form-group owner">
                                <label for="owner">Owner</label>
                                <input type="text" class="form-control" id="owner" name="nameOnCard">
                            </div>
                            <div class="form-group CVV">
                                <label for="cvv">CVV</label>
                                <input type="text" class="form-control" id="cvv" name="inputCode">
                            </div>
                            <div class="form-group" id="card-number-field">
                                <label for="cardNumber">Card Number</label>
                                <input type="text" class="form-control" id="cardNumber" name="cardNumber">
                            </div>
                            <div class="form-group" id="expiration-date">
                                <label>Expiration Date</label>
                                <select name="month">
                                    <option value="01">January</option>
                                    <option value="02">February </option>
                                    <option value="03">March</option>
                                    <option value="04">April</option>
                                    <option value="05">May</option>
                                    <option value="06">June</option>
                                    <option value="07">July</option>
                                    <option value="08">August</option>
                                    <option value="09">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                                <select name="year">
                                    <option value="16"> 2016</option>
                                    <option value="17"> 2017</option>
                                    <option value="18"> 2018</option>
                                    <option value="19"> 2019</option>
                                    <option value="20"> 2020</option>
                                    <option value="21"> 2021</option>
                                </select>
                            </div>
                            <div class="form-group" id="credit_cards">
                                <img src="images/visa.jpg" id="visa">
                                <img src="images/mastercard.jpg" id="mastercard">
                                <img src="images/amex.jpg" id="amex">
                            </div>
                            <div class="form-group" id="pay-now">
                                <button type="submit" class="btn btn-default" name="updateBilling">Confirm</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Billing section, this is connected to the 'Payment' table in the db. This section is hidden when the payment
form is active. -->
                <div class="row">
                    <div class="paymentInfo col-lg-12">
                        <a href="#" data-toggle="collapse" data-target="#payment" id="accountPageTitles">Payment</a>
                        <div id="payment" class="collapse in col-lg-12">
                            <div class="col-lg-3">
                                <h4>Name On Card:</h4>
                                <h4>Card Number: </h4>
                                <h4>Security Code:</h4>
                                <h4>Expiration date</h4>
                            </div>
                            <div class="col-lg-8">
                                <h4>
                                    <?php    
                            
                               printBillingInfo('nameCard');
                                ?>
                                </h4>
                                <h4>
                                    <?php    
                           
                               printBillingInfo('cardNumber');
                                ?>
                                </h4>
                                <h4>
                                    <?php    
                            
                                printBillingInfo('securityCode');
                                ?>
                                </h4>
                                <h4>
                                    <?php    
                             
                                printBillingInfo('expDate');
                                ?>
                                </h4>
                            </div>
                            <div class="col-lg-1">
                                <a href="#" id="editBilling">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- history section. This is connected to the 'History' section in the db. Whenever anything is changed or updated it gets logged 
                with a comment and a timestamp. This section constantly pulling and pushing the results onto the page. -->
                <div class="row">
                    <div class="History col-lg-12">
                        <a href="#" data-toggle="collapse" data-target="#history" id="accountPageTitles">History</a>
                        <div id="history" class="collapse in col-lg-12">
                            <div class="col-lg-6">
                                <p>
                                    <?php
                            //this section retrieves the comments from the table.    
                               
                                $element = 'comm';
                                $result = retrieveHistoryInfo($element);
                                foreach($result as $comment){
                                    echo '<div class="comments">';
                                    echo $comment['comm'] . '</br>';
                                    echo '</div>';
                                    }
                                
                            ?>
                                </p>
                            </div>

                            <div class="col-lg-6">
                                <?php    
                            //this section retrieves the timestamp of the comment from the table.
                                
                                $element = 'commDate';
                                $result = retrieveHistoryInfo($element);
                                foreach($result as $comment){
                                    echo '<div class="dates">';
                                    echo $comment['commDate'] . '</br>';
                                    echo '</div>';
                                    }
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- this form allows the user to set their background color, picture and font style of their account page.
                     This is hidden until 'editCustom' is clicked -->
                <div class="col-lg-12" id="changeCustomizationInfo">
                    <form method="post">
                        <div class="form-row">
                            <div class="form-group col-md-12 col-lg-12">
                                <label for="inputColor">Color</label>
                                <input type="text" name="color" id="colorpickerField1">
                            </div>
                            <div class="form-group col-md-12 col-lg-12">
                                <label for="inputFont">Font</label>
                                <select name="font" id="inputFont" class="form-control">
                                    <option selected>Choose Font</option>
                                    <option value="sans-serif">Sans-Serif</option>
                                    <option value="serif">Serif</option>
                                    <option value="Arial,Helvetica,sans-serif">Arial</option>
                                    <option value="cursive">Cursive</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12 col-lg-12">
                                <label for="inputPicture">Picture URL</label>
                                <input type="text" name="picture" id="colorpickerField1">
                            </div>
                        </div>
                        <button type="submit" name="updateCustomization" class="btn btn-primary">Update</button>
                    </form>
                </div>
                <div class="row">
                    <!-- this sections data is connected to the 'Customization' table in the db. -->
                    <div class="Customization col-lg-12">
                        <a href="#" data-toggle="collapse" data-target="#customization" id="accountPageTitles">Customization</a>
                        <div id="customization" class="collapse in col-lg-12">
                            <div class="col-lg-3">
                                <h4>Background Color</h4>
                                <h4>Text Font</h4>
                                <h4>Picture Link</h4>
                            </div>
                            <div class="col-lg-8">
                                <h4>
                                    <?php    
                               
                                printCustomInfo('backgroundColor');
                                ?>
                                </h4>
                                <h4>
                                    <?php    
                              
                                printCustomInfo('font');
                                ?>
                                </h4>
                                <h4>
                                    <?php    
                             
                                printCustomInfo('pictureURL');
                                ?>
                                </h4>
                            </div>
                            <div class="col-lg-1">
                                <a href="#" id="editCustomization">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>


    <script>
        //setting Session variables defined in index.php
        var log = '<?=$_SESSION['login'];?>';
        var user = '<?=$_SESSION['user'];?>';
        var id = '<?=$_SESSION['id'];?>';
        var backgroundColor = '<?=$_SESSION['backgroundColor'];?>';
        var font = '<?=$_SESSION['font'];?>';
        //setting other variables
        var data = 'id=' + id;
        var clickCount = 0;
        var ImageURL = 'getImage.php?';
        //color picker action code.
        $('#colorpickerField1').ColorPicker({
            onSubmit: function (hsb, hex, rgb, el) {
                $(el).val(hex);
                $(el).ColorPickerHide();
            },
            onBeforeShow: function () {
                $(this).ColorPickerSetColor(this.value);
            }
        })
            .bind('keyup', function () {
                $(this).ColorPickerSetColor(this.value);
            });
        //redirects the user to a logout.php page where it will destroy the session and unset all the variables.
        $(".logoutLink").click(function () {
            console.log("HERE");
            location.href = "/Logout.php";
        })
        //editProfile,editBilling and editCustomization all control what is being seen on the page depending on whether
        //the user wants to edit or not.
        $("#editProfile").click(function () {
            console.log("editing Profile");
            $("#changeProfileInfo").show();
            $(".accountInfo").hide();
        })
        $("#editBilling").click(function () {
            console.log("editing Billing");
            $(".creditCardForm").show();
            $(".paymentInfo").hide();
        })
        $("#editCustomization").click(function () {
            console.log("editing Billing");
            $("#changeCustomizationInfo").show();
            $(".Customization").hide();
        })
        //this allows the user to expand the comments div to see the whole comment instead of a brief summerization
        $(".comments").click(function () {
            console.log("CLICKED");
            if (clickCount % 2 == 0) {
                $(".comments").css('height', '100%');
                $(".comments").css('overflow', 'scroll');
                $(".comments").css('white-space', 'normal');
                clickCount++;
            }
            else {
                $(".comments").css('height', '20px');
                $(".comments").css('overflow', 'hidden');
                $(".comments").css('white-space', 'nowrap');
                clickCount++;
            }
        })
        //whenever the documents is loaded this function will be called setting the custom details for the users account page
        $(document).ready(function () {
            $("#profilePicture").attr('src', 'getImage.php?id=1');
            $("#bioContainer").css('background-color', backgroundColor);
            $("body").css('font-family', font);
        });
        //this controls what the user sees depending if they are logged in or not.
        if (log == "1") {
            console.log("login is 1");
            console.log("user is", user);
            $("#loginLink").hide();
            $(".nameLink").show();
            $(".logoutLink").show();
        }
        else {
            $("#loginLink").show();
            $(".nameLink").hide();
            $(".logoutLink").hide();
            console.log("login is 0");
        }
    </script>

</html>