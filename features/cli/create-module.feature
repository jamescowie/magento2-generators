Feature: The Generator module should generate a module when called
  In order to create Magento 2 Modules
  As a extension developer
  I want to create modules from the CLI

  Scenario: The generator CLI command will exist and provide a error when no path is set
    Given The Generator CLI option exists
    When I run "bin/magento generate:module"
    Then I should see an error message

  Scenario: The generator CLI command will create the module structure when path is set
    Given The Generator CLI option exists
    When I run "bin/magento generate:module app/code/test"
    Then I should see "Module folder created"
