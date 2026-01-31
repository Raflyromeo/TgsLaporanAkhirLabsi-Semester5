<?php
$umur = 16;
$punya_eKTP = true;

if ($umur >= 17) {
    if ($punya_eKTP == true) {
        echo "Anda memenuhi syarat untuk membuat SIM.";
    } else {
        echo "Anda belum bisa membuat SIM karena belum memiliki eKTP.";
    }
} else {
    echo "Anda belum cukup umur untuk membuat SIM.";
}
?>