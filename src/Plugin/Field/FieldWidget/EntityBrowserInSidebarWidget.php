<?php

namespace Drupal\ux\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\entity_browser\Plugin\Field\FieldWidget\EntityReferenceBrowserWidget;

/**
 * Defines the 'ux_entity_browser' field widget.
 *
 * @FieldWidget(
 *   id = "ux_entity_browser_in_sidebar",
 *   label = @Translation("Entity browser in sidebar"),
 *   multiple_values = TRUE,
 *   field_types = {"entity_reference"},
 * )
 */
class EntityBrowserInSidebarWidget extends EntityReferenceBrowserWidget {

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $element = parent::formElement($items, $delta, $element, $form, $form_state);
    $element['#group'] = 'advanced';
    return $element;
  }

}
