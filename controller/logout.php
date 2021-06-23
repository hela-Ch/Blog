<?php

    //Deconnexion
    logout();
    addFlash('vous êtes déconnecté');

    //Redirection
    header('Location: '. url('/'));
    exit;
