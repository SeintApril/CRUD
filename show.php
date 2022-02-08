<?php
    require_once ('db.php');
    $db = new DB();
    $student =  $db->show($_GET['id']);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Students</title>
</head>
<body>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <?php if ($student): ?>

                <p> ID: <?php echo $student->id ?> </p>
                <p> Name: <?php echo $student->name ?> </p>
                <p> Email: <?php echo $student->email ?> </p>
                <p> dob: <?php echo $student->dob ?> </p>
                <p> Age: <?php echo $student->age ?> </p>
                <a href="index.php" class="btn btn-primary">Back to Home</a>
                <a href="edit.php?id=<?php echo $student->id?>" class="btn btn-info">Edit</a>
                <a href="destroy.php?id=<?php echo $student->id?>" class="btn btn-danger">Delete</a>
            <?php else: ?>
            <p>Student not found</p>

            <?php endif; ?>
        </div>
    </div>
</div>
</body>
</html>