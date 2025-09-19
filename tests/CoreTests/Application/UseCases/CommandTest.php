<?php declare(strict_types=1);

namespace CoreTests\Application\UseCases;

use Core\Application\UseCases\Command;
use PHPUnit\Framework\TestCase;

class CommandTest extends TestCase
{
    public function testExceptionMiddleware(): void
    {
        $command = new class extends Command {
            protected function process(): mixed
            {
                throw new \DomainException();
            }
        };
        $this->expectException(\RuntimeException::class);
        $command->execute();
    }
}
