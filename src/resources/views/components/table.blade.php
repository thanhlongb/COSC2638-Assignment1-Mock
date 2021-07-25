<table class="table table-hover">
    <thead>
      <tr>
        @foreach ($fields as $field)
            <th scope="col">{{ $field }}</th>
        @endforeach
        <th scope="col">action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($records as $record)
        <tr @if ($loop->even) class="table-active" @endif>
            @foreach ($fields as $field)
                @if ($loop->first)
                    <th scope="row">{{ $record[$field] }}</th>
                @else
                    <td>{{ $record[$field] }}</td>
                @endif
            @endforeach
            <td><a class="btn btn-info btn-sm" alt="Show employee details" href="{{route('getUpdatePage', ['id' => $record['id']]);}}"><i class="fa fa-eye"></i></a></td></td>
        </tr>
        @endforeach
    </tbody>
  </table>
