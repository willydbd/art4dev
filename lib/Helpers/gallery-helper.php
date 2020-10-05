<?php
/**
 * @Author
 * Falua Temitope Oyewole.
 * faluatemitopeo@gmail.com
 * Web Developer
 * Date: 4/17/2018
 */

require_once __DIR__.'/../../lib/Classes/Participant.php';

$Cl = new Participant();

$L_SHOWROOM = $Cl->getLimitedArtworks('3');

$SHOWROOM = $Cl->getAllArtworks();

$EX = $Cl->getAllExhibitors();

$COM = $Cl->getAllCommunity();