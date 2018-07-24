<?php /* $ () & # ! % @*/

include 'inc/header.php';
include 'lib/config.php';
include 'lib/Database.php';
?>

<?php 
	/**
	*1. We create an object of Database Class to access of it's function.
	*2.Then write a query to read data from our database table and assign it inside '$read_query' variable.
	*3.Then we call our select method which read all data from database and assign it into '$read' variable.
	*/
	$db = new Database();
	$read_query = "SELECT * FROM tbl_user";
	$read = $db->select($read_query);
?>

<?php 
	if (isset($_GET['msg'])) {
		echo "<span style='color:green'>".$_GET['msg']."</span>";
	}
?>

<table class="tblone">
	<tr>
		<th width="35%">Name</th>
		<th width="25%">Email</th>
		<th width="15%">Skill</th>
		<th width="25%">Action</th>
	</tr>

<?php if ($read) { //if start?>
<?php while($row = $read->fetch_assoc()) { //while loop start?>
	<tr>
		<td><?php echo $row['name']; ?></td>
		<td><?php echo $row['email']; ?></td>
		<td><?php echo $row['skill']; ?></td>
		<td><a href="update.php?id=<?php echo urlencode($row['id']);?>">Edit</a></td>
	</tr>

<?php } //while loop end?>
<?php } else{ ?>
<p>Data is not available.</p>
<?php } //if end?>

</table>


<button class="btn"><a href="create.php">Create</a></button>


<?php include 'inc/footer.php';?>