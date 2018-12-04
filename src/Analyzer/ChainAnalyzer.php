<?php

namespace Metaculous\Analyzer;

use Metaculous\Model\Project;

class ChainAnalyzer
{
    protected static $analyzers = [
        AnonymizerYmlAnalyzer::class,
        BowerJsonAnalyzer::class,
        CircleciConfigYmlAnalyzer::class,
        ComposerJsonAnalyzer::class,
        DockerComposeYmlAnalyzer::class,
        DockerfileAnalyzer::class,
        DoctrineSchemaAnalyzer::class,
        DotEnvAnalyzer::class,
        EditorconfigAnalyzer::class,
        FixturesAnalyzer::class,
        GithubAnalyzer::class,
        MakefileAnalyzer::class,
        PackageJsonAnalyzer::class,
        RadvanceRoutesAnalyzer::class,
        RadvanceSchemaAnalyzer::class,
        SymfonyRoutesAnalyzer::class,
    ];

    public static function setAnalyzers(array $analyzers)
    {
        self::$analyzers = $analyzers;
    }

    public static function analyze(Project $project)
    {
        $data = [];
        foreach (self::$analyzers as $analyzerClass) {
            /**
             * @var Analyzer $analyzer
             */
            $analyzer = new $analyzerClass();
            $res = $analyzer->analyze($project);
            if ($res) {
                $data = array_merge_recursive($data, $res);
            }
        }
        return $data;
    }
}