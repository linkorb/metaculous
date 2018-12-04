<?php

namespace Metaculous\Model;

class Project
{
    protected $config = [];
    protected $basePath;

    public function __construct($basePath, $config = [])
    {
        $this->basePath = $basePath;
        $this->config = $config;
    }

    public function getVariables(): array
    {
        return $this->config['variables'] ?? [];
    }

    public function getConfig(): array {
        return $this->config;
    }

    public function getBasePath()
    {
        return $this->basePath;
    }

    public function getFilepath(string $filename): string {
        return $this->getBasePath() . '/' . $filename;
    }

    public function hasConsole(): bool
    {
        return file_exists(
            $this->getFilepath('bin/console')
        );
    }

    public function console(string $cmd): ?string {
        $console = $this->getFilepath('bin/console');

        if (!$this->hasConsole()) {
            return null;
        }

        return shell_exec("$console $cmd");
    }

    public function git(string $cmd): ?string {
        $gitDir = $this->getFilePath('.git');

        if (!is_dir($gitDir)) {
            return null;
        }

        $dir = escapeshellarg($gitDir);

        return shell_exec("git --git-dir $dir $cmd");
    }
}
