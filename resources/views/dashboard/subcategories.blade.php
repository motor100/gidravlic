@extends('dashboard.layout')

@section('title', 'Подкатегории')

@section('dashboardcontent')

<div class="dashboard-content">

  <form class="form mb-5" action="#" method="get">
    <div class="form-group mb-3">
      <label for="search_query">Поиск</label>
      <input type="text" class="form-control input-number" name="search_query" id="search_query" maxlength="200" required>
    </div>
    <button type="submit" class="btn btn-primary">Найти</button>
  </form>

  <table class="table table-striped">
    <thead>
      <tr>
        <th class="number-column">№</th>
        <th>Название</th>
        <th class="button-column"></th>
      </tr>
    </thead>
    <tbody>
      @foreach($subcategories as $subcat)
        <tr>
          <td>{{ $loop->index + 1 }}</td>
          <td>{{ $subcat->title }}</td>
          <td class="table-button">
            <a href="#" class="btn btn-success" target="_blank">
              <i class="fas fa-eye"></i>
            </a>
            <a href="#" class="btn btn-primary">
              <i class="fas fa-pen"></i>
            </a>
            <form class="form" action="#" method="get">
              @csrf
              <button type="submit" class="btn btn-danger">
                <i class="fas fa-trash"></i>
              </button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

</div>

<script>
  const menuItem = 4;
</script>
@endsection

@section('script')
  <script src="https://cdn.tiny.cloud/1/5bpy3e636t6os710b6abr6w7zmyr1d77c4px4vl6qi628r67/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script src="{{ asset('adminpanel/js/tiny-file-upload.js') }}"></script>
@endsection