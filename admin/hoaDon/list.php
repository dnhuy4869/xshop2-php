<?php
    if(isset($_POST['records-limit'])){
        $_SESSION['records-limit'] = $_POST['records-limit'];
    }

    $limit = isset($_SESSION['records-limit']) ? $_SESSION['records-limit'] : 5;
    $page = (isset($_GET['page']) && is_numeric($_GET['page']) ) ? $_GET['page'] : 1;
    $paginationStart = ($page - 1) * $limit;
    $listND = pdo_query("SELECT * FROM hoadon LIMIT $paginationStart, $limit");

    // Get total records
    $sql = pdo_query("SELECT count(id) AS id FROM hoadon");
    $allRecrods = $sql[0]['id'];
  
    // Calculate total pages
    $totoalPages = ceil($allRecrods / $limit);

    // Prev + Next
    $prev = $page - 1;
    $next = $page + 1;
?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body"> 
                        <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="card-title">Danh sách hóa đơn</h4>

                            <!-- Select dropdown -->
                            <div class="d-flex flex-row-reverse bd-highlight ">
                                <form action="index.php?tab=4&act=listHD" method="post">
                                    <select name="records-limit" id="records-limit" class="custom-select">
                                        <option disabled selected>Giới hạn số lượng</option>
                                        <?php foreach([5,7,10,12] as $limit) : ?>
                                        <option
                                            <?php if(isset($_SESSION['records-limit']) && $_SESSION['records-limit'] == $limit) echo 'selected'; ?>
                                            value="<?= $limit; ?>">
                                            <?= $limit; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </form>
                            </div>
                        </div>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID </th>
                                    <th>Họ tên</th>
                                    <th>Ngày đặt hàng</th>
                                    <th>Phương thức thanh toán</th>
                                    <th style="width: 4.33%">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($listND as $lh) {
                                        $deleteHref = "index.php?tab=4&act=deleteHD&id=".$lh["id"];
                                        switch ((int)$lh["pttt"]) {
                                            case 0: {
                                                $pttt = "Chuyển khoản ngân hàng";
                                                break;
                                            }
                                            case 1: {
                                                $pttt = "Thanh toán khi nhận hàng";
                                                break;
                                            }
                                        }

                                        echo '<tr>
                                                <td> '.$lh["id"].' </td>
                                                <td> '.$lh["hoTen"].' </td>
                                                <td> '.$lh["ngayDatHang"].' </td>
                                                <td> '.$pttt.' </td>
                                                <td>
                                                    <a href='.$deleteHref.'><input type="button" class="btn btn-danger" value="Xóa"></input></a>
                                                </td>
                                              </tr>';
                                    }
                                ?>
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        <nav class="mt-3 float-right">
                            <?php 
                                $href = "?tab=4&act=listHD";
                            ?>
                            <ul class="pagination justify-content-center">
                                <li class="page-item text-center <?php if($page <= 1){ echo 'disabled'; } ?>">
                                    <a class="page-link"
                                        href="<?php if($page <= 1){ echo '#'; } else { echo $href ."&page=" . $prev; } ?>"><<</a>
                                </li>

                                <?php for($i = 1; $i <= $totoalPages; $i++ ): ?>
                                <li class="page-item <?php if($page == $i) {echo 'active'; } ?>">
                                    <a class="page-link" href="<?php echo "index.php". $href ."&page=" ?><?= $i; ?>"> <?= $i; ?> </a>
                                </li>
                                <?php endfor; ?>

                                <li class="page-item text-center <?php if($page >= $totoalPages) { echo 'disabled'; } ?>">
                                    <a class="page-link"
                                        href="<?php if($page >= $totoalPages){ echo '#'; } else { echo $href ."&page=". $next; } ?>">>></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <footer class="footer">
        <div class="footer-inner-wraper">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©
                    bootstrap.com
                    2022</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Admin Control Panel </span>
            </div>
        </div>
    </footer>
    <!-- partial -->
    <script>
    $(document).ready(function() {
        $('#records-limit').change(function() {
            $('form').submit();
        })
    });
    </script>
</div>