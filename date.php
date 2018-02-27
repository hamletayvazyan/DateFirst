<?php
$_GET['start'];
echo ',';
$tari = date('o');
$amis = date('n');
$Day = date("j");
if(isset($_GET['next'])){
    $next = $_GET['next'];
    $amis = $next;
}
if (isset($_GET['nextyear'])){
    $asdf = $_GET['nextyear'];
    $tari = $asdf;
}

if(isset($_GET['prev'])){
    $prev = $_GET['prev'];
    $amis = $prev;
}
if(isset($_GET['prevyear'])){
    $asd = $_GET['prevyear'];
    $tari = $asd;
}
$Month = date('F', mktime(0, 0, 0, $amis, 1, $tari));
$count = 1;
$co = 1;
$Days = date("t", mktime(0, 0, 0, $amis, 1, $tari));
$countDay = $Days + 1;
$positionDate = date("N", mktime(0, 0, 0, $amis, 1, $tari));
$variable = $positionDate -1;
if($variable == 6 || $variable == 5 && $countDay > 31){
    for ($i = 0; $i < 6; $i++){
        echo '<div class="divs'.$co.'">';
        $co++;
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
        echo '<div class="divs'.$co.'">';
        $co++;
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
echo ',', $tari, ' ', $Month, ',', $Day, ',', $amis;