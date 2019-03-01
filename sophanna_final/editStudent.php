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
        <?php 
            include_once "dbConnect.php";
            $query=" SELECT * FROM tbl_student WHERE stu_id =".$_GET['id'];
            $value = mysqli_query($conn,$query);
            foreach($value as $data):
           
        ?>
        <div class="col-6">
            <div class="card bg-light shadow-lg">
                
                <div class="card-body">
                    <a href="index.php"> <i class="material-icons text-info" data-toggle="tooltip" data-placement="right" title="Go back to student list">arrow_back</i></a>
                    <hr>
                    <form action="#" method="post">
                        <!-- input username -->
                        <div class="form-group">
                            <input type="hidden" name="student-id" required value="<?php echo $data['stu_id']?>">
                        </div>
                        <!-- input username -->
                        <div class="form-group">
                            <input type="text" name="student-name" class="form-control" placeholder="Name" required value="<?php  echo $data['stu_name'] ?>">
                        </div>
                        <!-- input email -->
                        <div class="form-group">
                            <input type="email" name="student-email" class="form-control" placeholder="Email" required value="<?php echo $data['stu_email']  ?>">
                        </div>
                       
                        <!-- input gender -->
                        <?php 
                            if($data['stu_gender']=='Male'){
                        ?>
                        <div class="form-check-inline">
                            <input type="radio" name="student-gender" class="form-check-input" value="Male" checked>Male 
                        </div>
                        <div class="form-check-inline">
                            <input type="radio" name="student-gender" class="form-check-input" value="Female">Female
                        </div>
                            <?php }else{?>
                            <div class="form-check-inline">
                            <input type="radio" name="student-gender" class="form-check-input" value="Male" >Male 
                        </div>
                        <div class="form-check-inline">
                            <input type="radio" name="student-gender" class="form-check-input" value="Female" checked>Female
                        </div>
                            <?php };?>
                        <br>
                        <br>
                         <!-- input age  -->
                         <div class="form-group">
                            <input type="number" name="student-age" class="form-control" placeholder="Age" required value="<?php echo $data['stu_age'] ?>">
                        </div>
                       
                        <!-- button submit and reset -->
                        <div class="form-group">
                            <button class="btn btn-primary btn-block" type="submit" name="btn-edit">Edit Info</button>
                        </div>
                    </form>
                </div>
            </div>
            <?php endforeach;?>
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
  if(isset($_POST['btn-edit'])){
    $username = $_POST['student-name'];
    $email = $_POST['student-email'];
    $gender = $_POST['student-gender'];
    $age = $_POST['student-age'];

    $query = "UPDATE tbl_student SET stu_name = '$username', stu_email='$email',stu_gender = '$gender',stu_age= '$age'WHERE stu_id=".$_GET['id'];
    $value = mysqli_query($conn,$query);
    if($value){
        header('location: index.php');
    }else{
        echo 'cannot update';
    }
  }
?>