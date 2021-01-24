<?php

    //nadklasa sportista
    class Sportista{
        //polja
        private $ime;
        private $prezime;
        private $godRodj;
        private $grad;

        //konstruktor
        public function __construct($ime, $prezime, $godRodj, $grad){
            $this->setIme($ime);
            $this->setPrezime($prezime);
            $this->setGodRodj($godRodj);
            $this->setGrad($grad);
        }

        //seteri
        public function setIme($ime){
            $this->ime= $ime;
        }
        public function setPrezime($prezime){
            $this->prezime = $prezime;
        }
        public function setGodRodj($godRodj){
            $this->godRodj = $godRodj;
        }
        public function setGrad($grad){
            $this->grad = $grad;
        }
        
        //geteri
        public function getIme(){
            return $this->ime;
        }
        public function getPrezime(){
            return $this->prezime;
        }
        public function getGodRodj(){
            return $this->godRodj;
        }
        public function getGrad(){
            return $this->grad;
        }

        //metode
        public function ispisiSportista(){
            echo "<ul>
                    <li>{$this->getIme()}</li>
                    <li>{$this->getPrezime()}</li>
                    <li>{$this->getGodRodj()}</li>
                    <li>{$this->getGrad()}</li>
                </ul>";
    }

 
    

    
        

        
    }