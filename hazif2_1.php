<?php
//1. feladat

$sorokSzama = 10;
$szorzotabla = function($n) use ($sorokSzama) {
    echo "<table border='1' style='border-collapse: collapse;'>";
    for ($i = 1; $i <= $sorokSzama; $i++) {
        echo "<tr>";
        for ($j = 1; $j <= $sorokSzama; $j++) {
            $result = $i * $j;
            echo "<td style='border: 1px solid; padding: 5px;'>$i x $j = $result</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
};

$szorzotabla($sorokSzama);

//2. feladat

$orszagok = array("Magyarország" => "Budapest", "Románia" => "Bukarest", "Belgium" => "Brussels", "Austria" => "Vienna", "Poland" => "Warsaw");

foreach ($orszagok as $orszag => $varos) {
    echo "$orszag fővárosa <span style='color: red;'>$varos</span><br>";
}

//3. feladat

$napok = array(
    "HU" => array("H" , "<b>K</b>" , "Sze" , "<b>Cs</b>" , "P" , "<b>Szo</b>", "V"),
    "EN" => array("M" , "<b>Tu</b>" , "W" , "<b>Th</b>" , "F" , "<b>Sa</b>" , "Su"),
    "DE" => array("Mo" , "<b>Di</b>" , "Mi" , "<b>Do</b>" , "F" , "<b>Sa</b>", "So"),
    );
    
    foreach ($napok as $nyelv => $hetnapok) {
    echo $nyelv . ": ";
    echo implode(", ", $hetnapok) . "<br>";
    }
    

//4. feladat

function atalakit($tomb, $mod) {
    if ($mod === "kisbetus") {
        return array_map('strtolower', $tomb);
    } elseif ($mod === "nagybetus") {
        return array_map('strtoupper', $tomb);
    }
}

$szinek = array('A' => 'Kek', 'B' => 'Zold', 'C' => 'Piros');

$kisbetusSzinek = atalakit($szinek, "kisbetus");
print_r($kisbetusSzinek);

$nagybetusSzinek = atalakit($szinek, "nagybetus");
print_r($nagybetusSzinek);

//5. feladat

$bevasarloLista = [
    ["nev" => "Kenyer", "mennyiseg" => 2, "egysegar" => 8.5],
    ["nev" => "Viz", "mennyiseg" => 1, "egysegar" => 2.5],
    // További termékek hozzáadása itt
];

function hozzaadElem($nev, $mennyiseg, $egysegar) {
    global $bevasarloLista;
    
    $bevasarloLista[] = ["nev" => $nev, "mennyiseg" => $mennyiseg, "egysegar" => $egysegar];
}

function eltavolitElem($nev) {
    global $bevasarloLista;
    
    foreach ($bevasarloLista as $index => $elem) {
        if ($elem["nev"] === $nev) {
            unset($bevasarloLista[$index]);
            return;
        }
    }
}

function kiirLista() {
    global $bevasarloLista;
    
    foreach ($bevasarloLista as $elem) {
        echo "Név: " . $elem["nev"] . ", Mennyiség: " . $elem["mennyiseg"] . ", Egységár: " . $elem["egysegar"] . "<br>";
    }
}

function osszkoltseg() {
    global $bevasarloLista;
    
    $osszeg = 0;
    
    foreach ($bevasarloLista as $elem) {
        $osszeg += $elem["mennyiseg"] * $elem["egysegar"];
    }
    
    return $osszeg;
}

// kiíratás és összköltség számítás
echo "Bevásárlólista:<br>";
kiirLista();
echo "Összköltség: " . osszkoltseg() . " <br>";

 // új elem hozzáadása
hozzaadElem("Sonka", 2, 4.0);
echo "<br>Új elem hozzáadása:<br>";
kiirLista();
echo "Összköltség: " . osszkoltseg() . " <br>";

 // elem eltávolítása
eltavolitElem("Viz");
echo "<br>Víz eltávolítása:<br>";
kiirLista();
echo "Összköltség: " . osszkoltseg() . " <br>";

