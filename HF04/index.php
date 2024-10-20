<?php

require 'ArrayManipulator.php';

use HF04\ArrayManipulator;

$manipulator = new ArrayManipulator();

$manipulator->name = "John Doe";
$manipulator->age = 30;

echo "Original Object: " . $manipulator . "<br>";

if (isset($manipulator->age)) {
    echo "Age is set to: " . $manipulator->age . "<br>";
}

unset($manipulator->age);

if (!isset($manipulator->age)) {
    echo "Age has been unset." . "<br>";
}

$manipulator->preferences = ['theme' => 'dark', 'language' => 'English'];

echo "Before Cloning: " . $manipulator . "<br>";

$clone = clone $manipulator;

$clone->name = "Jane Doe";
$clone->preferences['theme'] = 'light';

echo "Original After Cloning: " . $manipulator . "<br>";
echo "Cloned Object: " . $clone . "<br>";

echo "Original Theme: " . $manipulator->preferences['theme'] . "<br>";
echo "Cloned Theme: " . $clone->preferences['theme'] . "<br>";

