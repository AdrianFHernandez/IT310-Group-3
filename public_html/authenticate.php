<?php
    require_once('admin_db.php');
    session_start();

    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    
    if (is_valid_admin_login($email, $password)) {
        // create an entry in the $_session super global arry
        $_SESSION['is_valid_admin'] = true;
        // redirect logged in user to default page
        include('welcomeLogin.php');
    } else {
    if ($email == NULL && $password == NULL) {
        $login_message ='You must login to view this page.';
    } else {
        $login_message = 'Invalid credentials.';
    }
    include('login.php');
    }
?>