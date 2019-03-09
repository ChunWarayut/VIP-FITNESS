<?PHP #endregion


require_once('models/UserModel.php');

$member_model = new UserModel;

$member = $member_model->getUserByMember();

?>

<div class="card">
  <div class="card-header">
  
  <h1>
  ข้อมูล Tanita
  </h1>
  </div>
  <br>
<table class="table table-striped">
  <thead>
    <tr>
      <th>#</th>
      <th>ชื่อ - นามสกุล</th>  
      <th>เบอร์โทรศัพท์</th>
      <th>ประเภทผุ้ใช้งาน</th>
      <th>trainer</th>
      <th>เพิ่มรูป Tanita</th>
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
        <a href="?content=tanitaInsert&id=<?php echo $member[$i]['member_id'];?>&t_id=<?php echo $member[$i]['member_keeper'];?>" style="font-size: 20px;">
          <i class="fa fa-pencil-square-o" aria-hidden="true" ></i>
        </a> 
      </td>
      <td>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>  