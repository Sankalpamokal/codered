<!-- index page homepage -->

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/gif/png" href="img/e19a5d55e84046c6582d92cba78734bd.png">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <title>Code Red</title>
    <link rel="stylesheet" href="styles.css">
	
<style>


footer {
    clear: both;
    position: relative;
    bottom:0px;
}
p.whyneed{
font-family:Comic Sans MS;
}
.rights{
font-size:1vw;
font-family:Comic Sans MS;
}

    .marquee {
    display:inline-block;
	color: Black;
    white-space: nowrap;
    overflow: hidden;
	margin:0px;
	width:100%;

}
.marquee ul {
    display:inline-block;
	font-size:1.5vw;
	font-family:Comic Sans MS;
    padding-left: 100%;
    animation: marquee 20s linear infinite;
	margin:0px;

}

div.contentDivision{
    width: 50%;
    margin-right: 40px;
    margin-left: 40px;
    color: #3e3c3c;
    background-color:  #fff;
    border-radius: 22px;
    padding: 30px 27px;
    margin-bottom: 100px;
    float: right;
}

@keyframes marquee {
    0%   { transform: translate(0, 0); }
    100% { transform: translate(-100%, 0); }
}

 </style>
</head>
<body id="indexbody">
<header id="indexheader">
    <div id="logodiv">
    <h1 id="codered" ><a href="index.php"><img src = "img/e19a5d55e84046c6582d92cba78734bd.png" height="10%" width="10%" id="logoindex"></a>CodeRed
        <a href="index.php"><img src = "img/RAIT_DarkBg.png" height="20%" width="20%" id="raitlogo" ></a>
    </h1>
        <hr/>
    </div>
    <ul id="ulindex">
        <li class="liindex"><a href="index.php" class="active">Home</a></li>
        <li class="liindex"><a href="pbr.php">Post Blood Request</a></li>
   <!--     <li class="liindex"><a href="br.php">Blood Requests</a></li> -->
        <li class="liindex"><a href="login.php">Donate Blood</a></li>
        <li class="liindex"><a href="needblood.php"> Need Blood</a></li>
        <li class="liindex"><a href="eligibility.html">Eligibility</a></li>
        <li class="liindex"><a href="contact.html">Contact</a></li>
    </ul>
    <hr/>
</header>


<?php 
include_once("config.php"); 

$sql = "SELECT marquee FROM camps where approve='yes' order by campid desc";
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){

     while($row = mysqli_fetch_array($result)){
	 echo "<div class=marquee><p>";
     echo "<ul>";
     echo "<li class=noti>". $row['marquee'] ."</li>";
     echo "</ul>";
	 echo "</p></div>";
        }
       // Close result set
        mysqli_free_result($result);
    } else{
        echo "";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
mysqli_close($conn);
?>


<img src="img/794ff2149c009f648846139d063d2e06.png" height="551.5" width="551.5" id="patientindex"/>
<section class="sectionTitle">
    <h2 style="font-family:Comic Sans MS";>Why should we donate blood?</h2>
    <div class="contentDivision">
        <ul id="points">
            <li>
                <p class="whyneed">The recipient may have been in a road accident, natural disaster, childbirth and lost huge amount of blood in these situations.</p>
                <hr/></li>
            <li>
                <p class="whyneed">A patient under surgery may need blood in case of sudden loss of blood or any medical complication.</p>
                <hr/></li>
            <li>
                <p class="whyneed">In case of certain liver ailments like Hepatitis C where there is destruction and regeneration of liver, platelet transfusion may be required.</p>
                <hr/></li>
            <li>
                <p class="whyneed">One pint of blood can save upto 3 lives , if donors give blood two to four times a year,it would prevent blood shortages.</p>
                <hr/></li>
            <li>
                <p class="whyneed">Cancer patients may require blood transfusion, especially when they are under chemotherapy (treatment which affects blood cells) or stem cell transplants. Many chemotherapy medicines and the disease itself can sometimes interfere with normal production of blood cells in the bone marrow.</p>
                <hr/></li>
        </ul>
    </div>
</section>

<footer>
       <div class="flex-c-m">
        <a href="#" class="loginsocial bg1">
            <i class="fa fa-facebook"></i>
        </a>

        <a href="#" class="loginsocial bg2">
            <i class="fa fa-twitter"></i>
        </a>

        <a href="#" class="loginsocial bg3">
            <i class="fa fa-google"></i>
        </a>
        <a href="#" class="loginsocial bg4">
            <i class="fa fa-instagram"></i>

        </a>
    </div>
	<div class="rights">| Copyright&copy; codered.com | 2018 | All rights reserved |<br/></div><br/>
</footer>
</body>
</html>