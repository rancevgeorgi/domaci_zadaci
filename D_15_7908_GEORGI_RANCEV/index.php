<?php

    class Autobus{
        private $registracija;
        private $sedista;

        //konstruktor
        public function __construct($r, $s){
            $this->setRegistracija($r);
            $this->setSedista($s);
        }

        //seteri
        public function setRegistracija($r){
            $this->registracija = $r;
        }
        public function setSedista($s){
            $this->sedista = $s;
        }

        //geteri
        public function getRegistracija(){
            return $this->registracija;
        }
        public function getSedista(){
            return $this->sedista;
        }

        //metode
        function stampaj(){
            echo 
       "<ul>
            <li>Registracija:'{$this->getRegistracija()}'</li>
            <li>Broj sedišta:{$this->getSedista()}</li>
       </ul>";
        }

    }

    $bus1 = new Autobus("NI-563", 56);
    $bus2 = new Autobus("NS-583", 86);
    $bus3 = new Autobus("BG-586", 70);
    $bus4 = new Autobus("NI-666", 81);
    $bus5 = new Autobus("PI-789", 49);
    

    $autobus = array($bus1, $bus2, $bus3, $bus4, $bus5);

    function stampaj($autobus){
        foreach ($autobus as $bus) {
           $bus->stampaj();
        }
    }

    function ukupnoSedista($autobus){
        $suma = 0;
        foreach ($autobus as $bus) {
            $suma += $bus->getSedista();
        }
        return $suma;
    }

    echo ukupnoSedista($autobus);
    
    function maksSedista($autobus){
        $maxSed = 0;
        foreach ($autobus as $bus){
            if ($bus->getSedista() > $maxSed) {
                $maxSed = $bus->getSedista();
            }
        }
        foreach ($autobus as $bus){
            if ($bus->getSedista() == $maxSed) {
                echo $bus->stampaj();
                break;
            }
        }
    }

   maksSedista($autobus);

   function ljudi($putnici, $autobus){
        if ($putnici <= ukupnoSedista($autobus)) {
            return true;
        }
        else {
            return false;
        }
   }

   $putnici = 300;
   echo ljudi($putnici, $autobus);

  

    
