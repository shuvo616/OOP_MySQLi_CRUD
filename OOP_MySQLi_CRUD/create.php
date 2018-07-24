<?php /* $ () & # ! % @*/

include 'inc/header.php';
include 'lib/config.php';
include 'lib/Database.php';
?>

<?php 
	/**
	* Write Working process here.
	*/
	$db = new Database();

	if (isset($_POST['submit'])) {
		$name  = mysqli_escape_string($db->link, $_POST['name']);
		$email = mysqli_escape_string($db->link, $_POST['email']);
		$skill = mysqli_escape_string($db->link, $_POST['skill']);

		if ($name == '' || $email == '' || $skill == "" ) {
			$error = "Field must not be empty";
		} else {
			$insert_query = "INSERT INTO tbl_user(name,email,skill) VALUES('$name','$email','$skill')";
			$create = $db->insert($insert_query);
		}
		
	}
?>

<?php 
	if (isset($error)) {
		echo "<span style='color:red'>".$error."</span>";
	}
?>

<form action="" method="post">
	<table>
		<tr>
			<td>Name:</td>
			<td><input type="text" name="name" placeholder="Enter your name"></input></td>
		</tr>
		<tr>
			<td>Email:</td>
			<td><input type="text" name="email" placeholder="Enter your email"></input></td>
		</tr>
		<tr>
			<td>Skill:</td>
			<td><input type="text" name="skill" placeholder="Enter your skill"></input></td>
		</tr>

		<tr>
			<td></td>
			<td>
				<input type="submit" name="submit" value="Submit"></input>
				<input type="reset" value="Cancel"></input>
			</td>

		</tr>
	</table>
</form>

<button class="btn"><a href="index.php">Go Home</a></button>




<?php include 'inc/footer.php';?>