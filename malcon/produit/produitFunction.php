<?php /// Add List Of Livre
  
      $args = array
  
      (
  
          'post_type'       => 'livre',
          'posts_per_page'  => -1,
      );
  
      $query = new WP_Query( $args );
  
      if ( $query->have_posts() ) {
  
          echo '<h6>Livres</h6>';        
          echo '<table id="cpt-menu">';
          ?>
          <tr>
          <th>Title</th>
          <th>image</th>
          <th>description</th>
          <th>Code</th>
          <th>Pirix achat(DH)</th>
          <th>Pirix vente(DH)</th>
          <th>Pirix public(DH)</th>
          <th>nombre du pages</th>
          </tr>
          <?php
              while ( $query->have_posts() ) : $query->the_post(); ?>
  
              <tr class="cpt-menu-item" id="post-<?php the_ID(); ?>">
                  
                  <td>
                      <?php the_title(); ?>
                  </td>
                  <td>
                      <?php 
                      set_post_thumbnail_size( 100, 72); 
                      the_post_thumbnail();
                      ?>
                  </td>
                  <td >
                      <?php the_excerpt(); ?>
                  </td>
                  <td >
                      <?php echo esc_attr( get_post_meta( get_the_ID(), 'livre_code', true ) ); ?>
                  </td>
                  <td >
                      <?php echo esc_attr( get_post_meta( get_the_ID(), 'livre_price_buy', true ) ); ?>
                  </td>
                  <td >
                      <?php echo esc_attr( get_post_meta( get_the_ID(), 'livre_price_vente', true ) ); ?>
                  </td>
                  <td >
                      <?php echo esc_attr( get_post_meta( get_the_ID(), 'livre_price_pub', true ) ); ?>
                  </td>
                  <td >
                      <?php echo esc_attr( get_post_meta( get_the_ID(), 'livre_nbr_page', true ) ); ?>
                  </td>
              </tr>
  
              <?php endwhile;
  
              echo '</table>';
  
              wp_reset_postdata();
              
  //add app query
  
      $args = array(
          'post_type'       => 'app',
          'posts_per_page'  => -1,
      );
  
      $query = new WP_Query( $args );
  
      if ( $query->have_posts() ) {
  
          echo '<h6>Apps</h6>';
          echo '<table id="cpt-menu">';
  
          ?>
          <tr>
          <th>Title</th>
          <th>image</th>
          <th>description</th>
          <th>Code</th>
          <th>Pirix achat(DH)</th>
          <th>Pirix vente(DH)</th>
          <th>Pirix public(DH)</th>
          </tr>
  
      <?php 
              while ( $query->have_posts() ) : $query->the_post(); ?>
  
              <tr class="cpt-menu-item" id="post-<?php the_ID(); ?>">
                  <td>
                      <?php the_title(); ?>
                  </td>
               
                  <td>
                      <?php 
                      set_post_thumbnail_size( 100, 72); 
                      the_post_thumbnail();
                      ?>
                  </td>
  
                  <td>
                      <?php the_excerpt(); ?>
                  </td>
  
                  <td>
                      <?php echo esc_attr( get_post_meta( get_the_ID(), 'app_code', true ) ); ?>
                  </td>
                  <td>
                      <?php echo esc_attr( get_post_meta( get_the_ID(), 'app_price_buy', true ) ); ?>
                  </td>
                  <td >
                      <?php echo esc_attr( get_post_meta( get_the_ID(), 'app_price_vente', true ) ); ?>
                  </td>
                  <td >
                      <?php echo esc_attr( get_post_meta( get_the_ID(), 'app_price_pub', true ) ); ?>
                  </td>
              </tr>
              <?php endwhile;
  
              echo '</table>';
  
              wp_reset_postdata();
  
          //Add Logiciel Query
  
  
      $args = array(
          'post_type'       => 'logiciel',
          'posts_per_page'  => -1,
      );
  
      $query = new WP_Query( $args );
  
      if ( $query->have_posts() ) {
  
          echo '<h6>Logiciels</h6>'; 
  
          echo '<table id="cpt-menu">';
  
  
             ?>
          <tr>
          <th>Title</th>
          <th>image</th>
          <th>description</th>
          <th>Code</th>
          <th>Pirix achat(DH)</th>
          <th>Pirix vente(DH)</th>
          <th>Pirix public(DH)</th>
          </tr>
  
      <?php 
              while ( $query->have_posts() ) : $query->the_post(); ?>
  
              <tr class="cpt-menu-item" id="post-<?php the_ID(); ?>">
                  <td>
                      <?php the_title(); ?>
                  </td>
                  <td>
                      <?php 
                      set_post_thumbnail_size( 100, 72); 
                      the_post_thumbnail();
                      ?>
                  </td>
                  <td>
                      <?php the_excerpt(); ?>
                  </td>
              
                  <td>
                      <?php echo esc_attr( get_post_meta( get_the_ID(), 'log_code', true ) ); ?>
                  </td>
                  <td>
                      <?php echo esc_attr( get_post_meta( get_the_ID(), 'log_price_buy', true ) ); ?>
                  </td>
                  <td >
                      <?php echo esc_attr( get_post_meta( get_the_ID(), 'log_price_vente', true ) ); ?>
                  </td>
                  <td >
                      <?php echo esc_attr( get_post_meta( get_the_ID(), 'log_price_pub', true ) ); ?>
                  </td>
              </tr>
  
              <?php endwhile;
  
              echo '</table>';
  
  
  wp_reset_postdata();
  
        }
      } 
    }