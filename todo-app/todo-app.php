<?php
// Initialize errors 
$errors = "";

// Connect to DB
$db = mysqli_connect("localhost", "root", "", "test");

// Insert a quote if submit is clicked
if (isset($_POST['submit'])) {
	if (empty($_POST['task'])) {
			$errors = "You must fill in the input field";
	}else {
		$task = $_POST['task'];
		$sql = "INSERT INTO tasks (task) VALUES ('$task')";
		mysqli_query($db, $sql);
		header('location: index.php');
	}
}

// delete task
if (isset($_GET['del_task'])) {
	$id = $_GET['del_task'];

	mysqli_query($db, "DELETE FROM tasks WHERE id=".$id);
	header('location: index.php');
}