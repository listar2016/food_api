<?php

namespace App\GraphQL\Mutations\Admin\AddShop;

use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

use App\Shop;
use Illuminate\Hashing\BcryptHasher;

class BasicData
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
        $shop = new Shop();
        $shop->type = $args['shopType'];
        $shop->name = $args['shopName'];
        $shop->logo = $args['shopLogo'];
        $shop->meta_description = $args['shopMetaDescription'];
        $shop->reserved_food_type = json_encode($args['shopReservedFoodType']);
        $shop->save();

        $shop->shopKitchen()->attach($args['shopKitchenFields']);
        $shop->shopService()->attach($args['shopServicesFields']);

        session(['shop_id', $shop->id]);
        
        return True;
    }
}
