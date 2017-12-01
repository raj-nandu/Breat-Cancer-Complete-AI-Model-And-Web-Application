<?php 
  session_start();
  if(!$_SESSION['auth']){
    header('location: index.php');
  }
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Breast Cancer Detection</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/agency.min.css" rel="stylesheet">
    <style type="text/css">

        #first{
          width: 50%;
          float: left;
          background: #f1f1f1;
          height: 300px;
          font-size: 20px;
          border: 1px solid black;
        }
        #second{
          width: 50%;
          float: right;
          background: #f1f1f1;
          height: 300px;
          font-size: 20px;
          border: 1px solid black;
        }
        .tabs button{
          color: white;
          width: 100%;
        }
        #m{
          color: #fed136;
        }
        .tabs{
          padding-top: 10px;
          padding-bottom: 10px;
          margin-right: 0;
          margin-left: 0;
        }
        #mean, #se, #worst{
          margin: auto;
        }
        #m, #s, #w{
          width: 100%;
          margin: 0;
          background: transparent;
          text-transform: uppercase;
          border: none;
        }
        .box{
          width: 100%;
          height: 400px;
          margin:0 auto;
          margin-top: 100px;
          text-align: center;
          border-radius: 10px;
        }
        .form-control{
          background: transparent;
          color: white;
        }
        .form-group label{
          color: white;
          margin-bottom: 50px;
        }
        .btn{
          margin-top: 24px;
        }
        #se, #worst{
          display: none;
        }
        .img{
          padding-top: 100px;
        }
        section#text-data{
          background-image: url("img/6.jpg");
          background-repeat: no-repeat;
          background-attachment: scroll;
          background-position: center center;
          -webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;
          background-size: cover;
        }
        section#image-data{
           background-image: url("img/7.jpeg");
          background-repeat: no-repeat;
          background-attachment: scroll;
          background-position: center center;
          -webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;
          background-size: cover;
        
          }
          #next1,#next2,#submit{
          font-size: 18px;
          font-weight: 700;
          padding: 10px 10px;
          border-radius: 3px;
          color: white;
          border-color: #fed136;
          background-color: #fed136;
          font-family: 'Montserrat', 'Helvetica Neue', Helvetica, Arial, sans-serif;
          text-transform: uppercase; }
          #h13{
            font-size: 24px;
            font-weight:850;
            text-transform: uppercase;
            font-family: 'Droid Serif', 'Helvetica Neue', Helvetica, Arial, sans-serif;

          }
          #m, #s, #w button:focus{
          outline:0;
          }
          #img3{
            width:30%;
            border: 3px solid white;
            color:white;
          }
          section#image-data .con{
          color:white;
          font-size: 34px;
          font-weight: 700;
          text-align: center;
          font-family: 'Droid Serif', 'Helvetica Neue', Helvetica, Arial, sans-serif;
          }
          section#text-data .c5{
          color:white;
          font-size: 34px;
          font-weight: 700;
          text-align: center;
          font-family: 'Droid Serif', 'Helvetica Neue', Helvetica, Arial, sans-serif;
          }

          </style>
  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Breast Cancer Detection</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#text-data">Text Data</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#image-data">Image Data</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="result.php">Results</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="">
                <span class="fa-stack fa-1x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa fa-user fa-stack-1x fa-inverse"></i>
            </span>
             <?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?></a>
            </li>
            <li class="nav-item">
              <div id="logout">
                <a class="nav-link" href="logout.php">Logout</a>
              </div>
              
            </li>
            
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header -->
    <header class="masthead">
      
    </header>

    <!-- Services -->
    <section id = "text-data">
      <div class="c5">
        Enter Text Data
      </div>
      <div class="box container">
        <div class = "tabs row" id="h13">
          <div class="col-md-4">
            <button id = "m" >Mean Values</button>
          </div>
          <div class="col-md-4">
            <button id = "s" >SE Values</button>
          </div>
          <div class="col-md-4">
            <button id = "w" >Worst Values</button>
          </div>
        </div>
        <div class="type">
          <?php 
            if(isset($_SESSION['invalid_text'])){
              echo $_SESSION['invalid_text'];
              $_SESSION['invalid_text'] = "";
            }
           ?>
          <form method="post" action="text.php">
            <div class="container" id = "mean">
              <div class="row">
                <div class="col-md-4 form-group">
                  <label>Area M:<input class="form-control" type="text" name="area_m"></label>
                </div>
                <div class="col-md-4 form-group">
                  <label>Radius:<input class="form-control" type="text" name="radius_m"></label>             
                </div>
                <div class="col-md-4 form-group">
                  <label>Perimeter:<input class="form-control" type="text" name="perimeter_m"></label>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 form-group">
                  <label>Compactness:<input class="form-control" type="text" name="compactness_m"></label>
                </div>
                <div class="col-md-4 form-group">
                  <label>Concave points:<input class="form-control" type="text" name="concave_points_m"></label>
                </div>
                <div class="col-md-4 form-group">
                  <label>Concavity:<input class="form-control" type="text" name="concavity_m"></label>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 form-group">
                  <label>Fractional Dimensional:<input class="form-control" type="text" name="fractional_dimension_m"></label>
                </div>
                <div class="col-md-4 form-group">
                  <label>Smoothness:<input class="form-control" type="text" name="smoothness_m"></label>
                </div>
                <div class="col-md-4 form-group">
                  <label>Symmetry:<input class="form-control" type="text" name="symmetry_m"></label>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 form-group">
                  <label>Texture:<input class="form-control" type="text" name="texture_m"></label>
                </div>
                
                <div class="col-md-8 form-group">
                  <input type="button" class="lo lo-default form-control" value="Next" name="next1" id = "next1">
                </div>
              </div>         
            </div>

            <div class="container" id = "se">

              <div class="row">
                <div class="col-md-4 form-group">
                  <label>Area:<input class="form-control" type="text" name="area_se"></label>
                </div>
                <div class="col-md-4 form-group">
                  <label>Radius:<input class="form-control" type="text" name="radius_se"></label>              
                </div>
                <div class="col-md-4 form-group">
                  <label>Perimeter:<input class="form-control" type="text" name="perimeter_se"></label>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 form-group">
                  <label>Compactness:<input class="form-control" type="text" name="compactness_se"></label>
                </div>
                <div class="col-md-4 form-group">
                  <label>Concave points:<input class="form-control" type="text" name="concave_points_se"></label>
                </div>
                <div class="col-md-4 form-group">
                  <label>Concavity:<input class="form-control" type="text" name="concavity_se"></label>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 form-group">
                  <label>Fractional Dimensional:<input class="form-control" type="text" name="fractional_dimension_se"></label>
                </div>
                <div class="col-md-4 form-group">
                  <label>Smoothness:<input class="form-control" type="text" name="smoothness_se"></label><br><br>
                </div>
                <div class="col-md-4 form-group">
                  <label>Symmetry:<input class="form-control" type="text" name="symmetry_se"></label>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 form-group">
                  <label>Texture:<input class="form-control" type="text" name="texture_se"></label>
                </div>
                
                <div class="col-md-8 form-group">
                  <input type="button" class="lo lo-default form-control" value="Next" name="next2" id = "next2">
                </div>
              </div>
                
              
            </div>
            <div class="container" id = "worst">

              <div class="row">
                <div class="col-md-4 form-group">
                  <label>Area:<input class="form-control" type="text" name="area_worst"></label>
                </div>
                <div class="col-md-4 form-group">
                  <label>Radius:<input class="form-control" type="text" name="radius_worst"></label>              
                </div>
                <div class="col-md-4 form-group">
                  <label>Perimeter:<input class="form-control" type="text" name="perimeter_worst"></label>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 form-group">
                  <label>Compactness:<input class="form-control" type="text" name="compactness_worst"></label>
                </div>
                <div class="col-md-4 form-group">
                  <label>Concave points:<input class="form-control" type="text" name="concave_points_worst"></label>
                </div>
                <div class="col-md-4 form-group">
                  <label>Concavity:<input class="form-control" type="text" name="concavity_worst"></label>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 form-group">
                  <label>Fractional Dimensional:<input class="form-control" type="text" name="fractional_dimension_worst"></label>
                </div>
                <div class="col-md-4 form-group">
                  <label>Smoothness:<input class="form-control" type="text" name="smoothness_worst"></label><br><br>
                </div>
                <div class="col-md-4 form-group">
                  <label>Symmetry:<input class="form-control" type="text" name="symmetry_worst"></label>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 form-group">
                  <label>Texture:<input class="form-control" type="text" name="texture_worst"></label>
                </div>
                
                <div class="col-md-8 form-group">
                  <input type="submit" class="lo lo-default form-control" value="Submit" name="submit" id = "submit">
                </div>
              </div>
                
              
            </div>
          </form>
        </div>
      </div>
    </section>


    <section id = "image-data">
      <div class="box img" id="img3" >
        <div class="con">
          Upload Image
          <?php 
            if(isset($_SESSION['image-error'])){
              echo $_SESSION['image-error'];
            }
           ?>
        </div>
        <form method="post" action="image.php" enctype = "multipart/form-data">
          <div id = "form-group">
            <label for="exampleInputFile">Image</label><br><br>
            <input type="file" id="exampleInputFile" name = "image">
            <p class="help-block"></p>
          </div>
          <div class="form-group">
            <input type="submit" class="lo lo-default " value="Submit" name="submit" id = "submit">
          </div>
        </form>
        
      </div>
    </section>

    <!-- Contact -->
    

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <span class="copyright">Copyright &copy; Your Website 2017</span>
          </div>
          <div class="col-md-4">
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-facebook"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-linkedin"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-4">
            <ul class="list-inline quicklinks">
              <li class="list-inline-item">
                <a href="#">Privacy Policy</a>
              </li>
              <li class="list-inline-item">
                <a href="#">Terms of Use</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

    <!-- Portfolio Modals -->

    <!-- Modal 1 -->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2>Project Name</h2>
                  <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                  <img class="img-fluid d-block mx-auto" src="img/portfolio/01-full.jpg" alt="">
                  <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                  <ul class="list-inline">
                    <li>Date: January 2017</li>
                    <li>Client: Threads</li>
                    <li>Category: Illustration</li>
                  </ul>
                  <button class="lo lo-primary" data-dismiss="modal" type="button">
                    <i class="fa fa-times"></i>
                    Close Project</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal 2 -->
    <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2>Project Name</h2>
                  <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                  <img class="img-fluid d-block mx-auto" src="img/portfolio/02-full.jpg" alt="">
                  <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                  <ul class="list-inline">
                    <li>Date: January 2017</li>
                    <li>Client: Explore</li>
                    <li>Category: Graphic Design</li>
                  </ul>
                  <button class="lo lo-primary" data-dismiss="modal" type="button">
                    <i class="fa fa-times"></i>
                    Close Project</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal 3 -->
    <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2>Project Name</h2>
                  <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                  <img class="img-fluid d-block mx-auto" src="img/portfolio/03-full.jpg" alt="">
                  <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                  <ul class="list-inline">
                    <li>Date: January 2017</li>
                    <li>Client: Finish</li>
                    <li>Category: Identity</li>
                  </ul>
                  <button class="lo lo-primary" data-dismiss="modal" type="button">
                    <i class="fa fa-times"></i>
                    Close Project</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal 4 -->
    <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2>Project Name</h2>
                  <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                  <img class="img-fluid d-block mx-auto" src="img/portfolio/04-full.jpg" alt="">
                  <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                  <ul class="list-inline">
                    <li>Date: January 2017</li>
                    <li>Client: Lines</li>
                    <li>Category: Branding</li>
                  </ul>
                  <button class="lo lo-primary" data-dismiss="modal" type="button">
                    <i class="fa fa-times"></i>
                    Close Project</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal 5 -->
    <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2>Project Name</h2>
                  <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                  <img class="img-fluid d-block mx-auto" src="img/portfolio/05-full.jpg" alt="">
                  <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                  <ul class="list-inline">
                    <li>Date: January 2017</li>
                    <li>Client: Southwest</li>
                    <li>Category: Website Design</li>
                  </ul>
                  <button class="lo lo-primary" data-dismiss="modal" type="button">
                    <i class="fa fa-times"></i>
                    Close Project</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal 6 -->
    <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2>Project Name</h2>
                  <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                  <img class="img-fluid d-block mx-auto" src="img/portfolio/06-full.jpg" alt="">
                  <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                  <ul class="list-inline">
                    <li>Date: January 2017</li>
                    <li>Client: Window</li>
                    <li>Category: Photography</li>
                  </ul>
                  <button class="lo lo-primary" data-dismiss="modal" type="button">
                    <i class="fa fa-times"></i>
                    Close Project</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/agency.min.js"></script>
    <script type="text/javascript">
      $("#m").on('click', function() {
        $("#se").css('display','none');
        $("#worst").css('display','none');
        $("#mean").css('display','block');

        $("#s").css('color','white');
        $("#w").css('color','white');
        $("#m").css('color','#fed136');
      });
      $("#s").on('click', function() {
        $("#se").css('display','block');
        $("#worst").css('display','none');
        $("#mean").css('display','none');

        $("#s").css('color','#fed136');
        $("#w").css('color','white');
        $("#m").css('color','white');
      });
      $("#w").on('click', function() {
        $("#se").css('display','none');
        $("#worst").css('display','block');
        $("#mean").css('display','none');

        $("#s").css('color','white');
        $("#w").css('color','#fed136');
        $("#m").css('color','white');
      });
      $("#next1").on('click', function() {
        $("#se").css('display','block');
        $("#worst").css('display','none');
        $("#mean").css('display','none');

        $("#s").css('color','#fed136');
        $("#w").css('color','#white');
        $("#m").css('color','white');
      });
      $("#next2").on('click', function() {
        $("#se").css('display','none');
        $("#worst").css('display','block');
        $("#mean").css('display','none');

        $("#s").css('color','white');
        $("#w").css('color','#fed136');
        $("#m").css('color','white');
      });
    </script>

  </body>

</html>
