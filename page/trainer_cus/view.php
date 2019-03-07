<h1>ข้อมูลลูกค้า</h1>

<table class="table table-striped">
  <thead>
    <tr>
      <th>#</th>
      <th>ชื่อ - นามสกุล</th>  
      <th>เบอร์โทรศัพท์</th>
      <th>ประเภทผุ้ใช้งาน</th>
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
    </tr>
    <?php } ?>
  </tbody>
</table>  