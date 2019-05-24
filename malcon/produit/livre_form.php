

<div class="livre_box">
    <style>
        .livre_box{
            display: grid;
            grid-template-columns: max-content 1fr;
            grid-row-gap: 10px;
            grid-column-gap: 20px;
        }
        .livre_field{
            display: contents;
        }
        .button-category{
            margin-left: 3px;
            padding: 7px 12px;
            position: relative;
            top: 69px;
            left: 580px;
            text-decoration: none;
            border: 1px solid #d6d6d6;
            border-radius: 15px;
            background: #f7f7f7;
            text-shadow: none;
            font-weight: 600;
            font-size: 13px;
            line-height: normal;
            color: #708994;
            cursor: pointer;
          
        }
        .button-category:hover
        {
            background: #4d73aa;
        }
        .lin:active, .lin:hover 
        {
            color: #f7f7f7;
        }
        .lin {
            outline: 0;
            color: #4d73aa;
            text-decoration: none;
        }
    </style>
    <p class="meta-options livre_field">
        <label for="livre_code">Code</label>
        <input id="livre_code" type="text" name="livre_code"
        value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'livre_code', true ) ); ?>">
    </p>
    <p class="meta-options livre_field">
        <label for="livre_price_buy">prix achat(DH)</label>
        <input id="livre_price_buy" type="number" name="livre_price_buy"
        value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'livre_price_buy', true ) ); ?>">
    </p>
    <p class="meta-options livre_field">
        <label for="livre_price_vente">prix vente(DH)</label>
        <input id="livre_price_vente" type="number" name="livre_price_vente"
        value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'livre_price_vente', true ) ); ?>">
    </p>
    <p class="meta-options livre_field">
        <label for="livre_price_pub">prix public(DH)</label>
        <input id="livre_price_pub" type="number" name="livre_price_pub" 
        value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'livre_price_pub', true ) ); ?>">
    </p>
    <p class="meta-options livre_field">
        <label for="livre_nbr_page">Nombre de pages</label>
        <input id="livre_nbr_page" type="number" name="livre_nbr_page"
        value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'livre_nbr_page', true ) ); ?>">
    </p>
    <p>
    <button class="button-category"><a class="lin" href='http://localhost/wordpress/wp-admin/edit-tags.php?taxonomy=category'>Ajouter Categorie</a></button>
    </p>
</div>

