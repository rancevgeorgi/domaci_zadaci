<?php
require_once "sportista.php";

//podklasa kosarkas
class Kosarkas extends Oportista{
    private $poeni;
   

    //konstruktor
    public function __construct($ime, $prezime, $godRodj, $grad, $poeni){
        parent::__construct($ime, $prezime, $godRodj, $grad);
        $this->setPlata($poeni);
       
    }
    //seteri
    public function setPoeni($poeni){
        $this->poeni = $poeni;
    }
   
    //geteri
    public function getPoeni(){
        return $this->$poeni;
    }
   
    //metode
    public function ispisiKosarkas(){
        $this->ispisiSportista();
        echo "<ul>
                <li>{$this->getPoeni()}</li>
            </ul>";
    }
  



}
