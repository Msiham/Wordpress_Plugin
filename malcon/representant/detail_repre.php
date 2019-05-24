<?php 
$id = $_GET['id'];

$post = get_post($id);

?>
<table id="cpt-menu">
    <tr>
        <th>Nom Et Prenom</th>
        <th>CIN </th>
        <th>Zone</th>
        <th>Code BL</th>
        <th>Email </th>
        <th>Adresse</th>
        <th>Code Postale</th>
        <th>Ville</th>
        <th>Ville De Laivraison</th>
        <th>Lieu De Travail</th>
        <th>Login </th>
        <th>Mot De Pass</th>
    </tr>
    <tr>
        <td><?php echo $post->post_title; ?></td>
        <td><?php echo $post->repre_cin; ?></td>
        <td><?php echo $post->repre_zone; ?></td>
        <td><?php echo $post->repre_code_bl; ?></td>
        <td><?php echo $post->repre_email; ?></td>
        <td><?php echo $post->repre_adresse; ?></td>
        <td><?php echo $post->repre_code_postale; ?></td>
        <td><?php echo $post->repre_ville; ?></td>
        <td><?php echo $post->repre_ville_laivraison; ?></td>
        <td><?php echo $post->repre_lieu_travail; ?></td>
        <td><?php echo $post->repre_login; ?></td>
        <td><?php echo $post->repre_pwd; ?></td>
    </tr>
</table>

                           