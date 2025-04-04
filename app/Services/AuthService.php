<?php

declare(strict_types=1);

namespace App\Services;

use Exception;

class AuthService
{

    /**
     * Because we have several places in the
     * code where we need these roles its easier
     * to maintain a single source of the truth here
     *
     */
    public function allRoles(): array
    {
        return [
            "Field Sales Associate",
            "Purchasing Manager",
            "System Administrator",
        ];
    }


    /**
     * Checks if this use has the necessary permissions
     *
     * @param string $givenRole is The logged in user's role
     * @param string $requiredRole The minimum role required
     *
     * @return bool
     */
    public function isAuthorised(string $givenRole, string $requiredRole): bool
    {

        $roles = $this->allRoles();

        // We've been passed an invalid role
        if (! in_array($givenRole, $roles)) {
            throw new Exception("Invalid givenRole supplied");
        }
        if (! in_array($requiredRole, $roles)) {
            throw new Exception("Invalid requiredRole supplied");
        }

        $givenRoleIndex = array_search($givenRole, $roles);
        $requiredRoleIndex = array_search($requiredRole, $roles);

        return $givenRoleIndex >= $requiredRoleIndex;
    }
}
