<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Program;
use App\Models\School;

use Illuminate\Database\Seeder;

class FacArtsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
    // Depart of Arts 


            
// Arabic and islamic studies skipped

        Program::create([
            'pro_title'       => 'Creative Arts',
            'pro_code'        => 'CRTS',
            'codegen'        => 'CARTSDEPT',
            'created_at'  => now(),
            'updated_at'  => now()
            ]);

        Program::create([
            'pro_title'       => 'ENGLISH',
            'pro_code'        => 'ENG',
            'codegen'        => 'ENGDEPT',
            'created_at'  => now(),
            'updated_at'  => now()
            ]);

        Program::create([
            'pro_title'       => 'HISTORY',
            'pro_code'        => 'HIS',
            'codegen'        => 'HISDEPT',
            'created_at'  => now(),
            'updated_at'  => now()
            ]);

        Program::create([
            'pro_title'       => 'LANGUAGES AND LINGUISTICS',
            'pro_code'        => 'LL',
            'codegen'        => 'LLDEPT',
            'created_at'  => now(),
            'updated_at'  => now()
            ]);

        Program::create([
            'pro_title'       => 'LINGUISTIC FRENCH',
            'pro_code'        => 'LLF',
            'codegen'        => 'LLFDEPT',
            'created_at'  => now(),
            'updated_at'  => now()
            ]);

        Program::create([
            'pro_title'       => 'LINGUISTIC FULFULDE',
            'pro_code'        => 'LLFF',
            'codegen'        => 'LLFFDEPT',
            'created_at'  => now(),
            'updated_at'  => now()
            ]);

        Program::create([
            'pro_title'       => 'LINGUISTIC HAUSA',
            'pro_code'        => 'LLHAU',
            'codegen'        => 'LLHAUDEPT',
            'created_at'  => now(),
            'updated_at'  => now()
            ]);

        Program::create([
            'pro_title'       => 'LINGUISTIC KANURI',
            'pro_code'        => 'LLKN',
            'codegen'        => 'LLKNDEPT',
            'created_at'  => now(),
            'updated_at'  => now()
            ]);

        Program::create([
            'pro_title'       => 'VISUAL AND PERFORMING ARTS',
            'pro_code'        => 'VPA',
            'codegen'        => 'VPADEPT',
            'created_at'  => now(),
            'updated_at'  => now()
            ]);

    $LLdepts = Department::where('codeGen','ARTS')->get();                
    $sch = School::find(3);

            foreach($LLdepts as $dept) {
                $sch->departments()->attach($dept);
            }

    $CARTSDEPTprograms = Program::where('codegen','CARTSDEPT')->get();
    $ENGDEPTprograms = Program::where('codegen','ENGDEPT')->get();
    $HISDEPTprograms = Program::where('codegen','HISDEPT')->get();
    $LLDEPTprograms = Program::where('codegen','LLDEPT')->get();
    $LLFDEPTprograms = Program::where('codegen','LLFDEPT')->get();
    $LLFFDEPTprograms = Program::where('codegen','LLFFDEPT')->get();
    $LLHAUDEPTprograms = Program::where('codegen','LLHAUDEPT')->get();
    $LLKNDEPTprograms = Program::where('codegen','LLKNDEPT')->get();
    $VPADEPTprograms = Program::where('codegen','VPADEPT')->get();


    $dept4 = Department::find(4);
    $dept5 = Department::find(5);
    $dept6 = Department::find(6);
    $dept7 = Department::find(7);
    $dept8 = Department::find(8);
    $dept9 = Department::find(9);

    foreach($CARTSDEPTprograms as $program) {
        $dept6->programs()->attach($program);
    }
    foreach($ENGDEPTprograms as $program) {
        $dept7->programs()->attach($program);
    }
    foreach($HISDEPTprograms as $program) {
        $dept8->programs()->attach($program);
    }
    foreach($LLDEPTprograms as $program) {
        $dept9->programs()->attach($program);
    }
    foreach($LLFDEPTprograms as $program) {
        $dept9->programs()->attach($program);
    }
    foreach($LLFFDEPTprograms as $program) {
        $dept9->programs()->attach($program);
    }
    foreach($LLHAUDEPTprograms as $program) {
        $dept9->programs()->attach($program);
    }
    foreach($LLKNDEPTprograms as $program) {
        $dept9->programs()->attach($program);
    }

    foreach($VPADEPTprograms as $program) {
        $dept9->programs()->attach($program);
    }


//end Faculty of Arts
    }
}
