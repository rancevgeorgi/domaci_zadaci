<?php

abstract class Student{
    protected $ime;
    protected $osvojeniESPB;
    protected $prosek;


    //konstruktor
    public function __construct($ime,$osvojeniESPB, $prosek){
        $this->setIme($ime);
        $this->setOsvojeniESPB($osvojeniESPB);
        $this->setProsek($prosek);
        
    }

    //seteri
    public function setIme($ime){
        $this->ime = $ime;
    }
    public function setOsvojeniESPB($osvojeniESPB){
        if ($osvojeniESPB >= 0 && $osvojeniESPB <= 300) {
            $this->osvojeniESPB = $osvojeniESPB;
        }
        else{
            return false;
        }
        
    }
    public function setProsek($prosek){
        if ($prosek >= 5 && $prosek<=10){
            $this->prosek = $prosek;
        }
        else{
            return false;
        }
    }


    //geteri
    public function getIme(){
        return $this->ime;
    }
    public function getOsvojeniESPB(){
        return $this->osvojeniESPB;
    }
    public function getProsek(){
        return $this->prosek;
    }

    //metode
    public function stampa(){
        echo "<ul>
                <li> Ime studenta: {$this->getIme()}</li>
                <li>Osvojeni ESPB poeni: {$this->getOsvojeniESPB()}</li>
                <li>Prosečna ocena: {$this->getProsek()}</li>
                <li>Skolarina: {$this->skolarina($this->getEspb())} RSD</li>
                <li>Prijavljeni ESPB: {$this->getEspb()}</li>
            </ul>";
    }


    public abstract function skolarina($espb);
    public abstract function prijavaIspita();



}


