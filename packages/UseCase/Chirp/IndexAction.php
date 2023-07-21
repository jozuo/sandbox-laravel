<?php

namespace Packages\UseCase\Chirp;

use Packages\Domain\Chirp\ChirpRepository;

class IndexAction
{
    public function __construct(private ChirpRepository $chirpRepository)
    {
    }

    public function __invoke()
    {
        return $this->chirpRepository->latestAll();
    }
}
