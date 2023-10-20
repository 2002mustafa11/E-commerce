<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    protected $settings = [
        [
            'key'                       =>  'site_name',
            'value'                     =>  'E-Commerce Application',
        ],
        [
            'key'                       =>  'site_title',
            'value'                     =>  'E-Commerce',
        ],
        [
            'key'                       =>  'default_email_address',
            'value'                     =>  'admin@admin.com',
        ],
        [
            'key'                       =>  'default_phone',
            'value'                     =>  '+ 01235 2355 98',
        ],
        [
            'key'                       =>  'currency_code',
            'value'                     =>  'EG',
        ],
        [
            'key'                       =>  'currency_symbol',
            'value'                     =>  'EG',
        ],
        [
            'key'                       =>  'site_logo',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'Delivery',
            'value'                     =>  '20',
        ],
        [
            'key'                       =>  'Discount',
            'value'                     =>  '0',
        ],
        [
            'key'                       =>  'site_favicon',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'background_image1',
            'value'                     =>  'bg_1.jpg',
        ],
        [
            'key'                       =>  'background_image2',
            'value'                     =>  'bg_2.jpg',
        ],
        [
            'key'                       =>  'background_text1',
            'value'                     =>  'We serve Fresh Vegestables &amp; Fruits',
        ],
        [
            'key'                       =>  'background_text2',
            'value'                     =>  '100% Fresh &amp; Organic Foods',
        ],
        [
            'key'                       =>  'footer_copyright_text',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'seo_meta_title',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'seo_meta_description',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'social_facebook',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'social_twitter',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'social_instagram',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'google_analytics',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'facebook_pixels',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'stripe_payment_method',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'stripe_key',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'stripe_secret_key',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'paypal_payment_method',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'paypal_client_id',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'paypal_secret_id',
            'value'                     =>  '',
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->settings as $index => $setting)
        {
            $result = Setting::create($setting);
            if (!$result) {
                $this->command->info("Insert failed at record $index.");
                return;
            }
        }
        $this->command->info('Inserted '.count($this->settings). ' records');
    }

}
