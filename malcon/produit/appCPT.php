<?php 
$labels = array
                  (
                          'name'                      => 'apps',
                          'singular_name'             => 'app',
                          'add_new_item'              => "Nouveau app",
                          'edit_item'                 => "Edit app",
                          'view_item'                 => "voir app",
                          'view_items'                => "voir apps",
                          'search_items'              => "chercher apps",
                          'not_found'                 => "No app found",
                          'not_found_in_trash'        => "No app found in trash",
                          'parent_item_colon'         => "Parent app",
                          'all_items'                 => "Tous les apps",
                          'archives'                  => "app Archives",
                          'attributes'                => "app Attributes",
                          'insert_into_item'          => "Insert into app",
                          'uploaded_to_this_item'     => "Uploaded to this app",
                          'add_item'                  => "Ajouter nouveau"
                  );
            
            

                  $args = array(
                    'labels'             => $labels,
                    'public'             => true,
                    'publicly_queryable' => true,
                    'show_ui'            => true,
                    'taxonomies'         => array('category'),
                    'show_in_menu'       => 'edit.php?post_type=app',
                    'query_var'          => true,
                    'capability_type'    => 'post',
                    'has_archive'        => true,
                    'register_meta_box_cb'      => 'app_function_meta_box',
                    'hierarchical'       => false,
                    'menu_position'      => null
                
                );
                  
            
                    register_post_type( 'app', $args);