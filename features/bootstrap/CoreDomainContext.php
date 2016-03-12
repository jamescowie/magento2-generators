<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use \Symfony\Component\Filesystem\Filesystem;

/**
 * Defines application features from the specific context.
 */
class CoreDomainContext implements Context, SnippetAcceptingContext
{

    private $moduleGenerator;
    private $output;
    private $path;
    private $filesystem;

    public function __construct()
    {
        $this->filesystem = new Filesystem();
        $this->moduleGenerator = new \Jcowie\Generators\Type\Module($this->filesystem);
    }

    /**
     * @Given The generator file exists
     */
    public function theGeneratorFileExists()
    {
        return true;
    }

    /**
     * @When I run the generator with the path :path
     */
    public function iRunTheGenerator($path)
    {
        $this->path = $path;
        $this->output = $this->moduleGenerator->make($path);
    }

    /**
     * @Then I should see a folder that patches the path
     */
    public function thenIShouldSeeAnExceptionAsNoNameIsSetForTheModule()
    {
        if ($this->filesystem->exists($this->path)) {
            return true;
        }
        return false;
    }

    /**
     * @AfterScenario
     */
    public function cleanFs()
    {
        $folders = explode("/", $this->path);

        $this->filesystem->remove($folders[0]);
    }
}
