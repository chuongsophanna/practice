<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Final Exam of PHP Basic</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body class="bg-dark">
    <div class="container mt-4">
        <div class="card shadow-lg">
            <div class="card-body">
                <a href="addStudent.php">
                    <i class="material-icons text-info" data-toggle="tooltip" data-placement="left" title="add student info">control_point</i>
                </a>
                <hr>
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Age</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        include_once "dbConnect.php";
                        $query = "SELECT * FROM tbl_student ORDER BY stu_id";
                        $value = mysqli_query($conn, $query);
                        foreach($value as $data):
                    ?>
                        <tr>
                            <td><?php echo $data['stu_id']?></td>
                            <td><?php echo $data['stu_name']?></td>
                            <td><?php echo $data['stu_email']?></td>
                            <td><?php echo $data['stu_gender']?></td>
                            <td><?php echo $data['stu_age']?></td>
                            <td>
                                <a href="editStudent.php?id=<?php echo $data['stu_id']?>">
                                    <i class="material-icons text-info" data-toggle="tooltip" data-placement="left" title="Edit student info">edit</i>
                                </a>
                                <a href="deleteStudent.php?id=<?php echo $data['stu_id']?>">
                                    <i class="material-icons text-danger" data-toggle="tooltip" data-placement="right" title="Delete student info">delete</i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip(); 
        });
    </script>
</body>
</html>
