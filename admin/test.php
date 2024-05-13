<?php
class User {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function login($username, $password) {
        $conn = $this->db->getConnection();
        $username = $conn->real_escape_string($username);
        $password = $conn->real_escape_string($password);

        $query = "SELECT * FROM users WHERE username='$username' AND password='" . md5($password) . "'";
        $result = $conn->query($query);

        if ($result && $result->num_rows == 1) {
            // User authenticated successfully
            session_start();
            $_SESSION['username'] = $username;
            return true;
        }

        // Authentication failed
        return false;
    }

    public function logout() {
        session_start();
        session_destroy();
    }
}



include('User.php');

$user = new User();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($user->login($username, $password)) {
        header("Location: dashboard.php"); // Redirect to the dashboard on successful login
    } else {
        $error = "Invalid username or password";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if (isset($error)) echo "<p>$error</p>"; ?>
    <form method="post" action="">
        <label for="username">Username</label>
        <input type="text" name="username" required><br><br>

        <label for="password">Password</label>
        <input type="password" name="password" required><br><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>




<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to the login page if not authenticated
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION['username']; ?></h2>
    <a href="logout.php">Logout</a>
</body>
</html>



<?php
include('User.php');
$user = new User();
$user->logout();
header("Location: login.php"); // Redirect to the login page after logout
?>




?>