<x-layout>

    <x-slot name="main">
        <!-- General Errors -->
        <style>
            .divider:after,
            .divider:before {
                content: "";
                flex: 1;
                height: 1px;
                background: #eee;
            }

            .h-custom {
                height: calc(100% - 73px);
            }

            @media (max-width: 450px) {
                .h-custom {
                    height: 100%;
                }
            }
        </style>
        {{-- @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}

        <section class="vh-80">
            <div class="container-fluid h-custom">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-md-9 col-lg-6 col-xl-5">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                            class="img-fluid" alt="Sample image">
                    </div>
                    <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                        <form method="POST" action="{{ route('login') }}">
                            <div
                                class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                                <p class="lead fw-normal mb-0 me-3">Sign in</p>
                            </div>

                            <div class="divider d-flex align-items-center my-4">

                            </div>

                            @csrf
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="email" id="email" name="email" value="{{ old('email') }}"
                                    id="email" class="form-control form-control-lg"
                                    placeholder="Enter a valid email address" />
                                <!-- Error for email -->
                                @error('email')
                                    <label style="color: red;"class="form-label" for="email">{{ $message }}</label>
                                @enderror

                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-3">
                                <input type="password" id="password" name="password"
                                    class="form-control form-control-lg" placeholder="Enter password" />


                                <!-- Error for password -->
                                @error('password')
                                <label style="color: red;" class="form-label" for="password">{{ $message }}</label>

                                @enderror
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <!-- Checkbox -->
                                <div class="form-check mb-0">
                                    <input class="form-check-input me-2" type="checkbox" value=""
                                        id="rem" />
                                    <label class="form-check-label" for="rem">
                                        Remember me
                                    </label>
                                </div>
                                <a href="#!" class="text-body">Forgot password?</a>
                            </div>

                            <div class="text-center text-lg-start mt-4 pt-2">
                                <button type="submit" class="btn btn-primary btn-lg"
                                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                                <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="#!"
                                        class="link-danger">Register</a></p>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div
                class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
                <!-- Copyright -->
                <div class="text-white mb-3 mb-md-0">
                    Copyright © 2024. All rights reserved.
                </div>
                <!-- Copyright -->

                <!-- Right -->
                <div>
                    <a href="#!" class="text-white me-4">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#!" class="text-white me-4">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#!" class="text-white me-4">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="#!" class="text-white">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
                <!-- Right -->
            </div>
        </section>


    </x-slot>


</x-layout>