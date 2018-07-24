<?php /* $ () & # ! % @*/

include 'inc/header.php';
include 'lib/config.php';
include 'lib/Database.php';
?>

<?php 
	/**
	* Write Working process here.
	*/
	$id = $_GET['id'];
	$db = new Database();
	$read_query = "SELECT * FROM tbl_user WHERE id=$id";
	$get_data = $db->select($read_query)->fetch_assoc();

	if (isset($_POST['submit'])) {
		$name  = mysqli_escape_string($db->link, $_POST['name']);
		$email = mysqli_escape_string($db->link, $_POST['email']);
		$skill = mysqli_escape_string($db->link, $_POST['skill']);

		if ($name == '' || $email == '' || $skill == "" ) {
			$error = "Field must not be empty";
		} else {
			$update_query = " UPDATE tbl_user SET name = '$name', email = '$email' , skill = '$skill' WHERE id=$id";
			$update_var = $db->update($update_query);
		}
		
	}
?>

<?php 
/*This code will delete data from our database.*/
	if (isset($_POST['delete'])) {
		$delete_query = "DELETE FROM tbl_user WHERE id=$id";
		$delete_data = $db->delete($delete_query);
	}


?>

<?php 
	if (isset($error)) {
		echo "<span style='color:red'>".$error."</span>";
	}
?>

<form action="update.php?id= <?php echo $id ; ?>" method="post">
	<table>
		<tr>
			<td>Name:</td>
			<td><input type="text" name="name" value="<?php echo $get_data['name'];?>"></input></td>
		</tr>
		<tr>
			<td>Email:</td>
			<td><input type="text" name="email" value="<?php echo $get_data['email'];?>"></input></td>
		</tr>
		<tr>
			<td>Skill:</td>
			<td><input type="text" name="skill" value="<?php echo $get_data['skill'];?>"></input></td>
		</tr>

		<tr>
			<td></td>
			<td>
				<input type="submit" name="submit" value="Update"></input>
				<input type="reset" value="Cancel"></input>
				<input type="submit" name="delete" value="Delete"></input>
			</td>

		</tr>
	</table>
</form>

<button class="btn"><a href="index.php">Go Home</a></button>




<?php include 'inc/footer.php';?>