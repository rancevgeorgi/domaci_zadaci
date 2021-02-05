<?php
    require_once "student.php";
    require_once "samofinansirajuci.php";
    require_once "budzet.php";

    $student1 = new SamofinasirajuciStudent("Zoran", 120, 8, rand(35, 60));
    $student2 = new SamofinasirajuciStudent("Dragan", 180, 7, rand(35, 60));
    $student3 = new SamofinasirajuciStudent("Slavica", 240, 9, rand(35, 60));
    $student4 = new BudzetskiStudent("Pera", 255, 6, rand(35, 60));
    $student5 = new BudzetskiStudent("Laza", 280, 9, rand(35, 60));
    $student6 = new BudzetskiStudent("Zorica", 210, 10, rand(35, 60));

    //Kreirati niz od barem četiri studenta. 

    $studenti = array($student1, $student2, $student3, $student4, $student5, $student6);

    foreach ($studenti as $student) {
        $student->stampa();
    }
    echo "<hr>";

    //Odrediti studenta koji plaća najveću školarinu. Za svakog studenta kao broj ESPB bodova koje prijavljuje u narednoj školskoj godini staviti kao neki random ceo broj između 35 i 60.

    $i = 0;
    $najvecaSkolarinaStudent = $studenti[0];
    $najvecaSkolarina = $najvecaSkolarinaStudent->skolarina($najvecaSkolarinaStudent->getEspb());
    foreach ($studenti as $student) {
        if ($student->skolarina($najvecaSkolarinaStudent->getEspb()) > $najvecaSkolarina) {
            $najvecaSkolarina = $student->skolarina($najvecaSkolarinaStudent->getEspb());
            $i++;
        }
        $najvecaSkolarinaStudent = $studenti[$i];
      
    }
    echo "<p>Student sa najvecom skolarinom je:</p>";
    echo $najvecaSkolarinaStudent->stampa();
    
    
    echo "<hr>";
    //Odrediti prosečnu školarinu svih studenata.

    $ukupnaSkolarina = 0;
    foreach ($studenti as $student) {
        $ukupnaSkolarina += $student->skolarina($student->getEspb());
        $prosecnaSkolarina = $ukupnaSkolarina / count($studenti);
    }
    echo "<p>Prosečna školarina je: $prosecnaSkolarina</p>";

    //Odrediti prosečan odnos visine školarine i broja osvojenih ESPB bodova.
   
    $ukupnoBodova = 0;
    foreach ($studenti as $student) {
        $bodovi = $student->getOsvojeniESPB();
        $ukupnoBodova += $bodovi;
        $prosekBodova = $ukupnoBodova / count($studenti);
    }
    echo "<p>Prosek bodova je: $prosekBodova</p>";

    $prosecanOdnos = $prosecnaSkolarina / $prosekBodova;
    echo "<p>Prosečan odnos visine skolarine i broja bodova je $prosecanOdnos prema 1</p>";
    echo "<hr>";

    //Odrediti studenta sa minimalnim brojem osvojenih ESPB. Ako ima više takvih studenata, vratiti onog koji plaća najveću školarinu (ako ima i više takvih, vratiti bilo kog).
  
    $i = 0;
    $najmanjeBodova = $studenti[$i];
    $najmanjeBodovaStudent = $najmanjeBodova->getOsvojeniESPB();
    foreach ($studenti as $student) {
       if ($student->getOsvojeniESPB() < $najmanjeBodovaStudent) {
           $najmanjeBodovaStudent = $student->getOsvojeniESPB();
           $i++;
       }
       $studentNajmanjeBodova = $studenti[$i];
    }
    echo "<p>Student sa minimalnim brojem osvojenih ESPB je:</p>";
    echo $studentNajmanjeBodova->stampa();


   


    


?>