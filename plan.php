<?php

require_once("connect.php");

if(isset($_GET['week'])){
    $week = $_GET['week'];
} else {
    $week = 'A';
}

if(isset($_GET['day']) && is_numeric($_GET['day']) && $_GET['day'] >= 1 && $_GET['day'] <= 5){
    $day = $_GET['day'];
} else {
    $day = 1;
}

$sql = 'SELECT `groupName` FROM `groups` WHERE `weekType` = "'.$week.'" ORDER BY groupOrder';
$result = mysqli_query($connection, $sql);

$sql1 = 'SELECT `termID`, `dayName` FROM `terms` WHERE `dayNumber` = '.$day;
$result1 = mysqli_query($connection, $sql1);
$row1 = mysqli_fetch_array($result1);

$sql2 = 'SELECT `groupID` FROM `groups` WHERE `weekType` = "'.$week.'" ORDER BY groupOrder';
$result2 = mysqli_query($connection, $sql2);

// $row2 = mysqli_fetch_array($result2);
// $sql12 = 'SELECT c.classID, c.termID, c.groupID, c.indexStart, c.indexStop, ct.typeColor, c.row1, c.row2, c.row3, c.row4, ct.typeLetter FROM `classes` AS c JOIN `classtypes` AS ct ON c.classTypeID = ct.classTypeID WHERE c.termID = '.$row1[0].' AND c.groupID = '.$row2[0].' ORDER BY c.indexStart';
// $row2 = mysqli_fetch_array($result2);
// $sql13 = 'SELECT c.classID, c.termID, c.groupID, c.indexStart, c.indexStop, ct.typeColor, c.row1, c.row2, c.row3, c.row4, ct.typeLetter FROM `classes` AS c JOIN `classtypes` AS ct ON c.classTypeID = ct.classTypeID WHERE c.termID = '.$row1[0].' AND c.groupID = '.$row2[0].' ORDER BY c.indexStart';
// $row2 = mysqli_fetch_array($result2);
// $sql14 = 'SELECT c.classID, c.termID, c.groupID, c.indexStart, c.indexStop, ct.typeColor, c.row1, c.row2, c.row3, c.row4, ct.typeLetter FROM `classes` AS c JOIN `classtypes` AS ct ON c.classTypeID = ct.classTypeID WHERE c.termID = '.$row1[0].' AND c.groupID = '.$row2[0].' ORDER BY c.indexStart';

// $result12 = mysqli_query($connection, $sql12);
// $result13 = mysqli_query($connection, $sql13);
// $result14 = mysqli_query($connection, $sql14);

// $sql1 = 'SELECT * FROM `terms` WHERE termID = '.$_GET['tid'];
// $result1 = mysqli_query($connection, $sql1);
// $row1 = mysqli_fetch_array($result1);

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <script src="links.js"></script>
    <title>InfaPlan - Plany Zajęć</title>
</head>
<body>
<header>

</header>
<main>
    <div id="main">
        <h1>Plany zajęć 2026/2027</h1>
        </br>
        <div id="daySelector">
            <button type="button" class="selectorButton" onclick="daySelector(<?php if($day >= 2 && $day <= 5){echo $day-1;}else{echo '5';} echo ', \''.$week.'\''; ?>)"><</button>
            <h2><?php echo $row1[1]; ?></h2>
            <button type="button" class="selectorButton" onclick="daySelector(<?php if($day >= 1 && $day <= 4){echo $day+1;}else{echo '1';} echo ', \''.$week.'\''; ?>)">></button>
        </div>
        <div id="weekSelector">
            <button type="button" class="selectorButton" onclick="daySelector(<?php echo $day.', '; if($week == 'A'){echo '\'B\'';}else{echo '\'A\'';} ?>)"><</button>
            <h4><?php echo 'Tydzień: '.$week; ?></h4>
            <button type="button" class="selectorButton" onclick="daySelector(<?php echo $day.', '; if($week == 'A'){echo '\'B\'';}else{echo '\'A\'';} ?>)">></button>
        </div>
        <div id="planArea">

<?php

$amountOfStudents = 4;

// Generating schedule for all people
for($student = 0; $student < $amountOfStudents; $student++){
    // Getting data for first/next person
    $row2 = mysqli_fetch_array($result2);
    $sql11 = 'SELECT c.classID, c.termID, c.groupID, c.indexStart, c.indexStop, ct.typeColor, c.row1, c.row2, c.row3, c.row4, ct.typeLetter FROM `classes` AS c JOIN `classtypes` AS ct ON c.classTypeID = ct.classTypeID WHERE c.termID = '.$row1[0].' AND c.groupID = '.$row2[0].' ORDER BY c.indexStart';
    $result11 = mysqli_query($connection, $sql11);

                ECHO <<< plan123
                <div id="plan">
                    <h3>
                plan123;
                    
                        $row = mysqli_fetch_array($result);
                        echo $row[0];
                    ECHO <<< plan123
                    </h3>
                    <div id="asd">
                        <!-- <div class="segment">
                            <div class="segmentTime">
                                <p class="time">7:30</p>
                            </div>
                            <div class="segmentContent">
                                <div class="line"></div>
                                <div class="space"></div>
                            </div>
                            <div class="segmentEmptySpace"></div>
                        </div> -->
                    plan123;

    for($i = 0; $i < 55; $i++){
        #Time Calculating
        $h = floor((($i+2)/4)+7);
        $m = (($i+2)%4)*15;
        if($m == 0) $m = "00";

        #Default Variables
        $rindex = "";
        $z = "";
        $zl = " zl";
        $color = "rgb(52, 52, 52)";
        $lcolor = "rgb(72, 72, 72)";
        $lzaj = "";
        $lc = "";
        $lz = "";
        $rowText = "";
        $letter = "";

        if(!isset($row11)){
            $row11 = mysqli_fetch_array($result11);
        }

        if(!isset($row11)){
            $row11 = mysqli_fetch_array($result11);
        } else {
            if($i >= $row11[3] && $i <= $row11[4]){
                $z = " zaj";
                $zl = " zaj";
                $lc = " lc";
                $color = $row11[5];
                $lcolor = $color;
                if($i == $row11[3]){
                    $lzaj = " lzaj";
                    $rowText = $row11[6];
                    $rindex = " rindex0";
                } else if($i == $row11[3] + 1){
                    $rowText = $row11[7];
                    $rindex = " rindex1";
                } else if($i == $row11[3] + 2){
                    $rowText = $row11[8];
                    $rindex = " rindex2";
                } else if($i == $row11[4]){
                    $rowText = $row11[9];
                    $rindex = " rindex3";
                    $letter = $row11[10];
                }
            }
            if($row11[4] == $i){
                $row11 = mysqli_fetch_array($result11);
            }
        }

        // if($i >= 7 && $i < 13) $z = " zaj";
        echo '<div class="segment"><div class="segmentTime">';
        if($m == '00' || $m == '30'){
            $lz = " lz";
            if($z == " zaj"){
                $zl = "";
            } else {
                $zl = " lp";
            }
            echo '<p class="time">'.$h.':'.$m.'</p>';
        }
        echo '</div><div class="segmentContent"><div class="line '.$zl.$lzaj.$lc.$lz.'" style="background-color: '.$lcolor.';"></div>';
        if($rindex == " rindex3"){
            echo '<div class="space'.$z.$rindex.'" style="--baseColor: '.$color.'; background-color: var(--baseColor)">'.$rowText.'<div class="typeLetter">'.$letter.'</div></div></div><div class="segmentEmptySpace"></div></div>';
        } else {
            echo '<div class="space'.$z.$rindex.'" style="--baseColor: '.$color.'; background-color: var(--baseColor)">'.$rowText.'</div></div><div class="segmentEmptySpace"></div></div>';
        }
    }

                ECHO <<< plan123
                        <div class="segment">
                            <div class="segmentTime">
                                <!-- <p class="time">21:15</p> -->
                            </div>
                            <div class="segmentContent">
                                <div class="line"></div>
                            </div>
                            <div class="segmentEmptySpace"></div>
                        </div>
                    </div>
                </div>
                plan123;
}
?>

        </div>
    </div>
</main>
</body>
</html>

<?php mysqli_close($connection); ?>