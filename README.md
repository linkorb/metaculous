# Metaculous

Metaculous contains a set of Analyzers that scan your repository for common files (like package.json, .editorconfig, etc) and extract structured data from them into a .json file for further processing.

## Installation

    composer require linkorb/metaculous --dev

## Usage

    vendor/bin/metaculous --help

## Run analyzers:

    bin/metaculous analyze -c metaculous.yaml -o metaculous.json

## project.yml example:

Here's a simple example `metaculous.yaml` file:

```yml
variables:
  project:
    title: Hello world
```

## Development / debugging:

The `examples/` directory contains a collection of common files. 
While developing analyzers, you can run `./bin/metaculous analyze -c examples/full-project/metaculous.yaml` to run metaculous in the context of the `examples/full-project/` directory.
