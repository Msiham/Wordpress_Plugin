<?php 
 // get the categories for the custom post taxonomy
$terms = get_terms( 'type_livre', array(
        'orderby'    => 'id',
        'hide_empty' => 1 // hide categories with no posts
    ) 
);
// now run a query for each category

foreach( $terms as $term ) {

    // Define the query

    $args = array(
        'post_type' => 'livre', 
        'type_livre'  => $term->slug,
    );

    $query = new WP_Query( $args );
             
    echo'<h2 class="h2 faq-cat">' . $term->name . '</h2>';

        // Start the post loop
        
        while ( $query->have_posts() ) : $query->the_post(); ?>

        <div>
            <input type="checkbox" name="check_list" id="<?php the_ID(); ?>" value="<?php the_title() ; ?>" >
            
            <label for="<?php the_ID(); ?>">
                <?php the_title() ; ?>
            </label>

            <label for="Qte_livre" style="margin-left: 352px;buttom">
                <?php echo 'Qte'; ?>
            </label>

            <input type="number" id="Qte_livre" name="Qte_livre" style="margin-left: 452px;"/>

        </div>
        <?php endwhile;  wp_reset_postdata(); 

        echo '<hr/>';

    // use reset postdata to restore the original query
    wp_reset_postdata();

} ?>

</div>