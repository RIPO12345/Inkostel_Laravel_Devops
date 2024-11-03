<?php

namespace Tests\Unit;

use App\Models\Simpan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class TesHapusKos extends TestCase
{
    use RefreshDatabase; // Reset database untuk setiap test

    protected function setUp(): void
    {
        parent::setUp();

        // Menyiapkan data awal untuk pengujian
        // Misalnya, membuat user dan data kos
        $this->user = \App\Models\User::factory()->create();
        $this->bookmark = Simpan::factory()->create([
            'user_id' => $this->user->id,
            'nama_kos' => 'Kost A',
            'harga_kos_pertahun' => 1000000,
        ]);
    }

    public function test_hapus_simpan_berhasil_dengan_konfirmasi()
    {
        // Simulasi login
        Auth::login($this->user);

        $response = $this->delete(route('hapus.simpan', ['id' => $this->bookmark->id]), [
            'confirm_delete' => 'yes',
        ]);

        // Cek response dan database
        $response->assertRedirect(route('simpan.halaman'));
        $this->assertDatabaseMissing('simpans', [
            'id' => $this->bookmark->id,
        ]);
        $this->assertSessionHas('success', 'Data kos berhasil dihapus.');
    }

    public function test_hapus_simpan_gagal_tanpa_konfirmasi()
    {
        // Simulasi login
        Auth::login($this->user);

        $response = $this->delete(route('hapus.simpan', ['id' => $this->bookmark->id]), [
            'confirm_delete' => 'no', // Tidak mengkonfirmasi
        ]);

        // Cek response dan database
        $response->assertRedirect();
        $this->assertDatabaseHas('simpans', [
            'id' => $this->bookmark->id,
        ]);
        $this->assertSessionHas('error', 'Konfirmasi penghapusan diperlukan.');
    }

    public function test_hapus_simpan_data_tidak_ditemukan()
    {
        // Simulasi login
        Auth::login($this->user);

        // Menggunakan ID yang tidak ada
        $response = $this->delete(route('hapus.simpan', ['id' => 999]), [
            'confirm_delete' => 'yes',
        ]);

        // Cek response dan database
        $response->assertRedirect(route('simpan.halaman'));
        $this->assertSessionHas('error', 'Data kos tidak ditemukan.');
    }
}
