<?php

/** @noinspection PhpUnused */

declare(strict_types=1);

namespace BladL\Time;

/**
 * Class TimeInterval.
 */
final class TimeInterval
{
    public const MICRO_SECONDS_IN_SECOND = 1000;

    public const SECONDS_IN_MINUTE = 60;
    public const SECONDS_IN_HOUR = self::SECONDS_IN_MINUTE * 60;
    public const SECONDS_IN_DAY = self::SECONDS_IN_HOUR * 24;
    public const SECONDS_IN_WEEK = self::SECONDS_IN_DAY * 7;

    private function __construct(private readonly float $microseconds)
    {
    }

    public function getMicroseconds(): float
    {
        return $this->microseconds;
    }

    public function getMilliseconds(): int
    {
        return (int) ($this->microseconds * self::MICRO_SECONDS_IN_SECOND);
    }

    public function getSeconds(): int
    {
        return (int) ($this->microseconds);
    }

    public function getMinutes(): int
    {
        return (int) ($this->getSeconds() / self::SECONDS_IN_MINUTE);
    }

    public static function inSeconds(int $amount): self
    {
        return new self(self::MICRO_SECONDS_IN_SECOND * $amount);
    }

    public static function day(int $amount = 1): self
    {
        return self::inSeconds(self::SECONDS_IN_DAY * $amount);
    }

    public static function hour(int $amount = 1): self
    {
        return self::inSeconds(self::SECONDS_IN_HOUR * $amount);
    }

    public static function minute(int $amount = 1): self
    {
        return self::inSeconds(self::SECONDS_IN_MINUTE * $amount);
    }

    public static function second(int $amount = 1): self
    {
        return self::inSeconds($amount);
    }

    public static function week(int $amount = 1): self
    {
        return self::inSeconds(self::SECONDS_IN_WEEK * $amount);
    }
}
