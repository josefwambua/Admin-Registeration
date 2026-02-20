<!DOCTYPE html>
<html>
<head>
    <title>Submit Post</title>
    <style>
        * { box-sizing: border-box; }
        body { 
            font-family: Arial, sans-serif; 
            max-width: 600px; 
            margin: 50px auto; 
            padding: 20px;
            background: #f5f5f5;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 { color: #333; margin-bottom: 25px; }
        .form-group { margin-bottom: 20px; }
        label { 
            display: block; 
            margin-bottom: 8px; 
            font-weight: bold;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        textarea { min-height: 150px; }
        button { 
            background: #007bff; 
            color: white; 
            padding: 12px 30px; 
            border: none; 
            border-radius: 4px; 
            cursor: pointer;
            width: 100%;
        }
        button:hover { background: #0056b3; }
        .alert { 
            padding: 15px; 
            margin-bottom: 20px; 
            background: #d4edda; 
            color: #155724; 
            border-radius: 4px; 
        }
        .error { color: #dc3545; font-size: 13px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Submit a Post</h1>

        @if(session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" value="{{ old('title') }}">
                @error('title')<span class="error">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description">{{ old('description') }}</textarea>
                @error('description')<span class="error">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" accept="image/*">
                @error('image')<span class="error">{{ $message }}</span>@enderror
            </div>

            <button type="submit">Submit Post</button>
        </form>
    </div>
</body>
</html>