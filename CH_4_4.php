<?php
/**
 * 配列を並べ替える
 * Created by IntelliJ IDEA.
 * User: ishitsuka
 * Date: 13/04/18
 * Time: 15:33
 * To change this template use File | Settings | File Templates.
 */

// sort()で並べ替える

$dinner = array('Sweet Cron and Asparagus',
                'Lemon Chicken',
                'Braised Bamboo Fungus');

$meal = array('breakfast' => 'Walnut Bun',
                'lunch' => 'Cashew Nuts and White Mushrooms',
                'snack' => 'Dried Mulberries',
                'dinner' => 'Eggplant with Chili Sauce');

print "Before Sorting:\n";

foreach ($dinner as $key => $value) {
    print " \$dinner: $key $value\n";
}

foreach ($meal as $key => $value) {
    print " \$meal: $key $value\n";
}

sort($dinner);
sort($meal);

print "After Sorting:\n";

foreach ($dinner as $key => $value) {
    print " \$dinner: $key $value\n";
}

foreach ($meal as $key => $value) {
    print " \$meal: $key $value\n";
}


// asort()で並べ替える
$meal = array('breakfast' => 'Walnut Bun',
    'lunch' => 'Cashew Nuts and White Mushrooms',
    'snack' => 'Dried Mulberries',
    'dinner' => 'Eggplant with Chili Sauce');

print "Before Sorting:\n";
foreach ($meal as $key => $value) {
    print " \$meal: $key $value\n";
}

asort($meal);

print "After Sorting:\n";
foreach ($meal as $key => $value) {
    print " \$meal: $key $value\n";
}

// ksort()で並べ替える

$meal = array('breakfast' => 'Walnut Bun',
                'lunch' => 'Cashew Nuts and White Mushrooms',
                'snack' => 'Dried Mulberries',
                'dinner' => 'Eggplant with Chili Souce');

print "Before Sorting:\n";
foreach ($meal as $key => $value) {
    print " \$meal: $key $value\n";
}

ksort($meal);

print "After Sorting:\n";
foreach ($meal as $key => $value) {
    print " \$meal: $key $value\n";
}

// rasort()で並べ替える
$meal = array('breakfast' => 'Walnut Bun',
    'lunch' => 'Cashew Nuts and White Mushrooms',
    'snack' => 'Dried Mulberries',
    'dinner' => 'Eggplant with Chili Sauce');

print "Before Sorting:\n";
foreach ($meal as $key => $value) {
    print " \$meal: $key $value\n";
}

arsort($meal);

print "After Sorting:\n";
foreach ($meal as $key => $value) {
    print " \$meal: $key $value\n";
}

