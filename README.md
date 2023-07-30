# Luminary
An online bookstore created for book lovers who dream of an enchanting shopping experience.

## Table of Contents

- [Description](#description)
- [Installation](#installation)
- [Tour](#tour)
- [Original Version](#original-version)
- [Resources](#resources)

## Description
Luminary is a full stack e-commerce bookstore that achieves an aesthetic and smooth user experience for three distinct user types.

* customers 
     * browse and add books to the shopping bag
     * purchase bag items online or reserve for in-store purchase

* authors
     * add, update, or delete products
     * view crucial information like order statistics and low stock warnings

* site admin
     * access all features   
     * add, update, or delete user accounts, orders, or products
     * view site revenue charts
 
## Installation
To run Luminary locally on your machine:

1. Install MAMP: Download and install MAMP to provide a local web server environment. Download MAMP from the [official website]([https://www.apachefriends.org/index.html](https://www.mamp.info/en/downloads/)) and follow the installation instructions. It's free!

2. Download a copy of this repository and place inside (`Application/MAMP/htdocs`).

3. Start the software from (`Applications/MAMP/MAMP`).

4. Import the Database: Visit http://localhost/phpmyadmin. Create a new database named "Luminary" and import the provided SQL file (`Applications/MAMP/htdocs/luminary/setup/luminary.sql`) included with the project.

7. Configuration: Open the luminary/setup/db.connect.php file and update the database credentials (host, username, password) to match your local setup. (Note: configuration may not be necessary.)

8. Access Luminary: Open a web browser and visit http://localhost:8888/luminary to access the site.

## Tour
[Watch the Project Video Here](https://youtu.be/QkwBxPO02kw)

View Project Screenshots Below
<br>

| Homepage - features a changing image carousel for promotions and marketing |
|---------|
<img alt="Homepage" src="https://github.com/sheatipton/Luminary/assets/63987819/f7df04a9-fb39-4f8d-9091-b25393567083"><br><br> |

| About - details the project |
|---------|
<img alt="About" src="https://github.com/sheatipton/Luminary/assets/63987819/80a547f7-583d-451e-a13b-53ed710496b7"><br><br> |

| Sign Up - prevents duplicate email signups and requires accurate password confirmation | 
|---------|
<img alt="SignUp" src="https://github.com/sheatipton/Luminary/assets/63987819/19a0aadc-1a60-4453-81b7-5350dfc328fb"><br><br> |

| Profile - supports editing user information and account deletion |
|---------|
<img alt="Profile" src="https://github.com/sheatipton/Luminary/assets/63987819/fcf328c2-79dd-449d-a7e5-fb3a126d7fd8"><br><br> |
                    
| Browse - shows books by category (7 categories available) |
---------|
<img alt="Browse Page" src="https://github.com/sheatipton/Luminary/assets/63987819/ef2b9fec-5662-413b-ac50-893050090e72"><br><br> |

| View - shows specific book details and notices |
|---------|
<img alt="ViewBook" src="https://github.com/sheatipton/Luminary/assets/63987819/482109d6-930f-4a1f-81ab-43db9b1bcf45"><br><br> |

| View - once logged in, cart number will update in real time |
|---------|
<img alt="AddedToBag" src="https://github.com/sheatipton/Luminary/assets/63987819/216efa55-5b98-46eb-9f99-8fa3d1778bf9"> <br><br> |

| Search Result - uses SQLs 'LIKE' operator to browse tables | 
|---------|
<img alt="Search" src="https://github.com/sheatipton/Luminary/assets/63987819/d7149b14-1439-4b88-83a9-104c898c66da"><br><br> |

| No Search Result - a friendly error message for the user |
|---------|
<img alt="NoResult" src="https://github.com/sheatipton/Luminary/assets/63987819/b4c0406a-0f8d-4403-8728-ce3a355f9598"><br><br> |
                                      
| About Dashboard - details Dashboard features and provides login credentials | 
|---------|
<img alt="AboutDashboard" src="https://github.com/sheatipton/Luminary/assets/63987819/9aba08f0-4864-4c57-859c-33ef9e7cbb94"><br><br> | 

| Dashboard Homepage - welcomes the user and shows a data overview |
|---------|
<img alt="Dashboard" src="https://github.com/sheatipton/Luminary/assets/63987819/165fb704-36b8-4e0e-8474-82512af681ac"><br><br> |
                                 
| Users - displays a table of all users (Supports user deletion) | 
|---------|
<img alt="Users" src="https://github.com/sheatipton/Luminary/assets/63987819/e83b7cc0-4feb-4302-a8c2-385126af530f"><br><br> | 

| Products - displays a table of all products (Supports add new, update existing, and delete) |
|---------|
<img alt="Products" src="https://github.com/sheatipton/Luminary/assets/63987819/6c42d525-62ac-496e-b4e8-482fd2ae4380"><br><br> |     
                            
| Shopping Bag - shows subtotal and allows items to be removed |
|---------|
<img alt="Bag" src="https://github.com/sheatipton/Luminary/assets/63987819/c6016f60-c822-4682-9dc0-0904eab5248f"><br><br> | 

| Checkout - supports promotion code from topbar |
|---------|
<img alt="Screenshot 2023-07-30 at 1 09 38 PM" src="https://github.com/sheatipton/Luminary/assets/63987819/04117f4d-afc0-4f54-b53c-619892fdf449"><br><br> |     
                                
| Payment - final page before order success | 
|---------|
<img alt="Payment" src="https://github.com/sheatipton/Luminary/assets/63987819/d6bf4503-2074-40e2-87be-ec92e63c7034"><br><br> | 

| Order Completed - shows detailed order information and a cleared cart |
|---------|
<img alt="OrderCompleted" src="https://github.com/sheatipton/Luminary/assets/63987819/15e50585-e677-4e09-9197-53d49f217101"><br><br> |

## Original Version
Significant modifications have been made by me to produce the current version of Luminary.

Luminary 2.0 would not have been possible without original contributions by:

* Christine Zhu
    * implemented Bootstrap stylesheets
    * contributed to UI design

* Fernanda Bonilla
    * implemented various checkout functions
    * contributed to data collection

| Luminary Original Version |
|---------|
| <img alt="Screenshot 2023-07-07 at 2 10 56 PM" src="https://github.com/sheatipton/Luminary/assets/63987819/4b2516e0-ff99-4492-8bbd-41ef8245b9d9"> | 

## Tools
HTML, CSS, MySQL, PHP, Javascript

## Resources
Bootstrap, StackOverflow, W3Schools, TutorialsPoint

* Disclaimers:

    * Luminary is a fictional online bookstore. Any materials that portray similarities to any real e-commerce store are coincidental.

    * Luminary is a personal project. For the purpose of representing book covers, images have been taken from the internet. Luminary does not claim any ownership or copyright over these images. If you own an image and would like it to be removed, please email me at shea.tipton7@gmail.com.





