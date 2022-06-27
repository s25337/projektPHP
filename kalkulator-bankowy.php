<?php


//projekt olga bońdos s25337

function potega($k,$n){
    $wynik=$k;
    for($i=1;$i<$n;$i++){
        $wynik*=$k;
    }
    return $wynik;
}

function ratyRowne($N,$r,$n){
    $r/=1200;
    $wynik=$r*potega(1+$r, $n);
    $wynik/=(potega(1+$r,$n)-1);
    $wynik*=$N;
    return $wynik;
}

function ratyMalejace($kwota, $liczba, $op){
    $kapital=$kwota/$liczba;
    // echo $kapital;
    $calykredyt=0;
    for($i=0; $i<$liczba; $i++){
        $wynik=($op/1200)*($liczba-$i);
        $wynik+=1;
        $wynik*=$kapital;
        $wynik=round($wynik, 2);
        $calykredyt+=$wynik;
        echo "rata kredytu nr ".($i+1)." będzie wynosiła $wynik zł.";

        ?>
        <html>
        <br>
        </html>
        <?php
    }
    echo "Łączny koszt kredytu będzie wynosił ".$calykredyt." zł.";
}

function lokata($kwota2, $oprocentowanie2, $liczbakap){
    $lokata=$kwota2*potega((1+($oprocentowanie2/100)), $liczbakap);
    $lokata=round($lokata, 2);
    echo "Z lokaty wypłacone zostanie ".$lokata." zł";
}

$op=$_GET['oprocentowanie'];
$lata=$_GET['lata'];
$miesiace=$_GET['miesiace'];
$sposob=$_GET['raty'];
$kwota=$_GET['kwota'];
$oprocentowanie2=$_GET['oprocentowanie2'];
$lata2=$_GET['lata2'];
$miesiace2=$_GET['miesiace2'];
$kwota2=$_GET['kwota2'];
$kapitalizacja=$_GET['kapital'];

?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>zadanie 2</title>
    </head>
    <body>
    <h1> Kalkulator kredytowy</h1>
    <form method="get">
        Oprocentowanie nominalne (%):
        <input name="oprocentowanie" type="number" step="0.1" value="0" > </input><br>
        Kwota kredytu (zł):
        <input name="kwota" type="number" value="0" > </input><br>
        Okres na jaki kredyt został zaciągnięty:<br>
        lata:
        <input name="lata" type="number" value="0"> </input>
        <label for="lata"></label>
        miesiace:
        <input name="miesiace" type="number" value="0" ></input><br>
        <label for="miesiace" ></label>


       <label for="raty">Sposób spłaty kredytu</label>
        <select id="raty" name="raty" value="0">
            <option value="1">raty równe</option>
            <option value="2">raty malejące</option>

        </select>
        <br>
        <button name="button" type="submit">Sprawdz</button>
    </form>
    </body>
    </html>
<?php
$liczba=$lata*12+$miesiace;
if($sposob=='1') echo "Każda z ".$liczba." rat kredytu będzie wynosiła ".round(ratyRowne($kwota,$op,$liczba), 2)." zł, a łączny koszt kredytu wyniesie ".round(ratyRowne($kwota,$op,$liczba))*$liczba." zl.";
if($sposob=='2') ratyMalejace($kwota, $liczba, $op);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
<form method="get">
    <h1> Kalkulator lokat </h1>
    Oprocentowanie lokaty (%):
    <input name="oprocentowanie2" type="number" step="0.1" value="0" > </input><br>
    Kwota wpłaty (zł):
    <input name="kwota2" type="number" value="0" > </input><br>
    Czas trwania inwestycji: <br>
    lata:
    <input name="lata2" type="number" value="0"> </input>
    <label for="lata2"></label>
    miesiace:
    <input name="miesiace2" type="number" value="0" ></input><br>
    <label for="miesiace2" ></label>
    <label for="kapital">Sposób kapitalizacji</label>
    <select id="kapital" name="kapital" value="0">
        <option value="1">roczny</option>
        <option value="2">kwartalny</option>
        <option value="3">miesięczny</option>
        <option value="4">tygodniowy</option>
        <option value="5">dzienny</option>

    </select>
    <br>
    <button name="button" type="submit">Sprawdz</button>
</form>
</body>
</html>
<?php
if($kapitalizacja==1){
    $liczbakap=$lata2+$miesiace2/12;
    lokata($kwota2, $oprocentowanie2, $liczbakap);
}
if($kapitalizacja==2){
    $liczbakap=($lata2*4+$miesiace2/3);
    $oprocentowanie2/=4;
    lokata($kwota2, $oprocentowanie2, $liczbakap);
}
if($kapitalizacja==3){
    $liczbakap=$lata2*12+$miesiace2;
    $oprocentowanie2/=12;
    lokata($kwota2, $oprocentowanie2, $liczbakap);
}
if($kapitalizacja==4){
    $liczbakap=$lata2*52+$miesiace2*4;
    $oprocentowanie2/=52;
    lokata($kwota2, $oprocentowanie2, $liczbakap);
}
if($kapitalizacja==5){
    $liczbakap=$lata2*365+$miesiace2*30;
    $oprocentowanie2/=365;
    lokata($kwota2, $oprocentowanie2, $liczbakap);
}
?>

