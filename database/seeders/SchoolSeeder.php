<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\School;
use App\Models\Program;
use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
 
    School::create([
            'school_title' => 'College of Medical Sciences',
            'school_code'  => 'CMS',
            'school_no'  => '01',           
            'created_at'   => now(),
            'updated_at'   => now() 
        ]);

    School::create([
            'school_title' => 'Faculty of Allied Health Sciences',
            'school_code' => 'AHS',
            'school_no' => '01',         
            'created_at'  => now(),
            'updated_at'  => now()
        ]);

    School::create([
            'school_title' => 'Faculty of Basic Medical Sciences',
            'school_code' => 'BMS',
            'school_no' => '01',         
            'created_at'  => now(),
            'updated_at'  => now()
        ]);


    School::create([
            'school_title' => 'Faculty of Clinical Science',
            'school_code' => 'CC',
            'school_no' => '01',         
            'created_at'  => now(),
            'updated_at'  => now()
        ]);

    School::create([
            'school_title' => 'Faculty of Basic Clinical Sciences',
            'school_code' => 'BSC',
            'school_no' => '01',         
            'created_at'  => now(),
            'updated_at'  => now()
        ]);


    School::create([
            'school_title' => 'Faculty of Dentistry',
            'school_code' => 'DEN',
            'school_no' => '01',         
            'created_at'  => now(),
            'updated_at'  => now()
        ]);

    School::create([
        'school_title' => 'Faculty of Agriculture',
        'school_code'  => 'AGR',
        'school_no'  => '02',          
        'created_at'   => now(),
        'updated_at'   => now()
        ]);

        School::create([
            'school_title' => 'Faculty of Arts', 
            'school_code' => 'ARTS',
            'school_no' => '03',         
            'created_at'  => now(),
            'updated_at'  => now()
        ]);
    
        School::create([
            'school_title' => 'Faculty of Engineering', 
            'school_code' => 'ENG',
            'school_no' => '05',         
            'created_at'  => now(),
            'updated_at'  => now()
        ]);

        School::create([
            'school_title' => 'Faculty of Science', 
            'school_code' => 'SCI',
            'school_no' => '08',         
            'created_at'  => now(),
            'updated_at'  => now()
        ]);

        School::create([
            'school_title' => 'Faculty of Veterinary Medicine',
            'school_code' => 'VET',
            'school_no' => '10',         
            'created_at'  => now(),
            'updated_at'  => now()
        ]);

        School::create([
            'school_title' => 'Faculty of Pharmacy', 
            'school_code' => 'PHARM',
            'school_no' => '11',         
            'created_at'  => now(),
            'updated_at'  => now()
        ]);
        

        School::create([
            'school_title' => 'Faculty of Environmental Studies',
            'school_code' => 'ENS',
            'school_no' => '12',         
            'created_at'  => now(),
            'updated_at'  => now()
        ]);


        School::create([
            'school_title' => 'Faculty of Social Sciences',
            'school_code' => 'SOS',
            'school_no' => '09',         
            'created_at'  => now(),
            'updated_at'  => now()
        ]);

        School::create([
            'school_title' => 'General Studies',
            'school_code' => 'GST',
            'school_no' => '13',         
            'created_at'  => now(),
            'updated_at'  => now()
        ]);


        School::create([
            'school_title' => 'Faculty of Education', 
            'school_code' => 'EDU',
            'school_no' => '04',         
            'created_at'  => now(),
            'updated_at'  => now()
        ]);

        School::create([
            'school_title' => 'Faculty of Law',
            'school_code' => 'LAW',
            'school_no' => '06',         
            'created_at'  => now(),
            'updated_at'  => now()
        ]);

        School::create([
            'school_title' => 'Faculty of Management Sciences',
            'school_code' => 'MGT',
            'school_no' => '07',         
            'created_at'  => now(),
            'updated_at'  => now()
        ]);

    }
}


