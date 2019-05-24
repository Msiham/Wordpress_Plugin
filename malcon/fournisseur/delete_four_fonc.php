<?php 
$post_id = $_GET['id'];

      if(wp_delete_post( $post_id, true )) 
            echo '<h1>l\'element a été supprimé (:</h1>';
      
?>
<p>
<a href="http://localhost/wordpress/wp-admin/edit.php?post_type=livre">Allez au Livres<a>
</p>
<p>
<a href="http://localhost/wordpress/wp-admin/edit.php?post_type=app">Allez au Apps<a>
</p>
<p>
<a href="http://localhost/wordpress/wp-admin/edit.php?post_type=logiciel">Allez au Logiciels<a>
</p>

<p>
<a href="http://localhost/wordpress/wp-admin/edit.php?post_type=fournisseur">Allez au fournisseurs<a>
</p>

<p>
<a href="http://localhost/wordpress/wp-admin/edit.php?post_type=representant">Allez au Representant<a>
</p>

<p>
<a href="http://localhost/wordpress/wp-admin/edit.php?post_type=saison">Allez au Saison<a>
</p>
