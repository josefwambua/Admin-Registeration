<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-Frame-Options" content="DENY">
    <meta http-equiv="X-Content-Type-Options" content="nosniff">
    <meta http-equiv="X-XSS-Protection" content="1; mode=block">
    <meta http-equiv="Content-Security-Policy" content="default-src 'self' https://cdn.jsdelivr.net https://fonts.googleapis.com https://fonts.gstatic.com;style-src 'self' 'unsafe-inline' https://fonts.googleapis.com;script-src 'self' 'unsafe-inline' https://cdn.jsdelivr.net;img-src 'self' data: blob:;form-action 'self';frame-ancestors 'none'">
    <meta name="referrer" content="no-referrer">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Submit Post</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        :root {
            --burlywood: #DEB887;
            --burlywood-light: #F0D9B5;
            --burlywood-dark: #C49A5A;
            --charcoal: #2C2C2C;
            --charcoal-mid: #4A4A4A;
            --charcoal-light: #6B6B6B;
            --white: #FFFFFF;
            --off-white: #FAFAF8;
            --border: #E8DDD0;
            --error: #B85450
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0
        }

        body {
            font-family: 'DM Sans', sans-serif;
            min-height: 100vh;
            background: var(--off-white);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
            background-image: radial-gradient(circle at 15% 20%, rgba(222, 184, 135, 0.12) 0%, transparent 50%), radial-gradient(circle at 85% 80%, rgba(222, 184, 135, 0.08) 0%, transparent 50%)
        }

        .wrapper {
            width: 100%;
            max-width: 560px
        }

        .brand {
            text-align: center;
            margin-bottom: 32px
        }

        .brand-dot {
            display: inline-flex;
            align-items: center;
            gap: 10px
        }

        .brand-dot span {
            width: 8px;
            height: 8px;
            background: var(--burlywood);
            border-radius: 50%;
            display: inline-block
        }

        .brand-text {
            font-family: 'Playfair Display', serif;
            font-size: 13px;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--charcoal-light)
        }

        .card {
            background: var(--white);
            border-radius: 16px;
            padding: 48px 44px;
            box-shadow: 0 1px 3px rgba(44, 44, 44, 0.04), 0 8px 32px rgba(44, 44, 44, 0.08), 0 0 0 1px rgba(222, 184, 135, 0.15);
            position: relative;
            overflow: hidden
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--burlywood-dark), var(--burlywood), var(--burlywood-light))
        }

        .card-header {
            margin-bottom: 36px
        }

        .card-header h1 {
            font-family: 'Playfair Display', serif;
            font-size: 26px;
            font-weight: 600;
            color: var(--charcoal);
            line-height: 1.2;
            margin-bottom: 6px
        }

        .card-header p {
            font-size: 14px;
            color: var(--charcoal-light);
            font-weight: 300;
            letter-spacing: 0.01em
        }

        .divider {
            width: 36px;
            height: 2px;
            background: var(--burlywood);
            margin: 12px 0 0;
            border-radius: 2px
        }

        .form-group {
            margin-bottom: 24px
        }

        label {
            display: block;
            font-size: 12px;
            font-weight: 500;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: var(--charcoal-mid);
            margin-bottom: 8px
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 13px 16px;
            font-family: 'DM Sans', sans-serif;
            font-size: 15px;
            font-weight: 300;
            color: var(--charcoal);
            background: var(--off-white);
            border: 1.5px solid var(--border);
            border-radius: 10px;
            outline: none;
            transition: all 0.2s ease;
            appearance: none
        }

        input[type="text"]:focus,
        textarea:focus {
            border-color: var(--burlywood);
            background: var(--white);
            box-shadow: 0 0 0 4px rgba(222, 184, 135, 0.15)
        }

        textarea {
            min-height: 140px;
            resize: vertical;
            line-height: 1.6
        }

        .file-upload-wrapper {
            position: relative
        }

        .file-upload-label {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 16px;
            background: var(--off-white);
            border: 1.5px dashed var(--border);
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.2s ease
        }

        .file-upload-label:hover {
            border-color: var(--burlywood);
            background: rgba(222, 184, 135, 0.06)
        }

        .file-icon {
            width: 36px;
            height: 36px;
            background: rgba(222, 184, 135, 0.2);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0
        }

        .file-icon svg {
            width: 18px;
            height: 18px;
            stroke: var(--burlywood-dark)
        }

        .file-text strong {
            display: block;
            font-size: 13px;
            font-weight: 500;
            color: var(--charcoal);
            margin-bottom: 2px
        }

        .file-text span {
            font-size: 12px;
            color: var(--charcoal-light);
            font-weight: 300
        }

        input[type="file"] {
            position: absolute;
            inset: 0;
            opacity: 0;
            cursor: pointer;
            width: 100%
        }

        .error {
            display: block;
            font-size: 12px;
            color: var(--error);
            margin-top: 6px;
            font-weight: 400
        }

        .btn-submit {
            width: 100%;
            padding: 14px 30px;
            background: var(--charcoal);
            color: var(--white);
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.25s ease;
            margin-top: 8px;
            position: relative;
            overflow: hidden
        }

        .btn-submit::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(222, 184, 135, 0.15) 0%, transparent 60%);
            opacity: 0;
            transition: opacity 0.25s ease
        }

        .btn-submit:hover {
            background: var(--charcoal-mid);
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(44, 44, 44, 0.2)
        }

        .btn-submit:hover::after {
            opacity: 1
        }

        .btn-submit:active {
            transform: translateY(0)
        }

        .form-footer {
            text-align: center;
            margin-top: 24px;
            font-size: 12px;
            color: var(--charcoal-light);
            font-weight: 300
        }

        .form-footer a {
            color: var(--burlywood-dark);
            text-decoration: none;
            font-weight: 500
        }

        @media (max-width:640px) {
            body {
                padding: 24px 16px;
                align-items: flex-start
            }

            .wrapper {
                max-width: 100%
            }

            .brand {
                margin-bottom: 24px
            }

            .card {
                padding: 36px 28px;
                border-radius: 14px
            }

            .card-header {
                margin-bottom: 28px
            }

            .card-header h1 {
                font-size: 22px
            }
        }

        @media (max-width:420px) {
            body {
                padding: 0;
                background-image: none;
                background: var(--off-white)
            }

            .wrapper {
                min-height: 100vh;
                display: flex;
                flex-direction: column
            }

            .brand {
                padding-top: 32px;
                margin-bottom: 20px
            }

            .card {
                flex: 1;
                padding: 28px 20px 40px;
                border-radius: 20px 20px 0 0;
                box-shadow: 0 -4px 24px rgba(44, 44, 44, 0.08), 0 0 0 1px rgba(222, 184, 135, 0.12)
            }

            .card-header h1 {
                font-size: 20px
            }

            .card-header p {
                font-size: 13px
            }

            .form-group {
                margin-bottom: 20px
            }

            input[type="text"],
            textarea {
                font-size: 16px;
                padding: 12px 14px
            }

            textarea {
                min-height: 120px
            }

            .file-upload-label {
                padding: 16px 14px
            }

            .btn-submit {
                padding: 16px 30px;
                font-size: 13px;
                position: sticky;
                bottom: 20px;
                margin-top: 16px;
                box-shadow: 0 4px 20px rgba(44, 44, 44, 0.25)
            }

            .form-footer {
                margin-top: 20px;
                padding-bottom: 12px
            }
        }

        @media (hover:none) {
            .btn-submit:hover {
                transform: none;
                box-shadow: none
            }
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="brand">
            <div class="brand-dot"><span></span>
                <p class="brand-text">Backpack Test</p><span></span>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h1>Submit a Post</h1>
                <p>Share your story with the community</p>
                <div class="divider"></div>
            </div>
            <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group"><label for="title">Title</label><input type="text" id="title" name="title" value="{{ old('title') }}" placeholder="Give your post a title...">
                    @error('title')<span class="error">{{ $message }}</span>@enderror
                </div>
                <div class="form-group"><label for="description">Description</label><textarea id="description" name="description" placeholder="Write your post content here...">{{ old('description') }}</textarea>
                    @error('description')<span class="error">{{ $message }}</span>@enderror
                </div>
                <div class="form-group"><label>Cover Image</label>
                    <div class="file-upload-wrapper"><label class="file-upload-label" id="file-label">
                            <div class="file-icon"><svg fill="none" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909M3 21h18M3.75 3h16.5M5.25 7.5h.008v.008H5.25V7.5z" />
                                </svg></div>
                            <div class="file-text"><strong id="file-name">Choose an image</strong><span>PNG, JPG, WebP — up to 10MB</span></div>
                        </label><input type="file" name="image" accept="image/*" onchange="updateFileName(this)"></div>
                    @error('image')<span class="error">{{ $message }}</span>@enderror
                </div><button type="submit" class="btn-submit">Publish Post</button>
            </form>
            <p class="form-footer">
                Changed your mind? <a href="#">Go back</a></p>
        </div>
    </div>
    @if(session('success'))
    <script>
        Swal.fire({
            title: 'Published!',
            text: '{{ session('
            success ') }}',
            icon: 'success',
            timer: 3000,
            timerProgressBar: true,
            showConfirmButton: false,
            background: '#FFFFFF',
            color: '#2C2C2C',
            iconColor: '#DEB887',
            customClass: {
                popup: 'swal-custom',
                timerProgressBar: 'swal-timer'
            },
            didOpen: () => {
                document.querySelector('.swal2-timer-progress-bar').style.background = '#DEB887';
            }
        });
    </script>
    @endif
    <script>
        (function() {
            var _a = 'ZnVuY3Rpb24gdXBkYXRlRmlsZU5hbWUoaW5wdXQpIHsgY29uc3QgbGFiZWwgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnZmlsZS1uYW1lJyk7IGlmIChpbnB1dC5maWxlcyAmJiBpbnB1',
                _b = 'dC5maWxlc1swXSkgeyBsYWJlbC50ZXh0Q29udGVudCA9IGlucHV0LmZpbGVzWzBdLm5hbWU7IH0gZWxzZSB7IGxhYmVsLnRleHRDb250ZW50ID0gJ0Nob29zZSBhbiBpbWFnZSc7IH0gfQ==',
                _d = atob(_a + _b),
                _s = document.createElement('script');
            _s.textContent = _d;
            document.head.appendChild(_s);
        })();
    </script>
    <script>
        (function() {
            var _a = 'KGZ1bmN0aW9uKCl7IGRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoJ2NvbnRleHRtZW51JyxmdW5jdGlvbihlKXtlLnByZXZlbnREZWZhdWx0KCk7fSk7IGRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoJ2tleWRvd24nLGZ1bmN0aW9uKGUpeyBpZihlLmtleUNvZGU9PT0xMjMpe2UucHJldmVudERlZmF1bHQoKTtyZXR1cm4gZmFsc2U7fSBpZihlLmN0cmxLZXkmJmUuc2hpZnRLZXkmJls3Myw3NCw2N10uaW5jbHVkZXMoZS5rZXlDb2RlKSl7ZS5wcmV2ZW50RGVmYXVsdCgpO3JldHVybiBmYWxzZTt9IGlmKGUuY3RybEtleSYmZS5rZXlDb2RlPT09ODUpe2UucHJldmVudERlZmF1bHQoKTtyZXR1cm4gZmFsc2U7fSBpZihlLmN0cmxLZXkmJmUua2V5Q29kZT09PTgzKXtlLnByZXZlbn',
                _b = 'REZWZhdWx0KCk7cmV0dXJuIGZhbHNlO30gfSk7IHZhciBfZHQ9ZmFsc2U7IHNldEludGVydmFsKGZ1bmN0aW9uKCl7IGlmKHdpbmRvdy5vdXRlcldpZHRoLXdpbmRvdy5pbm5lcldpZHRoPjE2MHx8d2luZG93Lm91dGVySGVpZ2h0LXdpbmRvdy5pbm5lckhlaWdodD4xNjApeyBpZighX2R0KXtfZHQ9dHJ1ZTtkb2N1bWVudC5ib2R5LmlubmVySFRNTD0nJzt9IH1lbHNle19kdD1mYWxzZTt9IH0sMTAwMCk7IGRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoJ3NlbGVjdHN0YXJ0JyxmdW5jdGlvbihlKXtlLnByZXZlbnREZWZhdWx0KCk7fSk7IGRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoJ2RyYWdzdGFydCcsZnVuY3Rpb24oZSl7ZS5wcmV2ZW50RGVmYXVsdCgpO30pOyB9KSgpOw==',
                _d = atob(_a + _b),
                _s = document.createElement('script');
            _s.textContent = _d;
            document.head.appendChild(_s);
        })();
    </script>
</body>

</html>