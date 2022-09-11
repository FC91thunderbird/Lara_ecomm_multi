@extends('layouts/admin/layout/main')

@section('title', 'Product')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header border-bottom">
            <h4 class="card-title">All Products</h4>
            <a href="{{ route('product.create') }}" class="dt-button create-new btn btn-primary" type="button">Add Product</a>
        </div>
        <div class="card-datatable">
            <table id="example" class="hover">
                    <thead>
                        <tr bgcolor="#f3f2f7">
                            <th>#</th>
                            <th>Image</th>
                            <th>Product Name</th>
                            <th>Category</th>
                            <th>Sub-Category</th>
                            <th>Product Qty</th>
                            <th>Purchase Price</th>
                            <th>Selling Price</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($products as $item)
                        <tr>
                            <<td>{{ $loop->index+1 }}</td>
                                <td>
                                    <img src="{{ asset($item->product_thumbnail) }}" alt=""  style="width: 70px; height:70px;">
                                </td>
                                <td class="sorting_1">{{ $item->product_name }}</td>
                                <td>{{ $item->category->category_name }}</td>
                                <td>{{ $item->subcategory->sub_category_name }}</td>
                                <td>{{ $item->product_qty }}</td>
                                <td>{{ $item->purchase_price }}</td>
                                <td>{{ $item->selling_price }}</td>
                                <td>
                                <div class="form-check form-switch">
                                    <input data-id="{{$item->id}}" class="form-check-input" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $item->status ? 'checked' : '' }}></div>
                                </td>
                                <td>{{ $item->created_at->format('d, M Y') }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                            <i data-feather="more-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="{{ route('product.edit', $item) }}">
                                                <i data-feather="edit-2" class="me-50"></i>
                                                <span>Edit</span>
                                            </a>
                                            <form action="{{ route('product.destroy', $item) }}" method="post">
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


<script>
    $(document).ready(function () {
    $('#example').DataTable();
});
</script>
 <script src="{{ asset('backend/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/js/tables/datatable/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/js/tables/datatable/responsive.bootstrap5.js') }}"></script>
    <script>
        $(function() {
            $('.form-check-input').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var product_id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/admin/changestatus',
                    data: {'status': status, 'product_id': product_id},
                    success: function(data){
                        console.log(data.success)
                    }
                });
            })
        })
    </script>
@endsection