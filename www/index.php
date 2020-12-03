<?php
    session_start();
    if(!isset($_SESSION['username'])){
         
    }
    else{
      echo "Admin";
    }
    
?>

<!DOCTYPE html>
<html>
<title>Research and Development, IIT Patna</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<div class="w3-top">
  <div class="w3-bar w3-white w3-wide w3-padding w3-card">
    <a href="#home" class="w3-bar-item w3-button"></a>
    <div class="w3-right w3-hide-small">
      <a href="#about" class="w3-bar-item w3-button">About</a>
      <a href="#projects" class="w3-bar-item w3-button">Projects and Publications</a>
      <a href="#People" class="w3-bar-item w3-button">People</a>
      <a href="#Recent Trends" class="w3-bar-item w3-button">Quick Links</a>
      <a href="#Contact" class="w3-bar-item w3-button">Contact</a>
    </div>
  </div>
</div>

<header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
  <img class="w3-image" src="https://www.iitp.ac.in/placement/images/image1.jpg" alt="IIT Patna" width="1500" height="800">
  <div class="w3-display-middle w3-margin-top w3-center">
    <h1 class="w3-xxlarge w3-text-white"><span class="w3-padding w3-black w3-opacity-min"><b>Research and Development</b></span> <span class="w3-bar-item w3-button"><b>IIT PATNA</b></span></h1>
  </div>
</header>




  <!-- About Section -->
  <div class="w3-container w3-padding-32" id="about">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">About</h3>
    <p>Research & Development Unit (R&D) of IIT Patna was established in 2009 with a view to initiate and nurture productive and interactive engagement with sponsoring agencies. It aims to facilitate smooth functioning of projects sponsored by government and private organization. Faculty members and students are encouraged for various engineering and interdisciplinary projects to register growth in research by generation of resources, patents, research collaborations and establishing links with industry.<br>
    </p>
  </div>




<!-- Page content -->
<div class="w3-content w3-padding" style="max-width:1564px">

  <!-- Project Section -->
  <div class="w3-container w3-padding-32" id="projects">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Projects and Publications</h3>
    <img src="https://www.iitp.ac.in/images/banners/7.jpg" alt="Prooject and Publications" style="width:100%">
    <h5 class="w3-border-bottom w3-border-light-grey w3-padding-16"><b>Research Vision</b></h3>
      <ul list-style-type: circle>
        <li>To engage in the frontiers of the field and channelize the stateof-the-art knowledge to train personnel who can solve problems of relevance to the society at large. While imparting high quality education, emphasis is being imparted on taking up innovative ideas from concept stage to final product development stage via the route of basic technology research, feasibility studies, technology improvement, demonstration and product development</li>
        <li>To evolve into a powerhouse of excellence in education to impart enduring programs with rigour and relevance that help individuals acquire academic excellence, competencies,and, cutting-edge research skills and inculcating in them a social consciousness and human values.</li>
        <li>Become a globally recognized centre for education with world class research output.</li>
      </ul>
  </div>

  <div class="w3-container w3-padding-32">
          <ul >
          <a href="insert_project.php">
            <li class="w3-padding-16">
              <span class="w3-large">New project</span><br>
              <span>Add a new project</span>
            </li></a>
          <a href="insert_publication.php">
            <li class="w3-padding-16">
              <span class="w3-large"> New publication</span><br>
              <span>Add a new publication.</span>
            </li></a>
          <a href="faculty_work.html">
            <li class="w3-padding-16">
              <span class="w3-large"> View projects and publications</span><br>
              <span>View all projects and publications done by a professor.</span>
            </li></a>
          </ul>
        
  </div>


 <!-- Faculty Section -->
  <div class="w3-container w3-padding-32" id="Faculty">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">People</h3>
    <img src="https://www.iitp.ac.in/images/banners/9.jpg" alt="People" style="width:100%">
    <p>IIT Patna has research laboratories equipped with state of art facilities in Engineering, Natural Science and Humanities dept. Faculty members of departments are actively working with govt. agencies and various R&D organizations so as to enable the participation of IIT P in large number of cutting edge scientific research.<br>Research & Development (R&D) Unit at IIT Patna is a special unit with dedicated staff members to manage the projects funded by external funding agencies.
    </p>

    

    <p>
    <ul >
    <a href="insert_faculty.php">
      <li class="w3-padding-16">
        <span class="w3-large">Add new faculty member</span><br>
        <span>Add new faculty member in a department.</span>
      </li></a>
    <a href="getFacultyID.php">
      <li class="w3-padding-16">
        <span class="w3-large">Id of faculty member</span><br>
        <span>Get id of faculty member.</span>
      </li></a>
    <a href="view_faculty.html">
      <li class="w3-padding-16">
        <span class="w3-large">Faculty in a department</span><br>
        <span>Details of faculty member in a department.</span>
      </li></a>
    </ul>
  </p>

  </div>



<div class="w3-container w3-padding-32" id="Recent Trends">
      <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Quick Links</h3>
    <ul >
    <a href="latest_work.html">
      <li class="w3-padding-16">
        <span class="w3-large">Keyword search</span><br>
        <span>Search through all the projects and publications using a keyword</span>
      </li> 
    </a>

    <a href="p1.html">
      <li class="w3-padding-16">
        <span class="w3-large">Publications</span><br>
        <span>Topic wise details of publications for faculty.</span>
      </li></a>
      <a href="p2.html">
      <li class="w3-padding-16">
        <span class="w3-large">Collaborations</span><br>
        <span>Details of Co-Working faculties</span>
      </li> 
    </a>
    
    <a href="p3.html">
      <li class="w3-padding-16">
        <span class="w3-large">Project and pulications</span><br>
        <span>Project and pulications for each department.</span>
      </li>   
      </a>
     
    </ul>
  </div>
 


<!-- Contact Section -->
  <div class="w3-container w3-padding-32" id="Contact">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">Contact</h3>
    <p>Indian Institute of Technology Patna <br> Address : Indian Institute of Technology Patna, Bihta, Patna -801106 (Bihar)
    </p>
  </div>



<!-- Image of location/map -->
<div class="w3-container">
  <img src="https://www.iitp.ac.in/images/patna_airport_to_IITP_Bihta.png" class="w3-image" style="width:100%">
</div>

<!-- End page content -->
</div>


<!-- Footer -->
<footer class="w3-center w3-black w3-padding-16">
  <p><a href="https://www.iitp.ac.in/" title="IIT Patna" target="_blank" class="w3-hover-text-green">Copyright ©  IITP. All rights reserved.</a></p>
</footer>

</body>
</html>
