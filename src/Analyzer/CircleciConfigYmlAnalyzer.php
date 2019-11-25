<?php

namespace Metaculous\Analyzer;

use Symfony\Component\Yaml\Yaml;
use Metaculous\Model\Project;

class CircleciConfigYmlAnalyzer extends Analyzer
{
    public function analyze(Project $project): ?array
    {
        return $this->maybeGetContent($project, '.circleci/config.yml', function($data) {
            $data = Yaml::parse($data);
            unset($data['jobs']);
            return $data;
        });
    }
}
