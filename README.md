# pizza_website_loginPHP
This is simple website using html, css, php and MySQL.  I've edited the script from a teaching tool for PHP newbies and added new functionalities as an excercise related to my studies while familiarizing myself with php and it is not meant to be used in production environments. The code may contain errors or bad practises.

There is some info about files: 

config.php - This script contains the database connection details. Edit this file to specify your own database's connection details.

rekist.html - A simple registration form

register-exec.php - Handler script for the the above form. This script will create member accounts for you.

login.html - Login form

login-exec.php - Handler script for the above login form. This script authenticates the login details and then sets up a session for the user.

logout.php - Script used to logout a user from the session.

member-index.php - Password protected page for members

member-profile.php - Password protected page.

auth.php - Include this script at the top of any page you want to password protect. This script checks whether the user is logged in or not.

newpassword.php - Sends a new password to the requested mail


