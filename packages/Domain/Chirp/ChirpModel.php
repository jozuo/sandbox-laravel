<?php

namespace Packages\Domain\Chirp;

use Carbon\Carbon;
use Packages\Domain\User\UserModel;

class ChirpModel
{
  public function __construct(
    public readonly UserModel $user,
    public readonly string $message,
    public readonly Carbon $createdAt
  ) {
  }

  public function reconstruct(UserModel $user, string $message, Carbon $createdAt): ChirpModel
  {
    return new ChirpModel($user = $user, $message = $message, $createdAt = $createdAt);
  }
}
