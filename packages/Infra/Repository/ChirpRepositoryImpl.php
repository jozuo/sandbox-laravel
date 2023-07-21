<?php

namespace Packages\Infra\Repository;

use App\Models\Chirp;
use Packages\Domain\Chirp\ChirpModel;
use Packages\Domain\Chirp\ChirpRepository;
use Packages\Domain\User\UserModel;

class ChirpRepositoryImpl implements ChirpRepository
{
    public function latestAll(): array
    {
        $chirps = Chirp::with('user')->latest()->get();
        return $chirps->map(function (Chirp $chirp) {
            return $this->toModel($chirp);
        })->toArray();
    }

    private function toModel($chirp): ChirpModel
    {
        return new ChirpModel(
            $user = UserModel::reconstruct(
                $id = $chirp->user->id,
                $name = $chirp->user->name,
                $email = $chirp->user->email,
            ),
            $message = $chirp->message,
            $createdAt = $chirp->created_at,
        );
    }
}
