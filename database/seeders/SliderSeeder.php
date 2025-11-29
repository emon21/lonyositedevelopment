<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        # Slider

        $sliders = [
            [
                'title' => 'Welcome to Our Website',
                'description' => 'Discover our services and offerings. We are committed to providing the best experience for our customers.',
                'photo' => null,
                'link' => '/about-us',
            ],
            [
                'title' => 'Innovative Solutions for Your Business',
                'description' => 'We provide cutting-edge solutions tailored to your business needs. Let us help you achieve your goals.',
                'photo' => null,
                'link' => '/service',
            ],
            [
                'title' => 'Join Our Team of Experts',
                'description' => 'Be a part of a dynamic team that values innovation and excellence. Explore our career opportunities today.',
                'photo' => null,
                'link' => '/career',
            ],
            [
                'title' => 'Connect with Us',
                'description' => 'Stay connected with us for updates, insights, and more. Your voice matters to us.',
                'photo' => null,
                'link' => '/contact-us',
            ],
            [
                'title' => 'Discover Our Services',
                'description' => 'Explore our wide range of services and solutions. We are here to help you succeed.',
                'photo' => null,
                'link' => '/service',
            ],
            [
                'title' => 'Join Our Team',
                'description' => 'Be a part of our dynamic team and contribute to our success. Join us today!',
                'photo' => null,
                'link' => '/career',
            ],
            [
                'title' => 'Connect with Us',
                'description' => 'Stay connected with us for updates, insights, and more. Your voice matters to us.',
                'photo' => null,
                'link' => '/contact-us',
            ],
            [
                'title' => 'Discover Our Services',
                'description' => 'Explore our wide range of services and solutions. We are here to help you succeed.',
                'photo' => null,
                'link' => '/service',
            ],
            [
                'title' => 'Join Our Team',
                'description' => 'Be a part of our dynamic team and contribute to our success. Join us today!',
                'photo' => null,
                'link' => '/career',
            ],
            [
                'title' => 'Connect with Us',
                'description' => 'Stay connected with us for updates, insights, and more. Your voice matters to us.',
                'photo' => null,
                'link' => '/contact-us',
            ],

        ];

        // Delete Old Data
        Slider::truncate();


        // Slider create
        foreach ($sliders as $slider) {
            Slider::create($slider);
        }
    }
}
