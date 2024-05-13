<?php
session_start();

include('../admin/db.php');
$db = new Database($servername, $username, $password, $dbname);

class bookingcontrol {
    public $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function acreate2() {
        $sql4 = "SELECT * FROM booking"; 
        $bookselect = mysqli_query($this->conn, $sql4);
        $_SESSION['booking'] = array(); 
        if ($bookselect) {
            while ($row2 = $bookselect->fetch_assoc()) {
                $_SESSION['booking'][] = $row2; 
            }
        }
        return $bookselect; 
    }

    public function abookdele($bookingid) {
        $aboo = "DELETE FROM booking WHERE bookingid  ='$bookingid'";
        $abdelee = $this->conn->query($aboo);
        if ($abdelee) {
          header('Location:abooking.php');  
        }
    }
}

$adminontrol = new bookingcontrol($db->conn);
$bookselect = $adminontrol->acreate2();




if (isset($_POST['submit41'])) {
  $bookingid = $_POST['bookingid'];
  $_SESSION['bookingid'] = $_POST['bookingid'];
  $adminontrol->abookdele($bookingid);
}


?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BOOKINGS</title>
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
              <h1 style="font-family: 'Grand Hotel'; color: white;">Bookings</h1>
            </div>


            <div class="col-lg-12 col-sm-12 bg-transprent ">
              
              <div class="container mt-3">
                <h2 class="text-dark" style="font-family: 'Grand Hotel';">All Ticket Booking Deatails</h2> 
                <div class="table-responsive">           
                <table class="table table-secondary table-hover table-striped text-center">
                  <thead>
                    <tr>
                      <th class="text-primary">cusid</th>
                      <th class="text-primary">bookingid</th>
                      <th class="text-primary">cprofile</th>
                      <th class="text-primary">cemail</th>
                      <th class="text-primary">cname</th>
                      <th class="text-primary">bid</th>
                      <th class="text-primary">busnumber</th>
                      <th class="text-primary">busname</th>
                      <th class="text-primary">bac</th>
                      <th class="text-primary">bsleeper</th>
                      <th class="text-primary">broute_from</th>
                      <th class="text-primary">broute_to</th>
                      <th class="text-primary">bstart_time</th>
                      <th class="text-primary">btdate</th>
                      <th class="text-primary">bookingseats</th>
                      <th class="text-primary">seatquantity</th>
                      <th class="text-primary">totaamount</th>
                      <th class="text-primary">oemail</th>
                      <th class="text-primary">oname</th>
                      <th class="text-primary">onumber</th>
                      <th class="text-primary">REMOVE BOOKING</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if (!empty($_SESSION['booking'])) {
                      foreach ($_SESSION['booking'] as $book) {
                        echo "<tr>";
                        echo "<td>" . $book['cusid'] . "</td>";
                        echo "<td>" . $book['bookingid'] . "</td>";?>
                        <td><img src="/rese/customer/<?php echo $book['cprofile']; ?> " style="width: 100px; height: 80px; border-radius: 15px;"> </td>
                <?php   echo "<td>" . $book['cemail'] . "</td>";
                        echo "<td>" . $book['cname'] . "</td>";
                        echo "<td>" . $book['bid'] . "</td>";
                        echo "<td>" . $book['busnumber'] . "</td>";
                        echo "<td>" . $book['busname'] . "</td>";
                        echo "<td>" . $book['bac'] . "</td>";
                        echo "<td>" . $book['bsleeper'] . "</td>";
                        echo "<td>" . $book['broute_from'] . "</td>";
                        echo "<td>" . $book['broute_to'] . "</td>";
                        echo "<td>" . $book['bstart_time'] . "</td>";
                        echo "<td>" . $book['btdate'] . "</td>";
                        echo "<td>" . $book['bookingseats'] . "</td>";
                        echo "<td>" . $book['seatquantity'] . "</td>";
                        echo "<td>" . $book['totaamount'] . "</td>";
                        echo "<td>" . $book['oemail'] . "</td>";
                        echo "<td>" . $book['oname'] . "</td>";
                        echo "<td>" . $book['onumber'] . "</td>";
                        ?>
                            



                             <form method="post" action="">
                           <input type="hidden" name="bookingid" value="<?php echo $book['bookingid']; ?>">
                          <div class="text-center">
                              <td><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#myModal">
                                  REMOVE
                              </button></td>
                              <div class="modal fade" id="myModal">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h4 class="modal-title text-primary">@admin <?php echo  $_SESSION['adminname'] ?>......</h4>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                          </div>
                                          <div class="modal-body text-center">
                                              <h5 class="text-danger">Do you want to remove the customer bookings?....</h5>
                                                <button type="submit" name="submit41" class="btn btn-danger">REMOVE</button>
                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </form>





                    <?php echo "</tr>";
                         }
                    } else {
                      echo "<tr><td colspan='21'>No bus records found.</td></tr>";
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
    </div>
      <!-- CONTAINER 2 -->

    </div>
</body>
</html>