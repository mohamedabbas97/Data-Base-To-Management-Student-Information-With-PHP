<?php
// Connect to database
if(isset($_POST["submit"])){
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
$id = $_POST["id"];
$name = $_POST["name"];
$fathername = $_POST["fathername"];

// Query database to delete record that matches parameters
$sql = "DELETE FROM student_info WHERE ID='$id' AND name='$name' AND fathername='$fathername'";

header("Location : deleteData.php");
// Close connection
$conn->close();
}
?>

<?php
 echo '<script type="text/javascript">
 window.onload = function ()
  {
 alert ("تمت عملية الحذف بنجاح انتقل لصفحة عرض البيانات لرؤية النتيجة");
 
  }
 </script>';
 



?>