@extends('layouts.app')

@section('title')
	{{ $authUser->display_nick }}'s earnings
@endsection

@section('hero')
	<section class="hero is-primary">
		<div class="hero-body">
			<div class="container">
				<h1 class="title">
					Payout history
				</h1>
				<h2 class="subtitle">
					Coins earned at this pool
				</h2>
			</div>
		</div>
	</section>
@endsection

@section('content')
	<div class="payouts-graph-view">
		<div class="columns is-marginless is-centered">
			<div class="column is-7">
				<h4 class="title is-4">{{ $authUser->display_nick }}'s earnings</h4>

				<div class="tabs">
					<ul>
						<li class="is-active"><a href="{{ route('user.payouts.graph') }}">Graph</a></li>
						<li><a href="{{ route('user.payouts.listing') }}">Listing</a></li>
					</ul>
				</div>

				<div id="graph"></div>

				<h5 class="title is-5">Total: {{ number_format($payouts_sum, 9, '.', ',') }} XDAG</h5>

				<a class="button is-primary is-pulled-right" href="{{ route('user.payouts.export-graph') }}" target="_blank">
					<span class="icon"><i class="fa fa-file-excel-o"></i></span>
					<span>Export</span>
				</a>

				<a class="button" href="{{ route('miners') }}">
					<span>Back</span>
				</a>
				<hr>
				<p><span class="important">Note:</span> Payouts update approximately every 4 hours. Payouts are sent immediately when they are ready.</p>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	<script>
		var payoutsView = new payoutsView('{!! $graph_data !!}');
	</script>
@endsection
