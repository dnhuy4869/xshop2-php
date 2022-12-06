<?php 
function hoaDon_addOne($hoTen, $email, $soDT, $diaChi, $idNguoiDung, $pttt) {
    $sql = "insert into hoaDon(hoTen, email, soDT, diaChi, idNguoiDung, pttt) values ('$hoTen', '$email', '$soDT', '$diaChi', '$idNguoiDung', '$pttt')";
    return pdo_execute_lastinsertid($sql);
}

function hoaDon_loadOne($id)
{
    $sql = "select * from hoaDon where id=" . $id;
    $lh = pdo_query_one($sql);
    return $lh;
}

function hoaDonCT_addOne($idSanPham, $idHoaDon, $soLuong, $tenSanPham, $hinh, $gia) {
    $sql = "insert into chitiethoadon(idSanPham, idHoaDon, soLuong, tenSanPham, hinh, gia) values ('$idSanPham', '$idHoaDon', '$soLuong', '$tenSanPham', '$hinh', '$gia')";
    pdo_execute($sql);
}

function hoadDonCT_loadById($id)
{
    $sql = "select * from chitiethoadon where idHoaDon='$id'";
    $listLH = pdo_query($sql);
    return $listLH;
}

?>