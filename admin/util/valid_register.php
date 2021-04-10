<?php 
    function valid_username($username) {
        return (!$username || strlen($username) < 6) ? false : true;
    }

    function valid_password($password) {
        $pattern = '/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/';
        return preg_match($pattern, $password);
    }

    function passwords_match($password, $confirm_password) {
        return $password === $confirm_password;
    }

    function valid_registration($username, $password, $confirm_password) {
        
        $errors = array();

   
        if (!valid_username($username)) {
            array_push($errors, "Username must be six characters or longer.");
        }
        if (username_exists($username)) {
            array_push($errors, "The username you entered is already taken.");
        }

        if (!valid_password($password)) {
            array_push($errors, "Your password must contain at least one number, one uppercase letter, one lowercase letter, and total 8 or more characters");
        }
            if (!passwords_match($password, $confirm_password)) {
            array_push($errors, "The passwords you entered did not match.");
        }

        return $errors;
    }