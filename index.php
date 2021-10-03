<!DOCTYPE html>
<html>
<head>
	<title>ToDo List Application PHP and MySQL</title>

    <link rel="stylesheet" href="css/sb-admin-2.min.css">
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-center align-items-center vh-100 flex flex-column">
           <div class="content-wrapper">        
                <div class="heading">
                    <h2 style="font-style: 'Hervetica';">ToDo List Application PHP and MySQL database</h2>
                </div>
                <form action="login.php" method="POST" class="user py-5">
                    <div class="form-group">
                        <input name="task" type="text" class="form-control form-control-user"
                            id="exampleInputText"
                            placeholder="Enter a Task!...">
                    </div>               
                    <a href="index.php" name="submit" class="btn btn-primary btn-user btn-block">
                        Submit
                    </a>                
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
            </div>    
        </div>    	
    </div>
</body>

