@extends('../layout/backend/master')
@section('title', 'SHM Store | Show User List' )
<link rel="stylesheet" href="{{ asset('backend/css/product.css') }}">
<style>
    /*img{
        border-radius: 50%;
    }*/
    table tr td{
        vertical-align: middle;
    }

    /* Custom Styling Sweet Alert 2 */
	.swal2-popup {
		font-size: 12.5px !important;
	}

	.swal2-styled.swal2-confirm {
		padding-left: 25px !important;
		padding-right: 25px !important;
	}

	.btn,
	.swal2-styled.swal2-cancel,
	.swal2-styled.swal2-confirm {
		box-shadow: none !important; 
		outline: none !important;
		border-radius: 0 !important;
        padding: 10px 24px !important;
	}
</style>

@section('content')
<div class="card">
    <div class="card-body">

        <div class="ttl clearfix">
            <h3 class="cmn-h3">User List Table</h3>
            <button class="cmn-btn">
                <a href="{{ route('admin.user.create') }}">Create</a>
            </button>
        </div>
        <hr>

        <table>
            <thead>
                <tr class="row">
                    <th>#</th>
                    <th>Image</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Role</th>
                    <th>Created at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>
                        <img src="{{ $user->getPhotoPath() }}" alt="{{ $user->name }}" class="img-user">
                    </td>
                    <td>{{ ucwords(strtolower($user->name)) }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ ucwords(strtolower($user->role)) }}</td>
                    <td>{{ $user->created_at->toFormattedDateString() }}</td>
                    <td>
                        <div class="btn-div clearfix">
                            <div class="col2">
                                <button><a href="{{ route('admin.user.edit',$user->id) }}">Edit</a></button>
                            </div>
                            <form class="col1 userDeleteForm{{$user->id}}" action="{{ route('admin.user.delete',$user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                                <button type="button">
                                    <a href="javascript:;" data-id="{{ $user->id }}" class="del-user-btn">
                                        Delete
                                    </a>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach      
            </tbody>
        </table>

        {{ $users->links() }}
    </div>
</div>
@endsection

@push('js')
<script>
    $(document).on('click', '.del-user-btn', function(e){
        e.preventDefault();
        let id = $(this).data('id');

        Swal.fire({
            title: 'Are You Sure?',
            text: "Do You Want to Delete this User?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'OK',
            cancelButtonText: 'CANCEL',
            reverseButtons: true,
        }).then((result) => {
            if (result.isConfirmed) {
                $('.userDeleteForm'+id).submit();
            }
        })
    });
</script>
@endpush