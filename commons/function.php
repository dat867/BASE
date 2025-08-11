<?php
// Kết nối CSDL qua PDO
function connectDB() {
    $host = DB_HOST;
    $port = DB_PORT;
    $dbname = DB_NAME;

    try {
        $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", DB_USERNAME, DB_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $conn;
    } catch (PDOException $e) {
        echo ("Connection failed: " . $e->getMessage());
        die;
    }
}

function uploadFile($file, $folderSave){
    $file_upload = $file;
    $filename = rand(10000, 99999) . $file_upload['name'];
    $pathStorage = $folderSave . $filename;
    $tmp_file = $file_upload['tmp_name'];
    $pathSave = PATH_ROOT . $pathStorage;
    if (move_uploaded_file($tmp_file, $pathSave)) {
        return $filename;  
    }
    return null;
}


function deleteFile($file){
    $pathDelete = PATH_ROOT . $file;
    if (file_exists($pathDelete)) {
        unlink($pathDelete);
    }
}
function route($page)
{
    header("Location: index.php?page=$page");
    exit;
}

function authCheck()
{
    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 1) {
        header("Location: index.php?action=login");
        exit;
    }
}

