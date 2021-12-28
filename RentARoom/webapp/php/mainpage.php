<?php
include_once("../dbconnect.php");
$sqlrooms = "SELECT * FROM tbl_room ORDER BY regdate DESC";
$stmt = $conn->prepare($sqlrooms);
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$rows = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <script src="../javascript/script.js"></script>
    <title>Mainpage</title>
</head>

<body>
    <div class="w3-header w3-container w3-row w3-blue w3-padding-32">
        <div class="w3-display-container w3-third w3-padding-24 w3-hide-small" style="height: 240px;">
            <img src="logo.jfif"  width="200" height="200" class="w3-display-topmiddle" style="font-size: 256px;">
        </div>

        <div class="w3-header w3-container w3-twothird">
        <h1 style="font-size:calc(20px + 2vw); font-family:algerian; font-weight:bold" class=" w3-center w3-hide-small w3-text-white">ROOM4RENT JOHOR</h1>
            <h2 style="font-size:calc(14px + 2vw); font-family:algerian; font-weight:bold" class="w3-center w3-hide-large w3-hide-medium w3-text-white">ROOM4RENT JOHOR</h2>
            <p style="font-size:calc(20px + 1vw); font-family:time new roman; font-weight:bold" class="w3-center w3-text-white w3-hide-small">Welcome to ROOM4RENT JOHOR</p>
            <p style="font-size:calc(12px + 1vw); font-family:time new roman; font-weight:bold" class="w3-center w3-text-white w3-hide-large w3-hide-medium">Welcome to ROOM4RENT JOHOR</p>
        </div>
    
    </div>

    <div class="w3-bar w3-blue-gray">
        <a href="#contact" class="w3-bar-item w3-button w3-right">Logout</a>
        <a href="newroom.php" class="w3-bar-item w3-button w3-left">New Room</a>
    </div>

    <div class="w3-grid-template">
        <?php
            foreach ($rows as $rooms){
                $id = $rooms['id'];
                $contact = $rooms['contact'];
                $title = $rooms['title'];
                $description = $rooms['description'];
                $price = $rooms['price'];
                $deposit = $rooms['deposit'];
                $state = $rooms['state'];
                $area = $rooms['area'];
                $latitude = $rooms['latitude'];
                $longitude = $rooms['longitude'];
                echo "<div class='w3-center w3-padding'>";
                echo "<div class='w3-card-4 w3-green'>";
                echo "<header class='w3-container w3-green'";
                echo "<h5>$title</h5>";
                echo "</header>";
                echo "<img class='w3-image' src=../res/images/$id.png" .
                " onerror=this.onerror=null;this.src='../res/images/profile.png'"
                . "style='width:100%;height:250px'>";
                echo "<div class='w3-container w3-left-align'><hr>";
                echo "<p><i class='fa fa-id-card' style='font-size:16px'></i> 
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp$id<br>
                <i class='fa fa-money' style='font-size:16px'>
                </i>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp$price<br>
                <i class='fa fa-money' style='font-size:16px'>&nbsp(Deposit)
                </i>&nbsp&nbsp$deposit<br>
                <i class='fa fa-phone' style='font-size:16px'>
                </i>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp$contact<br>
                <i class='fa fa-info-circle' style='font-size:16px'>
                </i>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp$description<br>
                <i class='fa fa-flag' style='font-size:16px'>
                </i>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp$state<br>
                <i class='fa fa-map' style='font-size:16px'>
                </i>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp$area<br>
                <i class='fa fa-globe' style='font-size:16px'>
                </i>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp$latitude<br>
                <i class='fa fa-globe' style='font-size:16px'>
                </i>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp$longitude<br></p><hr>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        
        ?>

    </div>


    <footer class="w3-footer w3-center w3-blue-grey">
        <p>ROOM4RENT</p>
    </footer>

</body>
</html>