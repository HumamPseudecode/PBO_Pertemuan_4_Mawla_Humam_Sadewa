<?php

require_once "PesananLaundry.php";

$pesanan = new PesananLaundry("Rani", 3.5, 7000);
$pesanan->setStatus("Dicuci");

echo "Data Pesanan Laundry" . PHP_EOL;
echo "--------------------" . PHP_EOL;
$pesanan->tampilkanInfo();
