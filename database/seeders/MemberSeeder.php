<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Member;
use Illuminate\Support\Facades\DB;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Kosongkan tabel member terlebih dahulu untuk menghindari duplikasi data
        DB::table('member')->truncate();

        $members = [
            ['npm' => '24783069', 'nama' => 'Adif Ifani Hartoyo', 'quotes' => 'Tumbuh dengan ilmu, hidup dengan makna.', 'role' => 'Member'],
            ['npm' => '24783071', 'nama' => 'Alfatiharavah Qisty', 'quotes' => 'Kebanyakan kegagalan berasal dari takut gagal', 'role' => 'Member'],
            ['npm' => '24783072', 'nama' => 'Andika Sandi Pranata', 'quotes' => 'You can be anything you want', 'role' => 'Member'],
            ['npm' => '24783073', 'nama' => 'Bangun Gilang Saputra Dolok Saribu', 'quotes' => 'Life\'s simple, you make choices and you don\'t look back', 'role' => 'Member'],
            ['npm' => '24783075', 'nama' => 'Dede Aprizal', 'quotes' => 'Cita cita itu dikejar bukan ditunggu, kalau mereka bisa kenapa kita tidak', 'role' => 'Member'],
            ['npm' => '24783076', 'nama' => 'Donatus Gitsco Paolo Aswin', 'quotes' => 'Jadi diri sendiri lebih baik, karna pada akhirnya dari diri sendiri kita menentukan hidup kita', 'role' => 'Member'],
            ['npm' => '24783077', 'nama' => 'Faqih Abdurrohman', 'quotes' => 'Terus berbuat baik merupakan investasi terbaik', 'role' => 'Member'],
            ['npm' => '24783078', 'nama' => 'Feri Setiawan', 'quotes' => 'life is simple, but not easy', 'role' => 'Member'],
            ['npm' => '24783079', 'nama' => 'Hendi Firmansah', 'quotes' => 'NETWORKING ITU LEBIH PENTING DARIPADA MENJADI PINTAR', 'role' => 'Member'],
            ['npm' => '24783080', 'nama' => 'I Komang Ari Wijaya Saputra', 'quotes' => 'Berjuanglah Selagi Masih Hidup', 'role' => 'Member'],
            ['npm' => '24783082', 'nama' => 'Liyana Syafiqa', 'quotes' => 'jangan pernah berhenti berbuat baik dan membantu orang ‼️', 'role' => 'Class Treasurer'],
            // ['npm' => '24783083', 'nama' => 'a', 'quotes' => 'Kalau kamu tidak mencoba, kamu tidak akan tahu hasilnya', 'role' => 'Member'], // Data tidak jelas, dilewati
            ['npm' => '24783084', 'nama' => 'Maharani Najla Azzahra', 'quotes' => 'Don\'t just dream, but make it happen', 'role' => 'Member'],
            ['npm' => '24783085', 'nama' => 'Marshal Frans Faith Wolf', 'quotes' => 'Hidup bukan soal menunggu badai reda, tapi belajar menari di tengah badai.', 'role' => 'Member'],
            ['npm' => '24783086', 'nama' => 'Muhammad Jibril Al Ghifari', 'quotes' => 'Ngeluh boleh, capek juga boleh, bosen? boleh, Nyerah? JANGAN, jalani kehidupan sebaik mungkin. STAY STRONG, I Love You All.', 'role' => 'Member'],
            ['npm' => '24783087', 'nama' => 'Muhammad Fahry Arief Billah', 'quotes' => 'Berdoa dan Berusaha', 'role' => 'Member'],
            ['npm' => '24783088', 'nama' => 'Muhammad Kelvin Azzufar', 'quotes' => 'Tidak ada Moto adanya Motor', 'role' => 'Member'],
            ['npm' => '24783089', 'nama' => 'Muhammad Taaudz Syahti Ismail', 'quotes' => 'Hidup hanya bisa dimengerti dengan melihat ke belakang, tetapi ia terus berlanjut ke depan.', 'role' => 'Member'],
            ['npm' => '24783090', 'nama' => 'Nabilah Titta Ridya', 'quotes' => 'Jalan hidupmu hanya milikmu sendiri, rasakan nikmatnya hidupmu hari ini. (Hindia - Baskara Putra)', 'role' => 'Class Secretary'],
            ['npm' => '24783092', 'nama' => 'Nova Ade Irma Lestari', 'quotes' => 'Mungkin kamu bisa mengandalkan semua orang, tapi yang bisa kamu andalkan hanyalah dirimu sendiri', 'role' => 'Member'],
            ['npm' => '24783093', 'nama' => 'Oktaviana', 'quotes' => 'Sederhana tapi bahagia.', 'role' => 'Member'],
            ['npm' => '24783094', 'nama' => 'Raditya Ramadhani', 'quotes' => 'when nothing is going right, go left', 'role' => 'Class Leader'],
            ['npm' => '24783095', 'nama' => 'Rafles Arfatora', 'quotes' => 'Ingin sukses dan membanggakan orang tua', 'role' => 'Member'],
            ['npm' => '24773096', 'nama' => 'Raihan Nafis Murtadha', 'quotes' => 'Jalani hidup yang kamu mau, ikuti kata hati mu teruslah melangkah kedepan dan jangan sekali kali lihat kebelakang', 'role' => 'Member'],
            ['npm' => '24783097', 'nama' => 'Rifqy Aditya Elfateh', 'quotes' => 'Asal ada oksigen tetap hidup', 'role' => 'Member'],
            ['npm' => '24783098', 'nama' => 'Saddam Rexa Yaumi Arfah', 'quotes' => '“Tidur 8 jam itu sehat, tapi kapan?”', 'role' => 'Member'],
            ['npm' => '24783099', 'nama' => 'Siti Aulia Adzani', 'quotes' => 'Jangan pernah menyerah demi membahagiakan orangtua', 'role' => 'Member'],
            ['npm' => '24783100', 'nama' => 'Talitha Putri Hernisa Dewi', 'quotes' => 'jual apapun yang bisa dijual', 'role' => 'Member'],
            ['npm' => '24783101', 'nama' => 'WATI PUSPITA SARI', 'quotes' => 'Make today count.', 'role' => 'Member'],
            ['npm' => '24783102', 'nama' => 'Yunanda Sabrina', 'quotes' => 'Nikmati hidup selagi masih hidup', 'role' => 'Member'], // Asumsi NPM berbeda
        ];

        // Lakukan perulangan dan masukkan data ke database
        foreach ($members as $member) {
            Member::create([
                'npm' => $member['npm'],
                'nama' => $member['nama'],
                'quotes' => $member['quotes'],
                'role' => $member['role'],
                // Path photo dan qr bisa dikosongkan, akan diisi melalui CRUD
                'photo' => null,
                'qr' => null,
            ]);
        }
    }
}
