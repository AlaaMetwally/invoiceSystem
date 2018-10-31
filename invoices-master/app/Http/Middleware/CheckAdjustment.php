<?php

namespace App\Http\Middleware;

use Closure;
use App\Adjustment;
class CheckAdjustment
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $adjustment = Adjustment::find($request->id);
        if($adjustment->user_id != $request->user()->id )
        {
//            $data = [];
//            $adjustments = Adjustment::where('user_id', $request->user()->id)
//                ->where('admin_show', 1)
//                ->get();
//            $data['adjustments'] = $adjustments;
//            $data['partialView'] = 'adjustment.index';
//            return response()->view('adjustment.base',$data);
            return response("Insufficient permissions", 401);
        }
        return $next($request);
    }
}
