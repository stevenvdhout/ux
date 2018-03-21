<?php

namespace Drupal\ux\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class UxSettingsForm.
 */
class UxSettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'ux.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'ux_settings_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('ux.settings');
    $form['ux_vbo_hide'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Hide VBO actions untill an item is checked'),
      '#default_value' => $config->get('ux_vbo_hide'),
    ];
    $form['ux_node_form_cleanup'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Clean node forms'),
      '#default_value' => $config->get('ux_node_form_cleanup'),
    ];
    $form['ux_menu_form_cleanup'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Clean menu page'),
      '#default_value' => $config->get('ux_menu_form_cleanup'),
    ];
    $form['ux_menu_item_modal'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Open menu item edit links inside a modal'),
      '#default_value' => $config->get('ux_menu_item_modal'),
    ];
    $form['ux_term_form_cleanup'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Clean term form'),
      '#default_value' => $config->get('ux_term_form_cleanup'),
    ];
    $form['ux_term_modal'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Open term edit links inside a modal'),
      '#default_value' => $config->get('ux_term_modal'),
    ];
    $form['ux_media_form_cleanup'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Clean media form'),
      '#default_value' => $config->get('ux_media_form_cleanup'),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('ux.settings')
      ->set('ux_menu_item_modal', $form_state->getValue('ux_menu_item_modal'))
      ->set('ux_node_form_cleanup', $form_state->getValue('ux_node_form_cleanup'))
      ->set('ux_menu_form_cleanup', $form_state->getValue('ux_menu_form_cleanup'))
      ->set('ux_term_modal', $form_state->getValue('ux_term_modal'))
      ->set('ux_term_form_cleanup', $form_state->getValue('ux_term_form_cleanup'))
      ->set('ux_media_form_cleanup', $form_state->getValue('ux_media_form_cleanup'))
      ->set('ux_vbo_hide', $form_state->getValue('ux_vbo_hide'))
      ->save();
  }

}
