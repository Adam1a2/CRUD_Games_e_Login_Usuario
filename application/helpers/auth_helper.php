<?php

function permission(){
    $ci = get_instance();
    $loggedUser = $ci->session->userdata("logged_user");
    if(!$loggedUser){
        $ci->session->set_flashdata("danger", "Você precisar estar logado para acessar essa página");
        echo '<script type="text/javascript">
           window.location = "http://localhost:70/Crud_CI/login/"
      	</script>';
    }
    return $loggedUser;
}