<?php

use Illuminate\Database\Seeder;
use App\SocialMedia;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SocialMedia::insert([
            [
                'name' => 'Instagram',
                'icon' => 'fa-instagram',
                'link' => 'https://www.instagram.com/project/',
            ],
            [
                'name' => 'Twitter',
                'icon' => 'fa-twitter',
                'link' => 'https://twitter.com/project',
            ],
            [
                'name' => 'Linkedin',
                'icon' => 'fa-linkedin',
                'link' => 'https://www.linkedin.com/company/project-est',
            ],
            [
                'name' => 'Snapchat',
                'icon' => 'fa-snapchat',
                'link' => '#',
            ],
            [
                'name' => 'Youtube',
                'icon' => 'fa-youtube',
                'link' => 'https://www.youtube.com/channel/project',
            ],
            [
                'name' => 'Facebook',
                'icon' => 'fa-facebook-f',
                'link' => 'https://www.facebook.com/project',
            ],
            [
                'name' => 'Tiktok',
                'icon' => 'fa-tiktok',
                'link' => 'https://www.tiktok.com/@project',
            ],
        ]);
    }
}
