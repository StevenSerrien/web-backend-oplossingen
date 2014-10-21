<?php

 $artikels = array(
    array(
        'title' => 'PvP Raptor',
        'text' => 'Today we are taking a look at the Vicious War Raptor. This is the new Horde PvP mount in Patch 6.0.2',
        'tags' => 'Raptor, reward',
    ),
    array(
        'title' => 'Arthas costume',
        'text' => 'Exquisite Costume Set: The Lich King no longer has a Hallows End requirement and costs 500 Tricky Treats to obtain.',
        'tags' => 'Arthas, knight',
    ),
    array(
        'title' => 'Model revamp',
        'text' => ' Were still looking through and collecting feedback, and of course still have the Blood Elf update to go. We dont really consider anything in the game as "done", its a constantly moving and changing and evolving game.',
        'tags' => 'not done, revamp',
        )
);

if (isset($_GET['artikel'])) {
	$individueelArtikel = $artikels[$_GET['artikel']];
}

include 'view/header-partial.html';

if (isset($_GET['artikel'])) {
	include 'view/individueelArtikel-partial.html';
}
else
{
	include 'view/body-partial.html';
}

include 'view/footer-partial.html';









?>