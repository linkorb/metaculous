<?php

namespace Metaculous\Analyzer;

use Metaculous\Model\Project;

class BowerJsonAnalyzer extends Analyzer
{
    public function analyze(Project $project): ?array
    {
        return $this->maybeGetContent($project, 'bower.json', function($data) {
            return json_decode($data, true);
        });
    }
}
