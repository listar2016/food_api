<?php

namespace App\GraphQL\Mutations\User\Settings;

use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

use App\User;
use Illuminate\Hashing\BcryptHasher;

class CreateUser
{
    public function resolve($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        // TODO implement the resolver
        $user = new User();
        
        $user->first_name = $args['first_name'];
        $user->last_name = $args['last_name'];
        $user->email = $args['email'];
        $user->password = (new BcryptHasher)->make($args['password']);
        $user->telephone_number = $args['telephone_number'];
        $user->gender = $args['gender'];
        $user->street = $args['street'];
        $user->street_number = $args['street_number'];
        $user->floor = $args['floor'];
        $user->zip_code = $args['zip_code'];
        $user->direction = $args['direction'];
        $user->room_number = $args['room_number'];

        $user->save();

        return $user;
    }
}
