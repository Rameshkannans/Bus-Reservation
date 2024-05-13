
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Owner Registration</title>
  <link rel="stylesheet" type="text/css" href="pro1.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Grand+Hotel&display=swap');
    body {
  background-image: url('img12.jpg');
  background-size: cover; 
  background-attachment: fixed; 
  background-repeat: no-repeat;
}
#b1:hover {
      background-color: orange; 
    }
  </style>
</head>
<body>
  <!-- NAvigation Bar end -->
    <nav class="navbar navbar-expand-sm bg-transparent shadow navbar-dark px-1" style="position: fixed; top: 0; width: 100%; z-index: 1000;">
        <div class="container-fluid">
            <ul class="navbar-nav ">
              <li class="nav-item">
                <a class="nav-link text-dark text-center px-4" style="font-size: 17px;" ><h4 style="font-family: 'Grand Hotel', cursive;" class="text-warning">Travel</h4></a>
              </li></ul> 
              <button class="navbar-toggler bg-warning" type="button" data-bs-toggle="collapse" data-bs-target="#rks">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="rks">
                  <ul class="navbar-nav ms-auto ">
                    <li class="nav-item">
                      <a class="nav-link text-secondary text-center px-4" style="font-size: 17px;" id="b1" href="/rese/customer/customerdash.php"><b>D a s h b o a r d</b> </a>
                  </li> 
                    </ul>
                  
                    
          </div>
        </div>
      </nav>
  <!-- NAvigation Bar end -->





        <div class="container-fluid" style="margin-top: 100px;">
            <div class="row justify-content-center ">
                <div class="col-md-5 p-5 shadow-lg">
                    <div class="card text-center bg-transparent shadow-lg">
                        <h1 class="text-danger">ERROR</h1>
                        <div class="card-body">
                            <h4 class="text-warning">Please enter correct retype password</h4>

                              <div class="text-center mt-4">        
                                <h6 class="link">Go to Register page.. <a href="ownerreg.php" class="btn btn-outline-warning "><b>Register here</b> </a></h6>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




</body>
</html>