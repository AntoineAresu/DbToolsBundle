<?php

declare(strict_types=1);

namespace MakinaCorpus\DbToolsBundle\Tests\Functional\Command\Anonymization;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Tester\CommandTester;

class AnonymizeCommandTest extends KernelTestCase
{
    public function testExecute(): void
    {
        $kernel = self::bootKernel();
        $application = new Application($kernel);

        $command = $application->find('db-tools:anonymization:run');
        $commandTester = new CommandTester($command);
        $commandTester->execute(
            [
                '--force' => true
            ],
            [
                'interactive' => false,
                'capture_stderr_separately' => true
            ]
        );

        $commandTester->assertCommandIsSuccessful();
    }
}