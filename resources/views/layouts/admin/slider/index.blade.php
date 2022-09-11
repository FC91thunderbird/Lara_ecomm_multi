@extends('layouts/admin/layout/main')

@section('title', 'Slider')

@section('content')

<div class="col-12">
    <div class="card">
        <div class="card-header border-bottom">
            <h4 class="card-title">table title</h4>
            <a href="{{ route('slider.create') }}" class="dt-button create-new btn btn-primary" type="button"><span>Add Slide</span></a>
        </div>
        <div class="card-datatable">
            <table id="example" class="hover" >
                    <thead>
                        <tr bgcolor="#f3f2f7">
                            <th>#</th>
                            <th>Slider Image</th>
                            <th>Slider Name</th>
                            <th>Slider Title</th>
                            <th>Slider Status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($sliders as $item)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td><img src="{{ asset($item->slider_image) }}" alt="" style="width: 70px; height:40px;"></td>
                            <td class="sorting_1">{{ $item->slider_name }}</td>
                            <td>{{ $item->slider_title }}</td>
                            <td>
                                <div class="form-check form-switch">
                                    <input data-id="{{$item->id}}" class="form-check-input" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $item->slider_status ? 'checked' : '' }}></div>
                                </td>

                            <td>{{ $item->created_at->format('d, M Y') }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                        <i data-feather="more-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="{{ route('slider.edit', $item) }}">
                                            <i data-feather="edit-2" class="me-50"></i>
                                            <span>Edit</span>
                                        </a>
                                        <form action="{{ route('slider.destroy', $item) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <a href="" class="dropdown-item" title="Delete Data" id="delete" onclick="event.preventDefault();
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