
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<style>
	
	.centerButton{
		width:150px;
		height:60px;
		font-size:25px
	}
	</style>
  <title>靜態網頁</title>
</head>

<body>
	
	<div class = "container">
		<div class="col-md-4"></div>
		<div class ="col-md-4  text-center">
			<select name="number" id="number" onchange="print_value();" class=" form-control">
				<option value="">請選取</option>
			</select>
			<br>
		</div>
		<div class="row col-md-4"></div>
		<!-- 印出結果 -->
		<div class="row col-md-12 text-center" id="result"></div>
	</div>
 
	<div class="container">
  			<div class = "text-center">
			<a href = "http://120.119.72.53:8080/home.html" class = "btn btn-info btn-lg centerButton">回到上頁</a>
	</div>
 
 <script src="js/jquery-3.3.1.min.js"></script>
<script>

	$.ajax({
    url: 'http://120.119.72.53:8080/static_json.php',
	dataType: "json",
    type: 'post',
	async: false,
    error: function(xhr) {
      alert('Ajax request 發生錯誤');
    },
    success: function(response) {
        //alert(response);
		for(i=0;i<response.length;i++){
			$("#number").append("<option value="+(i)+">"+response[i][0]+"</option>");
		}
		res = response;
    }
  });

  
  
 timer="";
function print_value() {
	<!-- 將 select 的值在印出 -->
	clearInterval(timer);
	var num = document.getElementById("number").value;
	$("#result").html('');
	$("#result").append("<tr>");
	
	
	{//parseInt將字串轉為數字,再將數字轉為2進制,在利用function將未滿8bit數字想左補0補滿到8bit
	
	{var x1 = parseInt(res[num][1]);
	var showX1 = x1.toString(2);	
	function padLeft(showX1){
		if(showX1.length>=8)	return showX1;
		else	return padLeft("0"+showX1);
	}}

	{var x2 = parseInt(res[num][2]);
	var showX2 = x2.toString(2);
	
	function padLeft(showX2){
		if(showX2.length>=8)	return showX2;
		else	return padLeft("0"+showX2);
	}}

	{var x3 = parseInt(res[num][3]);
	var showX3 = x3.toString(2);
	
	function padLeft(showX3){
		if(showX3.length>=3)	return showX3;
		else	return padLeft("0"+showX3);
}}
	
	{var x4 = parseInt(res[num][4]);
	var showX4 = x4.toString(2);
	
	function padLeft(showX4){
		if(showX4.length>=8)	return showX4;
		else	return padLeft("0"+showX4);
	}}
	
	{var x5 = parseInt(res[num][5]);
	var showX5 = x5.toString(2);
	
	function padLeft(showX5){
		if(showX5.length>=8)	return showX5;
		else	return padLeft("0"+showX5);
	}}
	
	{var x6 = parseInt(res[num][6]);
	var showX6 = x6.toString(2);
	
	function padLeft(showX6){
		if(showX6.length>=8)	return showX6;
		else	return padLeft("0"+showX6);
	}}
	
	{var x7 = parseInt(res[num][7]);
	var showX7 = x7.toString(2);
	
	function padLeft(showX7){
		if(showX7.length>=8)	return showX7;
		else	return padLeft("0"+showX7);
	}}
	
	{var x8 = parseInt(res[num][8]);
	var showX8 = x8.toString(2);
	
	function padLeft(showX8){
		if(showX8.length>=8)	return showX8;
		else	return padLeft("0"+showX8);
	}}	
	}	
	
	//將數字分割轉換回陣列
	var newArray1 = new Array();
	
	var newArray1 = padLeft(showX1).split("");

	var newArray2 = new Array();
	var newArray2 = padLeft(showX2).split("");
	
	var newArray3 = new Array();
	var newArray3 = padLeft(showX3).split("");
	
	var newArray4 = new Array();
	var newArray4 = padLeft(showX4).split("");
	
	var newArray5 = new Array();
	var newArray5 = padLeft(showX5).split("");
	
	var newArray6 = new Array();
	var newArray6 = padLeft(showX6).split("");
	
	var newArray7 = new Array();
	var newArray7 = padLeft(showX7).split("");

	var newArray8 = new Array();
	var newArray8 = padLeft(showX8).split("");

	
	
	//顯示出light1節目之亮法	
	for(i=0;i<8;i++){
		if(newArray1[i]=="1"){
		$("#result").append('<img src="https://tse2.mm.bing.net/th?id=OIP.R7ebTKLI1dEK5uWLzHxJrwHaHa&amp" style="width:10%;height:13%"/>');
		}else{
		$("#result").append('<img src="https://tse2.mm.bing.net/th?id=OIP.wtAXd9C6IMtdzCGQMcT89QHaHa&amp" style="width:10%;height:13%"/>');	
		}		
	}
	$("#result").append("</tr>");
	//setInterval(alert(),1000);

	changeNum=2;
	timer = setInterval(
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
			changeNum = changeNum==8?1:changeNum+1;
		},1000
	);
	//setTimeout("change(2)", 1000);
	//change(2);
	
	

	function myFunction(){
		document.getElementById("result").innerHTML= newArray2;
	}
}
</script>
 
</body>
</html>