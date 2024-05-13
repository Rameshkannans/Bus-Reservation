<?php
session_start();
include('../admin/db.php');
$db = new Database($servername, $username, $password, $dbname);
?>
<?php

if (isset($_POST['busreg'])) {
    $inputData = [
        'busnum' => mysqli_real_escape_string($db->conn, $_POST['busnum']),
        'busname' => mysqli_real_escape_string($db->conn, $_POST['busname']),
        'busmodal' => mysqli_real_escape_string($db->conn, $_POST['busmodal']),
        'ac' => mysqli_real_escape_string($db->conn, $_POST['ac']),
        'lic' => mysqli_real_escape_string($db->conn, $_POST['lic']),
        'ins' => mysqli_real_escape_string($db->conn, $_POST['ins']),
        'sleepers' => mysqli_real_escape_string($db->conn, $_POST['sleepers']),
        'route1' => mysqli_real_escape_string($db->conn, $_POST['route1']),
        'route2' => mysqli_real_escape_string($db->conn, $_POST['route2']),
        'start' => mysqli_real_escape_string($db->conn, $_POST['start']),
        'long' => mysqli_real_escape_string($db->conn, $_POST['long']),
        'dat' => mysqli_real_escape_string($db->conn, $_POST['dat']),
        'profile' => $_FILES['busdp']['name'],
        'file_temp_path' => $_FILES['busdp']['tmp_name'],
    ];

    $admins = new busregcontrol($db->conn);
    $results = $admins->create($inputData);

    if ($results) {
        $_SESSION['message'] = "Bus Added Successfully";
        header("Location: busdeatailsdash.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Not Inserted";
        header("Location: areg.php");
        exit(0);
    }
}

class busregcontrol
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function create($inputData)
    {
        $id = $_SESSION['ownerid'];
        $cus_id = $_SESSION['id'];
        $profile = $inputData['profile'];
        $file_tmp_path = $inputData['file_temp_path'];
        
        $storage_path = "bus_profile/" . $profile;
        
        if (move_uploaded_file($file_tmp_path, $storage_path)) {
            $bQuery = "INSERT INTO buses (busid, id, bus_number, bus_name, bus_model, ac, license, insurance, sleeper, route_from, route_to, start_time, how_long, bus_photo, tdate) VALUES ('$cus_id', '$id', '{$inputData['busnum']}', '{$inputData['busname']}', '{$inputData['busmodal']}', '{$inputData['ac']}', '{$inputData['lic']}', '{$inputData['ins']}', '{$inputData['sleepers']}', '{$inputData['route1']}', '{$inputData['route2']}', '{$inputData['start']}', '{$inputData['long']}', '$storage_path', '{$inputData['dat']}')";
            
            $badminregister = mysqli_query($this->conn, $bQuery);
            if ($badminregister) {
                return true;
                header('Location:busdeatailsdash.php');
            } else {
                return false;
            }
        } else {
            return false; 
        }
    }
}
?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bus Registration</title>
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
  </style>
</head>
<body>

<div class="container mt-5 ">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <div class="card shadow-lg bg-transparent">
              <div class="card-body ">
                <h1 class="card-header text-center display-4"style="font-family: 'Grand Hotel', cursive; color: orange;" ><b>Bus Registration</b></h1>
                <form action="" method="post" enctype="multipart/form-data">
        
                  <div class="mb-3">
                    <label for="num" class="form-label text-warning"><b>Bus Number :</b></label>
                    <input type="text" id="num" name="busnum" class="form-control" required>
                  </div>
                  <div class="mb-3"> 
                    <label for="na" class="form-label text-warning"><b>Bus Name :</b></label>
                    <input type="text" id="na" name="busname" class="form-control" required>
                  </div>
                  <div class="mb-3">
                    <label for="mo" class="form-label text-warning"><b>Bus Modal :</b></label>
                    <input type="text" id="mo" name="busmodal" class="form-control" required>
                  </div>
                   <div class="mb-3">
                    <label for="ac" class="form-label text-warning"><b>AC (or) NON-AC :</b></label>
                    <select class="form-select" name="ac" id="ac">
                        <option>AC</option>
                        <option>NON-AC</option>
                      </select>
                  </div>
                   <div class="mb-3">
                    <label for="li" class="form-label text-warning"><b>Licence :</b></label>
                   <select class="form-select " name="lic"  id="li">
                        <option>YES</option>
                        <option>NO</option>
                      </select>
                  </div>
                   <div class="mb-3">
                    <label for="in" class="form-label text-warning"><b>Insurence :</b></label>
                    <select class="form-select " name="ins" id="in">
                        <option>YES</option>
                        <option>NO</option>
                      </select>
                  </div>
                  <div class="mb-3">
                    <label for="se" class="form-label text-warning"><b>Sleeper (or) Seatter :</b></label>
                    <select class="form-select " name="sleepers" id="se">
                        <option>Sleep</option>
                        <option>Seat</option>
                      </select>
                  </div>

                  <div class="mb-3">
                    <label for="ro1" class="form-label text-warning"><b>Route From :</b></label>
                    <input type="text" id="ro1" name="route1" class="form-control" required>
                  </div>
                  <div class="mb-3">
                    <label for="ro2" class="form-label text-warning"><b>Route To :</b></label>
                    <input type="text" id="ro2" name="route2" class="form-control" required>
                  </div>
                  <div class="mb-3">
                    <label for="st" class="form-label text-warning"><b>Start Timing :</b></label>
                    <input type="time" class="form-control" id="st" name="start"  required>
                  </div>
                  <div class="mb-3">
                    <label for="lo" class="form-label text-warning"><b>How Long Time(hours) :</b></label>
                    <input type="number" class="form-control" id="lo" name="long" required>
                  </div>
                  <div class="mb-3">
                    <label for="da" class="form-label text-warning"><b>Date:</b></label>
                    <input type="date" class="form-control" id="da" name="dat" required>
                  </div>
                  <div class="mb-3">
                    <label for="dp" class="form-label text-warning"><b>Select Bus Photo:</b> </label>
                    <input type="file" class="form-control" id="dp" name="busdp" accept="image/*" required>
                  </div>
                  <div class="d-grid">
                    <button type="submit" name="busreg" class="btn btn-outline-success"><b> Register</b></button>
                  </div>
                        
                        <div class="text-center mt-4">        
                          <h6 class="link text-light">Go to Dashboard<a href="busdeatailsdash.php" class="btn btn-outline-warning ms-2"><b>GO</b> </a></h6>
                        </div>
                  
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>



</body>
</html>