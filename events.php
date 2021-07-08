<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="css/styles.css" rel="stylesheet">
</head>
<style>
    body{
        background-color:#dddddd;
    }
</style>
<body>
    <div class="collegeMain">


    <div id="collegeBanner">
      <!--  <img src="images/college.jpeg" alt="College Banner Picture"> -->
      <h2 class="college-heading">SWAMI VIVEKANAND COLLEGE</h2>
    </div>

    <div id="NavigationBar">
        <ul>
            <li><a href="college.php">Home</a></li>
            <li><a href="admission.php">Admissions</a></li>
            <li><a href="adminLogin.php">Admin Login</a></li>
            <li><a href="index.php">Student Login</a></li>
            <li><a href="events.php">Events</a></li>
            <li><a href="news.php">Institute News</a></li>
        </ul>
    </div>

    <div id="content">
    <marquee behavior="" direction=""><p style="color:blue;font-style:700">IMPORTANT NOTICE!</p></marquee>
    <div class="sidebar">

        <ul>
            <li><a href="">Admission</a></li>
            <li><a href="">Student Login</a></li>
            <li><a href="">News</a></li>
            <li><a href="">College Events</a></li>
            <li><a href="">Academic Fee Structure</a></li>
            <li><a href="">Academic Syllabus</a></li>
            <li><a href="">Contact Details</a></li>
        </ul>
    </div>

    <div class="main">
    
    <!-- Gallery for event images -->
    <div class="row">

    <div class="col-4">
        <a href="images/events/event1.jpg"><img class="eventgallery-img" src="images/events/event1.jpg" alt="event1"></a>
        <p style="text-align:center;font-weight:700">Internation Women's Day</p>
    </div>

    <div class="col-4">
    <a href="images/events/event2.png"><img class="eventgallery-img" src="images/events/event2.png" alt="event2"></a>
    <p style="text-align:center;font-weight:700">Understanding Transgender for Inclusive society</p>
    </div>

    <div class="col-4">
    <a href="images/events/event3.png"><img class="eventgallery-img" src="images/events/event3.png" alt="event3"></a>
    <p style="text-align:center;font-weight:700">Basics in Research & Securing IP</p>
    </div>



    </div> <!-- event gallery section end -->
    
    <div class="row">

    <div class="col-4">
    <a href="images/events/event4.jpg"><img class="eventgallery-img" src="images/events/event4.jpg" alt="event4"></a>
    <p style="text-align:center;font-weight:700">राष्ट्रीय संगोष्ठी</p>
    </div>

    <div class="col-4">
    <a href="images/events/event5.png"><img class="eventgallery-img" src="images/events/event5.png" alt="event5"></a>
    <p style="text-align:center;font-weight:700">Nation Symposium on Performing Arts & Architecture in Medieval India</p>
    </div>

    <div class="col-4">
    <a href="images/events/event6.png"><img class="eventgallery-img" src="images/events/event6.png" alt="event6"></a>
    <p style="text-align:center;font-weight:700">National Seminar on Transcending the Boundaries of Gender</p>
    </div>


    </div>


    </div>
    </div>
</body>
</html>