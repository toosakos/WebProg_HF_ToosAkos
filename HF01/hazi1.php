<?php
print ("<span style='font-size: 20px; font-weight: bold'>1.Feladat</span><br>");
$lista = [5, '5', '05', 12.3, '16.7', 'five', 'true', 0xDECAFBAD, '10e200'];
for ($i = 0; $i < count($lista); $i++) {
    if (is_numeric($lista[$i])) {
        echo gettype($lista[$i]);
        echo ", Igen <br>";
    } else {
        echo gettype($lista[$i]);
        echo ", Nem <br>";
    }
}
print ("<span style='font-size: 20px; font-weight: bold'>2.Feladat</span><br>");
$second_to_hour = 3600;
$input = 1100;
$output = round($input/$second_to_hour,4);
if (gettype($input) == "integer") {
    print("<span style='font-size: 15px;'>{$input}seconds = {$output}hours</span><br>");
} else{
    echo "input is not integer","<br>";
}
print ("<span style='font-size: 20px; font-weight: bold'>3.Feladat</span><br>");
$num1 = 8;
$num2 = 2;
$add = $num1 + $num2;
$sub = $num1 - $num2;
$mul = $num1 * $num2;
$div = $num1 / $num2;
$exp = $num1 ** $num2;
print ("<span style='font-size: 15px;'>{$num1} + {$num2} = {$add}</span><br>");
print ("<span style='font-size: 15px;'>{$num1} - {$num2} = {$sub}</span><br>");
print ("<span style='font-size: 15px;'>{$num1} * {$num2} = {$mul}</span><br>");
print ("<span style='font-size: 15px;'>{$num1} / {$num2} = {$div}</span><br>");
print ("<span style='font-size: 15px;'>{$num1} ^ {$num2} = {$exp}</span><br>");
print ("<span style='font-size: 20px; font-weight: bold'>4.Feladat</span><br>");


echo "<table border='1'>";
for ($i = 1; $i <= 3; $i++) {
    echo "<tr>";
    for ($j = 1; $j <= 3; $j++) {
        if (($i + $j) % 2 == 0) {
            echo "<td style='background-color: white; width: 30px; height: 30px;'></td>";
        } else {
            echo "<td style='background-color: black; width: 30px; height: 30px;'></td>";
        }
    }
    echo "</tr>";
}
echo "</table>";

//$chess = <<<EOD
//
//|-----|-----|-----|
//|     |     |     |
//|-----|-----|-----|
//|     |     |     |
//|-----|-----|-----|
//|     |     |     |
//|-----|-----|-----|
//
//EOD;

//echo $chess;
print ("<span style='font-size: 20px; font-weight: bold'>5.Feladat</span><br>");
$number1 = 0;
$number2 = 0;
$operator = 'add';
print "<form action='#' method='post'>
<label id='num1'>1. Number: </label><input id='num1' type='number' name='num1' value='{$number1}'><br>
<label id='choose'>Operation:</label>
<select name='op' id='choose'>
  <option value='add'>Addition</option>
  <option value='sub'>Subtract</option>
  <option value='mul'>Multiply</option>
  <option value='div'>Division</option>
</select> <br>
<label id='num2'>2. Number: </label><input id='num2' type='number' name='num2' value='{$number2}'><br>
<input type='submit' name='submit' value='Get result'/>
</form> <br>";
if(isset($_POST['submit'])){
    $operator = $_POST['op'];
    $number1 = $_POST['num1'];
    $number2 = $_POST['num2'];
}
switch ($operator) {
    case 'add':
        $result = $number1 + $number2;
        break;
    default:
    case 'sub':
        $result = $number1 - $number2;
        break;
    case 'mul':
        $result = $number1 * $number2;
        break;
    case 'div':
        if ($number2 == 0){
            echo "Cannot divide by zero<br>";
            $result = 0;
        }
        else{
            $result = $number1 / $number2;
            break;
        }
}
print "<span>Result: $result</span><br>";
print ("<span style='font-size: 20px; font-weight: bold'>6.Feladat</span><br>");
$month = 'jan';
print "<form action='#' method='post'>
<label id='month'>Month:</label>
<select name='mon' id='month'>
  <option value='jan'>January</option>
  <option value='feb'>February</option>
  <option value='mar'>March</option>
  <option value='apr'>April</option>
  <option value='may'>May</option>
  <option value='jun'>June</option>
  <option value='jul'>July</option>
  <option value='aug'>August</option>
  <option value='sep'>September</option>
  <option value='oct'>October</option>
  <option value='nov'>November</option>
  <option value='dec'>December</option>
</select> <br>
<input type='submit' name='submit2' value='Get result'/>
</form> <br>";
if(isset($_POST['submit2'])){
    $month = $_POST['mon'];
}
$season = "";
switch ($month) {
    case 'jan':
        $season = "Winter";
        break;
    case 'feb':
        $season = "Winter";
        break;
    case 'dec':
        $season = "Winter";
        break;
    case 'mar';
        $season = "Spring";
        break;
    case 'apr';
        $season = "Spring";
        break;
    case 'may';
        $season = "Spring";
        break;
    case 'jun':
        $season = "Summer";
        break;
    case 'jul':
        $season = "Summer";
        break;
    case 'aug':
        $season = "Summer";
        break;
    case 'sep':
        $season = "Fall";
        break;
    case 'oct':
        $season = "Fall";
        break;
    case 'nov':
        $season = "Fall";
        break;
}
print "<span>Season: $season</span><br>";