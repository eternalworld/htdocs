<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<style>
	.redText{
		color:RED;
	}

	.bigTitle{
		font-size:40px;
	}

	.smallText{
		font-size:25px;
	}

	.arialFont{
		font-family:arial;
	}

	.chFont{
		font-family:標楷體;
	}

	.centerButton{
		width:300px;
		height:80px;
		font-size:40px
	}


</style></head>
<body onLoad="document.form1.id.focus()">
	<script language="javascript">
	<!--
	//確認有輸入帳號密碼，且輸入為英文與數字
	function chkinput()
	{
		var id=window.document.form1.id.value;
		re = /\W/;
		if(id=="")
		{
			alert("請輸入帳號!!");
			document.form1.id.focus();
			return false;
		}
		 else if(re.test(id))
		{
			alert("只允許輸入英文及數字");
			document.form1.id.focus();
			return false;
		}
	 
		var pwd=window.document.form1.password.value;
		re = /\W/;
		if(pwd=="")
		{
			alert("請輸入密碼!!");
			document.form1.password.focus();
			return false;
		}
		else if(re.test(pwd))
		{
			alert("只允許輸入英文及數字");
			document.form1.password.focus();
			return false;
		}return true;
	}
	-->
	</script>
<form name="form1" method="post" action="login/loginchk.php" onsubmit="return chkinput()">
	<div align="center">
		<div valign="center">
			<p class="bigTitle">使用者登入</p>
			<p class="smallText">帳號
			<input name="id" type="text" size="20">                
			<br>
			密碼
			<input name="password" type="password" size="20">
			<br>
			<input type="submit" name="Submit" value="送出">
			</p>
		</div>	
	</div>
</form>
</body>
</html>