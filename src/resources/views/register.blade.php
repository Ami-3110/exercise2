<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/register.css') }}" />

</head>

<body>

<header class="header">
    <div class="header__title">mogitate</div>
</header>

<main>

        <div class="register__content">
            <div class="registration__title">商品登録</div>
        <form class="registration__form" action="/products/register/" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">商品名</span><span class="form__label--required">必須</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="name" placeholder="商品名を入力" value="" />
                </div>
                <div class="form__error">
                @error('name')
                {{ $message }}
                @enderror
                </div>
            </div>

            <div class="form__group-title">
                <span class="form__label--item">値段</span><span class="form__label--required">必須</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="price" placeholder="値段を入力" value="" />
               </div>
                <div class="form__error">
                @error('price')
                {{ $message }}
                @enderror
                </div>
            </div>

            <div class="form__group-title">
                <span class="form__label--item">商品画像</span><span class="form__label--required">必須</span>
            </div>
            <div class="form__group-content">
                <div id="list" class="form__image-preview"></div>
                <div class="form__select--button">
                    <input type="file" id="product_image" name="image" placeholder="ファイルを選択" value=""/>
                </div>
                <div class="form__error">
                @error('image')
                {{ $message }}
                @enderror
                </div>
            </div>

            <div class="form__group-title">
                <span class="form__label--item">季節</span><span class="form__label--required">必須</span><span class="form__label--multi">複数選択可</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--checkbox">
                    @foreach($seasons as $season)
                        <input type="checkbox" id="season_{{ $season->id }}" value="{{ $season->id }}" name="season[]" /><label for="season_{{ $season->id }}">{{ $season->name }}</label>
                        <span class="season__gap"></span>
                    @endforeach

                </div>
                <div class="form__error">
                @error('season')
                {{ $message }}
                @enderror
                </div>
            </div>        

            <div class="form__group-title">
                <span class="form__label--item">商品説明</span><span class="form__label--required">必須</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--textarea">
                    <textarea name="description" placeholder="商品の説明を入力" value=""></textarea>
                </div>
                <div class="form__error">
                @error('description')
                {{ $message }}
                @enderror
                </div>
            </div>

            <div class="form__button">
                <button class="form__button-return" type="button" onClick="history.back()">戻る</button>
                <button class="form__button-submit" type="submit">登録</button>
            </div>
        </form>
        </div>
    </main>
     <!-- こちらから下は教材の範囲外のリアルタイム画像表示になります -->
     <script>
        document.addEventListener("DOMContentLoaded", function () {
            const input = document.getElementById('product_image');
            const preview = document.getElementById('list');
    
            input.addEventListener('change', function (event) {
                preview.innerHTML = ''; // プレビューを初期化
                const files = event.target.files;
    
                if (files.length > 0) {
                    Array.from(files).forEach(file => {
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            const img = document.createElement('img');
                            img.src = e.target.result;
                            img.classList.add('reader_image'); // CSSでサイズ調整などするなら
                            preview.appendChild(img);
                        }
                        reader.readAsDataURL(file);
                    });
                }
            });
        });
    </script>
    
</body>
</html>
