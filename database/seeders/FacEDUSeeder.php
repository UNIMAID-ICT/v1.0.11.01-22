<?php

namespace Database\Seeders;
use App\Models\Department;
use App\Models\Program;
use App\Models\School;
use Illuminate\Database\Seeder;

class FacEDUSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                // Faculty of Education
       
                // pROGRAM SECTION
        
                    Program::create([
                        'pro_title'       => 'ARABIC EDUCATION',
                        'pro_code'        => 'ARBEDU',
                        'codegen'        => 'ARTEDUDEPT',
                        'created_at'  => now(),
                        'updated_at'  => now()
                        ]);        
                    Program::create([
                        'pro_title'       => 'ART EDUCATION',
                        'pro_code'        => 'ARTEDU',
                        'codegen'        => 'ARTEDUDEPT',
                        'created_at'  => now(),
                        'updated_at'  => now()
                        ]);        
                    Program::create([
                        'pro_title'       => 'ENGLISH EDUCATION',
                        'pro_code'        => 'ENGEDU',
                        'codegen'        => 'ARTEDUDEPT',
                        'created_at'  => now(),
                        'updated_at'  => now()
                        ]);        
                    Program::create([
                        'pro_title'       => 'HAUSA EDUCATION',
                        'pro_code'        => 'HAUEDU',
                        'codegen'        => 'ARTEDUDEPT',
                        'created_at'  => now(),
                        'updated_at'  => now()
                        ]);        
                    Program::create([
                        'pro_title'       => 'HISTORY EDUCATION',
                        'pro_code'        => 'HISEDU',
                        'codegen'        => 'ARTEDUDEPT',
                        'created_at'  => now(),
                        'updated_at'  => now()
                        ]);        
                    Program::create([
                        'pro_title'       => 'ISLAMIC EDUCATION',
                        'pro_code'        => 'ISLEDU',
                        'codegen'        => 'ARTEDUDEPT',
                        'created_at'  => now(),
                        'updated_at'  => now()
                        ]);        
        
                // END programs ARTS EDUCATION
                
        
                    // program Continue Education
                    Program::create([
                        'pro_title'       => 'CONTINUING EDUCATION',
                        'pro_code'        => 'CEDU',
                        'codegen'        => 'CEDUDEPT',
                        'created_at'  => now(),
                        'updated_at'  => now()
                        ]);
        
                    Program::create([
                        'pro_title'       => 'EDUCATION',
                        'pro_code'        => 'EDU',
                        'codegen'        => 'CEDUDEPT',
                        'created_at'  => now(),
                        'updated_at'  => now()
                        ]);
        
                // END OF CONT EDU
        
            
        
                    Program::create([
                        'title'       => 'LIBRARY AND INFORMATION SCIENCE',
                        'code'        => 'LISEDU',
                        'codegen'        => 'LISDEPT',
                        'created_at'  => now(),
                        'updated_at'  => now()
                        ]);
                //END OF LIBRARY AND INFORMATION SCI 
        
                
                    Program::create([
                        'title'       => 'HEALTH EDUCATION',
                        'code'        => 'HEEDU',
                        'codegen'        => 'PHEDEPT',
                        'created_at'  => now(),
                        'updated_at'  => now()
                        ]);        
                    Program::create([
                        'title'       => 'PHYSICAL EDUCATION',
                        'code'        => 'PHYEDU',
                        'codegen'        => 'PHEDEPT',
                        'created_at'  => now(),
                        'updated_at'  => now()
                        ]);        
                // END PHE
        
        
             
                
                    Program::create([
                        'title'       => 'BIOLOGY EDUCATION',
                        'code'        => 'BIOEDU',
                        'codegen'        => 'SCEDUDEPT',
                        'created_at'  => now(),
                        'updated_at'  => now()
                        ]);           
                
                    Program::create([
                        'title'       => 'CHEMISTRY EDUCATION',
                        'code'        => 'CHEMEDU',
                        'codegen'        => 'SCEDUDEPT',
                        'created_at'  => now(),
                        'updated_at'  => now()
                        ]);           
                
                    Program::create([
                        'title'       => 'MATHEMATICS EDUCATION',
                        'code'        => 'MATHSEDU',
                        'codegen'        => 'SCEDUDEPT',
                        'created_at'  => now(),
                        'updated_at'  => now()
                        ]);           
                
                    Program::create([
                        'title'       => 'PHYSICS EDUCATION',
                        'code'        => 'PHYSICSEDU',
                        'codegen'        => 'SCEDUDEPT',
                        'created_at'  => now(),
                        'updated_at'  => now()
                        ]);           
                // END OF SCI EDU
        
        
               
        
                            
                    Program::create([
                        'title'       => 'ECONOMICS EDUCATION',
                        'code'        => 'ECOEDU',
                        'codegen'        => 'SSEDUDEPT',
                        'created_at'  => now(),
                        'updated_at'  => now()
                        ]);        
                        Program::create([
                            'title'       => 'GEOGRAPHY EDUCATION',
                            'code'        => 'GEOEDU',
                            'codegen'        => 'SSEDUDEPT',
                            'created_at'  => now(),
                            'updated_at'  => now()
                            ]);
        
                    // END OF SOS EDU
        
             
        
                    Program::create([
                        'title'       => 'AGRICULTURAL EDUCATION',
                        'code'        => 'AGREDU',
                        'codegen'        => 'VTEDUDEPT',
                        'created_at'  => now(),
                        'updated_at'  => now()
                        ]);
                    
                        Program::create([
                            'title'       => 'BUSINESS EDUCATION',
                            'code'        => 'BUSEDU',
                            'codegen'        => 'VTEDUDEPT',
                            'created_at'  => now(),
                            'updated_at'  => now()
                            ]);
                            
            $EDUdepts = Department::where('codeGen','EDU')->get();                
            $sch = School::find(9);
        
                    foreach($EDUdepts as $dept) {
                        $sch->departments()->attach($dept);
                    }

            $ARTEDUDEPTprograms = Program::where('codegen','ARTEDUDEPT')->get();        
            $CEDUDEPTprograms = Program::where('codegen','CEDUDEPT')->get();        
            $LISDEPTprograms = Program::where('codegen','LISDEPT')->get();        
            $PHEDEPTprograms = Program::where('codegen','PHEDEPT')->get();        
            $SCEDUDEPTprograms = Program::where('codegen','SCEDUDEPT')->get();        
            $SSEDUDEPTprograms = Program::where('codegen','SSEDUDEPT')->get();        
            $VTEDUDEPTprograms = Program::where('codegen','VTEDUDEPT')->get();        
            
            $dept17 = Department::find(17);
            $dept18 = Department::find(18);
            $dept19 = Department::find(19);
            $dept20 = Department::find(20);
            $dept21 = Department::find(21);
            $dept22 = Department::find(22);
            $dept23 = Department::find(23);


            foreach($ARTEDUDEPTprograms as $program) {
                $dept17->programs()->attach($program);
            }
            foreach($CEDUDEPTprograms as $program) {
                $dept18->programs()->attach($program);
            }
            foreach($LISDEPTprograms as $program) {
                $dept19->programs()->attach($program);
            }
            foreach($PHEDEPTprograms as $program) {
                $dept20->programs()->attach($program);
            }
            foreach($SCEDUDEPTprograms as $program) {
                $dept21->programs()->attach($program);
            }
            foreach($SSEDUDEPTprograms as $program) {
                $dept22->programs()->attach($program);
            }
            foreach($VTEDUDEPTprograms as $program) {
                $dept23->programs()->attach($program);
            }
    }
}
