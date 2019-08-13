# FSUInnovation
------------------------------------------------------------------------------------------------------------------------------
FSU Innovation Internship Site

What this Project is:
This is a website where students can apply for internships and create profiles that employers can see.
Employers can post positions that their companies offer for students to find.

What it does so far:
Currently, you can register a account as either a intern or a member. You can also so login to this account.
There is 3 methods to find a member company on the site: by name, by keyword, or by letter.
Members can write up keywords to help identify the company.

What languages are needed to use:
Thus far, this site has used html, css, php, and javascript. Also you should know basics of SQL such as Select and Insert statements at a minimum.
Its possible in the future that certain components will need a new technology or plugin beyond that, but those will be noted here once they become applicable.

What to keep in mind as developer:
The file names used are meant to be as intuitive as possible. Though for some, it might be important to understand the role of the more important files.
There are login pages, registration pages, and search pages.
Find pages usually have someting to do with keywords, letters, or finding something.
Login pages involve the login screen and the welcome screens following a successful or failed login
Registration pages are forms you fill out to do something such as create a account or post a position for a intern to take up

How to use it:
If you are a Student, then you will need to create a profile. After that, employers will know all about you when you are looking for the internship you desire.
If you are a Employer, create a profile of yourself and the company you represent where you can post projects available at your company.
The site's navigation is designed such that you will not need to look at the files to get the functionality part of it.
Code created in php thus far is working and should not be changed unless a bug arises. Feel free to play around with it to help you learn the language.
-------------------------------------------------------------------------------------------------------------------------------

To add an account on machine: Use this sql statement:
CREATE USER 'SiteAdmin'@'localhost' IDENTIFIED VIA mysql_native_password USING '***'; GRANT ALL PRIVILEGES ON *.* TO 'SiteAdmin'@'localhost' REQUIRE NONE WITH GRANT OPTION MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0; GRANT ALL PRIVILEGES ON `siteadmin\_%`.* TO 'SiteAdmin'@'localhost' WITH GRANT OPTION; GRANT ALL PRIVILEGES ON `internsite`.* TO 'SiteAdmin'@'localhost' WITH GRANT OPTION;

To work with this code, its recommended to use XAMPP, a application that works on all operating systems that lets you run the apache and mysql servers you will need to run the code and allows you to run php code as well.
When using the software until it's published on the web, you will need to make sure your apache and mysql servers are running in the XAMPP control panel which can be opened from the xampp folder in your C drive.

Also, make sure you add PDO to your php.ini file as this software uses PDO instead of Mysqli which was depricated in a previous version php.
The needed file as well as others can be downloaded from the web if needed.

If you don't feel like writing your own SQL Statements when new tables are needed in the database, you can use phpmyadmin provided by xampp.
To use this, type localhost:8080(or localhost: + the port number you are using) and find the phpmyadmin tab on the right side of the webpage