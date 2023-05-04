<?php
$strand = $_POST["strand"];
$yl = filter_input(INPUT_POST, "yl", FILTER_VALIDATE_INT);
$sem = filter_input(INPUT_POST, "sem", FILTER_VALIDATE_INT);
$sy = $_POST["sy"];
$stype = $_POST["stype"];
$idno = $_POST["IDno"];
$lrn = filter_input(INPUT_POST, "lrn", FILTER_VALIDATE_INT);
$fbus = $_POST["fbus"];
$student_name = $_POST["name"];
$d = $_POST["day"];
$m = $_POST["month"];
$y = $_POST["year"];
$k = "-";
$birthday = $y.$m.$d;
$student_age = filter_input(INPUT_POST, "age", FILTER_VALIDATE_INT);
$sex = $_POST["sex"];
$cel_num = $_POST["num"];
$address = $_POST["address"];
$zipcode = filter_input(INPUT_POST, "zipcode", FILTER_VALIDATE_INT);
$email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
$fourps = $_POST["4ps"];
$ipmem = $_POST["IPmem"];
$elem = $_POST["elementary"];
$elem_sy = $_POST["sy2"];
$jhs = $_POST["jhs"];
$jhs_sy = $_POST["sy3"];
$shs = $_POST["shs"];
$shs_sy = $_POST["sy4"];

$vac = $_POST["vac"];
$dose1 = filter_input(INPUT_POST, "dose1", FILTER_VALIDATE_BOOL);
$dose2 = filter_input(INPUT_POST, "dose2", FILTER_VALIDATE_BOOL);
$booster = filter_input(INPUT_POST, "booster", FILTER_VALIDATE_BOOL);
$vacname = $_POST["vacname"];

$dad_name = $_POST["dad_name"];
$dad_job = $_POST["dad_job"];
$dad_num = $_POST["dad_num"];
$dad_sal = filter_input(INPUT_POST, "dad_sal", FILTER_VALIDATE_INT);
$mom_name = $_POST["mom_name"];
$mom_job = $_POST["mom_job"];
$mom_num = $_POST["mom_num"];
$mom_sal = filter_input(INPUT_POST, "mom_sal", FILTER_VALIDATE_INT);

$host = "localhost";
$dbname = "oes_db";
$username = "root";
$password = "";

$conn = mysqli_connect($host, $username, $password, $dbname);
if(mysqli_connect_errno()){
  die("Connection Error: " . mysqli_connect_error());
}
$sql ="SELECT LRN FROM enrollment_list";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){
  if ($row == $lrn){
    header("Location: processForm.php?msg=Lrn $lrn is already in the system");
  } 
}

$sql = "INSERT INTO enrollment_list(
Strand, 
Grade_Level, 
Sem, 
SY, 
Student_Type, 
ID_No,
LRN,
FB_Username, 
Student_Name,
Birthdate,
Age, 
Sex, 
Num, 
Addr, 
Zipcode,
Email, 
Four_Ps, 
IP_mem, 
Elementary, 
SY_1, 
JuniorHighSchool, 
SY_2, 
SeniorHighSchool, 
SY_3,
Vaccinated, 
Dose1, 
Dose2, 
Booster, 
Vaccine_Name,
Fathers_Name, 
Fathers_Job,
Fathers_Number, 
Fathers_Salary,
Mothers_Name, 
Mothers_Job, 
Mothers_Number, 
Mothers_Salary) 
VALUE (?,?,?,?,?,
       ?,?,?,?,?,
       ?,?,?,?,?,
       ?,?,?,?,?,
       ?,?,?,?,?,
       ?,?,?,?,?,
       ?,?,?,?,?,
       ?,?)";

$stmt = mysqli_stmt_init($conn);

if( ! mysqli_stmt_prepare($stmt, $sql)){
  die(mysqli_error($conn));
}
mysqli_stmt_bind_param(
  $stmt,
  "siisssississssisssssssssssssssssisssi",
  $strand,
  $yl,
  $sem,
  $sy,
  $stype,
  $idno,
  $lrn,
  $fbus,
  $student_name,
  $birthday,
  $student_age,
  $sex,
  $cel_num,
  $address,
  $zipcode,
  $email,
  $fourps,
  $ipmem,
  $elem,
  $elem_sy,
  $jhs,
  $jhs_sy,
  $shs,
  $shs_sy,
  $vac,
  $dose1,
  $dose2,
  $booster,
  $vacname,
  $dad_name,
  $dad_job,
  $dad_num,
  $dad_sal,
  $mom_name,
  $mom_job,
  $mom_num,
  $mom_sal);
mysqli_stmt_execute($stmt);
header("Location: recordsaved.htm")
?>