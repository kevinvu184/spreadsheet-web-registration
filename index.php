<?php
session_start();

require_once "./client.php";

$id = $slot_code = "";
$inputErr = FALSE;

// Query student from spreadsheet
$range = $sheet1 . "!A2:C128";
$response = $service->spreadsheets_values->get($spreadsheetId, $range);
$values = $response->getValues();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputErr = TRUE;
    $id = $_POST["id"];
    
    // Check if the id is in the spreadsheet
    foreach ($values as $row) {
        if ($id == $row[0]) {
            $inputErr = FALSE;

            // Check if the student have registered or not.
            // -> have: show the registered date, haven't: direct to register page.
            if ($row[1] == NULL) {
                $_SESSION['range'] = $row[2];
                header("Location: ./main.php");
            } else {
                $slot_code = $row[1];
            }
            break;
        }
    }
}
?>

<html>
<head></head>
<body>
    <h1>Network Programming - Demo Slot Check</h1>
    <form action="#" method="POST">
        <h3>Enter your student id begin with Upper 'S', i.e. S123456</h3>
        <h3>
            <input type="text" name="id" required>
        </h3>
        <input type="submit" name="submit"/>
        
        <?php if ($inputErr == TRUE): ?>
            <h3 style="color: red;">Either invalid input or your student id does not exist in our database!
            <br>You must enter a valid student id starting with 's'.</h3>
            <h3>Please try again a few more times. If it still does not work, please let your tutor know.</h3>
        <?php endif ?>
        
        <?php if ($slot_code != ""): ?>
            <h4>You were registered the following date:</h4>
            <h1><?php echo giveDate($slot_code) . " at " . giveHour($slot_code) ?></h1>
        <?php endif ?>
    </form>
</body>
</html>