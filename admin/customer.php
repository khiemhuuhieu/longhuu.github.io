<?php
include 'inc/header.php';
?>
<?php
  $filepath=realpath(dirname(__FILE__));
   require_once ($filepath.'/../classes/customer.php');
?>
<?php
if(isset($_GET['customerid']) && $_GET['customerid']==NULL)
{
  $id=$_GET['customerid'];
}
?>
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thông tin khách hàng<br>
                        </header>
                        <div class="panel-body">
                        	<?php
				                $customer=new customer();
				                $id=$_GET['customerid'];
				                $get_customer=$customer->show_customer($id);
				                if($get_customer)
				                {
				                  while($result =$get_customer->fetch_assoc())
				                  {
				               
				              ?>
                            <div class="position-center">
                                <div class="form-group">
                                    <label for="exampleInputCategory">Tên khách hàng</label>
                                    <input type="text" class="form-control" value="<?php echo $result['customer_name'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputSlug">Số điện thoại</label>
                                    <input type="text" class="form-control"  value="<?php echo $result['customer_phone'] ?>" readonly >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputDecs">Địa chỉ</label>
                                    <input type="text" class="form-control"  value="<?php echo $result['customer_address'] ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputDecs">Email</label>
                                    <input type="text" class="form-control"  value="<?php echo $result['customer_email'] ?>" readonly>
                                </div>  
                            <?php
                             }
                              }
                            ?>
                        </div>
                    </section>
            </div>
        </div>
<?php
include 'inc/footer.php';
?>