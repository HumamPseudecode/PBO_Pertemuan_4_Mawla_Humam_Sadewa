<?php

class PesananLaundry
{
    private string $namaPelanggan;
    private float $beratCucian;
    private int $hargaPerKg;
    private string $status;

    public function __construct(
        string $namaPelanggan,
        float $beratCucian,
        int $hargaPerKg = 7000
    ) {
        $this->setNamaPelanggan($namaPelanggan);
        $this->setBeratCucian($beratCucian);
        $this->setHargaPerKg($hargaPerKg);
        $this->status = "Diterima";
    }

    public function getNamaPelanggan(): string
    {
        return $this->namaPelanggan;
    }

    public function setNamaPelanggan(string $namaPelanggan): void
    {
        if (trim($namaPelanggan) === "") {
            throw new InvalidArgumentException("Nama pelanggan tidak boleh kosong.");
        }

        $this->namaPelanggan = trim($namaPelanggan);
    }

    public function getBeratCucian(): float
    {
        return $this->beratCucian;
    }

    public function setBeratCucian(float $beratCucian): void
    {
        if ($beratCucian <= 0) {
            throw new InvalidArgumentException("Berat cucian harus lebih dari 0 kg.");
        }

        $this->beratCucian = $beratCucian;
    }

    public function getHargaPerKg(): int
    {
        return $this->hargaPerKg;
    }

    public function setHargaPerKg(int $hargaPerKg): void
    {
        if ($hargaPerKg <= 0) {
            throw new InvalidArgumentException("Harga per kg harus lebih dari Rp0.");
        }

        $this->hargaPerKg = $hargaPerKg;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $statusValid = ["Diterima", "Dicuci", "Selesai", "Diambil"];

        if (!in_array($status, $statusValid, true)) {
            throw new InvalidArgumentException("Status laundry tidak dikenal.");
        }

        $this->status = $status;
    }

    public function hitungBiaya(): int
    {
        return (int) round($this->beratCucian * $this->hargaPerKg);
    }

    public function tampilkanInfo(): void
    {
        echo "Nama pelanggan : " . $this->namaPelanggan . PHP_EOL;
        echo "Berat cucian    : " . $this->beratCucian . " kg" . PHP_EOL;
        echo "Harga per kg    : Rp" . number_format($this->hargaPerKg, 0, ",", ".") . PHP_EOL;
        echo "Total biaya     : Rp" . number_format($this->hitungBiaya(), 0, ",", ".") . PHP_EOL;
        echo "Status          : " . $this->status . PHP_EOL;
    }
}
