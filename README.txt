Spencer Woods
Jan 17, 2018.
Resume Website


PROJECT DESCRIPTION:
This website is meant to be a portal for future employers to get a better understanding of me, 
my work experience and various different skill sets. I have always found it hard to get across all 
of this within a one page resume so I am excited to finally have a place I can reflect everything about me. A
s for the second part of this project I wanted to showcase some other tactics I have learned in Php, Jquery, Sql, etc.. 
by creating an account portal and allowing the user create their own resume website.

SUBMITTED FILES:
Account.Php - Account page. This page contains a lot of back and forth with the database.
creationPage.Php - This page is solely a bunch of forms that the user fills out to populate the personalized.php page.
index.Php - My resume page. 
personalized.Php - User's personalized resume page.
insert.Php - All functions to insert information into the database.
retrieve.Php - All functions to retrieve infromation from the database.
printElement.Php - some various functions to print elements from the db. This is mainly a quality of life file that reduces repition.
regLog.Php - called when user is registering and loging in.
getImage.Php - gets the image for the account profile picture
retrieveImage.Php - retrieves the image for the personalized resume profile picture.
Logout.Php - Called when logging out, this clears and unsets the session variables and then destroys the session.
getid.Php - this function grabs the id of the given user,pass.

js folder-a few javaScript files for the colorpicker, validation and Jquery.
css folder-Various .css files linking to php files above.

HOSTED:
This website is hosted by heroku at the URL: https://spencerwoods-resume.herokuapp.com/
if you want to host this on your own machine I suggest using MAMP/WAMP as your will need apache 
for your local machine to load the php files instead of downloading them.

RUNNING ON YOUR LOCAL MACHINE:
Directions to get running using MAMP:
1. Download MAMP form their official website.
2. Open terminal and make your way to Applications/Mamp/htdocs/ 
3. run: git init
        git clone "path given on github website"
3. open the MAMP application and start the servers.
4. your localhost should now redirect you to the index.php page.

P.S(WAMP should be almost identical, but their might be a couple small alterations in the steps)