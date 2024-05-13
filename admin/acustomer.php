<?php
session_start();

include('../admin/db.php');
$db = new Database($servername, $username, $password, $dbname);

class customercontrol {
    public $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function acreate() {
        $sql = "SELECT * FROM customers"; 
        $cselect = mysqli_query($this->conn, $sql);
        $_SESSION['cus'] = array(); 
        if ($cselect) {
            while ($row = $cselect->fetch_assoc()) {
                $_SESSION['cus'][] = $row; 
            }
        }
        return $cselect; 
    }

    public function acusdel($acustidd) {
        $acusdel = "DELETE FROM customers WHERE id ='$acustidd'";
        $acu = $this->conn->query($acusdel);
        if ($acu) {
          header('Location:acustomer.php');  
        }
    }

    public function acusboodel($acustidd) {
        $abookdel = "DELETE FROM booking WHERE cusid ='$acustidd'";
        $abdu = $this->conn->query($abookdel);
        if ($abdu) {
          header('Location:acustomer.php');  
        }
    }
}

$customerControl = new customercontrol($db->conn);
$cselect = $customerControl->acreate();


if (isset($_POST['submit34'])) {
  $_SESSION['acustidd'] = $_POST['acustidd'];
  $acustidd = $_POST['acustidd'];

  $customerControl->acusdel($acustidd);

  $customerControl->acusboodel($acustidd);

}

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CUSTOMERS</title>
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
        <div class="bg-white p-2 mt-4 mb-4 backg" style="border-radius: 15px; height: 1000px;">
          
          <div class="row ">
            <div class="col-lg-12 col-sm-12 bg-transprent ">
              <h1 style="font-family: 'Grand Hotel'; color: white;">Coustomers</h1>
            </div>


            <div class="col-lg-12 col-sm-12 bg-transprent ">
              
              <div class=" mt-3 me-4">
                <h2 class="text-dark" style="font-family: 'Grand Hotel';">All Customers Details</h2> 
                  <div class="table-responsive">
                    <table class="table table-secondary table-hover table-striped text-center">
                      <thead>
                        <tr>
                          <th class="text-primary">Name</th>
                          <th class="text-primary">Email</th>
                          <th class="text-primary">Phone</th>
                          <th class="text-primary">Address</th>
                          <th class="text-primary">City</th>
                          <th class="text-primary">State</th>
                          <th class="text-primary">Pincode</th>
                          <th class="text-primary">DOB</th>
                          <th class="text-primary">Profile</th>
                          <th class="text-primary">Edit</th>
                          <th class="text-primary">Remove</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        if (!empty($_SESSION['cus'])) {
                          foreach ($_SESSION['cus'] as $cust) {
                            echo "<tr>";
                            echo "<td>" . $cust['name'] . "</td>";
                            echo "<td>" . $cust['email'] . "</td>";
                            echo "<td>" . $cust['phone_number'] . "</td>";
                            echo "<td>" . $cust['address'] . "</td>";
                            echo "<td>" . $cust['city'] . "</td>";
                            echo "<td>" . $cust['state'] . "</td>";
                            echo "<td>" . $cust['pincode'] . "</td>";
                            echo "<td>" . $cust['date_of_birth'] . "</td>";?>
                            <td><img src="/rese/customer/<?php echo $cust['profile_photo']; ?> " style="width: 100px; height: 80px; border-radius: 15px;"> </td>
                            
                            <td>
                              <form action="acusup.php" method="post">
                                <input type="hidden" name="acustid" value="<?php echo $cust['id']; ?>">
                                <button type="submit" name="submit35" class="btn btn-success">Edit</button>
                              </form>
                            </td>

                            




                            <form method="post" action="">
                          <input type="hidden" name="acustidd" value="<?php echo $cust['id']; ?>">
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
                                              <h5 class="text-danger">Do you want to remove the customer?....</h5>
                                               <button type="submit" name="submit34" class="btn btn-danger">REMOVE</button>
                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </form>






                            <?php
                            echo "</tr>";
                          }
                        } else {
                          echo "<tr><td colspan='11'>No customer records found.</td></tr>";
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