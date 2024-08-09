<table id="{{ $id }}" class="table table-hover table-light text-black" style="100%">
    <thead>
        <tr>
            @foreach ($th as $data)
                <th class="text-black text-uppercase">{{ $data }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        {{ $slot }}
    </tbody>
</table>
