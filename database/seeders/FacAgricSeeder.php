<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Program;
use App\Models\School;

use Illuminate\Database\Seeder;

class FacAgricSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Faculty of Agriculture 





                Program::create([
                    'pro_title'       => 'Agric Economics and Extension',
                    'pro_code'        => 'AGE',
                    'codegen'        => 'AGR',
                    'created_at'  => now(),
                    'updated_at'  => now()
                    ]);

                Program::create([
                    'pro_title'       => 'Agric Extension',
                    'pro_code'        => 'AGX',
                    'codegen'        => 'AGR',
                    'created_at'  => now(),
                    'updated_at'  => now()
                    ]);
        
                    Program::create([
                        'pro_title'       => 'Agriculture', 
                        'pro_code'        => 'AGR',
                        'codegen'        => 'AGR',
                        'created_at'  => now(),
                        'updated_at'  => now()
                        ]);
            
                    Program::create([
                        'pro_title'        => 'Animal Science',
                        'pro_code'         => 'ANS',
                        'codegen'        => 'AGR',
                        'created_at'   => now(),
                        'updated_at'   => now()
                        ]);

                    Program::create([
                        'pro_title'       => 'CROP PRODUCTION',
                        'pro_code'        => 'CP',
                        'codegen'        => 'AGR',
                        'created_at'  => now(),
                        'updated_at'  => now()
                        ]);

                    Program::create([
                        'pro_title'       => 'CROP PROTECTION',
                        'pro_code'        => 'CPRT',
                        'codegen'        => 'AGR',
                        'created_at'  => now(),
                        'updated_at'  => now()
                        ]);

                    Program::create([
                        'pro_title'       => 'SOIL SCIENCE',
                        'pro_code'        => 'SOS',
                        'codegen'        => 'AGR',
                        'created_at'  => now(),
                        'updated_at'  => now()
                        ]);
        
        
                Program::create([
                    'pro_title'       => 'FISHERIES',
                    'pro_code'        => 'FISH',
                    'codegen'        => 'FISH',
                    'created_at'  => now(),
                    'updated_at'  => now()
                    ]);
        
                Program::create([
                    'pro_title'       => 'FORESTRY AND WILDLIFE',
                    'pro_code'        => 'FORWILD',
                    'codegen'        => 'FORWILD',
                    'created_at'  => now(),
                    'updated_at'  => now()
                    ]);
        
            $depts = Department::where('codeGen','FAGR')->get();                
            $sch = School::find(2);

            foreach($depts as $dept) {
                $sch->departments()->attach($dept);
            }
                    

            $Agrprograms = Program::where('codegen','AGR')->get();
            $FISHprograms = Program::where('codegen','FISH')->get();
            $FORWILDprograms = Program::where('codegen','FORWILD')->get();

            $dept = Department::find(1);
            $dept2 = Department::find(2);
            $dept3 = Department::find(3);

            foreach($Agrprograms as $program) {
                $dept->programs()->attach($program);
            }

            foreach($FISHprograms as $program) {
                $dept2->programs()->attach($program);
            }

            foreach($FORWILDprograms as $program) {
                $dept3->programs()->attach($program);
            }
    
    
        //end Agriculture Fac
    }
}
