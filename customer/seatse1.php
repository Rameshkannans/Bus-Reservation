onclick="bookSeats()"

<?php
                        // Start the session (make sure this is at the beginning of your script)
                        session_start();

                        $bss = '<div id="booked-seats"></div>';
                        $tcs = '<div id="total-cost"></div>';

                        // Set the session variables
                        $_SESSION['bss'] = $bss;
                        $_SESSION['tcs'] = $tcs;
                        ?>

                        <!-- Your HTML code here -->
                        <form action="conformbooking.php" method="post">
                            <input type="hidden" name="bose" value="<?php echo $_SESSION['bss']; ?>">
                            <input type="hidden" name="toam" value="<?php echo $_SESSION['tcs']; ?>">
                            <button type="submit" onclick="bookSeats()" name="subm" class="btn btn-success">Book Seats</button>
                        </form>





                            <?php 
                            $bss = '<div id="booked-seats"></div>';
                            $tcs = '<div id="total-cost"></div>';
                            $_SESSION['bss'] = $bss;
                            $_SESSION['tcs'] = $tcs;
                            ?>

                    <form action="conformbooking.php" method="post">
                        <input type="hidden" name="bose" value="<?php echo $_SESSION['bss']; ?>">
                        <input type="hidden" name="toam" value="<?php echo $_SESSION['tcs']; ?>">
                        <a href="conformbooking.php"><button type="submit" name="subm" class="btn btn-success" >Book Seats</button></a>
                    </form>
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
                   <a href="conformbooking.php"><button class="btn btn-success" onclick="bookSeats()">Book Seats</button></a>
                </div>
                 <div id="booked-seats"></div>
                <div id="total-cost"></div>
            </div>
        </div>
    </div>

    <script>
        var totalSeats = 34;
        var seatPrice = 100;
        var bus = document.querySelector('.bus');
        var quantityInput = document.getElementById('quantity');
        var bookedSeats = [];
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
            var bookingInfo = 'Booked ' + quantity + ' seats: ' + seats.join(', ');
            bookedSeats.push(bookingInfo);

            var bookedSeatsDisplay = document.getElementById('booked-seats');
            bookedSeatsDisplay.textContent = bookedSeats.join('\n');

            calculateTotalCost();

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'seatsel.php', true);
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    
                }
            };
            var data = JSON.stringify({ seats: seats, quantity: quantity });
            xhr.send(data);
        }

        init();
    </script>
<?php

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     // Get the JSON data sent via POST request
//     $postData = file_get_contents('php://input');
//     $data = json_decode($postData);
//     $_SESSION['selectedSeats'] = $data->seats;
//     $_SESSION['quantity'] = $data->quantity;
    
//     echo 'Data stored in session successfully.';
// } else {
//     echo 'Invalid request.';
// }
?>






<!DOCTYPE html>
<html>

<head>
    <title>Seat Booking</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 bg-transparent p-5">
                <div class="text-center mb-5">
                    <label for="quantity"><h4 class="text-warning">Select Quantity: </h4></label><br>
                    <input type="number" id="quantity" min="1" max="10" value="1">
                </div>
                <div class="bus"></div>
                <div class="text-center">
                    <button class="btn btn-success" onclick="bookSeats()">Book Seats</button>
                </div>
                <div id="booked-seats"></div>
                <div id="seat-quantity"></div>
                <div id="total-cost"></div>
            </div>
        </div>
    </div>

    <script>
        var totalSeats = 34;
        var seatPrice = 100;
        var bus = document.querySelector('.bus');
        var quantityInput = document.getElementById('quantity');
        var bookedSeats = [];
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

            // Display the selected seats and seat quantity
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

            // Now, you can submit the data to the server using AJAX or a form as needed
            // For simplicity, we'll just display the data here
            console.log('Selected Seats:', seats);
            console.log('Seat Quantity:', quantity);

            calculateTotalCost();
        }

        init();
    </script>
</body>

</html>






<div id="booked-seats">10</div>
<form action="storeData.php" method="post">
    <input type="hidden" name="bookedSeats" id="booked-seats-input" value="10">
    <input type="submit" value="Submit">
</form>
<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['bookedSeats'])) {
        $_SESSION['bookedSeats'] = $_POST['bookedSeats'];
        header('Location: success.php'); // Redirect to a success page or another page as needed
        exit();
    } else {
        // Handle invalid data or errors
        header('Location: error.php'); // Redirect to an error page
        exit();
    }
}
?>





































               <div id="total-cost"></div>
                    <form action="conformbooking.php" method="post">
                        <input type="hidden" name="bookedSeats" id="booked-seats-input">
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

            // Display the selected seats and seat quantity
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
            console.log('Selected Seats:', seats);
            console.log('Seat Quantity:', quantity);

            calculateTotalCost();
        }

        init();
    </script>


                <?php
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        if (isset($_POST['bookedSeats'])) {
                            $_SESSION['bookedSeats'] = $_POST['bookedSeats'];
                            $_SESSION['seatQuantity'] = $_POST['seatQuantity'];
                            $_SESSION['totalCost'] = $_POST['totalCost'];
                           echo "success";
                        } else {
                           
                           echo "nothing"; 
                        }
                    }
                    ?>