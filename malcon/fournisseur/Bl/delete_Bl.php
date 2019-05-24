<?php 
$postid = $_GET['id'];

      wp_delete_post( $postid, true ); 

      echo '<h1>le Fournisseur a été supprimé (:</h1>';