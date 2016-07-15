<?php

namespace Fuz;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class RandomCommand extends Command
{
    const NUMERIC    = [['0', '9']];
    const ALPHABETIC = [['a', 'z'], ['A', 'Z']];
    const SYMBOL     = [[' ', '/'], [':', '@'], ['[', '~']];

    protected function configure()
    {
        $this
            ->setName('random')
            ->setDescription('Generate random strings')
            ->addArgument(
                'size',
                InputArgument::OPTIONAL,
                'Size of the random string',
                32
            )
            ->addOption(
               'numeric',
               'i',
               InputOption::VALUE_NONE,
               'Exclude numeric characters'
            )
            ->addOption(
               'alphabetic',
               'a',
               InputOption::VALUE_NONE,
               'Exclude alphabetic characters'
            )
            ->addOption(
               'symbol',
               's',
               InputOption::VALUE_NONE,
               'Exclude symbol characters'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $list = [];
        if (!$input->getOption('numeric')) {
            $list = array_merge($list, self::NUMERIC);
        }
        if (!$input->getOption('alphabetic')) {
            $list = array_merge($list, self::ALPHABETIC);
        }
        if (!$input->getOption('symbol')) {
            !$list = array_merge($list, self::SYMBOL);
        }

        if (empty($list)) {
            return 0;
        }

        $handle = fopen('/dev/urandom', 'r');
        $current = 0;
        $expected = $input->getArgument('size');
        $result = '';
        while ($current < $expected) {
            $chars = fread($handle, 1024);
            for ($i = 0; $i < 1024; $i++) {
                $char = ord($chars[$i]);
                foreach ($list as $boundary) {
                    list($min, $max) = [ord($boundary[0]), ord($boundary[1])];
                    if ($char >= $min && $char <= $max) {
                        $result .= $chars[$i];
                        $current++;
                    }
                }
            }
        }
        fclose($handle);

        $output->writeln(substr($result, 0, $expected));
    }
}