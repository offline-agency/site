<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use LaravelItalia\Entities\Factories\UserFactory;
use LaravelItalia\Entities\Repositories\RoleRepository;
use LaravelItalia\Entities\Repositories\UserRepository;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userRepository = new UserRepository();
        $roleRepository = new RoleRepository();
        $user = UserFactory::createUser('Francesco Malatesta', 'hey@hellofrancesco.com', '123456');

        $user->role()->associate($roleRepository->findByName('administrator'));

        $userRepository->save($user);
    }
}