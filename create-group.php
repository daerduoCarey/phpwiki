<?php
include_once(__DIR__ . '/inc/init.php');

if (fRequest::isPost()) {
  try {
    $group = new Group();
    $group->setName(fRequest::get('name'));
    $group->setCreatedAt(now());
    $group->store();
  } catch (fException $e) {
    fMessaging::create('failure', 'groups', $e->getMessage());
  }
}

fURL::redirect(wiki_groups_path());
