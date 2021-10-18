<?php
    function redirect($path){
        global $core;

        $location = $core->config->base_url . "/" . $path;

        header("Location: " . $location);
        exit();
    }