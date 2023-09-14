<?php

namespace Pforret\Digestif;

final class Digestif
{
    private string $seed;

    private int $length;

    private int $grouped;

    private string $separator;

    public function __construct(string $seed, int $length = 8, int $grouped = 4, string $separator = '-')
    {
        $this->seed = $seed;
        $this->length = $length;
        $this->grouped = $grouped;
        $this->separator = $separator;
    }

    public function fromString(string $input, int $length = null): string
    {
        $hash = hash_hmac('sha256', $input, $this->seed);

        return $this->formatDigest(substr($hash, 0, $length ?? $this->length));
    }

    public function fromArray(array $input, int $length = null): string
    {
        $hash = hash_hmac('sha256', print_r($input, true), $this->seed);

        return $this->formatDigest(substr($hash, 0, $length ?? $this->length));
    }

    public function compareDigest(string $input1, string $input2): bool
    {
        $input1 = preg_replace("|\W|", '', $input1);
        $input2 = preg_replace("|\W|", '', $input2);

        return $input1 === $input2;
    }

    private function formatDigest(string $digest): string
    {
        $groups = str_split($digest, $this->grouped);

        return implode($this->separator, $groups);
    }
}
