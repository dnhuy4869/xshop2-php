<?php

header("Cache-Control: no-cache, must-revalidate");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

session_start();

if (
    !isset($_SESSION["user"])
    || (int)$_SESSION["user"]["vaiTro"] != 0
) {
    header("location: ../index.php?act=trangChu");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div class="container-scroller">

        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo text-info" href="index.php">ADMIN</a>
                <a class="navbar-brand brand-logo-mini" href="index.php"></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>
                <div class="search-field d-none d-xl-block">
                    <form class="d-flex align-items-center h-100" action="#">
                        <div class="input-group">
                            <div class="input-group-prepend bg-transparent">
                                <i class="input-group-text border-0 mdi mdi-magnify"></i>
                            </div>
                            <input type="text" class="form-control bg-transparent border-0"
                                placeholder="Search products">
                        </div>
                    </form>
                </div>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown"
                            aria-expanded="false">
                            <div class="nav-profile-img">
                                <img src="assets/images/faces/face28.png" alt="image">
                            </div>
                            <div class="nav-profile-text">
                                <p class="mb-1 text-black">Henry Klein</p>
                            </div>
                        </a>
                        <div class="dropdown-menu navbar-dropdown dropdown-menu-right p-0 border-0 font-size-sm"
                            aria-labelledby="profileDropdown" data-x-placement="bottom-end">
                            <div class="p-3 text-center bg-primary">
                                <img class="img-avatar img-avatar48 img-avatar-thumb"
                                    src="assets/images/faces/face28.png" alt="">
                            </div>
                            <div class="p-2">
                                <a class="dropdown-item py-1 d-flex align-items-center justify-content-between"
                                    href="#">
                                    <span>Log Out</span>
                                    <i class="mdi mdi-logout ml-1"></i>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#"
                            data-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-email-outline"></i>
                            <span class="count-symbol bg-success"></span>
                        </a>

                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#"
                            data-toggle="dropdown">
                            <i class="mdi mdi-bell-outline"></i>
                            <span class="count-symbol bg-danger"></span>
                        </a>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <?php
                    $sidebarNav = [
                        (object) [
                            'tab' => 1,
                            'displayName' => 'Loại Hàng',
                            'href' => "index.php?tab=1&act=listLH",
                            "icon" => "mdi mdi-cube menu-icon"
                        ],
                        (object) [
                            'tab' => 2,
                            'displayName' => 'Sản Phẩm',
                            'href' => "index.php?tab=2&act=listSP",
                            "icon" => "mdi mdi-printer-3d menu-icon"
                        ],
                        (object) [
                            'tab' => 3,
                            'displayName' => 'Người Dùng',
                            'href' => "index.php?tab=3&act=listND",
                            "icon" => "mdi mdi-account menu-icon"
                        ],
                    ];

                    $tab = 1;

                    if (isset($_GET['tab'])) {
                        $tab = (int) $_GET['tab'];
                    }

                    foreach ($sidebarNav as $menu) {
                        $className = "nav-item";
                        if ($tab == $menu->tab) {
                            $className .= " active";
                        }

                        echo '<li class="' . $className . '">
                            <a class="nav-link" href="' . $menu->href . '">
                                <span class="icon-bg"><i class="' . $menu->icon . '"></i></span>
                                <span class="menu-title">' . $menu->displayName . '</span>
                            </a>
                            </li>';
                    }
                    ?>
                </ul>
            </nav>
            <!-- partial -->
            <?php
            include "../models/pdo.php";
            include "../models/loaiHang.php";
            include "../models/sanPham.php";
            include "../models/nguoiDung.php";

            $act = "listLH";

            if (isset($_GET['act'])) {
                $act = $_GET['act'];
            }

            switch ($tab) {
                case 1: {
                        switch ($act) {
                            case "listLH": {
                                    include "loaiHang/list.php";
                                    break;
                                }
                            case "editLHForm": {
                                    include "loaiHang/edit.php";
                                    break;
                                }
                            case "editLH": {
                                    if (isset($_POST["editLH"])) {
                                        $id = $_POST["id"];
                                        $name = $_POST["tenLH"];
                                        $hinh = $_FILES["hinh"];

                                        if (isset($hinh)) {
                                            $filename = $_FILES["hinh"]["name"];
                                            $hinh = $filename;
                                            $target_dir = "../images/loaiHang/";
                                            $target_file = $target_dir . $filename;
                                            move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
                                        }

                                        loaiHang_editOne($id, $name, $hinh);
                                    }

                                    echo ("<script>location.href = 'index.php?tab=1&act=listLH';</script>");
                                    break;
                                }
                            case "addLHForm": {
                                    include "loaiHang/add.php";
                                    break;
                                }
                            case "addLH": {
                                    if (isset($_POST["addLH"])) {
                                        $name = $_POST["tenLH"];
                                        $filename = $_FILES["hinh"]["name"];

                                        $target_dir = "../images/loaiHang/";
                                        $target_file = $target_dir . $filename;
                                        move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);

                                        loaiHang_addOne($name, $filename);
                                    }

                                    echo ("<script>location.href = 'index.php?tab=1&act=listLH';</script>");
                                    break;
                                }
                            case "deleteLH": {
                                    if (isset($_GET["id"])) {
                                        $id = $_GET["id"];

                                        loaiHang_deleteOne($id);
                                    }

                                    echo ("<script>location.href = 'index.php?tab=1&act=listLH';</script>");
                                    break;
                                }
                        }

                        break;
                    }
                case 2: {
                        switch ($act) {
                            case "listSP": {
                                    include "sanPham/list.php";
                                    break;
                                }
                            case "addSPForm": {
                                    include "sanPham/add.php";
                                    break;
                                }
                            case "addSP": {
                                    if (isset($_POST["addSP"])) {
                                        $idLoaiHang = $_POST["idLoaiHang"];
                                        $tenSP = $_POST["tenSP"];
                                        $gia = $_POST["gia"];
                                        $mota = $_POST["moTa"];
                                        $filename = $_FILES["hinh"]["name"];

                                        $target_dir = "../images/sanPham/";
                                        $target_file = $target_dir . $filename;
                                        move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);

                                        sanPham_addOne($idLoaiHang, $tenSP, $filename, $gia, $mota);
                                    }

                                    echo ("<script>location.href = 'index.php?tab=2&act=listSP';</script>");
                                    break;
                                }
                            case "deleteSP": {
                                    if (isset($_GET["id"])) {
                                        $id = $_GET["id"];

                                        sanPham_deleteOne($id);
                                    }

                                    echo ("<script>location.href = 'index.php?tab=2&act=listSP';</script>");
                                    break;
                                }
                            case "editSPForm": {
                                    include "sanPham/edit.php";
                                    break;
                                }
                            case "editSP": {
                                    if (isset($_POST["editSP"])) {
                                        $id = $_POST["id"];
                                        $tenSP = $_POST["tenSP"];
                                        $idLoaiHang = $_POST["idLoaiHang"];
                                        $gia = $_POST["gia"];
                                        $moTa = $_POST["moTa"];
                                        $hinh = $_FILES["hinh"];

                                        if (isset($hinh)) {
                                            $filename = $_FILES["hinh"]["name"];
                                            $hinh = $filename;
                                            $target_dir = "../images/sanPham/";
                                            $target_file = $target_dir . $filename;
                                            move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
                                        }

                                        sanPham_editOne($id, $tenSP, $idLoaiHang, $hinh, $gia, $moTa);
                                    }

                                    echo ("<script>location.href = 'index.php?tab=2&act=listSP';</script>");
                                    break;
                                }
                        }

                        break;
                    }
                case 3: {
                        switch ($act) {
                            case "listND": {
                                    include "nguoiDung/list.php";
                                    break;
                                }
                            case "addNDForm": {
                                    include "nguoiDung/add.php";
                                    break;
                                }
                            case "addND": {
                                    if (isset($_POST["addND"])) {
                                        $tenTK = $_POST["tenTK"];
                                        $matKhau = $_POST["matKhau"];
                                        $email = $_POST["email"];
                                        $soDT = $_POST["soDT"];
                                        $vaiTro = $_POST["vaiTro"];
                                        $filename = $_FILES["hinh"]["name"];

                                        $target_dir = "../images/nguoiDung/";
                                        $target_file = $target_dir . $filename;
                                        move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);

                                        nguoiDung_addOne($tenTK, $matKhau, $email, $soDT, $vaiTro, $filename);
                                    }

                                    echo ("<script>location.href = 'index.php?tab=3&act=listND';</script>");
                                    break;
                                }
                            case "editNDForm": {
                                    include "nguoiDung/edit.php";
                                    break;
                                }
                            case "editND": {
                                    if (isset($_POST["editND"])) {
                                        $id = $_POST["id"];
                                        $tenTK = $_POST["tenTK"];
                                        $matKhau = $_POST["matKhau"];
                                        $email = $_POST["email"];
                                        $soDT = $_POST["soDT"];
                                        $hinh = $_FILES["hinh"];
                                        $vaiTro = $_POST["vaiTro"];

                                        if (isset($hinh)) {
                                            $filename = $_FILES["hinh"]["name"];
                                            $hinh = $filename;
                                            $target_dir = "../images/nguoiDung/";
                                            $target_file = $target_dir . $filename;
                                            move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file);
                                        }

                                        nguoiDung_editOne($id, $tenTK, $matKhau, $email, $soDT, $hinh, $vaiTro);
                                    }

                                    echo ("<script>location.href = 'index.php?tab=3&act=listND';</script>");
                                    break;
                                }
                            case "deleteND": {
                                    if (isset($_GET["id"])) {
                                        $id = $_GET["id"];

                                        nguoiDung_deleteOne($id);
                                    }

                                    echo ("<script>location.href = 'index.php?tab=3&act=listND';</script>");
                                    break;
                                }
                        }

                        break;
                    }
            }
            ?>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/vendors/jquery-circle-progress/js/circle-progress.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <!-- <script src="assets/js/misc.js"></script> -->
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/file-upload.js"></script>
    <!-- End custom js for this page -->
</body>

</html>