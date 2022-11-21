<?php
function loaiHang_loadAll()
{
    $sql = "select * from loaihang order by id";
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
?>