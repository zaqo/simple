# simple

Login &amp; Authorization + RSS feed

This is an exercise project, a web-site with the following functions:

1) User registration form with e-mail (serving as a UserID) and password fields 

2) On a form e-mail verification is called via AJAX. 

3) Successfuly registred user is notified by e-mail. 

4) Login form with e-mail address and password.

5) Server-side Login procedure: access granted only for successfully verified e-mail addresses. 

6) After successful login displays top 20 news from https://www.delfi.lv/rss/?channel=delfi  

DEPLOYMENT:
a. Use mySQL - settings in the config.php
b. In order to create Users table use the script in the /sql folder
c. mail function is disabled in the code for the debugging purposes, please delete "@" to use messaging
d. Login page: login.php
e. Registration page: new_user.html


Enjoy!