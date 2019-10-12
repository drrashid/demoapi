<?php
    header('content-type: application/json');
    $request = $_SERVER['REQUEST_METHOD'];
    switch ($request) {
        case 'GET':
            getMethod();
            break;
        case 'POST':
            $data = json_decode(file_get_contents('php://input'), true);
            postMethod($data);
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
    function postMethod($data){
        include 'db.php';
        $name = $data["name"];
        $email = $data["email"];
        $sql = "INSERT INTO learnhunter(name, email, created_at) VALUES('$name', '$email', now())";
        if(mysqli_query($con, $sql)){
            echo '{"result":"Data successfully inserted!"}';
        }else{
            echo '{"result":"Sorry! Data insertion failed"}';
        }
    }

?>