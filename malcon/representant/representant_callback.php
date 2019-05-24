<?php 
$blogusers = get_users( array(
    'role' => 'representant',
) );
echo "<tr>";
foreach ( $blogusers as $user ) {
   
    echo "<tr>";
    echo "<td><h1>".esc_html( $user->display_name ) . '</h1></td>';
    $metaaa = get_user_meta($user->id, 'nickname', $single);
    foreach( $metaaa as $meta ):
        echo $meta;
    endforeach;
    echo "</tr>";
    
}
// add_action( 'personal_options', 'wpse_237504_user_profile_fields' );
// function wpse_237504_user_profile_fields() {
//     foreach ( wp_get_user_contact_methods() as $id => $label ) {
//         echo( $label . " > " . $id . "<br>" );
//     }
// }
// $cu = get_user_id ();
// $um = get_user_meta ($cu);
// echo '<pre>'; 
// var_dump ($um);
// echo '</pre>';

// $users = get_users( array( 'fields' => array( 'ID' ) ) );
// foreach($users as $user_id) {
//     echo '<pre>';
//     print_r(get_user_meta ( $user_id->ID));
//     echo '</pre>';
// }