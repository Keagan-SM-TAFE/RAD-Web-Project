# Movie Database Web Project

A website written in PHP that searches a list of movies on an SQL database and returns the list in the form of a HTML table.


## Responsive Design

Using BootStrap to implement a responsive design to the website.

## To-Do list for Sprint Two

- [X] Admin Login in button to Navbar
- [X] Re-Design Database
- [X] Admin login functionality
- [X] Add News Letter sign up to Footer
- [X] Send News Letters to Email
- [X] Mark Email as No Not Send from news letter list
- [X] Admin page

## To-Do list for Sprint Three

- [X] Movie rating system
- [X] top ratings graph
- [X] movie leader board

### Important to note

The project is using Bootstrap 5 as a responsive framework.
Some aspects of Bootstrap 4 will not work as they heve been changed in the current version of Bootstrap.
Beootstrap is delivered using 'jsDelivr' (a free open source CDN)
For more infomation on Bootstrap 5 visit https://getbootstrap.com/

### File access

The administrator porthole will not appear after the login information is entered unless the configuration files
are changed- The XAMPP configuration file is "httpd-vhosts.conf". The following information was pasted in

<Directory "c:/<path-to-projects>/">
        Options Indexes FollowSymLinks MultiViews
        AllowOverride all
        Order Deny,Allow
        Allow from all
        Require all granted
</Directory>
