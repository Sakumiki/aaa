<html>
<head>
<title>test200.php</title>
<link rel="stylesheet" type="text/css" href="../css/test_style.css">
</head>
<body>
<h1>第１章 Web-DB連携の動作確認</h1>
<h2>ブラウザからデータベース（DB）への接続確認</h2>
<hr />
<form method="post" action="test201.php">
<h3>基本情報</h3>
<!--出席番号-->
<span class="question">出席番号</span>：<select name="frmAtdnum" size="1">
<script>
for(var i = 1;i<=39;i++){
	document.write('<option value="'+i+'">'+i+'</option>\n');
}
</script>
</select><br>
 <!--名前-->
<span class="question">名前</span>：
<input type="text" placeholder="漢字で名前を入力してください" name="frmName"><br>
 <!--性別-->
<span class="question">性別</span>：
<input type="radio" id="male" name="frmGender" value="男">
<label for="male">男性</label>
<input type="radio" id="female" name="frmGender" value="女">
<label for="female">女性</label><br>
<input type="radio" name="frmGender"value="" checked="checked" style="display:none;" />
<!--誕生月-->
<span class="question">誕生日</span>：
<select name="frmBirthMonth">
<option value=""> </option>;
<script>
for(var i = 1;i<=12;i++){
	document.write("<option value='"+i+"'>"+i+"</option>");
}
</script>
</select>月
<!--誕生日-->
<select name="frmBirthDate">
<option value=""> </option>;
<script>
for(var i = 1;i<=31;i++){
	document.write("<option value='"+i+"'>"+i+"</option>");
}
</script>
</select>日<br>
<!--血液型-->
<span class="question">血液型</span>：
<select name="frmBlood">
<option value=""> </option>;
<option value="A">A</option>
<option value="B">B</option>
<option value="O">O</option>
<option value="AB">AB</option>
</select><br>
<!--身長-->
<span class="question">身長</span>：
<select name="frmTall">
<option value=""></option>;
<script>
var tallMax = 130;
var i= 0;
var val=new Array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S");
document.write('<option value="'+val[i]+'">～'+tallMax+'CM</option>');
while(tallMax <=210){
	tallMax= tallMax+5;
	i= i+1;
	var tallMin=tallMax-4;
	document.write('<option value="'+val[i]+'">'+tallMin+'～'+tallMax+'CM</option>');
}
document.write('<option value="'+val[i+1]+'">'+tallMax+'CM～</option>');
</script>
</select><br>
<h3>質問</h3>
<span class="question">犬派？猫派？</span>：
<input type="radio" id="dog" name="frmPet" value="犬">
<label for="dog">犬</label>
<input type="radio" id="cat" name="frmPet" value="猫">
<label for="cat">猫</label><br>

<span class="question">利き手</span>：
<input type="radio" id="rightHand" name="frmHand" value="犬">
<label for="rightHand">右利き</label>
<input type="radio" id="leftHand" name="frmHand" value="猫">
<label for="leftHand">左利き</label><br>
<input type="radio" name="frmHand"value="" checked="checked" style="display:none;" />

<input type="submit" value="SEND"><input type="reset" value="CLEAR">
</form>




<?php
//DB接続
$conn = pg_connect("dbname=db_3837 user=d33837 host=192.168.109.210");

//SQL発行
$result = pg_query("select * from tbl_data");

//SQLで取得した行と列
$cntRows = pg_numRows($result);
$cntFields = pg_numFields($result);

pg_free_result($result);//テーブル切断
pg_close($conn);//データベース切断
?>
</body>
</html>