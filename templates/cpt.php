<div class="wrap">
	<h1>CPT Manager</h1>
	<?php settings_errors(); ?>

	<form method="post" action="options.php">
		<?php 
			settings_fields( 'wp_math_php_plugin_cpt_settings' );
			do_settings_sections( 'wp_math_php_cpt' );
			submit_button();
		?>
	</form>
</div>

<?php
/*
echo "<h1>Arithmetic Expressions</h1> <br>";

use MathPHP\Arithmetic;

$√x  = Arithmetic::isqrt(8);     // 2 Integer square root
$³√x = Arithmetic::cubeRoot(-8); // -2
$ⁿ√x = Arithmetic::root(81, 4);  // nᵗʰ root (4ᵗʰ): 3

// Sum of digits
$digit_sum    = Arithmetic::digitSum(99);    // 18

echo "digit_sum=" . $digit_sum . "<br>";

$digital_root = Arithmetic::digitalRoot(99); // 9

echo "digital_root=" . $digital_root . "<br>";

// Equality of numbers within a tolerance
$x = 0.00000003458;
$y = 0.00000003455;
$ε = 0.0000000001;
$almostEqual = Arithmetic::almostEqual($x, $y, $ε); // true

echo "almostEqual=" . $almostEqual . "<br>";

// Copy sign
$magnitude = 5;
$sign      = -3;
$signed_magnitude = Arithmetic::copySign($magnitude, $sign); // -5

echo "signed_magnitude=" . $signed_magnitude . "<br>";

// Modulo (Differs from PHP remainder (%) operator for negative numbers)
$dividend = 12;
$divisor  = 5;
$modulo   = Arithmetic::modulo($dividend, $divisor);  // 2

echo "module=" . $modulo . "<br>";

$modulo   = Arithmetic::modulo(-$dividend, $divisor); // 3

echo "module=" . $modulo . "<br>";
*/