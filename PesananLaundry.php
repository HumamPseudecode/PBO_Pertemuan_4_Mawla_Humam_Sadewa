<?php

/**
 * Menyimpan data dan menghitung biaya pesanan laundry.
 */
class PesananLaundry
{
    // Pilihan status yang boleh digunakan untuk pesanan.
    private const STATUS_VALID = ['Diterima', 'Dicuci', 'Selesai', 'Diambil'];

    // Data utama yang disimpan untuk setiap pesanan laundry.
    private string $namaPelanggan;
    private float $beratCucian;
    private int $hargaPerKg;
    private string $status;

    /**
     * Membuat pesanan baru dan menetapkan status awal menjadi "Diterima".
     */
    public function __construct(
        string $namaPelanggan,
        float $beratCucian,
        int $hargaPerKg = 7000
    ) {
        $this->setNamaPelanggan($namaPelanggan);
        $this->setBeratCucian($beratCucian);
        $this->setHargaPerKg($hargaPerKg);
        $this->status = 'Diterima';
    }

    /** Mengambil nama pelanggan. */
    public function getNamaPelanggan(): string
    {
        return $this->namaPelanggan;
    }

    /** Menyimpan nama pelanggan setelah memastikan nilainya tidak kosong. */
    public function setNamaPelanggan(string $namaPelanggan): void
    {
        if (trim($namaPelanggan) === '') {
            throw new InvalidArgumentException('Nama pelanggan tidak boleh kosong.');
        }

        $this->namaPelanggan = trim($namaPelanggan);
    }

    /** Mengambil berat cucian dalam kilogram. */
    public function getBeratCucian(): float
    {
        return $this->beratCucian;
    }

    /** Menyimpan berat cucian; berat harus lebih besar dari nol. */
    public function setBeratCucian(float $beratCucian): void
    {
        if ($beratCucian <= 0) {
            throw new InvalidArgumentException('Berat cucian harus lebih dari 0 kg.');
        }

        $this->beratCucian = $beratCucian;
    }

    /** Mengambil harga layanan untuk setiap kilogram. */
    public function getHargaPerKg(): int
    {
        return $this->hargaPerKg;
    }

    /** Menyimpan harga per kilogram; harga harus lebih besar dari nol. */
    public function setHargaPerKg(int $hargaPerKg): void
    {
        if ($hargaPerKg <= 0) {
            throw new InvalidArgumentException('Harga per kg harus lebih dari Rp0.');
        }

        $this->hargaPerKg = $hargaPerKg;
    }

    /** Mengambil status pesanan saat ini. */
    public function getStatus(): string
    {
        return $this->status;
    }

    /** Mengubah status pesanan hanya ke salah satu status yang valid. */
    public function setStatus(string $status): void
    {
        if (!in_array($status, self::STATUS_VALID, true)) {
            throw new InvalidArgumentException('Status laundry tidak dikenal.');
        }

        $this->status = $status;
    }

    /** Menghitung biaya dengan mengalikan berat cucian dan harga per kilogram. */
    public function hitungBiaya(): int
    {
        return (int) round($this->beratCucian * $this->hargaPerKg);
    }

    /** Menampilkan data pesanan dan total biaya dalam format rupiah. */
    public function tampilkanInfo(): void
    {
        echo 'Nama pelanggan : ' . $this->namaPelanggan . PHP_EOL;
        echo 'Berat cucian    : ' . $this->beratCucian . ' kg' . PHP_EOL;
        echo 'Harga per kg    : Rp' . number_format($this->hargaPerKg, 0, ',', '.') . PHP_EOL;
        echo 'Total biaya     : Rp' . number_format($this->hitungBiaya(), 0, ',', '.') . PHP_EOL;
        echo 'Status          : ' . $this->status . PHP_EOL;
    }
}
