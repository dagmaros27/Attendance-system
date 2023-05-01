<?php

ob_start();
session_start();

if($_SESSION['name']!='oasis')
{
  header('location: login.php');
}
?>
<?php include('../connect.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Attendance Management System </title>
<meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="../css/main.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
   
  <link rel="stylesheet" href="styles.css" >
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</style>

</head>
<body>

<header>

  <h1>Attendance Management System</h1>
  <div class="navbar">
  <a href="index.php">Home</a>
  <a href="students.php">Students</a>
  <a href="attendance.php">Attendance</a>
  <a href="report.php">Report</a>
  <a href="../logout.php">Logout</a>


</div>

</header>

<center>

<div class="row">

  <div class="content">
    <h3>Student List</h3>
    <br>
    <form method="post" action="">
      <label>Batch (ex. 2023)</label>
      <input type="text" name="sr_batch">
      <input type="submit" name="sr_btn" value="Show" >
    </form>
    <br>
    <table class="table table-stripped">
      <thead>
        <tr>
          <th scope="col">Registration No.</th>
          <th scope="col">Name</th>
          <th scope="col">Department</th>
          <th scope="col">Batch</th>
          <th scope="col">Semester</th>
          <th scope="col">Email</th>
        </tr>
      </thead>

   <?php

    if(isset($_POST['sr_btn'])){
     
     $srbatch = $_POST['sr_batch'];
     $i=0;
     
     $all_query = mysqli_query($conn,"select * from students where students.st_batch = '$srbatch' order by st_id asc ");
     
     while ($data = mysqli_fetch_array($all_query,MYSQLI_ASSOC)) {
       $i++;
     
     ?>
  <tbody>
     <tr>
       <td><?php if (isset($data['st_id'])) {
            echo $data['st_id'];
        }
        ?></td>
        <td><?php if (isset($data['st_name'])) {
            echo $data['st_name'];
        }
        ?></td>
        <td><?php if (isset($data['st_dept'])) {
            echo $data['st_dept'];
        }
        ?></td>
        <td><?php if (isset($data['st_batch'])) {
            echo $data['st_batch'];
        }
        ?></td>
        <td><?php if (isset($data['st_sem'])) {
            echo $data['st_sem'];
        }
        ?></td>
        <td><?php if (isset($data['st_email'])) {
            echo $data['st_email'];
        }
        ?></td>
     </tr>
  </tbody>

     <?php 
          } 
              }
      ?>
      
    </table>

  </div>

</div>

</center>

</body>
</html>
