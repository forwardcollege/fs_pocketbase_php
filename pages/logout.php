<?php
    
    // init logout function if logged in
    if ( isset( $_SESSION["user"] ) ) {
        unset( $_SESSION["user"] );
        // redirect user to index.php
        header('Location: /');
        exit;
    } else {
        // if user is not authenticated, redirect them to login.php
        header('Location: /login');
        exit;
    }