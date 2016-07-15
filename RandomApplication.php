<?php

namespace Fuz;

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\InputInterface;

class RandomApplication extends Application
{
    protected function getCommandName(InputInterface $input)
    {
        return 'random';
    }

    protected function getDefaultCommands()
    {
        $defaultCommands   = parent::getDefaultCommands();
        $defaultCommands[] = new RandomCommand();

        return $defaultCommands;
    }

    public function getDefinition()
    {
        $inputDefinition = parent::getDefinition();
        $inputDefinition->setArguments();

        return $inputDefinition;
    }
}
