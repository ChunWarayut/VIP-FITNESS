<div class="card">
    <div class="card-body">
        แบบสอบถามความพึงพอใจ
    </div>
</div>
<table class="table table-bordered table-light">
    <thead>
        <tr>
            <th scope="col" width="1%">#</th>
            <th scope="col" width="">ชื่อลูกค้า & ความคิดเห็น</th>
            <th scope="col" width="1%"></th>
        </tr>
    </thead>
    <tbody>
        <?PHP #endregion
    for ($i=0; $i < count($comment); $i++) { 
    # code...

                    $comment_point = $comment_model -> getCommentPointByID($comment[$i]['member_id']);
                    // echo "<pre>";
                    // print_r($comment_point);
                    // echo "</pre>";
    ?>
        <tr>
            <th scope="row">
                <?PHP echo $i+1 ; ?>
            </th>
            <td>


                <div class="card">
                    <div class="card-body">
                        <?PHP  echo $comment[$i]['member_firstname'] . ' ' . $comment[$i]['member_lastname'];  ?>
                    </div>
                </div>


                <div class="card">
                    <div class="card-body">

                        <?
                    
                    require_once('models/BaseModel.php');
                    
                    $sql = "select * from tb_question ";
                    // print_r($sql    );
                    $k=1;
                    $result= mysqli_query($con,$sql);
                    while($row=mysqli_fetch_array($result)){ 
                    ?>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-10">
<?

$id_chk = $row['id_question']; //รหัสคำถาม
$name = $row['question']; // ชื่อคำถาม

echo $name
?>
                                </div>
                                <div class="col-2">
<? 
                    echo  $comment_point[$id_chk -1]['score'] ;
                     ?>
                                </div>
                            </div>
                        </div>
                        <?
                    // print_r($comment);

                    // echo $name . " = ";


                    
                    ?> <br>


                        <?
                        $K++;
                    }
                    ?>



                    </div>
                </div>

                <div class="card">
                    <div class="card-body">



                        <?PHP echo $comment[$i]['comment_detail']; ?>


                    </div>
                </div>



            </td>
            <td>
                <a href="?content=comment&action=delete&id=<?php echo $comment[$i]['comment_id'];?>"
                    onclick="return confirm('คุณต้องการลบความคิดเห็นนี้หรือไม่')" style="color:red; font-size: 20px;">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
            </td>
        </tr>
        <?PHP #endregion
    }

    ?>
    </tbody>
</table>