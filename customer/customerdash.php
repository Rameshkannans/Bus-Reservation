<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Customer Dashboard</title>
  <link rel="stylesheet" type="text/css" href="pro1.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
     @import url('https://fonts.googleapis.com/css2?family=Grand+Hotel&display=swap');
    body {
  background-color: white;
}
 #b1:hover {
      background-color: orange; 
    }
  </style>
</head>
<body>

  <!-- NAvigation Bar end -->
    <nav class="navbar navbar-expand-sm bg-white navbar-dark px-1" style="position: fixed; top: 0; width: 100%; z-index: 1000;">
        <div class="container-fluid">
            <ul class="navbar-nav ">
              <li class="nav-item">
               <a class="nav-link text-dark text-center px-4" style="font-size: 17px;"><h4 style="font-family: 'Grand Hotel', cursive;" class="text-warning">Travel</h4></a>
              </li></ul> 
              <button class="navbar-toggler bg-warning" type="button" data-bs-toggle="collapse" data-bs-target="#rks">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="rks">
                  
  
                    <ul class="navbar-nav  ms-auto">
                      <li class="nav-item">
                        <a class="nav-link text-dark text-center px-4" style="font-size: 17px;" id="b1" href="/rese/buso/ownerlogin.php">Owner Login</a>
                      </li> 
                    </ul>
                    <!-- <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link text-dark text-center px-4" style="font-size: 17px;" id="b1" href="cusreg.php">Customer Registration</a>
                      </li> 
                    </ul> -->
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link text-dark text-center px-4" style="font-size: 17px;" id="b1" href="cuslogin.php">Ticket Booking</a>
                      </li> 
                    </ul>
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link text-dark text-center px-4" style="font-size: 17px; " id="b1" href="#abou">About</a>
                      </li> 
                    </ul>
          </div>
        </div>
      </nav>
  <!-- NAvigation Bar end -->

<!-- First big image start -->
   <div class="position-relative">
    <img src="g21.jpg" style="width: 100%;">
    <div class="position-absolute top-50 start-50 t1">
      <h1 class="text-warning display-2" style="opacity: 0.7; font-family: 'Grand Hotel', cursive;">Travel</h1>
    </div>
   </div>
   <!-- First big image end -->

    <!-- Projects start -->
    <h5 class="p-4">Bus Gallery<hr> </h5>
    <div class="container-fluid bg-white px-4">
      <div class="row">
        <div class="col-sm-6 col-lg-3">
          <div class="card img-fluid">
              <img class="card-img-top hi1" src="b1.jpg" alt="Card image" style="width:300px; height: 300px;">
              <div class="card-img-overlay">
                <script>
                  $(document).ready(function(){
                    $("button").click(function(){
                      $(".hi1").toggle(1000);
                    });
                  });
                </script>
                <button href="" class="btn btn-dark" style="position: absolute; top: 0; left: 0; z-index: 1;">NON-AC</button>
              </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="card img-fluid">
              <img class="card-img-top hi1" src="b2.jpg" alt="Card image" style="width:300px; height: 300px;">
              <div class="card-img-overlay">
                <a href="" class="btn btn-dark" style="position: absolute; top: 0; left: 0; z-index: 1;" >AC</a>
              </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="card img-fluid">
              <img class="card-img-top hi1" src="b3.jpg" alt="Card image" style="width:300px; height: 300px;">
              <div class="card-img-overlay">
                <a href="" class="btn btn-dark" style="position: absolute; top: 0; left: 0; z-index: 1;">SLEEPER</a>
              </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
         <div class="card img-fluid">
              <img class="card-img-top hi1" src="b4.jpg" alt="Card image" style="width:300px; height: 300px;">
              <div class="card-img-overlay">
                <a href="" class="btn btn-dark" style="position: absolute; top: 0; left: 0; z-index: 1;">SEAT</a>
              </div>
            </div>
        </div>
      </div>

      <div class="row mt-4">
        <div class="col-sm-6 col-lg-3">
          <div class="card img-fluid">
              <img class="card-img-top hi1" src="b5.jpg" alt="Card image" style="width:300px; height: 300px;">
              <div class="card-img-overlay">
                <a href="" class="btn btn-dark" style="position: absolute; top: 0; left: 0; z-index: 1;">AC</a>
              </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="card img-fluid">
              <img class="card-img-top hi1" src="b6.jpg" alt="Card image" style="width:300px; height: 300px;">
              <div class="card-img-overlay">
                <a href="" class="btn btn-dark" style="position: absolute; top: 0; left: 0; z-index: 1;">SLEEPER</a>
              </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="card img-fluid">
              <img class="card-img-top hi1" src="b4.jpg" alt="Card image" style="width:300px; height: 300px;">
              <div class="card-img-overlay">
                <a href="" class="btn btn-dark" style="position: absolute; top: 0; left: 0; z-index: 1;">ONLY BOYS</a>
              </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="card img-fluid">
              <img class="card-img-top hi1" src="b5.jpg" alt="Card image" style="width:300px; height: 300px;">
              <div class="card-img-overlay">
                <a href="" class="btn btn-dark" style="position: absolute; top: 0; left: 0; z-index: 1;">TOUR BUS </a>
              </div>
            </div>
        </div>
      </div>
    </div>
    <!-- Projects end -->

    <!-- About start -->
    <h5 class="p-5" id="abou">About <hr> </h5>
    <div class="container-fluid bg-white px-4">
      <p><small class="" style="font-size: 15px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</small></p>
      <div class="row">
        <div class="col-sm-6 col-lg-3">
          <div class="card">
              <img class="card-img-top" src="g1.jpg" alt="Card image" style="width: 100%; height: 160px;">
              <div class="card-body">
                <!-- <h4 class="card-title">John Doe</h4>
                <p class="card-text text-secondary">CEO & Founder</p> -->
                <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                <div class="d-grid">
                <a href="#" class="btn  btn-block" id="b1">Contact</a>
                </div>
              </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="card">
              <img class="card-img-top" src="g2.jpg" alt="Card image" style="width:100%;">
              <div class="card-body">
                <!-- h4 class="card-title">Jane Doe</h4>
                <p class="card-text text-secondary">Architect</p> -->
                <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                <div class="d-grid">
                <a href="#" class="btn  btn-block" id="b1">Contact</a>
                </div>
              </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="card">
              <img class="card-img-top" src="g5.jpg" alt="Card image" style="width:100%">
              <div class="card-body">
               <!--  <h4 class="card-title">Mike Ross</h4>
                <p class="card-text text-secondary">Architect</p> -->
                <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                <div class="d-grid">
                <a href="#" class="btn  btn-block" id="b1">Contact</a>
                </div>
              </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="card">
              <img class="card-img-top" src="img14.jpg" alt="Card image" style="width:100%">
              <div class="card-body">
                <!-- <h4 class="card-title">Dan Star</h4>
                <p class="card-text text-secondary">Architect</p> -->
                <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                <div class="d-grid">
                <a href="#" class="btn  btn-block" id="b1">Contact</a>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
    <!-- About end -->

    <!-- contact start -->
    <h5 class="p-4 pt-5" style="font-size: 22px;">Contact<hr></h5>
    <div class="container-fluid bg-white px-4">
       <p><small class="" style="font-size: 15px;">Lets get in touch and talk about your next project.</small></p>
       <form>
         <div class="row">
            <div class="col-md-12">
              <input type="text" class="form-control border-secondary" placeholder="Name">
              <input type="text" class="form-control mt-2  border-secondary" placeholder="Email">
              <input type="text" class="form-control mt-2 border-secondary" placeholder="Subject">
              <input type="text" class="form-control mt-2 border-secondary" placeholder="Comment">
              <input type="submit" class="btn mt-4 active btn-primary" id="b1" value="SEND MESSAGE">
            </div>
          </div>
        </div>
       </form>
    </div>
    <!-- contact end -->

    <!-- Last image start -->
    <div class="container-fluid pt-4 px-4 mt-4">
      <img src="img14.jpg" style="width: 100%;">
    </div>
    <!-- Last image end -->



  </div>
</div>
</body>
</html>