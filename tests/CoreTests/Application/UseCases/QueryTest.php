<?php declare(strict_types=1);

namespace CoreTests\Application\UseCases;

use Core\Application\UseCases\Query;
use PHPUnit\Framework\TestCase;

class QueryTest extends TestCase
{
    public function testExceptionMiddleware(): void
    {
        $query = new class extends Query {
            protected function process(): mixed
            {
                throw new \DomainException();
            }
        };
        $this->expectException(\RuntimeException::class);
        $query->execute();
    }
}
