# Coalition Technologies WordPress Skills Test
Converting a PSD design to a WordPress Template

### Work Done

1. Downloaded and installed WordPress at coalitiontest.local
2. Created admin user with username coalitiontest and password wordpresstest
3. Created a new template with name homepage.php, created a new page titled "Homepage" assigned to the homepage.php template, it is also marked as the frontpage.
4. Created a new template with the name contactpage.php. I created a page titled "Contact" assigned to contactpage.php template. This is the page which I have developed the PSD design in.
5. Created a new template part named breadcrumbs.php which is in the template-parts directory. The purpose of this template is to display the breadcrumbs in the contact page.
6. Created a theme settings page which includes the following-

    -   Image Upload for Logo
    -   Phone Number
    -   Address Information
    -   Fax Number
    -   Social Media Links

   The code which I wrote to achieve this is in functions.php file with comments explaining what each function does/achieves.

7. I created two directories in the theme folder
    - css/ - This stores the custom styles
    - fonts/ - This stores the custom fonts
    - webfonts/ - Store the Font Awesome variations, I used this to create the socal media icons
8. I created a custom theme screenshot in the theme folder
9. Created a menu within WordPress
10. For the contact form, I opted to create a simple HTML form instead of using a plugin.

### Notes

1. I created an additional page "Who we are" so that I could demonstrate the implementation of breadcrumbs on the contact page as per the PSD.
2. In the menu, I used "Home" as the first item to demonstrate the custom homepage template. I also added "Contact" in the menu items for navigation to the actual page.
3. I also implemented the menu effect to show the current page which the user is in.
4. Added a footer to mark the end of the page
5. The database is named coalitiontest.sql and its in the root of the project.