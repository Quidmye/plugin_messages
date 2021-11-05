<?php

namespace Drupal\plugin_messages;

use Drupal\Component\Plugin\PluginInspectionInterface;

interface PluginMessagesPluginInterface extends PluginInspectionInterface {

  public function getId();

  public function getTitle();

  public function getMessage();

  public function getTime();

  public function getUnit();

  public function getPages();

}