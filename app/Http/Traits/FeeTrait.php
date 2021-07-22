<?php

namespace App\Http\Traits;

trait FeeTrait {

    public function add_minus() {

     // Social Sciences
        // Geography
        $this->department_id == 69 ? $this->minus  = 40000 : '';

        // Economics
        $this->department_id == 68 ? $this->minus  = 40000 : '';

        // mass come
        $this->department_id == 70 ? $this->minus  = 40000 : '';

        // Political Science
        $this->department_id == 71 ? $this->minus  = 40000 : '';

        // Sociology
        $this->department_id == 72 ? $this->minus  = 40000 : '';

        // pol Admin
        $this->department_id == 87 ? $this->minus  = 5000 : '';

        // Biological sciences
        // Biology
        $this->department_id == 46 ? $this->minus = 50000 : '';

        // botany
        $this->department_id == 122 ? $this->minus = 50000 : '';

        // env
        $this->department_id == 123 ? $this->minus = 50000 : '';

        // zoo
        $this->department_id == 124 ? $this->minus = 50000 : '';

        // chemistry
        $this->department_id == 128 ? $this->minus = 49000 : '';

        // Petroleum chemistry
        $this->department_id == 105 ? $this->minus = 50000 : '';

        // Industrial chemistry
        $this->department_id == 48 ? $this->minus = 50000 : '';

        // biochemistry
        $this->department_id == 45 ? $this->minus  = 50000 : '';

        // Physics
        $this->department_id == 52 ? $this->minus  = 50000 : '';

        // Geology
        $this->department_id == 49 ? $this->minus  = 50000 : '';

        // Micro Biology
        $this->department_id == 51 ? $this->minus  = 50000 : '';

        // Mathematical Sciences
        // stat
        $this->department_id == 90 ? $this->minus  = 50000 : '';

        // com sci
        $this->department_id == 88 ? $this->minus  = 50000 : '';

        // Math
        $this->department_id == 89 ? $this->minus  = 50000 : '';

        // Education
         // Biology Education
         $this->department_id == 114 ? $this->minus = 25000 : '';

         // Geography Education
         $this->department_id == 119 ? $this->minus = 20000 : '';

         // Continuning  Education
         $this->department_id == 76 ? $this->minus  = 25000 : '';

         // Physics  Education
         $this->department_id == 117 ? $this->minus  = 25000 : '';

         // Math  Education
         $this->department_id == 116 ? $this->minus  = 25000 : '';

         // chemistry  Education
         $this->department_id == 115 ? $this->minus  = 25000 : '';

         // Islamic  Education
         $this->department_id == 113 ? $this->minus  = 25000 : '';

         // History  Education
         $this->department_id == 112 ? $this->minus  = 25000 : '';

         // hausa  Education
         $this->department_id == 111 ? $this->minus  = 25000 : '';

         // english  Education
         $this->department_id == 110 ? $this->minus  = 25000 : '';

         // ara  Education
         $this->department_id == 108 ? $this->minus  = 25000 : '';

        // Arts Education
        $this->department_id == 36 ? $this->minus  =  5000 : '';

        //History Education
        $this->department_id == 35 ? $this->minus  =  14000 : '';

        //Agric Education
        $this->department_id == 120 ? $this->minus  =  25000 : '';

        //Business Education
        $this->department_id == 121 ? $this->minus  =  25000 : '';

        //Health Education
        $this->department_id == 129 ? $this->minus  =  25000 : '';

        //Library and Info Sci Education
        $this->department_id == 77 ? $this->minus  =  25000 : '';

        //Fac Arts
        // Arabic
        $this->department_id == 30 ? $this->minus  =  14000 : '';

        // LLL
        $this->department_id == 36 ? $this->minus  =  14000 : '';

        // Allied Sci
        // Nursing
        $this->department_id == 4 ? $this->minus  =  28000 : '';

        // Basic Med Sci
        // Anatomy
        $this->department_id == 8 ? $this->minus  =  53000 : '';

        // Physiology
        $this->department_id == 7 ? $this->minus  =  54000 : '';

        // MBBS
        $this->department_id == 2 ? $this->minus  =  143000 : '';
    }
}
