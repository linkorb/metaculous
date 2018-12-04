<?php

namespace Metaculous\Analyzer;

use Symfony\Component\Yaml\Yaml;
use Metaculous\Model\Project;

class AnonymizerYmlAnalyzer extends Analyzer
{
    public function analyze(Project $project): ?array
    {
        return $this->maybeGetContent($project, 'anonymizer.yml', function($data) {
            return Yaml::parse($data);
        });
    }
}
