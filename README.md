# Metaculous

Metaculous helps you to generate json file.

## Installation

    composer require linkorb/metaculous --dev

## Usage

    vendor/bin/metaculous --help

## Workflow:

### 1. Run Analyzers

Metaculous contains a set of Analyzers that scan your repository for common files (like package.json, .editorconfig, etc) and extract data from them. This data is then passed into the file templates

## project.yml example:

Here's a simple example `project.yml` file:

```yml
variables:
  project:
    title: Hello world

files:
  README.md:
    template: stamp/README.md.twig
    variables:
      title: Hello world
      blocks:
        - "@doc/intro.md"
        - "@doc/installation.md"

  LICENSE.md:
    template: https://raw.githubusercontent.com/IQAndreas/markdown-licenses/master/mit.md
  
  CONTRIBUTING.md:
    template: https://raw.githubusercontent.com/gitlabhq/gitlabhq/master/CONTRIBUTING.md
```

## Development / debugging:

The `examples/` directory contains a collection of common files. 
While developing analyzers, you can run `./bin/metaculous analyze -c examples/full-project/stamp.yml` to run metaculous in the context of the `examples/full-project/` directory.
