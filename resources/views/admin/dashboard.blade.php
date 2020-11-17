@extends('layouts.master_admin')

@section('content')
<div class="row my-3">
	<div class="col-md-6">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-tachometer-alt"></i> Dashboard</li>
			</ol>
		</nav>
	</div>
</div>

<div class="row">
	<div class="col-md-3 mt-2">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total User yang Tergabung</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800">77</div>
					</div>
					<div class="col-auto">
						<i class="fas fa-users fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</div>
@endsection