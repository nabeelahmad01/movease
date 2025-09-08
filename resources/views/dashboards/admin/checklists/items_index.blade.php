@extends('dashboards.layouts.app')
@section('title','Checklist Items | Admin')
<!-- @section('page_title','Checklist Items') -->
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h3>Checklist Items</h3>
  <a href="{{ route('admin.checklist-items.create') }}" class="btn btn-primary">Create</a>
</div>
<table class="table table-bordered table-hover">
  <thead class="table-light"><tr><th>Category</th><th>Heading</th><th>Position</th><th>Actions</th></tr></thead>
  <tbody>
    @foreach($items as $it)
    <tr>
      <td>{{ $it->category->name ?? '-' }}</td>
      <td>{{ $it->heading }}</td>
      <td>{{ $it->position }}</td>
      <td class="d-flex gap-2">
        <a href="{{ route('admin.checklist-items.edit',['checklist_item'=>$it->id]) }}" class="btn btn-sm btn-outline-primary">Edit</a>
        <form method="POST" action="{{ route('admin.checklist-items.destroy',['checklist_item'=>$it->id]) }}" onsubmit="return confirm('Delete?');">@csrf @method('DELETE')<button class="btn btn-sm btn-outline-danger">Delete</button></form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{ $items->links() }}
@endsection
