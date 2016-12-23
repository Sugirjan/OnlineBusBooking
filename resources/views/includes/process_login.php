<?php


include_once 'db_connect.php';
include_once 'functions.php';

sec_session_start();

if (isset($_POST['email'], $_POST['p'])) {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['p'];

    if (login($email, $password, $mysqli) == true) {

        $c_id= $_SESSION['user_id'];
        $a= ((int)$c_id);
        $result=DB::select("select username,role from members where members.id='$a'");
        $re=$result[0]->role;
        $na=$result[0]->username;
        echo $na;

        if($re=='1'){
//           var_dump($na);
//            $sql14 = 'GRANT ALL ON MEMBERS TO $na @"localhost"';
//            DB::connection()->getPdo()->exec($sql14);
            header("Location: ../admin");


        }
        else if($re=='0'){
            header("Location: ../operator");
        }

     exit();
    }
    else {

        header('Location: ../index?error=1');
        exit();
    }
} else {
    header('Location: ../error.php?err=Could not process login');
    exit();
}