<?php
session_start();


$buttonState = isset($_SESSION['buttonState']) ? $_SESSION['buttonState'] : 'REMOVE LOCATION';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($buttonState === 'SEND LOCATION') {
        $buttonState = 'REMOVE LOCATION';
    } else {
        $buttonState = 'SEND LOCATION';
    }
    $_SESSION['buttonState'] = $buttonState;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Toggle Button Example</title>

</head>
<body>
    <h1>Toggle Button</h1>
    <form method="post">
        <button type="submit" class="btn-success"><p><?php echo $buttonState; ?></p></button>
    </form>
    
</body>
</html>
<?php
session_start();
$buttonState = isset($_SESSION['buttonState']) ? $_SESSION['buttonState'] : 'SEND LOCATION';
?>
    <?php if ($buttonState === 'REMOVE LOCATION'): ?>
        <p>This is a visible paragraph.</p>
    <?php endif; ?>











    
