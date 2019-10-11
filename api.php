<?php
    header('content-type: application/json');
    $request = $_SERVER['REQUEST_METHOD'];
    switch ($request) {
        case 'GET':
            getMethod();
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
    function getMethod(){
        include 'db.php';
        $sql = "SELECT * FROM  	learnhunter";
        $result = mysqli_query($con, $sql);
        if(mysqli_num_rows($result)>0){
            $rows = array();
            while($r=mysqli_fetch_assoc($result)){
                $rows['result'][]=$r;
            }
            echo json_encode($rows);
        }else{
            echo '{"Result": "No data found"}';
        }
        
    }
?>