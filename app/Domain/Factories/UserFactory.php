<?php

namespace LaravelItalia\Domain\Factories;

use LaravelItalia\Domain\User;

/**
 * Class UserFactory.
 */
class UserFactory
{
    /**
     * Creates a new User instance, starting from name, email and password.
     *
     * @param $fullName
     * @param $emailAddress
     * @param $password
     *
     * @return User
     */
    public static function createUser($fullName, $emailAddress, $password)
    {
        $user = new User();

        $user->name = $fullName;
        $user->email = $emailAddress;
        $user->password = bcrypt($password);

        $user->is_confirmed = false;
        $user->confirmation_code = sha1(microtime().$user->email);

        $user->provider = null;
        $user->provider_id = null;

        $user->is_blocked = false;

        return $user;
    }

    /**
     * Creates a new User instance, starting from name, email and social network provider data.
     *
     * @param $fullName
     * @param $emailAddress
     * @param $provider
     * @param $providerId
     *
     * @return User
     */
    public static function createUserFromSocialNetwork($fullName, $emailAddress, $provider, $providerId)
    {
        $user = new User();

        $user->name = $fullName;
        $user->email = $emailAddress;
        $user->password = '';

        $user->is_confirmed = true;
        $user->confirmation_code = '';

        $user->provider = $provider;
        $user->provider_id = $providerId;

        $user->is_blocked = false;

        return $user;
    }
}