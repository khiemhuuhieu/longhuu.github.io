<?php
include 'inc/headertop.php';
include 'inc/headermid.php';
include 'inc/menu.php';
include 'inc/slider.php';
?>
<?php
if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['like'])){
    $customer_id=session::get('customer_id');
    $productid=$_POST['productid'];
    $insert_like=$product->insert_like($customer_id,$productid);
}
?>
</style>
<!-- <?php
echo phpinfo();
?> -->
  <!-- khoi sach moi  -->
    <section class="_1khoi sachmoi bg-white">
        <div class="container">
            <div class="noidung" style=" width: 100%;">
                <div class="row">
                    <!--header-->
                    <div class="col-12 d-flex justify-content-between align-items-center pb-2 bg-transparent pt-4">
                        <h1 class="header text-uppercase" style="font-weight: 400;">SÁCH MỚI TUYỂN CHỌN</h1>
                        <a href="sach-moi-tuyen-chon.html" class="btn btn-warning btn-sm text-white">Xem tất cả</a>
                    </div>
                </div>
                <div class="khoisanpham" style="padding-bottom: 2rem;">
                    <!-- 1 san pham -->
                    <?php
                    $show_pd_hot=$product->show_product_hot();
                    if($show_pd_hot){
                    while ($result=$show_pd_hot->fetch_assoc()) {
                        
                    ?>
                    <div class="card">
                        <a href="ProductDetails.php?proid=<?php echo $result['productId'] ?>" class="motsanpham"
                            style="text-decoration: none; color: black;"
                            title="<?php echo $result['productName'] ?>">
                            <img class="card-img-top anh" src="admin/upload/<?php echo $result['image']?>"
                                alt="<?php echo $result['productSlug'] ?>">
                            <div class="card-body noidungsp mt-3">
                                <h3 class="card-title ten"><?php echo $result['productName'] ?></h3>
                                <div class="gia d-flex align-items-baseline">
                                    <div class="giamoi"><?php echo $fm->format_currency($result['productPrice'])."VNĐ";?></div>

                                    <form action="" method="post">
                                        <input type="hidden" name="productid" value="<?php echo $result['productId']?>">
                                        <?php
                                        $login_check=session::get('customer_login');
                                        if($login_check==true){
                                           echo '<input type="submit" name="like" value="Yêu thích" class="btn btn btn-success">';
                                        }
                                       else{
                                           echo '<a href="login.php" class="btn btn-sm btn-success">Yêu thích</a>';
                                       }
                                       ?>
                                    </form>
                                </div>
                                <div class="danhgia">
                                    <ul class="d-flex" style="list-style: none;">
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><span class="text-muted">0 nhận xét</span></li>
                                    </ul>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php
                   }
                  }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!-- khoi sach combo hot  -->
    <section class="_1khoi combohot mt-4">
        <div class="container">
            <div class="noidung bg-white" style=" width: 100%;">
                <div class="row">
                    <!--header -->
                    <div class="col-12 d-flex justify-content-between align-items-center pb-2 bg-light">
                        <h2 class="header text-uppercase" style="font-weight: 400;">COMBO SÁCH HOT - GIẢM ĐẾN 25%</h2>
                        <a href="#" class="btn btn-warning btn-sm text-white">Xem tất cả</a>
                    </div>
                </div>
                <div class="khoisanpham">
                     <?php
                    $show_pd_sales=$product->show_product_sales();
                    if($show_pd_sales){
                    while ($result=$show_pd_sales->fetch_assoc()) {
                        
                    ?>
                    <div class="card">
                        <a href="#" class="motsanpham" style="text-decoration: none; color: black;" title="<?php echo $result['productName'] ?>">
                            <img class="card-img-top anh" src="admin/upload/<?php echo $result['image']?>"
                                alt="combo-chuyen-nghe-chuyen-doi">
                            <div class="card-body noidungsp mt-3">
                                <h3 class="card-title ten"><?php echo $result['productName']?></h3>
                                <div class="gia d-flex align-items-baseline">
                                    <div class="giamoi"><?php echo $fm->format_currency($result['productPrice'])."VNĐ";?></div>
                                     <a href="?like=<?php echo $result['productId']?>" class="btn btn-sm btn-success">Yêu thích</a>
                                </div>
                                <div class="danhgia">
                                    <ul class="d-flex" style="list-style: none;">
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><span class="text-muted">0 nhận xét</span></li>
                                    </ul>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php
                }
            }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!-- khoi sach sap phathanh  -->
    <section class="_1khoi sapphathanh mt-4">
        <div class="container">
            <div class="noidung bg-white" style=" width: 100%;">
                <div class="row">
                    <!--header-->
                    <div class="col-12 d-flex justify-content-between align-items-center pb-2 bg-light">
                        <h2 class="header text-uppercase" style="font-weight: 400;">SÁCH SẮP PHÁT HÀNH / ĐẶT TRƯỚC</h2>
                        <a href="#" class="btn btn-warning btn-sm text-white">Xem tất cả</a>
                    </div>
                </div>
                <div class="khoisanpham">
                    <!-- 1 san pham -->
                      <?php
                    $show_pd_coming=$product->show_product_coming();
                    if($show_pd_coming){
                    while ($result=$show_pd_coming->fetch_assoc()) {
                        
                    ?>
                    <div class="card">
                        <a href="#" class="motsanpham" style="text-decoration: none; color: black;"
                           title="<?php echo $result['productName'] ?>">
                            <img class="card-img-top anh" src="admin/upload/<?php echo $result['image']?>"
                                alt="<?php echo $result['productSlug'] ?>">
                            <div class="card-body noidungsp mt-3">
                                <h3 class="card-title ten"><?php echo $result['productName'] ?></h3>
                                <div class="gia d-flex align-items-baseline">
                                </div>
                                <div class="danhgia">
                                    <ul class="d-flex" style="list-style: none;">
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><span class="text-muted">0 nhận xét</span></li>
                                    </ul>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php
                }
            }
                    ?>
                </div>
            </div>
        </div>
    </section>


    <!-- div _1khoi -- khoi sachnendoc -->
    <section class="_1khoi sachnendoc bg-white mt-4">
        <div class="container">
            <div class="noidung" style=" width: 100%;">
                <div class="row">
                    <!--header-->
                    <div class="col-12 d-flex justify-content-between align-items-center pb-2 bg-transparent pt-4">
                        <h2 class="header text-uppercase" style="font-weight: 400;">SÁCH HAY NÊN ĐỌC</h2>
                        <a href="#" class="btn btn-warning btn-sm text-white">Xem tất cả</a>
                    </div>
                    <!-- 1 san pham -->
                      <?php
                    $show_pd_good=$product->show_product_good();
                    if($show_pd_good){
                    while ($result=$show_pd_good->fetch_assoc()) {
                        
                    ?>
                    <div class="col-lg col-sm-4">
                        <div class="card">
                            <a href="#" class="motsanpham" style="text-decoration: none; color: black;"
                                title="">
                                <img class="card-img-top anh" src="admin/upload/<?php echo $result['image']?>"
                                    alt="tung-buoc-chan-no-hoa">
                                <div class="card-body noidungsp mt-3">
                                    <h3 class="card-title ten"><?php echo $result['productName'] ?></h3>
                                    <small class="thoigian text-muted">27/10/2020</small>
                                    <div><a class="detail" href="#">Xem chi tiết</a></div>
                                </div>
                            </a>
                        </div>
                    </div>
                     <?php
                }
            }
                    ?>
                </div>
            </div>
            <hr>
        </div>
    </section>
<?php
   include 'inc/footer.php';
?>