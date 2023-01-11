<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class CreateSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = Setting::create([
            'title'                 => 'web Developer',
            'description'           => 'AASTMT BIS graduate - AMIT full-stack',
            'short_description'     => 'lives in nasr city',
            'phone'                 => '01010110457',
            'phone2'                => "01112554996",
            'email'                 => "kareemtarekpk@gmail.com",
            'whatsApp'              => "01010110457",
            'facebook'              => "https://www.facebook.com/kareemtarekpk",
            'twitter'               => "",
            'instagram'             => "",
            "user_id"               => 3,
        ]);
    }
}
