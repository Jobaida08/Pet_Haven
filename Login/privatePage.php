<?php
session_start(); 
if (!isset($_SESSION['username'])) {
    header("Location: ../Login/login.html"); 
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Home - Pet Haven</title>

    <!-- Connect to JS -->
    <script defer src="assests/js/login.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="assests/fonts/font-awesome/css/all.css">

    <!-- Main Style -->
    <link rel="stylesheet" href="assests/css/privatePage_style.css">

    <!-- Favicon -->
    <link rel="shortcut icon" href="assests/img/Favicon/favicon_1.png" type="image/x-icon">
</head>

<body>
    
    <header>
        <div id="logo">
            <img src="assests/img/petlogo.png" alt="Pet Store Logo" height="40">';
            <span id="site-title">Pet Haven</span>
        </div>
        <nav>
            <div class="first">
                <a href="../My Profile/myProfile.html">My Profile</a>
                <a href="../Contact/contact.html">Contact</a>
                <a href="../Login/login.html" class="login-btn">Logout</a>
            </div>
        </nav>
    </header>


    <section id="hero">
        <div class="row">
            <div class="pet-listings">
                <h2>View Pet Listings</h2>
                    <select id="subject">
                        <option value="Pet Lists">Pet Lists</option>
                        <option value="Dogs">Dogs</option>
                        <option value="Cats">Cats</option>
                        <option value="Gold Fish">Gold Fish</option>
                        <option value="Parrots">Parrots</option>
                    </select>
                </a>
            </div>
            <div class="wish-list">
                <h2>View Wish List</h2>
                    <select id="subject">
                        <option value="Wish List">Wish List</option>
                        <option value="Puppy">Volunteer Opportunity</option>
                        <option value="Turtle">Turtle</option>
                        <option value="Hamstar">Hamstar</option>
                    </select>
                </a>
            </div>
        </div>
    </section>

    <footer>
        <p>&copy; 2023 Pet Haven - Private Page. All rights reserved</p>
    </footer>
</body>

</html>
