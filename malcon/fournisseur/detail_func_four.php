<?php 
$id = $_GET['id'];

$post = get_post($id);

?>
<table id="cpt-menu">
    <tr class="cpt-menu-item">
        <th colspan='2'>Société</th>
        <th colspan='3'>Dericteur</th>
        <th colspan='3'>Add Join</th>
    </tr>
        <th>Raison Social</th>
        <th>Adresse</th>
        <th>Nom </th>
        <th>Email</th>
        <th>Tel</th>
        <th>Nom </th>
        <th>Email</th>
        <th>Tel</th>
    </tr>
    <tr>
        <td><?php echo $post->post_title; ?></td>
        <td><?php echo $post->four_address; ?></td>
        <td><?php echo $post->four_dir_fullname; ?></td>
        <td><?php echo $post->four_dir_email; ?></td>
        <td><?php echo $post->four_dir_tel; ?></td>
        <td><?php echo $post->four_join_fullname; ?></td>
        <td><?php echo $post->four_join_email; ?></td>
        <td><?php echo $post->four_join_tel; ?></td>
    </tr>
</table>

