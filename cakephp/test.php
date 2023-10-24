<?php

class MiClase {
	const constante = "Asdad";

	public function mifunc() {
		echo "dale";
	}
}

$instan = new MiClase();

$instan->mifunc();

$statusCode = 200;

switch ($statusCode) {
    case 200:
    case 300:
        $message = null;
        break;
    case 400:
        $message = 'not found';
        break;
    case 500:
        $message = 'server error';
        break;
    default:
        $message = 'unknown status code';
        break;
}


$message = match ($statusCode) {
    200, 300 => null,
    400 => 'not found',
    500 => 'server error',
    default => 'unknown status code',
};

$array = array(
    "foo" => "bar",
    "bar" => "foo",
);

// Using the short array syntax
$array = [
    "foo" => "bar",
    "bar" => "foo",
];


foreach($array as $item) {
	echo $item . "\n";
}

for ($i = 1; $i <= 10; $i++) {
    echo $i;
}

$i = 1;
while ($i <= 10) {
    echo $i++;  /* el valor presentado sería
                   $i antes del incremento
                   (post-incremento) */
}


?>
