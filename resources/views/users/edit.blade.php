@extends('layout')
@section('title', 'Update user' . $user->username)
@section('header', 'Update user: ' . $user->name . ' ' . $user->lastname)

@section('content')
    <div class="card">
        <div class="card-body">
            <form class="needs-validation" method="post" action="{{ route('users.update', [$user]) }}" novalidate>
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-sm">
                        <div class="model-field">
                            <div class="model-field__control">
                                <input name="name" type="text"
                                    class="@error('name') error-border @enderror model-field__input form-control "
                                    value="{{ old('name', $user->name) }}" required />
                                <label for="name" class="model-field__label">name</label>
                                <div class="model-field__bar"></div>
                                <!-- TODO check if i m working-->
                                @error('name')
                                    <div class="error">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <div class="model-field">
                            <div class="model-field__control">
                                <input name="lastname" type="text"
                                    class="@error('lastname') error-border @enderror model-field__input form-control "
                                    value="{{ old('lastname', $user->lastname) }}" required />
                                <label for="lastname" class="model-field__label">last Name</label>
                                @error('lastname')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                                <div class="model-field__bar"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <div class="model-field">
                            <div class="model-field__control">
                                <input type="text" name="username"
                                    class=" @error('username') error-border @enderror model-field__input form-control"
                                    value="{{ old('username', $user->username) }}" required />
                                <label for="username" class="model-field__label">username</label>
                                @error('username')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                                <div class="model-field__bar"></div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="row">
            <div class="col-sm">
                <div class="model-field">
                    <div class="model-field__control">
                        <input type="password" name="password"
                            class="  @error('password') error-border @enderror model-field__input form-control"
                            value="{{ old('password') }}" required />
                        <label for="password" class="model-field__label">password</label>
                        @error('password')
                            <div class="error">{{ $message }}</div>
                        @enderror
                        <div class="model-field__bar"></div>
                    </div>
                </div>
            </div>
        </div> --}}
                <div class="row">
                    <div class="col-sm">
                        <div class="model-field">
                            <div class="model-field__control">
                                <input name="email" type="email"
                                    class=" @error('email') error-border @enderror model-field__input form-control"
                                    value="{{ old('email', $user->email) }}" required />
                                <label for="email" class="model-field__label">email</label>
                                @error('email')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                                <div class="model-field__bar"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <div class="model-field">
                            <div class="model-field__control">
                                <select name="role"
                                    class=" @error('role') error-border @enderror model-field__input form-control" required>
                                    @foreach (App\Enums\UserRoles::values() as $key => $value)
                                        <option value="{{ $value }}" @if (Auth::user()->role->value === $value) selected @endif>{{ $key }}</option>
                                    @endforeach
                                </select>
                                <label for="role" class="model-field__label">role</label>
                                @error('role')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                                <div class="model-field__bar"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-primary">update</button>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection
