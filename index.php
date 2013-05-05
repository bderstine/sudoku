<?php
function dbconnect() {
    $dbserver = 'localhost';
    $dbuser = 'root';
    $dbpass = 'password';
    $database = 'sudoku';
	$dbh = mysql_connect ($dbserver, $dbuser, $dbpass) or die ('I cannot connect to the database because: ' . mysql_error());
	mysql_select_db ($database);
}

dbconnect();
if(isset($_REQUEST['puzzleid'])){ $mypuzzle = $_REQUEST['puzzleid']; } else {
  $puzzles = array();
  $puzzleids="SELECT puzzleid FROM sudoku;";
  $puzzleidsres=mysql_query($puzzleids);
  $puzzleidsnum=mysql_num_rows($puzzleidsres);
  for($f=0;$f<$puzzleidsnum;$f++){
    $puzzlerow = mysql_fetch_object($puzzleidsres);
    $puzzles[] = $puzzlerow->puzzleid;
  }
  $mypuzzle = $puzzles[rand(0,(count($puzzles)-1))];
}

$getmypuzzle = "SELECT * FROM sudoku WHERE puzzleid='".$mypuzzle."';";
$getmypuzzleres = mysql_query($getmypuzzle);
$getmypuzzlerow = mysql_fetch_assoc($getmypuzzleres);

if(isset($_REQUEST['do']) && $_REQUEST['do']=="showanswer"){}
elseif(isset($_REQUEST['difficulty']) && $_REQUEST['difficulty']=="Medium"){
// Medium = 50 missing blocks
  for($h=0;$h<50;$h++){
    $randfield = rand(0,80);
	$getmypuzzlerow["A".$randfield]="";
  }
}
elseif(isset($_REQUEST['difficulty']) && $_REQUEST['difficulty']=="Hard"){
// Hard = 80 missing blocks
  for($h=0;$h<80;$h++){
    $randfield = rand(0,80);
	$getmypuzzlerow["A".$randfield]="";
  }
}
else{
// Easy = 26 missing blocks
  for($h=0;$h<26;$h++){
    $randfield = rand(0,80);
	$getmypuzzlerow["A".$randfield]="";
  }
}
?>

<style type="text/css">
* {
	padding: 0;
margin: 0;
}
body {
}
div.sudoku {
	text-align: center;
padding-top: 25px;
margin:0 auto;
width: 386px;
z-index: 100;
}
div.sudoku select {
}
div.sudoku input{
	margin-top: 10px;
padding: 0px;
}
table.sudoku {
	margin-top: 10px;
border-collapse: collapse;
border: solid black 3px;
background-color: white;
}
table.sudoku td input {
	border: none;
padding: 0;
margin: 0;
text-align: center;
font-size: 30px;
background-color: white;
}
table.sudoku td input.predef {
	color: black;
}
table.sudoku td.topleft {
	height: 60px;
width: 60px;
border-top: solid black 3px;
border-bottom: solid black 1px;
border-left: solid black 3px;
border-right: solid black 1px;
}
table.sudoku td.middleleft {
	height: 60px;
width: 60px;
border-top: solid black 1px;
border-bottom: solid black 1px;
border-left: solid black 3px;
border-right: solid black 1px;
}
table.sudoku td.bottomleft {
	height: 60px;
width: 60px;
border-top: solid black 1px;
border-bottom: solid black 3px;
border-left: solid black 3px;
border-right: solid black 1px;
}
table.sudoku td.topmiddle {
	height: 60px;
width: 60px;
border-top: solid black 3px;
border-bottom: solid black 1px;
border-left: solid black 1px;
border-right: solid black 1px;
}
table.sudoku td.middlemiddle {
	height: 60px;
width: 60px;
border-top: solid black 1px;
border-bottom: solid black 1px;
border-left: solid black 1px;
border-right: solid black 1px;
}
table.sudoku td.bottommiddle {
	height: 60px;
width: 60px;
border-top: solid black 1px;
border-bottom: solid black 3px;
border-left: solid black 1px;
border-right: solid black 1px;
}
table.sudoku td.topright {
	height: 60px;
width: 60px;
border-top: solid black 3px;
border-bottom: solid black 1px;
border-left: solid black 1px;
border-right: solid black 3px;
}
table.sudoku td.middleright {
	height: 60px;
width: 60px;
border-top: solid black 1px;
border-bottom: solid black 1px;
border-left: solid black 1px;
border-right: solid black 3px;
}
table.sudoku td.bottomright {
	height: 60px;
width: 60px;
border-right: solid black 3px;
border-bottom: solid black 3px;
}
</style>
<table width="100%" cellspacing="0" cellpadding="5">
  <tr>
    <td width="386" valign="top"><table class="sudoku">
      <tr class="top">
        <td class="topleft"><input name="text" type="text" value="<?php echo $getmypuzzlerow['A0']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="topmiddle"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A1']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="topright"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A2']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="topleft"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A3']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="topmiddle"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A4']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="topright"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A5']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="topleft"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A6']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="topmiddle"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A7']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="topright"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A8']; ?>" size="1" maxlength="1" readonly="true"/></td>
      </tr>
      <tr class="middle">
        <td class="middleleft"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A9']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="middlemiddle"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A10']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="middleright"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A11']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="middleleft"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A12']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="middlemiddle"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A13']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="middleright"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A14']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="middleleft"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A15']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="middlemiddle"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A16']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="middleright"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A17']; ?>" size="1" maxlength="1" readonly="true"/></td>
      </tr>
      <tr class="bottom">
        <td class="bottomleft"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A18']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="bottommiddle"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A19']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="bottomright"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A20']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="bottomleft"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A21']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="bottommiddle"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A22']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="bottomright"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A23']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="bottomleft"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A24']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="bottommiddle"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A25']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="bottomright"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A26']; ?>" size="1" maxlength="1" readonly="true"/></td>
      </tr>
      <tr class="top">
        <td class="topleft"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A27']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="topmiddle"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A28']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="topright"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A29']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="topleft"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A30']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="topmiddle"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A31']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="topright"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A32']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="topleft"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A33']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="topmiddle"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A34']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="topright"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A35']; ?>" size="1" maxlength="1" readonly="true"/></td>
      </tr>
      <tr class="middle">
        <td class="middleleft"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A36']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="middlemiddle"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A37']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="middleright"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A38']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="middleleft"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A39']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="middlemiddle"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A40']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="middleright"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A41']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="middleleft"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A42']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="middlemiddle"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A43']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="middleright"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A44']; ?>" size="1" maxlength="1" readonly="true"/></td>
      </tr>
      <tr class="bottom">
        <td class="bottomleft"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A45']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="bottommiddle"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A46']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="bottomright"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A47']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="bottomleft"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A48']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="bottommiddle"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A49']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="bottomright"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A50']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="bottomleft"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A51']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="bottommiddle"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A52']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="bottomright"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A53']; ?>" size="1" maxlength="1" readonly="true"/></td>
      </tr>
      <tr class="top">
        <td class="topleft"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A54']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="topmiddle"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A55']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="topright"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A56']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="topleft"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A57']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="topmiddle"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A58']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="topright"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A59']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="topleft"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A60']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="topmiddle"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A61']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="topright"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A62']; ?>" size="1" maxlength="1" readonly="true"/></td>
      </tr>
      <tr class="middle">
        <td class="middleleft"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A63']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="middlemiddle"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A64']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="middleright"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A65']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="middleleft"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A66']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="middlemiddle"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A67']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="middleright"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A68']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="middleleft"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A69']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="middlemiddle"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A70']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="middleright"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A71']; ?>" size="1" maxlength="1" readonly="true"/></td>
      </tr>
      <tr class="bottom">
        <td class="bottomleft"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A72']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="bottommiddle"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A73']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="bottomright"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A74']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="bottomleft"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A75']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="bottommiddle"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A76']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="bottomright"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A77']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="bottomleft"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A78']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="bottommiddle"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A79']; ?>" size="1" maxlength="1" readonly="true"/></td>
        <td class="bottomright"><input name="text2" type="text" value="<?php echo $getmypuzzlerow['A80']; ?>" size="1" maxlength="1" readonly="true"/></td>
      </tr>
    </table></td>
    <td valign="top" style="padding: 10px;">
	<form id="form1" name="form1" method="get" action="">

      <p id="puzzleid"><h2>Bizzar Sudoku</h2>
	Puzzle ID = <?php echo $mypuzzle; ?></p>
      <p>
        <input name="difficulty" type="submit" id="difficulty1" value="Easy" />
        <input name="difficulty" type="submit" id="difficulty2" value="Medium" />
        <input name="difficulty" type="submit" id="difficulty3" value="Hard" />
        </p>
	</form>
	<br />
	<input type="button" value="Print" id="printbutton" onclick="javascript:printPuzzle();">
	<input type="button" value="Show Answer" id="answerbutton" onclick="javascript:showanswer();">
        <br><br>
	Currently <?php echo $puzzleidsnum; ?> Puzzles | <a href='sudoku-generator.php'>Generate More!</a>
<br><br>
<?php include("inc_googleads.php"); ?>
    </td>
  </tr>
</table>
<script>
function printPuzzle() {
  document.getElementById("printbutton").style.visibility = "hidden";
  document.getElementById("answerbutton").style.visibility = "hidden";
  document.getElementById("difficulty1").style.visibility = "hidden";
  document.getElementById("difficulty2").style.visibility = "hidden";
  document.getElementById("difficulty3").style.visibility = "hidden";
  self.print();
  window.setTimeout("document.getElementById(\"printbutton\").style.visibility = \"visible\";document.getElementById(\"answerbutton\").style.visibility = \"visible\";document.getElementById(\"difficulty1\").style.visibility = \"visible\";document.getElementById(\"difficulty2\").style.visibility = \"visible\";document.getElementById(\"difficulty3\").style.visibility = \"visible\"", 4000);
}

function showanswer() {
  window.location="index.php?do=showanswer&puzzleid=<?php echo $mypuzzle; ?>"
}
</script>
