
<html>
<head>
    <link rel="stylesheet" href="add.css">
    <link rel="stylesheet" href="display.css">
    <title>اضافة البيانات</title>
</head>
<body>
    <!-- Create a form to collect the student information -->
     <!-- Create a navbar with three buttons -->
     <header>
    <div class="navbar">
    <a href="deleteData.php">  <button class="button delete">حذف</button>  </a>
       <a href="searchData.php" target="_blank">     <button class="button search">بحث </button>  </a>
       <a href="updateData.php" target="_blank"> <button class="button update">تعديل</button>  </a>
       <a href="index.php" target="_blank">     <button class="button logout">خروج</button>  </a>  
       <a href="displayData.php">  <button class="button display">عرض</button> </a>
       
    </div>
    </header>
    <br>
    
    <form class="form" method="post" enctype="multipart/form-data">
        <!-- Create a label and an input for the name -->
        <label for="name">الاسم</label>
        <input type="text" id="name" name="name" placeholder="اسم الطالب"required>

        <!-- Create a label and an input for the fathername -->
        <label for="fathername">اسم الاب</label>
        <input type="text" id="fathername" name="fathername" placeholder="اسم اب الطالب">

        <!-- Create a label and an input for the grandname -->
        <label for="grandname">اسم الجد</label>
        <input type="text" id="grandname" name="grandname" placeholder="اسم جد الطالب">

        <!-- Create a label and an input for the age -->
        <label for="age">العمر</label>
        <input type="number" id="age" name="age" placeholder="عمر الطالب">

        <!-- Create a label and an input for the location -->
        <label for="location">عنوان السكن</label>
        <input type="text" id="location" name="location" placeholder="عنوات السكن-المدينه و الحي">

        <!-- Create a label and an input for the phonenumber -->
        <label for="phonenumber">هاتف ولي الامر</label>
        <input type="tel" id="phonenumber" name="phonenumber" placeholder="هاتف ولي الامر" >

        <label for="class">المرحلة الدراسي</label>
        <input type="text" name="class" id="" placeholder="الصف الدراسي">
        <br>

        <!-- Create a label and an input for the image -->
        <label for="image">صورة الطالب</label>
        <input type="file" id="image" name="image" accept="image/*" value="اضف صورة" placeholder="addimage">
        <br>
        <!-- Create a submit button -->
        <input type="submit" name="submit" value="اضافة">
    </form>

    <?php
    // Check if the form is submitted
    if (isset($_POST["submit"])) {
        
    /*    echo '<script type="text/javascript">
        window.onload = function () {
        alert ("تمت عملية الأضافة بنجاح");
        }
        </script>';         */


        
        // Connect to the database using mysqli
        $server  = "localhost";
        $dbname = "ashbal";
        $usname = "root";
        $pass = "";
        $conn = mysqli_connect("$server", "$usname", "$pass", "$dbname");
        
        // Check if the connection is successful
        if ($conn) {

            // Get the data from the form inputs as variables
            $name = htmlspecialchars($_POST["name"]);//htmlspecialchars()
            $fathername = htmlspecialchars($_POST['fathername']);
            $grandname = $_POST["grandname"];
            $age = $_POST["age"];
            $location = $_POST["location"];
            $phonenumber = $_POST["phonenumber"];
            $class = $_POST["class"];
        //    global $rundom_id;
            $rundom_id=rand(1000,50000);
            

            // Get the image from the file input as a variable
            $image = $_FILES["image"];

            // Get the image name, type, size and temporary location
            $image_name = $image["name"];
            $image_type = $image["type"];
            $image_size = $image["size"];
            $image_tmp = $image["tmp_name"];

            // Set a folder path to store the uploaded image
            $folder = "images/";

            // Move the uploaded image from the temporary location to the folder
            move_uploaded_file($image_tmp, $folder.$image_name);

            // Set a variable to store the image path in the database
            $image_path = $folder.$image_name;

            // Query the database to insert the data into the table
            $sql = "INSERT INTO student_info (ID,name, fathername, grandname, age, location, phonenumber,class,image) VALUES ('$rundom_id','$name', '$fathername', '$grandname', '$age', '$location', '$phonenumber', '$class','$image_path')";

            // Execute the query and store the result
            $result = mysqli_query($conn, $sql);

            // Check if the result is successful
      #      if ($result) {
                // Display a success message
               // echo "<p>Data inserted successfully</p>";
      #      } else {
                // Display an error message
              //  echo "<p>Data insertion failed</p>";
      #      }

            // Close the connection
            mysqli_close($conn);
            echo '<script type="text/javascript">
            window.onload = function ()
             {
            alert ("تمت عملية الأضافة بنجاح انتقل لصفحة عرض البيانات لرؤية النتيجة");
            
             }
            </script>';
             echo '<script>alert ("'.$name."  ".$fathername."  ".$grandname."  ".$age."  ".$location."  ".$phonenumber.'");</script>';
unset($name);
unset($fathername);
unset($grandname);
unset($age);
unset($location);
unset($phonenumber);
unset($class);
        }
    }
    ?>
</body>
</html>
