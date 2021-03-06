<?php
include_once(__DIR__ . '/inc/init.php');

fAuthorization::requireLoggedIn();

$page_path = '/';
$dest = 'http://';
$group_bits = 7;
$other_bits = 0;
$overwrite = false;

$title = $lang['New Link'];
$theme_path = wiki_theme_path(DEFAULT_THEME);
include wiki_theme(DEFAULT_THEME, 'new-link');
