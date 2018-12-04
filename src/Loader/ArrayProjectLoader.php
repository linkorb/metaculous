<?php

namespace Metaculous\Loader;

use Metaculous\Model\Project;
use Metaculous\Model\File;

class ArrayProjectLoader
{   
    public function load($data, $basePath)
    {
        $project = new Project($basePath, $data); 
        // TODO: Load variables
        return $project;
    }
}
