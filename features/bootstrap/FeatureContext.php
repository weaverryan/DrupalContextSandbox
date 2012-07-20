<?php

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

use Behat\MinkExtension\Context\MinkContext;

use Behat\Behat\Context\Step\Given;
use Behat\Behat\Context\Step\When;
use Behat\Behat\Context\Step\Then;

//
// Require 3rd-party libraries here:
//
//   require_once 'PHPUnit/Autoload.php';
//   require_once 'PHPUnit/Framework/Assert/Functions.php';
//

/**
 * Features context.
 */
class FeatureContext extends MinkContext
{
  /**
   * Initializes context.
   * Every scenario gets it's own context object.
   *
   * @param   array   $parameters     context parameters (set them up through behat.yml)
   */
  public function __construct(array $parameters) {
     // Initialize your context here
  }

  /**
   * @When /^I fill in the search field with "([^"]*)"$/
   */
  public function iFillInTheSearchFieldWith($searchText) {
    $page = $this->getSession()->getPage();
    $searchField = $page->find('css', '#searchInput');

    $searchField->setValue($searchText);
  }

  /**
   * @When /^I search for "([^"]*)"$/
   */
  public function iSearchFor($searchText) {
    return array(
        new When(sprintf('I fill in "search" with "%s"', $searchText)),
        new When('I press "searchButton"'),
    );
  }

  /**
   * @Given /^I should see "([^"]*)" in the "([^"]*)" region$/
   */
  public function iShouldSeeInTheRegion($text, $region) {
    /** @var $regionNodeElement \Behat\Mink\Element\NodeElement */
    $regionNodeElement = $this->getSession()->getPage()->find('region', $region);

    if (!$regionNodeElement) {
      throw new \Exception(sprintf('Cannot find the "%s" region!', $region));
    }

    if (strpos($regionNodeElement->getText(), $text) === false) {
      throw new \Exception(sprintf('Cannot find text "%s" inside the "%s" region', $text, $region));
    }
  }
}
