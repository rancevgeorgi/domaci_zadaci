<?php
    require_once "student.php";

    class BudzetskiStudent extends Student{
        const STUDENT = "budzetski student";


        //konstruktor
        public function __construct($ime,$osvojeniESPB, $prosek){
            parent::__construct($ime,$osvojeniESPB, $prosek, self::STUDENT);
        }
       
        public function skolarina ($espb){
            return (300- $this->osvojeniESPB) * 200;
        }
    
        public function prijavaIspita(){
            return 100;
        }
        
    }

    