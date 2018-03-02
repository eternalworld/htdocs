<?php
  class MemberFunction{
 
      //add���(�W�l,�b��,�K�X,�v��)
      function add($tableName,$array){
          header("Content-Type:text/html; charset=utf-8");
          
		  require_once 'dbConfig.php';
          //$mysqli�Q��ҤƬ��ݩ�mysqli_class��object
		  $mysqli = new mysqli(host, username, password, dbname);
          
		  //�ˬd�s�u
		  //�ե�mysqli_class�����ܼơGconnect_errno
          if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
          }
		  
		  //�קK�X�{�ýX�A����mysqli���󤤪�set_charset
          $mysqli->set_charset("utf8"); 
		  
		  //�����l��
		  $sql="";
		  
		  //�P�_tableName�����@�i���A�ھڤ��P��氵�X���P�ʧ@
		  if($tableName=="myguests"){
			$sql = "INSERT INTO ".$tableName." (id, firstname, lastname, email, reg_date) VALUES (null,'".$array[0]."','".$array[1]."',".$array[2].",null)";
		  }else if ($tableName=="persons"){
			$sql = "INSERT INTO ".$tableName." (Firstname, Lastname, Age) VALUES ('".$array[0]."','".$array[1]."',".$array[2].")";
		  }
		  
		  
          if($mysqli->query($sql)){
            $mysqli->close();
            return true;
          }else{
            $mysql->close();
            return false;
          }
      }

      //update���(��ﶵ��,���e,���key)
      function update($set_item,$set_content,$set_key){
          header("Content-Type:text/html; charset=utf-8");
          require_once 'dbConfig.php';
          $mysqli = new mysqli(host, username, password, dbname);  
          // �ˬd�s�u
          if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
          }
          $mysqli->set_charset("utf8");
          $sql = "UPDATE member SET ".$set_item."='".$set_content."' WHERE member_key=".$set_key.""; 
          if($mysqli->query($sql)){
            $mysqli->close();
            return true;
          }else{
            $mysqli->close();
            return false;
          }
         
      }

      //del���(���key)
      function del($del_key){
          header("Content-Type:text/html; charset=utf-8");
          require_once 'dbConfig.php';
          $mysqli = new mysqli(host, username, password, dbname);  
          // �ˬd�s�u
          if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
          }
          $mysqli->set_charset("utf8");
          $sql = "DELETE FROM member WHERE member_key=".$del_key."";
          if($mysqli->query($sql)){
            $mysqli->close();
            return true;
          }else{
            $mysqli->close();
            return false;
          }       
      }
	  
	  function select(){
          require_once 'dbConfig.php';
          $mysqli = new mysqli(host, username, password, dbname);  
          // �ˬd�s�u
          if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
          }
          $mysqli->set_charset("utf8");
          $sql = "SELECT member_key,member_name,member_id,member_level FROM member ORDER BY member_key";
          //�C����ƥH,�s���@$ree[0]="member_key,member_name,member_id,member_level"
          if($result=$mysqli->query($sql)){
			
			//��^�Ȼ��W�ܼ�
			$num = 0;
			
			//��^�}�C��l��
			$returnArray = array();
			
			//fetch_row�G�@��@��H�}�C�Φ��s��
            while ($row=mysqli_fetch_row($result)) {
			
			  //�Nfetch_row�}�C��i�h��^�}�C
              $returnArray[$num] = $row;
			  $num++;
            }
          }
          $mysqli->close();
          return $returnArray;
      }

  }
?>