@extends('admin.layout.admin-layout')

@section('main-content')
<div class="row">
    <div class="col-12">
        <h4 class="py-3 mb-4">User List</h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-header">user</h5>
                <div class="pe-3">
                    <a href="" class="btn btn-primary p-2" data-bs-toggle="modal" data-bs-target="#addUser">+Add New
                        User</a>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Admin</th>
                            <th>Roles</th>
                            {{-- <th>Action</th> --}}
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @if(count($users)>0)
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                {!! $user->is_admin == 1 ?
                                '<span class="badge text-bg-info">Yes</span>'
                                : '<span class="badge text-bg-danger">No</span>' !!}
                            </td>
                            <td>
                                {{-- @php
                                $colors = ['primary','info','warning'];
                                @endphp --}}
                                @foreach ($user->roles as $role)
                                <span class="badge text-bg-primary">{{ $role->name }}</span>
                                @endforeach
                            </td>
                            {{-- <td>
                                <div class="d-flex">
                                    <!-- Button trigger Edit Modal -->
                                    <a href="" class="btn btn-primary p-2 me-2 editUser" data-id="{{$user->id}}"
                                        data-bs-toggle="modal" data-bs-target="#editUser">
                                        <i class="bx bx-edit-alt"></i>
                                    </a>
                                    {{-- Delete User --}}
                                    <button type="button" class="btn btn-danger deleteuser p-2" data-id="{{$user->id}}">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                </div>
                            </td> --}}
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="4" align="cetner">
                                <h4 class="text-center pt-3">Users Not Found</h4>
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
@include('admin.users.add-user')
@include('admin.users.edit-user')
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        
        // Store Data with Ajax
        $(document).on('submit','#submitUser', function(e){
            e.preventDefault();
            let formData = $(this).serialize();
            $(this).trigger('reset');
            // Ajax Call Method
            ajaxStoreAndUpdate("POST", "{{route('user.store')}}", formData, "#addUser", "User Added Successfully");
        });

        // Edit user
        $(document).on('click','.editUser', function () {
            let user_id = $(this).data('id');
            $.ajax({
                type: "GET",
                url: `/admin/user/${user_id}/edit`,
                success: function (response) {
                    if(response.status == 'success'){
                        let user = response.user;
                        $('#update_id').val(user.id);
                        $('#update_name').val(user.name);
                        $('#update_email').val(user.email);

                        $("#update_roles option:selected").attr('selected',false);
                        $.each(user.roles, function (index, value) { 
                            $.each($('#update_roles option'), function() {
                                let role = $(this).val();
                                if(value.id == role && user.id == user_id){
                                    $("#update_roles option[value='"+value.id+"']").attr('selected',true);
                                }
                            });
                        });

                    }
                }
            });
        });

        $(document).on('click',"#update_roles", function () {
            let roles = $(this).val();
            if($.inArray('0', roles) === -1){
                $("#update_roles option[value='0']").attr('disabled',true);
            }
        });

        // Update user
        $(document).on('submit','#updateUser', function(e){
            e.preventDefault();
            let user_id = $("#update_id").val();
            let formData = $(this).serialize();
            $("#update_roles option[value='0']").attr('disabled',false);
            // Ajax Call Method
            ajaxStoreAndUpdate("PUT", "{{url('admin/user/{user_id}')}}", formData, "#editUser", "User Updated Successfully");
        });

        // // Delete user
        $(document).on('click','.deleteuser', function () {
            let user_id = $(this).data('id');
            let data = {id:user_id};
            ajaxDeleteWithToastr("DELETE", "{{url('admin/user/{user_id}')}}", data, "User Deleted Successfully")
        });

    });
</script>
@endpush