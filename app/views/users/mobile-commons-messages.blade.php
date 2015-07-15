@extends('layout.master')

@section('main_content')

@include('layout.header', ['header' => 'Mobile Commons Messages', 'subtitle' => 'Backlog of all texts'])

<div class ="container -padded">
  <div class="wrapper">
	  <div class="container__block">
	  	@forelse($mc_messages as $message)
	  		@if ($message['@attributes']['status'] == "sent")
					<div class="message-sent">
						<div class="container__block">
							<dl class="profile-settings">
					  		<dt>Status: </dt><dd>{{{ $message['@attributes']['status'] }}}</dd>
					  		<dt>Message Type:	</dt><dd>{{{ $message['@attributes']['message_type'] }}}</dd>
					  		<dt>Campaign: </dt><dd>{{{ $message['campaign']['name'] }}}</dd>
					  		<dt>Campaign ID: </dt><dd>{{{ $message['campaign']['@attributes']['id'] }}}</dd>
					  		<dt>Active?: </dt><dd>{{{ $message['campaign']['@attributes']['active'] }}}</dd>
					  		<dt>Sent On: </dt><dd>{{{ $message['when'] }}}</dd>
					  		<dt>Content: </dt><dd>{{{ $message['body'] }}}</dd>
							</dl>
			  		</div>
		  		</div>
	  		@elseif ($message['@attributes']['status'] == "failed_permanently")
  				<div class="message-failed">
						<div class="container__block">
							<dl class="profile-settings">
					  		<dt>Status: </dt><dd>{{{ $message['@attributes']['status'] }}}</dd>
					  		<dt>Message Type:	</dt><dd>{{{ $message['@attributes']['message_type'] }}}</dd>
					  		<dt>Campaign: </dt><dd>{{{ $message['campaign']['name'] }}}</dd>
					  		<dt>Campaign ID: </dt><dd>{{{ $message['campaign']['@attributes']['id'] }}}</dd>
					  		<dt>Active?: </dt><dd>{{{ $message['campaign']['@attributes']['active'] }}}</dd>
					  		<dt>Sent On: </dt><dd>{{{ $message['when'] }}}</dd>
					  		<dt>Content: </dt><dd>{{{ $message['body'] }}}</dd>
							</dl>
			  		</div>
		  		</div>
	  		@else
  				<div class="message-received">
						<div class="container__block">
							<dl class="profile-settings">
					  		<dt>Status: </dt><dd>{{{ $message['@attributes']['status'] }}}</dd>
					  		<dt>Message Type:	</dt><dd>{{{ $message['@attributes']['message_type'] }}}</dd>
					  		<dt>Campaign: </dt><dd>{{{ $message['campaign']['name'] }}}</dd>
					  		<dt>Campaign ID: </dt><dd>{{{ $message['campaign']['@attributes']['id'] }}}</dd>
					  		<dt>Active?: </dt><dd>{{{ $message['campaign']['@attributes']['active'] }}}</dd>
					  		<dt>Sent On: </dt><dd>{{{ $message['when'] }}}</dd>
					  		<dt>Content: </dt><dd>{{{ $message['body'] }}}</dd>
							</dl>
			  		</div>
		  		</div>
	  		@endif
	  	@empty
	  		<h3>This user has no messages</h3>
	  	@endforelse				
		</div>
  </div>
</div>


@stop