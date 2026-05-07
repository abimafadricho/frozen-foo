<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Seed Kategori
        $kategoris = [
            ['nama_kategori' => 'Ayam',    'deskripsi' => 'Produk berbahan dasar ayam beku',   'created_at' => '2026-01-01', 'updated_at' => '2026-01-01'],
            ['nama_kategori' => 'Seafood', 'deskripsi' => 'Produk berbahan dasar hasil laut',   'created_at' => '2026-01-01', 'updated_at' => '2026-01-01'],
            ['nama_kategori' => 'Sapi',    'deskripsi' => 'Produk berbahan dasar daging sapi',  'created_at' => '2026-01-05', 'updated_at' => '2026-01-05'],
            ['nama_kategori' => 'Sayuran', 'deskripsi' => 'Sayuran beku siap masak',            'created_at' => '2026-01-10', 'updated_at' => '2026-01-10'],
            ['nama_kategori' => 'Siap saji','deskripsi' => 'Makanan beku siap saji',            'created_at' => '2026-01-12', 'updated_at' => '2026-01-12'],
        ];
        DB::table('kategoris')->insert($kategoris);
 
        // Seed Barang
        $barangs = [
            ['nama_barang'=>'Ayam nugget crispy','kategori_id'=>1,'jumlah_stok'=>120,'stok_minimum'=>20,'satuan'=>'pcs','harga_jual'=>35000,'harga_beli'=>28000,'berat_ukuran'=>'500 gram','lokasi_simpan'=>'Rak A-3','deskripsi'=>'Nugget ayam dengan lapisan tepung crispy, cocok untuk camilan atau bekal. Tersedia dalam kemasan 500 gr berisi ±20 pcs.','foto'=>null,'created_at'=>now(),'updated_at'=>now()],
            ['nama_barang'=>'Sosis sapi premium','kategori_id'=>3,'jumlah_stok'=>15,'stok_minimum'=>20,'satuan'=>'pack','harga_jual'=>28000,'harga_beli'=>22000,'berat_ukuran'=>'200 gram','lokasi_simpan'=>'Rak B-1','deskripsi'=>'Sosis sapi tanpa bahan pengawet tambahan, kaya protein.','foto'=>null,'created_at'=>now(),'updated_at'=>now()],
            ['nama_barang'=>'Dim sum udang','kategori_id'=>2,'jumlah_stok'=>0,'stok_minimum'=>10,'satuan'=>'box','harga_jual'=>45000,'harga_beli'=>35000,'berat_ukuran'=>'300 gram','lokasi_simpan'=>'Rak C-2','deskripsi'=>'Dim sum udang asli khas hongkong, isi 10 pcs per box.','foto'=>null,'created_at'=>now(),'updated_at'=>now()],
            ['nama_barang'=>'Bakso urat sapi','kategori_id'=>3,'jumlah_stok'=>60,'stok_minimum'=>20,'satuan'=>'pack','harga_jual'=>22000,'harga_beli'=>16000,'berat_ukuran'=>'250 gram','lokasi_simpan'=>'Rak B-2','deskripsi'=>'Bakso urat sapi kenyal, cocok untuk sup atau mie bakso.','foto'=>null,'created_at'=>now(),'updated_at'=>now()],
            ['nama_barang'=>'Edamame beku','kategori_id'=>4,'jumlah_stok'=>0,'stok_minimum'=>15,'satuan'=>'pack','harga_jual'=>18000,'harga_beli'=>13000,'berat_ukuran'=>'400 gram','lokasi_simpan'=>'Rak D-1','deskripsi'=>'Edamame beku siap rebus, kaya protein nabati.','foto'=>null,'created_at'=>now(),'updated_at'=>now()],
            ['nama_barang'=>'Kentang goreng beku','kategori_id'=>4,'jumlah_stok'=>45,'stok_minimum'=>20,'satuan'=>'pack','harga_jual'=>15000,'harga_beli'=>10000,'berat_ukuran'=>'500 gram','lokasi_simpan'=>'Rak D-2','deskripsi'=>'Kentang goreng beku siap goreng gaya restoran cepat saji.','foto'=>null,'created_at'=>now(),'updated_at'=>now()],
            ['nama_barang'=>'Nasi goreng beku','kategori_id'=>5,'jumlah_stok'=>8,'stok_minimum'=>20,'satuan'=>'pack','harga_jual'=>20000,'harga_beli'=>14000,'berat_ukuran'=>'300 gram','lokasi_simpan'=>'Rak E-1','deskripsi'=>'Nasi goreng siap saji, tinggal dipanaskan 3 menit.','foto'=>null,'created_at'=>now(),'updated_at'=>now()],
            ['nama_barang'=>'Udang kupas beku','kategori_id'=>2,'jumlah_stok'=>30,'stok_minimum'=>10,'satuan'=>'pack','harga_jual'=>55000,'harga_beli'=>45000,'berat_ukuran'=>'250 gram','lokasi_simpan'=>'Rak C-1','deskripsi'=>'Udang kupas segar yang dibekukan tanpa bahan pengawet.','foto'=>null,'created_at'=>now(),'updated_at'=>now()],
            ['nama_barang'=>'Ayam fillet beku','kategori_id'=>1,'jumlah_stok'=>25,'stok_minimum'=>20,'satuan'=>'pack','harga_jual'=>40000,'harga_beli'=>32000,'berat_ukuran'=>'500 gram','lokasi_simpan'=>'Rak A-1','deskripsi'=>'Fillet dada ayam tanpa tulang dan kulit, beku segar.','foto'=>null,'created_at'=>now(),'updated_at'=>now()],
            ['nama_barang'=>'Calamari ring beku','kategori_id'=>2,'jumlah_stok'=>18,'stok_minimum'=>10,'satuan'=>'pack','harga_jual'=>38000,'harga_beli'=>28000,'berat_ukuran'=>'200 gram','lokasi_simpan'=>'Rak C-3','deskripsi'=>'Cincin cumi berlapis tepung crispy, cocok digoreng.','foto'=>null,'created_at'=>now(),'updated_at'=>now()],
            ['nama_barang'=>'Rendang sapi beku','kategori_id'=>3,'jumlah_stok'=>12,'stok_minimum'=>15,'satuan'=>'pack','harga_jual'=>65000,'harga_beli'=>50000,'berat_ukuran'=>'250 gram','lokasi_simpan'=>'Rak B-3','deskripsi'=>'Rendang sapi masak autentik Padang, tinggal dipanaskan.','foto'=>null,'created_at'=>now(),'updated_at'=>now()],
            ['nama_barang'=>'Brokoli beku','kategori_id'=>4,'jumlah_stok'=>55,'stok_minimum'=>10,'satuan'=>'pack','harga_jual'=>12000,'harga_beli'=>8000,'berat_ukuran'=>'500 gram','lokasi_simpan'=>'Rak D-3','deskripsi'=>'Brokoli beku segar tanpa bahan tambahan.','foto'=>null,'created_at'=>now(),'updated_at'=>now()],
        ];
        DB::table('barangs')->insert($barangs);
    }
}
