<?php

namespace Metaculous\Analyzer;

use Metaculous\Model\Project;

class PackageJsonAnalyzer extends Analyzer
{
    public function analyze(Project $project): ?array
    {
        return $this->maybeGetContent($project, 'package.json', function($data) {
            return json_decode($data, true);
        });
    }
}
