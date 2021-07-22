<?php

namespace Database\Seeders;
use App\Models\Department;
use App\Models\Program;
use App\Models\School;

use Illuminate\Database\Seeder;

class FacMedSciSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // College of Medical Sciences

        Program::create([
            'title'       => 'ANATOMY',
            'code'        => 'ANT',
            'codegen'        => 'ANTDEPT',
            'created_at'  => now(),
            'updated_at'  => now()
            ]);

        Program::create([
            'title'       => 'DENTAL SURGERY',
            'code'        => 'DNTS',
            'codegen'        => 'DNTSEPT',
            'created_at'  => now(),
            'updated_at'  => now()
            ]);

   
        Program::create([
            'title'       => 'MEDICINE & SURGERY',
            'code'        => 'MS',
            'codegen'        => 'MSDEPT',
            'created_at'  => now(),
            'updated_at'  => now()
            ]);


        Program::create([
            'title'       => 'MEDICAL LAB SCIENCES',
            'code'        => 'MLS',
            'codegen'        => 'MLSDEPT',
            'created_at'  => now(),
            'updated_at'  => now()
            ]);
        

        Department::create([
            'title' => 'NURSING', 
            'code'  => 'NRS',
            'codeGen'        => 'CMS',
            'created_at'  => now(),
            'updated_at'  => now()
            ]);
        Program::create([
            'title'       => 'NURSING',
            'code'        => 'NRS',
            'codegen'        => 'NRSDEPT',
            'created_at'  => now(),
            'updated_at'  => now()
            ]);


        Program::create([
            'title'       => 'PHYSIOTHERAPHY',
            'code'        => 'PHYST',
            'codegen'        => 'PHYSTDEPT',
            'created_at'  => now(),
            'updated_at'  => now()
            ]);

        Program::create([
            'title'       => 'RADIOGRAPHY',
            'code'        => 'RDG',
            'codegen'        => 'RDGDEPT',
            'created_at'  => now(),
            'updated_at'  => now()
            ]);

            $CMSdepts = Department::where('codeGen','CMS')->get();                
            $sch = School::find(1);
        
                    foreach($CMSdepts as $dept) {
                        $sch->departments()->attach($dept);
                    }

             $ANTDEPTprograms = Program::where('codegen','ANTDEPT')->get();
             $DNTSEPTprograms = Program::where('codegen','DNTSEPT')->get();
             $MSDEPTprograms = Program::where('codegen','MSDEPT')->get();
             $MLSDEPTprograms = Program::where('codegen','MLSDEPT')->get();
             $NRSDEPTprograms = Program::where('codegen','NRSDEPT')->get();
             $PHYSTDEPTprograms = Program::where('codegen','PHYSTDEPT')->get();
             $RDGDEPTprograms = Program::where('codegen','RDGDEPT')->get();

            $dept10 = Department::find(10);
            $dept11 = Department::find(11);
            $dept12 = Department::find(12);
            $dept13 = Department::find(13);
            $dept14 = Department::find(14);
            $dept15 = Department::find(15);
            $dept16 = Department::find(16);


            foreach($ANTDEPTprograms as $program) {
                $dept10->programs()->attach($program);
            }
            foreach($DNTSEPTprograms as $program) {
                $dept11->programs()->attach($program);
            }
            foreach($MSDEPTprograms as $program) {
                $dept12->programs()->attach($program);
            }
            foreach($MLSDEPTprograms as $program) {
                $dept13->programs()->attach($program);
            }
            foreach($NRSDEPTprograms as $program) {
                $dept14->programs()->attach($program);
            }
            foreach($PHYSTDEPTprograms as $program) {
                $dept15->programs()->attach($program);
            }
            foreach($RDGDEPTprograms as $program) {
                $dept16->programs()->attach($program);
            }

    // End College of Medical Sciences
    }
}
