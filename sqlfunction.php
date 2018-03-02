<?php
  class SQLFunction{
 
      //insert函數(表單名稱,資料陣列)
      function insert($tableName,$array){
          header("Content-Type:text/html; charset=utf-8");
          
		  //引入dbConfig文件，裏頭紀錄hostname、user、password、dbname
		  require_once 'dbConfig.php';
		  
          //$mysqli被實例化為屬於mysqli_class的object
		  $mysqli = new mysqli(host, username, password, dbname);
         
		  // 檢查連線
          if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
          }
		  
		  //避免出現亂碼，取用(訪問)mysqli物件中的set_charset
          $mysqli->set_charset("utf8"); 
		  
		  //物件初始化
		  $sql="";
		  
		  //led資料表>>>資料陣列：ID,light 1 ~ 8
		  if($tableName=="led"){
			$sql = "INSERT INTO ".$tableName." (id,light1, light2, light3,light4,light5,light6,light7,light8) VALUES (".$array[0].",".$array[1].",".$array[2].",".$array[3].",".$array[4].",".$array[5].",".$array[6].",".$array[7].",".$array[8].")";  
		  }
		  else if($tableName=="monitor"){
			$sql = "INSERT INTO ".$tableName." (id, slave, program) VALUES (".$array[0].",'".$array[1]."',".$array[2].")";
		  }
		  
		  //檢查SQL指令內容是否正確
          if($mysqli->query($sql)){
            $mysqli->close();
            return true;
          }else{
			echo("Error description: " . mysqli_error($mysqli));
            $mysqli->close();
            return false;
          }
      }

      //update函數(表單名稱,欄位,欄位資料,ID)
      function update($tableName,$columnName,$columnValue,$id){
          header("Content-Type:text/html; charset=utf-8");
          require_once 'dbConfig.php';
          $mysqli = new mysqli(host, username, password, dbname);  
          
		  // 檢查連線
          if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
          }
		  
          $mysqli->set_charset("utf8");
		  
		  //物件初始化
		  $sql="";
		  
		  if($tableName=="led"){
			
			$sql = "UPDATE " .$tableName. " SET ".$columnName."=".$columnValue." WHERE id= ".$id;
			
		  }else if($tableName=="monitor"){
			  
			$sql = "UPDATE " .$tableName. " SET ".$columnName."='".$columnValue."' WHERE id= ".$id;
			
		  }
		  
          //檢查SQL指令內容是否正確
		  if($mysqli->query($sql)){
            $mysqli->close();
            return true;
          }else{
			echo("Error description: " . mysqli_error($mysqli));
            $mysqli->close();
            return false;
          }
         
      }

      //del函數(表單名稱,id)
      function del($tableName,$id){
          header("Content-Type:text/html; charset=utf-8");
          require_once 'dbConfig.php';
          $mysqli = new mysqli(host, username, password, dbname);  
          // 檢查連線
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
	  
	  //select函數(表單名稱,欄位名稱)
	  function select($tableName,$column){
          require_once 'dbConfig.php';
          $mysqli = new mysqli(host, username, password, dbname);  
          // 檢查連線
          if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
          }
		  
          $mysqli->set_charset("utf8");
          
		  if($tableName=="led"){
			
			//依據ID排序
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
			  
			//依據ID排序
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