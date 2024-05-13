<?php 
  session_start();
  if(!isset($_SESSION['ownername'])){
  header('location:ownerlogin.php');
}
?>
<?php 
  if (!isset($_SESSION['ownername'])) {
    header('location:ownerlogin.php');
    exit; 
  }

  $host = "localhost";
  $userName = "root";
  $password = "";
  $dbName = "busreservation";
  $conn = new mysqli($host, $userName, $password, $dbName);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sessionemail = $_SESSION['owneremail'];
  $sql = "SELECT * FROM owner WHERE email = '$sessionemail'";
  $result = $conn->query($sql);
  $rows = $result->fetch_assoc();
  $_SESSION['iid'] = $rows['id'];
  $_SESSION['oph'] = $rows['profile_photo'];
  $_SESSION['on'] = $rows['name'];
  $_SESSION['oe'] = $rows['email'];
  $_SESSION['opn'] = $rows['phone_number'];
  $_SESSION['oa'] = $rows['address'];
  $_SESSION['ocn'] = $rows['company_name'];
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Owner Bus Registration Dashboard</title>
  <link rel="stylesheet" type="text/css" href="pro1.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    body {
      background-image: url('img12.jpg');
      background-size: cover; 
      background-attachment: fixed; 
      background-repeat: no-repeat;
    }
  </style>
</head>
<body class="mb-5">

  <nav class="navbar navbar-expand-sm bg-transparent shadow navbar-dark">
    <div class="container-fluid">
      <a href="ownerprofile.php" class="mx-auto">
        <img class="card-img-top rounded-circle" src="<?php echo $rows['profile_photo']; ?>" alt="Card image" style="width:100px; height: 100px;">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item mx-5">
            <div class="mt-2">
              <h6 class="">
                <div class="d-flex">
                  <h5 class="text-white me-2"><b>Welcome: </b></h5>
                  <span class="text-warning" style="font-size: 20px;"><strong>
                    <?php echo $rows['name']; ?>
                  </strong></span>
                </div>
              </h6>
            </div>
          </li>
          <li class="nav-item mx-5">
            <a class="nav-link btn btn-warning" href="bookcheck.php"><span class="text-light" style="font-size: 20px;"><strong>BOOKINGS</strong></span> </a>
          </li>
          <li class="nav-item mx-5">
            <a class="nav-link btn btn-danger" href="ownerlogout.php"><span class="text-light" style="font-size: 20px;"><strong>LOGOUT</strong></span></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="row mt-5">
      <div class="col-lg-4 ">
        <div class=" bg-transparent p-4 text-align-center " style="border: 0px;">
          <div class="card  bg-transparent shadow-lg text-center" style="border:white solid 2px;">
            <img class="card-img-top rounded-circle mx-auto" src="bus.png" alt="Card image" style="width:200px">
            <div class="card-body">
              <hr>
              <h3 class="card-title text-white">Register new Bus</h3>
              <p class="card-text text-dark"> Registration involves the submission of essential details about the bus, such as its make, model, year of manufacture, vehicle identification number (VIN), and other identifying information. Additionally.</p>
              <a href="busreg.php" class="btn btn-outline-success " style="border: 0px;"><h4> Register Now</h4> </a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 ">
        <div class="bg-transparent  p-4">
          <div class="card  bg-transparent shadow-lg text-center"style="border:white solid 2px;">
            <img class="card-img-top rounded-circle mx-auto" src="pro.png" alt="Card image" style="width:200px">
            <div class="card-body">
              <hr>
              <h3 class="card-title text-white">Update Profile</h3>
              <p class="card-text text-dark">Keeping your profile up to date is essential to ensure that your online presence accurately reflects who you are. Your profile is your digital identity, and it's often the first impression others have of you. </p>
              <a href="Updateowner.php" class="btn btn-outline-success" style="border: 0px;"><h4>Update Profile</h4> </a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 ">
        <div class="bg-transparent  p-4">
          <div class="card bg-transparent shadow-lg text-center"style="border:white solid 2px;">
            <img class="card-img-top rounded-circle mx-auto" src="upd.png" alt="Card image" style="width:200px">
            <div class="card-body">
              <hr>
              <h3 class="card-title text-white"> Bus Deatails</h3>
              <p class="card-text text-dark">Keeping your bus details up-to-date is essential to provide accurate and reliable information to your passengers. Whether you're a bus operator, a transportation company, or a public transit agency.</p>
              <a href="busdeatails.php" class="btn btn-outline-success" style="border: 0px;"><h4> Bus Deatails</h4> </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>



</body>
</html>