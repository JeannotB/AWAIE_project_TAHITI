<?php

    session_start();
    
    function createSession($token, $isAdmin, $company_id)
    {
        $_SESSION['token'] = $token;
        $_SESSION['admin'] = $isAdmin;
        $_SESSION['LAST_ACTIVITY'] = $_SERVER['REQUEST_TIME'];
        $_SESSION['id_company'] = $company_id;

    }

    function checkTimeoutSession($time)
    {
        //for 30 minutes timeout, specified in seconds
        $timeout_duration = 1800;
        return (($time - $_SESSION['LAST_ACTIVITY']) > $timeout_duration);
    }


    //Test if a session exist
    if(isset($_SESSION['token']) && isset($_SESSION['LAST_ACTIVITY']))
    {
        $time = $_SERVER['REQUEST_TIME'];
        if(checkTimeoutSession($time))
        {
            session_unset();
            session_destroy();
            header('Location: ../login');
        }
        else
        {
            $_SESSION['LAST_ACTIVITY'] = $time;
        }

    }

