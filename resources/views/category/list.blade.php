<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Owner</th>
            <th>Control</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        @forelse(App\Category::with('user')->get() as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->title }}</td>
            <td>{{ $category->user->name }}</td>
            <td>
                <a href="{{ route('category.edit', $category->id) }}" class="btn btn-outline-primary">
                    Edit
                </a>
                <form action="{{ route('category.destroy', $category->id) }}" method="post" class="d-inline-block">
                    @csrf
                    @method('delete')
                    <button class="btn btn-outline-danger" onclick="return confirm('Are U Sure to Delete {{ $category->title }} Category ?')">Delete</button>
                </form>
            </td>
            <td>
                <i class="feather-calendar"></i>
                <span class="small">{{ $category->created_at->format("d-m-Y") }}</span>
                <br>
                <i class="feather-clock"></i>
                <span class="small">{{ $category->created_at->format("h:i A") }}</span>
            </td>
        </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center p-5">There is no Category</td>
            </tr>
        @endforelse
    </tbody>
</table>