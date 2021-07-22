<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\School;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        // $mdds1 =  Department::create([
        //             'dept_title' => 'ANATOMY', 
        //             'dept_code'  => 'ANT',
        //             'codeGen'        => 'CMS',
        //             'created_at'  => now(),
        //             'updated_at'  => now()
        // ]);
                
        // $mdds2 = Department::create([
        //         'dept_title' => 'DENTAL SURGERY', 
        //         'dept_code'  => 'DNTS',
        //         'codeGen'        => 'CMS',
        //         'created_at'  => now(),
        //         'updated_at'  => now()
        // ]);

        // $mdds3 = Department::create([
        //             'dept_title' => 'MEDICINE & SURGERY', 
        //             'dept_code'  => 'MS',
        //             'codeGen'        => 'CMS',
        //             'created_at'  => now(),
        // ]);

        // $mdds4 = Department::create([
        //             'dept_title' => 'MEDICAL LAB SCIENCES', 
        //             'dept_code'  => 'MLS',
        //             'codeGen'        => 'CMS',
        //             'created_at'  => now(),
        //             'updated_at'  => now()
        // ]);

        // $mdds5 =  Department::create([
        //         'dept_title' => 'PHYSIOTHERAPHY', 
        //         'dept_code'  => 'PHYST',
        //         'codeGen'        => 'CMS',
        //         'created_at'  => now(),
        //         'updated_at'  => now()
        // ]);
                        
        // $mdds6 = Department::create([
        //     'dept_title' => 'RADIOGRAPHY', 
        //     'dept_code'  => 'RDG',
        //     'codeGen'        => 'CMS',
        //     'created_at'  => now(),
        //     'updated_at'  => now()
        // ]);

        // $sch = School::find(1);
        // $sch->departments()->save($mdds1);
        // $sch->departments()->save($mdds2);
        // $sch->departments()->save($mdds3);
        // $sch->departments()->save($mdds4);
        // $sch->departments()->save($mdds5);
        // $sch->departments()->save($mdds6);


        $Agr1 =  Department::create([
                'dept_title'       => 'AGRICULTURE',
                'dept_code'        => 'AGR',
                'dept_no'        => '01',
                'codeGen'        => 'FAGR',
                'created_at'  => now(),
                'updated_at'  => now()
        ]);

        $Agr2 = Department::create([
                'dept_title'       => 'FISHERIES',
                'dept_code'        => 'FIS',
                'dept_no'        => '02',
                'codeGen'        => 'FAGR',
                'created_at'  => now(),
                'updated_at'  => now()
        ]);

        $Agr3 = Department::create([
                'dept_title'       => 'FORESTRY AND WILDLIFE',
                'dept_code'        => 'FOW',
                'dept_no'        => '04',
                'codeGen'        => 'FAGR',
                'created_at'  => now(),
                'updated_at'  => now()
        ]);
                
        $sch = School::find(2);

        $sch->departments()->save($Agr1);
        $sch->departments()->save($Agr2);
        $sch->departments()->save($Agr3);


        $art1 = Department::create([
                'dept_title' => 'Arabic', 
                'dept_code'  => 'ARA',
                'dept_no'  => '01',
                'codeGen'        => 'ARTS',
                'created_at'  => now(),
                'updated_at'  => now()
        ]);


        $art2 = Department::create([
                'dept_title' => 'Islamic Studies', 
                'dept_code' => 'ISL',
                'dept_no'  => '07',
                'codeGen'        => 'ARTS',
                'created_at'  => now(),
                'updated_at'  => now()
        ]);

        $art3 =  Department::create([
                'dept_title' => 'Creative Arts', 
                'dept_code' => 'CRA',
                // 'dept_no'  => '01',
                'codeGen'        => 'ARTS',
                'created_at'  => now(),
                'updated_at'  => now()
        ]);

        $art4 = Department::create([
                'dept_title' => 'English', 
                'dept_code' => 'ENG',
                'dept_no'  => '02',
                'codeGen'        => 'ARTS',
                'created_at'  => now(),
                'updated_at'  => now()
        ]);

        $art5 = Department::create([
                'dept_title' => 'History', 
                'dept_code' => 'HIS',
                'dept_no'  => '04',
                'codeGen'        => 'ARTS',
                'created_at'  => now(),
                'updated_at'  => now()
        ]);

        $art6 = Department::create([
                'dept_title' => 'LANGUAGES AND LINGUISTICS', 
                'dept_code' => 'LL',
                'dept_no'  => '06',
                'codeGen'        => 'ARTS',
                'created_at'  => now(),
                'updated_at'  => now()
        ]);

        $sch = School::find(3);
        $sch->departments()->save($art1);
        $sch->departments()->save($art2);
        $sch->departments()->save($art3);
        $sch->departments()->save($art4);
        $sch->departments()->save($art5);
        $sch->departments()->save($art6);


        $edu1 = Department::create([
                'dept_title' => 'ARTS EDUCATION',
                'dept_code'  => 'ARTEDU',
                // 'dept_no'  => '',
                'codeGen'        => 'EDU',
                'created_at'  => now(),
                'updated_at'  => now()
        ]);


        $edu2 = Department::create([
                'dept_title' => 'CONTINUING EDUCATION',
                'dept_code'  => 'CEA',
                'codeGen'        => 'EDU',
                'created_at'  => now(),
                'updated_at'  => now()
        ]);

        $edu3 = Department::create([
                'dept_title' => 'LIBRARY AND INFORMATION SCIENCE',
                'dept_code'  => 'LIS',
                'codeGen'        => 'EDU',
                'created_at'  => now(),
                'updated_at'  => now()
        ]);

        $edu4 = Department::create([
                'dept_title' => 'PHYSICAL AND HEALTH EDUCATION',
                'dept_code'  => 'PHE',
                'codeGen'        => 'EDU',
                'created_at'  => now(),
                'updated_at'  => now()
        ]);
        
        $edu5 = Department::create([
                'dept_title' => 'SCIENCE EDUCATION',
                'dept_code'  => 'SCIEDU',
                'codeGen'        => 'EDU',
                'created_at'  => now(),
                'updated_at'  => now()
        ]);

        $edu6 = Department::create([
                'dept_title' => 'VOCATIONAL AND TECHNICAL EDUCATION',
                'dept_code'  => 'VTE',
                'codeGen'        => 'EDU',
                'created_at'  => now(),
                'updated_at'  => now()
        ]);

        $edu7 = Department::create([
                'dept_title' => 'SOCIAL SCIENCE EDUCATION',
                'dept_code'  => 'SSEDU',
                'codeGen'        => 'EDU',
                'created_at'  => now(),
                'updated_at'  => now()
        ]);

        $sch = School::find(4);
        $sch->departments()->save($edu1);
        $sch->departments()->save($edu2);
        $sch->departments()->save($edu3);
        $sch->departments()->save($edu4);
        $sch->departments()->save($edu5);
        $sch->departments()->save($edu6);
        $sch->departments()->save($edu7);






Department::create([
'dept_title' => 'Accounting', 
'dept_code'  => 'ACC',

'created_at'  => now(),
'updated_at'  => now()
]);

Department::create([
'dept_title' => 'Adult Education',
'dept_code'  => 'ADE',

'created_at'  => now(),
'updated_at'  => now()
]);



Department::create([
'dept_title' => 'Anaesthesia', 
'dept_code'  => 'ANE',

'created_at'  => now(),
'updated_at'  => now()
]);

// Department::create([
//     'dept_title' => 'Anatomy', 
//     'dept_code'  => 'ANA',

//     'created_at'  => now(),
//     'updated_at'  => now()
//     ]);

Department::create([
'dept_title' => 'Architecture', 
'dept_code'  => 'ARC',

'created_at'  => now(),
'updated_at'  => now()
]);

Department::create([
'dept_title' => 'Banking and Finance',
'dept_code' => 'FIN',
    'created_at'  => now(),
'updated_at'  => now()
]);

Department::create([
'dept_title' => 'Biochemistry', 
'dept_code'  => 'BCH',

'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Biological Sciences',
'dept_code'  => 'BIO',

    'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Building', 
'dept_code'  => 'BNG',

'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Business Administration',
'dept_code'  => 'BUA',

'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Business Management',
'dept_code'  => 'BMGT',

'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Chemical Engineering',
'dept_code'  => 'CHE',

'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Chemical Pathology',
'dept_code' => 'CPT',

'created_at'  => now(),
'updated_at'  => now()
]);



// 40
Department::create([
'dept_title' => 'Civil Engineering', 
'dept_code' => 'CWE',

'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Clinical Pharmacology and Therapeutics', 
'dept_code' => 'PCT',

'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Clinical Pharmacy and Pharmacy Administration',
'dept_code' => 'PCP',

'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Community Medicine', 
'dept_code' => 'COM',

'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Computer Engineering', 
'dept_code' => 'CPE',

'created_at'  => now(),
'updated_at'  => now()
]);


// Department::create([
//     'dept_title' => 'Continuing Education', 
//     'dept_code' => 'CEA',

//     'created_at'  => now(),
//     'updated_at'  => now()
//     ]);





Department::create([
'dept_title' => 'Crop Production', 
'dept_code' => 'CRS',

'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Crop Protection', 
'dept_code' => 'CRP',
'created_at'  => now(),
'updated_at'  => now()
]);


// Department::create([
// 'dept_title' => 'Dental Surgery', 
// 'dept_code' => 'BDS',
// 'created_at'  => now(),
// 'updated_at'  => now()
// ]);


Department::create([
'dept_title' => 'Economics', 
'dept_code' => 'ECO',
    'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Education',
'dept_code' => 'EDU',
    'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Electrical and Electronics Engineering', 
'dept_code' => 'EEE',
'created_at'  => now(),
'updated_at'  => now()
]);





Department::create([
'dept_title' => 'ENT Surgery', 
'dept_code' => 'ENT',
'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Estate Management',
'dept_code' => 'EMT',
    'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Fine Arts', 
'dept_code' => 'FAT',
'created_at'  => now(),
'updated_at'  => now()
]);





Department::create([
'dept_title' => 'Food Science and Technology', 
'dept_code' => 'FST',
'created_at'  => now(),
'updated_at'  => now()
]);


// Department::create([
// 'dept_title' => 'Forestry and Wildlife', 
// 'dept_code' => 'FOW',
// 'created_at'  => now(),
// 'updated_at'  => now()
// ]);


Department::create([
'dept_title' => 'Geography',
'dept_code' => 'GEO',
'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Geology', 
'dept_code' => 'GEY',
'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Geomatics',
'dept_code' => 'GMT',
            'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Glass and Silicate Technology', 
'dept_code' => 'GST',
            'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Hematology', 
'dept_code' => 'HEM',
            'created_at'  => now(),
'updated_at'  => now()
]);





Department::create([
'dept_title' => 'Human Pathology', 
'dept_code' => 'PAT',
            'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Industrial Design', 
'dept_code' => 'IND',
            'created_at'  => now(),
'updated_at'  => now()
]);






// Department::create([
//     'dept_title' => 'LANGUAGES AND LINGUISTICS', 
//     'dept_code' => 'LL',
//     'codeGen'        => 'ARTS',
//     'created_at'  => now(),
//     'updated_at'  => now()
//     ]);    


Department::create([
'dept_title' => 'LAW', 
'dept_code' => 'PRLAW',

'created_at'  => now(),
'updated_at'  => now()
]);


// Department::create([
//     'dept_title' => 'Library and Information Science',
//     'dept_code' => 'LIS',
//               'created_at'  => now(),
//     'updated_at'  => now()
//     ]);


Department::create([
'dept_title' => 'Management',
'dept_code' => 'MGT',
            'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Marketing',
'dept_code' => 'MKT',
            'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Mass Communication', 
'dept_code' => 'MCM',
            'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' =>  'Mathematical Sciences',
'dept_code' => 'MATH',

'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Mechanical Engineering', 
'dept_code' => 'MEE',
            'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' =>  'Medical Biochemistry',
'dept_code' => 'M-BCH',

'created_at'  => now(),
'updated_at'  => now()
]);




Department::create([
'dept_title' => 'Medical Microbiology',
'dept_code' => 'MMB',
            'created_at'  => now(),
'updated_at'  => now()
]);




//  48

Department::create([
'dept_title' => 'Medical Radiography', 
'dept_code' => 'M-RAD',

'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Medicine', 
'dept_code' => 'MED',
            'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' =>  'Medicine & Surgery', 
'dept_code' => 'MBBS',

'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Mental Health', 
'dept_code' => 'MTH',
            'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Microbiology', 
'dept_code' => 'MCB',
            'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Nursing',  
'dept_code' => 'NSC',
            'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Obstetrics and Gynaecology', 
'dept_code' => 'O&G',
            'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Ophthalmology',  
'dept_code' => 'OPT',
            'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Oral and Maxillofacial Surgery',
'dept_code' => 'OMS',
            'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Orthopaedics',  
'dept_code' => 'OPD',
            'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Paediatrics',  
'dept_code' => 'PDT',
            'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Pharmaceutical Chemistry', 
'dept_code' => 'PCH',
            'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Pharmacognosy',  
'dept_code' => 'PCG',
            'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Pharmacology and Toxicology', 
'dept_code' => 'PCL',
            'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Pharmacy', 
'dept_code' => 'PHARM',

'created_at'  => now(),
'updated_at'  => now()
]);


// Department::create([
//     'dept_title' => 'Physical and Health Education',
//     'dept_code' => 'PHE',
//               'created_at'  => now(),
//     'updated_at'  => now()
//     ]);


Department::create([
'dept_title' => 'Physics',  
'dept_code' => 'PHY',
            'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Physiology',  
'dept_code' => 'PYH',
            'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Physiotherapy',  
'dept_code' => 'MRH',
            'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Political Science', 
'dept_code' => 'PLS',
            'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Preventive Dentistry', 
'dept_code' => 'PVD',
            'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Psychiatry',  
'dept_code' => 'PSY',
            'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Public Administration', 
'dept_code' => 'PAD',
            'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Public Law', 
'dept_code' => 'PBLAW',

'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Pure and Applied Chemistry',
'dept_code' => 'CHM',
            'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Quantity Surveying', 
'dept_code' => 'QSG',
            'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Radiography', 
'dept_code' => 'RAD',
            'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Restorative Dentistry', 
'dept_code' => 'RTD',
            'created_at'  => now(),
'updated_at'  => now()
]);


// Department::create([
//     'dept_title' => 'Science Education', 
//     'dept_code' => 'SCIEDU',

//     'created_at'  => now(),
//     'updated_at'  => now()
//     ]);


Department::create([
'dept_title' => 'Sharia Law', 
'dept_code' => 'LWS',
            'created_at'  => now(),
'updated_at'  => now()
]);


// Department::create([
//     'dept_title' => 'Social Science Education',
//     'dept_code' => 'SOSEDU',

//     'created_at'  => now(),
//     'updated_at'  => now()
//     ]);


Department::create([
'dept_title' => 'Sociology and Anthropology', 
'dept_code' => 'SOC',
            'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Soil Science', 
'dept_code' => 'SOS',
            'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Surgery', 
'dept_code' => 'SUG',
            'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Theatre Arts', 
'dept_code' => 'THA',
            'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Theriogenology',  
'dept_code' => 'THR',
            'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Urban and Regional Planning',
'dept_code' => 'URP',
            'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Veterinary Anatomy', 
'dept_code' => 'VAN',
            'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Veterinary Medicine', 
'dept_code' => 'VET',
            'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Veterinary Microbiology', 
'dept_code' => 'VMB',
            'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Veterinary Parasitology and Entomology',
'dept_code' => 'VPE',
            'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Veterinary Pathology', 
'dept_code' => 'VPT',
            'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Veterinary Pharmacology and Toxicology',
'dept_code' => 'VPX',
            'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Veterinary Physiology and Entomology',
'dept_code' => 'VPP-VPB',

'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Veterinary Public Health and Preventive',
'dept_code' => 'VPH',
            'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Veterinary Surgery and Radiology',
'dept_code' => 'VSR',
            'created_at'  => now(),
'updated_at'  => now()
]);


Department::create([
'dept_title' => 'Visual and Performing Arts',
'dept_code' => 'VPA',
            'created_at'  => now(),
'updated_at'  => now()
]);


// Department::create([
//     'dept_title' => 'VOCATIONAL AND TECHNICAL EDUCATION', 
//     'dept_code' => 'VTE',
//               'created_at'  => now(),
//     'updated_at'  => now()
//     ]);



        
    }
}

