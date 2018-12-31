<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="index.css">
</head>

<?php
session_start();

class test{
    public function signUp($user,$pass,$email){
        $servername = "us-cdbr-iron-east-01.cleardb.net";
        $username = "b3c9fea6937492";
        $password = "fd9d1b2a";
        $dbname = "heroku_e93bbdae1c33363";

    $conn =  new mysqli($servername,$username,$password,$dbname);
    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
    else{
        $sql = "INSERT INTO SignUp(userName,pass,email)
        VALUES ('$user','$pass','$email')";

        if($conn->query($sql) === TRUE){

        }
        else{
            echo "NOT A VALID QUERY";
        }
        }
    }


    public function login($user,$pass){
    $servername = "us-cdbr-iron-east-01.cleardb.net";
    $username = "b3c9fea6937492";
    $password = "fd9d1b2a";
    $dbname = "heroku_e93bbdae1c33363";
    
        $conn =  new mysqli($servername,$username,$password,$dbname);
        if($conn->connect_error){
            die("Connection failed: " . $conn->connect_error);
        }
        else{
            $sql = "SELECT userName,pass FROM SignUp where userName = '$user' and pass = '$pass'";
            $result = $conn->query($sql);
        }
        return $result;
        
    }
}

if(isset($_POST['login']))
{
    $y = new test();
    $user = $_POST["user"];
    $pass = $_POST["pass"];
    $result = $y->login($user,$pass);
    $row = $result->fetch_assoc();
    $e = $row["userName"];
    $p = $row["pass"];
    if($user == $e && $pass == $p && $_SESSION != "1"){
      
        $_SESSION['login'] = "1";
        $_SESSION['user'] = $e;
    }
    else{
        
        $_SESSION['login'] = "";
    }
}
if(isset($_POST['register'])){
    $y = new test();
    $user = $_POST["user"];
    $pass = $_POST["pass"];
    $email = $_POST["email"];
    $y -> signUp($user,$pass,$email);
    password_hash($pass,PASSWORD_BCRYPT);
}


?>


<body>
    <div class="container-fluid" id="bioContainer">
    <div class = "headerRow">
        <a href="#" data-toggle="modal" id = "loginLink" data-target="#login-modal">Login</a>
        <a href="#" class = "nameLink">Name</a>
        <a href="#" class = "logoutLink">Logout</a>
    </div>

    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	  <div class="modal-dialog">
				<div class="loginmodal-container">
					<h1>Login to Your Account</h1><br>
				  <form action = "index.php" method = "post">
					<input type="text" name="user" placeholder="Username">
					<input type="password" name="pass" placeholder="Password">
					<input type="submit" name="login" class="login loginmodal-submit" value="Login">
				  </form>
					
				  <div class="login-help">
					<a href="#" data-toggle= "modal" data-target= "#register-modal">Register</a> - <a href="#">Forgot Password</a>
				  </div>
				</div>
			</div>
		  </div>

          <div class="modal fade" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	  <div class="modal-dialog">
				<div class="loginmodal-container">
					<h1>Register</h1><br>
				  <form action = "index.php" method = "post">
					<input type="text" name="user" placeholder="Username">
                    <input type="text" name="email" placeholder="Email">
					<input type="password" name="pass" placeholder="Password">
                    <input type="password" name="confirmpass" placeholder="ConfirmPassword">
					<input type="submit" name="register" class="login loginmodal-submit" value="Login">
				  </form>
					
				  <div class="login-help">
					<a href="#" data-toggle= "modal" data-target= "#login-modal">Login</a>
				  </div>
				</div>
			</div>
		  </div>
          <script>
var log = '<?=$_SESSION['login'];?>';
var user = '<?=$_SESSION['user'];?>';
if(log == "1"){
    console.log("login is 1");
    console.log("user is", user);
    $("#loginLink").hide();
    $(".nameLink").html(user);
    $(".nameLink").show();
    $(".logoutLink").show();
}
else{
    $("#loginLink").show();
    $(".nameLink").hide();
    $(".logoutLink").hide();
    console.log("login is 0");
}
</script>
  
        <div class="row-lg-12">
            <div class="col-lg-4 col-lg-offset-1 col-md-2 col-sm-2" id="picture">
                <img src="linklnPicture.png" class="img-circle">
            </div>
            <div class="col-lg-7" id="bio">
                <h1 class="name">Spencer Woods</h1>
                <p>Hi There!</br>
                    If you are looking at this you are hopefully considering me for a position at your company. If so
                    my goal is that you find this website
                    helpful in getting to know me as a person and why I would be a great fit for your position. People
                    are a complicated species that are not only
                    defined by the degrees or education we have recieved. Our past, history, accomplishments and
                    personality are
                    hard to get across in a one page resume. Thus I hope we get the chance to meet in person and
                    connect further. </br>
                    Thank you!
                </p>
                <div class="col-lg-2 col-lg-offset-1 col-md-1 col-sm-1" id="bio">
                   <a href = "https://www.linkedin.com/in/spencer-woods-077978138"> <img src="linkdln.png" id="icons"> </a>
                </div>
                <div class="col-lg-2 col-lg-offset-1 col-md-1 col-sm-1" id="bio">
                    <a href = "Resume-Spencer Woods.doc.pdf" ><img src="folder.png" id="icons"></a>
                </div>
                <div class="col-lg-2 col-lg-offset-1 col-md-1 col-sm-1" id="bio">
                    <a href = "https://www.facebook.com/spencer.j.woods.1"><img src="facebook.png" id="icons"> </a>
                </div>
            </div>
        </div>
    </div>
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home">Skills</a></li>
        <li><a data-toggle="tab" href="#skillTab">Experience</a></li>
        <li><a data-toggle="tab" href="#porfolioTab">Portfolio</a></li>
        <li><a data-toggle="tab" href="#contactTab">Contact</a></li>
    </ul>
    <div class="tab-content col-lg-12">
        <div id="home" class="tab-pane fade in active col-lg-12">
            <div class="CS col-lg-6">
                <h1>Computer Science</h1>
                <h3>JavaScript(Node.js)</h3>
                <p>Node.js - javaScript is one of my stronger languages. At my most recent internship I almost solely
                    coded using JS.
                    My project experience in this language includes creating and maintaining testing scripts for our
                    system. One project in particular I was tasked with was
                    loading up our system with thousands of fake accounts,profiles,devices,etc... This was something we
                    were doing manually beforehand and would keep a
                    developer busy for hours if not days. Now with a press of a button you can load up any of our
                    enviroments within minutes. This required me to not only
                    learn how asynchronous languages worked, but how to use them to my advantage.
                </p>
                <h3>Java</h3>
                <p>Java is what Boise State teaches as it's learning block. This is the language I did all of my data
                    structures classes in and the language in which I
                    learned how to write different sorting algorithms, binary tree structeres, hash tables, and so on.
                    So although I do not have any professional experience
                    in this language I have used it extensively in a educational enviroment. If you look in my portfolio
                    section you will see a few examples of my work in Java. If i had to
                    reccomend one it would be the binary search tree project as it brought together a lot of topics
                    that I had learned and put them into one project.
                </p>
                <h3>PhP</h3>
                <p>PhP is a language that I have a decent understand and experience in. I have used PhP to run getter
                    and setter queries to mySql, store sessions/cookies,access Api's and
                    finally format the information recieved from mySql onto a webpage. It is a fairly simple language
                    to learn and I believe I have a firm grasp on how to write a solid program in PhP.
                    All of that being said I have a lot to learn and I know I can improve given time on this language.
                    You can see some examples of this on this website and my other websites in the portfolio section.
                </p>
                <h3>Sql</h3>
                <p>Similar to PhP I have used Sql to aid in my website creation. This involved creating a database and
                    tables, and then writing queries to both store and retrieve information from the DB.
                    I would say the biggest project I have done with sql was accessing the moviebase API and storing
                    all movies released in 2015 with some specified parameters and then
                    parsing through the data returned data and succesfully listing the data by movie rating. This was a
                    harder then expected task and I was very pleased when I got it figured out.
                    The code for this should be in the projects section under "MovieBase API example".
                </p>
                <h3>Html/Css/JavaScript(Server side)</h3>
                <p>I love making websites or web based applications.On my free time I enjoy making and modifying my
                    current websites to practice not only best coding practices but fiddling around with
                    different designs and layouts.My internship with Garrigan Lyman Group is what really sparked my
                    passion for web development. To see my work in this language see this website and others that I
                    will
                    link to in my portfolio.
                    <h3>C</h3>
                    <p> I have written a good amount of C In an educational enviroment, as Boise State's secondary
                        language they teach after Java is
                        C. You will see some good examples of my work in C in my portfolio section. C is never really my
                        default go-to language but I reconize the
                        power and speeds that can be achieved in C so it is a neccesity at times.
                    </p>
                    <h3>C#,Python,Swift,Ionic</h3>
                    <p>These are all languages In which I have had some small projects or I have been recently learning
                        on my own time from coding classes or neccesity for another project.So expect some knowledge
                        but deffintely not professional grade yet. yet being the keyword there :)
                    </p>
                </p>
            </div>
            <div class="sales col-lg-6">
                <h1>Sales/Business</h1>
                <h3>Public Speaking</h3>
                <p> My strong background in sales has prepared me throurougly on how to speak in front of groups of
                    peers or
                    strangers. This skill has positively impacted several aspects of my life and does not just come in
                    handy in a sales enviroment.
                    Being able to comfortably talk in front of a group allows me be a good teacher and leader to peers.
                </p>
                <h3>Sales</h3>
                <p>Sales Is something that I am very talented at. In the few years I have worked as a salesman I have
                    won multiple awards/recognitions for my sales record. My most proud being the "Top Gun" award
                    which is only presented to the top 100 salesmen in the entire company, which equates to less then
                    1% of all sales employees. My ability to sell isn't because of some fancy tricks or slimy
                    mechanics, it is
                    simply because I absolutely love interacting with people and it shows in a conversation.
                </p>
                <h3>Teamwork</h3>
                <p>I absolutely love working in a team based enviroment. I find that being a close knit team that
                    encourages teamwork and communication is the most important
                    aspect of any office. I have been in several different coorperate enviroments and I can hands down
                    say the most productive teams are ones who not only have a strong
                    work ethic, but are the teams who have close bonds with eachother and are not afraid to ask for
                    help.
                </p>
                <h3>Leadership</h3>
                <p>In my mind being a leader is not just being someone who can bark out orders or commands, its
                    actually the opposite. I believe the best leader is someone who is a impecable listener.
                    A leader who listens is a leader that is taking in the knowledge of everyone and making the best
                    decision for the whole team.
                </p>
            </div>
        </div>
        <div id="skillTab" class="tab-pane fade">
            <div class=" info col-lg-6">
                <h1>Experience</h1>
                <h3>Sensus-Software Developer Intern</h3>
                <p>My job at sensus required me to learn quickly as I was constantly being tasked with a multitude of
                    different projects.Some of these projects include writing a script to load up our
                    whole enviroment with fake data, Learning and automating our manual tests with a tool called
                    'TestCafe', and ofcourse the constant upkeeping and creation of tests using Node.js and mocha.
                    I also took this opportunity to shadow our product owner and gain helpful insight into what it
                    takes to
                    become a successful vessel of knowledge to and from the customer.
                </p>
                <h3>Garrigan Lyman Group-Web Development Intern</h3>
                <p> I was a web development Intern for the Garrigan Lyman Group for six months. During this time I got
                    the opportunity
                    to work side by side with both front-end and back end developers to learn and enhance my java, C#,
                    Html/CSS and JavaScript skills. </p>
                <h3>Best Buy-Sales Associate</h3>
                <p>I worked for best buy for a little over a year and won the title of “Top Gun”, which at best buy is
                    one of the biggest awards you can
                    win in my position. This award was given to the top 100 salesmen in the entire company.</p>
                <h3>Old American Insurance-Salesman</h3>
                <p>For OAI I sold life insurance door to door. I worked for them for about eight months, before I had
                    to move away to go to college. This job
                    allowed me to grow my social skills tremendously.</p>
            </div>
            <div class=" info row-lg-6">
                <h1>Contact Information</h1>
                <div class="col-lg-3">
                    <h4>Sensus</h4>
                    <p>Address:10147 Emerald St, Boise, ID 83704</p>
                    <p>Phone:(208) 323-5575</p>
                </div>
                <div class="col-lg-3">
                    <h4>Garrigan Lyman Group</h4>
                    <p>Address:1109 West Main St.
                            Suite 420
                            Boise, ID 83702</p>
                    <p>Phone:(208) 272-9699</p>
                </div>
                <div class="col-lg-3">
                    <h4>Best Buy</h4>
                    <p>Address:8363 W Franklin Rd, Boise, ID 83709</p>
                    <p>Phone:(208) 658-9670</p>
                </div>
                <div class="col-lg-3">
                    <h4>Old American Insurance</h4>
                    <p>Address:3520 Broadway Blvd, Kansas City, MO 64111</p>
                    <p>Phone:(800) 733-6242</p>
                </div>
            </div>
            <h1>References</h1>
            <div class="col-lg-3">
                    <h4>Marie Baldwin</h4>
                    <p>Email:Marie.Baldwin@xyleminc.com</p>
                    <p>Phone:(208) 863-3181</p>
                    <p>Relationship:Supervisor</p>
            </div>
            <div class="col-lg-3">
                    <h4>Kristin Collum</h4>
                    <p>Email:kcollum@hotmail.com</p>
                    <p>Phone:(208) 340-0295</p>
                    <p>Relationship:Former Supervisor</p>
            </div>
            <div class="col-lg-3">
                    <h4>Marc Lehman</h4>
                    <p>Email:Marc.lehman@xyleminc.com</p>
                    <p>Phone:(208) 323-5575</p>
                    <p>Relationship:Testing Lead</p>
            </div>
            <div class="col-lg-3">
                    <h4>Sean Anaya</h4>
                    <p>Email:Sean.Anaya@xyleminc.com</p>
                    <p>Phone:(208) 323-5575</p>
                    <p>Relationship:Co-Worker</p>
            </div>
        </div>
        <div id="porfolioTab" class="tab-pane fade">
        <div class="col-lg-6">
            <h1>portfolio</h1>
            <h3>Java</h3>
            <h4>Binary Search Tree</h4>
            <a href = "https://github.com/spencersensus/Cs453/tree/master/java%20examples/src">Binary Search Tree</a>
            <p>I reccomend looking at this example, as it shows what I can accomplish with Java. This assignment was fun, long and required me to dig up all the Java knowledge I had learned
                up to that point.
            </p>
            <h4>Hash Tables</h4>
            <a href = "https://github.com/spencersensus/Cs453/tree/master/java%20examples/HashTable">Hash Tables</a>
            <p>This was a fairly simple project where I implemented different types of Hash Tables not using a library.
            </p>
            <h4>Priority Queue</h4>
            <a href = "https://github.com/spencersensus/Cs453/tree/master/java%20examples/MaxHeap">Priority Queue</a>
            <p>For this example I implemented a priority Queue using 'MaxHeapify'.
            </p>
            <h4>Interpreter</h4>
            <a href = "https://github.com/spencersensus/Cs453/tree/master/various%20language%20examples/interpreter2">Interpreter</a>
            <p>Java implementation of an average compiler Interpreter. This was a really cool assignment because it allowed me to really understand how compilers work.
            </p>
            <h3>C#,Prolog,Smalltalk,Awk</h3>
            <h4>Awk</h4>
            <a href = "https://github.com/spencersensus/Cs453/tree/master/various%20language%20examples/Awk">Awk</a>
            <p>I used awk to search through a csv and find all accounts of a given string and then format them into a new html a file. This skill can be incredibly useful when trying to parse through huge amounts of
                unsorted raw data.
            </p>
            <h4>C#</h4>
            <a href = "https://github.com/spencersensus/Cs453/tree/master/various%20language%20examples/C%23">C#</a>
            <p>Replication of a lightswitch and counter in C#.
            </p>
            <h4>Prolog</h4>
            <a href = "https://github.com/spencersensus/Cs453/tree/master/various%20language%20examples/prolog%20example">Prolog</a>
            <p>Basic Prolog example where I found all the matching available times of different people and returned the time in which they were all free. 
            </p>
            <h4>Smalltalk</h4>
            <a href = "https://github.com/spencersensus/Cs453/tree/master/various%20language%20examples/smalltalk%20example">Smalltalk</a>
            <p>Used smalltalk to replicate an average checking and savings account.
            </p>
        </div>
        <div class="col-lg-6">
        </br></br></br>
            <h3>C</h3>
            <h4>Shell</h4>
            <a href = "https://github.com/spencersensus/Cs453/tree/master/Operating%20Systems(C)/p3-shell-part2">Shell</a>
            <p>This was a two part project where I pretty much re-wrote bash.This taught me more about C in a shorter amount of time then any other project has. In this project I had to keep track of byte usage, 
                create commands that people could use on my new bash and give the person the ability to run multiple processes at a time using multi-threading.
                There was a lot more that went into the project as well so If you interested I highly suggest
                checking it out and seeing what you think.
            </p>
            <h4>Memory Manager</h4>
            <a href = "https://github.com/spencersensus/Cs453/tree/master/Operating%20Systems(C)/p6">Memory Manager</a>
            <p>In this example I show how to re-create malloc, calloc and realloc from scratch. I then tested the allocation of memory using my own methods instead of the system version that does this for you.
            </p>
            <h4>Mergesort</h4>
            <a href = "https://github.com/spencersensus/Cs453/tree/master/Operating%20Systems(C)/mergesort">Mergesort</a>
            <p>wrote mergesort using single and multithreaded versions.
            </p>
            <h4>Device Driver</h4>
            <a href = "https://github.com/spencersensus/Cs453/tree/master/Operating%20Systems(C)/p5"> Device Driver</a>
            <p>Replication of a device driver written in C.With this project I had to test on a Virtual Machines kernal so It required me to be incredibly careful, because if I made a mistake the VM would crash
                and I would have to reboot everything.
            </p>
            <h3>Websites</h3>
            <h4>MattVetschConstruction</h4>
            <a href = "http://mattvetschconstruction.herokuapp.com/">Website</a>
            <p>First website I made on my own to practice the basics of HTML,CSS,JS/Jquery and PhP. My dad is a contractor so I did the theme as if it was a small contractor looking to
                grow and show his work.
            </p>
            <h4>Resume</h4>
            <a href>This website!</a>
            <p>I made this website to more easily showcase who I am as a person and also as a sample project for Paylocity.
            </p>
            
        </div>


    </div>
        <div id="contactTab" class="tab-pane fade">
            <h1>Contact</h1>
            <p>Phone:(503) 730-6804</p>
            <p>Address:4909 N Elsinore Ave. Meridian, ID. 83646</p>
            <p>Email: w.spencerj@gmail.com</p>
        </div>
    </div>
</body>

</html>