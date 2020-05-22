<?php

namespace App\GraphQL\Mutations\Admin\AddShop;

use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

use App\Shop;
use App\Client;
use Illuminate\Hashing\BcryptHasher;

class ShopDetail
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
        $shopID = session('shop_id');
        $shop = Shop::find($shopID);

        $shop->commission = $args['shopCommission'];
        $shop->payment_type = $args['shopPaymentType'];
        
        $shop->order_transfar = json_encode($args['shopOrderTransfar']);
        $shop->payment_method = json_encode($args['shopPaymentMethod']);
        $shop->delivery_options = json_encode($args['shopDeliveryOptions']);

        $shop->delivery_cost = $args['shopDeliveryCost'];
        $shop->mini_oder_cost = $args['shopMiniOderCost'];
        $shop->charge = $args['shopCharge'];

        $shop->payout_schedule = json_encode($args['shopPayoutSchedule']);
        $shop->payout_type = json_encode($args['shopPayoutType']);

        $shop->save();

        session(['shop_id', $shop->id]);

        if($request->session()->exists('client_id')) {
            $clientID = session('client_id');
            $client = Client::find($clientID);
            return $client;
        } else {
            return null;
        }
    }
}
