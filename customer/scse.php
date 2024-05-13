 <?php

                    if (isset($_POST['bookedSeats']) && isset($_POST['seatQuantity']) && isset($_POST['totalCost'])) {
                        $_SESSION['bookedSeats'] = $_POST['bookedSeats'];
                        $_SESSION['seatQuantity'] = $_POST['seatQuantity'];
                        $_SESSION['totalCost'] = $_POST['totalCost'];

                        echo json_encode(array('status' => 'success'));
                    } else {
                        echo json_encode(array('status' => 'error'));
                    }
                    ?>  <script>
                    var bookedSeats = document.getElementById("booked-seats").innerText;
                    var seatQuantity = document.getElementById("seat-quantity").innerText;
                    var totalCost = document.getElementById("total-cost").innerText;

                    var data = {
                        bookedSeats: bookedSeats,
                        seatQuantity: seatQuantity,
                        totalCost: totalCost
                    };

                    fetch('scse.php', {
                        method: 'POST',
                        body: JSON.stringify(data)
                    })
                    .then(response => response.json())
                    .then(data => {
                    
                    })
                    .catch(error => {
                    });
                </script>

                <?php

                    if (isset($_POST['bookedSeats']) && isset($_POST['seatQuantity']) && isset($_POST['totalCost'])) {
                        $_SESSION['bookedSeats'] = $_POST['bookedSeats'];
                        $_SESSION['seatQuantity'] = $_POST['seatQuantity'];
                        $_SESSION['totalCost'] = $_POST['totalCost'];

                        echo json_encode(array('status' => 'success'));
                    } else {
                        echo json_encode(array('status' => 'error'));
                    }
                    ?>