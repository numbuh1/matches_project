@extends('admin.layout.master')

@section('content')
	<section class="content-header">
	  <h1>
	    Teams 
	    <small>Teamsssssss</small>
	  </h1>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row col-md-12">
			<div class="box box-success">
				<div class="box-body">
					<table id="tblTeam" class="table table-bordered table-hover" role="grid">
						<thead>
							<tr>
								<th>Team Name</th>
								<th>Country</th>
								<th>Game</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($team as $key => $val)
								<tr>
									<td><span class="game-icon" style="background-image: url('{{$val->logo}}');"></span> {{ $val->name }}</td>
									<td><span class="flag-icon flag-icon-{{ $val->countryId }}"></span> {{ $val->country }}</td>
									<td><span class="game-icon" style="background-image: url('{{$val->game->logo}}');"></span> {{ $val->game->name }}</td>
									<td></td>
								</tr>
	                        @endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
@endsection

@section('css')
	<style>
		select.icon-menu option {
			background-repeat:no-repeat;
			background-position:bottom left;
			padding-left:30px;
		}
	</style>
	<link rel="stylesheet" href="../vendor/flag-icon-css-master/css/flag-icon.min.css">
	<link rel="stylesheet" href="../vendor/country-select-js-master/build/css/countrySelect.min.css">
	<link rel="stylesheet" href="../vendor/datatables.net-bs/css/dataTables.bootstrap.min.css">
@endsection

@section('js')
	<script src="../vendor/country-select-js-master/build/js/countrySelect.min.js"></script>
	<script src="../vendor/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="../vendor/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
	<script>
		$("#cboCountry").countrySelect();
		$("#tblTeam").DataTable()
	</script>
@endsection
