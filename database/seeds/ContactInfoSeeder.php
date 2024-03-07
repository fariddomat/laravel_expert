<?php

use Illuminate\Database\Seeder;
use App\ContactInfo;

class ContactInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ContactInfo = new ContactInfo();
        $ContactInfo->mobile = '00963666666666';
        $ContactInfo->email = 'info@project.com';
        $ContactInfo->whatsapp = '+963666666666';
        $ContactInfo->location_link = 'https://goo.gl/maps/';
        $ContactInfo->translateOrNew('en')->location = 'Syria';
        $ContactInfo->translateOrNew('ar')->location = 'سوريا';
        $ContactInfo->save();
    }
}
