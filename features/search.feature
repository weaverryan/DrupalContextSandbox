Feature: Search
  In order to see a word definition
  As a website user
  I need to be able to search for a word

  Scenario: Search for a found term
    Given I am on "/wiki/Main_Page"
    When I search for "Agile Driven Development"
    Then I should see "agile software development"
