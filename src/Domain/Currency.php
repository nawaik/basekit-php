<?php declare(strict_types = 1);

namespace SandwaveIo\BaseKit\Domain;

final class Currency implements DomainObjectInterface
{
    public function __construct(
        public int $ref,
        public string $name,
        public string $alphaCode,
        public string $numCode,
        public string $htmlCode,
        public int $currencyRate,
        public int $paypal,
    ) {
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return [
            'ref' => $this->ref,
            'name' => $this->name,
            'alphaCode' => $this->alphaCode,
            'numCode' => $this->numCode,
            'htmlCode' => $this->htmlCode,
            'currencyRate' => $this->currencyRate,
            'paypal' => $this->paypal,
        ];
    }

    /**
     * @inheritDoc
     */
    public static function fromArray(array $json)
    {
        return new Currency(
            ref: $json['ref'],
            name: $json['name'],
            alphaCode: $json['alphaCode'],
            numCode: $json['numCode'],
            htmlCode: $json['htmlCode'],
            currencyRate: $json['currencyRate'],
            paypal: $json['paypal'],
        );
    }
}
