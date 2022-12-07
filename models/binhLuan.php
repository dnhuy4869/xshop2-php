<?php 

function binhLuan_addOne($idNguoiDung, $idSanPham, $ngayBinhLuan, $noiDung)
{
    $sql = "insert into binhluan(idNguoiDung, idSanPham, ngayBinhLuan, noiDung) values ('$idNguoiDung', '$idSanPham', '$ngayBinhLuan', '$noiDung')";
    pdo_execute($sql);
}

function binhLuan_tongSoBL($idSanPham) {
    $sql = "select count(*) as soLuong from binhluan where idSanPham='$idSanPham'";
    $listLH = pdo_query_one($sql);
    return $listLH["soLuong"];
}

function binhLuan_loadLimit($limit = 5)
{
    $sql = "select * from binhluan order by id desc limit ".(string)$limit;
    $listLH = pdo_query($sql);
    return $listLH;
}

?>