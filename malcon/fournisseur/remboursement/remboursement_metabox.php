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

    <label for="date_versement">
        Date de versement
    </label>

    <input id="date_versement" type="date" name="date_versement" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'date_versement', true ) ); ?>">

</p>
<p class="meta-options bl_field">
    <label>Type</label>

            <select name="select_type_versement" >';

            <option value = "" >Type</option>

            <option value = "Espéce" >Espéce</option>

            <option value="chéque">chéque</option>
                        

            <option value="Effet">Effet</option>
                        

            </select>;
</p>
<p class="meta-options remboursement_field">

    <label for="banque">
        Banque
    </label>

    <input id="banque" type="text" name="banque" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'banque', true ) ); ?>">

</p>
<p class="meta-options remboursement_field">

    <label for="no_cheque">
        N° chéque
    </label>

    <input id="no_cheque" type="text" name="no_cheque" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'no_cheque', true ) ); ?>">

</p>

<p class="meta-options remboursement_field">

    <label for="lbelle_cheque">
        chéque Libellé
    </label>

    <input id="lbelle_cheque" type="text" name="lbelle_cheque" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'lbelle_cheque', true ) ); ?>">

</p>

<p class="meta-options remboursement_field">

    <label for="montant">
        Montant
    </label>

    <input id="montant" type="text" name="montant" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'montant', true ) ); ?>">

</p>

<p class="meta-options bl_field">

    <label for="date_accuser">
        Date de Accuser
    </label>

    <input id="date_accuser" type="date" name="date_accuser" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'date_accuser', true ) ); ?>">

</p>

<!-- <p class="meta-options bl_field">

    <label for="recu">
       Reçu
    </label>

    <input id="recu" type="date" name="recu" value="<?php //echo esc_attr( get_post_meta( get_the_ID(), 'recu', true ) ); ?>">

</p>

<p class="meta-options bl_field">

    <label for="rejeter">
       Rejeter
    </label>

    <input id="rejeter" type="date" name="rejeter" value="<?php //echo esc_attr( get_post_meta( get_the_ID(), 'rejeter', true; ?>">

</p>

 -->
