<?php

namespace Database\Seeders;

use App\Models\Petition;
use App\Models\User;
use App\Models\Comment;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Soeara Admin1',
            'slug' => 'soeara-admin1',
            'email' => 'soeara.admin1@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('admin1'),
        ]);
        
        Petition::create([
            'title' => 'Unsoed Darurat Pelecehan Seksual! Bentuk Tim Investigasi Independent!',
            'slug' => 'unsoed-darurat-pelecehan-seksual-bentuk-tim-investigasi-independent',
            'desc' => 'Dalam menghadapi situasi darurat pelecehan seksual di lingkungan Unsoed, penting untuk segera membentuk tim investigasi independen yang bertugas untuk menyelidiki kasus-kasus tersebut secara menyeluruh dan objektif. Langkah ini menjadi sangat penting dalam memastikan perlindungan yang tepat bagi korban, serta menegaskan komitmen institusi terhadap keamanan dan kesejahteraan seluruh anggota komunitas akademik.

            Selain itu, langkah pembentukan tim investigasi independen juga merupakan bentuk respons yang transparan dan akuntabel dari pihak universitas terhadap kasus-kasus pelecehan seksual. Dengan adanya tim investigasi independen, proses penyelidikan dapat dilakukan secara obyektif tanpa adanya intervensi atau kepentingan dari pihak-pihak yang terlibat secara langsung. Hal ini akan meningkatkan kepercayaan dan keadilan bagi korban serta memberikan pesan yang kuat bahwa pelecehan seksual tidak akan ditoleransi dalam lingkungan Unsoed.
            
            Selain membentuk tim investigasi independen, penting pula bagi Unsoed untuk meningkatkan kesadaran dan pemahaman mengenai isu pelecehan seksual di kalangan mahasiswa, dosen, dan staf. Ini dapat dilakukan melalui penyelenggaraan workshop, seminar, atau kampanye yang bertujuan untuk mengedukasi dan memberikan pemahaman yang lebih baik tentang konsekuensi dan tindakan pencegahan pelecehan seksual. Dengan demikian, universitas dapat menjadi lingkungan yang lebih aman dan inklusif bagi seluruh anggotanya.',
            'image' => 'img3.png',
            'user_id' => 1,
        ]);

        Petition::create([
            'title' => 'Stop Komdis Marah-Marah Pada Masa Ospek Jurusan!',
            'slug' => 'stop-komdis-marah-marah-pada-masa-ospek-jurusan',
            'desc' => 'Dalam menghadapi situasi darurat pelecehan seksual di lingkungan Unsoed, penting untuk segera membentuk tim investigasi independen yang bertugas untuk menyelidiki kasus-kasus tersebut secara menyeluruh dan objektif. Langkah ini menjadi sangat penting dalam memastikan perlindungan yang tepat bagi korban, serta menegaskan komitmen institusi terhadap keamanan dan kesejahteraan seluruh anggota komunitas akademik.

            Selain itu, langkah pembentukan tim investigasi independen juga merupakan bentuk respons yang transparan dan akuntabel dari pihak universitas terhadap kasus-kasus pelecehan seksual. Dengan adanya tim investigasi independen, proses penyelidikan dapat dilakukan secara obyektif tanpa adanya intervensi atau kepentingan dari pihak-pihak yang terlibat secara langsung. Hal ini akan meningkatkan kepercayaan dan keadilan bagi korban serta memberikan pesan yang kuat bahwa pelecehan seksual tidak akan ditoleransi dalam lingkungan Unsoed.
            
            Selain membentuk tim investigasi independen, penting pula bagi Unsoed untuk meningkatkan kesadaran dan pemahaman mengenai isu pelecehan seksual di kalangan mahasiswa, dosen, dan staf. Ini dapat dilakukan melalui penyelenggaraan workshop, seminar, atau kampanye yang bertujuan untuk mengedukasi dan memberikan pemahaman yang lebih baik tentang konsekuensi dan tindakan pencegahan pelecehan seksual. Dengan demikian, universitas dapat menjadi lingkungan yang lebih aman dan inklusif bagi seluruh anggotanya.',
            'image' => 'img2.png',
            'user_id' => 1,
        ]);

        Petition::create([
            'title' => 'Benahi Aspal Jalan dan Parkiran di Fakultas Teknik Unsoed!',
            'slug' => 'benahi-aspal-jalan-dan-parkiran-di-fakultas-teknik-unsoed',
            'desc' => 'Dalam menghadapi situasi darurat pelecehan seksual di lingkungan Unsoed, penting untuk segera membentuk tim investigasi independen yang bertugas untuk menyelidiki kasus-kasus tersebut secara menyeluruh dan objektif. Langkah ini menjadi sangat penting dalam memastikan perlindungan yang tepat bagi korban, serta menegaskan komitmen institusi terhadap keamanan dan kesejahteraan seluruh anggota komunitas akademik.

            Selain itu, langkah pembentukan tim investigasi independen juga merupakan bentuk respons yang transparan dan akuntabel dari pihak universitas terhadap kasus-kasus pelecehan seksual. Dengan adanya tim investigasi independen, proses penyelidikan dapat dilakukan secara obyektif tanpa adanya intervensi atau kepentingan dari pihak-pihak yang terlibat secara langsung. Hal ini akan meningkatkan kepercayaan dan keadilan bagi korban serta memberikan pesan yang kuat bahwa pelecehan seksual tidak akan ditoleransi dalam lingkungan Unsoed.
            
            Selain membentuk tim investigasi independen, penting pula bagi Unsoed untuk meningkatkan kesadaran dan pemahaman mengenai isu pelecehan seksual di kalangan mahasiswa, dosen, dan staf. Ini dapat dilakukan melalui penyelenggaraan workshop, seminar, atau kampanye yang bertujuan untuk mengedukasi dan memberikan pemahaman yang lebih baik tentang konsekuensi dan tindakan pencegahan pelecehan seksual. Dengan demikian, universitas dapat menjadi lingkungan yang lebih aman dan inklusif bagi seluruh anggotanya.',
            'image' => 'img4.png',
            'user_id' => 1,
        ]);

        Comment::create([
            'user_id' => 1, 
            'petisi_id' => 1,
            'content' => 'Petisi ini sangat penting dan saya mendukung sepenuhnya. Mari kita bersama-sama menciptakan perubahan positif!',
        ]);

        Comment::create([
            'user_id' => 1, 
            'petisi_id' => 2,
            'content' => 'Saya setuju dengan petisi ini. Ini adalah langkah besar menuju perubahan yang kita butuhkan.',
        ]);
        
        Comment::create([
            'user_id' => 1, 
            'petisi_id' => 3,
            'content' => 'Petisi ini sangat penting. Mari kita bersatu dan berjuang untuk perubahan yang lebih baik.',
        ]);
    }
}
