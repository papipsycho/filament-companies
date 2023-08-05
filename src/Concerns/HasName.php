<?php

namespace Wallo\FilamentCompanies\Concerns;

use Exception;

trait HasName
{
    protected ?string $name = null;

    public function name(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getName(): ?string
    {
        if (blank($this->name)) {
            $namespace = collect(explode('.', str_replace(['/', '\\'], '.', config('livewire.class_namespace'))))
                ->map([Str::class, 'kebab'])
                ->implode('.');

            $fullName = collect(explode('.', str_replace(['/', '\\'], '.', static::class)))
                ->map([Str::class, 'kebab'])
                ->implode('.');

            if (str($fullName)->startsWith($namespace)) {
                $fullName = (string) str($fullName)->substr(strlen($namespace) + 1);
            }

            $this->name = $fullName;
        }

        return $this->name;
    }
}
