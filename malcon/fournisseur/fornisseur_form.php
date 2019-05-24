
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
    <table>
    <tr class="meta-options four_field">
       <td> 
            <label for="four_address">
                Adresse de société
            </label> 
       </td>
        <td><input id="four_address" type="text" name="four_address"
        value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'four_address', true ) ); ?>" /></td>
    </tr>
    <tr>
        <td>
            <h6>
                Directeur
            </h6>
        </td>
        <td>
        <!--    Empty   -->
        </td>
    </tr>
    <tr class="meta-options four_field">
        <td>
            <label for="four_dir_fullname">
                nom
            </label>
        </td>
        <td>
            <input id="four_dir_fullname" type="text" name="four_dir_fullname"
            value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'four_dir_fullname', true ) ); ?>">
        </td>
    </tr>
    <tr class="meta-options four_field">
        <td>
            <label for="four_dir_email">
                email
            </label>
        </td>
        <td>
            <input id="four_dir_email" type="email" name="four_dir_email"
            value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'four_dir_email', true ) ); ?>" />
        </td>
    </tr>
    <tr class="meta-options four_field">
        <td>
            <label for="four_dir_tel">
                tel
            </label>
        </td>
        <td>
            <input id="four_dir_tel" type="tel" name="four_dir_tel" 
            value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'four_dir_tel', true ) ); ?>">
        </td>
    </tr>
    <tr>
        <td>
            <h6>
                Add join
            </h6>
        </td>
        <td>
        <!--    Empty   -->
        </td>
    </tr>
    <tr class="meta-options four_field">
        <td>
            <label for="four_join_fullname">
                Nom
            </label>
        </td>
        <td>
            <input id="four_join_fullname" type="text" name="four_join_fullname"
            value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'four_join_fullname', true ) ); ?>">
        </td>
    </tr>
    <tr class="meta-options four_field">
        <td>
            <label for="four_join_email">
                email
            </label>
        </td>
        <td>
            <input id="four_join_email" type="email" name="four_join_email"
            value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'four_join_email', true ) ); ?>">
        </td>
    </tr>
    <tr class="meta-options four_field">
        <td>
            <label for="four_join_tel">
                tel
            </label>
        </td>
        <td>
            <input id="four_join_tel" type="tel" name="four_join_tel"
            value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'four_join_tel', true ) ); ?>">
        </td>
    </tr>
    </table>
</div>