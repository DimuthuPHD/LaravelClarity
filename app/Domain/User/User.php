<?php

namespace App\Domain\User;

use DateTimeImmutable;

class User
{
    public function __construct(
        public readonly ?int $id,
        public readonly string $name,
        public readonly string $email,
        public readonly ?string $password,
        public readonly ?DateTimeImmutable $created_at,
    ) {
    }

    public static function create(?int $id, string $name, string $email, $password): self
    {
        return new self(
            id: $id,
            name: $name,
            email: $email,
            password: $password,
            created_at: new DateTimeImmutable(),
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ];
    }

    public static function fromArray(
        array $data
    ): self {
        return new self(
            id: $data['id'],
            name: $data['name'],
            email: $data['email'],
            password: null,
            created_at:null,
        );
    }
}
