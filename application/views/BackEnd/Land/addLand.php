<?php

    $User_Session = $this->session->userdata('User_Session');
    if ($User_Session == null) {
        redirect(base_url('Login/notLoggedIn'));
    }

?>