<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Owner Registration Dashboard</title>
  <link rel="stylesheet" type="text/css" href="pro1.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    #b1:hover {
      background-color: #c9c8c3; 
    }
    @media only screen and (max-width:576px){

      .t1{
        margin-left: -100px;
      }
    }

  </style>
</head>
<body>
  <!-- NAvigation Bar end -->
    <nav class="navbar navbar-expand-sm bg-info navbar-dark px-1" style="position: fixed; top: 0; width: 100%; z-index: 1000;">
        <div class="container-fluid">
            <ul class="navbar-nav ">
              <li class="nav-item">
                <a class="nav-link text-dark" style="font-size: 17px;" id="b1" href="#"><b class="me-2"> B R </b>  A r c h i t e c t s</a>
              </li></ul> 
              <button class="navbar-toggler bg-warning" type="button" data-bs-toggle="collapse" data-bs-target="#rks">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="rks">
                  <ul class="navbar-nav ms-auto ">
                    <li class="nav-item">
                      <a class="nav-link text-dark text-center px-4" style="font-size: 17px;" id="b1" href="ownerreg.php">O w n e r R e g i s t e r</a>
                  </li> 
                    </ul>
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link text-dark text-center px-4" style="font-size: 17px;" id="b1" href="ownerlogin.php">L o g i n</a>
                      </li> 
                    </ul>
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link text-dark text-center px-4" style="font-size: 17px;" id="b1" href="#contact">C o n t a c t</a>
                      </li> 
                    </ul>
          </div>
        </div>
      </nav>
    <!-- NAvigation Bar end -->

<div class="container-fluid " style="margin-top: 100px;">
  <!-- slider 1 -->
      <div id="rk" class="carousel slide img-thumbnail " data-bs-ride="carouse">

        <div class="carousel-indicators">
          <button type="button" data-bs-target="#rk" data-bs-slide-to="0" class="active"></button>
          <button type="button" data-bs-target="#rk" data-bs-slide-to="1"></button>
          <button type="button" data-bs-target="#rk" data-bs-slide-to="2"></button>
          <button type="button" data-bs-target="#rk" data-bs-slide-to="3"></button>
          <button type="button" data-bs-target="#rk" data-bs-slide-to="4"></button>
        </div>

        <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="4000">
            <img src="bus1.jpg" alt="0" class="d-block rounded-4 " style="width:100%">
            <div class="carousel-caption">
              <h3>Owner Registration</h3>
             <a href="ownerreg.php"><button class="btn btn-warning p-4" style="font-size: 20px;">REGISTER</button></a>
            </div>
          </div>
          <div class="carousel-item" data-bs-interval="4000">
            <img src="bus2.jpg" alt="1" class="d-block rounded-4" style="width:100%">
            <div class="carousel-caption">
              <h3>Booking Tickets</h3>
              <a href="#"><button class="btn btn-success p-4" style="font-size: 20px;">Booking</button></a>
            </div>
          </div>
          <div class="carousel-item" data-bs-interval="4000">
            <img src="bus3.jpg" alt="2" class="d-block rounded-4" style="width:100%">
            <div class="carousel-caption">
              <h3></h3>
            </div>
          </div>
          <div class="carousel-item" data-bs-interval="4000">
            <img src="bus4.jpg" alt="3" class="d-block rounded-4" style="width:100%">
            <div class="carousel-caption">
              <h3></h3>
            </div>
          </div>
          <div class="carousel-item" data-bs-interval="4000">
            <img src="bus5.jpg" alt="4" class="d-block rounded-4" style="width:100%">
            <div class="carousel-caption">
              <h3></h3>
            </div>
          </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#rk" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#rk" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
          </button>
      </div>
    <!-- slider 1 -->


    <div class="container-fluid mt-5">
      <div class="row">
        <div class="col-lg-12 col-sm-12 bg-transprent p-5">
          <h1>About US</h1>
          <p>redBus is India’s largest online bus ticketing platform that has transformed bus travel in the country by bringing ease and convenience to millions of Indians who travel using buses. Founded in 2006, redBus is part of India’s leading online travel company MakeMyTrip Limited (NASDAQ: MMYT). By providing widest choice, superior customer service, lowest prices and unmatched benefits, redBus has served over 18 million customers. redBus has a global presence with operations across Indonesia, Singapore, Malaysia, Colombia and Peru apart from India.</p>
          <hr>

          <h2>Management Team</h2>

          <div class="row">
            <div class="col-lg-3 col-sm-12 bg-transprent p-2">
              <img src="img.jpg" class="rounded-circle" style="width: 300px;">
            </div>
            <div class="col-lg-9 col-sm-12 bg-transprent p-2">
              <h3>Nirmal</h3>
              <p>Prakash Sangam has been Chief Executive Officer of redBus since June 2014. Prior to redBus. He served as an Executive Vice President of Info Edge India (Naukri group), heading two group businesses namely Shiksha.com and Jeevansathi.com. He’s also worked as General Manager of Marketing and Innovation at Airtel and has also had multiple roles across Marketing, Brand Management and Sales at Hindustan Unilever. Prakash has completed his MBA from IIM Calcutta and also holds an Honours degree in Production Engineering from Mumbai University.</p>
            </div>
          </div>

          <hr>

          <div class="row">
            <div class="col-lg-3 col-sm-12 bg-transprent p-2">
              <img src="img.jpg" class="rounded-circle" style="width: 300px;">
            </div>
            <div class="col-lg-9 col-sm-12 bg-transprent p-2">
              <h3>Nirmal</h3>
              <p>Prakash Sangam has been Chief Executive Officer of redBus since June 2014. Prior to redBus. He served as an Executive Vice President of Info Edge India (Naukri group), heading two group businesses namely Shiksha.com and Jeevansathi.com. He’s also worked as General Manager of Marketing and Innovation at Airtel and has also had multiple roles across Marketing, Brand Management and Sales at Hindustan Unilever. Prakash has completed his MBA from IIM Calcutta and also holds an Honours degree in Production Engineering from Mumbai University.</p>
            </div>
          </div>
            
        </div>




        <div class="col-lg-12 col-sm-12 bg-secondary p-5 " id="contact">
          <h1>Contact US</h1>
          <div class="row">
            <div class="col-lg-6 col-sm-12 bg-transprent p-4"></div>

            <div class="col-lg-6 col-sm-12 bg-transprent p-4">
              <div class="card  bg-transparent" style="border: 0px;">
                <form action="" method="post" enctype="multipart/form-data">
                  <div class="mb-3">
                    <label for="name" class="form-label text-info"><b>Name :</b></label>
                    <input type="text" id="name" name="nam" class="form-control" required>
                  </div>
                  <div class="mb-3"> 
                    <label for="email" class="form-label text-info"><b>Email ID :</b></label>
                    <input type="email" id="email" name="emai" class="form-control" required>
                  </div>
                  <div class="mb-3">
                    <label for="te" class="form-label text-info"><b>Phone Number :</b></label>
                    <input type="tel" id="te" name="phon" class="form-control" required>
                  </div>
                   <div class="mb-3">
                    <label for="pas" class="form-label text-info"><b>Comment :</b></label>
                    <input type="text" id="pas" name="passwor" class="form-control" required>
                  </div>
                   
                  <div class="d-grid">
                    <button type="submit" class="btn btn-success"><b> Submit</b></button>
                  </div>
                      
                </form>
             
            </div>
            </div>
          </div>

        </div>

      </div>
    </div>


</body>
</html>