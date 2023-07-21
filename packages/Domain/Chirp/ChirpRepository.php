<?php

namespace Packages\Domain\Chirp;

interface ChirpRepository
{
    function latestAll(): array;
}
