<?php
function emptyInputslogin($username, $pwd) {
    $result = false;
    if (empty($username) || empty($pwd)) {
        $result = true;
    }
    return $result;
}

function loginUser($username, $pwd){
    $usernameExists = usernameExists($conn, $username);
    if ($usernameExists === false){
        header("Location:../signup.php?error=wronglogin");
        exit(); 
    }
    
    $pwdHashed =  $usernameExists["pw"];
    $checkpwd = password_verify($pwd, $pwdHashed); // Fix the variable name and use $pwdHashed instead of $username

    if ($checkpwd === false){
        header("Location:../signup.php?error=wronglogin2");
        exit();
    } else {
        session_start();
        $_SESSION["userid"] = $usernameExists["usersId"];
        $_SESSION["useruid"] = $usernameExists["usersVid"]; 
        header("Location:../home.php");
        exit();
    }
}


function emptyInputsSignup($fname, $lname, $username, $pwd, $rpwd) {
    $result = false;
    if (empty($fname) || empty($lname) || empty($username) || empty($pwd) || empty($rpwd)) {
        $result = true;
    }
    return $result;
}

function invalidUid($email) {
    $result = false;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    return $result;
}

function invalidFname($fname) {
    $result = false;
    if (!preg_match("/^[a-zA-Z]+$/", $fname)) {
        $result = true;
    }
    return $result;
}

function invalidLname($lname) {
    $result = false;
    if (!preg_match("/^[a-zA-Z]+$/", $lname)) {
        $result = true;
    }
    return $result;
}

function pwdMatch($pwd, $rpwd) {
    $result = false;
    if ($pwd !== $rpwd) {
        $result = true;
    }
    return $result;
}

function usernameExists($conn, $username) {
    $sql = "SELECT * FROM signed WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../signup.php?error=stmtfailed1");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        mysqli_stmt_close($stmt);
        return $row;
    } else {
        mysqli_stmt_close($stmt);
        return false;
    }
}

function createUser($conn, $username, $fname, $lname, $pwd) {
    $sql = "INSERT INTO signed (email, fname, lname, pw) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../signup.php?error=stmtfailed2");
        exit();
    }
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssss", $username, $fname, $lname, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location:../login.php?error=stmtsuccess");
    exit();
}
