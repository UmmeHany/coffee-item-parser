<?php

namespace App\Command;

use App\Repository\ItemsRepository;
use App\Service\Parser;
use Monolog\Logger;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class ReadFileCommand extends Command
{
    protected static $defaultName = 'readFile';
    protected static $defaultDescription = 'Read data from file(xml) store in database';
    private Parser $parser;
    private ItemsRepository $repository;
    private LoggerInterface $logger;

    public function __construct(

        Parser $parser,
        ItemsRepository $repository,
        LoggerInterface $logger

    ) {
        parent::__construct();
        $this->parser = $parser;
        $this->repository = $repository;
        $this->logger = $logger;

    }

    protected function configure(): void
    {
        $this ->addArgument('file_path', InputArgument::REQUIRED, 'Enter valid file path') ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $filePath = $input->getArgument('file_path');

        if (!is_file($filePath) || !is_readable($filePath)) {
            $io->error('Please enter valid file path');
            $this->logger->error('Invalid file path');
            return Command::FAILURE;
        }

        $io->note('welcome to parser');

        try {

            $entityName = 'App\Entity\Catalog';
            $catalog = $this->parser->parseContent($filePath, $entityName);

            foreach ($catalog->getItem() as $item) {

                try {

                    $this->repository->create(
                        $item['entity_id'],
                        $item['name'],
                        $item['sku'],
                        $item['description'],
                        $item['shortdesc'],
                        $item['CategoryName'],
                        $item['Brand'],
                        $item['link'],
                        $item['image'],
                        $item['CaffeineType'],
                        $item['price'] ?: 0,
                        $item['Rating'] ?: 0,
                        $item['Facebook'],
                        $item['Count'] ?: 0,
                        Parser::convertToBooleanValue((string) $item['Flavored'] ?: ''),
                        Parser::convertToBooleanValue((string) $item['Seasonal'] ?: ''),
                        Parser::convertToBooleanValue((string) $item['Instock'] ?: ''),
                        Parser::convertToBooleanValue((string) $item['IsKCup'] ?: '')
                    );

                    $io->note('Item is inserted. Item id: ' . $item['entity_id']);

                } catch (\Exception $e) {

                    $this->logger->error($e->getMessage());
                    $io->error($e->getMessage());

                    return Command::FAILURE;

                }

            }

        } catch (\Exception $e) {

            $this->logger->error($e->getMessage());
            $io->error($e->getMessage());

            return Command::FAILURE;

        }

        $io->success('Data is saved');
        return Command::SUCCESS;

    }
}
