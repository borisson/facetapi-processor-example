<?php
/**
 * @file
 * Contains \Drupal\facet_api_start_with_a_filter\Plugin\facetapi\HideStartWithA.
 */

namespace Drupal\facet_api_start_with_a_filter\Plugin\facetapi\processor;

use Drupal\facetapi\FacetInterface;
use Drupal\facetapi\Processor\BuildProcessorInterface;
use Drupal\facetapi\Processor\ProcessorPluginBase;
use Drupal\facetapi\Result\Result;

/**
 * Provides a processor that hides results start with the letter A.
 *
 * @FacetApiProcessor(
 *   id = "hide_start_with_a",
 *   label = @Translation("Hide start with a"),
 *   description = @Translation("Hide all results that start with an 'A'"),
 *   stages = {
 *     "build" = 40
 *   }
 * )
 */
class HideStartsWithAProcessor extends ProcessorPluginBase implements BuildProcessorInterface {

  /**
   * {@inheritdoc}
   */
  public function build(FacetInterface $facet, array $results) {
    /** @var Result $result */
    foreach ($results as $id => $result) {
      if (strpos(strtolower($result->getDisplayValue()), 'a') === 0) {
        unset($results[$id]);
      }
    }

    return $results;
  }

}
