<?php 
//Challenge 12 - Martin Monev
?>

<h1>Part 1</h1>
<h4>Function 1.</h6>

<?php

function decToBinary($decimal) {
    if ($decimal === 0) {
      return '0';
    }
  
    $binary = '';
  
    while ($decimal > 0) {
      $binary = ($decimal % 2) . $binary;
      $decimal = ($decimal - $decimal % 2) / 2;
    }
  
    return $binary;
  }

  $binary = 2023;
  echo decToBinary($binary);

?>

<h4>Function 2.</h6>

<?php

function decToRoman($decimal) {

    if ($decimal < 1 || $decimal > 3999) {
      return 'Error: Number should be between 1 and 3999.';
    }
  
    $romanNum = array( 'M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL'=> 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
  
    $roman = '';
  
    foreach ($romanNum as $romanSymbol => $value) {
      while ($decimal >= $value) {
        $roman .= $romanSymbol;
        $decimal -= $value;
      }
    }
  
    return $roman;
  }

$roman = 2023;
echo decToRoman($roman);

?>

<hr>


<h1>Part 2</h1>
<h4>Function 3.</h6>

<?php

function binaryToDec($binary) {
    return bindec($binary);
  }

  $binary = 11111100111;
  echo binaryToDec($binary);

?>
<h4>Function 3.</h6>

<?php

function romanToDeci($roman)
{
    $romanNumbers = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
    
    $decimal = 0;
    
    foreach ($romanNumbers as $key => $value) {
        while (strpos($roman, $key) === 0) {
            $decimal += $value;
            $roman = substr($roman, strlen($key));
        }
    }
    
    return $decimal;
}

echo romanToDeci('MMXXIII');

?>

<hr>
<h1>Part 3</h1>

<?php

function checkNumberType($number) {
    if (preg_match('/^[01]+$/', $number)) {
        return 'binary';
    }

    if (preg_match('/^[+-]?[1-9][0-9]*$/', $number)) {

        if (preg_match('/^[+-]?0[0-9]+$/', $number)) {
            return 'Error';
        }

        return 'decimal';
    }

    if (preg_match('/^[IVXLCDM]+$/', $number)) {

        $decimal = romanToDecimal($number);
        if ($decimal > 3999999) {
            return 'Error';
        }

        return 'roman';
    }

    return 'Error';
}

function decimalToRoman($number) {
    $num = array(1000 => 'M', 900 => 'CM', 500 => 'D', 400 => 'CD', 100 => 'C', 90 => 'XC', 50 => 'L', 40 => 'XL', 10 => 'X', 9 => 'IX', 5 => 'V', 4 => 'IV', 1 => 'I');

    $result = '';
    foreach ($num as $value => $numer) {
        while ($number >= $value) {
            $result .= $numer;
            $number -= $value;
        }
    }

    return $result;
}

function romanToDecimal($number) {
    $num = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);

    $result = 0;
    for ($i = 0; $i < strlen($number); $i++) {
        $current = $num[$number[$i]];
        $next = isset($number[$i+1]) ? $num[$number[$i+1]] : 0;
        if ($next > $current) {
            $result += $next - $current;
            $i++;
        } else {
            $result += $current;
        }
    }

    return $result;
}

$numbers = array('-685', '2000', 'XXIV', '-2094', '011001', 'II', '+500', '-100', '0101010', 'MMXXIII');

foreach ($numbers as $number) {
    echo 'Number: ' . $number . '<br>';

    $type = checkNumberType($number);

    if ($type == 'binary') {
        $decimal = bindec($number);
        $roman = decimalToRoman($decimal);
        echo "Number " . $number . ' convertet to decimal is: ' . $decimal . '<br>';
        echo "Number " . $number . ' convertet to roman is: ' . $roman . '<br>';
    } elseif ($type == 'decimal') {
        $binary = decbin(abs($number));
        $roman = decimalToRoman(abs($number));
        echo "Number " . $number . ' converted to binary is: ' . $binary . '<br>';
        echo "Number " . $number . ' converted to roman is: ' . (($number < 0) ? '-' : '') . $roman . '<br>';
    } elseif ($type == 'roman') {
        $decimal = romanToDecimal($number);
        $binary = decbin($decimal);
        echo "Number " . $number . ' converted to decimal is: ' . $decimal . '<br>';
        echo "Number " . $number .  ' converted to binary is: ' . $binary . '<br>';
    } else {
        echo 'Error: Invalid input.<br>';
    }

    echo '<br>';
}

?>