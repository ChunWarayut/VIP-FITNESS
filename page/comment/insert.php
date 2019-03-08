

<form id="form_target" role="form" method="post" action="index.php?content=comment&action=insert">
  <table width="100%" border="0" align="center">
    
<tr>
    <td align="center">รายการ</td>
    <td align="center">มากที่สุด</td>
    <td align="center">มาก</td>
    <td align="center">ปานกลาง</td>
    <td align="center">น้อย</td>
    <td align="center">น้อยที่สุด</td>
  </tr>
  <?
  
require_once('models/BaseModel.php');

$sql = "select * from tb_question ";
// print_r($sql    );
$i=1;
$result= mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){ 

$id_chk = $row['id_question']; //รหัสคำถาม
$name = $row['question']; // ชื่อคำถาม
// print_r($id_chk);

?>

    <tr>
      <td width="574"><?=$name?> </td>
      <td width="70" align="center"><input name="radionNo<?=$i;?>" id="radionNo<?=$i;?>_1" type="radio" value="5"></td>
      <td width="63" align="center"><input name="radionNo<?=$i;?>" id="radionNo<?=$i;?>_2" type="radio" value="4"></td>
      <td width="71" align="center"><input name="radionNo<?=$i;?>" id="radionNo<?=$i;?>_3" type="radio" value="3"></td>
      <td width="65" align="center"><input name="radionNo<?=$i;?>" id="radionNo<?=$i;?>_4" type="radio" value="2"></td>
      <td width="81" align="center"><input name="radionNo<?=$i;?>" id="radionNo<?=$i;?>_5" type="radio" value="1"></td>
    </tr>
<?  
	$i++;
	}
    
 ?>
  </table>

  <center><br/><input type="submit" name="Submit" value="ตอบแบบสอบถาม"></center>  
  </form>