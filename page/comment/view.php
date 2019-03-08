<table class="table table-bordered table-light" >
    <thead>
        <tr>
            <th scope="col"  width="5">#</th>
            <th scope="col"  width="60">ชื่อลูกค้า</th>
            <th scope="col"  width="80">ความคิดเห็น</th>
            <th scope="col"  width="5"></th>
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
            <td> <?PHP  echo $comment[$i]['member_firstname'] . ' ' . $comment[$i]['member_lastname'];  ?> </td>
            <td> <?PHP echo $comment[$i]['comment_detail']; ?> <br>


                                
                    <?
                    
                    require_once('models/BaseModel.php');
                    
                    $sql = "select * from tb_question ";
                    // print_r($sql    );
                    $k=1;
                    $result= mysqli_query($con,$sql);
                    while($row=mysqli_fetch_array($result)){ 
                    
                    $id_chk = $row['id_question']; //รหัสคำถาม
                    $name = $row['question']; // ชื่อคำถาม
                    // print_r($comment);

                    echo $name . " = ";


                    echo  $comment_point[$id_chk -1]['score'] ;
                    
                    ?> <br>
                    

<?
                        $K++;
                    }
                    ?>
            
            
            
            
             </td>
            <td>
                <a href="?content=comment&action=delete&id=<?php echo $comment[$i]['comment_id'];?>"
                    onclick="return confirm('คุณต้องการลบความคิดเห็นนี้หรือไม่')"
                    style="color:red; font-size: 20px;">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
            </td>
        </tr>
        <?PHP #endregion
    }

    ?>
    </tbody>
</table>