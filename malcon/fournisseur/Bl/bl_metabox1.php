<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>

</script>
<div class="bl_box">

<style>

    .bl_box

        {
            display: grid;
            grid-template-columns: max-content 1fr;
            grid-row-gap: 10px;
            grid-column-gap: 20px;
        }

    .bl_field

        {
            display: contents;
        }

</style>


 <p class="meta-options bl_field">

    <label for="bl_Date">
        Date
    </label>

    <input id="bl_Date" type="date" name="bl_Date" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'bl_Date', true ) ); ?>">

</p>

<p class="meta-options bl_field">

    <label for="bl_No">
        N° BL
    </label>

    <input id="bl_No" type="text" name="bl_No" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'bl_No', true ) ); ?>">

</p>


<!--Test-->

<!--ETest-->
<p class="meta-options bl_field">

    <label for="title">
        Fournisseur
    </label>
<?php
$select_id = "select-name";

$post_type='fournisseur';

generate_post_select($select_id, $post_type);

    function generate_post_select($select_id, $post_type) 
        {

            $post_type_object = get_post_type_object($post_type);

            $label = $post_type_object->label;

            $posts = get_posts(array('post_type'=> $post_type, 'post_status'=> 'publish'));

            echo '<select name="'. $select_id .'" >';

            echo '<option value = "" >All '.$label.' </option>';

            foreach ($posts as $post) 
                {
                    echo '<option value="'. $post->ID. '">'. $post->post_title . '</option>';
                }
            echo '</select>';
        }
?>
 </p>

 
</div>

<?php 
 // get the categories for the custom post taxonomy
$terms = get_terms( 'type_livre', array(
        'orderby'    => 'id',
        'hide_empty' => 1 // hide categories with no posts
    ) 
);
$ar = [];
// now run a query for each category
foreach( $terms as $term ) {

    //Define the query
    $args = array(
        'post_type' => 'livre', // replace with name of your custom post type
        'type_livre'  => $term->slug // replace with name of your custom taxonomy
    );
    $query = new WP_Query( $args );

    //output the category in a heading 

    echo'<h2 class="h2 faq-cat">' . $term->name. '</h2>';
  while  ($query->have_posts()) : $query->the_post(); 
  ?>

    <!-- <input type="checkbox" name="<?php //echo $term->slug; ?>" id="<?php //echo $term->id; ?>" value="<?php $term->name; ?>"<?php if(isset($_POST['check_list'])) echo 'checked="checked"'; ?>> -->
  
        <div>
            <input type="checkbox" name="<?php the_ID(); ?>" id="<?php the_ID(); ?>" value="<?php the_title() ; ?>" >
            
            <label for="<?php the_ID(); ?>">
                <?php echo '<h1>'.the_title().'</h1>' ; ?>
            </label>

            <label for="Qte_livre" style="margin-left: 352px;buttom">
                <?php //echo 'Qte'; ?>
            </label>

            <input type="number" id="<?php the_ID();?>" name="<?php echo 'qte'.the_ID();?>" style="margin-left: 452px;"/>

        </div>
        <?php array_push($ar, the_ID()); 
        endwhile;  wp_reset_postdata(); 

    // use reset postdata to restore the original query
    wp_reset_postdata();

} 


//////////////////////////////


<style>

        .bl_box
    
            {
                display: grid;
                grid-template-columns: max-content 1fr;
                grid-row-gap: 10px;
                grid-column-gap: 20px;
            }
    
        .bl_field
    
            {
                display: contents;
            }
    
    </style>
    
    
     <p class="meta-options bl_field">
    
        <label for="bl_Date">
            Date
        </label>
    
        <input id="bl_Date" type="date" name="bl_Date" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'bl_Date', true ) ); ?>">
    
    </p>
    
    <p class="meta-options bl_field">
    
        <label for="bl_No">
            N° BL
        </label>
    
        <input id="bl_No" type="text" name="bl_No" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'bl_No', true ) ); ?>">
    
    </p>
    
    
    <!--Test-->
    
    <!--ETest-->
    <p class="meta-options bl_field">
    
        <label for="title">
            Fournisseur
        </label>
    <?php
    $select_id = "select-name";
    
    $post_type='fournisseur';
   
                $post_type_object = get_post_type_object($post_type);
    
                $label = $post_type_object->label;
    
                $posts = get_posts(array('post_type'=> $post_type, 'post_status'=> 'publish'));
    
                echo '<select name="'. $select_id .'" >';
    
                echo '<option value = "" >All '.$label.' </option>';
    
                foreach ($posts as $post) 
                    {
                        echo '<option value="'. $post->post_title . '">'. $post->post_title . '</option>';
                    }
                echo '</select>';
        
    ?>
     </p>
    
     
    </div>
    
    <?php 
     // get the categories for the custom post taxonomy
    $terms = get_terms( 'type_livre', array(
            'orderby'    => 'id',
            'hide_empty' => 1 // hide categories with no posts
        ) 
    );
    global $ar;
    global $arq;
    // now run a query for each category
    foreach( $terms as $term ) {
    
        //Define the query
        $args = array(
            'post_type' => 'livre', // replace with name of your custom post type
            'type_livre'  => $term->slug // replace with name of your custom taxonomy
        );
        $query = new WP_Query( $args );
    
        //output the category in a heading 
        
        echo'<h2 class="h2 faq-cat">' . $term->name. '</h2>';
    while  ($query->have_posts()) : $query->the_post(); 
      
    $livre_slug = sanitize_title_with_dashes(get_the_title(get_the_ID()));

    $qte_slug = $livre_slug . 'qte';

                array_push($ar, $livre_slug);
            
                array_push($arq, $qte_slug); 

      ?>
    
        <!-- <input type="checkbox" name="<?php //echo $term->slug; ?>" id="<?php //echo $term->id; ?>" value="<?php //$term->name; ?>"<?php //if(isset($_POST['check_list'])) echo 'checked="checked"'; ?>> -->
      
            <div>

                <label for="<?php the_ID(); ?>">
                    <?php echo '<h1>'.the_title().'</h1>' ; ?>
                </label>
                <input type="checkbox" name="<?php echo $livre_slug; ?>" id="<?php the_ID(); ?>" value="<?php the_title() ; ?>" <?php if(isset($_POST[$livre_slug])) echo 'checked="checked"'; ?> />
             
                <label for="<?php echo $qte_slug;?>" style="margin-left: 352px;buttom">
                    <?php echo 'Qte'; ?>
                </label>
             
                <input type="number" id="<?php the_ID();?>" name="<?php echo $qte_slug;?>" style="margin-left: 452px;" value="<?php echo esc_attr( get_post_meta( get_the_ID(), $qte_slug, true ) ); ?>"/>
    
            </div>
            <?php 
            
           
           
              wp_reset_postdata(); endwhile;
    
        // use reset postdata to restore the original query
        wp_reset_postdata();
       
    }
    echo glo($ar);

    print_r($arq);
