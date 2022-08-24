@extends('layouts.welcome')
@section('content')
<div class="container d-flex flex-column">
		<div class="row align-items-center justify-content-center g-0 min-vh-100">
			<div class="col-lg-5 col-md-8 py-8 py-xl-0">
				<!-- Card -->
				<div class="card shadow">
					<!-- Card body -->
					<div class="card-body p-6">
						<div class="mb-4">
							<a href="#"><img src="{{asset('assets/images/brand/logo/logo-icon.svg')}}" class="mb-4" alt="" /></a>
							<h1 class="mb-1 fw-bold">Sign up</h1>
							<span>Already have an account?
								<a href="{{route('login')}}" class="ms-1">Sign in</a></span>
						</div>
						<form action="{{route('registerForm')}}" method="POST" enctype="multipart/form-data">
							@csrf
							<div class="mb-3">
								<label for="username" class="form-label">First Name</label>
								<input type="text" id="firstname" class="form-control" name="first_name" placeholder="First Name" required />
							@error('first_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
							</div>
							<div class="mb-3">
								<label for="username" class="form-label">Last Name</label>
								<input type="text" id="lastname" class="form-control" name="last_name" placeholder="Last Name" required />
							@error('last_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
							</div>
							<div class="mb-3">
								<label for="email" class="form-label">Email</label>
								<input type="email" id="email" class="form-control" name="email" placeholder="Email address here" required />
							@error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
							</div>
							<div class="mb-3">
								<label for="password" class="form-label">Password</label>
								<input type="password" id="password" class="form-control" name="password" placeholder="**************" required />
							@error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
							</div>
							<div class="mb-3">
								<label for="dob" class="form-label">Date of Birth</label>
								<input type="date" id="dob" class="form-control" name="dob" required />
								@error('dob')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
							</div>
							<div class="mb-3">
								<label for="pro_img" class="form-label">Select Profile Image</label>
								<input type="file" id="pro_img" class="form-control" name="image" required />
								@error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
							</div>
							<div>
									<!-- Button -->
									<div class="d-grid">
								<button type="submit" class="btn btn-primary">
									Create An Account
								</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop