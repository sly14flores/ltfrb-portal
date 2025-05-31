{{-- Edit --}}
<div class="modal fade" id="edit-denomination-{{ $denomination->id }}">
    <div class="modal-dialog">
        <form action="{{ route('admin.denominations.update', $denomination->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="modal-content border-warning">
                <div class="modal-header border-warning">
                    <h3 class="h5 modal-title">
                        <i class="fa-regular fa-pen-to-square"></i> Edit Denomination
                    </h3>
                </div>
                <div class="modal-body">
                    <input type="text" name="new_name" placeholder="Category name" class="form-control" value="{{ $denomination->name }}">
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-outline-warning btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-warning btn-sm">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- Delete --}}
<div class="modal fade" id="delete-denomination-{{ $denomination->id }}">
    <div class="modal-dialog">
        <form action="{{ route('admin.denominations.destroy', $denomination->id) }}" method="post">
            @csrf
            @method('DELETE')
            <div class="modal-content border-danger">
                <div class="modal-header border-danger">
                    <h3 class="h5 modal-title text-danger">
                        <i class="fa-solid fa-trash-can"></i> Delete Denomination
                    </h3>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete <span class="fw-bold">{{ $denomination->name }}</span> denomination?</p>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </div>
            </div>
        </form>
    </div>
</div>