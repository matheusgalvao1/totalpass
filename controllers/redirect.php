<?php
    function redirect($path){
        global $core;

        //$location = $core->config->base_url . "/" . $path;
        $location = "/" . $path;

        header("Location: " . $location);
        exit();
    }