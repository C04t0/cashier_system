<?php
    session_start();

    if (isset($_POST['user_id'])) {
        $_SESSION['user_id'] = $_POST['user_id'];
        echo json_encode(['status'=>'success', 'user_id'=>$_SESSION['user_id']]);
    } else {
        echo json_encode(['status'=>'error', 'message'=>'No user ID provided']);
    }
