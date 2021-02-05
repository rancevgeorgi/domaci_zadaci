<?php
    require_once "student.php";

    class BudzetskiStudent extends Student{
        const STUDENT = "budzetski student";

        private $espb;

        //konstruktor
        public function __construct($ime,$osvojeniESPB, $prosek, $espb){
            parent::__construct($ime,$osvojeniESPB, $prosek, self::STUDENT);
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
            return (300- $this->osvojeniESPB) * 200;
        }
    
        public function prijavaIspita(){
            return 100;
        }
        
    }

    