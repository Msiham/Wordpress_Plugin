
<?php

$already_selected_value = 2019;
$earliest_year = 2040;

print '<select name="saison_value">';
foreach (range($earliest_year, date('Y')) as $x) {
    print '<option value="'.($x-1).'/'.$x.'"'.($x === $already_selected_value ? ' selected="selected"' : '').'>'.($x-1).'/'.$x.'</option>';
}
print '</select>';