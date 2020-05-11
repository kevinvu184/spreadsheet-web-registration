<?php

require_once "./client.php";

$range = $sheet3 . "!B2:D97";
$response = $service->spreadsheets_values->get($spreadsheetId, $range);
$values = $response->getValues();
?>

<!DOCTYPE html>

<head>
    <title>NP Demo | Register Demo</title>
    <style>
        .column {
        float: left;
        width: 50%; }

        .row:after {
        content: "";
        display: table;
        clear: both; }

        table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%; }

        td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px; }

        tr:nth-child(even) {
        background-color: #dddddd; }
    </style>
</head>

<body>
    <div class="row">
        <div class="column">
            <p>Hi <?php echo $_COOKIE['user_name']; ?>!<br>
            Please register your demo below.
            If you do task A (work individually) please skip partner field.<br>
            If you do task B (work in group) please put your teamate id. Only one of you need to register.<br>
            Thank you all!</p>
            <form action="./sheets.php" method="POST">
                <div>
                    <label for="pid1">Partner 1</label>
                    <input id="pid1" type="text" placeholder="Individual - Leave blank" name="pid1">
                </div>
                <div>
                    <label for="pid2">partner 2</label>
                    <input id="pid2" type="text" placeholder="Individual - Leave blank" name="pid2">
                </div>
                <div>
                    <label for="date">Date</label>
                    <select id="date" name="date">
                        <option selected>Choose date...</option>
                        <optgroup label="Week 10">
                            <option value="date1">Monday, 18 May 2020</option>
                            <option value="date2">Tuesday, 19 May 2020</option>
                            <option value="date3">Thursday, 21 May 2020</option>
                            <option value="date4">Friday, 22 May 2020</option>
                        </optgroup>
                        <optgroup label="Week 11">
                            <option value="date5">Monday, 25 May 2020</option>
                            <option value="date6">Tuesday, 26 May 2020</option>
                            <option value="date7">Thursday, 28 May 2020</option>
                            <option value="date8">Friday, 29 May 2020</option>
                        </optgroup>
                    </select>
                </div>
                <div>
                    <label for="hour">Hour</label>
                    <select id="hour" name="hour">
                        <option selected>Choose hour...</option>
                        <option>09:00</option>
                        <option>10:00</option>
                        <option>11:00</option>
                        <option>14:00</option>
                        <option>15:00</option>
                        <option>16:00</option>
                        <option>17:00</option>
                    </select>
                </div>
                <div>    
                    <input type="radio" name="gender" id="team" value="team">
                    <label for="team">Ms Team</label>
                    
                    <input type="radio" name="gender" id="zoom" value="zoom">
                    <label for="zoom">zoom</label>
                    
                    <input type="radio" name="gender" id="collaborate-ultra" value="collaborate-ultra">
                    <label for="collaborate-ultra">Collaborate Ultra</label>
                </div>
                <input type="submit" name="submit" id="register" value="Register" />
            </form>
        </div>
        <div class="column">
            <h2>Available Slot</h2>
            <table>
                <tr>
                    <th>Week</th>
                    <th>Date</th>
                    <th>Time</th>
                </tr>
                <?php if (empty($values)): ?>
                <p style="color: red;">No more available slot! Please contact tutor if you haven't register.</p>
                <?php else: ?>
                <?php foreach ($values as $row): ?>
                <tr>
                    <th><?php echo $row[0]; ?></th>
                    <td><?php echo $row[1]; ?></td>
                    <td><?php echo $row[2]; ?></td>
                </tr>
                <?php endforeach ?>
                <?php endif ?>
            </table>
        </div>
    </div>
</body>

</html>


