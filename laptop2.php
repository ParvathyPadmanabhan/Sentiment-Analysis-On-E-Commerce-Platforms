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
error_reporting(0);
include("db_connect.php");
$sql="SELECT * from laptop where model_name='$_REQUEST[model]' limit 0,1";
$result=$conn->query($sql)or die(mysql_error()); 
?>

<br />
<div class="container">

  <a href="camera.php" class="btn btn-primary" role="button">Camera</a>
  <a href="laptop.php" class="btn btn-success" role="button">Laptop</a>
  <a href="phone.php" class="btn btn-warning" role="button">Phone</a>
 



<h4>Laptop</h4>

<table class="table table-bordered">
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


<?PHP
while($row = mysqli_fetch_assoc($result)) 
{ 
?>
<tr>
<td><?PHP echo $row['id'];?></td>
<td><?PHP echo $row['brand'];?></td>
<td><?PHP echo "<a href='camera2.php?model=$row[model_name]'>".$row['model_name'];?></a></td>
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



<center><h2><u>Overall Result</u></h2></center>
<?php
$sql1="SELECT AVG(score) as average_score
      FROM laptop where model_name='$_REQUEST[model]'";
$result1=$conn->query($sql1)or die(mysql_error()); 
$row1 = mysqli_fetch_assoc($result1);
?>
        <h3 align="center" style="color:red;">Sentiment Value :<?php $average_score=$row1['average_score']; echo $average_score; ?></h3>
        <?php 
		if($average_score>.5)
		{
			echo "<h3 align='center' style='color:red;'>Positive</h3>";
		}
		if($average_score<.5)
		{
			echo "<h3 align='center' style='color:red;'>Negative</h3>";
		}
		if($average_score==.5)
		{
			echo "<h3 align='center' style='color:red;'>Neautral</h3>";
		}
		?>











<?PHP


require_once('test/style.php');
	require_once('SentimentAnalyzer.php');
	/*	
		We instantiate the SentimentAnalyzerTest class below by passing in the SentimentAnalyzer object (class)
		found in the file: 'SentimentAnalyzer.class.php'.

		This class must be injected as a dependency into the constructor as shown below
		
	*/

	$sat = new SentimentAnalyzerTest(new SentimentAnalyzer());

	/*
		Training The Sentiment Analysis Algorithm with words found in the trainingSet directory

		The File 'data.neg' contains a list of sentences that's been marked 'Negative'.
		We use the words in this file to train the algorithm on how a negative sentence/sentiment might
		be structured.

		Likewise, the file 'data.pos' contains a list of 'Positive' sentences and the words are also
		used to train the algorithm on how to score a sentence or document as 'Positive'.

		The trainAnalyzer method below accepts three parameters:
			* param 1: The Location of the file where the training data are located
			* param 2: Used to describe the 'type' of file [param 1] is; used to indicate
					   whether the supplied file contians positive words or not
			* param 3: Enter a less than or equal to 0 here if you want all lines in the
					   file to be used as a training set. Enter any other number if you want to
					   use exactly those number of lines to train the algorithm

	*/

	$sat->trainAnalyzer('trainingSet/data.neg', 'negative', 5000); //training with negative data
	$sat->trainAnalyzer('trainingSet/data.pos', 'positive', 5000); //trainign with positive data


	/*
		The analyzeSentence method accepts as a sentence as parameter and score it as a positive, 
		negative or neutral sentiment. it returns an array that looks like this:

		array
		(
			'sentiment' => '[the sentiment value returned]',
			'accuracy' => array
							(
								'positivity'=> 'A floating point number showing us the probability of the sentence being positive',
								'negativity' => 'A floating point number showing us the probability of the sentence being negative',
							),
		)

		An example is shown below:
	*/



		require_once('test/presentation.php');




?>




<table class="table table-bordered" >

<tr>
 
    <th>Review</th>
    <!-- <th>Status</th>  -->
    <th>Score</th>
    </tr>


<?PHP


$sql="SELECT * from laptop where model_name='$_REQUEST[model]' ";
$result=$conn->query($sql)or die(mysql_error()); 
while($row = mysqli_fetch_assoc($result)) 
{ 
?>
<tr>

<td><?PHP echo $row['review'];?></td>
<!-- <td><?PHP // echo $row['status'];?></td> -->
<td><?PHP echo $row['score'];?>


<form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method='post'>
    <input type = 'hidden' id = 'sentence' value='<?php echo $row['id']; ?>' name='id' />
    <input type = 'hidden' id = 'sentence' value='<?php echo $_REQUEST['model']; ?>' name='model' />
    <input type = 'hidden' id = 'sentence' value='laptop' name='field' />
    
		<input type = 'hidden' id = 'sentence' value='<?php echo $row['review']; ?>' name='sentence' placeholder='Enter Text'/>
		<input type = 'submit' id='goSentence' value="Evaluate" name="evaluate"/>
	</form>

</td>   

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