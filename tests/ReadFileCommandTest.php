<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Tester\CommandTester;

class ReadFileCommandTest extends KernelTestCase
{

    public function testExecute()
    {
        self::bootKernel();
        $application = new Application(self::$kernel);

        $command = $application->find('readFile');
        $commandTester = new CommandTester($command);
        $commandTester->execute([
            'file_path' => 'resources/feed.xml',
        ]);

        $commandTester->assertCommandIsSuccessful();

        $output = $commandTester->getDisplay();
        $this->assertStringContainsString('Data is imported', $output);

    }

}
