<?php 
    echo (($sp=ini_get('session.save_path')) ?$sp:( 'none' ) ); 
?>