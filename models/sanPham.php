<?php

function sanPham_loadAll() {
    $sql = "select * from sanpham order by id";
    $listSP = pdo_query($sql);
    return $listSP;
}

function sanPham_addOne($idLoaiHang, $tenSP, $hinh, $gia, $mota)
{
    $sql = "insert into sanpham(idLoaiHang, tenSanPham, hinh, gia, mota) values ('$idLoaiHang', '$tenSP', '$hinh', '$gia', '$mota')";
    pdo_execute($sql);
}

function sanPham_deleteOne($id)
{
    $sql = "delete from sanpham where id=" . $id;
    pdo_execute($sql);
}

function sanPham_loadOne($id)
{
    $sql = "select * from sanpham where id=" . $id;
    $lh = pdo_query_one($sql);
    return $lh;
}

function sanPham_editOne($id, $tenSP, $idLoaiHang, $hinh, $gia, $moTa)
{
    $sql = "update sanpham set tenSanPham='$tenSP', idLoaiHang='$idLoaiHang', hinh='$hinh', gia='$gia', moTa='$moTa' where id=" . $id;
    pdo_execute($sql);
}

?>