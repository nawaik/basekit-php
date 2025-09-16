<?php declare(strict_types = 1);

namespace SandwaveIo\BaseKit\Api\Interfaces;

use SandwaveIo\BaseKit\Domain\AccountPackage;

interface PackagesApiInterface
{
    public function addUserPackage(
        int $userRef,
        int $packageRef,
        int $billingFrequency
    ): void;

    /**
     * @return AccountPackage[]
     */
    public function listUserPackages(
        int $userRef
    ): array;

    public function deleteUserPackage(
        int $userRef,
        int $accountPackageRef
    ): void;
}
