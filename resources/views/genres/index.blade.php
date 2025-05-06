@include('layout.header')
<div class="content-wrapper container mt-5">
    <h2>Daftar Genre</h2>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('genres.create') }}" class="btn btn-primary mb-3">+ Tambah Genre</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Genre</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($genres as $index => $genre)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $genre->nama_genre }}</td>
                    <td>
                        <a href="{{ route('genres.show', $genre->id) }}" class="btn btn-info btn-sm">Lihat</a>
                        <a href="{{ route('genres.edit', $genre->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('genres.destroy', $genre->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@include('layout.footer')
