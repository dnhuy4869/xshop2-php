<?php
function loaiHang_loadAll()
{
    $sql = "select * from loaihang order by id";
    $listLH = pdo_query($sql);
    return $listLH;
}

function loaiHang_loadLimit($limit)
{
    $sql = "select * from loaihang order by id limit ".(string)$limit;
    $listLH = pdo_query($sql);
    return $listLH;
}

function loaiHang_loadRandom($limit)
{
    $sql = "select * from loaihang order by rand() limit ".(string)$limit;
    $listLH = pdo_query($sql);
    return $listLH;
}

function loaiHang_loadOne($id)
{
    $sql = "select * from loaihang where id=" . $id;
    $lh = pdo_query_one($sql);
    return $lh;
}

function loaiHang_editOne($id, $name, $hinh)
{
    $sql = "update loaihang set tenLoaiHang='$name', hinh='$hinh' where id=" . $id;
    pdo_execute($sql);
}

function loaiHang_addOne($name, $hinh)
{
    $sql = "insert into loaihang(tenLoaiHang, hinh) values ('$name', '$hinh')";
    pdo_execute($sql);
}

function loaiHang_deleteOne($id)
{
    $sql = "delete from loaihang where id=" . $id;
    pdo_execute($sql);
}

function loaiHang_count($id) {
    $sql = "select count(*) as soLuong from sanpham where idLoaiHang='$id'";
    $listLH = pdo_query_one($sql);
    return $listLH["soLuong"];
}

?>