<?php declare(strict_types = 1);

namespace SandwaveIo\BaseKit\Domain;

final class Package implements DomainObjectInterface
{
    /**
     * @param string[]|null  $metadata
     * @param string[]       $capabilities
     * @param string[]       $templateGroup
     * @param PackagePrice[] $prices
     * @param int[]          $plugins
     */
    public function __construct(
        public int $ref,
        public string $name,
        public int $active,
        public int $global,
        public ?string $urlID,
        public string $notifyMarketing,
        public string $productType,
        public string $type,
        public string $contentType,
        public int $offerRebillMonths,
        public int $offerRebillActive,
        public int $trialDays,
        public ?string $imageURL,
        public bool $requirePurchasedDomain,
        public bool $allowMultiplePurchase,
        public bool $showInStore,
        public bool $showInTemplatePicker,
        public ?string $bannerHTML,
        public string $affiliateLink,
        public ?string $flowName,
        public ?array $metadata,
        public int $brandRef,
        public string $brandName,
        public int $defaultCurrencyRef,
        public string $currencyCode,
        public string $currencyName,
        public string $currencyTitle,
        public ?int $defaultCampaignRef,
        public array $capabilities,
        public ?int $templateGroupRef,
        public ?array $templateGroup,
        public ?int $displayOrder,
        public ?DomainProduct $domainProduct,
        public array $prices,
        public array $plugins,
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
            'active' => $this->active,
            'global' => $this->global,
            'urlID' => $this->urlID,
            'notifyMarketing' => $this->notifyMarketing,
            'productType' => $this->productType,
            'type' => $this->type,
            'contentType' => $this->contentType,
            'offerRebillMonths' => $this->offerRebillMonths,
            'offerRebillActive' => $this->offerRebillActive,
            'trialDays' => $this->trialDays,
            'requirePurchasedDomain' => $this->requirePurchasedDomain,
            'allowMultiplePurchase' => $this->allowMultiplePurchase,
            'showInStore' => $this->showInStore,
            'showInTemplatePicker' => $this->showInTemplatePicker,
            'bannerHTML' => $this->bannerHTML,
            'affiliateLink' => $this->affiliateLink,
            'flowName' => $this->flowName,
            'metadata' => $this->metadata,
            'brandRef' => $this->brandRef,
            'brandName' => $this->brandName,
            'defaultCurrencyRef' => $this->defaultCurrencyRef,
            'currencyCode' => $this->currencyCode,
            'currencyName' => $this->currencyName,
            'currencyTitle' => $this->currencyTitle,
            'defaultCampaignRef' => $this->defaultCampaignRef,
            'capabilities' => $this->capabilities,
            'templateGroupRef' => $this->templateGroupRef,
            'templateGroup' => $this->templateGroup,
            'displayOrder' => $this->displayOrder,
            'domainProduct' => $this->domainProduct !== null ? $this->domainProduct->toArray() : [],
            'prices' => $this->prices,
            'plugins' => $this->plugins,
        ];
    }

    /**
     * @inheritDoc
     */
    public static function fromArray(array $json)
    {
        return new Package(
            ref: $json['ref'],
            name: $json['name'],
            active: $json['active'],
            global: $json['global'],
            urlID: $json['urlID'],
            notifyMarketing: $json['notifyMarketing'],
            productType: $json['productType'],
            type: $json['type'],
            contentType: $json['contentType'],
            offerRebillMonths: $json['offerRebillMonths'],
            offerRebillActive: $json['offerRebillActive'],
            trialDays: $json['trialDays'],
            imageURL: $json['imageURL'],
            requirePurchasedDomain: $json['requirePurchasedDomain'],
            allowMultiplePurchase: $json['allowMultiplePurchase'],
            showInStore: $json['showInStore'],
            showInTemplatePicker: $json['showInTemplatePicker'],
            bannerHTML: $json['bannerHTML'],
            affiliateLink: $json['affiliateLink'],
            flowName: $json['flowName'],
            metadata: $json['metadata'],
            brandRef: $json['brandRef'],
            brandName: $json['brandName'],
            defaultCurrencyRef: $json['defaultCurrencyRef'],
            currencyCode: $json['currencyCode'],
            currencyName: $json['currencyName'],
            currencyTitle: $json['currencyTitle'],
            defaultCampaignRef: $json['defaultCampaignRef'],
            capabilities: $json['capabilities'],
            templateGroupRef: $json['templateGroupRef'],
            templateGroup: $json['templateGroup'],
            displayOrder: $json['displayOrder'],
            domainProduct: DomainProduct::fromArray($json['domainProduct']),
            prices: PackagePrice::fromArray($json['prices']), // @phpstan-ignore-line
            plugins: $json['plugins'],
        );
    }
}
