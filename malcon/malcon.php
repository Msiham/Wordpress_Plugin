<?php
/**
 * @package malcon
 */
/*
* Plugin Name: Malcon
* Plugin URI: http://malcon.com/
* Description: This is a plugin for malcon.
* Author: Cherqaoui Siham, malcon
* Version: 1.0.0
* Author URI: http://bwawwp.com
* License: GPLv2 or later
*/

/// This Is For Security

    defined ('ABSPATH') or die ('Sorry, You Can\'t Access This File, You Silly Human!');
 
///Start Products
    /// Product Add Actions

        add_action('init', 'custome_saison');

        add_action('init', 'ajouter_fonction');

        add_action('init', 'custome_livre');

        add_action('init', 'custome_logitiel');

        add_action('init', 'custome_app');

        add_action( 'admin_menu', 'remove_menus' );

        add_action('admin_menu', 'products_menu');
    
    /// Add Products Menus / Submenu
        function products_menu() 
            
            {

                add_menu_page( 'Nous Produits', 'Produits', 'manage_options', 'produit_slug', 'produit_fonction', 'dashicons-screenoptions', 5 );

                //Livre Menu

                add_submenu_page('produit_slug', 'Nous livres', 'Livres', 'manage_options', 'edit.php?post_type=livre');

                //Apps Menu

                add_submenu_page('produit_slug', 'Nous Apps', 'Apps', 'manage_options', 'edit.php?post_type=app');

                //Logicie Menu

                add_submenu_page('produit_slug', 'Nous Logiciels', 'Logiciels', 'manage_options', 'edit.php?post_type=logiciel');

                //Ajouter Menu

                add_submenu_page( 'produit_slug', 'ajout', 'Ajouter Produit', 'manage_options', 'ajou_slug', 'ajouter_fonction');

                add_menu_page('delete', 'delete', 'manage_options', 'delete_four_slug', 'delete_callback', null, 0);
            }



    /// Product Function

        function produit_fonction() 

            {
                include plugin_dir_path( __FILE__ ) . './produit/produitFunction.php';
            }

        //End Procuit Function

        function delete_callback(){

            include plugin_dir_path( __FILE__ ) . './fournisseur/delete_four_fonc.php';
        }


    /// CPTs
        ///Livre CPT
            function custome_livre()
                    
                    {
                        // include plugin_dir_path( __FILE__ ) . './produit/livreCPT.php';
                        $cptName = 'livre';
                                
                                createCPT ( $cptName );
                    }

        ///Apps CPT 

            function custome_app()

                    {
                        // include plugin_dir_path( __FILE__ ) . './produit/appCPT.php';

                        $cptName = 'app';
                                
                        createCPT ( $cptName );
                    }

        ///Logiciel CPT

            function custome_logitiel()

                    {
                        // include plugin_dir_path( __FILE__ ) . './produit/logicielCPT.php';

                        $cptName = 'logiciel';
                                
                        createCPT ( $cptName );
                    }
    /// Adding Meta Boxes

        // Meta Box For Livre
                #Register Meta Box

                function livre_function_meta_box()
                    {
                        add_meta_box( 'livre_meta_box', 'more Infos', 'livre_meta_box_callback', 'livre', 'normal');
                    }
            
                add_action('add_meta_box', 'livre_add_meta_box');
                
                #callback function Meta Box

                function livre_meta_box_callback()
                    {
                        wp_nonce_field( 'livre_save_meta_box_data', 'livre_nonce_name'); 

                        include plugin_dir_path( __FILE__ ) . './produit/livre_form.php';
                    
                    }      

                # Save Meta Box

                function livre_save_meta_box_data( $post_id )
                    {
                            
                        if (! isset( $_POST['livre_nonce_name'] ))
                            return;

                        if ( ! wp_verify_nonce($_POST['livre_nonce_name'], 'livre_save_meta_box_data'))
                            return;

                        if ( defined( DOING_AUTOSAVE ) && DOING_AUTOSAVE )
                            return;

                        if ( ! current_user_can('edit_post', $post_id))
                            return;

                        $fields = 
                            [
                                'livre_code',
                                'livre_price_buy',
                                'livre_price_vente',
                                'livre_price_pub',
                                'livre_nbr_page'
                            ];

                        foreach ( $fields as $field ) 
                            {
                                if ( array_key_exists( $field, $_POST ) ) 
                                    {
                                        update_post_meta( $post_id, $field, sanitize_text_field( $_POST[$field] ) );
                                    }
                            }
                    }     
                add_action('save_post', 'livre_save_meta_box_data');

        // Meta Box For app
                #Register Meta Box

                function app_function_meta_box()
                    {
                        add_meta_box( 'app_meta_box', 'more Infos', 'app_meta_box_callback', 'app', 'normal');
                    }
            
                add_action('add_meta_box', 'app_add_meta_box');
                
                #callback function Meta Box

                function app_meta_box_callback()
                    {
                        wp_nonce_field( 'app_save_meta_box_data', 'app_nonce_name'); 

                        include plugin_dir_path( __FILE__ ) . './produit/app_form.php';
                    
                    }      

                # Save Meta Box

                function app_save_meta_box_data( $post_id )
                    {
                            
                        if (! isset( $_POST['app_nonce_name'] ))
                            return;

                        if ( ! wp_verify_nonce($_POST['app_nonce_name'], 'app_save_meta_box_data'))
                            return;

                        if ( defined( DOING_AUTOSAVE ) && DOING_AUTOSAVE )
                            return;

                        if ( ! current_user_can('edit_post', $post_id))
                            return;

                        $fields = 
                            [
                                'app_code',
                                'app_price_buy',
                                'app_price_vente',
                                'app_price_pub',
                            ];

                        foreach ( $fields as $field ) 
                            {
                                if ( array_key_exists( $field, $_POST ) ) 
                                    {
                                        update_post_meta( $post_id, $field, sanitize_text_field( $_POST[$field] ) );
                                    }
                            }
                    }     
                add_action('save_post', 'app_save_meta_box_data');
            
        // Meta Box For Logiciel
                #Register Meta Box

                function logiciel_function_meta_box()
                    {
                        add_meta_box( 'logiciel_meta_box', 'more Infos', 'logiciel_meta_box_callback', 'logiciel', 'normal');
                    }
            
                add_action('add_meta_box', 'logiciel_add_meta_box');
                
                #callback function Meta Box

                function logiciel_meta_box_callback()
                    {
                        wp_nonce_field( 'logiciel_save_meta_box_data', 'logiciel_nonce_name'); 

                        include plugin_dir_path( __FILE__ ) . './produit/logiciel_form.php';
                    
                    }      

                # Save Meta Box

                function logiciel_save_meta_box_data( $post_id )
                    {
                            
                        if (! isset( $_POST['logiciel_nonce_name'] ))
                            return;

                        if ( ! wp_verify_nonce($_POST['logiciel_nonce_name'], 'logiciel_save_meta_box_data'))
                            return;

                        if ( defined( DOING_AUTOSAVE ) && DOING_AUTOSAVE )
                            return;

                        if ( ! current_user_can('edit_post', $post_id))
                            return;

                        $fields = 
                            [
                                'logiciel_code',
                                'logiciel_price_buy',
                                'logiciel_price_vente',
                                'logiciel_price_pub',
                                'logiciel_nbr_page'
                            ];

                        foreach ( $fields as $field ) 
                            {
                                if ( array_key_exists( $field, $_POST ) ) 
                                    {
                                        update_post_meta( $post_id, $field, sanitize_text_field( $_POST[$field] ) );
                                    }
                            }
                    }     
                add_action('save_post', 'logiciel_save_meta_box_data'); 
    ///Add Custom Columns To CPTs
        // Column to livre CPT
            add_filter( 'manage_livre_posts_columns', 'livre_set_columns_function' );

            function livre_set_columns_function (/*$columns:if we wanna unset same columns*/)
                {
                    // N.B for remove any column do : unset ($columns['nameOfColumn']);

                    $newColumns = array();
                    $newColumns ['title'] = "Titre";
                    $newColumns ['livre_code'] = "code";
                    $newColumns ['category'] = "categorie";
                    $newColumns ['livre_price_buy'] = "achat (DH)";
                    $newColumns ['livre_price_vente'] = "vent (DH)";
                    $newColumns ['livre_price_pub'] = "p.Public(DH)";
                    $newColumns ['livre_nbr_page'] = "Nombre de pages";
                    $newColumns ['livre_meta_box_field_modify'] = "Modifier";
                    $newColumns ['livre_meta_box_field_delete'] = "Supprimer";
                    return $newColumns;
                }
            
            add_action ('manage_livre_posts_custom_column', 'livre_set_value_of_custom_column', 10,2);// 2 is the number of arguments chould past in  the function
            
            function livre_set_value_of_custom_column( $column, $post_id)  
                {
                    switch ($column) {
                        case 'livre_code':
                            $code = get_post_meta( $post_id, 'livre_code', true);
                            echo $code;
                            break;
                        
                        case 'category':
                            $terms = get_the_terms( $post_id, 'type_livre' );

                            if ($terms) 
                                {
                                    foreach($terms as $term) 
                                        {
                                            echo $term->name;
                                        } 
                                }
                            break;
                        
                        case 'livre_price_buy':
                            $buyprice = get_post_meta( $post_id, 'livre_price_buy', true);
                            echo $buyprice;
                            break;
                        
                        case 'livre_price_vente':
                            $venteprice = get_post_meta( $post_id, 'livre_price_vente', true);
                            echo $venteprice;
                            break;

                        case 'livre_price_pub':
                            $publicprice = get_post_meta( $post_id, 'livre_price_pub', true);
                            echo $publicprice;
                            break;

                        case 'livre_nbr_page':
                            $nbrpage = get_post_meta( $post_id, 'livre_nbr_page', true);
                            echo $nbrpage;
                            break;
                        
                        case 'livre_meta_box_field_modify':
                            echo '<a href="post.php?post='.$post_id.'&action=edit" >Modifier</a>';
                            break;

                        case 'livre_meta_box_field_delete':
                        echo '<a href="admin.php?page=delete_four_slug&id='.$post_id.'"><span class="lin">Supprimer</span></a>';
                            break;
                    }
                }

        // Column to app CPT
            add_filter( 'manage_app_posts_columns', 'app_set_columns_function' );

            function app_set_columns_function (/*$columns:if we wanna unset same columns*/)
                {
                    // N.B for remove any column do : unset ($columns['nameOfColumn']);

                    $newColumns = array();
                    $newColumns ['title'] = "Titre";
                    $newColumns ['app_code'] = "code";
                    $newColumns ['category'] = "type";
                    $newColumns ['app_price_buy'] = "achat (DH)";
                    $newColumns ['app_price_vente'] = "vent (DH)";
                    $newColumns ['app_price_pub'] = "p.Public(DH)";
                    $newColumns ['app_meta_box_field_modify'] = "Modifier";
                    $newColumns ['app_meta_box_field_delete'] = "Supprimer";
                    return $newColumns;
                }
            
            add_action ('manage_app_posts_custom_column', 'app_set_value_of_custom_column', 10,2);// 2 is the number of arguments chould past in  the function
            
            function app_set_value_of_custom_column( $column, $post_id)  
                {
                    switch ($column) {
                        case 'app_code':
                            $code = get_post_meta( $post_id, 'app_code', true);
                            echo $code;
                            break;
                        
                        case 'category':

                        $terms = get_the_terms( $post_id, 'type_app' );

                        if ($terms) 
                            {
                                foreach($terms as $term) 
                                    {
                                        echo $term->name;
                                    } 
                            }
                            break;
                        
                        case 'app_price_buy':
                            $buyprice = get_post_meta( $post_id, 'app_price_buy', true);
                            echo $buyprice;
                            break;
                        
                        case 'app_price_vente':
                            $venteprice = get_post_meta( $post_id, 'app_price_vente', true);
                            echo $venteprice;
                            break;

                        case 'app_price_pub':
                            $publicprice = get_post_meta( $post_id, 'app_price_pub', true);
                            echo $publicprice;
                            break;

                        
                        case 'app_meta_box_field_modify':
                            echo '<a href="post.php?post='.$post_id.'&action=edit" >Modifier</a>';
                            break;

                        case 'app_meta_box_field_delete':
                        echo '<a href="admin.php?page=delete_four_slug&id='.$post_id.'"><span class="lin">Supprimer</span></a>';
                            break;
                    }
                }
        // Column to logiciel CPT
            add_filter( 'manage_logiciel_posts_columns', 'logiciel_set_columns_function' );

            function logiciel_set_columns_function (/*$columns:if we wanna unset same columns*/)
                {
                    // N.B for remove any column do : unset ($columns['nameOfColumn']);

                    $newColumns = array();
                    $newColumns ['title'] = "Titre";
                    $newColumns ['logiciel_code'] = "code";
                    $newColumns ['category'] = "type";
                    $newColumns ['logiciel_price_buy'] = "achat (DH)";
                    $newColumns ['logiciel_price_vente'] = "vent (DH)";
                    $newColumns ['logiciel_price_pub'] = "p.Public(DH)";
                    $newColumns ['logiciel_meta_box_field_modify'] = "Modifier";
                    $newColumns ['logiciel_meta_box_field_delete'] = "Supprimer";
                    return $newColumns;
                }

            add_action ('manage_logiciel_posts_custom_column', 'logiciel_set_value_of_custom_column', 10,2);// 2 is the number of arguments chould past in  the function

            function logiciel_set_value_of_custom_column( $column, $post_id)  
                {
                    switch ($column) {
                        case 'logiciel_code':
                            $code = get_post_meta( $post_id, 'logiciel_code', true);
                            echo $code;
                            break;
                        
                        case 'category':
                        $terms = get_the_terms( $post_id, 'type_logiciel' );

                        if ($terms) 
                            {
                                foreach($terms as $term) 
                                    {
                                        echo $term->name;
                                    } 
                            }
                            break;
                        
                        case 'logiciel_price_buy':
                            $buyprice = get_post_meta( $post_id, 'logiciel_price_buy', true);
                            echo $buyprice;
                            break;
                        
                        case 'logiciel_price_vente':
                            $venteprice = get_post_meta( $post_id, 'logiciel_price_vente', true);
                            echo $venteprice;
                            break;

                        case 'logiciel_price_pub':
                            $publicprice = get_post_meta( $post_id, 'logiciel_price_pub', true);
                            echo $publicprice;
                            break;

                        
                        case 'logiciel_meta_box_field_modify':
                            echo '<a href="post.php?post='.$post_id.'&action=edit" >Modifier</a>';
                            break;

                        case 'logiciel_meta_box_field_delete':
                        echo '<a href="admin.php?page=delete_four_slug&id='.$post_id.'"><span class="x">Supprimer</span></a>';
                            break;
                    }
                }
    /// Ajouter Function

        function ajouter_fonction() 
        
            {

            

                    $cptName = $_POST['produit'];
                            
                    createCPT ( $cptName );
            
                    

            }

        /* end function ajouter */
    ///Function to Add CPTs

        function createCPT ($cpt) {

            $taxono = null;

            $editor =null;

            $position = null;

            $public = true;

            $title ='title';

            $titlecpt = "Nouveau ".$cpt;

            if ( $cpt == "saison" )
                {
                    $position = 99;
                    $title =null;
                    $public =false;
                }

            if ( $cpt == "livre" )
                {
                    $taxono = "type_livre";

                    $editor = 'editor';
                }
                if ( $cpt == "bl_rep" )
                {
                  
                    $title = null;
                }

            elseif ( $cpt == "app" )
                {
                    $taxono = "type_app";
                    $editor = 'editor';
                }

            elseif ( $cpt == "logiciel" )
                { 
                    $taxono = "type_logiciel";
                    $editor = 'editor';
                }

            elseif ( $cpt == "fournisseur" )
                $titlecpt = "Raison Social";
            
            $labels = array
            (
                'name'                      => $cpt.'s',
                'singular_name'             => $cpt,
                'add_new_item'              => $titlecpt,
                'edit_item'                 => "Edit ". $cpt,
                'view_item'                 => "voir ". $cpt,
                'view_items'                => "voir ". $cpt.'s',
                'search_items'              => "chercher ". $cpt."s",
                'not_found'                 => "No ". $cpt ." found",
                'not_found_in_trash'        => "No ". $cpt ." found in trash",
                'parent_item_colon'         => "Parent ". $cpt,
                'all_items'                 => "Tous les ".$cpt."s",
                'archives'                  => $cpt." bArchives",
                'attributes'                => $cpt." Attributes",
                'insert_into_item'          => "Insert into ".$cpt,
                'uploaded_to_this_item'     => "Uploaded to this ".$cpt,
                'add_item'                  => "Ajouter nouveau ". $cpt
            );



            $args = array(
            'labels'                    => $labels,
            'public'                    => $public,
            'publicly_queryable'        => true,
            'show_ui'                   => true,
            'show_in_menu'              => 'edit.php?post_type='.$cpt,
            'query_var'                 => true,
            'capability_type'           => 'post',
            'has_archive'               => true,
            'hierarchical'              => false,
            'register_meta_box_cb'      => $cpt.'_function_meta_box',
            'menu_position'             => $position,
            'supports'                  => array($title,$editor),
            'taxonomies'                => array( $taxono ),
            );


            register_post_type( $cpt, $args);

        // Create Txonomies 

                // Livre Taxonomy

                $args = array
                    (
                        'label' => 'categorie',
                        'name' => 'type_livre',
                        'public' => true,
                        'show_admin_column' => true,
                        'hierarchical' => true
                    );

                register_taxonomy('type_livre', array('livre'), $args);
                // App Taxonomy

                $args = array
                    (
                        'label' => 'categorie',
                        'name' => 'type_app',
                        'public' => true,
                        'show_admin_column' => true,
                        'hierarchical' => true
                    );

                register_taxonomy('type_app', array('app'), $args);
            
                // Logiciel Taxonomy
                
                $args = array
                    (
                        'label' => 'categorie',
                        'name' => 'type_logiciel',
                        'public' => true,
                        'show_admin_column' => true,
                        'hierarchical' => true,
                        'show_in_menu'=> true
                    );

                register_taxonomy('type_logiciel', array('logiciel'), $args);
        }

///Start Fournisseur
    /// Fournisseur Add Actions

        add_action('init', 'custome_fournisseur');

        add_action('init', 'custome_bl');

        add_action('init', 'custome_remboursement');

        add_action('admin_menu', 'fournisseurs_menu');

    /// Fournisseur Add Menu ~ SubMenu
        function fournisseurs_menu() 
        
        {

            add_menu_page( 'Nous Fournisseurs', 'Fournisseurs', 'manage_options', 'edit.php?post_type=fournisseur', null, '
            dashicons-admin-users', 6 );

    //Fournisseurs subMenu

            add_submenu_page('edit.php?post_type=fournisseur', 'Nous fournisseur', '', 'manage_options', 'edit.php?post_type=fournisseur');

     
            add_menu_page('detail', 'detail', 'manage_options', 'detail_four_slug', 'detail_callback',null,0);


    // BL

            add_submenu_page('edit.php?post_type=fournisseur', 'BL', 'BL', 'manage_options', 'edit.php?post_type=bl');

    // remboursement

    add_submenu_page('edit.php?post_type=fournisseur', 'remboursement', 'remboursement', 'manage_options', 'edit.php?post_type=remboursement');
        }

    /// Callback Functions

        
        function detail_callback(){

            include plugin_dir_path( __FILE__ ) . './fournisseur/detail_func_four.php';
        }
    /// CPTs 

        //CPT fournisseur

            function  custome_fournisseur() 
            {
                $cptName = 'fournisseur';
                        
                        createCPT ( $cptName );
            }
            
        //CPT bl

            function  custome_bl() 
                {
                   
                    $cptName = 'bl';
                                
                    createCPT ( $cptName );     
                        
                   
                }

        //CPT remboursement

            function  custome_remboursement() 
            {
            
                $cptName = 'remboursement';
                            
                createCPT ( $cptName );     
                    
            
            }

    /// Meta Box 
        /// Meta Box Fournisseur

            #Register Meta Box Fournisseur

            function fournisseur_function_meta_box()
                {
                    add_meta_box( 'fournisseur_meta_box', 'more Infos', 'fournisseur_meta_box_callback', 'fournisseur', 'normal');
                }
        
            add_action('add_meta_box', 'fournisseur_add_meta_box');
            
            #callback function Meta Box

            function fournisseur_meta_box_callback()
                {
                    wp_nonce_field( 'fournisseur_save_meta_box_data', 'fournisseur_nonce_name'); 

                    include plugin_dir_path( __FILE__ ) . './fournisseur/fornisseur_form.php';
                
                }      

            # Save Meta Box Fournisseur

            function fournisseur_save_meta_box_data( $post_id )
                {
                        
                    if (! isset( $_POST['fournisseur_nonce_name'] ))
                        return;

                    if ( ! wp_verify_nonce($_POST['fournisseur_nonce_name'], 'fournisseur_save_meta_box_data'))
                        return;

                    if ( defined( DOING_AUTOSAVE ) && DOING_AUTOSAVE )
                        return;

                    if ( ! current_user_can('edit_post', $post_id))
                        return;

                    $fields = 
                        [
                            'four_address',
                            'four_dir_fullname',
                            'four_dir_email',
                            'four_dir_tel',
                            'four_join_fullname',
                            'four_join_email',
                            'four_join_tel',
                        ];

                    foreach ( $fields as $field ) 
                        {
                            if ( array_key_exists( $field, $_POST ) ) 
                                {
                                    update_post_meta( $post_id, $field, sanitize_text_field( $_POST[$field] ) );
                                }
                        }
                }     
            add_action('save_post', 'fournisseur_save_meta_box_data');

        /// Column to fournisseur CPT
            add_filter( 'manage_fournisseur_posts_columns', 'fournisseur_set_columns_function' );

            function fournisseur_set_columns_function (/*$columns:if we wanna unset same columns*/)
                {
                    // N.B for remove any column do : unset ($columns['nameOfColumn']);

                    $newColumns = array();
                    $newColumns ['title'] = "Raison Social";
                    $newColumns ['Detail'] = "detail";
                    $newColumns ['four_meta_box_field_modify'] = "Modifier";
                    $newColumns ['four_meta_box_field_delete'] = "Supprimer";
                    return $newColumns;
                }
            
            add_action ('manage_fournisseur_posts_custom_column', 'fournisseur_set_value_of_custom_column', 11,2);// 2 is the number of arguments chould past in  the function
            
            function fournisseur_set_value_of_custom_column( $column, $post_id)  
                {
                    switch ($column) {
                        case 'Detail':
                        echo '<a href="admin.php?page=detail_four_slug&id='.$post_id.'">Details</a>';
                            break;
                        
                        case 'four_meta_box_field_modify':
                            echo '<a href="post.php?post='.$post_id.'&action=edit" >Modifier</a>';
                            break;
                        
                        case 'four_meta_box_field_delete':
                        echo '<a href="admin.php?page=delete_four_slug&id='.$post_id.'"><span class="lin">Supprimer</span></a>';
                            break;
                    }
                }


    // Meta Boxes For bl

        // function bl_display_meta_box( $post ) { 
        //     global $loop_anwaelte;
        //     $loop_anwaelte = array();   
            
        
        //     $args = array(
        //         'post_type' => 'livre',
        //         'orderby'   => 'title',
        //         'order'     => 'ASC'
        //      );
        //     $query = new WP_Query( $args );
        
        //     while ( $query->have_posts() ) : $query->the_post(); 
        //         $id = get_the_ID();
        //         $anwalt = get_post( $id, ARRAY_A );
        //         $slug = $anwalt['post_name'];
        //         $titolo = $anwalt['post_title'];
        //         $loop_anwaelte[] = $slug;
        //         ?>
              <!-- <p>
                    <input type="checkbox" id="<?php //echo $slug; ?>" name="<?php                  //echo $slug; ?>" value="yes" <?php 
        //                 checked( get_post_meta( $post->ID, $slug, true ), 'yes' ); 
        //                 ?>><label for="<?php //echo $slug; ?>"><?php                 // echo $titolo; ?></label>         </p> --> 
           <?php
        //     endwhile;
        //  }
        
         function bl_function_meta_box() {
             add_meta_box(
                 'bl-meta-box',         'Autor Infos',
                 'bl_meta_box_callback',
                 'bl',
                 'side',
                'low'
             );
         }
        add_action( 'add_meta_boxes', 'bl_function_meta_box' );
    
        $ar=[];
        $arq=[];
        function bl_meta_box_callback($ar,$arq)
        {
            //wp_nonce_field( 'remboursement_save_meta_box_data', 'remboursement_nonce_name'); 

            //include plugin_dir_path( __FILE__ ) . './fournisseur/Bl/bl_metabox1.php';
        
        ?><style>

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
                        echo '<option value="'. $post->ID. '">'. $post->post_title . '</option>';
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
    
        array_push($GLOBALS['ar'], $livre_slug);
    
        array_push($GLOBALS['arq'], $qte_slug);
      ?>
    
      
            <div>

                <label for="<?php the_ID(); ?>">
                    <?php echo '<h1>'.the_title().'</h1>' ; ?>
                </label>
                <input type="checkbox" name="<?php echo $livre_slug; ?>" id="<?php the_ID(); ?>" value="<?php the_title() ; ?>" <?php if(isset($_POST[$livre_slug])) echo 'checked="checked"'; ?> />
             
                <label for="Qte_livre" style="margin-left: 352px;buttom">
                    <?php echo 'Qte'; ?>
                </label>
             
                <input type="number" id="<?php the_ID();?>" name="<?php echo $qte_slug;?>" style="margin-left: 452px;" value="<?php echo esc_attr( get_post_meta( get_the_ID(), $qte_slug, true ) ); ?>"/>
    
            </div>
            <?php 
            

              wp_reset_postdata(); endwhile;
    
        // use reset postdata to restore the original query
        wp_reset_postdata();
    
    } 
 
    // foreach($GLOBALS['ar'] as $a): echo '<h1>'.$a.'</h1>';endforeach;

    // foreach($GLOBALS['arq'] as $a): echo '<h1>'.$a.'</h1>';endforeach;  
    
    function bl_save_meta_box_data( $post_id,$arq,$ar )
    {
       
        $fields = 
            [

                'bl_Date', 
                'select-name',
                'bl_No',

            ];
         
        foreach ($GLOBALS['ar'] as $a):
            array_push($fields, $a);
        endforeach;
        foreach ($GLOBALS['arq'] as $aq):
            array_push($fields,$aq);
        endforeach;
         
        foreach ( $fields as $field ) 
            {
               
                update_post_meta( $post_id, $field, strip_tags( $_POST[$field] ) );
     
            }
        
      
    }  
   
add_action('save_post', 'bl_save_meta_box_data',10,3);
}
        print_r($GLOBALS['ar']);
       
        //column bl
                add_filter( 'manage_bl_posts_columns', 'bl_set_columns_function' );
                function bl_set_columns_function (/*$columns:if we wanna unset same columns*/)
                    {
                        // N.B for remove any column do : unset ($columns['nameOfColumn']);
                        global $ar;
                        $newColumns = array();
                        $newColumns ['title'] = "BLs";
                        $newColumns ['bl_Date'] = "Date";
                        $newColumns ['select-name'] = "fournisseur";
                        $newColumns ['bl_No'] = "numero BL";
                        $newColumns ['Qte_livre'] = "Qté BL";
                        $newColumns ['n'] = "Qté BL";
                        $newColumns ['check_list'] = "list BL";
                        foreach ($ar as $a ):
                            $newColumns[$a] = $a;
                        endforeach;
                        return $newColumns;
                    }
                
                add_action ('manage_bl_posts_custom_column', 'bl_set_value_of_custom_column', 11,2);// 2 is the number of arguments chould past in  the function
                
                function bl_set_value_of_custom_column( $column, $post_id)  
                    {
                        switch ($column) {
                            case 'bl_Date':
                            $code = get_post_meta( $post_id, 'bl_Date', true);
                            echo $code;
                            break;
                            
                            case 'select-name':
                            $code = get_post_meta( $post_id, 'select-name', true);
                            echo $code;
                            break;
                            
                            case 'bl_No':
                            $code = get_post_meta( $post_id, 'bl_No', true);
                            echo $code;
                            break;

                            case 'Qte_livre':
                            $codes = get_post_meta( $post_id, 'Qte_livre', false);
                           
                               echo print_r($codes);
                            break;

                            case 'check_list':

                           
                           
                           
                            break;
                        }
                    }
          
    // Meta Box For remboursement
                #Register Meta Box

                function remboursement_function_meta_box()
                    {
                        add_meta_box( 'remboursement_meta_box', 'more Infos', 'remboursement_meta_box_callback', 'remboursement', 'normal');
                    }
            
                add_action('add_meta_box', 'remboursement_add_meta_box');
                
                #callback function Meta Box

                function remboursement_meta_box_callback()
                    {
                        wp_nonce_field( 'remboursement_save_meta_box_data', 'remboursement_nonce_name'); 

                        include plugin_dir_path( __FILE__ ) . './fournisseur/remboursement/remboursement_metabox.php';
                    
                    }      

                # Save Meta Box

                function remboursement_save_meta_box_data( $post_id )
                    {
                         
                        
                        $fields = 
                            [
        
                                'select-fournisseur',
                                'date_versement',
                                'no_cheque',
                                'montant',
                                'select_type_versement',
                                'lbelle_cheque',
                                'banque',
                                'montant',
                                'date_accuser'
 
                            ];
                            
                            
                        foreach ( $fields as $field ) 
                            {
                                if ( array_key_exists( $field, $_POST ) ) 
                                    {
                                        update_post_meta( $post_id, $field, $_POST[$field] );
                                    }
                            }

                            
                    }     
                add_action('save_post', 'remboursement_save_meta_box_data');
    //column bl
    add_filter( 'manage_remboursement_posts_columns', 'remboursement_set_columns_function' );

    function remboursement_set_columns_function (/*$columns:if we wanna unset same columns*/)
        {
            // N.B for remove any column do : unset ($columns['nameOfColumn']);

            $newColumns = array();
            $newColumns ['select-fournisseur'] = "Fournisseur";
            $newColumns ['date_versement'] = "Date Versement";
            $newColumns ['select_type_versement'] = "Type";
            $newColumns ['banque'] = "Banque";
            $newColumns ['no_cheque'] = "N° chéque";
            $newColumns ['lbelle_cheque'] = "Chéque Libellé";
            $newColumns ['montant'] = "Montant";
            $newColumns ['date_accuser'] = "Date Accuser";

            $newColumns ['recu'] = "Reçu";
            $newColumns ['rejeter'] = "Rejeter";
            $newColumns ['modifier'] = "Modifier";
            $newColumns ['supprimer'] = "Supprimer";

            return $newColumns;
        }
    
    add_action ('manage_remboursement_posts_custom_column', 'remboursement_four_value_of_custom_column', 11,2);// 2 is the number of arguments chould past in  the function
    
    function remboursement_four_value_of_custom_column( $column, $post_id)  
        {
            switch ($column) {
                case 'select-fournisseur':
                    $code = get_post_meta( $post_id, 'select-fournisseur', true);
                                echo $code;
                        break;
                case 'date_versement':
                    $code = get_post_meta( $post_id, 'date_versement', true);
                                echo $code;
                        break;
                    
                case 'select_type_versement':
                        $code = get_post_meta( $post_id, 'select_type_versement', true);
                                echo $code;
                        break;
                    
                    
                case 'banque':
                        $code = get_post_meta( $post_id, 'banque', true);
                                echo $code;
                        break;
                case 'no_cheque':
                        $code = get_post_meta( $post_id, 'no_cheque', true);
                                echo $code;
                        break;
                case 'lbelle_cheque':
                        $code = get_post_meta( $post_id, 'lbelle_cheque', true);
                                echo $code;
                        break;

                case 'montant':
                        $code = get_post_meta( $post_id, 'montant', true);
                                echo $code;
                        break;
                case 'date_accuser':
                        $code = get_post_meta( $post_id, 'date_accuser', true);
                                echo $code;
                        break;
                
                case 'recu':
                        
                        echo '<input type="checkbox"/>';
                        break;
                        case 'rejeter':
                        
                        echo '<input type="checkbox"/>';
                            break;
                case 'modifier':
                        
                                echo '<a href="#" >detail</a>';
                                break;
        
                case 'supprimer':
                                
                                echo '<a href="#" >supprimer</a>';
                                break;
                       
            }
        }
       
/// Start Representant
    /// representant Add Actions
    add_action('init', 'custome_representant');
    add_action('init', 'custome_bl_rep');
    add_action('admin_menu', 'representants_menu');
    
    // Representants menu   
       
        function representants_menu()
        {
            add_menu_page( 'Nous Representats', 'Representats', 'manage_options', 'representant_slug', 'representant_callback', '
            dashicons-admin-users', 7 );
            
            add_menu_page('detail', 'detail', 'manage_options', 'detail_repre_slug', 'detail_repre_callback',null,0);

            add_submenu_page('representant_slug', 'Nous representant', 'Nous Representants', 'manage_options', 'representant_slug');
        
            add_submenu_page('representant_slug', 'BL', 'BL', 'manage_options', 'edit.php?post_type=bl_rep');

            add_menu_page( 'Saison', 'Saison', 'manage_options', 'edit.php?post_type=saison', null, '
            
    dashicons-megaphone', 9 );

    add_submenu_page('edit.php?post_type=saison', 'Blocker Une Saison', 'Blocker Une Saison', 'manage_options', 'blocker_saison_slug','blockerSaisonCallback');

        }

    //CPTs Representants

    //Callback
        function representant_callback(){
                include plugin_dir_path( __FILE__ ) . './representant/representant_callback.php';
            }
    //CPT representant

        function  custome_representant() 
            {
                $cptName = 'representant';
                        
                        createCPT ( $cptName );
            }
        function  custome_bl_rep() 
            {
                $cptName = 'bl_rep';
                        
                        createCPT ( $cptName );
            }

        function detail_repre_callback(){

            include plugin_dir_path( __FILE__ ) . './representant/detail_repre.php';
        }
    /// Meta Box representant

            #Register Meta Box representant

            function representant_function_meta_box()
                {
                    add_meta_box( 'representant_meta_box', 'more Infos', 'representant_meta_box_callback', 'representant', 'normal');
                }
        
            add_action('add_meta_box', 'representant_add_meta_box');
            
            #callback function Meta Box

            function representant_meta_box_callback()
                {
                    wp_nonce_field( 'representant_save_meta_box_data', 'representant_nonce_name'); 

                    include plugin_dir_path( __FILE__ ) . './representant/representant_form.php';
                
                }      

            # Save Meta Box representant

            function representant_save_meta_box_data( $post_id )
                {
                        
                    if (! isset( $_POST['representant_nonce_name'] ))
                        return;

                    if ( ! wp_verify_nonce($_POST['representant_nonce_name'], 'representant_save_meta_box_data'))
                        return;

                    if ( defined( DOING_AUTOSAVE ) && DOING_AUTOSAVE )
                        return;

                    if ( ! current_user_can('edit_post', $post_id))
                        return;

                    $fields = 
                        [
                            
                            'repre_cin',
                            'repre_zone',
                            'repre_code_bl',
                            'repre_tel',
                            'repre_email',
                            'repre_adresse',
                            'repre_code_postale',
                            'repre_ville',
                            'repre_ville_laivraison',
                            'repre_lieu_travail',
                            'repre_login',
                            'repre_pwd',
                        ];

                    foreach ( $fields as $field ) 
                        {
                            if ( array_key_exists( $field, $_POST ) ) 
                                {
                                    update_post_meta( $post_id, $field, sanitize_text_field( $_POST[$field] ) );
                                }
                        }
                }     
            add_action('save_post', 'representant_save_meta_box_data');
    /// Column to reprsentant CPT
        add_filter( 'manage_representant_posts_columns', 'representant_set_columns_function' );

        function representant_set_columns_function (/*$columns:if we wanna unset same columns*/)
            {
                // N.B for remove any column do : unset ($columns['nameOfColumn']);

                $newColumns = array();
                $newColumns ['title'] = "Nom Et Prenom";
                $newColumns ['Detail'] = "detail";
                $newColumns ['four_meta_box_field_modify'] = "Modifier";
                $newColumns ['four_meta_box_field_delete'] = "Supprimer";
                return $newColumns;
            }
        
        add_action ('manage_representant_posts_custom_column', 'representant_set_value_of_custom_column', 11,2);// 2 is the number of arguments chould past in  the function
        
        function representant_set_value_of_custom_column( $column, $post_id)  
            {
                switch ($column) {
                    case 'Detail':
                    echo '<a href="admin.php?page=detail_repre_slug&id='.$post_id.'">Details</a>';
                        break;
                    
                    case 'four_meta_box_field_modify':
                        echo '<a href="post.php?post='.$post_id.'&action=edit" >Modifier</a>';
                        break;
                    
                    case 'four_meta_box_field_delete':
                    echo '<a href="admin.php?page=delete_four_slug&id='.$post_id.'"><span class="lin">Supprimer</span></a>';
                        break;
                }
            }

    // Meta Box BL

            #Register Meta Box BL

            function bl_rep_function_meta_box()
                {
                    add_meta_box( 'bl_rep_meta_box', 'more Infos', 'bl_rep_meta_box_callback', 'bl_rep', 'normal');
                }
        
            add_action('add_meta_box', 'bl_rep_meta_box_callback');
            
            #callback function Meta Box

            function bl_rep_meta_box_callback()
                {
                    wp_nonce_field( 'bl_rep_save_meta_box_data', 'bl_rep_nonce_name'); 

                    include plugin_dir_path( __FILE__ ) . './representant/BL/metabox.php';
                }      

            # Save Meta Box bl_rep

            function bl_rep_save_meta_box_data( $post_id )
                {
                        
                    if (! isset( $_POST['bl_rep_nonce_name'] ))
                        return;

                    if ( ! wp_verify_nonce($_POST['bl_rep_nonce_name'], 'bl_rep_save_meta_box_data'))
                        return;

                    if ( defined( DOING_AUTOSAVE ) && DOING_AUTOSAVE )
                        return;

                    if ( ! current_user_can('edit_post', $post_id))
                        return;

                    $fields = 
                        [
                            'select-fournisseur',
                            'select-name',
                            'bl_rep_Date',
                            'select-produi',
                            'select-nature',
                            'bl_re_No',
                            'mode_envoi'
                            
                           
                        ];

                    foreach ( $fields as $field ) 
                        {
                            if ( array_key_exists( $field, $_POST ) ) 
                                {
                                    update_post_meta( $post_id, $field, sanitize_text_field( $_POST[$field] ) );
                                }
                        }
                }     
            add_action('save_post', 'bl_rep_save_meta_box_data');

    /// Column to BL CPT
        add_filter( 'manage_bl_rep_posts_columns', 'bl_rep_set_columns_function' );

        function bl_rep_set_columns_function (/*$columns:if we wanna unset same columns*/)
            {
                // N.B for remove any column do : unset ($columns['nameOfColumn']);

                $newColumns = array();
                $newColumns ['select-fournisseur'] = "Fournisseur";
                $newColumns ['select-name'] = "Representant";
                $newColumns ['bl_rep_Date'] = "date";
                $newColumns ['select-produi'] = "Type";
                $newColumns ['select-nature'] = "Nature";
                $newColumns ['bl_re_No'] = "No";
                $newColumns ['mode_envoi'] = "Mode D'Envoi";
                $newColumns ['detail'] = "Detail";
                $newColumns ['imprimer'] = "Imprimer";
                $newColumns ['vu'] = "Vu";
                $newColumns ['recu'] = "recu";
                
                return $newColumns;
            }
        
        add_action ('manage_bl_rep_posts_custom_column', 'bl_rep_set_value_of_custom_column', 11,2);    // 2 is the number of arguments chould past in  the function
        
        function bl_rep_set_value_of_custom_column( $column, $post_id)  
            {
                switch ($column) {

                    case 'select-fournisseur':
                    $code = get_post_meta( $post_id, 'select-fournisseur', true);
                                echo $code;
                        break;
                    case 'select-name':
                    $code = get_post_meta( $post_id, 'select-name', true);
                                echo $code;
                        break;
                    
                    case 'bl_rep_Date':
                        $code = get_post_meta( $post_id, 'bl_rep_Date', true);
                                echo $code;
                        break;
                    
                    
                    case 'select-produi':
                        $code = get_post_meta( $post_id, 'select-produi', true);
                                echo $code;
                        break;
                    case 'select-nature':
                        $code = get_post_meta( $post_id, 'select-nature', true);
                                echo $code;
                        break;
                    case 'bl_re_No':
                        $code = get_post_meta( $post_id, 'bl_re_No', true);
                                echo $code;
                        break;

                    case 'mode_envoi':
                        $code = get_post_meta( $post_id, 'mode_envoi', true);
                                echo $code;
                        break;
                    case 'detail':
                        
                        echo '<a href="#" >detail</a>';
                        break;

                    case 'imprimer':
                        
                        echo '<a href="#" >imprimer</a>';
                        break;
                    case 'vu':
                        
                    echo '<input type="checkbox"/>';
                        break;

                    case 'recu':
                        
                        echo '<input type="checkbox"/>';
                        break;
                }
            }


/// Add Style & Script 
            function add_stylesheet_general ()
                {
                    wp_enqueue_style('general_style_id', plugins_url('/admin.css', __FILE__ ));
                }
            add_action('admin_enqueue_scripts', add_stylesheet_general());

///Remove items

    # Remove Quik edit | move to trash |edit .. From Admin post panel

        add_filter( 'post_row_actions', 'remove_row_actions', 10, 1 );
        function remove_row_actions( $actions )
            {
                if( get_post_type() === 'post' )
                    unset( $actions['edit'] );
                    unset( $actions['view'] );
                    unset( $actions['trash'] );
                    unset( $actions['inline hide-if-no-js'] );
                return $actions;
            }

    # Remove Screen options
        function remove_screen_options(){
            return false;
        }
        add_filter('screen_options_show_screen', 'remove_screen_options');

        // Hide the "Please update now" notification
        function hide_update_notice() 
        {
            remove_action( 'admin_notices', 'update_nag', 3 );
            
        }
        add_action( 'admin_notices', 'hide_update_notice', 1 );
    
    // remove post .....

        
        function remove_menus() 
            {
                   
                        remove_menu_page( 'index.php' );                  //Dashboard
                        remove_menu_page( 'jetpack' );                    //Jetpack* 
                        remove_menu_page( 'edit.php' );                   //Posts
                        remove_menu_page( 'upload.php' );                 //Media
                        remove_menu_page( 'edit.php?post_type=page' );    //Pages
                        remove_menu_page( 'edit-comments.php' );          //Comments
                        remove_menu_page( 'themes.php' );                 //Appearance
                        //remove_menu_page( 'plugins.php' );                //Plugins
                        //remove_menu_page( 'users.php' );                  //Users
                        remove_menu_page( 'tools.php' );                  //Tools
                        remove_menu_page( 'options-general.php' );        //Setting
            }
    
            function custom_menu_page_removing() {
                remove_menu_page( 'delete_four_slug' );
                remove_menu_page( 'detail_four_slug' );
                remove_menu_page( 'detail_repre_slug' );
            }
            add_action( 'admin_menu', 'custom_menu_page_removing' );


            
//Cote Representant
    require_once dirname( __FILE__ ).'/cote_representant/mainn.php';

///saison CPT
    function  custome_saison() 
        {
            $cptName = 'saison';
                    
                    createCPT ( $cptName );
        }
/// Meta Box saison

            #Register Meta Box saison

            function saison_function_meta_box()
                {
                    add_meta_box( 'saison_meta_box', 'more Infos', 'saison_meta_box_callback', 'saison', 'normal');
                }
        
            add_action('add_meta_box', 'saison_add_meta_box');
            
            #callback function Meta Box

            function saison_meta_box_callback()
                {
                    wp_nonce_field( 'saison_save_meta_box_data', 'saison_nonce_name'); 

                    include plugin_dir_path( __FILE__ ) . './saison/saison_form.php';
                
                }      

            # Save Meta Box saison

            function saison_save_meta_box_data( $post_id )
                {
                        
                    if (! isset( $_POST['saison_nonce_name'] ))
                        return;

                    if ( ! wp_verify_nonce($_POST['saison_nonce_name'], 'saison_save_meta_box_data'))
                        return;

                    if ( defined( DOING_AUTOSAVE ) && DOING_AUTOSAVE )
                        return;

                    if ( ! current_user_can('edit_post', $post_id))
                        return;

                    $fields = 
                        [
                            'saison_value'
                        ];

                    foreach ( $fields as $field ) 
                        {
                            if ( array_key_exists( $field, $_POST ) ) 
                                {
                                    update_post_meta( $post_id, $field, sanitize_text_field( $_POST[$field] ) );
                                }
                        }
                }     
            add_action('save_post', 'saison_save_meta_box_data');

     /// Column to BL CPT
     add_filter( 'manage_saison_posts_columns', 'saison_set_columns_function' );

     function saison_set_columns_function (/*$columns:if we wanna unset same columns*/)
         {
             // N.B for remove any column do : unset ($columns['nameOfColumn']);

             $newColumns = array();
             $newColumns ['saison'] = "saison";
             $newColumns['supprimer']="Supprimer"; 
             return $newColumns;
         }
     
     add_action ('manage_saison_posts_custom_column', 'saison_set_value_of_custom_column', 11,2);    // 2 is the number of arguments chould past in  the function
     
     function saison_set_value_of_custom_column( $column, $post_id)  
         {
             switch ($column) {

                 
                case 'saison':
                     $code = get_post_meta( $post_id, 'saison_value', true);
                             echo $code;
                    break;
             
                case 'supprimer':
                    echo '<a href="admin.php?page=delete_four_slug&id='.$post_id.'"><span class="lin">Supprimer</span></a>';
                        break;

             }
         }
    // Page Menu Bllocker Saison Callback

         function blockerSaisonCallback()
            {
                /// Add List Of Livre
  
      $args = array
  
      (
  
          'post_type'       => 'saison',
          'posts_per_page'  => -1,
          'orderby'=>'saison_value',
          'order'=>'DES'
      );
    //   $args2 =  "SELECT a.ID, a.user_login  
    //   FROM wp_users a
    //   JOIN wp_usermeta b ON a.ID = b.user_id 
    //   WHERE b.meta_key = 'wp_capabilities' and b.meta_value like '%contributor%'
    //   ORDER BY a.user_nicename";
    $blogusers = get_users( array(
        'role' => 'representant',
    ) );
    
    
  
      $query = new WP_Query( $args );

      if ( $query->have_posts()) {
  
          echo '<h6>Blocker Saison : </h6>';
          echo '<form method="post" action="">';        
          echo '<table id="cpt-menu">';
          ?>
           <tr class="cpt-menu-item" id="post-<?php the_ID(); ?>">
          <th></th>

           <?php $count=0; while ( $query->have_posts() ) : $query->the_post(); ?>
  
             
                  
                  <th>
                     
                      <?php echo esc_attr( get_post_meta( get_the_ID(), 'saison_value', true ) ); ?>
                    </th>
              
  
              <?php $count ++; endwhile;
foreach ( $blogusers as $user ) {
    $test = $count;
    echo "<tr>";
    echo "<td>".esc_html( $user->display_name ) . '</td>';
    while($count){
        echo "<td><input type='checkbox' name='blocker_saison' /></td>";$count--;
    }
    echo "</tr>";
    $count=$test;
}
              echo '</tr></table>';

              echo '<input type="submit"/>';
  
              wp_reset_postdata();
              
  
      
    }
}
    
/// custom login
    add_action('login_form','my_added_login_field');
    function my_added_login_field(){
    ?>
        
        <p class="meta-options bl_field">

    <label for="title">
        Saison
    </label>
<?php
$select_id = "select-saison";

$post_type='saison';


            $post_type_object = get_post_type_object($post_type);

            $label = $post_type_object->label;

            $posts = get_posts(array('post_type'=> $post_type, 'post_status'=> 'publish'));

            echo '<select name="'. $select_id .'" >';

            echo '<option value = "" >All '.$label.' </option>';

                foreach ( $posts as $post ) :
                    
                    //echo '<option value="'.$post->post_title.'"'.($select_id)?.'selected':'" ">'. $post->post_title . '</option>';
                ?>
                <option value="<?php echo $post->saison;?>"<?php selected(get_post_meta($post->ID, $select_id, true),$post->saison); ?> >
                <?php echo $post->saison;?>
                </option>
                <?php
                endforeach;

            echo '</select>';
?>
 </p>
    <?php
    
    }

    function remove_website_row_css()
    {
        echo '<style>tr.user-url-wrap{ display: none; }</style>';
        
        echo '<style>.user-admin-color-wrap{ display: none; }</style>';

        echo '<style>.user-rich-editing-wrap{ display: none; }</style>';

        echo '<style>.user-comment-shortcuts-wrap{ display: none; }</style>';
        
    }
    add_action( 'admin_head-user-edit.php', 'remove_website_row_css' );
    add_action( 'admin_head-profile.php',   'remove_website_row_css' );