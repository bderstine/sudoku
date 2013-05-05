<?php
function dbconnect() {
    $dbserver = 'localhost';
    $dbuser = 'root';
    $dbpass = 'password';
    $database = 'sudoku';
	$dbh = mysql_connect ($dbserver, $dbuser, $dbpass) or die ('I cannot connect to the database because: ' . mysql_error());
	mysql_select_db ($database);
}

function F15117b28($V3d6885a0)
{

  if($V3d6885a0 != 4){ $Vf7bd60b7 = 3; }
  else{ $Vf7bd60b7 = 5; }

  $Vee5c35ce = range(1, pow($Vf7bd60b7, 2));
  shuffle($Vee5c35ce);

  $V9dd4e461 = 1;
  for($V865c0c0b = 1; $V865c0c0b <= pow($Vf7bd60b7, 2); $V865c0c0b++){
    $V0cc175b9 = "rowIndex_" . $V865c0c0b;
   for($V7e98b8a1 = 1; $V7e98b8a1 <= pow($Vf7bd60b7, 2); $V7e98b8a1++){
   ${$V0cc175b9}[$V7e98b8a1] = $V9dd4e461;
 $V9dd4e461 = $V9dd4e461 + 1;
}
$V57167b11[$V865c0c0b] = $$V0cc175b9;
 }
$V3d801aa5 = array_chunk($V57167b11, $Vf7bd60b7, true);
foreach($V3d801aa5 as $V3c6e0b8a => $V831ebb31){
 $V0cc175b9 = "arrRow_" . $V3c6e0b8a;
 $$V0cc175b9 = $V831ebb31;
 $Vb14c29b6[$V3c6e0b8a] = $$V0cc175b9;
 }

 for($V865c0c0b = 1; $V865c0c0b <= pow($Vf7bd60b7, 2); $V865c0c0b++){
 $V0cc175b9 = "colIndex_" . $V865c0c0b;
 $V9dd4e461 = $V865c0c0b;
for($V7e98b8a1 = 1; $V7e98b8a1 <= pow($Vf7bd60b7, 2); $V7e98b8a1++){
 ${$V0cc175b9}[$V7e98b8a1] = $V9dd4e461;
 $V9dd4e461 = $V9dd4e461 + pow($Vf7bd60b7, 2);
}
$V487d6fe1[$V865c0c0b] = $$V0cc175b9;
 }
$V3d801aa5 = array_chunk($V487d6fe1, $Vf7bd60b7, true);
foreach($V3d801aa5 as $V3c6e0b8a => $Vb0b2ab8c){
 $V0cc175b9 = "arrCol_" . $V3c6e0b8a;
 $$V0cc175b9 = $Vb0b2ab8c;
 $V593ba649[$V3c6e0b8a] = $$V0cc175b9;
 }

 $V9dd4e461 = 1;
$V41529076 = 1;
for($V865c0c0b = 1; $V865c0c0b <= $Vf7bd60b7; $V865c0c0b++){
 for($V7e98b8a1 = 1; $V7e98b8a1 <= $Vf7bd60b7; $V7e98b8a1++){
 $V0cc175b9 = "blockIndex_" . $V9dd4e461;
 $Vfbade9e3 = 1;
for($V36347412 = 1; $V36347412 <= $Vf7bd60b7; $V36347412++){
 for($Vf0b53b2d = 1; $Vf0b53b2d <= $Vf7bd60b7; $Vf0b53b2d++){
 ${$V0cc175b9}[$Vfbade9e3++] = $V41529076;
 $V41529076 = $V41529076 + 1;
}
$V41529076 = $V41529076 + ((pow($Vf7bd60b7, 2)) - ($Vf7bd60b7));
}
$Vbd1bb7fe[$V9dd4e461] = $$V0cc175b9;
 $V9dd4e461 = $V9dd4e461 + 1;
}
$V41529076 = ($V865c0c0b * $Vf7bd60b7) + 1;
}

 for($V865c0c0b = 1; $V865c0c0b <= pow($Vf7bd60b7, 2); $V865c0c0b++){
 foreach($Vbd1bb7fe as $V14511f2f){
 $V3d801aa5 = $Vee5c35ce;
foreach($V14511f2f as $V6a992d55){
 $V8d777f38[$V6a992d55] = array_shift($V3d801aa5);
}
$Vc96dbf3e = array_shift($Vee5c35ce);
$Vee5c35ce = array_pad($Vee5c35ce, pow($Vf7bd60b7, 2), $Vc96dbf3e);
}
}
ksort($V8d777f38);

 for($V865c0c0b = 0; $V865c0c0b <= $Vf7bd60b7 - 2; $V865c0c0b++){
 foreach($Vb14c29b6 as $Vfebde7e9){
 shuffle($Vfebde7e9);
$Vfebde7e9 = array_slice($Vfebde7e9, 0, 2);
 foreach($Vfebde7e9 as $V3c6e0b8a => $Vf1965a85){
 foreach($Vf1965a85 as $Vf3c433cd => $V6a992d55){
 if($V3c6e0b8a == 0){
 $V6373c2b9[$Vf3c433cd] = $V8d777f38[$V6a992d55];
}else{
 $V09417486[$Vf3c433cd] = $V8d777f38[$V6a992d55];
}
}
}
foreach($Vfebde7e9 as $V3c6e0b8a => $Vf1965a85){
 foreach($Vf1965a85 as $Vf3c433cd => $V6a992d55){
 if($V3c6e0b8a == 0){
 $V8d777f38[$V6a992d55] = $V09417486[$Vf3c433cd];
}else{
 $V8d777f38[$V6a992d55] = $V6373c2b9[$Vf3c433cd];
}
}
}
}
}

 for($V865c0c0b = 0; $V865c0c0b <= $Vf7bd60b7 - 2; $V865c0c0b++){
 foreach($V593ba649 as $V8e7da353){
 shuffle($V8e7da353);
$V8e7da353 = array_slice($V8e7da353, 0, 2);
 foreach($V8e7da353 as $V3c6e0b8a => $Vd89e2ddb){
 foreach($Vd89e2ddb as $Vcceddb40 => $V6a992d55){
 if($V3c6e0b8a == 0){
 $V6ae103b0[$Vcceddb40] = $V8d777f38[$V6a992d55];
}else{
 $V80fee2e0[$Vcceddb40] = $V8d777f38[$V6a992d55];
}
}
}
foreach($V8e7da353 as $V3c6e0b8a => $Vd89e2ddb){
 foreach($Vd89e2ddb as $Vcceddb40 => $V6a992d55){
 if($V3c6e0b8a == 0){
 $V8d777f38[$V6a992d55] = $V80fee2e0[$Vcceddb40];
}else{
 $V8d777f38[$V6a992d55] = $V6ae103b0[$Vcceddb40];
}
}
}
}
}
$V550237b8 = implode(",", $V8d777f38);

 if($V3d6885a0 == 1){
 $Ve0c6dcf8 = 16;
}elseif($V3d6885a0 == 2){
 $Ve0c6dcf8 = 22;
}elseif($V3d6885a0 == 3){
 $Ve0c6dcf8 = 30;
}else{
 $Ve0c6dcf8 = 170;
}
for($V865c0c0b = 1; $V865c0c0b <= $Ve0c6dcf8; $V865c0c0b++){
 do{
 $V5cc95020 = rand(1, pow($Vf7bd60b7, 4));
}while($V5cc95020 == (((pow($Vf7bd60b7, 4) - 1) / 2) + 1));
//$V8d777f38[$V5cc95020] = '';
$V20955cb6 = (pow($Vf7bd60b7, 4) + 1) - $V5cc95020;
//$V8d777f38[$V20955cb6] = '';
}

$V2d8aa42a = implode(",", $V8d777f38);
$V7d69533a = split(",", $V2d8aa42a);

// Added by Brad to dump into database
  dbconnect();
  $addsudoku = "INSERT INTO sudoku SET ";
  for($p=0;$p<81;$p++){
    $addsudoku .= "A".$p."='".$V7d69533a[$p];
    if($p==80){ $addsudoku.="';"; } else { $addsudoku.="', "; }
  }
  $addsudokures = mysql_query($addsudoku);
}

if(isset($_REQUEST['number']) && $_REQUEST['number']<101){
  for($n=0;$n<$_REQUEST['number'];$n++){
    F15117b28(1);
  }
  echo "DONE GENERATING ".$_REQUEST['number']." PUZZLES!!<br><br>";

  echo "<a href='index.php'>Click here to continue!</a><br><br>";
} elseif(isset($_REQUEST['number']) && $_REQUEST['number']>100) { 
  echo "I'm currently limiting updates to 100 puzzles, but the script will handle pretty much anything!"; 
}
?>

<form id="form1" name="form1" method="get" action="sudoku-generator.php">
Number to generate -- 
<input name="number" type="number" id="number" />
<label>
<input type="submit" name="Submit" value="Submit" />
</label>
</form>
