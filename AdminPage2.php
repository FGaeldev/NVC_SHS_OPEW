<?php
$host = "localhost";
$dbname = "oes_db";
$username = "root";
$password = "";

$conn = mysqli_connect($host, $username, $password, $dbname);
if(mysqli_connect_errno()){
  die("Connection Error: " . mysqli_connect_error());
}

$sql = "SELECT id, grade, strand, studentname, lrn FROM enrolled";
$result = $conn->query($sql);

if (! $result){
    die("invalid querie: " . $conn->error);
}
if (isset($_GET['delete_id'])){
    $del_id = $_GET['delete_id'];

    $sql = "DELETE FROM enrolled WHERE id='$del_id'";

    $result = $conn->query($sql);

    if (! $result){
        die("invalid querie: " . $conn->error); 
    }else{
        header("Location: AdminPage2.php?msg=Success");
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
        </ul>
    </header>
        <div id="table" style="margin: 50px;">
        <h1>Enrolled</h1>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Grade Level</th>
                    <th>Strand</th>
                    <th>Name</th>
                    <th>LRN</th>
            </thead>
            <tbody>
                <?php
                while($row = $result->fetch_assoc()){
                        echo "<tr>
                        <td name='id' id=".$row["id"]." >".$row["id"]."</td>
                        <td>".$row["grade"]."</td>
                        <td>".$row["strand"]."</td>
                        <td>".$row["studentname"]."</td>
                        <td>".$row["lrn"]."</td>
                        <td><a href='AdminPage2.php?delete_id=$row[id]' class='btn btn-danger btn-sm'>Delete</a></td>
                        </tr>
                        ";
                }
                ?>
            </tbody>
        </table>
        </div>
    </body>
</html>
