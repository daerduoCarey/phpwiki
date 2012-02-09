<?php
function wiki_theme_path($theme_name)
{
  return THEME_BASE . "/$theme_name";
}

function wiki_groups_path()
{
  return SITE_BASE . '/groups.php';
}

function wiki_create_group_path()
{
  return SITE_BASE . '/create-group.php';
}

function wiki_destroy_group_path($group_id)
{
  return SITE_BASE . '/destroy-group.php?id=' . $group_id;
}

function wiki_themes_path()
{
  return SITE_BASE . '/themes.php';
}

function wiki_enable_theme_path($theme_name)
{
  return SITE_BASE . '/enable-theme.php?name=' . $theme_name;
}

function wiki_disable_theme_path($theme_name)
{
  return SITE_BASE . '/disable-theme.php?name=' . $theme_name;
}

function wiki_new_page_path($slug = '')
{
  if (empty($slug)) {
    return SITE_BASE . '/new-page.php';
  }
  return SITE_BASE . '/new-page.php?slug=' . $slug;
}

function wiki_create_page_path()
{
  return SITE_BASE . '/create-page.php';
}

function wiki_new_link_path($slug = '')
{
  if (empty($slug)) {
    return SITE_BASE . '/new-link.php';
  }
  return SITE_BASE . '/new-link.php?slug=' . $slug;
}

function wiki_create_membership_path($group_id)
{
  return SITE_BASE . '/create-membership.php?group_id=' . $group_id;
}

function wiki_destroy_membership_path($membership_id)
{
  return SITE_BASE . '/destroy-membership.php?id=' . $membership_id;
}
