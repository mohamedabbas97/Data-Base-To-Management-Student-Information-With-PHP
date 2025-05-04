
<html>
<head>
    <link rel="stylesheet" href="add.css">
    <link rel="stylesheet" href="display.css">
    <title>تعديل البيانات</title>
</head>
<body>
    <!-- Create a form to collect the student information -->
     <!-- Create a navbar with three buttons -->
     <header>
    <div class="navbar">
       <a href="deleteData.php">  <button class="button delete">حذف</button>  </a>
       <a href="searchData.php" target="_blank">     <button class="button search">بحث </button>  </a>
       <a href="addData.php" target="_blank">    <button class="button adding">اضافة<i class="fa-duotone fa-plus"></i></button></a>
       <a href="index.php" target="_blank">     <button class="button logout">خروج</button>  </a>
  
       <a href="displayData.php">  <button class="button display">عرض</button> </a>
       
    </div>
    </header>
    <br>
    
    <form class="form" method="post" enctype="multipart/form-data">
        <!-- Create a label and an input for the name -->
        
        <label for="name">المعرف</label>
        <input type="number" id="id" name="id" placeholder="المعرف"required>

        <label for="name">تعديل الاسم</label>
        <input type="text" id="name" name="name" placeholder="تعديل اسم الطالب"required>

        <!-- Create a label and an input for the fathername -->
        <label for="fathername">تعديل اسم الاب</label>
        <input type="text" id="fathername" name="fathername" placeholder="تعديل اسم اب الطالب ">

        <!-- Create a label and an input for the grandname -->
        <label for="grandname">تعديل اسم الجد</label>
        <input type="text" id="grandname" name="grandname" placeholder="تعديل اسم جد الطالب">

        <!-- Create a label and an input for the age -->
        <label for="age">تعديل العمر</label>
        <input type="number" id="age" name="age" placeholder="تعديل عمرالطالب">

        <!-- Create a label and an input for the location -->
        <label for="location">تعديل عنوان السكن</label>
        <input type="text" id="location" name="location" placeholder="تعديل عنوان السكن-المدينه اوالحي">

        <!-- Create a label and an input for the phonenumber -->
        <label for="phonenumber"> تعديل هاتف ولي الامر</label>
        <input type="tel" id="phonenumber" name="phonenumber" placeholder="تعديل هاتف ولي الامر" >

        <br>
        <label for="class">المرحلة الدراسي</label>
        <input type="text" name="class" id="" placeholder="الصف الدراسي">
        <br>

        <!-- Create a label and an input for the image -->
        <label for="image">تعديل صورة</label>
        <input type="file" id="image" name="image" accept="image/*" value="اضف صورة" placeholder="اضافة صورة">
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
            $id = $_POST['id'];
            $name = $_POST["name"];
            $fathername = $_POST["fathername"];
            $grandname = $_POST["grandname"];
            $age = $_POST["age"];
            $location = $_POST["location"];
            $phonenumber = $_POST["phonenumber"];
            $class = $_POST['class'];

        //    global $rundom_id;
            //$rundom_id=rand(1000,50000);
            

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
            
            $sql = "UPDATE student_info SET name='$name', fathername='$fathername', grandname='$grandname', age='$age', location='$location', phonenumber='$phonenumber', image='$image_path' ,class='$class' WHERE ID='$id'";
            
            
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
            alert ("تمت عملية التعديل بنجاح انتقل لصفحة عرض البيانات لرؤية النتيجة");
            
             }
            </script>';
             echo '<script>alert ("'.$name."  ".$fathername."  ".$grandname."  ".$age."  ".$location."  ".$phonenumber." ".'");</script>';
        }
    }
    ?>
</body>
</html>

