@extends('admin.layout.admin-layout')

@section('main-content')
<div class="row">
    <div class="col-12">
        <h4 class="py-3 mb-4">role List</h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-header">role</h5>
                <div class="pe-3">
                    <a href="" class="btn btn-primary p-2" data-bs-toggle="modal" data-bs-target="#addRole">+Add New
                        role</a>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @if(count($roles)>0)
                        @foreach ($roles as $role)
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->description }}</td>
                            <td>
                                <div class="d-flex">
                                    <!-- Button trigger Edit Modal -->
                                    <a href="" class="btn btn-primary p-2 me-2 editrole" data-id="{{$role->id}}"
                                        data-bs-toggle="modal" data-bs-target="#editRole">
                                        <i class="bx bx-edit-alt"></i>
                                    </a>
                                    {{-- Delete Role --}}
                                    <button type="button" class="btn btn-danger deleterole p-2" data-id="{{$role->id}}">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="4" align="cetner">
                                <h4 class="text-center pt-3">Roles Not Found</h4>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>
</div>
@include('admin.roles.add-role')
@include('admin.roles.edit-role')
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        
        // Store Data with Ajax
        $('#submitRole').on('submit', function(e){
            e.preventDefault();
            let formData = $(this).serialize();
            $(this).trigger('reset');
            // Ajax Call Method
            ajaxStoreAndUpdate("POST", "{{route('role.store')}}", formData, "#addRole", "Role Added Successfully");
        });

        // Edit role
        $(document).on('click','.editrole', function () {
            let role_id = $(this).data('id');
            $.ajax({
                type: "GET",
                url: `/admin/role/${role_id}/edit`,
                success: function (response) {
                    if(response.status == 'success'){
                        let role = response.role;
                        $('#update_id').val(role.id);
                        $('#update_name').val(role.name);
                        $('#update_desc').val(role.description);
                    }
                }
            });
        });

        // Update role
        $('#updateRole').on('submit', function(e){
            e.preventDefault();
            let role_id = $("#update_id").val();
            let formData = $(this).serialize();
            // Ajax Call Method
            ajaxStoreAndUpdate("PUT", "{{url('admin/role/{role_id}')}}", formData, "#editRole", "Role Updated Successfully");
        });

        // // Delete role
        $('.deleterole').on('click', function () {
            let role_id = $(this).data('id');
            let data = {id:role_id};
            ajaxDeleteWithToastr("DELETE", "{{url('admin/role/{role_id}')}}", data, "Role Deleted Successfully")
        });

    });
</script>
@endpush