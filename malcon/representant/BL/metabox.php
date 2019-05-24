<p class="meta-options bl_field">

    <label for="title">
        Fournisseur
    </label>
<?php
$select_id = "select-fournisseur";

$post_type='fournisseur';

generate_post_select2($select_id, $post_type);

    function generate_post_select2($select_id, $post_type) 
        {
            $post_type_object = get_post_type_object($post_type);

            $label = $post_type_object->label;

            $posts = get_posts(array('post_type'=> $post_type, 'post_status'=> 'publish'));

            echo '<select name="'. $select_id .'" >';

            echo '<option value = "" >All '.$label.' </option>';

                foreach ( $posts as $post ) :
                    
                    //echo '<option value="'.$post->post_title.'"'.($select_id)?.'selected':'" ">'. $post->post_title . '</option>';
                ?>
                <option value="<?php echo $post->post_title;?>"<?php selected(get_post_meta($post->ID, $select_id, true),$post->post_title); ?> >
                <?php echo $post->post_title;?>
                </option>
                <?php
                endforeach;
            

            echo '</select>';
        }
?>
 </p>

<p class="meta-options bl_field">

    <label for="title">
        Representant
    </label>
<?php
$select_id = "select-name";

$post_type='representant';

generate_post_select($select_id, $post_type);

    function generate_post_select($select_id, $post_type) 
        {

            $post_type_object = get_post_type_object($post_type);

            $label = $post_type_object->label;

            $posts = get_posts(array('post_type'=> $post_type, 'post_status'=> 'publish'));

            echo '<select name="'. $select_id .'" >';

            echo '<option value = "" >All '.$label.' </option>';

                foreach ( $posts as $post ) :
                    
                    //echo '<option value="'.$post->post_title.'"'.($select_id)?.'selected':'" ">'. $post->post_title . '</option>';
                ?>
                <option value="<?php echo $post->post_title;?>"<?php selected(get_post_meta($post->ID, $select_id, true),$post->post_title); ?> >
                <?php echo $post->post_title;?>
                </option>
                <?php
                endforeach;

            echo '</select>';
        }
?>
 </p>

 <p class="meta-options bl_field">

    <label for="bl_rep_Date">
        Date
    </label>

    <input id="bl_rep_Date" type="date" name="bl_rep_Date" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'bl_rep_Date', true ) ); ?>">

</p>
<p class="meta-options bl_field">

            <select name="select-produi" >';

            <option value = "" >Type</option>

            <option value = "Livre" >Livre</option>

            <option value="Application">Application</option>
                        

            <option value="Logiciel">Logiciel</option>
                        

            </select>;


           <select name="select-nature" >';

            <option value = "" >Nature</option>'

            <option value="Spéciment">Spéciment</option>
                        
            
            <option value="Retour">Retour</option>
                        
           
            <option value="Rejet">Rejet</option>

             </select>;
 
 </p>
<p class="meta-options bl_field">

    <label for="bl_re_No">
        N° BL
    </label>

    <input id="bl_re_No" type="text" name="bl_re_No" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'bl_re_No', true ) ); ?>">

</p>
<p class="meta-options bl_field">

    <label for="mode_envoi">
        N° BL
    </label>

    <input id="mode_envoi" type="text" name="mode_envoi" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'mode_envoi', true ) ); ?>">

</p>
