<?php

require_once("BaseModel.php");
class UserModel extends BaseModel{

    function __construct(){
        if(!static::$db){
            static::$db = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
            mysqli_set_charset(static::$db,"utf8");
        }
    }

    function getLogin($username, $password){

        $username = static::$db->real_escape_string($username);
        $password = static::$db->real_escape_string($password);

        if ($result = mysqli_query(static::$db,"SELECT *
            FROM vip_member
            WHERE member_username = '$username' 
            AND member_password = '$password'", MYSQLI_USE_RESULT)) {
            $data;
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data = $row;
            }
            $result->close();
            return $data;
        }
    }

    function getUserBy(){
        $sql = "SELECT * 
        FROM vip_member
        ORDER BY CONCAT(vip_member.member_firstname,' ',vip_member.member_lastname) 
        ";
        // echo $sql;

        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    }
    function getUserByMember(){
        $sql = "SELECT * 
        FROM vip_member
        WHERE member_status = 'member'
        ORDER BY CONCAT(vip_member.member_firstname,' ',vip_member.member_lastname) 
        ";
        // echo $sql;

        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    }

    function getUserByTrainerID($ID){
        $sql = "SELECT * 
        FROM vip_member
        WHERE `member_id` = '$ID'
        ORDER BY CONCAT(vip_member.member_firstname,' ',vip_member.member_lastname) 
        ";
        // echo $sql;

        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data = [];
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data[] = $row;
            }
            $result->close();
            return $data;
        }
    }

    function getUserByID($id){
        $sql = " SELECT * 
        FROM vip_member 
        WHERE member_id = '$id' 
        ";

        if ($result = mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            $data;
            while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $data = $row;
            }
            $result->close();
            return $data;
        }
    }

    function updateUserByID($id,$data = []){
        $data['member_id']=mysqli_real_escape_string(static::$db,$data['member_id']);
        $data['member_username']=mysqli_real_escape_string(static::$db,$data['member_username']);
        $data['member_password']=mysqli_real_escape_string(static::$db,$data['member_password']);
        $data['member_firstname']=mysqli_real_escape_string(static::$db,$data['member_firstname']);
        $data['member_lastname']=mysqli_real_escape_string(static::$db,$data['member_lastname']);
        $data['member_image']=mysqli_real_escape_string(static::$db,$data['member_image']);
        $data['member_sex']=mysqli_real_escape_string(static::$db,$data['member_sex']);
        $data['member_birthday']=mysqli_real_escape_string(static::$db,$data['member_birthday']);
        $data['member_address']=mysqli_real_escape_string(static::$db,$data['member_address']);
        $data['member_tel']=mysqli_real_escape_string(static::$db,$data['member_tel']);
        $data['member_issue']=mysqli_real_escape_string(static::$db,$data['member_issue']);
        $data['member_expiry']=mysqli_real_escape_string(static::$db,$data['member_expiry']);
        $data['member_status']=mysqli_real_escape_string(static::$db,$data['member_status']);
        $data['member_around']=mysqli_real_escape_string(static::$db,$data['member_around']);

        $sql = "UPDATE vip_member SET 
        member_id = '".$data['member_id']."', 
        member_username = '".$data['member_username']."', 
        member_password = '".$data['member_password']."', 
        member_firstname = '".$data['member_firstname']."', 
        member_lastname = '".$data['member_lastname']."', 
        member_image = '".$data['member_image']."',
        member_sex = '".$data['member_sex']."',
        member_birthday = '".$data['member_birthday']."',
        member_address = '".$data['member_address']."',
        member_tel = '".$data['member_tel']."',
        member_issue = '".$data['member_issue']."',
        member_expiry = '".$data['member_expiry']."',
        member_status = '".$data['member_status']."',
        member_around = '".$data['member_around']."'
     
        WHERE member_id = $id ";
        
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }

    function insertUser($data=[]){
        $sql = " INSERT INTO vip_member(
            member_id,
            member_username,
            member_password,
            member_firstname,
            member_lastname,
            member_image,
            member_sex,
            member_birthday,
            member_address,
            member_tel,
            member_issue,
            member_expiry,
            member_status,
            member_around
        ) VALUES ('".
        mysqli_real_escape_string(static::$db,$data['member_id'])."','".
        mysqli_real_escape_string(static::$db,$data['member_username'])."','".
        mysqli_real_escape_string(static::$db,$data['member_password'])."','".
        mysqli_real_escape_string(static::$db,$data['member_firstname'])."','".
        mysqli_real_escape_string(static::$db,$data['member_lastname'])."','".
        mysqli_real_escape_string(static::$db,$data['member_image'])."','".
        mysqli_real_escape_string(static::$db,$data['member_facebook'])."','".
        mysqli_real_escape_string(static::$db,$data['member_sex'])."','".
        mysqli_real_escape_string(static::$db,$data['member_birthday'])."','".
        mysqli_real_escape_string(static::$db,$data['member_address'])."','".
        mysqli_real_escape_string(static::$db,$data['member_tel'])."','".
        mysqli_real_escape_string(static::$db,$data['member_issue'])."','".
        mysqli_real_escape_string(static::$db,$data['member_expiry'])."','".
        mysqli_real_escape_string(static::$db,$data['member_status'])."','".
        mysqli_real_escape_string(static::$db,$data['member_around'])."'
        )";

        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return mysqli_insert_id(static::$db);
        }else {
            return 0;
        }
    }

    function deleteUserByID($id){
        $sql = " DELETE FROM vip_member WHERE member_id = '$id' ";
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }
}
?>