<?php
        session_start();
        if(isset($_SESSION['admin']) || isset($_SESSION['alumno'])  || isset($_SESSION['tutor']) || isset($_SESSION['coordinador'])){
            session_unset(); 
            session_destroy();
            header("Location: ../../");
            exit;
        }
        header("Location: ../../");
        exit;
?>