<?php 
 $labels = array
                        (
                                'name'                      => 'logiciels',
                                'singular_name'             => 'logiciel',
                                'add_new_item'              => "Nouveau logiciel",
                                'edit_item'                 => "Edit logiciel",
                                'view_item'                 => "voir logiciel",
                                'view_items'                => "voir logiciels",
                                'search_items'              => "chercher logiciels",
                                'not_found'                 => "No logiciel found",
                                'not_found_in_trash'        => "No logiciel found in trash",
                                'parent_item_colon'         => "Parent logiciel",
                                'all_items'                 => "Tous les logiciels",
                                'archives'                  => "logiciel Archives",
                                'attributes'                => "logiciel Attributes",
                                'insert_into_item'          => "Insert into logiciel",
                                'uploaded_to_this_item'     => "Uploaded to this logiciel",
                                'add_item'                  => "Ajouter nouveau"
                        );
                  
                  

                        $args = array(
                          'labels'             => $labels,
                          'public'             => true,
                          'publicly_queryable' => true,
                          'show_ui'            => true,
                          'taxonomies'         => array('category'),
                          'show_in_menu'       => 'edit.php?post_type=logiciel',
                          'hierarchical'       => true,
                          'register_meta_box_cb'      => 'log_function_meta_box',
                          'menu_position'      => 5,
                          'menu_icon'          => 'dashicons-screenoptions'
                      );
                        
                  
                          register_post_type( 'logiciel', $args);