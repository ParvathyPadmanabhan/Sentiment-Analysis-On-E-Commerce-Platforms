<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laptop</title>
<link rel="stylesheet" href="bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>
</head>

<body>
<?php
include("db_connect.php");
$sql="SELECT * from laptop group by model_name";
$result=$conn->query($sql)or die(mysql_error()); 
?>

<br />
<div class="container">

  <a href="camera.php" class="btn btn-primary" role="button">Camera</a>
  <a href="laptop.php" class="btn btn-success" role="button">Laptop</a>
  <a href="phone.php" class="btn btn-warning" role="button">Phone</a>
 

<h4>Laptop</h4>







<br /><br /><br />
<?php
if(isset($_POST['submit']))
{
$sql="SELECT * from laptop where $_POST[field]='$_POST[value]' group by model_name";
$result=$conn->query($sql)or die(mysql_error()); 
}
?>









 <script src="jquery-1.12.4.js"></script>
  <script src="jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="jquery.dataTables.min.css">

<script>

$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
} );
</script>

<style>
tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }
</style>
<table id="example" class="display" cellspacing="0" width="100%">
<thead>
<tr>
    <th>Id</th> 
    <th>Brand</th> 	
    <th>Model Name</th>
    <th>Price</th>
    <th>Screen Size</th>
    <th>Screen Resolution</th>
    <th>RAM</th>
    <th>Hard Disk Capacity</th>
    <th>Processor</th>
    <th>Graphics</th>
    <th>Battery</th>
    <th>Color</th>
    <th>Weight</th>
    <th>Warrenty</th>
  
</tr>
</thead>

<tfoot>
<tr>
    <th>Id</th> 
    <th>Brand</th> 	
    <th>Model Name</th>
    <th>Price</th>
    <th>Screen Size</th>
    <th>Screen Resolution</th>
    <th>RAM</th>
    <th>Hard Disk Capacity</th>
    <th>Processor</th>
    <th>Graphics</th>
    <th>Battery</th>
    <th>Color</th>
    <th>Weight</th>
    <th>Warrenty</th>
  
</tr>
</tfoot>

<?PHP
while($row = mysqli_fetch_assoc($result)) 
{ 
?>
<tr>
<td><?PHP echo $row['id'];?></td>
<td><?PHP echo $row['brand'];?></td>
<td><?PHP echo "<a href='laptop2.php?model=$row[model_name]'>".$row['model_name'];?></a></td>
<td><?PHP echo $row['price'];?></td>
<td><?PHP echo $row['screen_size'];?></td>
<td><?PHP echo $row['screen_resolution'];?></td>
<td><?PHP echo $row['RAM'];?></td>
<td><?PHP echo $row['harddisk_capacity'];?></td>
<td><?PHP echo $row['processor'];?></td>
<td><?PHP echo $row['graphics'];?></td>
<td><?PHP echo $row['battery'];?></td>
<td><?PHP echo $row['color'];?></td>
<td><?PHP echo $row['weight'];?></td>
<td><?PHP echo $row['warranty'];?></td>


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