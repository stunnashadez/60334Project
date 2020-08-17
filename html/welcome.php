<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

require_once "config.php";
 
//create a query to get data from the "classics" table
 
    $query = "SELECT products, COUNT(*) as cnt FROM orders group by products";
    $result = $mysqli->query($query);
    $salesData = array();
    $i=1;
    $salesData[0][0] = 'products';
    $salesData[0][1] = 'Count';
    foreach($result as $data){
        $salesData[$i][0] = $data['products'];
        $salesData[$i][1] = $data['cnt'];
        $i++;
    }
 
 
    if (!$result) echo "Error failed to select data : $query<br>";
    
    $query = "SELECT pmode, COUNT(*) as cnt FROM orders group by pmode";
    $result = $mysqli->query($query);
    $payData = array();
    $i=1;
    $payData[0][0] = 'products';
    $payData[0][1] = 'Payment Method';
    foreach($result as $data){
        $payData[$i][0] = $data['pmode'];
        $payData[$i][1] = $data['cnt'];
        $i++;
    }
 
    if (!$result) echo "Error failed to select data : $query<br>";
    
    
    
    
    if (!$result) echo "Error failed to select data : $query<br>";
    
    $query = "SELECT amount_paid, COUNT(*) as cnt FROM orders group by products";
    $result = $mysqli->query($query);
    $revenueData = array();
    $i=1;
    $revenueData[0][0] = 'Products';
    $revenueData[0][1] = 'Revenue Per Product';
    foreach($result as $data){
        $revenueData[$i][0] = $data['amount_paid'];
        $revenueData[$i][1] = $data['cnt'];
        $i++;
    }
 
    if (!$result) echo "Error failed to select data : $query<br>";
    

    
    
    
    
    
    
    
?>


<!DOCTYPE html>
<html>
<title>Cloud Consulting - Professional Web Design Services</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/font.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<head>

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
  background-image: url("../images/businessperson.png");
  min-height: 100%;
}

.w3-bar .w3-button {
  padding: 16px;
}
</style>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
 
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      //drawChart
      function drawChart() {
        //Encode data to json
        var json_encoded_data = <?php echo json_encode($salesData, JSON_NUMERIC_CHECK);?>;
        //Change json data to required Datatable
        var data = google.visualization.arrayToDataTable(json_encoded_data);
        //Specify title
        var options = {
          title: 'Sales By Percentage'
        };
        //drawChart
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }
 
</script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
 
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      //drawChart
      function drawChart() {
        //Encode data to json
        var json_encoded_data = <?php echo json_encode($salesData, JSON_NUMERIC_CHECK);?>;
        //Change json data to required Datatable
        var data = google.visualization.arrayToDataTable(json_encoded_data);
        //Specify title
        var options = {
          title: 'Sales By Package Type'
        };
        //drawChart
        var chart = new google.visualization.ColumnChart(document.getElementById('piechart2'));
        chart.draw(data, options);
      }
 
</script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
 
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      //drawChart
      function drawChart() {
        //Encode data to json
        var json_encoded_data = <?php echo json_encode($salesData, JSON_NUMERIC_CHECK);?>;
        //Change json data to required Datatable
        var data = google.visualization.arrayToDataTable(json_encoded_data);
        //Specify title
        var options = {
          title: 'Package Sales Trends'
        };
        //drawChart
        var chart = new google.visualization.AreaChart(document.getElementById('piechart3'));
        chart.draw(data, options);
      }
 
</script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
 
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      //drawChart
      function drawChart() {
        //Encode data to json
        var json_encoded_data = <?php echo json_encode($salesData, JSON_NUMERIC_CHECK);?>;
        //Change json data to required Datatable
        var data = google.visualization.arrayToDataTable(json_encoded_data);
        //Specify title
        var options = {
          title: 'Sales Periodic Changes'
        };
        //drawChart
        var chart = new google.visualization.LineChart(document.getElementById('piechart4'));
        chart.draw(data, options);
      }
 
</script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
 
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      //drawChart
      function drawChart() {
        //Encode data to json
        var json_encoded_data = <?php echo json_encode($payData, JSON_NUMERIC_CHECK);?>;
        //Change json data to required Datatable
        var data = google.visualization.arrayToDataTable(json_encoded_data);
        //Specify title
        var options = {
          title: 'Package Payment Methods'
        };
        //drawChart
        var chart = new google.visualization.ColumnChart(document.getElementById('piechart5'));
        chart.draw(data, options);
      }
 
</script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
 
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      //drawChart
      function drawChart() {
        //Encode data to json
        var json_encoded_data = <?php echo json_encode($revenueData, JSON_NUMERIC_CHECK);?>;
        //Change json data to required Datatable
        var data = google.visualization.arrayToDataTable(json_encoded_data);
        //Specify title
        var options = {
          title: 'Revenue By Product'
        };
        //drawChart
        var chart = new google.visualization.ColumnChart(document.getElementById('piechart6'));
        chart.draw(data, options);
      }
 
</script>

</head>

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
      <a href="../html/logout.php" class="w3-bar-item w3-button">Logout</a>
      <a href="../html/resetpassword.php" class="w3-bar-item w3-button">Reset Password</a>
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
  <a href="http://khan112d.myweb.cs.uwindsor.ca/60334/project/html/logout.php" onclick="w3_close()" class="w3-bar-item w3-button">Logout</a>
  <a href="http://khan112d.myweb.cs.uwindsor.ca/60334/project/html/resetpassword.php" onclick="w3_close()" class="w3-bar-item w3-button">Reset Password</a>
</nav>

<!-- Header with full-height image -->
<header class="bgimg-1 w3-display-container w3-grayscale-min" id="home">
  <div class="w3-display-left w3-text-white" style="padding:48px">
    <span class="w3-jumbo w3-hide-small">Admin Dashboard</span><br>
    <span class="w3-large">Check your account & admin tools</span>
    <p><a href="../html/Home.html" class="w3-button w3-white w3-padding-large w3-large w3-margin-top w3-opacity w3-hover-opacity-off">Back to Home</a></p>
  </div> 
  <div class="w3-display-bottomleft w3-text-grey w3-large" style="padding:24px 48px">
    <a href="https://www.snapchat.com/add/cloudconsultinc"><i class="fa fa-snapchat w3-hover-opacity" alt="Snap"></i></a>
    <a href="https://twitter.com/CloudConInc"><i class="fa fa-twitter w3-hover-opacity" alt="Twitter"></i></a>
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



<center><h1>Welcome back <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>, to the Admin Dashboard!</h1></center>




<!-- About Section -->
<div class="w3-container" style="padding:128px 16px" id="about">
  <h3 class="w3-center">CHECK YOUR FREELANCER ACCOUNT AND SALES STATISTICS</h3>
  <p class="w3-center w3-large">Here freelancers can check their accounts and keep up with important information that pertains to their web design contracts.
  You can check out different metrics such as sales, top packages, order information etc. that will help you understand your clients better</p>
  <div class="w3-row-padding w3-center" style="margin-top:64px">
    <div class="w3-quarter">
      <i class="fa fa-money w3-margin-bottom w3-jumbo w3-center" alt="Desktop"></i>
      <p class="w3-large">Sales</p>
      <p>The sales reports and sales statistics are very important to our freelancers as its where they earn their bread and butter, as such
      we have created a panel with sales charts for our freelancers to take a look at so they may better understand where they stand and how they can
      improve these numbers</p>
    </div>
    <div class="w3-quarter">
      <i class="fa fa-database w3-margin-bottom w3-jumbo" alt="Heart"></i>
      <p class="w3-large">Database</p>
      <p>We store our data without our own database in which we can access anytime to give our freelancers the information they need in various different
      formats so that they can make better strategic decisions when it comes to their clients, and can understand how they can make the client experience better
      through the use of data and analytics</p>
    </div>
    <div class="w3-quarter">
      <i class="fa fa-pie-chart w3-margin-bottom w3-jumbo" alt="Diamond"></i>
      <p class="w3-large">Charts & Graphs</p>
      <p>As freelancers it is important to utilize the numerous charts and graphs available to you so that you are able to see the bigger picture in front of your eyes 
      which may allow you to make better informed decisions with regard to your approach when it comes to handling client contracts. These also help when 
      you aren't given much information from a client and need to make a decision based on past experiences</p>
    </div>
    <div class="w3-quarter">
      <i class="fa fa-cog w3-margin-bottom w3-jumbo" alt="Cog"></i>
      <p class="w3-large">Freelancer Support</p>
      <p>If you are a freelancer and you need any assistance then do not be afraid to contact us anytime. Whether by 
e-mail, phone, or in person. You can also reach us at our social media platforms if you desire.
Any questions or concerns that you may have even if they are minuscule we would be happy to clear them up. 
Or if you don't completely understand how to go about dealing with a client and/or the work required you can contact us and we can help you complete your contract
so that you may get paid and continue with further contracts.</p>
    </div>
  </div>
</div>


<center>

<div id="piechart" style="width: 900px; height: 500px;"></div>

<div id="piechart2" style="width: 900px; height: 500px;"></div>

<div id="piechart3" style="width: 900px; height: 500px;"></div>

<div id="piechart4" style="width: 900px; height: 500px;"></div>

<div id="piechart5" style="width: 900px; height: 500px;"></div>

<div id="piechart6" style="width: 900px; height: 500px;"></div>

</center>








<!-- Team Section -->
<div class="w3-container" style="padding:128px 16px" id="team">
  <h3 class="w3-center">Charts & Graphs</h3>
  <p class="w3-center w3-large">Know what you are working with!</p>
  <div class="w3-row-padding w3-grayscale" style="margin-top:64px">
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
        <img src="../images/piechart.png" alt="Rocky" style="width:100%">
        <div class="w3-container">
          <h3>Pie Charts</h3>
          <p class="w3-opacity">Pie Charts</p>
          <p>Pie charts are generally used to show percentage or proportional data and usually the percentage represented by each category
          is provided next to the corresponding slice of pie. Pie charts are good for displaying data for around 6 categories or fewer.</p>
        </div>
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
        <img src="../images/columnchart.png" alt="David" style="width:100%">
        <div class="w3-container">
          <h3>Column Charts</h3>
          <p class="w3-opacity">Column Charts</p>
          <p>Column charts are typically used to compare several items in a specific range of values. Column charts are ideal if you need to compare
          a single category of data between individual sub-items, such as, for example, when comparing revenue between two different packages.</p>
      </div>
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
        <img src="../images/linechart.png" alt="Claire" style="width:100%">
        <div class="w3-container">
          <h3>Line Graphs</h3>
          <p class="w3-opacity">Line Graphs</p>
          <p>Line graphs are used to track changes over short and long periods of time. When smaller changes exist, line graphs are better to use than
          bar graphs. Line graphs can also be used to compare changes over the same period of time for more than one group.</p>
      </div>
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
        <img src="../images/areachart.png" alt="Dan" style="width:100%">
        <div class="w3-container">
          <h3>Area Charts</h3>
          <p class="w3-opacity">Area Charts</p>
          <p>Area charts are used to represent cumulated totals using numbers or percentages (stacked area charts in this case) over time. 
          Use the area chart for showing trends over time among related attributes.</p>
      </div>
      </div>
    </div>
  </div>
</div>






<!-- Footer -->
<footer class="w3-center w3-black w3-padding-64">
  <a href="../html/welcome.php" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right" alt="arrow"></i>To the top</a>
  <div class="w3-xlarge w3-section">
    <a href="https://www.snapchat.com/add/cloudconsultinc"><i class="fa fa-snapchat w3-hover-opacity" alt="Snap"></i></a>
    <a href="https://twitter.com/CloudConInc"><i class="fa fa-twitter w3-hover-opacity" alt="Twitter"></i></a>
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