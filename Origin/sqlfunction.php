<?php
  class MemberFunction{
 
      //add函數(名子,帳號,密碼,權限)
      function add($tableName,$array){
          header("Content-Type:text/html; charset=utf-8");
          
		  require_once 'dbConfig.php';
          //$mysqli被實例化為屬於mysqli_class的object
		  $mysqli = new mysqli(host, username, password, dbname);
          
		  //檢查連線
		  //調用mysqli_class成員變數：connect_errno
          if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
          }
		  
		  //避免出現亂碼，取用mysqli物件中的set_charset
          $mysqli->set_charset("utf8"); 
		  
		  //物件初始化
		  $sql="";
		  
		  //判斷tableName為哪一張表單，根據不同表單做出不同動作
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

      //update函數(更改項目,內容,資料key)
      function update($set_item,$set_content,$set_key){
          header("Content-Type:text/html; charset=utf-8");
          require_once 'dbConfig.php';
          $mysqli = new mysqli(host, username, password, dbname);  
          // 檢查連線
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

      //del函數(資料key)
      function del($del_key){
          header("Content-Type:text/html; charset=utf-8");
          require_once 'dbConfig.php';
          $mysqli = new mysqli(host, username, password, dbname);  
          // 檢查連線
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
          // 檢查連線
          if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
          }
          $mysqli->set_charset("utf8");
          $sql = "SELECT member_key,member_name,member_id,member_level FROM member ORDER BY member_key";
          //每筆資料以,連接　$ree[0]="member_key,member_name,member_id,member_level"
          if($result=$mysqli->query($sql)){
			
			//返回值遞增變數
			$num = 0;
			
			//返回陣列初始化
			$returnArray = array();
			
			//fetch_row：一行一行以陣列形式存取
            while ($row=mysqli_fetch_row($result)) {
			
			  //將fetch_row陣列塞進去返回陣列
              $returnArray[$num] = $row;
			  $num++;
            }
          }
          $mysqli->close();
          return $returnArray;
      }

  }
?>