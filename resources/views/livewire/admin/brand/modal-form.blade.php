<!-- Modal -->
<!-- <div wire:ignore.self class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Brands</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form wire:submit.prevent="storebrand()">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Brand Name</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Brand Slug</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Brand Status</label>
                        <input type="checkbox">Checked=hidden,un-checked=Visible
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div> -->
<!-- Modal -->

<div wire:ignore.self class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Brands</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="storebrand">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Brand Name</label>

                        <input type="text" wire:model.defer="name" class="form-control">
                        @error('name') <small class="text-danger"> {{$message}}</small> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Brand Slug</label>
                        <input type="text" wire:model.defer="slug" class="form-control">
                        @error('slug') <small class="text-danger"> {{$message}}</small> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Brand Status</label>
                        <input type="checkbox" wire:model.defer="status">Checked= hidden, un-checked= Visible
                        @error('status') <small class="text-danger"> {{$message}}</small> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" data-bs-toggle="modal">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>