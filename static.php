
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

  <title>get select value</title>
</head>

<body>

	<div class = "container">
		<div class ="text-center">
			
<select name="number" id="number" onchange="print_value();">
<option value="">請選取</option>
</select>
 
		</div>
	</div>
 
<!-- 印出結果 -->
<div id="result">
	
</div>
 
 <script src="js/jquery-3.3.1.min.js"></script>
<script>

	$.ajax({
    url: 'http://120.119.72.53:8080/static.php',
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
  
  

	
  
 function print_value() {
	<!-- 將 select 的值在印出 -->
	var num = document.getElementById("number").value;
	$("#result").html('');
	$("#result").append("<tr>");
	for(i=1;i<=8;i++){
		if(res[num][i]=="1"){
			$("#result").append('<img src="https://tse2.mm.bing.net/th?id=OIP.R7ebTKLI1dEK5uWLzHxJrwHaHa&amp" width="105" height="100"/>');
		}else{
			$("#result").append('<img src="https://tse2.mm.bing.net/th?id=OIP.wtAXd9C6IMtdzCGQMcT89QHaHa&amp" width="105" height="105"/>');
		}
	}
	$("#result").append("</tr>");
	//$("#result").append(res[num][1]+res[num][2]+res[num][3]+res[num][4]+res[num][5]+res[num][6]+res[num][7]+res[num][8]);
	
}	
 
</script>

 
</body>
</html>