@extends('layouts.admin')

@section('title')
   User
@endsection

@section('content')
<div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">User</h2>
                <p class="dashboard-subtitle">
                  List of User
                </p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-body">
                        <a href="{{ route('user.create')}}" class="btn btn-primary mb-3">
                         + Tambah Ketegori Baru
                        </a>
                        <div class="table-responsive">
                         <table class="table table-hover scroll-horizontal-vertical w-100">
                          <thead>
                           <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Roles</th>
                            <th>Aksi</th>
                           </tr>
                          </thead>
                          <tbody>
                          @foreach ( $items as $item)
                            <tr>
                              <td>{{ $item->id}}</td>
                              <td>{{ $item->name}}</td>
                              <td>{{ $item->email}}</td>
                              <td>{{ $item->roles}}</td>
                              <td>
                                <a href="{{ route('user.edit', $item->id ) }} " class="btn btn-warning text-white btn-sm mb-1">
                                Sunting
                                </a>
                                <form action="{{route('user.destroy', $item->id )}}" method="POST">
                                @method('DELETE')
                                @csrf 
                                <button class="btn btn-danger text-white btn-sm" type="submit">
                                    Hapus
                                </button>
                                </form>
                              </td>
                            </tr>
                          @endforeach
                          </tbody>
                         </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection

@push('addon-script')
 <script>
  var datatable = $('#crudTable').DataTable({
    processing: true,
    serverSide: true,
    ordering: true,
    ajax: {
      url: '{!! url()->current() !!}',
    },
    columns: [
      { data: 'id', name: 'id'},
      { data: 'name', name: 'name'},
      { data: 'photo', name: 'photo'},
      { data: 'slug', name: 'slug'},
      { 
        data: 'action',
        name: 'action',
        orderable: false,
        searcable: false,
        width: '15%'
      },
    ]
  })
 </script>
@endpush
