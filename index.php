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

?>
<!DOCTYPE html>
<html>
<head>
	<title>ToDo List Application PHP and MySQL</title>

    <link rel="stylesheet" href="css/custom.css">
</head>
<body>
	<div class="heading">
		<h2 style="font-style: 'Hervetica';">ToDo List Application PHP and MySQL database</h2>
	</div>
	<form method="post" action="index.php" class="input_form">
		<input type="text" name="task" class="task_input">
		<button type="submit" name="submit" id="add_btn" class="add_btn">Add Task</button>
	</form>
	<?php if (isset($errors)) { ?>
	
	<p><?php echo $errors;  ?></p>
	
	<?php } ?>

	<table>
		<thead>
			<tr>
				<th>N</th>
				<th>Tasks</th>
				<th style="width: 60px;">Action</th>
			</tr>	
		</thead>	

		<tbody>
			<?php 
			// select all tasks if page is visited or refreshed
			$tasks = mysqli_query($db, "SELECT * FROM tasks");

			$i = 1; while ($row = mysqli_fetch_array($tasks)) { ?>
				<tr>
					<td> <?php echo $i; ?> </td>
					<td class="task"> <?php echo $row['task']; ?> </td>
					<td class="delete"> 
						<a href="index.php?del_task=<?php echo $row['id'] ?>">x</a> 
					</td>
				</tr>
			<?php $i++; } ?>	
		</tbody>
	</table>	
</body>