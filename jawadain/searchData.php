
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>البحث عن البيانات</title>
    <style>
        body{
            background-color: #caccce;
        }
        table{
            border-collapse: separate;
            /* border-collapse: collapse;  Collapse the table borders */
            width: 100%; /* Set the table width to 100% of the container */
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            border-radius: 10px;
            text-align: center;

        }
       table td{
            border: 1px solid rgb(185, 183, 182); /* Add a light gray border around the cells */
            padding: 10px; /* Add some padding inside the cells */
            border-radius: 5px;
            align-items:center;
            background-color: rgb(234, 232, 231);
            text-align: center; 
        }
        table th{
            background-color:rgb(71, 24, 190); /* Set a blue background color */
            color: white; /* Set a white text color */
            padding: 10px; /* Add some padding inside the cells */
            text-align: left; /* Align the text to the left */
            border-radius: 3px;
            text-align: center;
        }
        .submit {
            margin: 10px; /* Add some margin around the buttons */
            padding: 10px; /* Add some padding inside the buttons */
            border: none; /* Remove the default border */
            font-size: 16px; /* Set a font size */
            cursor: pointer; /* Change the cursor to a pointer when hovering */
            border-radius: 10px;   
            letter-spacing: 1px;
            background-color: #12549b;
            color:white ;
            width: 80px;
            height: 45px;
            }
            .navbar {
                align-items:center; /* Align items vertically */
                display:flex; /* Use flex layout */
                padding: 10px; /* Add some padding */
                background-color:rgb(71, 24, 190); /* Set a light gray background color */
                height: 70px;
                border-radius: 10px;
            }
            .button {
                margin: 10px; /* Add some margin around the buttons */
                padding: 10px; /* Add some padding inside the buttons */
                border: none; /* Remove the default border */
                font-size: 16px; /* Set a font size */
                cursor: pointer; /* Change the cursor to a pointer when hovering */
                border-radius: 10px;   
                letter-spacing: 1px;
            }

/* Style the delete button */
            .delete {
                background-color: #821010; /* Set a red background color */
                color: white; /* Set a white text color */
                letter-spacing: 1px;
            }

/* Style the update button */
            .update {
                background-color: #12549b; /* Set a blue background color */
                color: white; /* Set a white text color */

            }

/* Style the adding button */
            .adding {
                background-color: #2f9e2f; /* Set a green background color */
                color: rgb(255, 255, 255); /* Set a white text color */
            }
            .logout{
  /*  background-color: rgb(210, 105, 30);
    color: white;   */

                background-color: #93a01d; /* Set a green background color */
                color: rgb(250, 247, 247);
            }

            .display{
                background-color: #ad098f; /* Set a green background color */
                color: rgb(250, 247, 247);

            }
            .inputtext{
                width: 310px;
                height: 45px;
                color: black;
                font-weight: 600;
                border-radius: 10px;
                font-size: 18px;
            }

    </style>
</head>
<body>
    <header>
        <div class="navbar">
            <a href="deleteData.php"> <button class="button delete">حذف</button>    </a>
            <a href="updateData.php"> <button class="button update">تعديل</button>  </a>
            <a href="addData.php">    <button class="button adding">اضافة</button>  </a>
            <a href="displayData.php"><button class="button display">عرض</button>   </a>
            <a href="index.php">     <button class="button logout">خروج</button>   </a>
           
       
        </div>

    </header>
    <br>


    <div align="center">
    <form method="post" action="">
        <input type="text" name="search" placeholder="....بحث في قاعدة البيانات" class="inputtext">
        <input type="submit" value="بحث" class="submit">
    </form>
    <br>
    <br>
    <br>
    <table class="table" border="1" align='center' width='100%' class='table'>
        <!-- Create a table header row with column names -->
        
        <tr align='center'>
            
            <th align='center' style='font-width:bold;font-color:red;'>هاتف ولي الامر</th>
            <th align='center'>العنوان</th>
            <th align='center'>العمر</th>
            <th align='center'>اسم الجد</th>
            <th align='center'>اسم الاب</th>
            <th align='center'>الأسم</th>
            <th align='center'>المعرف</th>
            
            
           
        </tr>
    
    </div>

    <?php
       
         $search_term = $_POST['search'];

         // Connect to the database
         $pdo = new PDO('mysql:host=localhost;dbname=ashbal', 'root', '');
         
         // Prepare the SQL statement
         $sql = "SELECT * FROM student_info WHERE ID like :search_term OR name LIKE :search_term
         OR fathername LIKE :search_term OR grandname LIKE :search_term 
         OR age LIKE :search_term OR location LIKE :search_term OR phonenumber LIKE :search_term
         OR class LIKE :search_term";
         
         //$sql = '$search_term';
         // Bind parameters to statement
         $stmt = $pdo->prepare($sql);
         $stmt->bindValue(':search_term', '%' . $search_term . '%');
         
         // Execute statement
         $stmt->execute();
         
         // Fetch results
         $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
         
         // Display results
         foreach ($results as $result) {
            $id = $result['ID'];
            $name=$result['name'];
            $father=$result['fathername'];
            $grand=$result['grandname'];
            $age=$result['age'];
            $location=$result['location'];
            $phone=$result['phonenumber'];
            $class = $result['class'];

            echo "<tr align='center'>";
            echo "<td style='font-weight:700;'>$phone</td>";
            echo "<td style='font-weight:700;'>$location</td>";
            echo "<td style='font-weight:700;'>$age</td>";
            echo "<td style='font-weight:700;'>$grand</td>";
            echo "<td style='font-weight:700;'>$father</td>";
            echo "<td style='font-weight:700;'>$name</td>";
            echo "<td style='font-weight:700;'>$id</td>";
           
         }
        

        

    ?>


    
</body>

</html>
