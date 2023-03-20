<div>
    <div class="auth-page-content">
        <div class="container align-content-center">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card mt-4">

                        <div class="card-body p-4">
                            <div class="text-center mt-2">
                                <h5 class="text-primary">Selamat datang bos !</h5>
                                <p class="text-muted">Silahkan masuk.</p>
                            </div>
                            <div class="p-2 mt-4">
                                <form wire:submit.prevent='login'>
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input wire:model.lazy='username' type="text"
                                            class="form-control @error('username') is-invalid @enderror" id="username"
                                            placeholder="Masukan username">
                                        @error('username')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="password-input">Password</label>
                                        <div class="position-relative auth-pass-inputgroup mb-3">
                                            <input wire:model.lazy='password' type="password"
                                                class="form-control pe-5 password-input @error('password') is-invalid @enderror"
                                                placeholder="Masukan password" id="password-input">
                                            <button
                                                class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                                type="button" id="password-addon"><i
                                                    class="ri-eye-fill align-middle"></i>
                                            </button>
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-check">
                                        <input wire:model.lazy='remember' class="form-check-input" type="checkbox"
                                            value="{{ $remember }}" id="auth-remember-check">
                                        <label class="form-check-label" for="auth-remember-check">Remember
                                            me</label>
                                    </div>

                                    <div class="mt-4">
                                        <button wire:loading.attr='disabled' class="btn btn-success w-100"
                                            type="submit">Masuk</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
</div>
