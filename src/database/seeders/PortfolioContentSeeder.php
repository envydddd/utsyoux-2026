<?php

namespace Database\Seeders;

use App\Models\PortfolioProfile;
use App\Models\PortfolioSkill;
use App\Models\ProjectAkhir;
use App\Models\SocialLink;
use Illuminate\Database\Seeder;

class PortfolioContentSeeder extends Seeder
{
    public function run(): void
    {
        PortfolioProfile::query()->updateOrCreate(['id' => 1], [
            'site_title' => 'Firaas Ferdinal. | UI/UX Designer & Web Developer',
            'nav_brand' => 'Firaas', 'language_label' => 'ID',
            'hero_eyebrow' => 'HALO, SAYA', 'first_name' => 'Firaas', 'last_name' => 'Ferdinal',
            'role_prefix' => 'Seorang', 'role_title' => 'UI/UX Designer & Web Developer',
            'hero_description' => 'Saya membantu bisnis dan individu mengubah ide menjadi solusi digital yang indah dan berfungsi.',
            'primary_button_label' => 'Lihat Proyek ↗', 'primary_button_url' => '#proyek',
            'secondary_button_label' => 'Kontak Saya', 'secondary_button_url' => '#kontak',
            'hero_card_icon' => '🧑‍💻', 'hero_card_name' => 'Firaas Ferdinal', 'hero_card_role' => 'Software Engineer',
            'hero_avatar_initials' => 'HH', 'hero_handle' => '@YouxAIBot', 'hero_status' => 'Online', 'hero_contact_label' => 'Contact Me',
            'about_photo' => '🏔️', 'about_title' => 'Tentang', 'about_title_highlight' => 'Saya',
            'about_quote' => 'Perpaduan logika kode dan estetika desain.',
            'about_paragraph_1' => 'Perjalanan saya di dunia digital dimulai sejak bangku SMK. Sebagai seorang pelajar otodidak, saya terbiasa memecahkan masalah secara mandiri. Bagi saya, coding adalah seni menyusun logika yang hidup.',
            'about_paragraph_2' => 'Saat ini, saya menempuh pendidikan Sastra Inggris di Universitas Widyatama. Kombinasi kemampuan teknis dan komunikasi adalah kekuatan utama saya dalam setiap proyek.',
            'stat_1_number' => '3+', 'stat_1_label' => 'Tahun Pengalaman',
            'stat_2_number' => '20+', 'stat_2_label' => 'Proyek Selesai',
            'stat_3_number' => '10+', 'stat_3_label' => 'Klien Puas',
            'cv_label' => 'Unduh CV ↓', 'cv_url' => '#',
            'skills_eyebrow' => 'Kemampuan Saya', 'skills_title' => 'Creative & Toolstack',
            'projects_title' => 'Proyek Terpilih', 'projects_subtitle' => 'Beberapa karya yang menyoroti keahlian saya.',
            'contact_eyebrow' => 'Hubungi Saya', 'contact_title' => 'Mari Terhubung',
            'contact_subtitle' => 'Saya selalu terbuka untuk proyek baru atau sekadar obrolan. Kirimkan sinyal Anda.',
            'system_status' => 'SYSTEM STATUS: ONLINE', 'email_label' => 'Email Me', 'email_value' => 'yoiyouka@gmail.com',
            'whatsapp_label' => 'Chat WhatsApp', 'whatsapp_value' => '+62 813 1196 5417',
            'form_title' => 'INITIATE DATA TRANSMISSION',
            'footer_text' => '© 2025 Firaas Ferdinal. Dibuat dengan Laravel & ❤️',
        ]);

        $skills = [
            ['React','Frontend Lib','⚛️','#61dafb'], ['Tailwind','CSS Framework','🌊','#38bdf8'], ['Firebase','Backend Service','🔥','#f97316'],
            ['Next.js','Web Framework','▲','#e2e8f0'], ['VS Code','Code Editor','💻','#007acc'], ['Git/Github','Version Control','GH','#f0f6fc'],
            ['Figma','UI/UX Design','🎨','#a259ff'], ['Photoshop','Image Editing','🖼️','#31abec'], ['Lightroom','Color Grading','🌈','#7dd3fc'],
            ['Illustrator','Vector Art','✒️','#ff9a00'], ['Canva','Layout Design','C','#00c4cc'], ['Premiere Pro','Video Editing','▶','#9999ff'],
            ['After Effects','Motion VFX','✨','#c084fc'], ['CapCut','Mobile Editing','✂️','#ff6b35'], ['DaVinci','Colorist','🎬','#fbbf24'],
            ['Audition','Audio Mixing','🎧','#f87171'], ['OBS Studio','Streaming','◉','#a3e635'], ['Sketch','Prototyping','◇','#818cf8'],
        ];
        foreach ($skills as $i => [$name,$subtitle,$icon,$color]) {
            PortfolioSkill::query()->updateOrCreate(['name' => $name], compact('subtitle','icon','color') + ['sort_order' => $i + 1, 'is_active' => true]);
        }

        $projects = [
            ['E-Commerce Fashion App','Fullstack fashion app dengan payment gateway Midtrans, admin dashboard, dan optimasi performa tinggi.',['Laravel','React','MySQL'],'☕','linear-gradient(135deg,#1a1a2e,#16213e)',true,1],
            ['Portfolio Creative Agency','Website agency dengan animasi GSAP dan CMS Filament.',['Next.js','Tailwind'],'🖥️','linear-gradient(135deg,#0f2027,#203a43)',false,2],
            ['UI/UX Design System','Design system fintech dengan dark mode dan aksesibilitas lengkap.',['Figma','Adobe XD'],'📊','linear-gradient(135deg,#1a1a2e,#2d1b69)',false,3],
        ];
        foreach ($projects as [$title,$description,$tags,$icon,$background_gradient,$is_featured,$sort_order]) {
            ProjectAkhir::query()->updateOrCreate(['title' => $title], compact('description','tags','icon','background_gradient','is_featured','sort_order') + ['url' => '#', 'is_published' => true]);
        }

        foreach ([['Dribbble','DB'],['LinkedIn','IN'],['Instagram','IG'],['TikTok','♪'],['GitHub','GH']] as $i => [$name,$icon]) {
            SocialLink::query()->updateOrCreate(['name' => $name], ['url' => '#', 'icon' => $icon, 'placement' => $name === 'GitHub' ? 'contact' : 'both', 'sort_order' => $i + 1, 'is_active' => true]);
        }
    }
}
