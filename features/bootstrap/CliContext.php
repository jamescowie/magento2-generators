<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Symfony\Component\Process\PhpExecutableFinder;
use Symfony\Component\Process\Process;
use \Symfony\Component\Filesystem\Filesystem;

/**
 * Defines application features from the specific context.
 */
class CliContext implements Context, SnippetAcceptingContext
{
    private $output;

    private $filesystem;

    public function __construct()
    {
        $this->filesystem = new Filesystem();
    }

    /**
     * @Given The Generator CLI option exists
     */
    public function theGeneratorCliOptionExists()
    {
        // @TODO parse the output from the magento command me thinks
        return true;
    }

    /**
     * @When I run :command
     */
    public function iRun($command)
    {
        $process = new Process("php " . getcwd() . "/../../../".  $command);
        $process->run();

        $this->output = $process->getOutput();
    }

    /**
     * @Then I should see an error message
     */
    public function iShouldSeeAnErrorMessage()
    {
        expect($this->output)->notToBe(null);
    }

    /**
     * @Then I should see :output
     */
    public function iShouldSee($output)
    {
        expect(trim($this->output))->toBe($output);
    }

    /**
     * @AfterScenario
     */
    public function cleanFs()
    {
        $this->filesystem->remove("app");
    }
}
