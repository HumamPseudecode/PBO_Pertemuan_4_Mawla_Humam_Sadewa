<?php

require_once "PesananLaundry.php";

function jalankanTes(string $namaTes, callable $tes): void
{
    try {
        $tes();
        echo "[LULUS] " . $namaTes . PHP_EOL;
    } catch (Throwable $e) {
        echo "[GAGAL] " . $namaTes . " - " . $e->getMessage() . PHP_EOL;
    }
}

jalankanTes("Data pesanan normal dan hitung biaya", function () {
    $pesanan = new PesananLaundry("Rani", 2, 7000);

    if ($pesanan->hitungBiaya() !== 14000) {
        throw new Exception("Total biaya seharusnya Rp14.000.");
    }
});

jalankanTes("Nama pelanggan kosong ditolak", function () {
    try {
        new PesananLaundry("   ", 2, 7000);
    } catch (InvalidArgumentException $e) {
        return;
    }

    throw new Exception("Nama kosong seharusnya ditolak.");
});

jalankanTes("Berat nol ditolak", function () {
    try {
        new PesananLaundry("Rani", 0, 7000);
    } catch (InvalidArgumentException $e) {
        return;
    }

    throw new Exception("Berat nol seharusnya ditolak.");
});

jalankanTes("Harga negatif ditolak", function () {
    try {
        new PesananLaundry("Rani", 2, -1000);
    } catch (InvalidArgumentException $e) {
        return;
    }

    throw new Exception("Harga negatif seharusnya ditolak.");
});

jalankanTes("Status yang tidak tersedia ditolak", function () {
    $pesanan = new PesananLaundry("Rani", 2, 7000);

    try {
        $pesanan->setStatus("Dikirim");
    } catch (InvalidArgumentException $e) {
        return;
    }

    throw new Exception("Status tidak dikenal seharusnya ditolak.");
});

jalankanTes("Status bisa diubah ke Selesai", function () {
    $pesanan = new PesananLaundry("Rani", 2, 7000);
    $pesanan->setStatus("Selesai");

    if ($pesanan->getStatus() !== "Selesai") {
        throw new Exception("Status belum berubah.");
    }
});
