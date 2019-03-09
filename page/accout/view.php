
<div class="card">
  <div class="card-body">
  <h1>ระบบจัดการข้อมูลลูกค้า</h1>
<div align=right>
  </div>
</div>

<a class="btn btn-primary" href="?content=accout&action=insert">
    เพิ่มข้อมูลลูกค้า
  </a>

</div>
<table class="table table-striped">
  <thead>
    <tr>
      <th>#</th>
      <th>ชื่อ - นามสกุล</th>  
      <th>เบอร์โทรศัพท์</th>
      <th>ประเภทผุ้ใช้งาน</th>
      <th>trainer</th>
      <th>เเก้ไข</th>
      <th>ลบ</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    for($i=0; $i < count($member); $i++){
    ?>
    <tr>
      <td><?php echo $i+1; ?></td>
      <td class="text-left"><?php echo $member[$i]['member_firstname']; ?> <?php echo $member[$i]['member_lastname']; ?> </td>
      <td><?php echo $member[$i]['member_tel']; ?></td>
      <td class="center"><?php echo $member[$i]['member_typemember']; ?></td>
      <td class="center"><?php 
      $trainer =  $member_model->getUserByTrainerID($member[$i]['member_keeper']);
        // print_r($trainer);
        echo $member[$i]['member_keeper'];
        $trainer = $trainer[0];
      echo $trainer['member_firstname'] .' '. $trainer['member_lastname']; 
      
      
      ?></td>
      <td>
        <a href="?content=accout&action=update&id=<?php echo $member[$i]['member_id'];?>" style="font-size: 20px;">
          <i class="fa fa-pencil-square-o" aria-hidden="true" ></i>
        </a> 
      </td>
      <td>
        <a href="?content=accout&action=delete&id=<?php echo $member[$i]['member_id'];?>" onclick="return confirm('คุณต้องการลบผู้ใช้งาน : <?php echo $member[$i]['member_firstname']; ?> ?');" style="color:red; font-size: 20px;">
          <i class="fa fa-times" aria-hidden="true"></i>
        </a>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>  