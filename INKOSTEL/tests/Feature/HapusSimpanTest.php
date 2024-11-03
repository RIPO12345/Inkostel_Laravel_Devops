<?php

namespace Tests\Feature;

use App\Models\Simpan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class HapusSimpanTest extends TestCase
{
    use RefreshDatabase; // Menggunakan trait untuk refresh database

    /** @test */
    public function user_can_delete_a_bookmark()
    {
        // Setup: Buat user dan authenticate
        $user = \App\Models\User::factory()->create();
        Auth::login($user);

        // Setup: Buat bookmark (data kos)
        $bookmark = Simpan::create([
            'user_id' => $user->id,
            'id_kos' => 1,
            'nama_kos' => 'Kos A',
            'harga_kos_pertahun' => 1000000,
            'jarak_kos' => '1 km',
            'gambar_kos1' => 'gambar_kos1.jpg',
        ]);

        // Aksi: Menghapus bookmark
        $response = $this->delete(route('hapus.simpan', ['id' => $bookmark->id]), [
            'confirm_delete' => 'yes',
        ]);

        // Asersi: Cek apakah data berhasil dihapus
        $this->assertDatabaseMissing('simpans', [
            'id' => $bookmark->id,
        ]);

        // Asersi: Cek apakah redirect ke halaman dengan pesan sukses
        $response->assertRedirect(route('simpan.halaman'));
        $response->assertSessionHas('success', 'Data kos berhasil dihapus.');
    }

    /** @test */
    public function user_cannot_delete_a_bookmark_without_confirmation()
    {
        // Setup: Buat user dan authenticate
        $user = \App\Models\User::factory()->create();
        Auth::login($user);

        // Setup: Buat bookmark (data kos)
        $bookmark = Simpan::create([
            'user_id' => $user->id,
            'id_kos' => 1,
            'nama_kos' => 'Kos B',
            'harga_kos_pertahun' => 2000000,
            'jarak_kos' => '2 km',
            'gambar_kos1' => 'gambar_kos2.jpg',
        ]);

        // Aksi: Menghapus bookmark tanpa konfirmasi
        $response = $this->delete(route('hapus.simpan', ['id' => $bookmark->id]), [
            'confirm_delete' => 'no',
        ]);

        // Asersi: Cek apakah data masih ada di database
        $this->assertDatabaseHas('simpans', [
            'id' => $bookmark->id,
        ]);

        // Asersi: Cek apakah redirect ke halaman dengan pesan error
        $response->assertRedirect(route('simpan.halaman'));
        $response->assertSessionHas('error', 'Konfirmasi penghapusan diperlukan.');
    }

    /** @test */
    public function user_cannot_delete_a_nonexistent_bookmark()
    {
        // Setup: Buat user dan authenticate
        $user = \App\Models\User::factory()->create();
        Auth::login($user);

        // Aksi: Menghapus bookmark yang tidak ada
        $response = $this->delete(route('hapus.simpan', ['id' => 999]), [
            'confirm_delete' => 'yes',
        ]);

        // Asersi: Cek apakah redirect ke halaman dengan pesan error
        $response->assertRedirect(route('simpan.halaman'));
        $response->assertSessionHas('error', 'Data kos tidak ditemukan.');
    }
}
