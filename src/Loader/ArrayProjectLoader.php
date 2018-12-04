<?php

namespace Metaculous\Loader;

use Metaculous\Model\Project;
use Metaculous\Model\File;

class ArrayProjectLoader
{   
    public function load($data, $basePath)
    {
        $project = new Project($basePath, $data);
        
        foreach ($data['files'] ?? [] as $name => $fileData) {
            $template = $fileData['template'] ?? null;
            $variables = $fileData['variables'] ?? [];
            $file = new File($name, $template, $variables);
            $project->addFile($file);
        }
        return $project;
    }
}
