<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
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
            <button class="header__bar-add"><a href="/products/register">+商品を追加</a></button>
        </div>

        <aside class="search">
        <form class="search-form" action="/products/search" method="POST">
        @csrf
            <div class="search-form__product">
                <input class="search-form__product-input" type="text" name="keyword" placeholder="商品名で検索" value="{{ old('keyword') }}"/>
                <button class="search__button-submit" type="submit">検索</button>

                <div class="search__form-sub">価格順で表示</div>
                <select class="search-form__product-price" name="price">
                    <option value="">価格で並べ替え</option>
                    <option name ="price" value="asc">高い順に表示</option>
                    <option name ="price" value="desc">低い順に表示</option>
                </select>
            </form>
            @if(@isset($sort)&& $sort != "")
            <div class="sort_contents">
                <p class="searched_data">{{$sort}}</p>
                <div class="close-content">
                    <a href="/products">
                        <img src="{{ asset('/images/close-icon.png') }}" alt="閉じるアイコン" class="img-close-icon" />
                    </a>
                </div>
            </div>
            @endif
        </aside>

<article class="products__display">
    <form class="cards" action="/products" method="GET">
    @csrf
    <div class="flex__product">
        @foreach ($products as $product)
        <a href="/products/{{ $product->id }}">
        <div class="product__card">
                <div class="card__img">
                    <img class="" src="{{ asset('storage/images/'. $product['image']) }}" alt="" />
                </div>
                <div class="card__content">
                    <div class="card__content-name">{{ $product['name'] }}</div>
                    <div class="card__content-price">{{ $product['price'] }}</div>
                </div>
        </div>
        </a>
        @endforeach
    </div>
    </form>
</article>
<footer class="footer">
    <div class="pagination-content">
        <div class="d-flex justify-content-center">{{-- $products->links --}}</div>
    </div>
</footer>
</main>
</body>
</html>