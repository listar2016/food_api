<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        // $this->mapApiRoutes();
        // $this->mapWebRoutes();
        $this->mapPassportRoutes();
        $this->mapFileUploadRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapPassportRoutes()
    {
        Route::namespace('Laravel\Passport\Http\Controllers')->group(function(){
            Route::middleware(['auth'])
                ->post('/oauth/token/refresh', 'TransientTokenController@refresh')
                ->name('passport.token.refresh');
            Route::middleware(['throttle', 'oauth.providers'])
                ->post('/oauth/token', 'AccessTokenController@issueToken')
                ->name('passport.token');
        });
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapFileUploadRoutes()
    {
        // Route::namespace('Laravel\Passport\Http\Controllers')->group(function(){
            Route::middleware(['auth:admin,api'])
                ->post('/file/uploads', function(Request $request){

                if(!$request->hasFile("data")) {
                    return response()->json(["upload_file_not_found"], 400);
                }
                $file = $request->file("data");
                if(!$file->isValid()) {
                    return response()->json(["invalid_file_upload"], 400);
                }

                $carbonDate = Carbon::now();
                $year = $carbonDate->format('Y');
                $month = $carbonDate->format('m');
                $day = $carbonDate->format('d');

                $serverPath = "public/".$year.'/'.$month.'/'.$day;

                $fileName = Storage::put($serverPath, $file);
                $fileUrl = '';
                if(Storage::exists($fileName)){
                    $fileUrl = asset(Storage::url($fileName));
                };
                return response()->json($fileUrl, 200);

            })->name('file.uploads');
        // });
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
