<h1>ระบบจัดการผู้ข้อมูลลูกค้า</h1>
<h2>เพิ่ม ลบ เเก้ไข ผู้ข้อมูลลูกค้า</h2>
<div align=right>
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
    for($i=0; $i < count($user); $i++){
    ?>
    <tr>
      <td><?php echo $i+1; ?></td>
      <td class="text-left"><?php echo $user[$i]['member_firstname']; ?> <?php echo $user[$i]['member_lastname']; ?> </td>
      <td><?php echo $user[$i]['member_tel']; ?></td>
      <td class="center"><?php echo $user[$i]['member_typemember']; ?></td>
      <td class="center"><?php 
      $trainer =  $user_model->getUserByTrainerID($user[$i]['member_keeper']);
        // print_r($trainer);
        $trainer = $trainer[0];
      echo $trainer['member_firstname'] .' '. $trainer['member_lastname']; 
      
      
      ?></td>
      <td>
        <a href="?content=accout&action=update&id=<?php echo $user[$i]['user_id'];?>" style="font-size: 20px;">
          <i class="fa fa-pencil-square-o" aria-hidden="true" ></i>
        </a> 
      </td>
      <td>
        <a href="?content=accout&action=delete&id=<?php echo $user[$i]['user_id'];?>" onclick="return confirm('คุณต้องการลบผู้ใช้งาน : <?php echo $user[$i]['user_firstname']; ?> ?');" style="color:red; font-size: 20px;">
          <i class="fa fa-times" aria-hidden="true"></i>
        </a>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
