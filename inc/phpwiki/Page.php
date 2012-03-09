<?php
class Page extends fActiveRecord
{
  const NORMAL = 0;
  const HYPERLINK = 1;
  
  protected function configure()
  {
    fORMRelated::setOrderBys($this, 'Revision', array('revisions.created_at' => 'desc'));
  }
  
  public function getLatestRevision()
  {
    $revisions = $this->buildRevisions();
    if ($revisions->count()) {
      return $revisions->getRecord(0);
    }
    throw new Exception('Page does not have any revisions (database is inconsistent).');
  }
  
  public function getGroupBits()
  {
    return ($this->getPermission() % 100) / 10;
  }
  
  public function getOtherBits()
  {
    return $this->getPermission() % 10;
  }
  
  public function isNormal()
  {
    return $this->getType() == self::NORMAL;
  }
  
  public function isHyperlink()
  {
    return $this->getType() == self::HYPERLINK;
  }

  public function isPermitted($user_name, $action)
  {
    global $db;
    $group_bits = $this->getGroupBits();
    $other_bits = $this->getOtherBits();
    $page_owner = $this->getOwnerName();
    $page_group_id = $this->getGroupId();
    if ($action == 'read') {
      $group_permission = wiki_allow_read($group_bits);
      $other_permission = wiki_allow_read($other_bits);
    } else if ($action == 'write') {
      $group_permission = wiki_allow_write($group_bits);
      $other_permission = wiki_allow_write($other_bits);
    } else if ($action == 'create') {
      $group_permission = wiki_allow_create($group_bits);
      $other_permission = wiki_allow_create($other_bits);
    } else {
      return FALSE;
    }
    if ($user_name == '') {
      return $other_permission;
    }
    $tempgroup = new Group(array('id' => $page_group_id));
    if ($page_owner!=$user_name)
      if (!$group_permission || !$tempgroup->is_member($user_name))
        if (!$other_permission)
          return FALSE;
    return TRUE;
  }
}
