<?php

/** @noinspection PhpUndefinedClassInspection */

declare(strict_types=1);

namespace ElasticApm\Impl;

use Closure;
use ElasticApm\Impl\Util\NoopObjectTrait;
use ElasticApm\TracerInterface;
use ElasticApm\TransactionInterface;

/**
 * Code in this file is part of implementation internals and thus it is not covered by the backward compatibility.
 *
 * @internal
 */
class NoopTracer implements TracerInterface
{
    use NoopObjectTrait;

    /** @inheritDoc */
    public function beginTransaction(?string $name, string $type): TransactionInterface
    {
        return NoopTransaction::create();
    }

    /** @inheritDoc */
    public function beginCurrentTransaction(?string $name, string $type): TransactionInterface
    {
        return NoopTransaction::create();
    }

    /** @inheritDoc */
    public function captureTransaction(?string $name, string $type, Closure $callback)
    {
        return $callback(NoopTransaction::create());
    }

    /** @inheritDoc */
    public function captureCurrentTransaction(?string $name, string $type, Closure $callback)
    {
        return $callback(NoopTransaction::create());
    }

    /** @inheritDoc */
    public function getCurrentTransaction(): TransactionInterface
    {
        return NoopTransaction::create();
    }
}