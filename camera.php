<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Camera</title>
<link rel="stylesheet" href="bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>
</head>

<body>

<?php
include("db_connect.php");
$sql="SELECT * from camera group by model_name";
$result=$conn->query($sql)or die(mysql_error()); 
?>

<br />
<div class="container">

  <a href="camera.php" class="btn btn-primary" role="button">Camera</a>
  <a href="laptop.php" class="btn btn-success" role="button">Laptop</a>
  <a href="phone.php" class="btn btn-warning" role="button">Phone</a>
 

<h4>Camera</h4>


<form method="post" action="">
<div class="col-sm-3">
<select name="field" class="form-control">
<option>type</option>
<option>camera_resolution</option>
<option>display</option>

</select></div><div class="col-sm-3">
<input type="text" name="value" class="form-control"/>
</div>
<div class="col-sm-3">
<input type="submit" name="submit" class="btn btn-danger"/></div>
</form>
<br /><br /><br />
<?php
if(isset($_POST['submit']))
{
$sql="SELECT * from camera where $_POST[field]='$_POST[value]' group by model_name";
$result=$conn->query($sql)or die(mysql_error()); 
}
?>


<table class="table table-bordered">
<tr>
    <th>Id</th> 
    <th>Brand</th> 
    <th>Model Name</th>
    <th>Model</th>
    <th>Type</th>
    <th>Camera Resolution </th>
    <th>Display</th>
    <th>Warranty</th>
    <th>Price</th>
    <th>Video Recording</th>
  
    </tr>


<?PHP
while($row = mysqli_fetch_assoc($result)) 
{ 
?>
<tr>
<td><?PHP echo $row['id'];?></td>
<td><?PHP echo $row['brand'];?></td>
<td><?PHP echo "<a href='camera2.php?model=$row[model_name]'>".$row['model_name'];?></a></td>
<td><?PHP echo $row['model'];?></td>
<td><?PHP echo $row['type'];?></td>
<td><?PHP echo $row['camera_resolution'];?></td>
<td><?PHP echo $row['display'];?></td>
<td><?PHP echo $row['warranty'];?></td>
<td><?PHP echo $row['price'];?></td>
<td><?PHP echo $row['video_recording'];?></td>


<?PHP
}
?>
</tr>
</table>
<?Php
$conn->close();
?>
</div>
</body>
</html>