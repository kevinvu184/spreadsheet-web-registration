<?php
session_start();

// Not allow student to manual type in url to direct to this page
if (empty($_SESSION['range'])) {
    header("Location: ./index.php");
}

// require_once "./client.php";

// $date = $hour = "";
// $inputErr = FALSE;

// Query slot from spreadsheet
// $range = $sheet2 . "!A2:C97";
// $response = $service->spreadsheets_values->get($spreadsheetId, $range);
// $values = $response->getValues();

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $inputErr = TRUE;
//     $date = $_POST["date"];
//     $hour = $_POST["hour"];
    
    // Only query spreadsheet if there are date and hour.
    // if ($date != "" && $hour != "") {
    //     $code = giveCode($date, $hour);
        
        // Query slot again (concurency issue) from spreadsheet
        // $response = $service->spreadsheets_values->get($spreadsheetId, $range);
        // $values = $response->getValues();

        // Check if the slot have been taken
//         foreach ($values as $row) {
//             if ($code == $row[0]) {
//                 if ($row[1] == 0) {
//                     $inputErr = FALSE;
                    
//                     // Update the Slot sheet
//                     updateSpreadSheet("1", $sheet2, $row[2], $service, $spreadsheetId, $params);

//                     // Update the Student sheet
//                     updateSpreadSheet($row[0], $sheet1, $_SESSION['range'], $service, $spreadsheetId, $params);

//                     session_unset();
//                     header("Location: ./index.php");
//                 }
//                 break;
//             }
//         }
//     }
// }
?>

<!DOCTYPE html>

<html>

<head>
    <!-- <style>
        .column {
        float: left;
        width: 33.33%; }

        .row:after {
        content: "";
        display: table;
        clear: both; }

        table {
        border-collapse: collapse;
        width: 100%; }

        td, th {
        border: 1px solid #dddddd;
        text-align: left; }

        .even {
        background-color: #dddddd; }
    </style> -->

    <!-- <script src="./script.js"></script> -->
</head>

<body>
    <h1>Network Programming - Demo Register</h1>
    
    <h3 style="color: red;">There is no available slot. Please contact your tutor to register the demo!</h3>

    <!-- <div class="row"> -->
        <!-- <div class="column">
            <h3>If you do task A (work individually) please skip partner field.</h3>
            <h3>If you do task B (work in group) please contact with your tutor for registration.</h3>
            <h3>Enter student id begin with Upper 'S', i.e. S123456</h3>
            
            <form action="#" method="POST" onsubmit='return  validateFormChooseSlot()'>
                <h4>
                    <label>Date</label>
                    <select id="date" name="date" onchange='limitHour();' required>
                        <script>seedDay()</script>
                    </select>
                    <div id='dateErr'></div>
                </h4>

                <h4>
                    <label>Hour</label>
                    <select id="hour" name="hour" required>
                        <script>renderHour()</script>
                    </select>
                    <div id='hourErr'></div>
                </h4>

                <input type="submit" name="submit"/>

                <?php if ($inputErr == TRUE): ?>
                    <h3 style="color: red;">Either invalid input or your student id does not exist in 
                    our database or the slot have been taken right before you submit.</h3>
                    <h3>Please try again a few more times. If it still does not work, please let your tutor know.</h3>
                <?php endif ?>
            </form>
        </div> -->

        <!-- <div class="column">
            <h2>Week 11 Available Slot</h2>
            <table>
                <tr>
                    <th>Date</th>
                    <th>Time</th>
                </tr>
                <?php foreach ($values as $row): ?>
                    <?php if ($row[1] == 0 && isWeek11($row[0])): ?>
                        <tr class="<?php echo (substr($row[0],0,2) == 18 || substr($row[0],0,2) == 21)? "even" :"odd"; ?>">
                            <td><?php echo giveDate($row[0]); ?></td>
                            <td><?php echo giveHour($row[0]); ?></td>
                        </tr>
                    <?php endif ?>
                <?php endforeach ?>
            </table>
        </div> -->

        <!-- <div class="column">
            <h2>Week 12 Available Slot</h2>
            <table>
                <tr>
                    <th>Date</th>
                    <th>Time</th>
                </tr>
                <?php foreach ($values as $row): ?>
                    <?php if ($row[1] == 0 && !isWeek11($row[0])): ?>
                        <tr class="<?php echo (substr($row[0],0,2) == 25 || substr($row[0],0,2) == 28)? "even" :"odd"; ?>">
                            <td><?php echo giveDate($row[0]); ?></td>
                            <td><?php echo giveHour($row[0]); ?></td>
                        </tr>
                    <?php endif ?>
                <?php endforeach ?>
            </table>
        </div> -->
    <!-- </div> -->
</body>

</html>


