<!-- Visitor -->
@php
	$date        = \Carbon\Carbon::now();
	$startTime   = $date->copy()->startOfDay()->format('Y-m-d H:i:s');

	$onlineTime  = 10;
	$lastTime    = \Carbon\Carbon::now()->subMinutes($onlineTime)->format('Y-m-d H:i:s');

	$totalVisits = \App\Models\Visitor::count();
	$todayVisits = \App\Models\Visitor::where('created_at', '>=', $startTime)->count();

	$onlineUsers = \App\Models\Visitor::where('created_at', '>=', $lastTime)->groupBy('ip')->get()->count();
@endphp
<div id="visitors_container" class="mt-2 p-1 w-100 d-none d-xl-flex justify-content-between" style="background: #346cb033; border-radius: 2px;">
    <span id="online_users"
    	  title="{{ __('backend/default.online') .' '. __('backend/default.user') }}"
    	  class="visitors-span rounded bg-primary text-white px-1 my-auto"
    	  style="">
    	<strong>{{ __('backend/default.on.') }}{{ __('backend/default.:') }}</strong>&nbsp;<span id="online_users_count">{{ n2l($onlineUsers == 0 ? 1:$onlineUsers) }}</span>
    </span>
    <span id="today_visits"
    	  title="{{ __('backend/default.today') .' '. __('backend/default.visit') }}"
    	  class="visitors-span rounded bg-primary text-white px-1 my-auto"
    	  style="">
    	<strong>{{ __('backend/default.today') }}{{ __('backend/default.:') }}</strong>&nbsp;<span id="today_visits_count">{{ n2l($todayVisits) }}</span>
    </span>
    <span id="total_visits"
    	  title="{{ __('backend/default.total') .' '. __('backend/default.visit') }}"
    	  class="visitors-span rounded bg-primary text-white px-1 my-auto"
    	  style="">
    	<strong>{{ __('backend/default.total') }}{{ __('backend/default.:') }}</strong>&nbsp;<span id="total_visits_count">{{ n2l($totalVisits) }}</span>
    </span>
</div>
<!-- /Visitor -->