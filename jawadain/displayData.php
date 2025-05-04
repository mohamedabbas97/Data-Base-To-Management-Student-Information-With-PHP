<html>
<head>
    <link rel="stylesheet" href="display.css">
    <link rel="stylesheet" href="">
    <title>عرض البيانات</title>
    <meta http-equiv="refresh" content="6">
</head>
<body class="body">
<div>
    <!-- Create a navbar with three buttons -->
    <header>
    <div class="navbar">
       <a href="deleteData.php" target="_blank"> <button class="button delete">حذف</button>  </a>
       <a href="updateData.php" target="_blank"> <button class="button update">تعديل</button>  </a>
       <a href="addData.php" target="_blank">    <button class="button adding">اضافة<i class="fa-duotone fa-plus"></i></button>  </a>
       <a href="searchData.php" target="_blank">     <button class="button search">بحث </button>  </a>
       <a href="index.php" target="_blank">     <button class="button logout">خروج</button>  </a>
       <a href="http://" target="_blank"> <img src="fa.png" alt="" srcset="" id="logo" width="45px" height="45px"> </a>
       
    </div>

    </header>
    <br>
    <!--#######################-->
    <?php
//هذ الكود لارجاع عدد الطلاب في قاعدة البيانات وعرضها في لوحة التحكم
// Connect to the database using mysqli
$con = mysqli_connect("localhost", "root", "", "ashbal");

// Check if the connection is successful
if ($con) {
  // Query the database to select all data from the table
  $sql = "SELECT * FROM student_info";
  // Execute the query and store the result
  $result = mysqli_query($con, $sql);

  // Check if the result is not empty
  if ($result) {
    // Get the number of rows in the result set
    $rowcount = mysqli_num_rows($result);
    // Display the number of rows // #d9107f
    echo "<h1 align='center' style='color:#d9107f; font-size:25;align=center;'>$rowcount :عدد الطلاب في قاعدة البيانات هو</h1>"; 
  }

  // Close the connection
  mysqli_close($con);
}
?>

  <!-- #region   
    //echo "<h1 align='center' style='color:red; font-size:25;align=center;'> $rowcount :عدد الطلاب في قاعدة البيانات هو</h1>"; 
          -->
    <br>    
    
    
 

    <!-- Create a table to display the data from the database -->
    
    <table class="table" border="1" align='center'>
        <!-- Create a table header row with column names -->
        
        <tr align='center'>
            <th align='center'>الصورة</th>
            <th align="center">الصف</th>
            <th align='center'>هاتف ولي الامر</th>
            <th align='center'>العنوان</th>
            <th align='center'>العمر</th>
            <th align='center'>اسم الجد</th>
            <th align='center'>اسم الاب</th>
            <th align='center'>الأسم</th>
            <th align='center'>المعرف</th>
            
           
        </tr>

        <?php
        // Connect to the database using mysqli
        
        $server  = "localhost";
        $dbname = "ashbal";
        $usname = "root";
        $pass = "";

        //$conn = new mysqli($server,$usname,$pass,$dbname);
       // $conn = mysqli_connect("localhost", "username", "password", "database");
       $conn = mysqli_connect("$server", "$usname", "$pass", "$dbname");

        // Check if the connection is successful
        if ($conn) {
            // Query the database to select all data from the table
            $sql = "SELECT * FROM student_info";
            // Execute the query and store the result
            
            $result = mysqli_query($conn, $sql);
            $rowcount = mysqli_num_rows($result);
            
           
            // Check if the result is not empty
            if ($result) {
                // Loop through each row of the result
                
                while ($row = mysqli_fetch_assoc($result)) {
                  
                    // Extract the data from each row as variables
                    $name = $row["name"];
                    $fathername = $row["fathername"];
                    $grandname = $row["grandname"];
                    $age = $row["age"];
                    $location = $row["location"];
                    $phonenumber = $row["phonenumber"];
                    $image = $row["image"];
                    // to get the class in school or golage;
                    $class= $row['class'];
                    $rundom_id = $row['ID'];

                    // Create a table data row with the extracted data
                    
                    echo "<tr align='center'>";
                   

                    echo "<td><img src='$image' class='image'></td>";
                    echo "<td style='font-weight:700;'>$class</td>";
                    echo "<td style='font-weight:700;'>$phonenumber</td>";
                    echo "<td style='font-weight:700;letter-spacing: 1px;'>$location</td>";
                    echo "<td style='font-weight:700;'>$age</td>";
                    echo "<td style='font-weight:700;letter-spacing: 1px;'>$grandname</td>";
                    echo "<td style='font-weight:700;letter-spacing: 1px;'>$fathername</td>";
                    echo "<td style='font-weight:700;letter-spacing: 1px;'>$name</td>";
                    echo "<td style='color:#993011;font-weight:900;'>$rundom_id</td>";
                    
                    
                    // Display the image using the image path stored in the database
                    echo "</tr>";
                    
                    
                }
                
            }
            
            // Close the connection
            mysqli_close($conn);
        }
        ?>
    </table>
    
    <br>
    <?php 
    echo "<h1 align='center' style='color:red; font-size:25;align=center;'> $rowcount :عدد الطلاب في قاعدة البيانات هو</h1>"; 
    ?>
    <br>

</div>

<div class="footer" style="background-color:rgb(71, 24, 190);">
 <div class="copy"style="background-color:rgb(71, 24, 190);">© محمد عبدالخضر</div>
  <div class="social" >
    <a href="#"><img src="fa.png" alt="Facebook" ></a>
    <a href="#"><img src="instagram.png" alt="Instagram"></a>  
  </div>
</div>

</body>
</html>
