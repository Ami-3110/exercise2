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
        <form class="search-form" action="/products/search" method="get">
        @csrf
        @method('search')
            <div class="search-form__item">
                <input class="search-form__item-input" type="text" name="keyword" placeholder="商品名で検索" value="{{ old('keyword') }}"/>
                <button class="search__button-submit" type="submit">検索</button>

                <div class="search__form-sub">価格順で表示</div>
                <select class="search-form__item-price" name="price">
                    <option value="">価格で並べ替え</option>
                    <option name ="price" value="asc">高い順に表示</option>
                    <option name ="price" value="desc">低い順に表示</option>
                </select>
            </form>
        </aside>

<article class="products__display">
    <form class="cards" action="/products" method="get">
    @csrf
    <div class="flex__item">
        @foreach ($items as $item)
        <a href="/products/{{ $item['id']}}">
        <div class="product__card">
                <div class="card__img">
                    <img class="" src="{{ asset('storage/'. $item['image']) }}" alt="" />
                </div>
                <div class="card__content">
                    <div class="card__content-name">{{ $item['name'] }}</div>
                    <div class="card__content-price">{{ $item['price'] }}</div>
                </div>
        </div>
        </a>
        @endforeach
    </div>
    </form>
</article>
<footer class="footer">
    <div class="pagination">
        <div class="d-flex justify-content-center">{{ $items->links() }}</div>
    </div>
</footer>
</main>
</body>
</html>