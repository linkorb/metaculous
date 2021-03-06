<?php
declare(strict_types=1);

use Symfony\Component\Yaml\Yaml;
use Metaculous\Analyzer\DockerComposeYmlAnalyzer;

final class DockerComposeYmlAnalyzerTest extends \AnalyzerTestCase
{
    protected function setUp()
    {
        parent::setUp();
        $this->analyzer = new DockerComposeYmlAnalyzer();
    }

    public function testParsingSucceeds(): void
    {
        $this->assertEquals(
            Yaml::parse(file_get_contents($this->fullProject->getBasePath() . '/docker-compose.yml')),
            $this->analyzer->analyze($this->fullProject)['docker-compose.yml']
        );
    }

    // public function testEmptyProject(): void
    // see Testcase.php
}
