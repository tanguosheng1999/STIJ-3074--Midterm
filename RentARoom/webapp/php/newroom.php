<?php
if (isset($_POST["submit"])) {
    include_once("../dbconnect.php");
    $idno = $_POST["idno"];
    $contact = $_POST["contact"];
    $title = $_POST["title"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $deposit = $_POST["deposit"];
    $state = $_POST["state"];
    $area = $_POST["area"];
    $latitude = $_POST["latitude"];
    $longitude = $_POST["longitude"];
    $sqlregister = "INSERT INTO `tbl_room`(`id`,`contact`, `title`, `description`, `price`, `deposit`,`state`, `area`, `latitude`, `longitude`) VALUES('$idno','$contact', '$title', '$description', '$price', '$deposit','$state', '$area', '$latitude', '$longitude')";
    try {
        $conn->exec($sqlregister);
        if (file_exists($_FILES["fileToUpload"]["tmp_name"]) || is_uploaded_file($_FILES["fileToUpload"]["tmp_name"])) {
            uploadImage($idno);
        }
        echo "<script>alert('Registration successful')</script>";
        echo "<script>window.location.replace('mainpage.php')</script>";
    } catch (PDOException $e) {
        echo "<script>alert('Registration failed')</script>";
        echo "<script>window.location.replace('newroom.php')</script>";
    }
}
function uploadImage($id)
{
    $target_dir = "../res/images/";
    $target_file = $target_dir . $id . ".png";
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
}


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
    <title>New Room</title>
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

    <div class="w3-bar w3-blue-grey">
        <a href="#contact" class="w3-bar-item w3-button w3-right">Logout</a>
        <a href="newroom.php" class="w3-bar-item w3-button w3-left">Home</a>
    </div>

    <div class="w3-container w3-padding form-container">
        <div class="w3-card">
            <div class="w3-container w3-blue">
                <P>New Room Registration</P>
            </div>

            <form class="w3-container w3-padding" name="registerForm" action="newroom.php" method="post" enctype="multipart/form-data">
            <div class="w3-container w3-border w3-center w3-padding">
                    <img class="w3-image w3-round w3-margin" src="../res/images/profile.png" style="width:100%; max-width:600px"><br>
                    <input type="file" onchange="previewFile()" name="fileToUpload" id="fileToUpload"><br>
                </div>

                <p>
                    <label>RoomId</label>
                    <input class="w3-input w3-border w3-round" name="idno" id="idid" type="text" required>
                </p>

                <p>
                    <label>Contact</label>
                    <input class="w3-input w3-border w3-round" name="contact" id="contactid" type="text" required>
                </p>

                <p>
                    <label>Title</label>
                    <input class="w3-input w3-border w3-round" name="title" id="titleid" type="text" required>
                </p>

                <p>
                    <label>Description</label>
                    <input class="w3-input w3-border w3-round" name="description" id="descriptionid" type="text" required>
                </p>

                <p>
                    <label>Price</label>
                    <input class="w3-input w3-border w3-round" name="price" id="priceid" type="text" required>
                </p>

                <p>
                    <label>Deposit</label>
                    <input class="w3-input w3-border w3-round" name="deposit" id="depositid" type="text" required>
                </p>

                <p>
                    <label>State</label>
                    <select class="w3-input w3-border w3-round" name="state" id="stateid">
                        <option value="Johor">Johor</option>
                        <option value="Kedah">Kedah</option>
                        <option value="Kelantan">Kelantan</option>
                        <option value="Melaka">Melaka</option>
                        <option value="Negeri Sembilan">Negeri Sembilan</option>
                        <option value="Pahang">Pahang</option>
                        <option value="Perlis">Perlis</option>
                        <option value="Pulau Pinang">Pulau Pinang</option>
                        <option value="Sabah">Sabah</option>
                        <option value="Sarawak">Sarawak</option>
                        <option value="Selangor">Selangor</option>
                        <option value="Terengganu">Terengganu</option>
                    </select>
                </p>

                <p>
                    <label>Area</label>
                    <input class="w3-input w3-border w3-round" name="area" id="areaid" type="text" required>
                </p>

                <p>
                    <label>Latitude</label>
                    <input class="w3-input w3-border w3-round" name="latitude" id="latitudeid" type="text" required>
                </p>

                <p>
                    <label>Longitude</label>
                    <input class="w3-input w3-border w3-round" name="longitude" id="longitudeid" type="text" required>
                </p>

                <div class="row">
                    <input class="w3-input w3-border w3-block w3-blue w3-round" onclick="return confirm('Are your sure？')" type="submit" name="submit" value="Submit">
                </div>

            </form>
        </div>
    </div>

    <footer class="w3-footer w3-center w3-blue-grey">
        <p>ROOM4RENT</p>
    </footer>
    
</body>
</html>