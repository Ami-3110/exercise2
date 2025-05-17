<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Details</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}" />

</head>
<body>
<header class="header">
    <div class="header__title">mogitate</div>
</header>

<main>
    <form class="detail" action="/products/{$productId}" method="get" enctype="multipart/form-data">
    @csrf
    <div class="main__desplay">
        <div class="breadcrumbs"><a class="toppage" href="/products">商品一覧</a> > {{-- $product['name'] --}}</div>
    </div>
        <form class="update__form" action="/products/{$productId}/update" method="post" enctype="multipart/form-data">
        @method('patch')
        @csrf
        <div class="detail__content">
        <div class="parent">
            <div class="form__group-img">
                <img class="image" src="{{ asset('storage/'. $product['image']) }}" alt="" />
                <div class="form__select--button">
                <input type="file" name="image" placeholder="ファイルを選択" value="{{ $product['image'] }}"/>
                </div>
                <div class="form__error">
                @error('image')
                {{ $message }}
                @enderror
                </div>
            </div>
            <div class="form__group-upper">
                <div class="form__group-title">
                    <span class="form__label--item">商品名</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="text" name="name"  value="{{ $product['name']}}" />
                    </div>
                    <div class="form__error">
                    @error('name')
                    {{ $message }}
                    @enderror
                    </div>
                </div>

                <div class="form__group-title">
                    <span class="form__label--item">値段</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="text" name="price" value="{{ $product['price']}}" />
                    </div>
                    <div class="form__error">
                    @error('price')
                    {{ $message }}
                    @enderror
                    </div>
                </div>               

                <div class="form__group-title">
                    <span class="form__label--item">季節</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--checkbox">
                        <label><input class="visibility-hidden" type="checkbox" name="season_id" value="1" /><span class="radio-text">春<span class="season__gap"></span></span></label>
                        <label><input class="visibility-hidden" type="checkbox" name="season_id" value="" /><span class="radio-text">夏<span class="season__gap"></span></span></label>
                        <label><input class="visibility-hidden" type="checkbox" name="season_id" value="" /><span class="radio-text">秋<span class="season__gap"></span></span></label>
                        <label><input class="visibility-hidden" type="checkbox" name="season_id" value="" /><span class="radio-text">冬<span class="season__gap"></span></span></label>
                    </div>
                    <div class="form__error">
                    @error('season')
                    {{ $message }}
                    @enderror
                    </div>
                </div>        
            </div>
        </div>
            <div class="form__group-title">
                <span class="form__label--item">商品説明</span>
            </div>
            <div class="form__group-content">
                <div class="form__textarea">
                    <textarea class="form__input--textarea" name="description" value="">{{ $product['description']}}</textarea>
                </div>
                <div class="form__error">
                @error('discription')
                {{ $message }}
                @enderror
                </div>
            </div>
            <div class="form__button">
                <button class="form__button-return" type="button" onClick="history.back()">戻る</button>
                <input type="hidden" name="product_id" value="{{ $product['id'] }}" />
                <button class="form__button-submit" type="submit">変更を保存</button>
            </div>
        </form>
        <form class="delete-form" action="/products/{productId}/delete" method="post">
                @method('DELETE') 
                @csrf
                <input type="hidden" name="id" value="{{ $product['id'] }}" />
                <button class="form__button-delete" type="submit">
                🗑️</button>
        </form>
        </div>
    </form>
</main>
</body>
</html>