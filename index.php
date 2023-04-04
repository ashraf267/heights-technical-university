<?php
    // php code here
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Play:wght@400;700&family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c84a86a0b9.js" crossorigin="anonymous"></script>
    <title>Undergraduate Admissions | HTU</title>
    <style>
        /* css code here */

        /* note: at the time of writing this code (12/02/23), this site is not fully responsive */
        /* note: 8 out of 10 times, I use borders to debug */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .header {
            width: 100%;
            height: auto;
            position: fixed;
            top: 0;
            background-color: rgba(246, 241, 233, 0.5);
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        #navbar-logo {
            text-decoration: none;
            display: inline-block;
            position: relative;
            left: 10px;
        }

        #navbar-logo img {
            width: 22%;
        }

        #navbar-btn {
            position: relative;
            right: 10px;
            font-size: 35px;
            background-color: transparent;
            border: none;
            font-weight: bold;
            color: #42210b;
        }

        #navbar {
            /* background-color: #42210b; */
            background-color: rgba(79, 32, 13, 1);
            display: none;
            width: 100%;
            height: 520px;
            position: absolute;
            flex-direction: column;
            justify-content: space-around;
        }

        #navbar ul {
            list-style-type: none;
        }

        #navbar ul li {
            font-size: 30px;
            margin: 35px 25px 5px;
            padding: 10px;
            text-align: center;
        }

        #navbar ul li a {
            text-decoration: none;
            text-transform: uppercase;
            color: white;
            font-family: 'Ubuntu', sans-serif;
            font-weight: 500;
        }

        #post-header {
            width: 100%;
            z-index: -1;
        }

        /* styles for the middle contents comes here */
        .center-box {
            width: 50%;
            margin: 5px auto;
            text-align: center;
        }

        .action-btn {
            text-transform: capitalize;
            text-decoration: none;
            text-align: center;
            color: #42210b;
            background-color: #f7921e;
            font-size: 27px;
            font-weight: bold;
            border-left: 6px solid #42210b;
            transition: color 1s, background-color 1s;
            display: inline-block;
            padding: 15px 30px;
            font-family: 'Ubuntu', sans-serif;
            font-weight: 500;
        }

        .action-btn:hover {
            background-color: #42210b;
            color: #f7921e;
        }

        #banner {
            /* add a background image here */
            background-image: url('https://images.pexels.com/photos/2566121/pexels-photo-2566121.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2');
            background-repeat: no-repeat;
            background-size: cover;
            padding: 85px 15px 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        #banner .children {
            text-align: center;
            margin: 15px 10px 5px;
        }

        #banner h1 {
            padding: 25px 0;
            font-size: 55px;
            text-transform: uppercase;
            font-family: 'Play', sans-serif;
            font-weight: 700;
        }

        #banner h2 {
            padding: 15px 0;
            text-transform: uppercase;
            color: white;
            font-family: 'Ubuntu', sans-serif;
            font-weight: 500;
            font-size: 48px;
        }

        #banner p {
            padding: 10px 0;
            color: white;
            font-family: 'Ubuntu', sans-serif;
            font-weight: 500;
            font-size: 32px;
        }

        #boxes {
            border: 1px solid black;
            padding: 25px 15px;
            margin: 1px;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
        }

        .box {
            border: 1px solid red;
            margin: 10px 5px;
            padding: 15px 25px;
        }

        .box h2 {
            border: 1px solid green;
            text-align: center;
            font-size: 38px;
            padding: 10px 20px;
            margin: 15px 0;
            font-family: 'Ubuntu', sans-serif;
            font-weight: 700;
        }

        .box a {
            border: 1px solid red;
            font-size: 25px;
            color: black;
            text-decoration: none;
            margin: 0 5px;
        }

        .box a i {
            border: 1px solid black;
            margin: 1px;
            padding: 1px 4px;
        }

        /* footer */
        .footer {
            background-color: #42210b;
            font-family: 'Ubuntu', sans-serif;
            padding: 20px 5px 0;
        }

        #footer-logo {
            text-decoration: none;
            display: inline-block;
        }

        #footer-logo img {
            width: 100%;
            margin: 5px;
        }

        #icon-emails {
            padding: 2px 3px;
        }

        #icon-emails span {
            display: block;
            margin: 5px 1px;
            font-weight: 400;
            color: rgba(247, 146, 30, 0.5);
        }

        #icon-emails span i {
            padding: 1px;
            margin-right: 4px;
        }

        .sm-icons {
            padding: 6px 3px;
        }

        .sm-icons h4 {
            margin: 2px 0 10px;
            text-transform: uppercase;
            font-weight: 500;
            color: #f7921e;
        }

        .sm-icons a {
            color: rgba(247, 146, 30, 0.5);
            display: inline-block;
            margin: 0 2px;
        }

        .sm-icons a i {
            font-size: 25px;
        }

        #links-x2 {
            padding: 4px 1px;
        }

        #links-x2 h3 {
            text-transform: uppercase;
            margin: 1px;
            font-weight: 500;
            color: #f7921e;
        }

        #links-x2 ul {
            margin: 2px 10px;
        }

        #links-x2 ul li {
            border-bottom: 1px dotted rgba(246, 241, 233, 0.5);
            padding: 10px 0;
            list-style-type: none;
        }

        #links-x2 ul li a {
            text-decoration: none;
            text-transform: capitalize;
            font-size: 16px;
            font-weight: 400;
            color: rgba(247, 146, 30, 0.5);
        }

        .footer #cpyrt-wrapper {
            /* add background-color here */
            background-color: #f7921e;
            margin: 15px 0 0;
            padding: 4px;
        }

        .footer #cpyrt-wrapper p {
            text-transform: capitalize;
            font-size: 13px;
            text-align: center;
            font-weight: 400;
            color: #42210b;
        }
    </style>
</head>
<body>
    <div class="header">
        <a href="<?php echo $_SERVER['PHP_SELF']; ?>" id="navbar-logo"><img src="images\mylogo.svg" alt="htu logo"></a>
        <button onclick="(this.innerHTML == '&#9776;') ? openNav() : closeNav();" id="navbar-btn">&#9776;</button>
        <div id="navbar">
            <ul>
                <li><a href="#">home</a></li>
                <li><a href="#">about</a></li>
                <li><a href="<?php echo $_SERVER['PHP_SELF']; ?>">admissions</a></li>
                <li><a href="pages\login.php">login</a></li>
                <li><a href="pages\register.php">sign up</a></li>
            </ul>
        </div>
    </div>
    <div id="post-header">
        <div id="banner">
            <h1 class="children">Undergraduate Admissions</h1>
            <h2 class="children">App. fee free february!</h2>
            <p class="children">Apply for undergraduate admissions for free from FEB 01 to FEB 15 using: <em>UGfreeFEB</em></p>
            <div class="center-box">
                <a href="pages\login.php" class="action-btn">apply now</a>
            </div>
        </div>
        <div id="boxes">
            <div class="box">
                <h2>Steps to apply</h2>
                <a href="#"><i class="fa-solid fa-arrow-right"></i></a>
            </div>
            <div class="box">
                <h2>Required documents</h2>
                <a href="#"><i class="fa-solid fa-arrow-right"></i></a>
            </div>
            <div class="box">
                <h2>Admissions list - 2023</h2>
                <a href="#"><i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
        <!-- apply now button -->
        <div class="center-box">
            <a href="pages\login.php" class="action-btn">apply now</a>
        </div>
    </div>
    <div class="footer">
        <a id="footer-logo" href="#"><img src="images\htulogo.svg"></a>
        <div id="icon-emails">
            <span><i class="fa-regular fa-envelope"></i><small>info@heightstechuni.edu.ng</small></span>
            <span><i class="fa-regular fa-envelope"></i><small>admissions@heightstechuni.edu.ng</small></span>
        </div>
        <div class="sm-icons">
            <h4>Connect with us</h4>
            <a href="#" target="_blank"><i class="fa-brands fa-youtube"></i></a>
            <a href="#" target="_blank"><i class="fa-brands fa-twitter"></i></a>
            <a href="#" target="_blank"><i class="fa-brands fa-facebook"></i></a>
            <a href="#" target="_blank"><i class="fa-brands fa-instagram"></i></a>
        </div>
        <div id="links-x2">
            <h3>Useful links</h3>
            <ul>
                <li><a href="#">about</a></li>
                <li><a href="#">admissions</a></li>
                <li><a href="#">available courses</a></li>
                <li><a href="#">tuition fees</a></li>
                <li><a href="#">schorlaships</a></li>
                <li><a href="#">login</a></li>
            </ul>
        </div>
        <div id="cpyrt-wrapper">
            <p id="cpyrt">Copyright &copy; 2023 Heights Technical University. All rights reserved</p>
        </div>
    </div>
    <script>
        // js code here

        var item1 = document.getElementById('navbar');
        var item2 = document.getElementById('navbar-btn');
        var x = document.getElementById('post-header');

        function openNav() {
            item1.style.display = "flex";
            item2.innerHTML = "&#9747;";
            item2.style.zIndex = "1";
            item2.style.color = "rgb(247, 146, 30)";

            // test
            console.log("nav opened!");
        }

        function closeNav() {
            item1.style.display = "none";
            x.style.zIndex = "1";
            item2.innerHTML = "&#9776;";
            item2.style.color = "rgb(66, 33, 11)";

            // test
            console.log("nav closed!");
        }
    </script>
</body>
</html>