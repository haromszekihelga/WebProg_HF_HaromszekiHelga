<?php

//1. feladat
$tomb = [5, '5', '05', 12.3, '16.7', 'five', 'true', 0xDECAFBAD, '10e200'];

foreach ($tomb as $elem) {
    $tipus = gettype($elem);
    $numerikus = is_numeric($elem);
    
    if ($numerikus) {
        echo "$elem: Igen (Típus: $tipus)\n";
    } else {
        echo "$elem: Nem (Típus: $tipus)\n";
    }
}

//2. feladat

$input = 3600; 

if (is_int($input)) {
    // Másodpercekből órákba való átváltás
    $hours = $input / 3600;

    // HTML kód előkészítése változó behelyettesítéssel
    $formattedOutput = "<p>A megadott időtartam $input másodperc, ami $hours órának felel meg.</p>";

    // Kiíratás
    echo $formattedOutput;
} else {
    // Ha a bemenet nem egész szám
    echo "<p>Hiba: A megadott érték nem egy egész szám.</p>";
}

//3. feladat
/*
echo "Add meg az első számot: ";
$szam1 = floatval(fgets(STDIN));

echo "Add meg a második számot: ";
$szam2 = floatval(fgets(STDIN));

echo "Válassz egy műveletet (+, -, *, /, ^): ";
$muv = trim(fgets(STDIN));

//Muveletek:
$eredmeny = 0;

switch ($muv) {
    case '+':
        $eredmeny = $szam1 + $szam2;
        break;
    case '-':
        $eredmeny = $szam1 - $szam2;
        break;
    case '*':
        $eredmeny = $szam1 * $szam2;
        break;
    case '/':
        if ($szam2 != 0) {
            $eredmeny = $szam1 / $szam2;
        } else {
            echo "Hiba: Nullával nem osztható!\n";
            exit(1);
        }
        break;
    case '^':
        $eredmeny = pow($szam1, $szam2);
        break;
    default:
        echo "Hiba: Érvénytelen művelet!\n";
        exit(1);
}

echo "Eredmény: $szam1 $muv $szam2 = $eredmeny\n";
*/
//4. feladat

echo <<<HTML
<table border="1">
HTML;

for ($i = 0; $i < 3; $i++) {
    echo "<tr>";
    for ($j = 0; $j < 3; $j++) {
        $cellaOsztaly = ($i + $j) % 2 === 0 ? 'feher' : 'fekete';
        echo "<td class='$cellaOsztaly'></td>";
    }
    echo "</tr>";
}

echo <<<HTML
</table>
HTML;

//5. feladat

$szam1 = $_POST['szam1']; 
$szam2 = $_POST['szam2'];
$muvelet = $_POST['muvelet'];

// Ellenőrzés: 0-val való osztás
if ($muvelet == '/' && $szam2 == 0) {
    echo "Hiba: Nullával nem oszthatunk!";
} else {
    // Ellenőrzés: Érvénytelen műveleti jel
    if ($muvelet != '+' && $muvelet != '-' && $muvelet != '*' && $muvelet != '/') {
        echo "Hiba: Érvénytelen műveleti jel!";
    } else {
        // Művelet végrehajtása
        switch ($muvelet) {
            case '+':
                $eredmeny = $szam1 + $szam2;
                break;
            case '-':
                $eredmeny = $szam1 - $szam2;
                break;
            case '*':
                $eredmeny = $szam1 * $szam2;
                break;
            case '/':
                $eredmeny = $szam1 / $szam2;
                break;
        }
        
        echo "Eredmény: $eredmeny";
    }
}

//6.feladat

function meghatarozEvszakotIf($honap) {
    if ($honap >= 3 && $honap <= 5) {
        return "Tavasz";
    } elseif ($honap >= 6 && $honap <= 8) {
        return "Nyár";
    } elseif ($honap >= 9 && $honap <= 11) {
        return "Ősz";
    } else {
        return "Tél";
    }
}

function meghatarozEvszakotSwitch($honap) {
    switch ($honap) {
        case 3:
        case 4:
        case 5:
            return "Tavasz";
        case 6:
        case 7:
        case 8:
            return "Nyár";
        case 9:
        case 10:
        case 11:
            return "Ősz";
        default:
            return "Tél";
    }
}

// Példa használat:
$honap = 7;
$evszakIf = meghatarozEvszakotIf($honap);
$evszakSwitch = meghatarozEvszakotSwitch($honap);

echo "A $honap. hónapban van $evszakIf.\n";
echo "A $honap. hónapban van $evszakSwitch.\n";
