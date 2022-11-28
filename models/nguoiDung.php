<?php
function nguoiDung_loadAll()
{
    $sql = "select * from taikhoan order by id";
    $listND = pdo_query($sql);
    return $listND;
}

?>