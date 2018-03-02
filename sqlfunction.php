<?php
  class SQLFunction{
 
      //insert���(���W��,��ư}�C)
      function insert($tableName,$array){
          header("Content-Type:text/html; charset=utf-8");
          
		  //�ޤJdbConfig���A���Y����hostname�Buser�Bpassword�Bdbname
		  require_once 'dbConfig.php';
		  
          //$mysqli�Q��ҤƬ��ݩ�mysqli_class��object
		  $mysqli = new mysqli(host, username, password, dbname);
         
		  // �ˬd�s�u
          if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
          }
		  
		  //�קK�X�{�ýX�A����(�X��)mysqli���󤤪�set_charset
          $mysqli->set_charset("utf8"); 
		  
		  //�����l��
		  $sql="";
		  
		  //led��ƪ�>>>��ư}�C�GID,light 1 ~ 8
		  if($tableName=="led"){
			$sql = "INSERT INTO ".$tableName." (id,light1, light2, light3,light4,light5,light6,light7,light8) VALUES (".$array[0].",".$array[1].",".$array[2].",".$array[3].",".$array[4].",".$array[5].",".$array[6].",".$array[7].",".$array[8].")";  
		  }
		  else if($tableName=="monitor"){
			$sql = "INSERT INTO ".$tableName." (id, slave, program) VALUES (".$array[0].",'".$array[1]."',".$array[2].")";
		  }
		  
		  //�ˬdSQL���O���e�O�_���T
          if($mysqli->query($sql)){
            $mysqli->close();
            return true;
          }else{
			echo("Error description: " . mysqli_error($mysqli));
            $mysqli->close();
            return false;
          }
      }

      //update���(���W��,���,�����,ID)
      function update($tableName,$columnName,$columnValue,$id){
          header("Content-Type:text/html; charset=utf-8");
          require_once 'dbConfig.php';
          $mysqli = new mysqli(host, username, password, dbname);  
          
		  // �ˬd�s�u
          if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
          }
		  
          $mysqli->set_charset("utf8");
		  
		  //�����l��
		  $sql="";
		  
		  if($tableName=="led"){
			
			$sql = "UPDATE " .$tableName. " SET ".$columnName."=".$columnValue." WHERE id= ".$id;
			
		  }else if($tableName=="monitor"){
			  
			$sql = "UPDATE " .$tableName. " SET ".$columnName."='".$columnValue."' WHERE id= ".$id;
			
		  }
		  
          //�ˬdSQL���O���e�O�_���T
		  if($mysqli->query($sql)){
            $mysqli->close();
            return true;
          }else{
			echo("Error description: " . mysqli_error($mysqli));
            $mysqli->close();
            return false;
          }
         
      }

      //del���(���W��,id)
      function del($tableName,$id){
          header("Content-Type:text/html; charset=utf-8");
          require_once 'dbConfig.php';
          $mysqli = new mysqli(host, username, password, dbname);  
          // �ˬd�s�u
          if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
          }
		  
          $mysqli->set_charset("utf8");
		  
          $sql = "DELETE FROM ".$tableName." WHERE id =".$id."";
          
		  if($mysqli->query($sql)){
            $mysqli->close();
            return true;
          }else{
			echo("Error description: " . mysqli_error($mysqli));
            $mysqli->close();
            return false;
          }       
      }
	  
	  //select���(���W��,���W��)
	  function select($tableName,$column){
          require_once 'dbConfig.php';
          $mysqli = new mysqli(host, username, password, dbname);  
          // �ˬd�s�u
          if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
          }
		  
          $mysqli->set_charset("utf8");
          
		  if($tableName=="led"){
			
			//�̾�ID�Ƨ�
			$sql = " SELECT " .$column. " FROM " .$tableName. " ORDER BY id ";
			
			if($result=$mysqli->query($sql)){
				$num=0;
				while ($row=mysqli_fetch_row($result)) {
					$ledLight[$num] = $row;
					$num++;
				}
				return $ledLight;
			}else{
				echo("Error description: " . mysqli_error($mysqli));
				$mysqli->close();
				return false;
			} 
		  }else if($tableName=="monitor"){
			  
			//�̾�ID�Ƨ�
			$sql = " SELECT " .$column. " FROM " .$tableName. " ORDER BY id ";
			
			if($result=$mysqli->query($sql)){
				
				while ($row=mysqli_fetch_row($result)) {
					
					printf ("%s : %s : %s",$row[0],$row[1],$row[2]);
					echo "<br>";
		
				}
			}else{
				echo("Error description: " . mysqli_error($mysqli));
				$mysqli->close();
				return false;
			}
		  }
      }
  }
?>