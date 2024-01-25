<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>CRUD - Students (Index)</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
			td {
				text-align: center;
				vertical-align: middle
			}

			th {
				text-align: center;
				vertical-align: middle
			}

            .dropbtn {
                background-color: green;
                color: white;
                padding: 16px;
                font-size: 16px;
                border: none;
            }

			.dropbtn1 {
                background-color: red;
                color: white;
                padding: 16px;
                font-size: 16px;
                border: none;
            }

			.dropdown {
				position: relative;
				display: inline-block;
			}

			.dropdown-content {
                display: none;
                position: absolute;
                background-color: #f1f1f1;
                min-width: 160px;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                z-index: 1;
            }

            .dropdown-content a {
                color: black;
                padding: 12px 16px;
                text-decoration: none;
                display: block;
            }

            .dropdown-content a:hover {background-color: #ddd;}

            .dropdown:hover .dropdown-content {display: block;}

            .dropdown:hover .dropbtn {background-color: #3e8e41;}
        </style>
	</head>
	<body>
		<nav class="navbar" style="background-color: #89bbf0;">
			<div class="container-fluid">
					<a class="navbar-brand" href="http://127.0.0.1:8000">C.R.U.D</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarText">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item">
						<a class="nav-link" href="http://127.0.0.1:8000/students">Student</a>
						</li>
					</span>
				</div>
			</div>
		</nav>
        <div class="pull-left">
			<div class="row">
				<div class="mt-4">
					<h2 style="text-align: center">Students CRUD System</h2>
				</div>
				<div>
					<div class="pull-right" style="margin-bottom: 50px; display: block;">
					<a class="btn btn-success" style="display: block;  width: 20%; position: absolute; left: 40%; right: 40%; background-color: green" href="{{ route('students.create') }}">Create New Student Data</a>
					</div>
				</div>
            </div>

            @if (session('message'))
            <div>
                <h5 class="alert alert-success">{{session('message')}}</h5>
            </div>
            @endif

		<table class="table table-bordered">
			<tr>
				<th colspan="4">Student Information</th>
                <th colspan="2">Academic</th>
                <th colspan="3">Country</th>
				<th colspan="2" rowspan="2">Actions</th>          
			</tr>
            <tr>
				<th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Address</th>
				<th>Course</th>
				<th>Year</th>
				<th>Continent</th>
				<th>Name</th>
				<th>Capital</th>        
			</tr>
			@foreach($students as $students)
				<tr>
					<td>{{$students->id}}</td>	
					<td>{{$students->name}}</td>	
					<td>{{$students->age}}</td>
					<td>{{$students->address}}</td>
					<td>{{$students->academic->course ?? 'None'}}</td>
					<td>{{$students->academic->year ?? 'None'}}</td>
					<td>{{$students->country->continent ?? 'None'}}</td>
					<td>{{$students->country->country_name ?? 'None'}}</td>
					<td>{{$students->country->capital ?? 'None'}}</td>
					<td>
                        <div class="dropdown">
                            <button class="dropbtn">Update</button>
                            <div class="dropdown-content">
                                <a href="{{ route('students.edit',['students' => $students])}}">All Data</a>
                                <a href="{{ url('students/'.$students->id.'/academic')}}">Academic</a>
                                <a href="{{ url('students/'.$students->id.'/country')}}">Country</a>
                            </div>
                        </div>
					<td>
					</td colspan="3">
						<div>
							<form action="{{ url('students/'.$students->id.'/destroy')}}" method="POST">
								@csrf	
								@method('DELETE')
									<button type="submit" class="btn btn-danger btn sm ">All Data</a>
							</form>
							<form action="{{ url('students/'.$students->id.'/deleteacademic') }}" method="POST" >
								@csrf	
								@method('DELETE')
									<button type="submit" class="btn btn-danger btn sm">Academic</a>
							</form>
							<form action="{{ url('students/'.$students->id.'/deletecountry')}}" method="POST">
								@csrf	
								@method('DELETE')
									<button type="submit" class="btn btn-danger btn sm">Country</a>
							</form>
						</div>
					</td>

					
					

			@endforeach           
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
	</body>
</html>