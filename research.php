<?php
session_start();
if(
        isset($_SESSION['userID'])
    &&  !empty($_SESSION['userID'])
){
      //user already logged in
      $id=$_SESSION['userID'];
      try{
            $conn=new PDO('mysql:host=localhost:3306;dbname=dreamabroad;',"root","");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $loginQuery="SELECT * from userprofile WHERE userID=$id";
            $returnobj=$conn->query($loginQuery);
            $temp_profile = $returnobj->fetch();   //Fetching a single row then signle column, single value

      }
      catch(PDOException $e){
            echo 'Connection failed: ' . $e->getMessage();
      }
      ?>
      <!doctype html>
      <html lang="en">

      <head>
          <!-- Required meta tags -->
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">

          <!-- Bootstrap CSS -->
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

          <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css" rel="stylesheet" />

          <!--    custom css-->
          <link rel="stylesheet" href="css/style.css">
          <link rel="stylesheet" href="css/higherStudy.css">
          <!--    fontawesome-->
          <script src="https://kit.fontawesome.com/9b0ecd67ae.js" crossorigin="anonymous"></script>

          <!--    roboto font-->
          <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;700;900;1,300&display=swap" rel="stylesheet">
          <!--    raleway font-->
          <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;400;600;900&display=swap" rel="stylesheet">
          <!--    jquery-->
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
          <link rel="icon" href="images/icon.png" type="image/x-icon">

          <title>Research & Professor</title>
      </head>

      <body>
          <!--navigation section-->
          <section id="#navbar">
              <nav class="navbar navbar-expand-lg" data-aos="fade-right;" data-aos-delay="1500">
                  <div class="container-fluid navigation">
                      <a class="navbar-brand" href="home.php"><img class="logo" src="images/munna_logo_white_2.png" alt="">Dream Abroad</a>
                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                          <span style="color: white; border: none !important;"><i class="fas fa-bars"></i></span>
                      </button>
                      <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                          <div class="navbar-nav  ml-auto ">
                              <a class="nav-item nav-link active" href="home.php">Home <span class="sr-only">(current)</span></a>
                              <a class="nav-item nav-link active" href="higherStudies.php">Higher Studies<span class="sr-only">(current)</span></a>
                              <a class="nav-item nav-link active" href="scholarship.php">Scholarships</a>
                              <a class="nav-item nav-link active" href="research.php">Research & Professor</a>
                              <a class="nav-item nav-link active" href="resources.php">Preparation & Resources</a>
                              <a class="nav-item nav-link active" href="soplor.php">SOP/LOR</a>
                          </div>
                      </div>
                          <!--  Profile button-->
                      <div class="navbar-nav  ml-auto ">
                          <div class="dropdown dropstart" style="">
                              <a class="btn btn-secondary dropdown-toggle nav-item nav-link active profileIcon" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 1.2em;background-color: transparent; border: rectangular;color: #84B082; "><i class="far fa-user-circle">Profile</i></a>
                              <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuLink">
                                  <li><a class="dropdown-item" href="profile.php"><img src="<?php echo $temp_profile['profilePic'] ?>" alt="" style="height: 40px; border-radius: 50%;"> <i><?php echo $temp_profile['firstName'] ?></i></a></li>
                                  <li><a class="dropdown-item" href="editProfile.php">Edit Profile</a></li>
                                  <li><a class="dropdown-item" href="changePassword.php" style="color: skyblue">Change Password</a></li>
                                  <li><a class="dropdown-item" href="logOutProcess.php" style="color: red"><b>Log Out</b></a></li>
                              </ul>
                          </div>
                      </div>
                      <!--    profile button end-->
                    </div>
                  </div>
              </nav>
          </section>

          <!--hotline contactact section-->
          <section id="hotline">
              <div class="container hotline">
                  <div class="row">
                      <div class="col-md-6">
                          <p> <i class="fas fa-phone-alt"></i> Hotline: +880 1111 111 111</p>
                      </div>
                      <div class="col-md-6">
                          <p> <i class="fas fa-envelope"></i> Email: contact@dreamabroad.com</p>
                      </div>
                  </div>
              </div>
          </section><br>

          <!--    University finder-->
          <section id="uniFinder">
            <h2>Find Professor and Research info</h2>
              <div class="container finder">
                <form action="researchProfessorShow1.php" method="GET">
                  <div class="row">
                      <div class="col-lg-3">
                          <!-- country -->
                          <select name="country" id="country" style="border: none; border-bottom: 2px solid #211A1E; width: 100%" required>
                              <option value='NULL'>Select Country</option>
                              <option value="Australia">Australia</option>
                              <option value="Bangladesh">Bangladesh</option>
                              <option value="Canada">Canada</option>
                              <option value="China">China</option>
                              <option value="Egypt">Egypt</option>
                              <option value="France">France</option>
                              <option value="Germany">Germany</option>
                              <option value="India">India</option>
                              <option value="Japan">Japan</option>
                              <option value="Malaysia">Malaysia</option>
                              <option value="Quatar">Quatar</option>
                              <option value="Russia">Russia</option>
                              <option value="USA">USA</option>
                              <option value="UK">UK</option>
                          </select>
                      </div>
                      <div class="col-lg-3">
                          <!-- area of interest -->
                          <select name="areaOfInterest" id="areaOfInterest" style="border: none; border-bottom: 2px solid #211A1E; width: 100%" required>
                              <option value='NULL'>Area Of Interest</option>
                              <option value="Artificial Intelligence">Artificial Intelligence</option>
                              <option value="Data Mining">Data Mining</option>
                              <option value="Machine Learning">Machine Learning</option>
                              <option value="Deep Learning">Deep Learning</option>
                              <option value="Data Science">Data Science</option>
                              <option value="Algorithms">Algorithms</option>
                              <option value="Neural Networking">Neural Networking</option>
                              <option value="Networking">Networking</option>
                              <option value="Internet of Thing">Internet of Thing</option>
                              <option value="Database Management">Database Management</option>
                              <option value="Web">Web</option>
                              <option value="Cloud Computing">Cloud Computing</option>
                              <option value="Medicine">Medicine</option>
                              <option value="Accounting">Accounting</option>
                              <option value="Finance">Finance</option>
                              <option value="Human Resources">Human Resources</option>
                              <option value="Literature">Literature</option>
                              <option value="Arts And Humanities">Arts And Humanities</option>
                              <option value="Philosophy">Philosophy</option>
                              <option value="Language and Culture">Language and Culture</option>
                              <option value="Anthropology">Anthropology</option>
                              <option value="Geology">Geology</option>
                              <option value="Psychology">Psychology</option>
                              <option value="Earth and Soil">Earth and Soil</option>
                              <option value="Economics">Economics</option>
                          </select>
                      </div>
                      <div class="col-lg-3">
                          <!-- search for -->
                          <select name="searchFor" id="searchFor" style="border: none; border-bottom: 2px solid #211A1E; width: 100%" required>
                              <option value='NULL'>Search For</option>
                              <option value="only professor">Only Professor List</option>
                              <option value="research with professor">Research info with Professor List</option>
                          </select>
                      </div>
                      <div class="col-lg-3">
                        <input type="submit" value="Find Professor/Research"  class="btn btn-lg" style="background-color: royalblue; color: white"></input>
                      </div>
                  </div>
                </form>
              </div>
              <h4 class="form-text text-muted"><i><b>**  Please choose all three option to get result **</b></i></h4>
          </section>

          <!--footer section-->
          <section id="footer">
              <div class="container">
                  <div class="row">
                      <div class="col-lg-4 importantLinks">
                          <!--                  important links-->
                          <h2>Important Links</h2>
                          <a class="nav-item nav-link active" href="home.php">Home <span class="sr-only">(current)</span></a>

                              <a class="nav-item nav-link active" href="higherStudies.php">Higher Studies<span class="sr-only">(current)</span></a>
                              <a class="nav-item nav-link active" href="scholarship.php">Scholarships</a>
                              <a class="nav-item nav-link active" href="research.php">Research & Professor</a>
                              <a class="nav-item nav-link active" href="resources.php">Preparation & Resources</a>
                              <a class="nav-item nav-link active" href="soplor.php">SOP/LOR</a>
                      </div>
                      <div class="col-lg-4 contact">
                          <!--                   contact-->
                          <h2>Contact Us</h2>
                          <p> <i class="fas fa-phone-alt"></i> Hotline: +880 1111 111 111</p>
                          <p> <i class="fas fa-envelope"></i> Email: contact@dreamabroad.com</p>
                          <p> <i class="fas fa-map-marker-alt"></i> Address: Vatara, Dhaka 1212, Bangladesh</p>
                      </div>
                      <div class="col-lg-4 social">
                          <!--                   social media icons-->
                          <h2>Social Media</h2>
                          <a href="www.facebook.com" style="color: royalblue"><i class="fab fa-facebook-square"></i></a>
                          <a href="www.twitter.com" style="color: skyblue"><i class="fab fa-twitter-square"></i></a>
                          <a href="www.linkedin.com" style="color: royalblue;"><i class="fab fa-linkedin"></i></a>
                          <a href="www.youtube.com" style="color: orangered"><i class="fab fa-youtube-square"></i></a>
                      </div>
                  </div>
              </div>
          </section>

          <!--    copyright-->
          <section id="copyright" style="background-color:#84B082;">
              <div class="container-fluid">
                  <div class="text-center p-3">
                      © 2021 Copyright:
                      <a class="text-white" href="https://dreamsabroad.com/">DREAMS ABROAD</a>
                  </div>
              </div>
          </section>


          <!-- Option 1: Bootstrap Bundle with Popper -->
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
          <!-- MDB -->
          <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"></script>
      </body></html>
<?php
}
else{
//$_SEESION variable isn't set and/or $_SESSION variable is empty
    ?>
    <script>location.assign("login.php");</script>
    <?php
}
?>
