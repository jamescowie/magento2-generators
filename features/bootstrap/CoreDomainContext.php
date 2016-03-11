<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class CoreDomainContext implements Context, SnippetAcceptingContext
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @Given The generator file exists
     */
    public function theGeneratorFileExists()
    {
        throw new PendingException();
    }

    /**
     * @When I run the generator :arg1
     */
    public function iRunTheGenerator($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then Then I should see an exception as no name is set for the module
     */
    public function thenIShouldSeeAnExceptionAsNoNameIsSetForTheModule()
    {
        throw new PendingException();
    }
}
