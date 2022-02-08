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
    <title>Edit Student</title>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <?php if ($student): ?>
            <h3>Edit Student</h3>
            <form action="update.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $student->id; ?>">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" placeholder="Name" id="name" name="name" value="<?php echo $student->name; ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" class="form-control" placeholder="Email Address" id="email" name="email" value="<?php echo $student->email; ?>">
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender" class="form-control">
                        <option value="" disabled>Select Gender</option>
                        <option value="male" <?php if ($student->gender == 'male') { echo "selected"; }?>>Male</option>
                        <option value="female" <?php if ($student->gender == 'female') { echo "selected"; }?>>Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="dob">Date of Birth</label>
                    <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $student->dob; ?>">
                </div>
                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="number" class="form-control" placeholder="Age" id="age" name="age" value="<?php echo $student->age; ?>">
                </div>
                <button class="btn btn-primary">Update Student</button>
                <a href="index.php" class="btn btn-danger">Cancel</a>
            </form>
            <?php else: ?>
                <p>Student not found!</p>
            <?php endif; ?>
        </div>
    </div>
</div>
</body>
</html>