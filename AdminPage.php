<?php
$host = "localhost";
$dbname = "oes_db";
$username = "root";
$password = "";

$conn = mysqli_connect($host, $username, $password, $dbname);
if(mysqli_connect_errno()){
  die("Connection Error: " . mysqli_connect_error());
}

$sql = "SELECT id, Strand, Grade_Level, LRN, Student_Name, Age, Sex, Student_Type, Birthdate, Addr FROM enrollment_list";
$result = $conn->query($sql);

if (! $result){
    die("invalid querie: " . $conn->error);
}
if (isset($_GET['update_id'])){
    $up_id = $_GET['update_id'];

    $sql = "SELECT id, Strand, Grade_Level, LRN, Student_Name FROM enrollment_list";

    $result = $conn->query($sql);

    if (! $result){
        die("invalid querie: " . $conn->error); 
    }
    $row = $result->fetch_assoc();
    $grade = $row["Grade_Level"];
    $strand = $row["Strand"];
    $lrn = $row["LRN"];
    $studentname = $row["Student_Name"];
    $sql = "INSERT INTO enrolled(grade,strand,studentname,lrn )VALUE($grade,'$strand','$studentname','$lrn')";
    $result = $conn->query($sql);
    if (! $result){
        die("invalid querie: " . $conn->error); 
    }else{
        $sql = "DELETE FROM enrollment_list WHERE id='$up_id'";

        $result = $conn->query($sql);
    
        if (! $result){
            die("invalid querie: " . $conn->error); 
        }else{
            header("Location: AdminPage.php?msg=Success");
        }
    } 
}
if (isset($_GET['delete_id'])){
    $del_id = $_GET['delete_id'];

    $sql = "DELETE FROM enrollment_list WHERE id='$del_id'";

    $result = $conn->query($sql);

    if (! $result){
        die("invalid querie: " . $conn->error); 
    }else{
        header("Location: AdminPage.php?msg=Success");
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="veiwport" content="width=device-width, initial-scale=1.0"> 
        <title>Administrator</title> 
        <link rel="stylesheet" href="bootstrap.min.css">
    </head>
    <body>
    <header>
        <ul class="Logo" style="background-color: #bc3329;
                                display: inline-block;
                                list-style: none;
                                width: 100%;">
            <li class="l1" title="Kalibo, Aklan" style="display: inline-block;
                                                        text-align:left;
                                                        vertical-align: middle;">
                <a href="https://nvc.edu.ph" target="_blank">
                <img src="old scripts/new old scripts/final-logo-nvc.png" 
                alt="Northwestern Visayan Colledges" style="height: 75px;">
                </a>
            </li>
            <li><a href="AdminPage2.php">Enrolled</a></li>
        </ul>
    </header>
        <div id="table" style="margin: 50px;">
        <h1>List of Enrolees</h1>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Strand</th>
                    <th>Grade Level</th>
                    <th>LRN</th>
                    <th>Student Name</th>
                    <th>Age</th>
                    <th>Sex</th>  
                    <th>Old/New Student</th>
                    <th>Birthday</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($row = $result->fetch_assoc()){
                    $id = $row['id'];
                    echo "<tr>
                    <td name='id' id=".$row["id"]." >".$row["id"]."</td>
                    <td>".$row["Strand"]."</td>
                    <td>".$row["Grade_Level"]."</td>
                    <td>".$row["LRN"]."</td>
                    <td>".$row["Student_Name"]."</td>
                    <td>".$row["Age"]."</td>
                    <td>".$row["Sex"]."</td>
                    <td>".$row["Student_Type"]."</td>
                    <td>".$row["Birthdate"]."</td>
                    <td>".$row["Addr"]."</td>
                    <td>
                    <a href='AdminPage.php?update_id=$row[id]' class='btn btn-primary btn-sm'>Update</a>
                    <a href='AdminPage.php?delete_id=$row[id]' class='btn btn-danger btn-sm'>Delete</a>
                    </td>
                    </tr>
                    ";
                }
                ?>
            </tbody>
        </table>
        </div>
    </body>
</html>
