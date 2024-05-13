<?php session_start();
 ?>

<?php
class seatcontrol {
    public $conn;
    public $seleresult = [];

    public function __construct()
    {
        $host = "localhost";
        $userName = "root";
        $password = "";
        $dbName = "busreservation";
        $this->conn = new mysqli($host, $userName, $password, $dbName);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function selebuses($selebu){
      $this->seleresult[] = $selebu;
    }

    public function getselebuses(){
      return $this->seleresult;

    }
    public function seleouners($so){
      $seleow = "SELECT * FROM owner WHERE id='$so' ";
      $own = mysqli_query($this->conn, $seleow);
      $num_of_rows = mysqli_num_rows($own);
        if ($num_of_rows == 1) {
          $fetch_own = $own->fetch_assoc();
          return $fetch_own;
        }
    }

}



if (isset($_POST['searsubmit'])) {
    $bus_id  = $_POST['bus_id'];
    $own_id  = $_POST['ownid'];
    $bus_number = $_POST['bus_number'];
    $bus_name = $_POST['bus_name'];
    $bus_model = $_POST['bus_model'];
    $ac = $_POST['ac'];
    $license = $_POST['license'];
    $insurance  = $_POST['insurance'];
    $sleeper = $_POST['sleeper'];
    $route_from = $_POST['route_from'];
    $route_to = $_POST['route_to'];
    $start_time = $_POST['start_time'];
    $how_long = $_POST['how_long'];
    $bus_photo = $_POST['bus_photo'];
    $tdate = $_POST['tdate'];
    $selebu = array('bid' => $bus_id, 'id' => $own_id, 'busnumber' => $bus_number,'busname' => $bus_name, 'busmodal' => $bus_model, 'aa' => $ac, 'buslicense' => $license, 'businsurance' => $insurance, 'bussleeper' => $sleeper, 'busroute_from' => $route_from, 'busroute_to' => $route_to, 'busstart_time' => $start_time, 'bushow_long' => $how_long, 'busbus_photo' => $bus_photo, 'bustdate' => $tdate);
    $detress1 = new seatcontrol();
   $detress1->selebuses($selebu);
}
$_SESSION['ido'] = $selebu['id'];
$so = $_SESSION['ido'];
$orese= $detress1->seleouners($so);

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Seat Selection</title>
  <link rel="stylesheet" type="text/css" href="">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Grand+Hotel&display=swap');

    body {
        background-image: url('img6.jpg');
        background-size: cover; 
        background-attachment: fixed; 
        background-repeat: no-repeat;
      }
       #b1:hover {
            background-color: red; 
        }
          
        .bus {
            display: flex;
            flex-wrap: wrap;
        }
        .seat {
            width: 50px;
            height: 50px;
            margin: 5px;
            background-color: #e0e0e0;
            text-align: center;
            line-height: 50px;
            cursor: pointer;
        }
        .seat.selected {
            background-color: #3498db;
            color: #fff;
        }
  </style>
</head>
<body>

  <!-- NAvigation Bar end -->
    <nav class="navbar navbar-expand-sm bg-white navbar-dark px-1" style="position: fixed; top: 0; width: 100%; z-index: 1000; opacity: 0.8;">
        <div class="container-fluid">
            <ul class="navbar-nav ">
              <li class="nav-item">
                <a class="nav-link text-dark text-center px-4" style="font-size: 17px;"><h4 style="font-family: 'Grand Hotel', cursive;" class="text-warning">Travel</h4></a>
              </li></ul> 
              <button class="navbar-toggler bg-warning" type="button" data-bs-toggle="collapse" data-bs-target="#rks">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="rks">
                  
                    <ul class="navbar-nav ms-auto ">
                    <li class="nav-item">
                     
                    </li> 
                    </ul>
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link text-dark text-center px-4" style="font-size: 17px;" id="b1" href="#"><i class="fa fa-headphones me-2" aria-hidden="true"></i>Help</a>
                      </li> 
                    </ul>
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link text-dark text-center px-4" style="font-size: 17px;" id="b1" href="cusbooking.php">Home</a>
                      </li> 
                    </ul>
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link text-dark text-center px-4" style="font-size: 17px;" id="b1" href="customerlogout.php">Logout</a>
                      </li> 
                    </ul>
          </div>
        </div>
      </nav>
  <!-- NAvigation Bar end -->

          <nav class="navbar navbar-expand-sm bg-transparent navbar-dark shadow " style="margin-top: 60px;">
          <div class="container-fluid">
            <a class="navbar-brand" href="cusprofile.php"><img class="card-img-top rounded-circle" src="<?php echo  $_SESSION['cusdp']  ?>" alt="Card image" style="width:100px; height: 100px;"> </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
              <ul class="navbar-nav">
                <li class="nav-item" style="margin-left: 200px;">
                  <div class="d-flex">
                  <h5 class="text-warning">Name: </h5>
                  <h6 class="text-light mt-1 ms-2"><?php echo  $_SESSION['cusname']; ?></h6>
                  </div>
                </li>
                <li class="nav-item" style="margin-left: 200px;">
                  <div class="d-flex">
                  <h5 class="text-warning">Email: </h5>
                  <h6 class="text-light mt-1 ms-2"><?php echo  $_SESSION['cusemail']; ?></h6>
                  </div>
                </li>
                <!-- <li class="nav-item">
                  <a class="nav-link" href="#">Link</a>
                </li>  -->   
              </ul>
            </div>
          </div>
        </nav>



<div class="container-fluid mt-5">
  <div class="row justify-content-center">
    <div class="col-lg-8 col-sm-12 bg-transparent p-5">
      <div class="card shadow bg-transparent">
        <div class="card-body">
          

                <table class="table table-primary table-hover table-striped text-center ">
                  <thead>
                    <tr>
                      <th>BUS NUMBER</th>
                      <th>From</th>
                      <th>To</th>
                      <th>How Long</th>
                      <th>Start Time</th>
                      <th>Date</th>
                      <th>Bus Photo</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                    <?php if (!empty($detress1->getselebuses())) { 
                        foreach ($detress1->getselebuses() as $row2) { 
                          $_SESSION['busid'] = $row2['bid'];
                          $_SESSION['oid'] = $row2['id'];
                          $_SESSION['bnum'] = $row2['busnumber'];
                          $_SESSION['bc'] = $row2['aa'];
                          $_SESSION['bsleep'] = $row2['bussleeper'];
                          $_SESSION['bfrom'] = $row2['busroute_from'];
                          $_SESSION['bto'] = $row2['busroute_to'];
                          $_SESSION['bst'] = $row2['busstart_time'];
                          $_SESSION['bna'] = $row2['busname'];
                          $_SESSION['bda'] = $row2['bustdate'];
                          $so = $_SESSION['busid'];
                          $owresult = $detress1->seleouners($so);
                          ?>
                            <tr>
                                <td><?php echo $row2['busnumber']; ?></td>
                                <td><?php echo $row2['busroute_from']; ?></td>
                                <td><?php echo $row2['busroute_to']; ?></td>
                                <td><?php echo $row2['bushow_long']; ?></td>
                                <td><?php echo $row2['busstart_time']; ?></td>
                                <td><?php echo $row2['bustdate']; ?></td>
                                <td><img style="width: 100px; height: 80px; border-radius: 15px" src="/rese/buso/<?php echo $row2['busbus_photo']; ?>"></td>
                            </tr>   
                        <?php
                        }
                    }
                    ?>



                  </tbody>
                </table>



        </div>
      </div>
    </div>


        <div class="col-lg-3 col-sm-12">
          <div class="card bg-transparent shadow" style="width: 290px;">
            <img src="/rese/buso/<?php echo $orese['profile_photo']; ?> " style="width: 100px; height: 100px;" class="mx-auto rounded-circle">
            <h6 class="text-center text-info">Bus Owner Deatails</h6>
            <div class="card-body">
              <div class="d-flex">
              <h6 class="text-warning">Name : </h6>
              <h6 class="ms-auto text-light"><?php echo $orese['name']; ?> </h6>
              </div>

              <div class="d-flex">
              <h6 class="text-warning">Email : </h6>
              <h6 class="ms-auto text-light"><?php echo $orese['email']; ?> </h6>
              </div>

              <div class="d-flex">
              <h6 class="text-warning">Phone : </h6>
              <h6 class="ms-auto text-light"><?php echo $orese['phone_number']; ?> </h6>
              </div>

              <div class="d-flex">
              <h6 class="text-warning">Owner ID : </h6>
              <h6 class="ms-auto text-light"><?php echo $orese['id']; ?> </h6>
              </div>
              
            </div>
          </div>
        </div>

  </div>
</div>


    <div class="container">
        <div class="row">
            <div class="col-lg-12 bg-transparent p-5">
                <div class="text-center mb-5">
                    <label for="quantity"><h4 class="text-warning">Select Quantity: </h4></label><br>
                    <input type="number" id="quantity" min="1" max="10" value="1">
                </div>
                <div class="bus"></div>
                <div class="text-center">
                    <!-- <div id="booked-seats"></div>
                    <div id="seat-quantity"></div>
                    <div id="total-cost"></div> -->
                    <form action="conformbooking.php" method="post">
                        <input type="hidden" name="bookedSeats" id="booked-seats-input">
                        <input type="hidden" name="seatQuantity" id="seat-quantity-input">
                        <input type="hidden" name="totalCost" id="total-cost-input">
                       <a href="conformbooking.php"><button onclick="bookSeats()" type="submit" value="Submit" class="btn btn-success">Book Seats</button></a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        var totalSeats = 34;
        var seatPrice = 100;
        var bus = document.querySelector('.bus');
        var quantityInput = document.getElementById('quantity');
        var totalCostDisplay = document.getElementById('total-cost');

        function init() {
            for (var i = 1; i <= totalSeats; i++) {
                var seat = document.createElement('div');
                seat.classList.add('seat');
                seat.textContent = i;
                seat.addEventListener('click', function () {
                    toggleSeat(this);
                });
                bus.appendChild(seat);
            }
        }

        function toggleSeat(seat) {
            seat.classList.toggle('selected');
        }

        function calculateTotalCost() {
            var selectedSeats = document.querySelectorAll('.seat.selected');
            var quantity = parseInt(quantityInput.value);

            if (selectedSeats.length !== quantity) {
                totalCostDisplay.textContent = '';
                return;
            }

            var totalCost = selectedSeats.length * seatPrice;
            totalCostDisplay.textContent = 'Total Cost RS: ' + totalCost;

         
            var selectedSeatNumbers = Array.from(selectedSeats).map(function (seat) {
                return seat.textContent;
            });

            document.getElementById('booked-seats').textContent = 'Selected Seats: ' + selectedSeatNumbers.join(', ');
            document.getElementById('seat-quantity').textContent = 'Seat Quantity: ' + quantity;
        }

        function bookSeats() {
            var selectedSeats = document.querySelectorAll('.seat.selected');
            var quantity = parseInt(quantityInput.value);

            if (selectedSeats.length === 0) {
                alert('Please select at least one seat to book.');
                return;
            }

            if (selectedSeats.length !== quantity) {
                alert('Please select ' + quantity + ' seats to book.');
                return;
            }

            var seats = Array.from(selectedSeats).map(function (seat) {
                return seat.textContent;
            });

            document.getElementById('booked-seats-input').value = seats.join(', ');
            document.getElementById('seat-quantity-input').value = quantity;
            document.getElementById('total-cost-input').value = selectedSeats.length * seatPrice;
            console.log('Selected Seats:', seats);
            console.log('Seat Quantity:', quantity);

            calculateTotalCost();
        }

        init();
    </script>






</body>
</html>