<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exam</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="bg-dark">
<div class="container mt-5">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="card bg-light shadow-lg">
                
                <div class="card-body">
                    <a href="index.php"> <i class="material-icons text-info" data-toggle="tooltip" data-placement="right" title="Go back to student list">arrow_back</i></a>
                    <hr>
                    <form action="#" method="post">
                        <!-- input username -->
                        <div class="form-group">
                            <input type="text" name="student-name" class="form-control" placeholder="Name" required>
                        </div>
                        <!-- input email -->
                        <div class="form-group">
                            <input type="email" name="student-email" class="form-control" placeholder="Email" required>
                        </div>
                        
                        <!-- input gender -->
                        <div class="form-check-inline">
                            <input type="radio" name="student-gender" class="form-check-input" value="Male" checked>Male
                        </div>
                        <div class="form-check-inline">
                            <input type="radio" name="student-gender" class="form-check-input" value="Female">Female
                        </div>
                        <br>
                        <br>
                         <!-- input age  -->
                         <div class="form-group">
                            <input type="number" name="student-age" class="form-control" placeholder="Age" required>
                        </div>
                        <!-- button submit and reset -->
                        <div class="form-group">
                            <button class="btn btn-primary btn-block" type="submit" name="btn-submit">Add New</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-3"></div>
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
<?php
    include_once "dbConnect.php";
    if(isset($_POST['btn-submit'])){
        $username = $_POST['student-name'];
        $email = $_POST['student-email'];
        $gender = $_POST['student-gender'];
        $age = $_POST['student-age'];

        $query="INSERT INTO tbl_student (stu_name, stu_email, stu_gender, stu_age) VALUES ('$username','$email','$gender','$age')";
        $value=mysqli_query($conn, $query);

        if($value){
            header('location: index.php');
        }else{
            echo "cannot insert";
        }

    }
       
?>