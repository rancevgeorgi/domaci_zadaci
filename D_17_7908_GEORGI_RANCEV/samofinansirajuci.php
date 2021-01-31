<?php
    require_once "student.php";

    class SamofinasirajuciStudent extends Student{
        const STUDENT = "samofinansirajuci student";

        //konstruktor
        public function __construct($ime,$osvojeniESPB, $prosek){
            parent::__construct($ime,$osvojeniESPB, $prosek, self:: STUDENT);
        }
       
        public function skolarina ($espb){
            $espb = rand(35, 60);
            if ($this->prosek < 8) {
                return 1900 * $espb;
            }
            else{
                return 1600 * $espb;
            }
        }
    
        public function prijavaIspita(){
            return 400;
        }
        
    }

    