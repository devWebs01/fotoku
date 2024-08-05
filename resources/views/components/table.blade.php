<table id="{{ $id }}" class="table table-striped table-bordered" style="100%">
    <thead>
        <tr>
            @foreach ( $th as $data )
            <th>{{ $data }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        {{ $slot }}
    </tbody>
</table>