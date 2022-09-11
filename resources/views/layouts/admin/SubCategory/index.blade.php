@extends('layouts/admin/layout/main')

@section('title', 'Category')

@section('styles')

<link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/vendors/css/tables/datatable/responsive.bootstrap5.min.css') }}">
   
@endsection

@section('content')


    <div class="col-12">
        <div class="card">
            <div class="card-header border-bottom">
                <h4 class="card-title">Sub-Categories</h4>
                <a href="{{ route('sub-category.create') }}" class="dt-button create-new btn btn-primary" type="button"><span>Add Sub-Category</span></a>
            </div>
            <div class="card-datatable">
                <table id="example" class="hover" >
                        <thead>
                            <tr bgcolor="#f3f2f7">
                                <th>Id</th>
                                <th>Sub-category Name</th>
                                <th>Category</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($subcategories as $subcategory)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $subcategory->sub_category_name }}</td>
                                <td>{{ $subcategory->category->category_name }}</td>
                                <td>{{ $subcategory->created_at->format('d, M Y') }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                            <i data-feather="more-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="{{ route('sub-category.edit', $subcategory) }}">
                                                <i data-feather="edit-2" class="me-50"></i>
                                                <span>Edit</span>
                                            </a>
                                            <form action="{{ route('sub-category.destroy', $subcategory) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <a class="dropdown-item" title="Delete Data" id="delete" onclick="event.preventDefault();
                                                this.closest('form').submit();"><i data-feather="trash" class="me-50"></i>Delete</a>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                @endforeach
                            </tr>
                        
                            
                        </tbody>
                    
                </table>
            </div>
        </div>
    </div>


@endsection

@section('scripts')


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function () {
    $('#example').DataTable();
});
</script>
 <script src="{{ asset('backend/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/js/tables/datatable/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/js/tables/datatable/responsive.bootstrap5.js') }}"></script>

    <script src="{{ asset('backend/js/scripts/tables/table-datatables-advanced.js') }}"></script>
<!-- END: Page Vendor JS-->
@endsection