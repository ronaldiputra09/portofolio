@push('title')
    Kategori
@endpush

<div>
    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0 flex-grow-1">Data Kategori</h4>
                </div>
                <div class="card-body p-4">
                    <div class="table-responsive table-card table-bordered">
                        <table class="table table-nowrap table-striped-columns mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama kategori</th>
                                    <th scope="col">Slug kategori</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 0;
                                @endphp
                                @forelse ($categories as $key => $category)
                                    <tr>
                                        <td>{{ $categories->firstItem() + $key }}</td>
                                        </td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->slug }}</td>
                                        @if ($category->status == 'active')
                                            <td><a href="#" wire:click='changeStatus({{ $category->id }})'><span
                                                        class="badge bg-success">{{ $category->status }}</span>
                                                </a>
                                            </td>
                                        @else
                                            <td><a href="#" wire:click='changeStatus({{ $category->id }})'><span
                                                        class="badge bg-danger">{{ $category->status }}</span>
                                                </a>
                                            </td>
                                        @endif
                                        <td>
                                            <div class="hstack gap-3 flex-wrap">
                                                <a wire:click='editCategory({{ $category->id }})' href="#"
                                                    class="link-success fs-15"><i class="ri-edit-2-line"></i></a>
                                                <a href="#" data-bs-toggle="modal" data-bs-target=".konfirmasi"
                                                    class="link-danger fs-15"><i class="ri-delete-bin-line"></i></a>
                                                <!-- konfirmasi modal -->
                                                <div class="modal fade konfirmasi" tabindex="-1"
                                                    aria-labelledby="mySmallModalLabel" aria-hidden="true"
                                                    style="display: none;">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-body text-center p-5">
                                                                <lord-icon src="https://cdn.lordicon.com/jmkrnisz.json"
                                                                    trigger="loop"
                                                                    colors="primary:#121331,secondary:#08a88a"
                                                                    style="width:120px;height:120px">
                                                                </lord-icon>
                                                                <div class="mt-4">
                                                                    <h4 class="mb-3">Yakin ingin menghapus!
                                                                    </h4>
                                                                    <p class="text-muted mb-4">Data yang sudah
                                                                        dihapus tidak bisa kembali lagi loh.</p>
                                                                    <div class="hstack gap-2 justify-content-center">
                                                                        <button type="button" class="btn btn-light"
                                                                            data-bs-dismiss="modal">Batal</button>
                                                                        <button
                                                                            wire:click='deleteCategory({{ $category->id }})'
                                                                            type="button" class="btn btn-danger"
                                                                            data-bs-dismiss="modal"
                                                                            @if (session()->has('success')) data-bs-dismiss="modal" @endif>
                                                                            Yakin
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Tidak ada data</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show"
                    role="alert">
                    <i class="ri-check-double-line label-icon"></i><strong>Success</strong> - {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss=" alert" aria-label="Close"></button>
                </div>
            @else
                @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show"
                        role="alert">
                        <i class="ri-close-line label-icon"></i><strong>Error</strong> - {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss=" alert" aria-label="Close"></button>
                    </div>
                @endif
            @endif
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0 flex-grow-1">{{ $editId ? 'Edit' : 'Tambah' }} Kategori</h4>
                </div>
                <div class="card-body p-4">
                    <form wire:submit.prevent="{{ $editId ? "updateCategory( $category->id )" : 'addCategory' }}">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Kategori</label>
                            <input type="text" class="form-control" id="name" placeholder="Nama Kategori"
                                wire:model="name">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary w-100"
                            wire:loading.attr='disabled'>{{ $editId ? 'Update' : 'Simpan' }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
