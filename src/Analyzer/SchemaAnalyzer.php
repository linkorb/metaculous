<?php

namespace Metaculous\Analyzer;

use Metaculous\Model\Project;
use Alom\Graphviz\Digraph;

abstract class SchemaAnalyzer extends Analyzer
{
    protected function saveGraph(Digraph $graph, Project $project): array {
        $rendered = $graph->render();

        $relativeOutPath = 'doc/schema.svg';

        if (shell_exec('which dot') !== null) {
            $temp = tmpfile();
            $inPath = stream_get_meta_data($temp)['uri'];
            $outPath  = $project->getFilepath($relativeOutPath);

            fwrite($temp, $rendered);
            shell_exec("dot -Tsvg -o " . escapeshellarg($outPath) . ' ' . escapeshellarg($inPath));
            fclose($temp);
        }

        return [ 'schema-dot' => $rendered,
                 'schema-svg' => $relativeOutPath ];
    }
}
