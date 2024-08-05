<table id="{{ $id }}" class="table table-striped table-bordered" style="width:100%">
    <tbody>
        @foreach ( $thtd as $item => $value)
            <tr>
                <th>
                    {{$item}}
                </th>
                <td>
                    {{$value}}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>