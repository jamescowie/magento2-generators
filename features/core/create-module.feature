Feature: The Generator module should generate a module when called
  In order to create Magento 2 Modules
  As a extension developer
  I want to create modules from the CLI

  Scenario: The generator will error if no name is passed
    Given The generator file exists
    When I run the generator "module"
    Then Then I should see an exception as no name is set for the module
