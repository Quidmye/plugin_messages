<?php

namespace Drupal\plugin_messages\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class PluginMessagesForm extends ConfigFormBase
{

  public function getFormId()
  {
    return 'plugin_messages_form';
  }

  public function buildForm(array $form, FormStateInterface $form_state)
  {

    $form = parent::buildForm($form, $form_state);
    $config = $this->config('plugin_messages.settings');
    $form['modal_title'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Modal title:'),
      '#default_value' => $config->get('title'),
      '#description' => $this->t('Give your modal a title.'),
    ];
    $form['modal_message'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Modal message:'),
      '#default_value' => $config->get('message'),
      '#description' => $this->t('Modal message.'),
    ];
    $form['modal_time'] = [
      '#type' => 'fieldset',
      '#collapsible' => FALSE,
      '#collapsed' => FALSE,
      'time' => [
        '#type' => 'number',
        '#title' => $this->t('Hidden time:'),
        '#default_value' => $config->get('time'),
        '#description' => $this->t('How long does it take to hide the message.'),
      ],
      'unit' => [
        '#type' => 'select',
        '#title' => $this->t('Hidden time unit:'),
        '#default_value' => $config->get('unit'),
        '#options' => [
          'hours' => 'Hours',
          'days' => 'Days'
        ],
        '#description' => $this->t('How long does it take to hide the message.'),
      ]
    ];

    return $form;
  }

  public function submitForm(array &$form, FormStateInterface $form_state)
  {
    $config = $this->config('plugin_messages.settings');
    $config->set('title', $form_state->getValue('modal_title'));
    $config->set('message', $form_state->getValue('modal_message'));
    $config->set('time', $form_state->getValue('time'));
    $config->set('unit', $form_state->getValue('unit'));
    $config->save();
    parent::submitForm($form, $form_state);
  }

  protected function getEditableConfigNames()
  {
    return [
      'plugin_messages.settings',
    ];
  }
}
