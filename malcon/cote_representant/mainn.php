<?php 
function my_has_role($user, $role) {
    $roles = $user->roles; 
    return in_array($role, (array) $user->roles);
  }
  
  if(my_has_role($user, 'administrator')) {	
    echo 'blaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
  }