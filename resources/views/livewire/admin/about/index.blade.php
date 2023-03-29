@push('title')
    Settings Profil
@endpush

<div>
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show mb-5" role="alert">
            <i class="ri-checkbox-circle-line align-middle me-1"></i>
            <span>{{ session('message') }}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="row mt-5">
        <div class="col-xxl-3">
            <div class="card mt-n5">
                <div class="card-body p-4">
                    <div class="text-center">
                        <form wire:submit.prevent='updateImage'>
                            <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                                <img src="{{ $image ? $image->temporaryUrl() : $imageUrl }}"
                                    class="rounded-circle avatar-xl img-thumbnail user-profile-image"
                                    alt="user-profile-image">
                                <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                    <input wire:model="image" id="profile-img-file-input" type="file"
                                        class="profile-img-file-input">
                                    <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                        <span class="avatar-title rounded-circle bg-light text-body">
                                            <i class="ri-camera-fill"></i>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <h5 class="fs-16 mb-1">{{ $name_depan . ' ' . $name_belakang }}</h5>
                            <p class="text-muted mb-2">{{ $profession }}</p>
                            @if ($image)
                                <button type="submit" class="btn btn-primary">Ganti Foto</button>
                            @endif

                        </form>
                    </div>
                </div>
            </div>
            <!--end card-->
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <div class="flex-grow-1">
                            <h5 class="card-title mb-0">Sosial Media</h5>
                        </div>
                        <div class="flex-shrink-0">
                            <a href="{{ route('admin.sosial') }}" class="badge bg-light text-primary fs-12"><i
                                    class="ri-add-fill align-bottom me-1"></i> Add</a>
                        </div>
                    </div>
                    @foreach ($sosials as $item)
                        <div class="mb-3 d-flex">
                            <div class="avatar-xs d-block flex-shrink-0 me-3">
                                <span class="avatar-title rounded-circle fs-16 bg-light text-light">
                                    {{-- <i class="ri-{{ $item->icon }}"></i> --}}
                                    <img src="{{ $item->icon }}" alt="icon" class="avatar-xs rounded-circle"
                                        style="width: 20px; height: 20px;">
                                </span>
                            </div>
                            @php
                                $link = explode('/', $item->link);
                                $data = array_pop($link);
                            @endphp
                            <input type="email" class="form-control" id="gitUsername" placeholder="Username"
                                value="{{ $data }}" disabled>
                        </div>
                    @endforeach
                </div>
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-xxl-9">
            <div class="card mt-xxl-n5">
                <div class="card-body p-4">
                    <div class="tab-content">
                        <div class="tab-pane active" id="personalDetails" role="tabpanel">
                            <form wire:submit.prevent='update'>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="firstnameInput" class="form-label">Nama Depan</label>
                                            <input wire:model='name_depan' type="text" class="form-control"
                                                placeholder="Masukan nama depan">
                                            @error('name_depan')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="firstnameInput" class="form-label">Nama Belakang</label>
                                            <input wire:model='name_belakang' type="text" class="form-control"
                                                placeholder="Masukan nama belakang">
                                        </div>
                                        @error('name_belakang')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="phonenumberInput" class="form-label">Nomor Handphone</label>
                                            <input type="text" class="form-control"
                                                placeholder="Masukan nomor handphone" wire:model='phone'>
                                        </div>
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="emailInput" class="form-label">Email</label>
                                            <input type="email" class="form-control" placeholder="Masukan email"
                                                wire:model='email'>
                                        </div>
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="company" class="form-label">Tanggal Lahir</label>
                                            <input wire:model='birthday' type="date" class="form-control"
                                                placeholder="Pilih tanggal">
                                        </div>
                                        @error('birthday')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="designationInput" class="form-label">Profesi</label>
                                            <input type="text" class="form-control" id="designationInput"
                                                placeholder="Masukan jabatan" wire:model='profession'>
                                        </div>
                                        @error('profession')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="websiteInput1" class="form-label">Website</label>
                                            <input type="text" class="form-control" id="websiteInput1"
                                                placeholder="www.example.com" wire:model='website'>
                                        </div>
                                        @error('website')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="countryInput" class="form-label">Negara</label>
                                            <input type="text" class="form-control" id="countryInput"
                                                placeholder="Country" wire:model='country'>
                                        </div>
                                        @error('country')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="cityInput" class="form-label">Kota/Kabupaten</label>
                                            <input type="text" class="form-control" id="cityInput"
                                                placeholder="City" wire:model='city'>
                                        </div>
                                        @error('city')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea" class="form-label">Alamat
                                                Lengkap</label>
                                            <textarea wire:model='address' class="form-control" id="exampleFormControlTextarea"
                                                placeholder="Masukan alamat lengkap"></textarea>
                                        </div>
                                        @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="mb-3 pb-2">
                                            <label for="exampleFormControlTextarea" class="form-label">Tentang
                                                Saya</label>
                                            <textarea wire:model='about' class="form-control" id="exampleFormControlTextarea"
                                                placeholder="Enter your description"></textarea>
                                        </div>
                                        @error('about')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </form>
                        </div>
                        <!--end tab-pane-->
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
</div>
