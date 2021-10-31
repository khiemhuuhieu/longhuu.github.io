<?php
include'inc/headertop.php';
include'inc/headerhidden.php';
?>
<?php
if(!isset($_GET['proid']) || $_GET['proid']==NULL)
{
  echo "<script>window.location='404.php' </script>";
}
else
{
  $id=$_GET['proid'];
}
?>  
<?php
if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['submit']))
{
    $quantity=$_POST['quantity'];
    $addToCart=$cart->addToCart($quantity,$id);
}
?>
<link rel="stylesheet" href="css/product-item.css">
    <!-- breadcrumb  -->
    <section class="breadcrumbbar">
        <div class="container">
            <ol class="breadcrumb mb-0 p-0 bg-transparent">
                <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="#">Sách kinh tế</a></li>
            </ol>
        </div>
    </section>

    <!-- nội dung của trang  -->
    <section class="product-page mb-4">
        <div class="container">
            <!-- chi tiết 1 sản phẩm -->
            <?php
            $show_pd_detail=$product->show_product_detail($id);
            if($show_pd_detail){
                while ($result=$show_pd_detail->fetch_assoc()) {

            ?>
            <div class="product-detail bg-white p-4">
                <div class="row">
                    <!-- ảnh  -->
                    <div class="col-md-5 khoianh">
                        <div class="anhto mb-4">
                            <a class="active" href="admin/upload/<?php echo $result['image']?>" data-fancybox="thumb-img">
                                <img class="product-image" src="admin/upload/<?php echo $result['image']?>" alt="" style="width: 100%;">
                            </a>
                            <a href="admin/upload/<?php echo $result['image']?>" data-fancybox="thumb-img"></a>
                        </div>
                        <div class="list-anhchitiet d-flex mb-4" style="margin-left: 2rem;">
                            <img class="thumb-img thumb1 mr-3" src="admin/upload/<?php echo $result['image']?>" class="img-fluid" alt="<?php echo $result['productSlug'] ?>">
                        </div>
                    </div>
                    <!-- thông tin sản phẩm: tên, giá bìa giá bán tiết kiệm, các khuyến mãi, nút chọn mua.... -->
                    <div class="col-md-7 khoithongtin">
                        <div class="row">
                            <div class="col-md-12 header">
                                <h4 class="ten"><?php echo $result['productName'] ?></h4>
                                <div class="rate">
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star "></i>
                                </div>
                                <hr>
                            </div>
                            <div class="col-md-7">
                                <div class="gia">
                                  
                                    <div class="giaban">Giá bán tại LongHuu:</div>
                                </div>
                                <div class="uudai my-3">
                                    <h6 class="header font-weight-bold">Khuyến mãi & Ưu đãi tại LongHuu:</h6>
                                    <ul>
                                        <li><b>Miễn phí giao hàng </b>cho đơn hàng từ 150.000đ ở TP.HCM và 300.000đ ở
                                            Tỉnh/Thành khác <a href="#">>> Chi tiết</a></li>
                                        <li><b>Combo sách HOT - GIẢM 25% </b><a href="#">>>Xem ngay</a></li>
                                        <li>Tặng Bookmark cho mỗi đơn hàng</li>
                                        <li>Bao sách miễn phí (theo yêu cầu)</li>
                                    </ul>
                                </div>
                                <?php
                                    if(isset($addToCart)){
                                        echo $addToCart;
                                    }
                                ?>
                                <form action="" method="POST">
                                <div class="d-flex">
                                    <label class="font-weight-bold">Số lượng: </label>
                                    <input style="width: 50px;" type="number" min="1" name="quantity" value="1">
                                </div><br>
                               <input type="submit" name="submit" class="buysubmit btn btn-sm btn-success" value="Chọn Mua">
                            </form>
                                <a class="huongdanmuahang text-decoration-none" href="#">(Vui lòng xem hướng dẫn mua
                                    hàng)</a>
                                <small class="share">Share: </small>
                                <div class="fb-like" data-href="https://www.facebook.com/DealBook-110745443947730/"
                                    data-width="300px" data-layout="button" data-action="like" data-size="small"
                                    data-share="true"></div>
                            </div>
                            <!-- thông tin khác của sản phẩm:  tác giả, ngày xuất bản, kích thước ....  -->
                            <div class="col-md-5">
                                <div class="thongtinsach">
                                    <ul>
                                        <li>Tác giả: <a href="#" class="tacgia"></a></li>
                                        <li>Ngày xuất bản: <b></b></li>
                                        <li>Kích thước: <b></b></li>
                                        <li>Dịch giả: Skye Phan;</li>
                                        <li>Nhà xuất bản: </li>
                                        <li>Hình thức bìa: <b></b></li>
                                        <li>Số trang: <b></b></li>
                                        <li>Cân nặng: <b></b></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- decripstion của 1 sản phẩm: giới thiệu , đánh giá độc giả  -->
                    <div class="product-description col-md-9">
                        <!-- 2 tab ở trên  -->
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active text-uppercase" id="nav-gioithieu-tab"
                                    data-toggle="tab" href="#nav-gioithieu" role="tab" aria-controls="nav-gioithieu"
                                    aria-selected="true">Giới thiệu</a>
                                <a class="nav-item nav-link text-uppercase" id="nav-danhgia-tab" data-toggle="tab"
                                    href="#nav-danhgia" role="tab" aria-controls="nav-danhgia"
                                    aria-selected="false">Đánh
                                    giá của độc giả</a>
                            </div>
                        </nav>
                        <!-- nội dung của từng tab  -->
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active ml-3" id="nav-gioithieu" role="tabpanel"
                                aria-labelledby="nav-gioithieu-tab">
                                <h6 class="tieude font-weight-bold"><?php echo $result['productName'] ?></h6>
                               <span><?php echo $result['productDesc'] ?></span>
                            </div>
                            <div class="tab-pane fade" id="nav-danhgia" role="tabpanel" aria-labelledby="nav-danhgia-tab"><br>
                                <div class="comment-form-container">
                                        <form id="frm-comment">
                                            <div class="input-row">
                                                <input type="hidden" name="comment_id" id="commentId"
                                                    placeholder="Name" /> <input class="input-field"
                                                    type="text" name="name" id="name" placeholder="Name" />
                                            </div>
                                            <div class="input-row">
                                                <textarea class="input-field" type="text" name="comment"
                                                    id="comment" placeholder="Add a Comment">  </textarea>
                                            </div>
                                            <div>
                                                <input type="button" class="btn-submit" id="submitButton"
                                                    value="Publish" />
                                                <div id="comment-message">Comments Added Successfully!</div>
                                            </div>

                                        </form>
                                    </div>
                                    <div id="output"></div>

                            <p>Viet danh gia vua ban</p>
                            <!-- het tab nav-danhgia  -->
                        </div>
                        <!-- het tab-content  -->
                    </div>
                    <!-- het product-description -->
                </div>
                <!-- het row  -->
            </div>
            <?php
            }
            }
            ?>
            <!-- het product-detail -->
        </div>
        <!-- het container  -->
    </section>
    <!-- het product-page -->

    <!-- khối sản phẩm tương tự -->
    <section class="_1khoi sachmoi">
        <div class="container">
            <div class="noidung bg-white" style=" width: 100%;">
                <div class="row">
                    <!--header-->
                    <div class="col-12 d-flex justify-content-between align-items-center pb-2 bg-light pt-4">
                        <h5 class="header text-uppercase" style="font-weight: 400;">Sản phẩm tương tự</h5>
                        <a href="sach-moi-tuyen-chon.html" class="btn btn-warning btn-sm text-white">Xem tất cả</a>
                    </div>
                </div>
                <div class="khoisanpham" style="padding-bottom: 2rem;">
                    <!-- 1 sản phẩm -->
                    <div class="card">
                        <a href="Lap-trinh-ke-hoach-kinh-doanh-hieu-qua.html" class="motsanpham" style="text-decoration: none; color: black;" data-toggle="tooltip"
                            data-placement="bottom" title="Lập Kế Hoạch Kinh Doanh Hiệu Quả">
                            <img class="card-img-top anh" src="images/lap-ke-hoach-kinh-doanh-hieu-qua.jpg" alt="lap-ke-hoach-kinh-doanh-hieu-qua">
                            <div class="card-body noidungsp mt-3">
                                <h6 class="card-title ten">Lập Kế Hoạch Kinh Doanh Hiệu Quả</h6>
                                <small class="tacgia text-muted">Brian Finch</small>
                                <div class="gia d-flex align-items-baseline">
                                    <div class="giamoi">111.200 ₫</div>
                                    <div class="giacu text-muted">139.000 ₫</div>
                                    <div class="sale">-20%</div>
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
                    <div class="card">
                        <a href="Ma-bun-luu-manh-va-nhung-cau-chuyen-khac-cua-nguyen-tri.html" class="motsanpham" style="text-decoration: none; color: black;" data-toggle="tooltip"
                            data-placement="bottom" title="Ma Bùn Lưu Manh Và Những Câu Chuyện Khác Của Nguyễn
                        Trí">
                            <img class="card-img-top anh" src="images/ma-bun-luu-manh.jpg" alt="ma-bun-luu-manh">
                            <div class="card-body noidungsp mt-3">
                                <h6 class="card-title ten">Ma Bùn Lưu Manh Và Những Câu Chuyện Khác Của Nguyễn
                                    Trí</h6>
                                <small class="tacgia text-muted">Nguyễn Trí</small>
                                <div class="gia d-flex align-items-baseline">
                                    <div class="giamoi">68.000 ₫</div>
                                    <div class="giacu text-muted">85.000 ₫</div>
                                    <div class="sale">-20%</div>
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
                    <div class="card">
                        <a href="#" class="motsanpham" style="text-decoration: none; color: black;" data-toggle="tooltip"
                            data-placement="bottom" title="Bank 4.0 - Giao dịch mọi nơi, không chỉ là ngân hàng">
                            <img class="card-img-top anh" src="images/bank-4.0.jpg" alt="bank-4.0">
                            <div class="card-body noidungsp mt-3">
                                <h6 class="card-title ten">Bank 4.0 - Giao dịch mọi nơi, không chỉ là ngân hàng
                                </h6>
                                <small class="tacgia text-muted">Brett King</small>
                                <div class="gia d-flex align-items-baseline">
                                    <div class="giamoi">111.200 ₫</div>
                                    <div class="giacu text-muted">139.000 ₫</div>
                                    <div class="sale">-20%</div>
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
                    <div class="card">
                        <a href="#" class="motsanpham" style="text-decoration: none; color: black;" data-toggle="tooltip"
                            data-placement="bottom" title="Bộ Sách 500 Câu Chuyện Đạo Đức - Những Câu Chuyện
                        Tình Thân (Bộ 8 Cuốn)">
                            <img class="card-img-top anh" src="images/bo-sach-500-cau-chuyen-dao-duc.jpg" alt="bo-sach-500-cau-chuyen-dao-duc">
                            <div class="card-body noidungsp mt-3">
                                <h6 class="card-title ten">Bộ Sách 500 Câu Chuyện Đạo Đức - Những Câu Chuyện
                                    Tình Thân (Bộ 8 Cuốn)</h6>
                                <small class="tacgia text-muted">Nguyễn Hạnh - Trần Thị Thanh Nguyên</small>
                                <div class="gia d-flex align-items-baseline">
                                    <div class="giamoi">111.200 ₫</div>
                                    <div class="giacu text-muted">139.000 ₫</div>
                                    <div class="sale">-20%</div>
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
                    <div class="card">
                        <a href="#" class="motsanpham" style="text-decoration: none; color: black;" data-toggle="tooltip"
                            data-placement="bottom" title="Lịch Sử Ung Thư - Hoàng Đế Của Bách Bệnh">
                            <img class="card-img-top anh" src="images/ung-thu-hoang-de-cua-bach-benh.jpg" alt="ung-thu-hoang-de-cua-bach-benh">
                            <div class="card-body noidungsp mt-3">
                                <h6 class="card-title ten">Lịch Sử Ung Thư - Hoàng Đế Của Bách Bệnh</h6>
                                <small class="tacgia text-muted">Siddhartha Mukherjee</small>
                                <div class="gia d-flex align-items-baseline">
                                    <div class="giamoi">111.200 ₫</div>
                                    <div class="giacu text-muted">139.000 ₫</div>
                                    <div class="sale">-20%</div>
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
                    <div class="card">
                        <a href="#" class="motsanpham" style="text-decoration: none; color: black;" data-toggle="tooltip"
                            data-placement="bottom" title="Cuốn Sách Khám Phá: Trời Đêm Huyền Diệu">
                            <img class="card-img-top anh" src="images/troi-dem-huyen-dieu.jpg" alt="troi-dem-huyen-dieu">
                            <div class="card-body noidungsp mt-3">
                                <h6 class="card-title ten">Cuốn Sách Khám Phá: Trời Đêm Huyền Diệu</h6>
                                <small class="tacgia text-muted">Disney Learning</small>
                                <div class="gia d-flex align-items-baseline">
                                    <div class="giamoi">111.200 ₫</div>
                                    <div class="giacu text-muted">139.000 ₫</div>
                                    <div class="sale">-20%</div>
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
                    <div class="card">
                        <a href="#" class="motsanpham" style="text-decoration: none; color: black;" data-toggle="tooltip"
                            data-placement="bottom"
                            title="Bộ Sách Những Câu Chuyện Cho Con Thành Người Tử Tế (Bộ 5 Cuốn)">
                            <img class="card-img-top anh" src="images/bo-sach-nhung-cau-chuyen-cho-con-thanh-nguoi-tu-te.jpg" alt="bo-sach-nhung-cau-chuyen-cho-con-thanh-nguoi-tu-te">
                            <div class="card-body noidungsp mt-3">
                                <h6 class="card-title ten">Bộ Sách Những Câu Chuyện Cho Con Thành Người Tử Tế (Bộ 5
                                    Cuốn)</h6>
                                <small class="tacgia text-muted">Nhiều Tác Giả</small>
                                <div class="gia d-flex align-items-baseline">
                                    <div class="giamoi">111.200 ₫</div>
                                    <div class="giacu text-muted">139.000 ₫</div>
                                    <div class="sale">-20%</div>
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
                    <div class="card">
                        <a href="#" class="motsanpham" style="text-decoration: none; color: black;" data-toggle="tooltip"
                            data-placement="bottom" title="Lịch Sử Thế Giới">
                            <img class="card-img-top anh" src="images/lich-su-the-gioi.jpg" alt="lich-su-the-gioi">
                            <div class="card-body noidungsp mt-3">
                                <h6 class="card-title ten">Lịch Sử Thế Giới</h6>
                                <small class="tacgia text-muted">Nam Phong tùng thư - Phạm Quỳnh chủ nhiệm</small>
                                <div class="gia d-flex align-items-baseline">
                                    <div class="giamoi">111.200 ₫</div>
                                    <div class="giacu text-muted">139.000 ₫</div>
                                    <div class="sale">-20%</div>
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
                </div>
            </div>
        </div>
    </section>
<?php
include'inc/footer.php';
?>

