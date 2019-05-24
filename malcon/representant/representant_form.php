
    <style>
        .four_box{
            display: grid;
            grid-template-columns: max-content 1fr;
            grid-row-gap: 10px;
            grid-column-gap: 20px;
        }
        .four_field{
            display: contents;
        }
    </style>
<div class="four_box">
     
            
        
            <label for="repre_cin">
                CIN
            </label>
        
        
            <input id="repre_cin" type="text" name="repre_cin"
            value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'repre_cin', true ) ); ?>">
        
    
    
        
            <label for="repre_zone">
                Zone
            </label>
        
        
            <input id="repre_zone" type="text" name="repre_zone"
            value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'repre_zone', true ) ); ?>" />
        
    
    
        
            <label for="repre_code_bl">
                Code BL
            </label>
        
        
            <input id="repre_code_bl" type="text" name="repre_code_bl" 
            value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'repre_code_bl', true ) ); ?>">
        
    
    
    
        
            <label for="repre_tel">
                Tel
            </label>
        
        
            <input id="repre_tel" type="tel" name="repre_tel"
            value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'repre_tel', true ) ); ?>">
        
    
    
        
            <label for="repre_email">
                email
            </label>
        
        
            <input id="repre_email" type="email" name="repre_email"
            value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'repre_email', true ) ); ?>">
        
    
    
        
            <label for="repre_adresse">
                Adresse
            </label>
        
        
            <input id="repre_adresse" type="text" name="repre_adresse"
            value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'repre_adresse', true ) ); ?>">
        
    
    
        
            <label for="repre_code_postale">
               Code Postale
            </label>
        
        
            <input id="repre_code_postale" type="number" name="repre_code_postale"
            value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'repre_code_postale', true ) ); ?>">
        
    
    
        
            <label for="repre_ville">
                Ville
            </label>
        
        
            <input id="repre_ville" type="text" name="repre_ville"
            value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'repre_ville', true ) ); ?>">
        
    
    
        
            <label for="repre_ville_laivraison">
                Ville De laivraison
            </label>
        
        
            <input id="repre_ville_laivraison" type="text" name="repre_ville_laivraison"
            value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'repre_ville_laivraison', true ) ); ?>">
        
    
    
        
            <label for="repre_lieu_travail">
                Lieu De Travail
            </label>
        
        
            <input id="repre_lieu_travail" type="text" name="repre_lieu_travail"
            value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'repre_lieu_travail', true ) ); ?>">
        
    
    
        
            <label for="repre_login">
                Login
            </label>
        
        
            <input id="repre_login" type="tel" name="repre_login"
            value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'repre_login', true ) ); ?>">
        
    

    
        
            <label for="repre_pwd">
                Mot De Pass
            </label>
    
        
            <input id="repre_pwd" type="tel" name="repre_pwd"
            value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'repre_pwd', true ) ); ?>">

</div>