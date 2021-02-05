<?php
    require_once "student.php";

    class SamofinasirajuciStudent extends Student{
        const STUDENT = "samofinansirajuci student";

        private $espb;

        //konstruktor
        public function __construct($ime,$osvojeniESPB, $prosek, $espb){
            parent::__construct($ime,$osvojeniESPB, $prosek, self:: STUDENT);
            $this->setEspb($espb);
        }

        //seter
        public function setEspb($espb){
            $this->espb = rand(35, 60);
        }

        //geter
        public function getEspb(){
            return $this->espb;
        }
       
        public function skolarina ($espb){
            if ($this->prosek < 8) {
                return 1900 * $this->espb;
            }
            else{
                return 1600 * $this->espb;
            }
        }
    
        public function prijavaIspita(){
            return 400;
        }
        
    }

    