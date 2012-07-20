Feature: Search
  In order to see a word definition
  As a website user
  I need to be able to search for a word

  Scenario: Search for a found term
    Given I am on "/wiki/Main_Page"
    # ok, so this isn't a Drupal site, but we're faking it
    And I should see "Today's featured article" in the "left" region
    When I search for "Agile Driven Development"
    Then I should see "agile software development"
