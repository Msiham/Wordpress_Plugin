<table id="cpt-menu">
    <?php $arg = array( 'post_type'=>'bl','posts_per_page'  => -1); $query = new WP_Query( $arg ); ?>
        <tr>
            <th>Fournisseur</th>    <!--Déjà Fait-->
            <th>Date</th>           <!--Déjà Fait-->
            <th>N° BL</th>          <!--Déjà Fait-->
            <th>Details</th>
            <th>Supprimer</th>      <!--Déjà Fait-->
        </tr>
        <?php while ( $query->have_posts() ) : $query->the_post(); ?> 
        <tr>
            <td><?php echo esc_attr( get_post_meta( get_the_ID(), 'bl_Fournisseur', true ) ); ?></td>
            <td><?php echo esc_attr( get_post_meta( get_the_ID(), 'bl_Date', true ) ); ?></td>
            <td><?php echo esc_attr( get_post_meta( get_the_ID(), 'bl_No', true ) ); ?></td>
            <td><a href="#">Details</a></td>
            <td><a href="admin.php?page=delete_Bl_slug&id=<?php the_ID();?>">Supprimer</a></td>
        </tr>
        <?php endwhile;  wp_reset_postdata(); ?>
    </table>
    </div>