<!DOCTYPE html>
<html>
<head>
	<title>حذف البيانات</title>
    <link rel="stylesheet" href="display.css">
	<link rel="stylesheet" href="add.css">
	<style>
		.h2{
			color: white;
			font-weight: 600;
			position: relative;
			left :240px;
			
		}
        body{
			/*
            background-color: white;
			*/
			background-color: #b8b4b4;
        }
        label{
            font-size: 19px;
            font-weight: 500;
            letter-spacing: 1px;
            text-align: center;
        }
		h1 {
			color: #4CAF50;
			margin-left: 40%;
			margin-top: 5%;

		}
		form {
            background-color: #c4c6c7;
			margin-left: 35%;
			margin-top: 5%;
			border-radius: 5px;
			background-color: #f2f2f2;
			padding: 20px;
			width: 30%;
			box-shadow: 3px 3px 10px #888888;
		}
		input[type=text] {
			width: 450px;
			padding: 12px 20px;
			margin: 8px 0;
			box-sizing: border-box;
			border-radius: 10px;
            background-color: #b8b4b4;
		}
		input[type=submit] {
			background-color: #c50a0a;
			color: white;
			padding: 14px 20px;
			margin-top: 10px;
			border-radius: 14px;
			border:none;
			cursor:pointer;
            width: 450px;
			font-size: 15px;
			font-weight: bold;
			letter-spacing: 2px;
		}
		input[type=submit]:hover {
			background-color:#45a049;
		}
	</style>
</head>
<body class="deletebody">

<header>
    <div class="navbar">
       <a href="displayData.php" target="_blank"> <button class="button delete">عرض</button>  </a>
       <a href="updateData.php" target="_blank"> <button class="button update">تعديل</button>  </a>
       <a href="addData.php" target="_blank">    <button class="button adding">اضافة<i class="fa-duotone fa-plus"></i></button>  </a>
       <a href="searchData.php" target="_blank">     <button class="button search">بحث </button>  </a>
       <a href="index.php">     <button class="button logout">خروج</button>  </a>
	   
       
	   <h2 class="h2">حذف البيانات</h2>
       
    </div>

</header>
    <br>





<form method="POST" action="">
<label for="id">الرقم التعريفي</label><br>
<input type="text" id="id" name="id"><br>

<label for="name">الأسم</label><br>
<input type="text" id="name" name="name"><br>

<label for="fathername">اسم الأب</label><br>
<input type="text" id="fathername" name="fathername"><br>

<input type="submit" value="حذف">

</form>
<br>
<br>
<br>
<br>
<?php
// Connect to database

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ashbal";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get parameters from form
$id = $_POST['id'];
$name = $_POST['name'];
$fathername = $_POST['fathername'];

// Query database to delete record that matches parameters
$sql = "DELETE FROM student_info WHERE ID='$id' and name='$name' and fathername='$fathername'";
$result = mysqli_query($conn, $sql);
mysqli_close($conn);

// Close connection


?>

</body>
</html>
