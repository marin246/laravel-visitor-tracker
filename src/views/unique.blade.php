@extends('visitstats::layout')

@section('visitortracker_content')
<div class="row">
	<div class="col-md-12">
		<h5>{{ $visitortrackerSubtitle }}</h5>

		<table class="table table-sm table-striped fs-1">
			<thead>
				<th>IP / User</th>
				<th>Visits</th>
				<th>Last Visit</th>
			</thead>

			<tbody>
				@foreach ($visits as $visit)
					<tr>
						<td>
                            {{ $visit->ip }}

							@if ($visit->user_id)
                                <img class="visitortracker-icon"
                                    src="{{ asset('/vendor/visitortracker/icons/user.png') }}"
                                    title="Authenticated user: {{ $visit->user_email }}">
                                
                                {{ $visit->user_email }}
                            @endif
						</td>
							
						<td>
							{{ $visit->visits_count }}
						</td>

                        <td>
							@include('visitstats::_last_visit', [
                                'hideUserAndIp' => true,
                            ])
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>

		{{ $visits->links() }}
	</div>
</div>
@endsection