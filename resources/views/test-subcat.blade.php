<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
    {{ $categories[0]->title }}

    @foreach($categories as $category)
      <div>
        <a href="/category/{{ $category->slug }}">{{ $category->title }}({{ $category->id }})</a>

        @foreach($category->children as $child)

          <div style="margin-left: 20px">
              <a href="{{ $category->slug }}/{{ $child->slug }}">{{ $child->title }}({{ $child->id }})</a>
          </div>

        @endforeach

      </div>
    @endforeach
  
</body>
</html>