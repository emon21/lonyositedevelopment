<?php

namespace Database\Seeders;

use App\Models\WebSiteSetting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WebSiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

         $path = public_path('uploads/settings');

        // Delete all old images
        if (File::exists($path)) {
            File::cleanDirectory($path); // folder er vitore shob file delete hobe
        } else {
            File::makeDirectory($path, 0777, true, true); // folder na thakle create kore dibe
        }

        // $WebSiteSetting = [

        //      // logo
        //     'site_logo'         => 'uploads/settings/site_logo.png',
        //     'site_favicon'      => 'uploads/settings/site_favicon.png',

        //     // admin
        //     'admin_logo'        => 'uploads/settings/admin_logo.png',
        //     'admin_logo_favicon'=> 'uploads/settings/admin_logo_favicon.png',

        //     // contact
        //     'site_name'         => 'My Awesome Website',
        //     'site_email'        => 'info@example.com',
        //     'site_phone'        => '+8801700000000',
        //     'site_address'      => 'Dhaka, Bangladesh',
        //     'site_copyright'    => '© 2025 My Website. All Rights Reserved.',

        //     // page title
        //     'site_title'        => 'Welcome to My Website',
        //     'site_image'        => 'uploads/settings/site_image.jpg',

        //     // social links
        //     'site_facebook'     => 'https://facebook.com/mywebsite',
        //     'site_twitter'      => 'https://twitter.com/mywebsite',
        //     'site_instagram'    => 'https://instagram.com/mywebsite',
        //     'site_linkedin'     => 'https://linkedin.com/company/mywebsite',
        //     'site_youtube'      => 'https://youtube.com/mywebsite',

        //     // social json
        //     'site_social'       => json_encode([
        //         'facebook'  => 'https://facebook.com/mywebsite',
        //         'twitter'   => 'https://twitter.com/mywebsite',
        //         'instagram' => 'https://instagram.com/mywebsite',
        //         'linkedin'  => 'https://linkedin.com/company/mywebsite',
        //         'youtube'   => 'https://youtube.com/mywebsite',
        //     ]),

        //     // SEO
        //     'site_description'  => 'This is a demo website description.',
        //     'site_keywords'     => 'laravel, website, demo, seo',
        //     'site_author'       => 'Dev Hasib',
        //     'site_content'      => 'This is demo website content.',

        //     // map
        //     'site_map'          => 'https://maps.google.com/demo',
        //     'site_color'        => '#ff5722',
        //     'site_theme'        => 'light',
        //     'site_language'     => 'en',

        //     // Mail Settings
        //     'mail_driver'       => 'smtp',
        //     'mail_host'         => 'smtp.mailtrap.io',
        //     'mail_port'         => '2525',
        //     'mail_username'     => 'mailtrap_user',
        //     'mail_password'     => 'mailtrap_pass',
        //     'mail_encryption'   => 'tls',
        //     'mail_from_address' => 'noreply@example.com',
        //     'mail_from_name'    => 'My Website',
        // ];

        // # delete Data
        WebSiteSetting::truncate();

        // # Insert Data
        // WebSiteSetting::insert($WebSiteSetting);


        $settings = [
            'site_name' => 'My Website',
            'site_email' => 'info@example.com',
            'site_phone' => '0123456789',
            'site_title' => 'Laravel Website',
            'site_language' => 'en',
            'site_theme' => 'light',
            'mail_driver' => 'smtp',
            'mail_host' => 'smtp.gmail.com',
            'mail_port' => '587',
            'mail_encryption' => 'tls',
            'mail_from_address' => 'no-reply@example.com',
            'mail_from_name' => 'My Website',
            
            // 'site_logo' => null,
            // 'site_favicon' => null,
            // 'admin_logo' => null,
            // 'admin_favicon' => null,
            // 'admin_favicon' => null,
            // 'site_image' => null,

        ];

        foreach ($settings as $key => $value) {
            WebSiteSetting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }
    }
}
