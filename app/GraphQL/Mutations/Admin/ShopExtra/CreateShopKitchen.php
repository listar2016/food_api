<?php

namespace App\GraphQL\Mutations\Admin\ShopExtra;

use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

use App\ShopKitchen;
use Illuminate\Support\Str;
use Illuminate\Hashing\BcryptHasher;

class CreateShopKitchen
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
        $kitchen = new ShopKitchen();
        $kitchen->display = $args['display'];
        $kitchen->thumbnail = $args['thumbnail'];
        $kitchen->uniq_slug = Str::slug($args['display'], "-");
        $kitchen->save();

        $kitchens = ShopKitchen::all();
        return $kitchens;
    }
}
