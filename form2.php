<?php
    $msg = '';
    $msgClass = '';

    if(filter_has_var(INPUT_POST, 'submit')){
        //get form data
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $comments = htmlspecialchars($_POST['comments']);

        //check required fields
        if(!empty($email) && !empty($name) && !empty($comments)){
            if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
                //failed email validation
                $msg="<h3 class='danger'>Please Enter Valid Email.</h3>";
                $msgClass="danger";
            }else{
                $to = 'im-roberto@roberto-bayona.com';
                $subject = 'Contact Request From:' . $name;
                $body = `<h2>Contact Request</h2>
                <h4>Name</h4>` . '<p>'. $name.'</p>'.
                `<h4>Email</h4>` . '<p>'. $email.'</p>'.
                `<h4>Message</h4>` . '<p>'. $comments.'</p>';

                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .="Content-Type:text/html;charset=UTF-8" . "\r\n";
                $headers .= "From:" . $name. "<". $email . ">". "\r\n";

                if(mail($to, $subject, $body, $headers)){
                    $msg="<h3 class='success'>Email Submitted!</h3>";
                    $msgClass="success";
                }else{
                    $msg="<h3 class='danger'>An error occurred.</h3>";
                    $msgClass="danger";
                }
            };

        }else{
            $msg="<h3 class='danger'>Please fill out all fields</h3>";
            $msgClass="danger";
        };
    };
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/mobile.css">
    <title>Business Form</title>
</head>

<body>
<div class="toTop">
        <div class="topBtn"><i class="fas fa-chevron-circle-up"></i></div>
    </div>
    <nav class="navbar">
        <div class="navbar_header">
            <img src="Images/logoH.png" class="logo1"alt="heart shaped logo">
                <div class="navBtn">
                    <div class="bar bar1"></div>
                    <div class="bar bar2"></div>
                    <div class="bar bar3"></div>
                </div>
        </div>
        <ul class="navbarLinks">
            <li><a href="index.html" class="navbarlink">Home</a></li>
            <li><a href="form1.php" class="navbarlink">Volunteer</a></li>
            <li><a href="form2.php" class="navbarlink">Trials</a></li>
            <li><a href="#sec7" class="navbarlink">Contact</a></li>
        </ul>
    </nav>
    <div class="navBarWrapper">
        <nav class="navBar2">
            <img src="Images/logoH.png" class="logo3"alt="heart shaped logo">
            <ul class="navbarLinks2">
                <li><a href="index.html" class="navbarlink">Home</a></li>
                <li><a href="form1.php" class="navbarlink">Volunteer</a></li>
                <li><a href="form2.php" class="navbarlink">Trials</a></li>
                <li><a href="#sec7" class="navbarlink">Contact</a></li>
            </ul>
        </nav>
    </div>

    <div class="formContainer">
        <h2>Business Contact</h2>
        <?php if($msg != ''):?>
            <div class="alert <?php echo $msgClass ?>"><?php echo $msg ?></div>
        <?php endif; ?>
        <form class="frmCrd" action="<?php echo $_SERVER['PHP_SELF'];?> " method="post">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="<?php echo isset($_POST['name'])? $name : ''; ?>"/><br>
                <label for="name">Email:</label>
                <input type="text" name="email" id="email" value="<?php echo isset($_POST['email'])? $email : ''; ?>"/><br>
                <label for="comments">Comments:</label><br>
                <textarea name="comments" id="comments" cols="30" rows="10" maxlength="50" placeholder="Briefly list your conditions:">
                <?php echo isset($_POST['comments'])? $comments : ''; ?>
                </textarea>
                <button class="submitBtn" type="submit" name="submit">Submit</button>
        </form>
    </div>

    <section id="sec7">
        <h3>Pharma Research Associates</h3>
        <div class="mobilePar">
            <div class="footerWrap">
                <h4>Contact</h4>
                <ul class="footerPar contactPar">
                    <a href="tel:305-381-5319">
                        <li class="footerChld">305.381.5319 (Hablabmos Espanol)</li>
                    </a>
                    <a href="https://goo.gl/maps/cYXrQhNGrgCGPsEf7" target="_blank"><li class="footerChld">7801 SW 24 street Suite 112 Westchester,FL 33155</li></a>
                    <a href="mailto:enroll@pharmaresearchtrials.com"><li class="footerChld">enroll@pharmaresearchtrials.com</li></a>
                    <li class="footerChld">Hours of operation <br>Mon-Fri: 10:00-5:00pm<br>Sat: by appointment</li>
                </ul>
            </div>
            <div class="footerWrap">
                <h4>FAQ</h4>
                <ul class="footerPar faqPar">
                    <a href="faq.html"><li class="footerChld">Clinical research defined</li></a>
                    <a href="faq.html"><li class="footerChld">What are the Benefits</li></a>
                    <a href="faq.html"><li class="footerChld">What are the Risks</li></a>
                    <a href="faq.html"><li class="footerChld">Know your Rights</li></a>
                </ul>
            </div>

            <div class="footerWrap">
                <h4>Location</h4>
                <ul class="footerPar">
                    <li class="footerChld location">   
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3593.667708760241!2d-80.32458738497934!3d25.74850018364274!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88d9b8f60bfff1d1%3A0x9aaf7b368dfee992!2s7801%20SW%2024th%20St%20%23112%2C%20Miami%2C%20FL%2033155!5e0!3m2!1sen!2sus!4v1613155367025!5m2!1sen!2sus" width="200" height="200" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>                </div>
                    </li>

                </ul>
            </div>
        </div>
    </section>
    <script src="Script/script.js"></script>
</body>
</html>