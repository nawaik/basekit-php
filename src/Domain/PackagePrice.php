<?php declare(strict_types = 1);

namespace SandwaveIo\BaseKit\Domain;

final class PackagePrice implements DomainObjectInterface
{
    public function __construct(
        public string $price,
        public string $offerPrice,
        public int $billingPeriodMonths,
        public int $ref,
        public Currency $currency,
        public string $formattedPrice,
    ) {
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [
            'price' => $this->price,
            'offerPrice' => $this->offerPrice,
            'billingPeriodMonths' => $this->billingPeriodMonths,
            'ref' => $this->ref,
            'currency' => $this->currency,
            'formattedPrice' => $this->formattedPrice,
        ];
    }

    /**
     * @inheritDoc
     */
    public static function fromArray(array $json)
    {
        $packagePrices = [];

        foreach ($json as $packagePrice) {
            $packagePrices[] = new PackagePrice(
                price: $packagePrice['price'],
                offerPrice: $packagePrice['offerPrice'],
                billingPeriodMonths: $packagePrice['billingPeriodMonths'],
                ref: $packagePrice['ref'],
                currency: Currency::fromArray($packagePrice['currency']),
                formattedPrice: $packagePrice['formattedPrice'],
            );
        }

        return $packagePrices; // @phpstan-ignore-line
    }
}
