<?php

require_once("BaseModel.php");
class PromotionModel extends BaseModel{

    function __construct(){
        if(!static::$db){
            static::$db = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
            mysqli_set_charset(static::$db,"utf8");
        }
    }

    function getPromotion() {
        $sql = " SELECT
        *
    FROM
        `vip_promotion`
    WHERE
        1
        ORDER BY vip_promotion.promotion_id
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

    function getPromotionByID($promotion_id) {
        $sql = " SELECT
        *
    FROM
        `vip_promotion`
    WHERE
      
        promotion_id = '$promotion_id'
        ORDER BY vip_promotion.promotion_id
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

    function updatePromotionByID($id,$data = [], $promotion_image){
        $data['promotion_name']=mysqli_real_escape_string(static::$db,$data['promotion_name']);
        $data['promotion_image']=mysqli_real_escape_string(static::$db,$data['promotion_image']);
        $data['promotion_detail']=mysqli_real_escape_string(static::$db,$data['promotion_detail']);
        $data['promotion_adddate']=mysqli_real_escape_string(static::$db,$data['promotion_adddate']);

        $sql = "UPDATE 
                    vip_promotion 
                SET 
                    `promotion_name` = '".$data['promotion_name']."', 
                    `promotion_image` =  '$promotion_image', 
                    `promotion_detail` =  '".$data['promotion_detail']."', 
                    `promotion_adddate` =  '".$data['promotion_adddate']."'
                WHERE 
                    `vip_promotion`.`promotion_id` = '$id'
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

    function deletePromotionByID($id){
        $sql = " DELETE FROM vip_promotion WHERE promotion_id = '$id' ";
        if (mysqli_query(static::$db,$sql, MYSQLI_USE_RESULT)) {
            return 1;
        }else {
            return 0;
        }
    }
}
?>


