<html lang="en">

<head>
  <link rel="stylesheet" href="style.css">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Primary School Database</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
      background-color: #DDD0C8;
    }

    .navbar {
      overflow: hidden;
      background-color: #800020;
      /* Burgundy */
    }

    .navbar a {
      float: left;
      font-size: 16px;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
    }

    .dropdown {
      float: left;
      overflow: hidden;
    }

    .dropdown .dropbtn {
      font-size: 16px;
      border: none;
      outline: none;
      color: white;
      padding: 14px 16px;
      background-color: #800020;
      /* Burgundy */
      font-family: inherit;
      margin: 0;
    }

    .navbar a:hover,
    .dropdown:hover .dropbtn {
      background-color: #008000;
      /* Green */
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #800020;
      /* Burgundy */
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      z-index: 1;
    }

    .dropdown-content a {
      float: none;
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
      text-align: left;
    }

    .dropdown-content a:hover {
      background-color: #008000;
      /* Green */
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }
  </style>
</head>

<body>
  <hr>
  <hr>
  <h1 style="text-align: center; color: #323232;">Rishton Primary School</h1>
  <hr>
  <hr>
  <div class="navbar">
    <a href="index.html">Home</a>
    <div class="dropdown">
      <button class="dropbtn">View
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <a href="ViewStudent.php">Pupil</a>
        <a href="ViewParent.php">Parent</a>
        <a href="ViewTeacher.php">Teacher</a>
        <a href="ViewClass.php">Class</a>
      </div>
    </div>
    <div class="dropdown">
      <button class="dropbtn">Add
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <a href="AddStudent.php">Pupil</a>
        <a href="AddParent.php">Parent</a>
        <a href="AddTeacher.php">Teacher</a>
        <a href="AddClass.php">Class</a>
      </div>
    </div>
    <div class="dropdown">
      <button class="dropbtn">Delete
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <a href="delStudent.php">Pupil</a>
        <a href="delParent.php">Parent</a>
        <a href="delTeacher.php">Teacher</a>
        <a href="delClass.php">Class</a>
      </div>
    </div>
    <div class="dropdown">
      <button class="dropbtn">Update
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <a href="Updatestudent.php">Pupil</a>
        <a href="UpdateParent.php">Parent</a>
        <a href="UpdateTeacher.php">Teacher</a>
        <a href="UpdateClass.php">Class</a>
      </div>
    </div>
  </div>
  </div>

  <hr>

  <h3>Add a New Parent/Guardian</h3>

  <form method="post" action="AddParent.php">

    <label>Parent Name:</label>
    <input type="text" name="Parent_Name">
    <br>

    <label>Parent DOB:</label>
    <input type="date" name="Parent_DOB">
    <br>

    <label>Parent Address:</label>
    <input type="text" name="Parent_Address">
    <br>

    <label>Parent Email:</label>
    <input type="email" name="Parent_Email">
    <br>

    <label>Parent PhoneNumber:</label>
    <input type="tel" name="Parent_PhoneNumber">
    <br>

    <label>Pupil ID:</label>
    <input type="text" name="PupilID">
    <br>

    <br>
    <input type="submit" name="submit">

    <label>Select Student:</label>
    <select name="PupilID">
      <?php
      $link = mysqli_connect("localhost", "root", "root", "school");
      // Check connection
      if ($link === false) {
        die("Connection failed: ");
      }
      $sql = mysqli_query($link, "SELECT PupilID, Pupil_name FROM Pupil");
      while ($row = $sql->fetch_assoc()) {
        echo "<option value='{$row['PupilID']}'>{$row['Pupil_name']}</option>";
      }
      ?>
    </select>
    <br>
    <br>
    <input type="submit" name="submit">

  </form>

  <?php

  if (isset($_POST['submit'])) {

    $ParentID = $_POST['ParentID'];
    $Parent_Name = $_POST['Parent_Name'];
    $Parent_DOB = $_POST['Parent_DOB'];
    $Parent_Address = $_POST['Parent_Address'];
    $Parent_Email = $_POST['Parent_Email'];
    $Parent_PhoneNumber = $_POST['Parent_PhoneNumber'];
    $PupilID = $_POST['PupilID'];

    $sql = "INSERT INTO Parents (ParentID, Parent_Name, Parent_DOB, Parent_Address, Parent_Email, Parent_PhoneNumber, PupilID) VALUES ('$ParentID' ,'$Parent_Name', '$Parent_Address', '$Parent_Email', '$Parent_PhoneNumber', '$PupilID')";
    if (mysqli_query($link, $sql)) {
      echo "New record created successfully";
    } else {
      echo "Error adding record ";
    }

  }

  $link->close();
  ?>

  <hr>
</body>

</html>