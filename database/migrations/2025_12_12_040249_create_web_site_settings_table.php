<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('web_site_settings', function (Blueprint $table) {
            $table->id();

            // // logo
            // $table->string('site_logo');
            // $table->string('site_favicon');

            // // admin
            // $table->string('admin_logo');
            // $table->string('admin_logo_favicon');

            // // contact

            // $table->string('site_name');
            // $table->string('site_email');
            // $table->string('site_phone');
            // $table->string('site_address');
            // $table->string('site_copyright');

            // // page title
            // $table->string('site_title');
            // $table->string('site_image');

            // // social link
            // $table->string('site_facebook');
            // $table->string('site_twitter');
            // $table->string('site_instagram');
            // $table->string('site_linkedin');
            // $table->string('site_youtube');

            // // social link on json
            // $table->json('site_social');

            // // Seo
            // $table->string('site_description');
            // $table->string('site_keywords');
            // $table->string('site_author');
            // $table->string('site_content');

            // // map
            // $table->string('site_map');
            // $table->string('site_color');
            // $table->string('site_theme');
            // $table->string('site_language');

            // // Mail Setting
            // $table->string('mail_driver');
            // $table->string('mail_host');
            // $table->string('mail_port');
            // $table->string('mail_username');
            // $table->string('mail_password');
            // $table->string('mail_encryption');
            // $table->string('mail_from_address');
            // $table->string('mail_from_name');

            $table->string('key')->unique();
            $table->longText('value')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('web_site_settings');
    }
};
