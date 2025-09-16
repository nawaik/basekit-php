<?php declare(strict_types = 1);

namespace SandwaveIo\BaseKit\Domain;

final class ProductSupplier implements DomainObjectInterface
{
    public function __construct(
        public string $name,
        public string $description,
        public string $className,
        public int $ref,
    ) {
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'className' => $this->className,
            'ref' => $this->ref,
        ];
    }

    /**
     * @inheritDoc
     */
    public static function fromArray(array $json)
    {
        return new ProductSupplier(
            name: $json['name'],
            description: $json['description'],
            className: $json['className'],
            ref: $json['ref'],
        );
    }
}
