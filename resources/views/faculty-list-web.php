<?php 
include 'database.php';
include 'header.php';

$mysqli = new mysqli($servername, $username, $password, $dbname);

$stmt = $mysqli->prepare("SELECT * FROM tbl_faculty");
$stmt->execute();

$arr = $stmt->get_result() ->fetch_all(MYSQLI_ASSOC);

if(!$arr) exit("No rows");


$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/faculty-list-web.css"/>
    <title>Faculty List</title>
</head>

<body>
    <!-- Html for desktop view -->
    <div class="title">
        <h2 style="color: #804444; face: verdana; text-align: center; padding-top: 20px; font-size: 30px;">Faculty</h2>
        <br>
        <h3 style="color: #846565; face: verdana; text-align: center; padding-bottom: 20px; font-size: 20px;">Choose your faculty !</h3>
    </div> 
    <div class="faculty">
            <?php	
				foreach($arr as $facultyrow) {
				?>
                <div>
                <button class="facultybutton" onclick=window.location.href="product-list-web">
                        <span><?php echo $facultyrow['faculty_SName'];?><br><b><?php echo $facultyrow['faculty_Name'];?></b</span>
                    </button>
                </div>      
				<?php
				}
			?>
        </div>
        <!-- <div>
            <button class="facultybutton" onclick=window.location.href="#">
                <span>FUU<br><b>Faculty of Law</b</span>
            </button>
        </div>
        <div>
            <button class="facultybutton" onclick=window.location.href="#">
                <span>FPERG<br><b>Faculty of Dentistry</b</span>
            </button>
        </div>
        <div>
            <button class="facultybutton" onclick=window.location.href="#">
                <span>FKAB<br><b>Faculty of Engineering and Built Environment</b</span>
            </button>
        </div>
        <div>
            <button class="facultybutton" onclick=window.location.href="#">
                <span>FST<br><b>Faculty of Science and Technology</b</span>
            </button>
        </div>
        <div>
            <button class="facultybutton" onclick=window.location.href="#">
                <span>FPEND<br><b>Faculty of Education</b</span>
            </button>
        </div>
        <div>
            <button class="facultybutton" onclick=window.location.href="#">
                <span>FEP<br><b>Faculty of Economics and Management</b</span>
            </button>
        </div>
        <div>
            <button class="facultybutton" onclick=window.location.href="#">
                <span>FPER<br><b>Faculty of Medicine</b</span>
            </button>
        </div>
        <div>
            <button class="facultybutton" onclick=window.location.href="#">
                <span>FARMASI<br><b>Faculty of Pharmacy</b</span>
            </button>
        </div>
       <div>
            <button class="facultybutton" onclick=window.location.href="#">
                <span>FTSM<br><b>Faculty of Information Science and Technology</b</span>
            </button>
       </div>
        <div>
            <button class="facultybutton" onclick=window.location.href="#">
                <span>FPI<br><b>Faculty of Islamic Studies</b</span>
            </button>
        </div>
        <div>
            <button class="facultybutton" onclick=window.location.href="#">
                <span>FSK<br><b>Faculty of Health Sciences</b</span>
            </button>
        </div>
        <div>
            <button class="facultybutton" onclick=window.location.href="#">
                <span>GSB<br><b>UKM-GSB Graduate School of Business</b</span>
            </button>
        </div>
        <div>
            <button class="facultybutton" onclick=window.location.href="#">
                <span>CITRA<br><b>Pusat Pengajian Citra Universiti</b</span>
            </button> -->
            <!-- <button class="facultybutton" onclick=window.location.href="#">
                    <label class="shortform">CITRA</label>
                    <br>
                    <label class="fullname">Pusat Pengajian Citra Universiti</label>
            </button>
        </div>-->
    </div>
    <div style="position: sticky;position: -webkit-sticky;">
        <?php include 'footer.php'?>
    </div>
</body>
