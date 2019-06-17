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
GRANT ALL PRIVILEGES ON *.* TO 'SiteAdmin'@'%' IDENTIFIED BY PASSWORD '*4BD896CED3E65DFAAFF43613D4E1F72A5ACC07EA' WITH GRANT OPTION;

GRANT ALL PRIVILEGES ON `internsite`.* TO 'SiteAdmin'@'%' WITH GRANT OPTION;

GRANT ALL PRIVILEGES ON `siteadmin\_%`.* TO 'SiteAdmin'@'%' WITH GRANT OPTION;