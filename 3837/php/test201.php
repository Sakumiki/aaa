<html>
<head>
<title>test201.php</title>
<link rel="stylesheet" type="text/css" href="../css/test_style.css">
</head>
<body>
<h1>第１章 Web-DB連携の動作確認</h1>
<h2>ブラウザからデータベース（DB）への接続確認</h2>
<hr />
<?php
$missing = 0;
if($_POST["frmName"]!='' and $_POST["frmGender"] !='' and $_POST["frmBirthMonth"]!='' and $_POST["frmBirthDate"]!='' and $_POST["frmBlood"]!='' and $_POST["frmTall"]!='' and $_POST["frmAtdnum"]){
$atdnum = $_POST["frmAtdnum"];
if($atdnum <= 10){
	$atdnum = "0".$atdnum;
}
$name      = $_POST["frmName"];
$gender    = $_POST["frmGender"];
$brthMonth = $_POST["frmBirthMonth"];
$brthDate  = $_POST["frmBirthDate"];
$blood     = $_POST["frmBlood"];
$tall      = $_POST["frmTall"];
$pet       = $_POST["frmPet"];
print("<h3>入力情報</h3>");
print("名前：".$name."<br>\n");
print("出席番号：".$atdnum."<br>\n");
print("性別：".$gender."<br>\n");
print("誕生月：".$brthMonth."<br>\n");
print("誕生日：".$brthDate."<br>\n");
print("血液型：".$blood."<br>\n");
print("身長：".$tall."<br>\n");
print("<h3>質問回答</h3>");
print("犬派？猫派？：".$pet."<br>\n");
$missing = 1;
}
//DB接続
$conn = pg_connect("dbname=db_3837 user=d33837 host=192.168.109.210");
//レコード存在確認
if($missing == 0){
	print("<h4>入力されていない項目があります</h4>\n");
	if($_POST["frmName"] =='')$missItem[0] = "名前";
	if($_POST["frmGender"] =='')$missItem[1] = "性別";
	if($_POST["frmBirthMonth"] =='')$missItem[2] = "誕生月";
	if($_POST["frmBirthDate"] =='')$missItem[3] = "誕生日";
	if($_POST["frmBlood"] =='')$missItem[4] = "血液型";
	if($_POST["frmTall"] =='')$missItem[5] = "身長";
	if($_POST["frmPet"] ='')$missItem[6] = "質問１";
	foreach($missItem as $outItems){
		print("<font color='red'>".$outItems."</font><br>\n");
	}
	print($_POST["frmGender"]);
	print("<a href='test200.php'>戻る</a>");
//レコード挿入・変更
}else{
	$exists = pg_query($conn,"select 出席番号 from tbl_data where 出席番号 ='d338$atdnum'");
	$exstRow = pg_numRows($exists);
	if($exstRow == 0){    //レコードがまだ無い場合
		$record = pg_query("insert into tbl_data values(
		'd338$atdnum',
		'$name',
		'$gender',
		'$brthMonth',
		'$brthDate',
		'$blood',
		'$tall',
		'$pet'
		);");
		print("<br>レコードを追加しました<br>\n");
	}else{                //レコードが既にある場合
		$record = pg_query("update tbl_data set 
		名前 = '$name',
		性別 = '$gender',
		誕生月 = $brthMonth,
		誕生日 = $brthDate,
		血液型 = '$blood',
		身長 = '$tall',
		q1 = '$pet'
		where 出席番号= 'd338$atdnum';
		");
		print("<br>レコードを更新しました<br>\n");
	}
//SQL発行
$result = pg_query("select * from tbl_data order by 出席番号 asc");
//SQLで取得した行と列
$cntRows = pg_numRows($result);
$cntFields = pg_numFields($result);

//テーブル出力
print("<table width='80%'>\n");
print("<caption> tbl_name </caption>\n");
print("<tr>\n");
for($k = 0;$k<$cntFields;$k++){
	print("<th>\n");	
	print(pg_fieldname($result,$k));
	print("</th>\n");
}
for($i = 0;$i < $cntRows;$i++){
	print("<tr>");
	for($j =0;$j < $cntFields;$j++){
		print("<td>");
		print(pg_result($result,$i,$j));
		print("</td>");
	}
	print("</tr>");
}
print("</table>");

pg_free_result($result);//テーブル切断
pg_close($conn);//データベース切断
}
?>
</body>
</html>