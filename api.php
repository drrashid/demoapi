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
            $data = json_decode(file_get_contents('php://input'), true);
            putMethod($data);
            break;
        case 'DELETE':
            echo '{"name": "DELETE....Dr. Rashid"}';
            break;
        default:
            echo '{"name": "Default"}';
            break;
    }
    //Data read method
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
    //Data insert method
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
    //Data edit method
    function putMethod($data){
        include 'db.php';
        $id = $data["id"];
        $name = $data["name"];
        $email = $data["email"];
        $sql = "UPDATE learnhunter SET name='$name', email='$email', created_at=now() WHERE id='$id'";
        if(mysqli_query($con, $sql)){
            echo '{"result":"Data update successfully!"}';
        }else{
            echo '{"result":"Sorry! Data update failed"}';
        }
    }

?>