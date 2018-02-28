<?php
$_GET['start'];
echo ',';
$year = date('o');
$monthNum = date('n');
$Day = date("j");
if(isset($_GET['next'])){
    $next = $_GET['next'];
    $monthNum = $next;
}
if (isset($_GET['nextyear'])){
    $nextYear = $_GET['nextyear'];
    $year = $nextYear;
}

if(isset($_GET['prev'])){
    $prev = $_GET['prev'];
    $monthNum = $prev;
}
if(isset($_GET['prevyear'])){
    $prevYear = $_GET['prevyear'];
    $year = $prevYear;
}
$Month = date('F', mktime(0, 0, 0, $monthNum, 1, $year));
$count = 1;
$countOne = 1;
$Days = date("t", mktime(0, 0, 0, $monthNum, 1, $year));
$countDay = $Days + 1;
$positionDate = date("N", mktime(0, 0, 0, $monthNum, 1, $year));
$variable = $positionDate -1;
if($variable == 6 || $variable == 5 && $countDay > 31){
    for ($i = 0; $i < 6; $i++){
        echo '<div class="divs'.$countOne.'">';
        $countOne++;
        for($j = 0; $j < 7; $j++){
            if ($i == 0){
                if ($j < $variable){
                    echo '<div class="days">&nbsp;</div>';
                }else if ($j >= $variable){
                    echo '<div class="days"  id="matr'.$count.'">'.$count.'</div>';
                    $count++;
                }
            }else{
                echo '<div class="days" id="matr'.$count.'">'.$count.'&nbsp;</div>';
                $count++;
            }
            if ($count == $countDay){
                $count = ' ';
            }
        }
        echo '</div>';
    }
}else{
    for ($i = 0; $i < 5; $i++){
        echo '<div class="divs'.$countOne.'">';
        $countOne++;
        for($j = 0; $j < 7; $j++){
            if ($i == 0){
                if ($j < $variable){
                    echo '<div class="days">&nbsp;</div>';
                }else if ($j >= $variable){
                    echo '<div class="days" id="matr'.$count.'">'.$count.'</div>';
                    $count++;
                }
            }else{
                echo '<div class="days" id="matr'.$count.'">'.$count.'&nbsp;</div>';
                $count++;
            }
            if ($count == $countDay){
                $count = ' ';
            }
        }
        echo '</div>';
    }
}
echo ',', $year, ' ', $Month, ',', $Day, ',', $monthNum;