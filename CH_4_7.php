<?php
/**
 * 演習問題
 * Created by IntelliJ IDEA.
 * User: ishitsuka
 * Date: 13/04/18
 * Time: 16:25
 * To change this template use File | Settings | File Templates.
 */

/*
1.  U.S. Census Bureauに従うと、2000年のアメリカの10大都市（人口規模）は次のとおりです。
    .  New York, NY (8,008,278 people)
    .  Los Angeles, CA (3,694,820)
    .  Chicago, IL (2,896,016)
    .  Houston, TX (1,953,631)
    .  Philadelphia, PA (1,517,550)
    .  Phoenix, AZ (1,321,045)
    .  San Diego, CA (1,223,400)
    .  Dallas, TX (1,188,580)
    .  San Antonio, TX (1,144,646)
    .  Detroit, MI (951,270)
都市と人口に関するこの情報を持つ配列（または複数の配列）を定義しましょう。10都市全部の
総人口を含む都市と人口の情報の表を出力しましょう。
*/

$cities = array(
                'New York, NY' => 8008278,
                'Los Angeles, CA' => 3694820,
                'Chicago, IL' => 2896016,
                'Houston, TX' => 1953631,
                'Philadelphia, PA' => 1517550,
                'Phoenix, AZ' => 1321045,
                'San Diego, CA' => 1223400,
                'Dallas, TX' => 1188580,
                'San Antonio, TX' => 1144646,
                'Detroit, MI' => 951270);
print "<table>\n";

$total = 0;
foreach ($cities as $city => $people) {
    print "<tr><td>$city</td><td>$people</td></tr>\n";
    $total += $people;
}
print "<tr><td>total</td><td>$total</td></tr>\n";
print "</table>\n";

/*
2.  結果の表の行が人口順になるように前出の演習問題の結果を修正しましょう。次に行が都市名別に
なるように結果を修正しましょう。
*/
$cities = array(
    'New York, NY' => 8008278,
    'Los Angeles, CA' => 3694820,
    'Chicago, IL' => 2896016,
    'Houston, TX' => 1953631,
    'Philadelphia, PA' => 1517550,
    'Phoenix, AZ' => 1321045,
    'San Diego, CA' => 1223400,
    'Dallas, TX' => 1188580,
    'San Antonio, TX' => 1144646,
    'Detroit, MI' => 951270);
$total = 0;
asort($cities);
print "<table>\n";
foreach ($cities as $city => $people) {
    print "<tr><td>$city</td><td>$people</td></tr>\n";
    $total += $people;
}
print "<tr><td>total</td><td>$total</td></tr>\n";
print "</table>\n";

/*
3.  都市リストに含まれる州ごとの人口総数も出力表の行に含まれるように1番目の演習問題の結果
を修正しましょう。
*/

$cities = array(
    'New York, NY' => 8008278,
    'Los Angeles, CA' => 3694820,
    'Chicago, IL' => 2896016,
    'Houston, TX' => 1953631,
    'Philadelphia, PA' => 1517550,
    'Phoenix, AZ' => 1321045,
    'San Diego, CA' => 1223400,
    'Dallas, TX' => 1188580,
    'San Antonio, TX' => 1144646,
    'Detroit, MI' => 951270);
print "<table>\n";


$states;
foreach ($cities as $city => $people) {
    $states[explode(', ', $city)[1]][explode(', ', $city)[0]] = $people;
}

$all_total_people = 0;
print "<table>\n";
foreach ($states as $state => $cities) {
    $state_total_people = 0;
    foreach ($cities as $city => $people) {
        print "<tr><td>$state</td><td>$city</td><td>$people</td></tr>\n";
        $state_total_people += $people;
        $all_total_people += $people;
    }
    print "<tr><td>$state</td>total<td></td><td>$state_total_people</td></tr>\n";
}
print "<tr><td>total</td><td></td><td>$all_total_people</td></tr>\n";
print "</table>\n";