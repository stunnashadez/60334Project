<?php

$Name = $_POST['Name'];
$Email = $_POST['Email'];
$Subject = $_POST['Subject'];
$Message = $_POST['Message'];

if (!empty($Name) || !empty($Email) || !empty($Subject) || !empty($Message)) {

    $host = "localhost";
    $dbUsername = "khan112d_pbl";
    $dbPassword = "mypassword";
    $dbname = "khan112d_pbl";

    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
        
     $SELECT = "SELECT Email From contact Where Email = ? Limit 1";
     $INSERT = "INSERT Into contact (Name, Email, Subject, Message) values(?, ?, ?, ?)";

     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $Email);
     $stmt->execute();
     $stmt->bind_result($Email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
    
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssss", $Name, $Email, $Subject, $Message);
      $stmt->execute();
      echo "";
     } else {
      echo "Someone already registered using this email";
     }
     
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}


?>


<!DOCTYPE html>
<html>
<title>Cloud Consulting - Professional Web Design Services</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/font.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}

body, html {
  height: 100%;
  line-height: 1.8;
}

/* Full height image header */
.bgimg-1 {
  background-position: center;
  background-size: cover;
  background-image: url("../images/customercare.png");
  min-height: 100%;
}

.w3-bar .w3-button {
  padding: 16px;
}
</style>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top"> 
  <div class="w3-bar w3-white w3-card" id="myNavbar">
    <a href="../html/Home.html" class="w3-bar-item w3-button w3-wide">Cloud Consulting</a>
    <!-- Right-sided navbar links -->
    <div class="w3-right w3-hide-small">
      <a href="../html/Home.html" class="w3-bar-item w3-button">Home</a>
      <a href="../html/Services.html" class="w3-bar-item w3-button">Services</a>
      <a href="../html/Contact.html" class="w3-bar-item w3-button">Contact</a>
      <a href="../html/About.html" class="w3-bar-item w3-button">About</a>
      <a href="../html/login.php" class="w3-bar-item w3-button">Admin</a>
    </div>
    <!-- Hide right-floated links on small screens and replace them with a menu icon -->

    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</div>

<!-- Sidebar on small screens when clicking the menu icon -->
<nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Close</a>
  <a href="http://khan112d.myweb.cs.uwindsor.ca/60334/project/html/Home.html" onclick="w3_close()" class="w3-bar-item w3-button">Home</a>
  <a href="http://khan112d.myweb.cs.uwindsor.ca/60334/project/html/Services.html" onclick="w3_close()" class="w3-bar-item w3-button">Services</a>
  <a href="http://khan112d.myweb.cs.uwindsor.ca/60334/project/html/Contact.html" onclick="w3_close()" class="w3-bar-item w3-button">Contact</a>
  <a href="http://khan112d.myweb.cs.uwindsor.ca/60334/project/html/About.html" onclick="w3_close()" class="w3-bar-item w3-button">About</a>
  <a href="http://khan112d.myweb.cs.uwindsor.ca/60334/project/html/login.php" onclick="w3_close()" class="w3-bar-item w3-button">Admin</a>
</nav>

<!-- Header with full-height image -->
<header class="bgimg-1 w3-display-container w3-grayscale-min" id="home">
  <div class="w3-display-left w3-text-white" style="padding:48px">
    <span class="w3-jumbo w3-hide-small">Message Sent</span><br>
    <span class="w3-large">Your message has been sent we will reach out to you as soon as possible!</span>
    <p><a href="../html/Services.html" class="w3-button w3-white w3-padding-large w3-large w3-margin-top w3-opacity w3-hover-opacity-off">Hire A Professional</a></p>
  </div> 
  <div class="w3-display-bottomleft w3-text-grey w3-large" style="padding:24px 48px">
    <a href="https://www.snapchat.com/add/cloudconsultinc"><i class="fa fa-snapchat w3-hover-opacity" alt="snap"></i></a>
    <a href="https://twitter.com/CloudConInc"><i class="fa fa-twitter w3-hover-opacity" alt="twitter"></i></a>
  </div>
</header>

<!-- Promo Section "Statistics" -->
<div class="w3-container w3-row w3-center w3-dark-grey w3-padding-64">
  <div class="w3-quarter">
    <span class="w3-xxlarge">5+</span>
    <br>Years Experience
  </div>
  <div class="w3-quarter">
    <span class="w3-xxlarge">50+</span>
    <br>Projects Completed
  </div>
  <div class="w3-quarter">
    <span class="w3-xxlarge">100+</span>
    <br>Happy Clients
  </div>
  <div class="w3-quarter">
    <span class="w3-xxlarge">500+</span>
    <br>Websites Designed
  </div>
</div>


<!-- Promo Section - "We know design" -->
<div class="w3-container w3-light-grey" style="padding:128px 16px">
  <div class="w3-row-padding">
    <div class="w3-col m6">
      <h3>Thank you for choosing Cloud Consulting</h3>
      <p>Your message has been sent, we will get back to you as soon as possible.</p>
    </div>
    <div class="w3-col m6">
      <img class="w3-image w3-round-large" src="../images/submitted.png" alt="Submitted" width="700" height="394">
    </div>
  </div>
</div>



<!-- Footer -->
<footer class="w3-center w3-black w3-padding-64">
  <a href="../html/Submitted.html" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right" alt="arrow"></i>To the top</a>
  <div class="w3-xlarge w3-section">
    <a href="https://www.snapchat.com/add/cloudconsultinc"><i class="fa fa-snapchat w3-hover-opacity" alt="snap"></i></a>
    <a href="https://twitter.com/CloudConInc"><i class="fa fa-twitter w3-hover-opacity" alt="twitter"></i></a>
  </div>
  </footer>
 
<script>
// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}


// Toggle between showing and hiding the sidebar when clicking the menu icon
var mySidebar = document.getElementById("mySidebar");

function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
  } else {
    mySidebar.style.display = 'block';
  }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
}
</script>

</body>
</html>