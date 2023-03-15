@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 pt-4">
                <div class="card">
                    <div class="card-header">{{ __('Update account') }}</div>

                    <div class="card-body">
                        <form action="/register/{{ $user->id }}" method="POST" >
                            @csrf
                            @method('PUT')

                            @if(Auth()->user()->role == 1)
                                <div class="row mb-3">
                                    <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>

                                    <div class="col-md-6">

                                        <select id="department_id" name="department_id" class="form-select" aria-label="Default select example">
                                            <option value="1">Admin and Manager</option>
                                            <option value="2">Department A</option>
                                            <option value="3">Department B</option>
                                            <option value="4">Department C</option>
                                        </select>
                                        @error('department_id')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                               name="name" value="{{ old('name') ?? $user->name }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>

                                    <div class="col-md-6">
                                        <div class="form-control">{{ old('username') ?? $user->username }} </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>

                                    <div class="col-md-6">

                                        <select id="role" name="role" class="form-select" aria-label="Default select example">
                                            <option value="1">Admin</option>
                                            <option value="2">QA Manager</option>
                                            <option value="3">QA Coordinator</option>
                                            <option value="4">Staff</option>
                                        </select>
                                        @error('role')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Phonenumber') }}</label>

                                    <div class="col-md-6">
                                        <input id="phonenumber" type="text" class="form-control @error('phonenumber') is-invalid @enderror"
                                               name="phonenumber" value="{{ old('phonenumber') ?? $user->phonenumber }}" required autocomplete="phonenumber" autofocus>

                                        @error('phonenumber')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                    <div class="col-md-6">
                                        <div class="form-control">{{ old('email') ?? $user->email }}</div>
                                    </div>
                                </div>
                            @else
                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                               name="name" value="{{ old('name') ?? $user->name }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>

                                    <div class="col-md-6">
                                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"
                                               name="username" value="{{ old('username') ?? $user->username }}" required autocomplete="username" autofocus>

                                        @error('username')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>
                                    @if($user->role == 4)
                                    <div class="col-md-6">
                                        <div class="form-control">Staff </div>
                                    </div>
                                        @elseif($user->role == 3)
                                            <div class="col-md-6">
                                                <div class="form-control">QA Coordinator</div>
                                            </div>
                                    @else
                                        <div class="col-md-6">
                                            <div class="form-control">QA Manager</div>
                                        </div>
                                        @endif
                                </div>

                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Phonenumber') }}</label>

                                    <div class="col-md-6">
                                        <input id="phonenumber" type="text" class="form-control @error('phonenumber') is-invalid @enderror"
                                               name="phonenumber" value="{{ old('phonenumber') ?? $user->phonenumber }}" required autocomplete="phonenumber" autofocus>

                                        @error('phonenumber')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                                               name="email" value="{{ old('email') ?? $user->email }}" required autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                            @endif

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-info">
                                            {{ __('Update') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
