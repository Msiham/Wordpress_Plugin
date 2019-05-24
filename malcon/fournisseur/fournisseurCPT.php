<?php 
      $labels = array
        (
            'name'                      => 'fournisseurs',
            'singular_name'             => 'fournisseur',
            'add_new_item'              => "Raison Social",
            'edit_item'                 => "Edit fournisseur",
            'view_item'                 => "voir fournisseur",
            'view_items'                => "voir fournisseurs",
            'search_items'              => "chercher fournisseurs",
            'not_found'                 => "No fournisseur found",
            'not_found_in_trash'        => "No fournisseur found in trash",
            'parent_item_colon'         => "Parent fournisseur",
            'all_items'                 => "Tous les fournisseurs",
            'archives'                  => "fournisseur Archives",
            'attributes'                => "fournisseur Attributes",
            'insert_into_item'          => "Insert into fournisseur",
            'uploaded_to_this_item'     => "Uploaded to this fournisseur",
            'add_item'                  => "Ajouter nouveau fournisseur"
        );



        $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => 'edit.php?post_type=fournisseur',
        'query_var'          => true,
        'capability_type'    => 'post',
        'register_meta_box_cb'      => 'fournisseur_function_meta_box',
        'has_archive'        => true,
        'hierarchical'       => false,
        //'register_meta_box_cb'      => 'function_meta_box',// add meta box here 
        'menu_position'      => null,
        'supports'           => 'title'
        );


        register_post_type( 'fournisseur', $args);
