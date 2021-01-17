<?php

    class Knjiga{
        private $naslov;
        private $autor;
        private $godIzdanja;
        private $brojStrana;
        private $cena;

        public function __construct($n, $a, $g, $b, $c){
            $this->setNaslov($n);
            $this->setAutor($a);
            $this->setGodIzdanja($g);
            $this->setBrojStrana($b);
            $this->setCena($c);
        }

        //seteri

        public function setNaslov($n){
            $this->naslov = $n;
        }
        public function setAutor($a){
            $this->autor = $a;
        }
        public function setGodIzdanja($g){
            $this->godIzdanja = $g;
        }
        public function setBrojStrana($b){
            $this->brojStrana = $b;
        }
        public function setCena($c){
            $this->cena = $c;
        }

        //geteri

        public function getNaslov(){
            return $this->naslov;
        }
        public function getAutor(){
            return $this->autor;
        }
        public function getGodIzdanja(){
            return $this->godIzdanja;
        }
        public function getBrojStrana(){
            return $this->brojStrana;
        }
        public function getCena(){
            return $this->cena;
        }

        public function stampaj(){
            echo
            "
            <ul>
                <li>$this->naslov</li>
                <li>$this->autor</li>
                <li>$this->godIzdanja</li>
                <li>$this->brojStrana</li>
                <li>$this->cena</li>
            </ul>
                ";
        }
        public function obimna(){
            $b = $this->brojStrana;
            if ($b > 600) {
                return true;
            } else {
                return false;
            }
        }
        public function skupa(){
            $c = $this->cena;
            if ($c > 8000) {
                return true;
            } else {
                return false;
            }
        }
        public function dugackoIme(){
            $n = $this->naslov;
            if (strlen($n) > 18) {
                return true;
            } else {
                return false;
            }
        }
    }


    $knjiga1 = new Knjiga("Naslov knjige", "Pera Perić", 1982, 800, 25000);
    $knjiga1->stampaj();
    echo $knjiga1->dugackoIme();

?>