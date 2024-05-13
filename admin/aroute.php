<?php
session_start();

include('../admin/db.php');
$db = new Database($servername, $username, $password, $dbname);

class customercontrol {
    public $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function acreate1() {
        $sql = "SELECT * FROM buses"; 
        $select = mysqli_query($this->conn, $sql);
        $_SESSION['bus'] = array(); 
        if ($select) {
            while ($row = $select->fetch_assoc()) {
                $_SESSION['bus'][] = $row; 
            }
        }
        return $select; 
    }
}

$customerControl = new customercontrol($db->conn);
$customerControl->acreate1();


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ROUTE</title>
  <script src="js.js"></script>
  <link rel="stylesheet" type="text/css" href="pro52.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Grand+Hotel&display=swap');
    .backg{
      background-image: url("img2.jpg");
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: 100% 100%;
    }
</style>
</head>
<body class="" style="background-color: lightgray;">
  <!-- 1 NAVIGATION START  -->
  
<!-- 1 NAVIGATION END  -->


<div class="container-fluid">
    <div class="row">
      <!-- CONTAINER 1 -->
      <div class="col-lg-3 col-sm-12 mb-2" style="height: ;">
        <div class="p-2 bg-white shadow me-1 my-2 mb-4 position-fixed" style="border-radius: 15px;">
             <div class="card" style="border: 0px;">
              <a href="adminprofile.php" class="mx-auto"><img class="card-img-top rounded-circle" src="<?php echo  $_SESSION['apdmindp']  ?>" alt="Card image" style="width:128px; height: 128px;"></a>
              <div class="card-body">
                <h4 class="card-title text-center">@admin</h4>
                <h6 class="text-center"><?php echo  $_SESSION['adminname'] ?></h6>
                  
              </div>
            </div>

                  <div class="list-group" style="border: 0px;">
                    <a href="admin.php" class="list-group-item list-group-item-action list-group-item-success"> <i class="fa fa-tachometer me-4" aria-hidden="true" style="font-size: 25px;"></i><strong>Dashboard</strong> </a>
                    <a href="abus.php" class="list-group-item list-group-item-action list-group-item-success"><i class="fa fa-bus" aria-hidden="true" style="font-size: 25px;"></i><strong style="margin-left: 28px;">Buses and Owners</strong></a>
                    <a href="aroute.php" class="list-group-item list-group-item-action list-group-item-success"><i class="fa fa-road" aria-hidden="true" style="font-size: 25px;"></i><strong style="margin-left: 26px;">Route</strong></a>
                    <a href="acustomer.php" class="list-group-item list-group-item-action list-group-item-success"><i class="fa fa-user" aria-hidden="true" style="font-size: 25px;"></i><strong style="margin-left: 34px;">Customers</strong></a>
                    <a href="abooking.php" class="list-group-item list-group-item-action list-group-item-success"><i class="fa fa-book" aria-hidden="true" style="font-size: 25px;"></i><strong style="margin-left: 30px;">Bookings</strong></a>
                    <!-- <a href="aseat.php" class="list-group-item list-group-item-action list-group-item-success"><i class="fa fa-th" aria-hidden="true" style="font-size: 25px;"></i><strong style="margin-left: 30px;">Seats</strong></a> -->
                    <a href="adminreg.php" class="list-group-item list-group-item-action list-group-item-success"><i class="fa fa-male" aria-hidden="true" style="font-size: 25px;"></i><strong style="margin-left: 40px;">Add new Admin</strong></a>
                    <!-- <a href="updateadmin.php" class="list-group-item list-group-item-action list-group-item-success"><i class="fa fa-wrench" aria-hidden="true"></i><strong style="margin-left: 40px;">Update Admin Profile</strong></a> -->
                  </div>

                       <div class="text-center mt-2">
                  <form action="updateadmin.php" method="post">
                    <input type="hidden" name="adminidd" value="<?php echo $_SESSION['adminid']; ?>">
                      <input href="updateadmin.php" class="btn btn-warning" type="submit" name="submit50" value="UPDATE PROFILE">
                  </form>
                </div>
              <div class="text-center mt-2">
                <a href="alogout.php"><button class="btn btn-success"><b>LOGOUT</b> </button> </a>
              </div>

            
        </div>
      </div>
      <!-- CONTAINER 1 -->

      <!-- CONTAINER 2 -->
      <div class="col-lg-9 col-sm-12 ">
        <div class="bg-white p-5 mt-4 mb-4 backg " style="border-radius: 15px; height: 1000px;">
          
          <div class="row">
            <div class="col-lg-12 col-sm-12 bg-transprent ">
              <h1 style="font-family: 'Grand Hotel'; color: white;">Routes</h1>
            </div>


            <div class="col-lg-12 col-sm-12 bg-transprent ">
              
              <div class="container mt-3">
                <h2 class="text-dark" style="font-family: 'Grand Hotel';">All Bus Route Details</h2>            
                <table class="table table-secondary table-hover table-striped text-center">
                  <thead>
                    <tr>
                      <th class="text-primary">Bus Number</th>
                      <th class="text-primary">Bus Name</th>
                      <th class="text-primary">Route From</th>
                      <th class="text-primary">Route To</th>
                      <th class="text-primary">Start Tming</th>
                      <th class="text-primary">How long Time</th>
                      <th class="text-primary">Date</th>
                      <th class="text-primary">EDIT</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      if (!empty($_SESSION['bus'])) {
                          foreach ($_SESSION['bus'] as $abus) {
                              echo "<tr>";
                              echo "<td>" . $abus['bus_number'] . "</td>";
                              echo "<td>" . $abus['bus_name'] . "</td>";
                              echo "<td>" . $abus['route_from'] . "</td>";
                              echo "<td>" . $abus['route_to'] . "</td>";
                              echo "<td>" . $abus['start_time'] . "</td>";
                              echo "<td>" . $abus['how_long'] . "</td>";
                              echo "<td>" . $abus['tdate'] . "</td>";?>


                              <form action="auroute.php" method="post">
                                <input type="hidden" name="aabusid" value="<?php echo $abus['busid']; ?> ">
                              <td><a href="auroute.php"><button type="submit" name="submit25" class="btn btn-success">Edit</button></a></td>
                              </form>

                            <?php  echo "</tr>";
                          }
                      } else {
                          echo "<tr><td colspan='8'>No bus records found.</td></tr>";
                      }

                      ?>
                  </tbody>
                </table>
              </div>
            </div>

          </div>

          </div>

      </div>
    </div>
      <!-- CONTAINER 2 -->

    </div>
</body>
</html>