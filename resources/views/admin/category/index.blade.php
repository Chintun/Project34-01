@extends("layouts.master_backend")
@section("cont")
<div class="container">
    <a class="btn btn-primary" href="{{ route("dashboard.category.add") }}">เพิ่มข้อมูล</a>
    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Category</th>
            <th scope="col">Action</th>

        </tr>
        </thead>
        <tbody>

            @foreach ($category as $data)
                <tr>
                    <th scope="row">
                        {{ $data->category_id }}
                    </th>
                    <td>
                        {{ $data->name }}
                    </td>
                    <td>
                        <a class="btn btn-warning btn-sm" href="{{ route('dashboard.category.edit', $data->category_id ) }}">
                            แก้ไข
                        </a>
                        <a class="btn btn-danger btn-sm" href="{{ route('dashboard.category.destroy', $data->category_id) }}">
                            ลบ
                        </a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection
