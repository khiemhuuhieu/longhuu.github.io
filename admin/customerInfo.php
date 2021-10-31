<?php
include 'inc/header.php';
?>
<?php include '../classes/customer.php';
?>
<?php
$customer = new customer();
?>
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
    Quản lý thông tin khách hàng
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-12 text-left">      
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>STT</th>
            <th>Tên</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Địa chỉ</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
         <?php
            $showCustomerInfo = $customer->showCustomerInfo();
            if($showCustomerInfo){
              $i=0;
              while($result=$showCustomerInfo->fetch_assoc()){
                $i++;
            
            ?>
          <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $result['customer_name'] ?></td>
            <td><?php echo $result['customer_phone'] ?></td>
           <td><?php echo $result['customer_email'] ?></td>
           <td><?php echo $result['customer_address'] ?></td>
          </tr>
            <?php
             }
             }
            ?>
      </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
         <!--  <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small> -->
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
  
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
<?php
include 'inc/footer.php';
?>