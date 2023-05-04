<?php
$is_invalid = false;
if($_SERVER["REQUEST_METHOD"]==="POST"){
    $mysqli = require __DIR__ . "/database.php";
    $sql = sprintf("SELECT * FROM addmin WHERE Username = '%s'", $mysqli->real_escape_string($_POST["username"]));
    $result=$mysqli->query($sql);
    $user = $result->fetch_assoc();
    if($user){
        if(password_verify($_POST["pass"], $user["Password_Hash"])){
            header("Location: AdminPage.php");}
    }
    $is_invalid = true;

}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>Admin Log-In</title>
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
    <div style=" vertical-align: middle;
                                position: relative;
                                left: auto;
                                right: auto;
                                margin: 2em auto;
                                padding: 1em 2em;
                                border: solid 1px #800000; 
                                border-radius: 6px;
                                width: min-content;">
        <form method="post">
        <h1>Log-In</h1>
        <label for="username">Username</label><br>
        <input type="text" id="username" name="username" value="<?= htmlspecialchars($_POST["username"] ?? "") ?>"
        style="margin-bottom: 10px;"><br>
        <label for="pass">Password</label><br>
        <input type="password" name="pass" id="pass" value="" style="margin-bottom: 10px;"><br>
        <?php if ($is_invalid): ?>
        <em>Invalid Login</em><br>
        <?php endif; ?>
        <input type="submit" value="Log-In" class="btn btn-primary">
        </form>
    </div>
</body>
</html>