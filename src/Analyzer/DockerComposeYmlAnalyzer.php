<?php

namespace Metaculous\Analyzer;

use Symfony\Component\Yaml\Yaml;
use Metaculous\Model\Project;

class DockerComposeYmlAnalyzer extends Analyzer
{
    public function analyze(Project $project): ?array
    {
        return $this->maybeGetContent($project, 'docker-compose.yml', function($data) {
            return Yaml::parse($data);
        });
    }
}
