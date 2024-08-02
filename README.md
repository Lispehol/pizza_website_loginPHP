# pizza_website_loginPHP
This is simple website using php and mySQL.  I've edited the script from a teaching tool for PHP newbies as an excercise related to my studies while familiarizing myself with php and it is not meant to be used in production environments. The code may contain errors or bad practises.

There is some info about .php files, I'll add later the rest: 

config.php - This script contains the database connection details. Edit this file to specify your own database's connection details.

register-form.php - A simple registration form

register-exec.php - Handler script for the the above form. This script will create member accounts for you.

login-form.php - Login form

login-exec.php - Handler script for the above login form. This script authenticates the login details and then sets up a session for the user.

logout.php - Script used to logout a user from the session.

member-index.php - Sample password protected page.

member-profile.php - Sample password protected page.

auth.php - Include this script at the top of any page you want to password protect. This script checks whether the user is logged in or not.
