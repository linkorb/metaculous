<?php
declare(strict_types=1);

use Metaculous\Analyzer\GithubAnalyzer;
use Metaculous\Model\Project;

final class GithubAnalyzerTest extends \AnalyzerTestCase
{
    protected function setUp()
    {
        parent::setUp();
        $this->analyzer = new GithubAnalyzer();
    }

    // public function testEmptyProject(): void
    // see Testcase.php
}
