<?php

require_once("BaseModel.php");
class CommentModel extends BaseModel{

    function __construct(){
        if(!static::$db){
            static::$db = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
            mysqli_set_charset(static::$db,"utf8");
        }
    }

    function getComment() {
        $sql = " SELECT
        *
    FROM
        `vip_comment`
    WHERE
        1
        ORDER BY vip_comment.comment_id
        ";
        // echo "<pre>";
        // print_r();
        // echo "</pre>";
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    }

    function getCommentByID($comment_id) {
        $sql = " SELECT
        *
    FROM
        `vip_comment`
    WHERE
      
        member_id = '$comment_id'
        ORDER BY vip_comment.comment_id
        ";
        // echo "<pre>";
        // print_r($sql);
        // echo "</pre>";
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    }

    function getCommentPointByID($comment_id) {
        $sql = " SELECT
        *
    FROM
        `tb_answer`
    WHERE
        `id_person` = '$comment_id'
        GROUP BY `id_question`
        ORDER BY id
        ";
        // echo "<pre>";
        // print_r($sql);
        // echo "</pre>";
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    }

    function getCommentByMemberID() {
        $sql = " SELECT
                    *
                FROM
                    `vip_comment`
                LEFT JOIN vip_member ON vip_comment.member_id = vip_member.member_id 
                WHERE
                    1
        ";
        // echo "<pre>";
        // print_r();
        // echo "</pre>";
        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    }

    function updateCommentByID($id,$data = [], $comment_image){
        $data['comment_name']=mysqli_real_escape_string(static::$db,$data['comment_name']);
        $data['comment_image']=mysqli_real_escape_string(static::$db,$data['comment_image']);
        $data['comment_detail']=mysqli_real_escape_string(static::$db,$data['comment_detail']);
        $data['comment_adddate']=mysqli_real_escape_string(static::$db,$data['comment_adddate']);

        $sql = "UPDATE 
                    vip_comment 
                SET 
                    `comment_name` = '".$data['comment_name']."', 
                    `comment_image` =  '$comment_image', 
                    `comment_detail` =  '".$data['comment_detail']."', 
                    `comment_adddate` =  '".$data['comment_adddate']."'
                WHERE 
                    `vip_comment`.`comment_id` = '$id'
            ";
        
        // echo "<pre>";
        // print_r($sql);
        // echo "</pre>";
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }

    function deleteCommentByID($id){
        $sql = " DELETE FROM vip_comment WHERE comment_id = '$id' ";
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }






    function insertCommentPoint($data=[]){
        $sql = " INSERT INTO `tb_answer`(
            `id`, 
            `id_person`, 
            `id_question`, 
            `score`
            ) VALUES (
                NULL,'".
            mysqli_real_escape_string(static::$db,$data['id_person'])."','". 
            mysqli_real_escape_string(static::$db,$data['i'])."','".
            mysqli_real_escape_string(static::$db,$data['radionNo'])."'
            )";
        
        // echo $sql;
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return mysqli_insert_id(static::$db);
        }else {
            return 0;
        }
    }

    function insertComment($data1=[]){
        $sql = " INSERT
        INTO
            `vip_comment`(
                `comment_id`,
                `comment_detail`,
                `comment_date`,
                `member_id`
            )
        VALUES(
            NULL,'".
            mysqli_real_escape_string(static::$db,$data1['comment_detail'])."', 
            NULL ,'".
            mysqli_real_escape_string(static::$db,$data1['member_id'])."'
        )";
        
        
        
        
        // echo $sql;
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return mysqli_insert_id(static::$db);
        }else {
            return 0;
        }
    }







}
?>


