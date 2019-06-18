# FSUInnovation
------------------------------------------------------------------------------------------------------------------------------
FSU Innovation Internship Site

What this Project is:
This is a website where students can apply for internships and create profiles that employers can see.
Employers can post positions that their companies offer for students to find.

How to use it:
If you are a Student, then you will need to create a profile. After that, employers will know all about you when you are looking for the internship you desire.
If you are a Employer, create a profile of yourself and the company you represent where you can post projects available at your company.
-------------------------------------------------------------------------------------------------------------------------------

To add an account on machine: Use this sql statement:
CREATE USER 'SiteAdmin'@'localhost' IDENTIFIED VIA mysql_native_password USING '***'; GRANT ALL PRIVILEGES ON *.* TO 'SiteAdmin'@'localhost' REQUIRE NONE WITH GRANT OPTION MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0; GRANT ALL PRIVILEGES ON `siteadmin\_%`.* TO 'SiteAdmin'@'localhost' WITH GRANT OPTION; GRANT ALL PRIVILEGES ON `internsite`.* TO 'SiteAdmin'@'localhost' WITH GRANT OPTION; 