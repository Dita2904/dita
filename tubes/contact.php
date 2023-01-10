<?php
include "koneksi.php";

if(isset($_POST['proses'])){
mysqli_query($koneksi, "insert into contact set  
name= '$_POST[name]',
email = '$_POST[email]',
phonenumber = '$_POST[phonenumber]',
message = '$_POST[message]'");



}

?>








<! DOCTYPE html>
<html lang="en">
<head>
	<meta charsed="UTF-8">
	<title>About | Home </title>
	<link rel="stylesheet" href="CSS3.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;1,300&display=swap" rel="stylesheet">

</head>

<body>



	<div class ="header">
	<div class="header-part">
		<div class="logo"><h1> Basic Coffee</h1>
		</div>
<div class="navbar">
	<ul class="menu">
	<li><a href="Main web.php">Home</a></li>
		<li><a href="index.php">Order</a></li>
		<li><a href="contact.php">Contact Us</a></li>
	</ul>
</div>
</div>
</div>

<div class="content">
	<div class="wrapper">
		<div class ="media">
	<h2>Contact Us</h2>
	
	<br>
		<br>
	
	</div>

<p>Basic Coffee</p>
<p>Fakultas Ilmu Terapan</p>
<p>Telkom university Bandung Jawa Barat</p>
<p>Phone number : 082369988298</p>
<br>

<a href="https://www.whatsapp.com/" target="_blank">
     <span><img src="https://gdurl.com/vfga" alt="whatssap" style="width:50px;height:50px;"></a></span>


    <br>
    <br>
		<form action="" method="post">

<table>
    <tr>
        <td width="120"> Name</td>
        <td> <input type="text" name="name"> </td>
    </tr>
    <tr>
        <td> Email</td>
        <td> <input type="text" name="email"> </td>
    </tr>
    <tr>
        <td> Phone Number </td>
        <td> <input type="text" name="phonenumber"> </td>
    </tr>
    <tr>

    	 <tr>
        <td>Message </td>
        <td> <textarea name="message" rows="8" cols="80"></textarea></td>
    </tr>
    <tr>



        <td></td>
        <td><input type="submit"  name="proses" onclick="alert('Thank you for sending a message')" value="Send Message"> </td>   
    </tr>
</table>

</form>



 </div>      
</div>
</div>     
</div>      
</div>
</div>


<div class="footer">
	<br>
	<p>dita regita</p> 
</div>



</body>
</html>

