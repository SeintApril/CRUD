<?php
    require_once ('db.php');
    $db = new DB();

    $students =  $db->index();
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
        <div class="row">
            <div class="col-10">
                <a href="create.php" class="btn btn-primary">Create New Student</a>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-10">
                <?php if ($students): ?>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Actions</th>
                            </tr>
                            <?php foreach ($students as $student): ?>
                                <tr>
                                    <td><?php echo $student->name ?></td>
                                    <td><?php echo $student->email ?></td>
                                    <td><?php echo ucfirst($student->gender) ?></td>
                                    <td>
                                        <a href="show.php?id=<?php echo $student->id; ?>" class="btn btn-info btn-sm">Details</a>
                                        <a href="destroy.php?id=<?php echo $student->id; ?>" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                <?php else: ?>
                    <p>No Student found in database.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>