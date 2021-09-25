<?php
Class Home_model extends CI_Model{
 
    function userLogin($clm1,$clm2,$clm3,$val1,$val2,$val3){
       $sql = 'SELECT * FROM wm_admin_user_details where  '.$clm1.' = "' . $val1 . '" AND '.$clm2.' = ("' . $val2 . '") AND '.$clm3.' = "' . $val3 . '"';
        $query = $this->db->query($sql);
        if ($query->num_rows() == 1) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }

    function userwifiLogin($clm1,$clm2,$clm3,$val1,$val2,$val3){
         $sql = 'SELECT * FROM pp_user_wifi_details where  '.$clm1.' = "' . $val1 . '" AND '.$clm2.' = ("' . $val2 . '") AND '.$clm3.' = "' . $val3 . '"';
        $query = $this->db->query($sql);
        if ($query->num_rows() == 1) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }

    function tableInsert($tablename,$formValues){
        $this->db->insert($tablename, $formValues);
        if($this->db->affected_rows() == 1){
              return True;
        }   else  {
             return False;
        }
    }

    function display_table($tbl,$byOder=''){
        $query = $this->db->query("SELECT * FROM $tbl $byOder");
        $result = $query->result_array();
         return $result;
    }

    function insert_and_return($tbl,$val){
        $this->db->insert($tbl,$val); 
        $data = $this->db->insert_id();
        return $data;

    }
          
    function get_record_where($tbl,$clm,$val){       
        $row = $this->db->get_where($tbl, array($clm => $val))->result_array();
        return $row;
    }
    
    function file_extension($filename){       
        return end(explode(".", $filename));
    }
        
    function get_and_record_where($tbl,$clm1,$val1,$clm2,$val2){
        $row = $this->db->get_where($tbl, array($clm1 => $val1,$clm2 => $val2))->result_array();
        return $row;
    }
    
    function get_and_and_record_where($tbl,$clm1,$val1,$clm2,$val2,$clm3,$val3){
        $row = $this->db->get_where($tbl, array($clm1 => $val1,$clm2 => $val2,$clm3 => $val3))->result_array();
        return $row;
    }

    function update_Data($ID,$val,$tbl_name) {       
        $this->db->where($ID, $val[$ID]);
        $this->db->update($tbl_name, $val);
        if($this->db->affected_rows() == 1){
            return True;
        } else  {
            return False;
        }
    } 

    function delete_Data($ID_TNM,$ID,$tbl_name){
        $this->db->where($ID_TNM, $ID);
        $this->db->delete($tbl_name);
    }
    
    function generatenamecode(){
        $validchars[2] = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXWZabcdefghijklmnopqrstuvwxyz";
        $namecode  = "";
        $counter   = 0;
         while ($counter <10) {
             $actChar = substr($validchars[2], rand(0, strlen($validchars[2])-1), 1);
            if (!strstr($namecode, $actChar)) {
                $namecode .= $actChar;
                $counter++;
                }
        }
        $datetime=strtotime(date("h:i:sa"));
        global $filetime;
        $namecode .=$filetime."". $datetime;
        return $namecode;    
    }
    
    function getSequenceNumber(){
        $query = $this->db->query("SELECT * FROM pp_admin_play_details order by play_id desc LIMIT 1");
        $result = $query->result_array();
        return $result;
    }
       
    function getSequenceNumbercount($id){
        $q = "SELECT * FROM pp_shedule_play_details where shedule_id='$id'";
        $query = $this->db->query($q);
        if ($query->num_rows() == 0) {
            return 0;
        } else {
            return 1;
        } 
    }
    
     function getmusicNumber($id){
        $query = $this->db->query("SELECT * FROM pp_admin_audio_play_details where shedule_user_id='$id' ");
        if ($query->num_rows() == 0) {
            return 0;
        } else {
            return 1;
        } 
    }
    
    function get_record_where_by_order($tbl,$clm,$val,$orderBy){
        $query = $this->db->query("select * from $tbl where $clm = '$val' $orderBy");
        $result = $query->result_array();
        return $result;
    }
    
    function getGreaterData($i_start){
        $query = $this->db->query("select * from pp_shedule_play_details where sequence_number > '$i_start'");
        $result = $query->result_array();
        return $result;
    }
    
    function getGreaterDataForIntractive($i_start){
        $query = $this->db->query("select * from pp_admin_intractive_image_video_details where sequence_number > '$i_start'");
        $result = $query->result_array();
        return $result;
    }
    
    function getAndDate($from_time_f,$to_time_t){
//        echo $q = 'SELECT * FROM pp_admin_cost_template_details WHERE from_time <= "' . $from_time_f . '" AND to_time >= "' . $to_time_t . '"';
        $q = "SELECT * FROM pp_admin_cost_template_details WHERE from_time <> '$from_time_f' OR to_time <> '$to_time_t'";
        $query = $this->db->query($q);
        $result = $query->result_array();
        return $result;
    }
    
    function getAndDateValidation($tbl,$date, $from_time_f,$to_time_t,$shedule_id){
        //$q = 'SELECT * FROM ' . $tbl . ' WHERE shedule_id!='$shedule_id' AND shedule_date="' . $date . '" AND from_time >= "' . $from_time_f . '" AND to_time <= "' . $to_time_t . '"';
        $q = "SELECT * FROM  $tbl  WHERE shedule_id!='$shedule_id' AND shedule_date='$date' AND from_time <= '$from_time_f' AND to_time >= '$to_time_t'";
        $query = $this->db->query($q);
        $result = $query->result_array();
        return $result;
    }
    
    function getDateValidation($tbl,$date, $from_time_f,$to_time_t){        
       // echo $q = "SELECT * FROM  $tbl  WHERE shedule_date='$date' AND from_time >= '$from_time_f' AND to_time >= '$to_time_t'";
        $q = "SELECT * FROM  $tbl  WHERE shedule_date='$date'";
        $query = $this->db->query($q);
        $result = $query->result_array();
        return $result;
    }
    
    function get_and_and_and_record_where($tbl,$clm1,$val1,$clm2,$val2,$clm3,$val3,$clm4,$val4){
        $row = $this->db->get_where($tbl, array($clm1 => $val1,$clm2 => $val2,$clm3 => $val3,$clm4 => $val4))->result_array();
        return $row;
    }
    
    function checkData($tbl_name,$con){
        $q = "SELECT * FROM $tbl_name where $con";
        $query = $this->db->query($q);
        if ($query->num_rows() == 0) {
             return 0;
        } else {
             return 1;
        }
    } 
    
    function find_value_id($tbl_name,$fld_name,$unit_name,$fld_id,$id){
        $qry = "SELECT * FROM $tbl_name where $fld_name = '$unit_name' and $fld_id !='$id'";
        $query = $this->db->query($qry);  
        if ($query->num_rows() == 0) {
          return 0;
           } else {
         return 1;
        } 
    }
    
    
    function getlast_details($tbl){
        $q = $this->db->query('SELECT * FROM video_image_details_todisplay order by video_image_details_todisplay_id desc LIMIT 1');
        $query = $this->db->query($q);
        $result = $query->result_array();
        return $result;
    }
    
    function search_by($nameof,$tbln){
        $new_user= $this->db->query("SELECT * from $tbln where barcode LIKE '%$nameof%' ");
        $new_result= $new_user->result_array();
        return $new_result;
     }

    function search_coupon_code($nameof,$tbln,$field_name) {
        $new_use= $this->db->query("SELECT * from $tbln where $field_name LIKE '%$nameof%' ");
        $result= $new_use->result_array();
        return $result;
    }
    
    function customerCount($q){
        $new_use= $this->db->query($q);
        $result= $new_use->result_array();
        return $result;
    }
    
    function userId(){
        $q = "SELECT * FROM pp_user_reservation_details WHERE shedule_date=CURDATE() AND from_time <=CURTIME() AND to_time >=CURTIME()";
        $new_use= $this->db->query($q);
        $result= $new_use->result_array();
        return $result;
    }
    
    function getANDSequenceNumberCount($tbl,$cl1,$id1,$cl2,$id2){
        $q = "SELECT * FROM $tbl where $cl1='$id1' and $cl2 = '$id2'";
        $query = $this->db->query($q);
        if ($query->num_rows() == 0) {
            return 0;
        } else {
            return 1;
        } 
    }
    
    function get_search_result($search_text,$language_id){
        $q = "select * from yc_inner_link_details where language_id = '$language_id' and ((layout_one_title like '%$search_text%') or (layout_one_description like '%$search_text%') or (layout_two_title like '%$search_text%') or (layout_two_description like '%$search_text%') or (layout_three_title like '%$search_text%') or (layout_three_description like '%$search_text%'))";
        $new_use= $this->db->query($q);
        $result= $new_use->result_array();
        return $result;
    }
    
}
?>