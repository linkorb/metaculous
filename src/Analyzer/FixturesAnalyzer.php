<?php

namespace Metaculous\Analyzer;

use Metaculous\Model\Project;

class FixturesAnalyzer extends Analyzer
{
    public function analyze(Project $project): ?array
    {
        return $this->maybeGetContent($project, 'fixtures');
    }
}
