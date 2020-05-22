<?php

namespace App\GraphQL\Mutations\Admin\Settings;

use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

use App\Admin;
use Illuminate\Hashing\BcryptHasher;

class SaveAdmin
{
    /**
     * Return a value for the field.
     *
     * @param  null  $rootValue Usually contains the result returned from the parent field. In this case, it is always `null`.
     * @param  mixed[]  $args The arguments that were passed into the field.
     * @param  \Nuwave\Lighthouse\Support\Contracts\GraphQLContext  $context Arbitrary data that is shared between all fields of a single query.
     * @param  \GraphQL\Type\Definition\ResolveInfo  $resolveInfo Information about the query itself, such as the execution state, the field name, path to the field from the root, and more.
     * @return mixed
     */
    public function resolve($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        // TODO implement the resolver
        $admin = Admin::find($args['id']);
        $admin->first_name = $args['first_name'];
        $admin->last_name = $args['last_name'];
        $admin->email = $args['email'];
        $admin->services = $args['services'];
        $admin->image = $args['image'];
        $admin->telephone_number = $args['telephone_number'];
        if($args['password'])
            $admin->password = (new BcryptHasher)->make($args['password']);
        $admin->save();

        $admins = Admin::all();
        return $admins;
    }
}
