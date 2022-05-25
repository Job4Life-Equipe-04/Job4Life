<!DOCTYPE html>
<html lang="EN">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Internships research agency">
    <meta name="theme-color" content="#3DD2D4">
    <title>Job4Life · Find an internship, a trainee or a company!</title>
    <link rel="icon" href="./assets/images/favicon.ico">
    <link rel="stylesheet" href="./style/index.css">
    <link rel="manifest" href="./manifest.json">
    <link rel="apple-touch-icon" href="assets/images/icon-192.png">
</head>

<body data-barba="wrapper">
    <header>
        <nav>
            <div type="button" id="color-site">
                <i class="mode"></i>
            </div>
            <ul>
                <li><a href="#"><img src="./assets/images/job4life.png" alt="Job4Life logo"></a></li>
                <li><a href="index.php">Internships</a></li>
                <li><a href="./students.php">Students</a></li>
                <li><a href="./companies.php">Companies</a></li>
                <li><a href="./contact.php">Contact</a></li>
            </ul>
            <div id="account-button">
                <?php 
             session_start();
            if(isset($_SESSION['student'])) {
                    echo "<span class='nav-span'>".$_SESSION['student']."</span>";
             ?>
                <div class="login-menu">
                    <a href="./back-end/server/account/account.php">My account</a>
                    <a href="./back-end/server/account/logout.php">Log out</a>
                </div>
                <?php } else {
                    echo '<span class="nav-span">Sign in</span>';
                } ?>
                <img src="./assets/images/login-icon.svg" alt="A person" id="icon-person">
            </div>
        </nav>
    </header>

    <main data-barba="container" data-barba-namespace="contact">
        <div class="blacknav"></div>
        <div class='row'>
            <div class='column'>
                <div class="informations">
                    <h1>Questions, comments? Tell us everything, we'll answer you.</h1>
                    <h2>Email : contact@job4life.fr</h2>
                    <h2>Need to call us ? Our phone number : 06.74.06.89.45</h2><br>
                    <iframe width="600" height="450" loading="lazy"
                        src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=15%20Noel%20St,%20London,%20Royaume-Uni+(Job4Life%20%C2%B7%20Internships%20research%20agency)&amp;t=&amp;z=16&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">
                        <a href="https://www.gps.ie/marine-gps/">Job4Life location</a></iframe>
                </div>
            </div>
            <div class='column'>
                <div class='contactform'>
                    <form method="post" id="forms" action="./back-end/server/mail/contact-mail.php"
                        enctype='multipart/form-data'>
                        <p>Contact us:</p><br>
                        <p><input type=" text" name="usernamecontact" placeholder="Your last name" required />
                        </p><br>
                        <p><input type="text" name="userfirstnamecontact" placeholder="Your first name" required /></p>
                        <br>
                        <p><input type="text" name="useremailcontact" placeholder="Example@example.com" required /></p>
                        <br>
                        <p><input type="text" name="subjectcontact" placeholder="Subject" /></p><br>
                        <p><textarea name="messagecontact" rows="2" cols="50" placeholder="Your questions"></textarea>
                        </p><br>

                        <label for="userpdfcontact">Choose a profile picture:</label>
                        <input type="file" id="userpdfcontact" name="userpdfcontact" accept="application/pdf">
                        <p><input type="submit" name="submitcontact" value="Send" id="send" /></p>
                    </form>
                    <?php

                if(isset($_GET['msg=succ']))
                {
                    
                }


                    ?>
                </div>
            </div>
        </div>
    </main>

    <div class="cont-space">
        <div class="space">
            <div class="login">
                <h3>You already have an account?</h3>
                <h4>Sign in!</h4>
                <span>You are</span>
                <p>Student<button class="status"><i class="statut-type"></i></button>Recruiter</p>
                <form action="./back-end/server/account/connection.php" method="POST">
                    <label for="signin-login">Your username (or your email)</label><br>
                    <input type="text" name="signin-login" placeholder="Username or email"><br>
                    <label for="signin-password">Your password</label><br>
                    <input type="password" name="signin-password" placeholder="Password"><br>
                    <a href="./back-end/server/account/forgot.php">Forgot password?</a><br>
                    <button type="submit" class="sign-in">Sign in</button>
                    <?php require_once './back-end/http-errors/http-login.php' ?>
                </form>
            </div>
            <div class="registration">
                <div class="closed">
                    <div class="cross"></div>
                    <div class="cross"></div>
                </div>
                <div class="create-account">
                    <p>LL</p>
                    <p>LL</p>
                    <a href="./creation.php">Sign up</a>
                </div>
            </div>
        </div>
    </div>
    <section id="filters-offers">
        <div id="filter-list">
            <p>Lorem ipsum dolor sit amet.</p>
        </div>
    </section>
    <div class="loading">
        <div class="loader-cont">
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="shadow"></div>
            <div class="shadow"></div>
            <div class="shadow"></div>
            <div class="loading-text">
                <span>L</span>
                <span>O</span>
                <span>A</span>
                <span>D</span>
                <span>I</span>
                <span>N</span>
                <span>G</span>
            </div>
        </div>
    </div>

    <div class="cont-bands">
        <div class="band"></div>
        <div class="band"></div>
        <div class="band"></div>
        <div class="band"></div>
        <div class="band"></div>
        <div class="band"></div>
        <div class="band"></div>
        <div class="band"></div>
        <div class="band"></div>
        <div class="band"></div>
    </div>
    <div id="progress"></div>
    <div class="cursor"></div>

    <footer>
        <div class="footer-ul">
            <div class="services">
                <h4>Our services</h4>
                <ul>
                    <li><a href="#">Find an internship</a></li>
                    <li><a href="#">Find a company</a></li>
                    <li><a href="#">Find a trainee</a></li>
                </ul>
            </div>

            <div class="contact">
                <h4>Contact us</h4>
                <ul>
                    <li>+44 20 41 34 56 78</li>
                    <li>contact@job4life.fr</li>
                    <li>15 Noel St, London W1F 8GJ, <br> United Kingdom</li>
                </ul>
            </div>
            <div class="opening">
                <h4>Opening hours</h4>
                <ul>
                    <li>✅ Mon 8AM - 5PM</li>
                    <li>✅ Tue 9AM - 5PM</li>
                    <li>✅ Wed 11AM - 4PM</li>
                    <li>✅ Thu 9AM - 5PM</li>
                    <li>✅ Fri 9AM - 5PM</li>
                    <li>❌ Sat Closed</li>
                    <li>❌ Sun Closed</li>
                </ul>
            </div>
            <div class="networks">
                <h4>Our networks</h4>
                <ul>
                    <li><a href="https://www.linkedin.com" target="Blank"><img src="./assets/images/linkedin-logo.svg"
                                alt="Linkedin logo" class="footer-img">
                            Linkedin/Job4Life</a></li>
                    <li><a href="https://fr-fr.facebook.com" target="Blank"><img src="./assets/images/facebook-logo.svg"
                                alt="Facebook logo" class="footer-img">
                            Facebook/Job4Life</a></li>
                    <li><a href="http://twitter.com/" target="Blank"><img src="./assets/images/twitter-logo.svg"
                                alt="Twitter logo" class="footer-img">
                            Twitter/Job4Life</a></li>
                    <li><a href="http://youtube.com/" target="Blank"><img src="./assets/images/youtube-logo.svg"
                                alt="Youtube logo" class="footer-img"> Youtube/Job4Life</a></li>
                </ul>
            </div>
            <span>Job4Life</span>
        </div>
        <a href="#" id="copyrights">© Copyright 2022 Job4Life. All rights reserved.</a>
    </footer>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.4.1/gsap.min.js"></script>
<script src="https://unpkg.com/@barba/core"></script>
<script src="./script/jquery-3.6.0.min.js"></script>
<script src="./script/script.js"></script>

</html>