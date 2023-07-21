<?php

namespace Packages\Domain\User;

class UserModel
{
  private function __construct(
    public readonly int $id,
    public readonly string $name,
    public readonly string $email
  ) {
  }

  public static function reconstruct(int $id, string $name, string $email)
  {
    return new UserModel($id = $id, $name = $name, $email = $email);
  }
}
