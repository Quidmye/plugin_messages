<?php


namespace Drupal\plugin_messages\Plugin\PluginMessages;

use Drupal\plugin_messages\Annotation\PluginMessages;
use Drupal\plugin_messages\PluginMessagesPluginBase;

/**
 * @PluginMessages(
 *   id="default_popup",
 * )
 */
class DefaultPopup extends PluginMessagesPluginBase
{

  public function getTitle()
  {
    return $this->config->get('title');
  }

  public function getMessage()
  {
    return $this->config->get('message');
  }

  public function getTime()
  {
    return $this->config->get('time');
  }

  public function getUnit()
  {
    return $this->config->get('unit');
  }

  public function getPages()
  {
    return [
      '/*'
    ];
  }


}
