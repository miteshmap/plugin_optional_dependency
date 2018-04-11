<?php

namespace Drupal\example_block\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\example_block\ExampleBlockService;
use Drupal\optional_dependency\OptionalDependency;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Create example block.
 *
 * @Block(
 *   id = "example_block",
 *   admin_label = @Translation("Example block"),
 * )
 */
class ExampleBlock extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * The example block service.
   *
   * @var \Drupal\example_block\ExampleBlockService
   */
  protected $exampleBlockService;

  /**
   * Creates a ExampleBlock instance.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param \Drupal\example_block\ExampleBlockService $example_block
   *   The Example block service objects.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, ExampleBlockService $example_block) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->exampleBlockService = $example_block;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('example_block.service')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];

    $text = $this->t('Not well');
    $optionaDependency = $this->exampleBlockService->getOptionalDependency();
    if ($optionaDependency instanceof OptionalDependency) {
      $text = $optionaDependency->getCurrentPath();
    }

    $build['site_name'] = [
      '#markup' => $text,
    ];

    return $build;
  }

}
