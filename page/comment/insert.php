<form id="form_target"role="form"method="post"onsubmit="return check();"action="index.php?content=comment&action=add"><div class="card"><div class="card-body">แบบสอบถามความพึงพอใจ </div></div><table width="100%"border="0"align="center"class="table table-striped"><tr><td align="center">รายการ</td><td align="center">มากที่สุด</td><td align="center">มาก</td><td align="center">ปานกลาง</td><td align="center">น้อย</td><td align="center">น้อยที่สุด</td></tr><? require_once('models/BaseModel.php');

$sql="select * from tb_question ";
// print_r($sql    );
$i=1;
$result=mysqli_query($con, $sql);

while($row=mysqli_fetch_array($result)) {

  $id_chk=$row['id_question']; //รหัสคำถาม
  $name=$row['question']; // ชื่อคำถาม
  // print_r($comment);

  ?><script>function check() {
    var account_name_th=document.getElementById("radionNo<?=$i;?>").value;

    account_name_th=$.trim(account_name_th);

    if(account_name_th.length==0) {
      alert("กรุณากรอกข้อมูลให้ครบถ้วน");
      document.getElementById("radionNo<?=$i;?>").focus();
      return false;
    }

    else {
      return true;
    }
  }


  </script><tr><td width="574"><?=$name?></td><td width="70"align="center"><input name="radionNo<?=$i;?>"id="radionNo<?=$i;?>_1"type="radio"<?PHP if($comment_point[$i-1]['score']==5) {
    echo 'checked';
  }

  ?>value="5"></td><td width="63"align="center"><input name="radionNo<?=$i;?>"id="radionNo<?=$i;?>_2"type="radio"<?PHP if($comment_point[$i-1]['score']==4) {
    echo 'checked';
  }

  ?>value="4"></td><td width="71"align="center"><input name="radionNo<?=$i;?>"id="radionNo<?=$i;?>_3"type="radio"<?PHP if($comment_point[$i-1]['score']==3) {
    echo 'checked';
  }

  ?>value="3"></td><td width="65"align="center"><input name="radionNo<?=$i;?>"id="radionNo<?=$i;?>_4"type="radio"<?PHP if($comment_point[$i-1]['score']==2) {
    echo 'checked';
  }

  ?>value="2"></td><td width="81"align="center"><input name="radionNo<?=$i;?>"id="radionNo<?=$i;?>_5"type="radio"<?PHP if($comment_point[$i-1]['score']==1) {
    echo 'checked';
  }

  ?>value="1"></td></tr><? $i++;
  ?><input type="hidden"name="idd"id="idd"value="<? echo $i ?>"><?
}

?></table><hr><hr><div class="form-group"><label for="comment">Comment:</label><textarea class="form-control"rows="5"id="comment_detail"name="comment_detail"value="<?PHP echo $comment_by_id[0]['comment_detail'] ?>"><?PHP echo $comment_by_id[0]['comment_detail'] ?></textarea></div><?PHP if ($comment_point==null) {
  ?><center><br/><input type="submit"name="Submit"value="ตอบแบบสอบถาม"oncl></center><?PHP
}

?></form>