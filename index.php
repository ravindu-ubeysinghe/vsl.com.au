<!DOCTYPE HTML>
<!--
	Big Picture by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<?php
    /**
     * Handles form calls for VSL
     */
    $post_message = '';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $enquiry_type = $_POST['topic'];
    $message = $_POST['message'];

    if( isset($name) && isset($email) && isset($enquiry_type) && isset($message) ){
        if(filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL)){
            $admin_email = 
            "
                <div style='font-size:14px; font-family:Arial;'>
                    Hi Admin,<br /><br />
                    You've received a new enquiriy with the following information:<br /><br />
                    <strong>Enquirer Name</strong>: {$name}<br />
                    <strong>Email Address</strong>: {$email}<br />
                    <strong>Message</strong>: {$message}<br /><br />
                    Thank you.
                </div>
            ";
            // To send HTML mail, the Content-type header must be set
            $headers  = "MIME-Version: 1.0".PHP_EOL;
            $headers .= "Content-type: text/html; charset=iso-8859-1".PHP_EOL;
            $headers .= "From: info@www.vsl.com.au".PHP_EOL.
                        "Reply-to: {$email}".PHP_EOL;

            switch($enquiry_type){
                case 'general':
                    mail("admin@vslskiclub.com.au", "You've received a new enquiry from www.vsl.com.au", $admin_email, $headers);
                    break;
                case 'booking':
                    mail("bookings@vslskiclub.com.au", "You've received a new enquiry from www.vsl.com.au", $admin_email, $headers);
                    break;
                case 'membership':
                    mail("membership@vslskiclub.com.au", "You've received a new enquiry from www.vsl.com.au", $admin_email, $headers);
                    break;
                default:
                    mail("admin@vslskiclub.com.au", "You've received a new enquiry from www.vsl.com.au", $admin_email, $headers);
            }

            $post_message = "<div class=\"alert alert-success post-message\" role=\"alert\">We've successfully received your message and we will get in touch with you shortly</div>";
        }else{
            $post_message = "<div class=\"alert alert-danger post-message\" role=\"alert\">Sorry, something has gone wrong! Please try again later.</div>";
        }
    } 

?>
<html>

<head>
    <title>VSL Ski Club</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
    <script src="assets/js/jquery.min.js"></script>
</head>

<body class="is-preload">

    <!-- Additional styling -->
    <style>
        .alert{
            position: relative;
            padding: .75rem 1.25rem;
            margin-bottom: 1rem;
            border: 1px solid transparent;
            border-radius: .25rem;
        }

        .alert-success{
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }

        .alert-danger{
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }

        .post-message{
            text-align: left;
        }
    </style>

    <!-- Additional scripts -->
    <script>
        $(function(){

            var prevHeight = localStorage.getItem("prevHeight");
            if(prevHeight){
                $('html, body').animate({
                    scrollTop: localStorage.getItem("prevHeight")
                }, 1000);
                setTimeout(function(){
                    $(".post-message").fadeOut(1000, function(){
                        $(this).remove();
                    });
                    console.log(`here ${prevHeight}`);
                }, 3000); 
                localStorage.setItem("prevHeight", null);
            }

            $("form").on("submit", function(){
                localStorage.setItem("prevHeight", $(window).scrollTop()+100);
            });
        });
    </script>

    <!-- Header -->
    <header id="header">
        <h1>VSL - Mt Buller</h1>
        <nav>
            <ul>
                <li><a href="#intro">Intro</a></li>
                <li><a href="#one">The lodge</a></li>
                <li><a href="#two">How it works</a></li>
                <li><a href="#work">Photo gallery</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
    </header>

    <!-- Intro -->
    <section id="intro" class="main style1 dark fullscreen">
        <div class="content">
            <header><img src="images/logo.png">
                <h2>VSL Ski Club</h2>
            </header>
            <p>VSL is known for its family friendly atmosphere and warm welcome. VSL offers families and groups an ideal opportunity to experience a snow holiday during off peak periods at a discounted rate. The Club is situated among the snow gums in a
                panoramic setting on Chamois Road, 5 minutes walk from The Village. With a free shuttle bus stop just outside, VSL offers easy access to and from all <a href="http://www.mtbuller.com.au/" target="_blank">Mt Buller facilities</a>, including
                ticket offices and the ski school.
            </p>
            <footer>
                <a href="#one" class="button style2 down">More</a>
            </footer>
        </div>
    </section> 

    <!-- One -->
    <section id="one" class="main style2 left dark fullscreen">
        <div class="content box style2">
            <header>
                <h2>The Lodge</h2>
            </header>
            <p>VSL has spacious living and dining areas and a separate TV area. It is a 52-bed lodge with large bedrooms comprising generous sized double bunks and single bunk beds, ideal for families and other groups. Accommodation is flexible to suit individual
                needs as well as groups. Generously sized, modern bathrooms comprising shower, toilet &amp; vanity are located near the bedrooms. VSL operates as a traditional club lodge with shared kitchen and living areas.</p>
        </div>
        <a href="#two" class="button style2 down anchored">Next</a>
    </section>

    <!-- Two -->
    <section id="two" class="main style2 left dark fullscreen">
        <div class="content box style2">
            <header>
                <h2>How it works...</h2>
            </header>
            <p>Members and guests are required to clean up after themselves and wash their own dishes and keep living areas clean &amp; tidy after use. Rooms are required to be tidied and vacuumed before departure. Our live-in Manager is available to assist
                you to make the most of your stay at VSL. We find that our guests enjoy the bustle of activity at the end of the day and around meal times and the opportunity to enjoy the company of other guests and club members around the traditional
                open fire in the downstairs living room.</p>
        </div>
        <a href="#work" class="button style2 down anchored">Next</a>
    </section>

    <!-- Work -->
    <section id="work" class="main style3 primary">
        <div class="content">
            <header>
                <h2>Photo gallery</h2>
                <p>We look forward to welcoming you to VSL Ski Club this winter.</p>
            </header>

            <!-- Gallery  -->
            <div class="gallery">
                <article class="from-left">
                    <a href="images/fulls/01.jpg" class="image fit"><img src="images/thumbs/01.jpg" title="By the fire" alt="" /></a>
                </article>
                <article class="from-right">
                    <a href="images/fulls/02.jpg" class="image fit"><img src="images/thumbs/02.jpg" title="Airchitecture II" alt="" /></a>
                </article>
                <article class="from-left">
                    <a href="images/fulls/03.jpg" class="image fit"><img src="images/thumbs/03.jpg" title="Air Lounge" alt="" /></a>
                </article>
                <article class="from-right">
                    <a href="images/fulls/04.jpg" class="image fit"><img src="images/thumbs/04.jpg" title="Carry on" alt="" /></a>
                </article>
                <article class="from-left">
                    <a href="images/fulls/05.jpg" class="image fit"><img src="images/thumbs/05.jpg" title="The sparkling shell" alt="" /></a>
                </article>
                <article class="from-right">
                    <a href="images/fulls/06.jpg" class="image fit"><img src="images/thumbs/06.jpg" title="Bent IX" alt="" /></a>
                </article>
            </div>

        </div>
    </section>

    <!-- Contact -->
    <section id="contact" class="main style3 secondary">
        <div class="content">
            <header>
                <h2>Say Hello.</h2>


            </header>
            <div class="box">
                <p style="text-align: left">We'd love to hear from you... enquire about staying with us or becoming a member</p>
                <form method="POST" action="/">
                    <div class="fields">
                        <div class="field half"><input type="text" name="name" placeholder="Name" required/></div>
                        <div class="field half"><input type="email" name="email" placeholder="Email" required/></div>
                        <div class="field">
                            <select name="topic">
										<option value="general">Pick a subject...</option>
										<option value="general">General enquiry</option>
									  <option value="booking">Bookings</option>
									  <option value="membership">Membership</option>
									</select>
                        </div>
                        <div class="field"><textarea name="message" placeholder="Message..." rows="6" required></textarea></div>
                    </div>
                    <ul class="actions special">
                        <li><input type="submit" value="Send Message" /></li>
                    </ul>
                    <p><?php echo $post_message; ?></p>
                </form>

            </div>
            <p>24 Chamois Road, Mt Buller, Victoria <br>
                <strong>(ph) 03 5777 6284</strong><br> General correspondence to: PO Box 273, Sandringham 3191<br> bookings@vslskiclub.com.au | admin@vslskiclub.com.au<br>
            </p>
            <p><a href="http://maps.google.com.au/maps/ms?hl=en&ie=UTF8&msa=0&msid=105445306557653683575.00046b41e3ffd28ae3200&ll=-37.147764,146.454577&spn=0.009988,0.014827&t=h&z=16" class="icon fa-map-marker" target="_blank"> View location on google maps</a></p>
        </div>
    </section>

    <!-- Footer -->
    <footer id="footer">

        <!-- Icons -->
        <ul class="icons">
            <!--<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>-->
            <li><a href="https://www.facebook.com/groups/164483483669249/" class="icon fa-facebook" target="_blank"><span class="label">Facebook</span></a></li>
            <li><a href="https://www.mtbuller.com.au/Winter/snow-weather/snow-report" class="icon fa-snowflake-o" target="_blank"><span class="label">Snow report</span></a></li>
            <li>
                <a href="http://www.mtbuller.com.au" target="_blank"><img src="images/mtbullerlogo.png" style="vertical-align: middle; padding-left: 5px"></a>
            </li>
            <!--<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>-->
            <!--<li><a href="#" class="icon fa-linkedin"><span class="label">LinkedIn</span></a></li>-->
            <!--<li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>-->
            <!--<li><a href="#" class="icon fa-pinterest"><span class="label">Pinterest</span></a></li>-->
        </ul>

        <!-- Menu -->
        <ul class="menu">
            <li>
                <!--&copy; Untitled</li><li>Design:--><a href="http://www.vslskiclub.com.au/members" target="_blank">Member login</a></li>
            <li><a href="http://www.vslskiclub.com.au/committee" target="_blank">Committee login</a></li>
        </ul>

    </footer>

    <!-- Scripts -->

    <script src="assets/js/jquery.poptrox.min.js"></script>
    <script src="assets/js/jquery.scrolly.min.js"></script>
    <script src="assets/js/jquery.scrollex.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>