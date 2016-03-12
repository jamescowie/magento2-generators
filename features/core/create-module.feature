Feature: The Generator module should generate a module when called
  In order to create Magento 2 Modules
  As a extension developer
  I want to create modules from the CLI

  Scenario: The generator will error if no name is passed
    Given The generator file exists
    When I run the generator with the path "app/code/test"
    Then I should see a folder that patches the path
