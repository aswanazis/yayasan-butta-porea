<?php

namespace Database\Seeders;

use App\Models\Award;
use App\Models\FoundationProfile;
use App\Models\LegalDocument;
use App\Models\Partner;
use App\Models\TeamMember;
use Illuminate\Database\Seeder;

/**
 * Mengisi data teks dari Company Profile Yayasan Butta Porea Indonesia
 * (struktur organisasi, jejaring kemitraan/pendukung, penghargaan,
 * legalitas, dan profil/komitmen yayasan).
 *
 * Field foto/logo sengaja dikosongkan — upload manual lewat admin panel
 * supaya hasilnya rapi (bukan hasil crop dari PDF).
 *
 * Jalankan dengan:
 *   php artisan db:seed --class=StructureAndPartnersSeeder
 *
 * Aman dijalankan berkali-kali (idempotent) — data yang sudah ada tidak digandakan.
 */
class StructureAndPartnersSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedTeamMembers();
        $this->seedPartners();
        $this->seedAwards();
        $this->seedLegalDocuments();
        $this->seedFoundationProfile();
    }

    private function seedTeamMembers(): void
    {
        $members = [
            // Dewan Pembina
            ['group' => 'dewan_pembina', 'name' => 'Andi Fadly Arifuddin, S.E.', 'position' => 'Ketua', 'is_coordinator' => true, 'order' => 0],
            ['group' => 'dewan_pembina', 'name' => 'Ir. Aslam Katutu', 'position' => 'Anggota', 'is_coordinator' => false, 'order' => 1],
            ['group' => 'dewan_pembina', 'name' => 'Andi Rosihan, S.T.', 'position' => 'Anggota', 'is_coordinator' => false, 'order' => 2],
            ['group' => 'dewan_pembina', 'name' => 'Prof. Dr. Nur Syamsu Parjono, S.E., M.Ec, M.Psy, DEA, MA', 'position' => 'Anggota', 'is_coordinator' => false, 'order' => 3],

            // Dewan Pengawas
            ['group' => 'dewan_pengawas', 'name' => 'Dr. Islahuddin, S.Sos., M.Si.', 'position' => 'Ketua', 'is_coordinator' => true, 'order' => 0],
            ['group' => 'dewan_pengawas', 'name' => 'Ahmad Shopian, S.Si.', 'position' => 'Anggota', 'is_coordinator' => false, 'order' => 1],

            // Ketua, Sekretaris, Bendahara
            ['group' => 'ketua', 'name' => 'Andi Pangerang Nur Akbar, S.STP., M.M.', 'position' => 'Ketua', 'is_coordinator' => true, 'order' => 0],
            ['group' => 'sekretaris', 'name' => 'Muh. Ilham Nopriansyah, S.Tr.AP.', 'position' => 'Sekretaris', 'is_coordinator' => true, 'order' => 0],
            ['group' => 'bendahara', 'name' => 'Ayuni Nur Fitrah, S.Kep., M.M.', 'position' => 'Bendahara', 'is_coordinator' => true, 'order' => 0],

            // Divisi Peternakan
            ['group' => 'divisi_peternakan', 'name' => 'Fahmid Mappa, S.Pt.', 'position' => 'Koordinator', 'is_coordinator' => true, 'order' => 0],

            // Divisi Perikanan
            ['group' => 'divisi_perikanan', 'name' => 'Rahmat Hidayat, S.Pi.', 'position' => 'Koordinator', 'is_coordinator' => true, 'order' => 0],

            // Divisi Hukum
            ['group' => 'divisi_hukum', 'name' => 'Muhammad Abduh, S.H., M.Kn.', 'position' => 'Koordinator', 'is_coordinator' => true, 'order' => 0],

            // Divisi Pertanian
            ['group' => 'divisi_pertanian', 'name' => 'Herningsih Musa, S.P., M.P.', 'position' => 'Koordinator', 'is_coordinator' => true, 'order' => 0],
            ['group' => 'divisi_pertanian', 'name' => 'Andi Rostiati, S.P., M.P.', 'position' => 'Anggota', 'is_coordinator' => false, 'order' => 1],

            // Divisi Lingkungan Hidup
            ['group' => 'divisi_lingkungan_hidup', 'name' => 'Mashud Adzikin, S.Si.', 'position' => 'Koordinator', 'is_coordinator' => true, 'order' => 0],
            ['group' => 'divisi_lingkungan_hidup', 'name' => 'Muhammad Alvin R.', 'position' => 'Anggota', 'is_coordinator' => false, 'order' => 1],
        ];

        foreach ($members as $data) {
            TeamMember::firstOrCreate(
                ['group' => $data['group'], 'name' => $data['name']],
                [
                    'position' => $data['position'],
                    'is_coordinator' => $data['is_coordinator'],
                    'order' => $data['order'],
                    'is_active' => true,
                ]
            );
        }
    }

    private function seedPartners(): void
    {
        $kemitraan = [
            'CycleValue',
            'Bumiraya Indonesia',
            'Manggala Tanpa Sekat',
            'Andalan',
            'Claro Makassar',
            "Mini Farm'ta",
        ];

        $pendukung = [
            'Pemerintah Kota Makassar',
            'PT. Permodalan Nasional Madani (PNM)',
            'Pelindo',
            'PT. BRI Asuransi (BRINS)',
            'Pegadaian',
            'Universitas Hasanuddin',
        ];

        foreach ($kemitraan as $i => $name) {
            Partner::firstOrCreate(
                ['name' => $name, 'type' => 'kemitraan'],
                ['order' => $i, 'is_active' => true]
            );
        }

        foreach ($pendukung as $i => $name) {
            Partner::firstOrCreate(
                ['name' => $name, 'type' => 'pendukung'],
                ['order' => $i, 'is_active' => true]
            );
        }
    }

    private function seedAwards(): void
    {
        Award::firstOrCreate(
            ['title' => 'Piagam Penghargaan dari Kementerian Imigrasi dan Pemasyarakatan RI'],
            [
                'description' => 'Diberikan atas kontribusi dan kerja sama dalam hal pemanfaatan lahan menjadi Urban Farming Terintegrasi.',
                'order' => 0,
                'is_active' => true,
            ]
        );
    }

    private function seedLegalDocuments(): void
    {
        LegalDocument::firstOrCreate(
            ['title' => 'Akta Notaris Pendirian'],
            [
                'caption' => 'Akta Notaris Nomor 3, tanggal 01 Oktober 2025, oleh Notaris Sahabuddin Nur, S.H., M.Kn., Kota Makassar.',
                'order' => 0,
                'is_active' => true,
            ]
        );

        LegalDocument::firstOrCreate(
            ['title' => 'SK Pengesahan Kementerian Hukum RI'],
            [
                'caption' => 'Nomor AHU-0023893.AH.01.04.Tahun 2025, tanggal 07 Oktober 2025. Daftar Yayasan Nomor AHU-0036825.AH.01.12.Tahun 2025. Nomor Pendaftaran 5025100773100714.',
                'order' => 1,
                'is_active' => true,
            ]
        );
    }

    private function seedFoundationProfile(): void
    {
        $profile = FoundationProfile::current();

        $currentText = $profile->getTranslation('profile_text', 'id', false);
        if (empty($currentText)) {
            $profile->setTranslation('profile_text', 'id', '<p>Yayasan Butta Porea Indonesia adalah badan hukum yayasan yang berkedudukan di Kota Makassar, disahkan melalui Keputusan Menteri Hukum Republik Indonesia Nomor AHU-0023893.AH.01.04.Tahun 2025 tanggal 07 Oktober 2025. Yayasan didirikan berdasarkan Akta Notaris Nomor 3 tanggal 01 Oktober 2025 yang dibuat oleh Notaris Sahabuddin Nur, S.H., M.Kn. di Kota Makassar.</p>');
        }

        $currentItems = $profile->getTranslation('commitment_items', 'id', false);
        if (empty($currentItems)) {
            $profile->setTranslation('commitment_items', 'id', [
                ['icon' => 'handshake', 'title' => 'Akuntabel'],
                ['icon' => 'eco', 'title' => 'Keberlanjutan'],
                ['icon' => 'diversity_3', 'title' => 'Partisipasi'],
            ]);
        }

        $profile->save();
    }
}
