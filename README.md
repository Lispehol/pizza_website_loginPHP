# pizza_website_loginPHP

This is a simple website built using HTML, CSS, PHP, and MySQL. The script was originally created as a teaching tool for PHP beginners, and I have modified and extended it as an exercise for my studies while becoming more familiar with PHP. It is not intended for use in production environments, and the code may contain errors or poor practices.

## Warning
This project is intended for educational purposes only. It is not secure and should not be used in real-world production environments without significant improvements, especially in terms of security, validation, and error handling.

## Files Overview

Below is a brief description of each file in the project: 

- config.php - This script contains the database connection details. Edit this file to specify your own database's connection details (e.g., username, password, database name).
- rekist.html - A simple registration form where users can create an account.
- register-exec.php - Handler script for the the above form. This script will create member accounts for you.
- login.html - Login form  where users can enter their credentials.
- login-exec.php - Handler script for the above login form. This script authenticates the login details and then sets up a session for the user.
- logout.php - Script used to logout a user from the session.
- member-index.php - Password protected page for members
- member-profile.php - Password-protected page where users can view and update their profile details.
- auth.php - Include this script at the top of any page you want to password protect. This script checks whether the user is logged in or not.
- newpassword.php - A script that allows users to request a new password, which will be sent to their email address.

## Installation
- Clone or download the repository to your local machine.
- Set up a MySQL database and configure the config.php file with your database details.
- Ensure your web server supports PHP and MySQL (e.g., Apache with PHP, XAMPP, etc.).
- Place all files in your web server's document root folder.
- Navigate to rekist.html to test the registration process, or login.html to test the login process.

## Contributing
If you'd like to contribute to this project, feel free to submit a pull request or open an issue. Suggestions and improvements are welcome!


