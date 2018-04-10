<!DOCTYPE html>
<html>
<head>
<!-- <meta http-equiv="refresh" content="9"> -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<style>

	.arialFont{
		font-family:arial;
	}
	.centerButton{
		width:150px;
		height:60px;
		font-size:25px
	}
		
<title>動態網頁</title>
</style></head>

<body>
	<!--先設立每個檔案的ID-->
	<div class ="container">
		<div class = "text-center">
			<h3 class="arialFont" id="slave">Slave：</h3>
			<h3 class="arialFont" id="program">Program：</h3>
			<h3 class="arialFont" id="delay">Delay：</h3>
			<id = "monitor">
			<a href = "http://120.119.72.53:8080/home.html" class = "btn btn-info btn-lg centerButton">回到上頁</a>
		</div>
	</div>		
	<hr size="20" />
	
	<div class ="container">
		<div class="row col-md-12 text-center" id="result"></div>
	</div>	
		
	<script src="js/jquery-3.3.1.min.js"></script>
	<script>
		$.ajax({
			url: 'http://120.119.72.53:8080/monitor_slave_json.php',
			dataType: "json",
			type: 'post',
			async: false,
			error: function(xhr) {
			  alert('Ajax request 發生錯誤');
			},
			success: function(response) {
				resSlave = response;
				if(resSlave[4] == "1"){
					$("#slave").html('Slave：'+resSlave[1]);
					$("#program").html('Program：'+resSlave[2]);
					$("#delay").html('Delay：'+resSlave[3]+ 'S');
				}else{
					$("#slave").html('Slave：wait');
					$("#program").html('Program：');
					$("#delay").html('Delay：');
					$("#result").html('');
				}			
			}
		});

		$.ajax({
			url: 'http://120.119.72.53:8080/monitor_light_json.php',
			dataType: "json",
			type: 'post',
			async: false,
			error: function(xhr) {
			  alert('Ajax request 發生錯誤');
			},
			success: function(response) {
				resLight = response;
			}
		});
		$("#result").html('');
		timerSlave = "";
		timerLight = "";
		resArray();
//		firstChange();
		changeLightS(1);
/*		var changelight = resLight;
		if(changelight === resLight){
		break;} else if(changelight != resLight){
			
		}	*/
		
		//十轉二進制,往前補0補到8bit
		function resArray(){
					
			{var x1 = parseInt(resLight[0]);
				var showX1 = x1.toString(2);	
				function padLeft(showX1){
				if(showX1.length>=8)	return showX1;
				else	return padLeft("0"+showX1);
			}}

			{var x2 = parseInt(resLight[1]);
			var showX2 = x2.toString(2);
			
			function padLeft(showX2){
				if(showX2.length>=8)	return showX2;
				else	return padLeft("0"+showX2);
			}}

			{var x3 = parseInt(resLight[2]);
			var showX3 = x3.toString(2);
			
			function padLeft(showX3){
				if(showX3.length>=3)	return showX3;
				else	return padLeft("0"+showX3);
		}}
			
			{var x4 = parseInt(resLight[3]);
			var showX4 = x4.toString(2);
			
			function padLeft(showX4){
				if(showX4.length>=8)	return showX4;
				else	return padLeft("0"+showX4);
			}}
			
			{var x5 = parseInt(resLight[4]);
			var showX5 = x5.toString(2);
			
			function padLeft(showX5){
				if(showX5.length>=8)	return showX5;
				else	return padLeft("0"+showX5);
			}}
			
			{var x6 = parseInt(resLight[5]);
			var showX6 = x6.toString(2);
			
			function padLeft(showX6){
				if(showX6.length>=8)	return showX6;
				else	return padLeft("0"+showX6);
			}}
			
			{var x7 = parseInt(resLight[6]);
			var showX7 = x7.toString(2);
			
			function padLeft(showX7){
				if(showX7.length>=8)	return showX7;
				else	return padLeft("0"+showX7);
			}}
			
			{var x8 = parseInt(resLight[7]);
			var showX8 = x8.toString(2);
			
			function padLeft(showX8){
				if(showX8.length>=8)	return showX8;
				else	return padLeft("0"+showX8);
			}}	
				
			
			{//將數字分割轉換回陣列
			newArray1 = new Array();
			newArray1 = padLeft(showX1).split("");
			
			newArray2 = new Array();
			newArray2 = padLeft(showX2).split("");
			
			newArray3 = new Array();
			newArray3 = padLeft(showX3).split("");
			
			newArray4 = new Array();
			newArray4 = padLeft(showX4).split("");

			newArray5 = new Array();
			newArray5 = padLeft(showX5).split("");
			
			newArray6 = new Array();
			newArray6 = padLeft(showX6).split("");
			
			newArray7 = new Array();
			newArray7 = padLeft(showX7).split("");

			newArray8 = new Array();
			newArray8 = padLeft(showX8).split("");
				}
			}
		
		
		function firstChange(){
			$("#result").html('');
			$("#result").append("<tr>");
			for(i=0;i<8;i++){
				if(newArray1[i]=="1"){
				$("#result").append('<img src="https://tse2.mm.bing.net/th?id=OIP.R7ebTKLI1dEK5uWLzHxJrwHaHa&amp" style="width:10%;height:13%"/>');
				}else{
				$("#result").append('<img src="https://tse2.mm.bing.net/th?id=OIP.wtAXd9C6IMtdzCGQMcT89QHaHa&amp" style="width:10%;height:13%"/>');	
				}		
			}
			$("#result").append("</tr>");	
		}

	//設定Slave,Program,Delay以秒一次
	timerSlave = setInterval(
	
			function(){
				$.ajax({
			url: 'http://120.119.72.53:8080/monitor_slave_json.php',
			dataType: "json",
			type: 'post',
			async: false,
			error: function(xhr) {
			  alert('Ajax request 發生錯誤');
			},
			success: function(response) {
				resSlave = response;
			}
		});
		//如果每500毫秒取得的值為空值，則不更新頁面內容
				if(resSlave[4] == "1"){
					$("#slave").html('Slave：'+resSlave[1]);
					$("#program").html('Program：'+resSlave[2]);
					$("#delay").html('Delay：'+resSlave[3]+ 'S');
					
						//取得燈號資訊
					$.ajax({
						url: 'http://120.119.72.53:8080/monitor_light_json.php',
						dataType: "json",
						type: 'post',
						async: false,
						error: function(xhr) {
						alert('Ajax request 發生錯誤');
						},
						success: function(response) {
						//無法取得燈號則不動作
							if(response[0]!="false"){
								$("#result").show();
								r1=response;
								r2=resLight;
								//取得的燈號與現在的燈號不相等才執行更換燈號的動作,
									if(r1.toString() != r2.toString()){
										//console.log("response:"+response);
										resLight=[];
										resLight = response;
										//console.log("resLight:"+resLight);
										resArray();
										changeLightS(1);
									}
								}
							}
						});
					
					if(resSlave[1] == "0"){
						$("#slave").html('Slave：wait');
						$("#result").html('');
						$("#result").hide();
					}
					if(resSlave[2] == "0"){
						$("#slave").html('Slave：No Work');
						$("#program").html('Program：');
						$("#delay").html('Delay：');
						$("#result").html('');
						$("#result").hide();
					}		
				}else if(resSlave[4] =="0"){
					$("#result").html('');
					$("#slave").html('Slave：wait');
					$("#program").html('Program：');
					$("#delay").html('Delay：');
					//clearInterval(timerLight);
					$("#result").hide();
					if(resSlave[2] == "0"){
						$("#result").html('');
						$("#slave").html('Slave：Have to order on Master');
						$("#program").html('Program：');
						$("#delay").html('Delay：');
						}
					}
			},500
		);

		
		
/*	timerFlash = setInterval(
		function(){
			$("#result").html('');
			$.ajax({
			url: 'http://120.119.72.53:8080/monitor_light_json.php',
			dataType: "json",
			type: 'post',
			async: false,
			error: function(xhr) {
			  alert('Ajax request 發生錯誤');
			},
			success: function(response) {
				resLight = response;
			}
		});
				$("#result").append(resLight);
		},1000
		);
*/

		function changeLightS(num){
			//清除原先的指令
			//console.log("nowdely:"+parseInt(resSlave[3])*1000);
			//$("#result").html('');
			clearInterval(timerLight);
			changeNum=num;
			timerLight = setInterval(
				function(){
					$("#result").html('');
					$("#result").append("<tr>");
					for(i=0;i<8;i++){
					if(eval("newArray"+changeNum+"[i]=='1'")){
						$("#result").append('<img src="https://tse2.mm.bing.net/th?id=OIP.R7ebTKLI1dEK5uWLzHxJrwHaHa&amp" style="width:10%;height:13%"/>');
						}else{
						$("#result").append('<img src="https://tse2.mm.bing.net/th?id=OIP.wtAXd9C6IMtdzCGQMcT89QHaHa&amp" style="width:10%;height:13%"/>');	
						}		
					}
					
					$("#result").append("</tr>");
					//console.log("now:"+changeNum);
					//console.log("nowRes:"+eval("newArray"+changeNum));
					changeNum = changeNum==8?1:changeNum+1;
				},(parseInt(resSlave[3])*1000)
			);
		}
	

	
				
		<!-- 將 select 的值在印出 -->
		//var num = document.getElementById("number").value;
		//$("#result").html('');
		//$("#result").append(res[num][0]);    
	</script>

</body>

</html>
