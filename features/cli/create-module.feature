Feature: The Generator module should generate a module when called
  In order to create Magento 2 Modules
  As a extension developer
  I want to create modules from the CLI

  Scenario: The generator CLI command will exist
    Given The Generator CLI option exists
    When I run "php bin/magento generate:module"
    Then I should see an error message
