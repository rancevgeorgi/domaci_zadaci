<?php

    class Video{
        private $naslov;
        private $trajanje;

        //konstruktor
        public function __construct($n, $t)
        {
            $this->setNaslov($n);
            $this->setTrajanje($t);
        }

        //seteri
        public function setNaslov($n){
            $this->naslov = $n;
        }
        public function setTrajanje($t){
            $this->trajanje = $t;
        }

        //geteri
        public function getNaslov(){
            return $this->naslov;
        }
        public function getTrajanje(){
            return $this->trajanje;
        }

        //metode
        function stampaj(){
            echo "<h2>Naslov: {$this->getNaslov()}</h2>";
            echo "<p>Trajanje: {$this->getTrajanje()}</p>";
        }
    }

    $v1 = new Video("Naslov 1", 128);
    $v2 = new Video("Naslov 2", 130);
    $v3 = new Video("Naslov 3", 110);
    $v4 = new Video("Naslov 4", 123);
    $v5 = new Video("Naslov 5", 125);

    $video = array($v1, $v2, $v3, $v4, $v5);

    function prosek($video){
        $ukupnoTrajanje = 0;
        foreach ($video as $v) {
            $ukupnoTrajanje += $v->getTrajanje();
        }
        $prosecnoTrajanje = $ukupnoTrajanje / count($video);
        return $prosecnoTrajanje;
    }

    echo prosek($video);
    echo "<br>";

    function najbliziProseku($video){
        $najbliziProseku = 0;
       /* foreach ($video as $v) {
            if (abs(prosek($video) - $najbliziProseku) > abs($v->getTrajanje() - prosek($video))) {
                $najbliziProseku = $v->getTrajanje();
            } 
        }  
        return $najbliziProseku;*/
        for ($i = 0; $i < count($video); $i++) { 
            if (abs(prosek($video) - $najbliziProseku) > abs($video[$i]->getTrajanje() - prosek($video))) {
                $najbliziProseku = $video[$i]->getTrajanje();
                $v = $video[$i];
            }
        }
         $v->stampaj();
    }
    
    echo najbliziProseku($video);

   

?>