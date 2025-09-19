<?php declare(strict_types = 1);

namespace SandwaveIo\BaseKit\Domain;

final class DomainProduct implements DomainObjectInterface
{
    public function __construct(
        public string $domainSuffix,
        public string $name,
        public string $description,
        public int $frequencyMonths,
        public int $active,
        public int $availableAsFreeDomain,
        public bool $requireCustomContactDetails,
        public int $renewalActive,
        public int $ref,
        public ?ProductSupplier $productSupplier,
    ) {
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [
            'domainSuffix' => $this->domainSuffix,
            'name' => $this->name,
            'description' => $this->description,
            'frequencyMonths' => $this->frequencyMonths,
            'active' => $this->active,
            'availableAsFreeDomain' => $this->availableAsFreeDomain,
            'requireCustomContactDetails' => $this->requireCustomContactDetails,
            'renewalActive' => $this->renewalActive,
            'ref' => $this->ref,
            'productSupplier' => $this->productSupplier !== null ? $this->productSupplier->toArray() : [],
        ];
    }

    /**
     * @inheritDoc
     */
    public static function fromArray(array $json)
    {
        return new DomainProduct(
            domainSuffix: $json['domainSuffix'],
            name: $json['name'],
            description: $json['description'],
            frequencyMonths: $json['frequencyMonths'],
            active: $json['active'],
            availableAsFreeDomain: $json['availableAsFreeDomain'],
            requireCustomContactDetails: $json['requireCustomContactDetails'],
            renewalActive: $json['renewalActive'],
            ref: $json['ref'],
            productSupplier: ProductSupplier::fromArray($json['productSupplier']),
        );
    }
}
