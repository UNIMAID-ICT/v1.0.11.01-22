<div wire:poll.750ms>
    @foreach($notifications as $notification)
	<div>
		 {{$notification->data['name']}}
	</div>
	@endforeach
</div>
