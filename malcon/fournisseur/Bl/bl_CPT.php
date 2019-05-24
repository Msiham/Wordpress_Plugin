<?php 
      $labels = array
                              (
                                    'name'                      => 'BLs',
                                    'singular_name'             => 'BL',
                                    'add_new_item'              => "Nouveau BL",
                                    'edit_item'                 => "Edit BL",
                                    'view_item'                 => "voir BL",
                                    'view_items'                => "voir BLs",
                                    'search_items'              => "chercher BLs",
                                    'not_found'                 => "No BL found",
                                    'not_found_in_trash'        => "No BL found in trash",
                                    'parent_item_colon'         => "Parent BL",
                                    'all_items'                 => "Tous les BLs",
                                    'archives'                  => "BL Archives",
                                    'attributes'                => "BL Attributes",
                                    'insert_into_item'          => "Insert into BL",
                                    'uploaded_to_this_item'     => "Uploaded to this BL",
                                    'add_item'                  => "Ajouter nouveau"
                              );
                        
                        

                              $args = array
                              (
                                    'labels'                      => $labels,
                                    'public'                      => true,
                                    'publicly_queryable'          => true,
                                    'show_ui'                     => true,
                                    'show_in_menu'                => 'edit.php?post_type=bl',
                                    'query_var'                   => true,
                                    'capability_type'             => 'post',
                                    'has_archive'                 => true,
                                    'hierarchical'                => false,
                                    'register_meta_box_cb'        => 'bl_function_meta_box',// add meta box here 
                                    'menu_position'               => null,
                                    'supports'                    => 'title'
                              );
                              
                        
                              register_post_type( 'bl', $args);