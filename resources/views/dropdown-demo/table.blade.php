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
        <tr>
            <td>1</td>
            <td>Placeat nobis tenetur totam reiciendis et impedit.</td>
            <td>Rerum dicta rem qui non ut dolor. Deleniti possimus hic consectetur ducimus quibusdam amet. Quisquam ipsam incidunt placeat consequatur. Voluptatem dicta et cupiditate ex placeat enim.</td>
            <td>2021-10-20 15:48:15</td>
            <td class="text-center">
                <a href="{{ route('dropzone.create') }}" type="button" class="btn btn-info btn-sm mt-2 mt-xl-0"> View</a>
                <a href="{{ route('dropzone.edit', 1) }}" type="button" class="btn btn-warning btn-sm mt-2 mt-xl-0"> Edit</a>
                <form class="d-inline" action="{{ route('dropzone.destroy', 1) }}" method="DELETE">
                    <button type="submit" class="btn btn-danger btn-sm mt-2 mt-xl-0"> Delete</button>
                </form>  
            </td>
        </tr>        
    </tbody>
</table>