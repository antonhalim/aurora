@extends('layout.master')

@section('main_content')

@include('layout.header', ['header' => 'Mobile Commons Messages', 'subtitle' => 'Backlog of all texts'])

<div class ="container -padded">
  <div class="wrapper">
	  <div class="container__block -narrow">
	  	@forelse($mc_messages as $message)
				<dl class="profile-settings">
		  		<dt>Message Type:	</dt><dd>{{{ $message['@attributes']['message_type'] }}}</dd>
		  		<dt>Status: </dt><dd>{{{ $message['@attributes']['status'] }}}</dd>
		  		<dt>Campaign: </dt><dd>{{{ $message['campaign']['name'] }}}</dd>
		  		<dt>Campaign ID: </dt><dd>{{{ $message['campaign']['@attributes']['id'] }}}</dd>
		  		<dt>Active?: </dt><dd>{{{ $message['campaign']['@attributes']['active'] }}}</dd>
		  		<dt>Sent On: </dt><dd>{{{ $message['when'] }}}</dd>
		  		<dt>Content: </dt><dd>{{{ $message['body'] }}}</dd>
				</dl>
	  	@empty
	  		<h3>This user has no messages</h3>
	  	@endforelse				
		</div>
  </div>
</div>


@stop