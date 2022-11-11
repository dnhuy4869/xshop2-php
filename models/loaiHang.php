<?php 
    function loaiHang_loadAll() {
        $sql = "select * from loaihang order by id";
        $listLH = pdo_query($sql);
        return $listLH;
    }
?>