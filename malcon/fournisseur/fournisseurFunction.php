<?php 
$args = array
  
      (
  
          'post_type'       => 'fournisseur',
          'posts_per_page'  => -1,
      );
  
      $query = new WP_Query( $args );
  
      if ( $query->have_posts() ) 
      
      {
  
          echo '<h6> Liste Des Fournisseurs :  </h6>';        
          echo '<table id="cpt-menu">';
          ?>
          <style>
              .x {
                  
                  color: red !important;
                  font-size: x-large !important;
                  margin-left: 109px !important;
                }
              img {
                  height:32px;
                  width:32px
              }
          </style>
          <tr>
          <th>Raison Social</th>
          <th>Detail</th>
          <th>modifier</th>
          <th>Supprimer</th>
          </tr>
          <tr class="cpt-menu-item" id="post-<?php the_ID(); ?>">
          <?php
              while ( $query->have_posts() ) : $query->the_post(); 
              
              ?>
                  <td>
                      <?php the_title(); ?>
                  </td>
                  <td>
                  <a href="admin.php?page=detail_four_slug&id=<?php the_ID();?>">Details</a>
                  </td>
                  <td >
                        <a href="post.php?post=<?php the_ID()?>&action=edit">Modifier</a>
                  </td>                             
                  <td > 
                        <a href="admin.php?page=delete_four_slug&id=<?php the_ID();?>"><span class="x">X</span></a>
                  </td>
              </tr>
  
              <?php endwhile;
  
              echo '</table>';
  
              wp_reset_postdata();
              
     }