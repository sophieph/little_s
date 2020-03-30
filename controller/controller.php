<?php 

require 'model/model.php';

/**
 * HomePage
 *
 * @return void
 */
function homepage() 
{
    include 'view/mainPageView.php';
}

/**
 * Logoff
 *
 * @return void
 * 
 * Supprime session
 */
function logoff()
{
        include 'view/logoff.php';
}

