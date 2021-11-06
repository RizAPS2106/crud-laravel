<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- icon --}}
    <link rel="icon" href="img/book.png" type="image/gif">

    {{-- Bootstrap css --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    {{-- Bootstrap js --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="fontawesome/css/all.css">

    <title>Pustaka</title>
</head>
<body>

    @include('layouts/navbar')
    
    @if (Session::has('success'))
        <div class="container-fluid">
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                <strong>{{ Session::get('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    @if (Session::has('primary'))
        <div class="container-fluid">
            <div class="alert alert-primary alert-dismissible fade show mt-3" role="alert">
                <strong>{{ Session::get('primary') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    @if (Session::has('danger'))
        <div class="container-fluid">
            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                <strong>{{ Session::get('danger') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    
    <div>
        @yield('content')
    </div>
</body>
</html>

<!-- Gambar Preview Script -->
<script>
    function tampilkanPreview(gambar,idpreview){
        var gb = gambar.files;
        for (var i = 0; i < gb.length; i++){
            var gbPreview = gb[i];
            var imageType = /image.*/;
            var preview=document.getElementById(idpreview);            
            var reader = new FileReader();
            
            if (gbPreview.type.match(imageType)) {
                preview.file = gbPreview;
                reader.onload = (function(element) { 
                    return function(e) { 
                        element.src = e.target.result; 
                    }; 
                })(preview);
                reader.readAsDataURL(gbPreview);
            }else{
                preview.file = 'gbPreview';
                reader.onload = (function(element) { 
                    return function(e) { 
                        element.src = e.target.result; 
                    }; 
                })(preview);
                reader.readAsDataURL(gbPreview);
                alert('Gambar yang dipilih tidak sesuai');
                $('#upload_gambar').val('');
            }
           
        }    
    }
</script>