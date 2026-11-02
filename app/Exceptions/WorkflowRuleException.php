<?php

namespace App\Exceptions;

use RuntimeException;

class WorkflowRuleException extends RuntimeException
{
    public function __construct(
        string $message,
        private readonly int $statusCode = 409,
        private readonly array $errors = [],
    ) {
        parent::__construct($message);
    }

    public function statusCode(): int
    {
        return $this->statusCode;
    }

    /** @return array<string, list<string>> */
    public function errors(): array
    {
        return $this->errors;
    }
}
