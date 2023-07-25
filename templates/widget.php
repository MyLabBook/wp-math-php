<h1>Widgets Manager</h1>

1. Get list of CSV files from a directory and/or upload a CSV file
<br>
2. User chooses a CSV file to analyze
<br>
3. User chooses which math function to use for analysis (steps 2 and 3 can be interchanged)
<br>
4. According to the math function being used, then user designates which columns to use in math function 
<br>

<?php 

echo "<h1>Statistics Functions from File</h1>";

use MathPHP\Statistics\Average;

// Open file
$f1 = fopen("/var/www/plugmath/wp-content/uploads/math-functions/table1.csv", "r");

//Output lines until EOF is reached

$numbers = array();
$i = 0;

$row = 0;
while (! feof($f1)) {
    while (($data = fgetcsv($f1, null, ",")) != false)  {
        $num = count($data);
        //echo "<p> $num fields in line $row: <br /></p>\n";
        for ($c=0; $c < $num; $c++) {
            echo $data[$c] . "<br />";
            if ($c == 1) {
                $numbers[$row] = $data[$c];
                echo "numbers=" . $numbers[$row] . "<br>";
            }
        }
        $row++;
    }
}
  
fclose($f1);

// Mean, median, mode
$mean   = Average::mean($numbers);

echo "mean=" . $mean . "<br>";

$median = Average::median($numbers);

echo "median=" . $median . "<br>";

$mode   = Average::mode($numbers); // Returns an array — may be multimodal

echo "mode=" . $mode[0] . "<br>";

?>


