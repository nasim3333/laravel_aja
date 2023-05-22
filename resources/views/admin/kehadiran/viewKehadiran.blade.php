@extends('components.app')
@section('title')
Dashboard Kehadiran
@endsection
@extends('components.sidebar')

@section('konten')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard Kehadiran</h1>

    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
        </div>
        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar" class="align-text-bottom"></span>
            This week
        </button>
    </div>
</div>
<div> <a href="{{ route('kehadiran.tambah') }}"><button type="button" class="btn btn-outline-primary"><i class="fa fa-plus" aria-hidden="true"></i> Tambah</button></a></div>
<div class="table-responsive">
    <table class="table table-hover table-sm">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Jam Masuk</th>
                <th scope="col">Jam Keluar</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dataKehadiran as $index => $kehadiran)
            <tr>
                <td scope="col">{{ ++$index }}</td>
                <td scope="col">{{ $kehadiran->user->name }}</td>
                <td scope="col">{{ $kehadiran->jam_masuk }}</td>
                <td scope="col">{{ $kehadiran->jam_keluar }}</td>
                <td>
                    <div>
                        <a href="{{route('kehadiran.edit', $kehadiran->id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i>Edit</a>
                        | <form onsubmit="return confirm('Data kehadiran akan dihapus ?')" action=" {{route('kehadiran.deleteKehadiran',$kehadiran->id)}}" method="POST" ">
                        @csrf
                        @method('DELETE')
                        <button type=" submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection