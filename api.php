<?php
    header('content-type: application/json');
    $request = $_SERVER['REQUEST_METHOD'];
    switch ($request) {
        case 'GET':
            echo '{"name": "GET....Dr. Rashid"}';
            break;
        case 'POST':
            echo '{"name": "POST....Dr. Rashid"}';
            break;
        case 'PUT':
            echo '{"name": "PUT....Dr. Rashid"}';
            break;
        case 'DELETE':
            echo '{"name": "DELETE....Dr. Rashid"}';
            break;
        default:
            echo '{"name": "Default"}';
            break;
    }
?>