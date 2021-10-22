<table class="table table-striped table-bordered">
    <thead>
        <tr>
        <th width="5%"scope="col">ID</th>
        <th width="25%" scope="col">Title</th>
        <th width="30%" scope="col">Body</th>
        <th width="15%" scope="col">Created At</th>
        <th width="25%" scope="col"></th>
        </tr>
    </thead>
    <tbody>
        
        @foreach($dropzoneRecords as $record)
            <tr>
                <td>{{ $record->id }}</td>
                <td>{{ $record->title }}</td>
                <td>{{ $record->bodyText }}</td>
                <td>{{ $record->created_at->diffForHumans() }}</td>
                <td class="text-center">
                    <a href="{{ route('dropzone.show', $record->slug) }}" type="button" class="btn btn-info btn-sm mt-2 mt-xl-0"> View</a>
                    <a href="{{ route('dropzone.edit', $record->slug) }}" type="button" class="btn btn-warning btn-sm mt-2 mt-xl-0"> Edit</a>
                    <form class="d-inline" action="{{ route('dropzone.destroy', $record->id) }}" method="POST">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger btn-sm mt-2 mt-xl-0"  onclick="return confirm('Are you sure you want to delete record?' )"> Delete</button>
                    </form>  
                </td>
            </tr>        
        @endforeach
    </tbody>
</table>