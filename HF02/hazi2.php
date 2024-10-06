<?php
print ("<span style='font-size: 20px; font-weight: bold'>1.Feladat</span><br>\n");
$color = "lightblue";
$multTable = function ($number) use ($color) {
    print ("<table style='border: 1px solid black'>");
    for ($i = 1; $i <= $number; $i++) {
        print ("<tr>");
        for ($j = 1; $j <= $number; $j++) {
            if ($i == $j) {
                $result = $i * $j;
                print ("<td style='background-color: $color; border: 1px solid black; padding: 2px'>$result</td>");
            } else {
                $result = $i * $j;
                print ("<td style='border: 1px solid black; padding: 2px'>$result</td>");
            }
        }
        print ("</tr>");
    }
    print ("</table><br>");
};
$multTable(10);
print ("<span style='font-size: 20px; font-weight: bold'>2.Feladat</span><br>\n");
$orszagok = array(" Magyarország " => " Budapest", " Románia" => " Bukarest", "Belgium" => "Brussels", "Austria" => "Vienna", "Poland" => "Warsaw");
foreach ($orszagok as $key => $value) {
    print ("$key fővárosa <span style='color: red'>$value</span><br>");
}
print ("<span style='font-size: 20px; font-weight: bold'>3.Feladat</span><br>\n");
$napok = array(
    "HU" => array("H", "K", "Sze", "Cs", "P", "Szo", "V"),
    "EN" => array("M", "Tu", "W", "Th", "F", "Sa", "Su"),
    "DE" => array("Mo", "Di", "Mi", "Do", "F", "Sa", "So"),
);
foreach ($napok as $key => $value) {
    print ("<span> $key: ");
    for ($i = 0; $i < count($value); $i++) {
        $v = $value[$i];
        if ($v == "K" || $v == "Cs" || $v == "Szo" || $v == "Tu" || $v == "Th" || $v == "Sa" || $v == "Di" || $v == "Do" || $v == "So") {
            print ("<span style='font-weight: bold'>$v, </span>");
        } else {
            print ("<span>$v, </span>");
        }
    }
    print ("<br>");
}
print ("<span style='font-size: 20px; font-weight: bold'>4.Feladat</span><br>\n");
$szinek = array('A' => 'Kek', 'B' => 'Zold', 'c' => 'Piros');
function atalakit($array, $type)
{
    foreach ($array as $key => $value) {
        if ($type == "kisbetus") {
            echo $key . " => " . strtolower($value) . ", ";
        } elseif ($type == "nagybetus") {
            echo $key . " => " . strtoupper($value) . ", ";
        }
    }
    echo "<br>";
}

atalakit($szinek, "kisbetus");
atalakit($szinek, "nagybetus");
print ("<span style='font-size: 20px; font-weight: bold'>5.Feladat</span><br>");
$shoppingList = array(array("nev" => "Kenyér", "mennyiseg" => 2, "egysegar" => 8.5));
$addItem = function ($name, $amount, $price) use (&$shoppingList) {
    $item = array("nev" => $name, "mennyiseg" => $amount, "egysegar" => $price);
    array_push($shoppingList, $item);
};
$removeItem = function ($name) use (&$shoppingList) {
    foreach ($shoppingList as $key => $value) {
        foreach ($value as $val) {
            if ($val == $name) {
                unset($shoppingList[$key]);
            }
        }
    }
};
$printItems = function () use (&$shoppingList) {
    foreach ($shoppingList as $value) {
        foreach ($value as $key => $val) {
            echo $key . " => " . $val . ", ";
        }
        print("<br>");
    }
};
$calcTotal = function () use (&$shoppingList) {
    $total = 0;
    foreach ($shoppingList as $value) {
        $total += $value["mennyiseg"] * $value["egysegar"];
    }
    echo $total."<br>";
};
$addItem("Viz", 3, 2.5);
$addItem("Vaj", 1, 12);
$addItem("Sonka", 1, 16);
$addItem("Perec", 4, 1.3);
$addItem("Sajt", 1, 10.5);
$removeItem("Perec");
$printItems();
$calcTotal();
