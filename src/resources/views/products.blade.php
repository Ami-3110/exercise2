<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/products.css') }}" />

</head>
<body>
<header class="header">
    <div class="header__title">mogitate</div>
</header>

<main>
    <div class="grid__parent">
        <div class="header__bar">
            <div class="header__bar-title">商品一覧</div>
            <button class="header__bar-add">+商品を追加</button>
        </div>

        <aside class="search">
            <form class="search-form" action="/products/search" method="get">
        @csrf
        @method('search')
            <div class="search-form__item">
                <input class="search-form__item-input" type="text" name="keyword" placeholder="商品名で検索" value="{{ old('keyword') }}"/>
                <button class="search__button-submit" type="submit">検索</button>

                <div class="search__form-sub">価格順で表示</div>
                <select class="search-form__item-price" name="gender">
                    <option value="">価格で並べ替え</option>
                    <option name ="gender" value="1"></option>
                    <option name ="gender" value="2"></option>
                    <option name ="gender" value="3"></option>
                </select>
            </form>
        </aside>

<article class="products__first-row">
    <div class="flex__item">
        <div class="product__card">
            <div class="card__img">
                <img src="img/kiwi.png" alt="" />
            </div>
            <div class="card__content">
                <div class="card__content-name">名前</div>
                <div class="card__content-price">値段</div>
            </div>
        </div>
        <div class="product__card">
            <div class="card__img">
                <img src="img/strawberry.png" alt="" />
            </div>
            <div class="card__content">
                <div class="card__content-name">名前</div>
                <div class="card__content-price">値段</div>
            </div>
        </div>
         <div class="product__card">
            <div class="card__img">
                <img src="img/orange.png" alt="" />
            </div>
            <div class="card__content">
                <div class="card__content-name">名前</div>
                <div class="card__content-price">値段</div>
            </div>
        </div>
    </div>
    <article class="products__second-row">
    <div class="flex__item">
         <div class="product__card">
            <div class="card__img">
                <img src="img/watermelon.png" alt="" />
            </div>
            <div class="card__content">
                <div class="card__content-name">名前</div>
                <div class="card__content-price">値段</div>
            </div>
        </div>
         <div class="product__card">
            <div class="card__img">
                <img src="img/peach.png" alt="" />
            </div>
            <div class="card__content">
                <div class="card__content-name">名前</div>
                <div class="card__content-price">値段</div>
            </div>
        </div>
         <div class="product__card">
            <div class="card__img">
                <img src="img/muscut.png" alt="" />
            </div>
            <div class="card__content">
                <div class="card__content-name">名前</div>
                <div class="card__content-price">値段</div>
            </div>
        </div>
    </div>
</article>>  

</div>
</main>
</body>
</html>