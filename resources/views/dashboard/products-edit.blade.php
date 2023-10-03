@extends('dashboard.layout')

@section('title')
Редактировать товар
@endsection

@section('dashboardcontent')

<div class="dashboard-content">
    
  @if($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form class="form" action="{{ route('products-update', $product->id) }}" method="post" enctype="multipart/form-data">
    <div class="form-group mb-3">
      <label for="title" class="label-text">Название</label>
      <input type="text" class="form-control" name="title" id="title" maxlength="200" required value="{{ $product->title }}">
    </div>
    <!-- 
    <div class="form-group mb-3">
      <label for="text">Описание</label>
      <textarea class="form-control" name="text" id="text">{{ $product->text }}</textarea>
    </div>
     -->
     <!-- 
    <div class="form-group mb-3">
      <div class="label-text">Категория</div>
      <select name="category" id="category" class="form-select mt-1">
        
      </select>
    </div>
     -->
    <div class="form-group mb-3">
      <div class="image-preview">
        <img src="{{ asset('storage/uploads/products/' . $product->image) }}" alt="">
      </div>
    </div>
    <div class="form-group mb-3">
      <div class="label-text">Изображение</div>
      <input type="file" name="input-main-file" id="input-main-file" class="inputfile" accept="image/jpeg,image/png">
      <label for="input-main-file" class="custom-inputfile-label">Выберите файл</label>
      <span class="namefile main-file-text">Файл не выбран</span>
    </div>
    <div class="form-group">
      <div class="image-preview gallery-image-preview">
        <!-- 
        @ if($product->galleries->count() > 0)
          @ foreach($product->galleries as $gl)
            <img src="{{-- asset('storage/uploads/products/' . $gl->image) --}}" alt="">
          @ endforeach
          <div class="gallery-delete">Удалить галерею</div>
        @ endif
         -->
      </div>
    </div>
    <div class="form-group mb-5">
      <div class="label-text">Галерея</div>
      <input type="file" name="input-gallery-file[]" id="input-gallery-file" class="inputfile" accept="image/jpeg,image/png" multiple value="">
      <label for="input-gallery-file" class="custom-inputfile-label">Выберите файлы</label>
      <span class="namefile gallery-file-text">Файлы не выбраны</span>
    </div>

    <input type="hidden" name="id" value="{{ $product->id }}">
    <input type="hidden" name="delete_gallery" value="">

    @csrf
    <button type="submit" class="btn btn-primary">Обновить</button>
  </form>

</div>

<script>
  const menuItem = 0;
</script>

<script>
  // Выбор файлов Галерея
  let inputGalleryFile = document.querySelector('#input-gallery-file'),
      galleryFileText = document.querySelector('.gallery-file-text');

  inputGalleryFile.onchange = function() {
    let filesName = '';
    for (let i = 0; i < this.files.length; i++) {
      filesName += this.files[i].name + ' ';
    }
    galleryFileText.innerHTML = filesName;
  }

  // Удаление всех файлов из галереи
  let galleryDelete = document.querySelector('.gallery-delete'),
      galleryImagePreview = document.querySelector('.gallery-image-preview'),
      inputDeleteGallery = document.querySelector('[name="delete_gallery"]');

  galleryDelete.onclick = function() {
    galleryDelete.classList.add('hidden');
    galleryImagePreview.innerHTML = '';
    inputDeleteGallery.value = 1;
  }
</script>

@endsection

@section('script')
  <!-- <script src="https://cdn.tiny.cloud/1/5bpy3e636t6os710b6abr6w7zmyr1d77c4px4vl6qi628r67/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> -->
  <!-- <script src="{{-- asset('/js/tiny-file-upload.js') --}}"></script> -->
@endsection