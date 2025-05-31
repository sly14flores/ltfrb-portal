{{-- Edit --}}
<div class="modal fade" id="edit-user-{{ $user->id }}">
    <div class="modal-dialog">
        <form action="{{ route('admin.users.update', $user->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="modal-content border-warning">
                <div class="modal-header border-warning">
                    <h3 class="h5 modal-title">
                        <i class="fa-regular fa-pen-to-square"></i> Edit Denomination
                    </h3>
                </div>
                <div class="modal-body">
                    <select name="roles" id="roles" class="form-select">
                        @foreach ($all_roles as $role)
                            @if ($user->role_id == $role->id)
                                <option value="{{ $role->id }}" selected>{{ $role->name }}</option>
                            @else
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endif
                        @endforeach
                    </select>
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
<div class="modal fade" id="delete-user-{{ $user->id }}">
    <div class="modal-dialog">
        <form action="{{ route('admin.denominations.destroy', $user->id) }}" method="post">
            @csrf
            @method('DELETE')
            <div class="modal-content border-danger">
                <div class="modal-header border-danger">
                    <h3 class="h5 modal-title text-danger">
                        <i class="fa-solid fa-trash-can"></i> Delete User
                    </h3>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete <span class="fw-bold">{{ $user->name }}</span>?</p>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </div>
            </div>
        </form>
    </div>
</div>