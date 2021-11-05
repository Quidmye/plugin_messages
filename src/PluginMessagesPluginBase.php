<?php

namespace Drupal\plugin_messages;

use Drupal\Component\Plugin\PluginBase;

abstract class PluginMessagesPluginBase extends PluginBase implements PluginMessagesPluginInterface
{

  protected $config;

  public function __construct(array $configuration, $plugin_id, $plugin_definition)
  {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->config = \Drupal::config('plugin_messages.settings');
  }

  public function getId()
  {
    return $this->pluginDefinition['id'];
  }

  public function getTitle()
  {
    return '';
  }

  public function getTime()
  {
    return '';
  }

  public function getUnit()
  {
    return '';
  }

  public function getMessage()
  {
    return '';
  }

  public function getPages()
  {
    return [];
  }

}
