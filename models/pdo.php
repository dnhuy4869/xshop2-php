<?php
    function pdo_get_connection(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        
        try {
        $conn = new PDO("mysql:host=$servername;dbname=duan1", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Kết nối thành công!";
        return $conn;
        } catch(PDOException $e) {
        echo "Lỗi kết nối: " . $e->getMessage();
        }
    }

    //sql
    //sql,...,id
    //"insert into loai(ten_loai) values(?)","Laptop"
    //"update loai set ten_loai=? where ma_loai=?", "Laptop", "1"
    //"delete from loai where ma_loai=?", "1"

    function pdo_execute($sql){
        $sql_args = array_slice(func_get_args(), 1);
        try{
            $conn = pdo_get_connection();
            $stmt = $conn->prepare($sql);
            $stmt->execute($sql_args);
        }
        catch(PDOException $e){
            throw $e;
        }
        finally{
            unset($conn);
        }

    }

    function pdo_execute_lastinsertid($sql){
        $sql_args = array_slice(func_get_args(), 1);
        try{
            $conn = pdo_get_connection();
            $stmt = $conn->prepare($sql);
            $stmt->execute($sql_args);
            return $conn->lastInsertId();
        }
        catch(PDOException $e){
            throw $e;
        }
        finally{
            unset($conn);
        }

    }

    //truy vấn nhiều dữ liệu
    function pdo_query($sql){
        $sql_args = array_slice(func_get_args(), 1);
        try{
            $conn = pdo_get_connection();
            $stmt = $conn->prepare($sql);
            $stmt->execute($sql_args);
            $rows = $stmt->fetchAll();
            return $rows;
        }
        catch(PDOException $e){
            throw $e;
        }
        finally{
            unset($conn);
        }
    }
    //truy vấn 1 dữ liệu
    function pdo_query_one($sql){
        $sql_args = array_slice(func_get_args(), 1);
        try{
            $conn = pdo_get_connection();
            $stmt = $conn->prepare($sql);
            $stmt->execute($sql_args);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row;
        }
        catch(PDOException $e){
            throw $e;
        }
        finally{
            unset($conn);
        }
    }
    
    


?>