<?php declare(strict_types = 1);

namespace SandwaveIo\BaseKit\Domain;

final class AccountPackage implements DomainObjectInterface
{
    public function __construct(
        public int $ref,
        public array $startDateTime,
        public array $endDateTime,
        public array $update,
        public int $deleteOnExpiry,
        public bool $isFree,
        public int $billingPeriodMonths,
        public bool $isActive,
        public Package $package,
        public ?int $templateGroupRef,
        public ?int $displayOrder,
    ) {
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [
            'ref' => $this->ref,
            'startDateTime' => $this->startDateTime,
            'endDateTime' => $this->endDateTime,
            'update' => $this->update,
            'deleteOnExpiry' => $this->deleteOnExpiry,
            'isFree' => $this->isFree,
            'billingPeriodMonths' => $this->billingPeriodMonths,
            'isActive' => $this->isActive,
            'package' => $this->package,
            'templateGroupRef' => $this->templateGroupRef,
            'displayOrder' => $this->displayOrder,
        ];
    }

    /**
     * @inheritDoc
     */
    public static function fromArray(array $json)
    {
        $sitePackages = [];

        foreach ($json as $sitePackage) {
            $sitePackages[] = new AccountPackage(
                ref: $sitePackage['ref'],
                startDateTime: $sitePackage['startDateTime'],
                endDateTime: $sitePackage['endDateTime'],
                update: $sitePackage['update'],
                deleteOnExpiry: $sitePackage['deleteOnExpiry'],
                isFree: $sitePackage['isFree'],
                billingPeriodMonths: $sitePackage['billingPeriodMonths'],
                isActive: $sitePackage['isActive'],
                package: Package::fromArray($sitePackage['package']),
                templateGroupRef: $sitePackage['templateGroupRef'],
                displayOrder: $sitePackage['displayOrder'],
            );
        }

        return $sitePackages;
    }
}
