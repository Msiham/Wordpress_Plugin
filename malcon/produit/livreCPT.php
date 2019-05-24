<?php 
      $labels = array
                              (
                                    'name'                      => 'livres',
                                    'singular_name'             => 'livre',
                                    'add_new_item'              => "Nouveau livre",
                                    'edit_item'                 => "Edit livre",
                                    'view_item'                 => "voir livre",
                                    'view_items'                => "voir livres",
                                    'search_items'              => "chercher livres",
                                    'not_found'                 => "No livre found",
                                    'not_found_in_trash'        => "No livre found in trash",
                                    'parent_item_colon'         => "Parent livre",
                                    'all_items'                 => "Tous les livres",
                                    'archives'                  => "livre Archives",
                                    'attributes'                => "livre Attributes",
                                    'insert_into_item'          => "Insert into livre",
                                    'uploaded_to_this_item'     => "Uploaded to this livre",
                                    'add_item'                  => "Ajouter nouveau livre"
                              );
                        
                        

                              $args = array(
                              'labels'             => $labels,
                              'public'             => true,
                              'publicly_queryable' => true,
                              'show_ui'            => true,
                              'taxonomies'         => array('category'),
                              'show_in_menu'       => 'edit.php?post_type=livre',
                              'query_var'          => true,
                              'capability_type'    => 'post',
                              'has_archive'        => true,
                              'hierarchical'       => false,
                              'register_meta_box_cb'      => 'function_meta_box',// add meta box here 
                              'menu_position'      => null
                        );
                              
                        
                              register_post_type( 'livre', $args);