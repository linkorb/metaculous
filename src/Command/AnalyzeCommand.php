<?php

namespace Metaculous\Command;

use Metaculous\Analyzer\ChainAnalyzer;
use Metaculous\Loader\YamlProjectLoader;
use RuntimeException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class AnalyzeCommand extends Command
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->ignoreValidationErrors();

        $this
            ->setName('analyze')
            ->setDescription('Analyze a project directory')
            ->addOption(
                'config',
                'c',
                InputOption::VALUE_REQUIRED,
                'Configuration file to use',
                getcwd().'/metaculous.yaml'
            )->addOption(
                'outputJson',
                'o',
                InputOption::VALUE_OPTIONAL,
                'Output json file',
                getcwd().'/metaculous.json'
            );
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $configFilename = $input->getOption('config');

        if ( ! file_exists($configFilename)) {
            throw new RuntimeException("File not found: ".$configFilename);
        }
        $output->writeLn("Using configuration file: ".$configFilename);

        $projectLoader = new YamlProjectLoader();
        $project = $projectLoader->loadFile($configFilename);

        $data = ChainAnalyzer::analyze($project);

        try {
            file_put_contents($input->getOption('outputJson'),
                json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        } catch (\Exception $e) {
            $output->writeLn('Error saving output file: '.$e->getMessage());
        }
    }
}
