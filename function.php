<?php

function emitcert_print(){
    return '<iframe name="certificados" src="/form.php" width="100%" height="400px" style="border:none;"></iframe>';
}
add_shortcode('emitcert', 'emitcert_print');