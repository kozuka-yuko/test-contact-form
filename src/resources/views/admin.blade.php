@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
@endsection

@section('button')
<form action="/logout" class="form-logout" method="post">
    @csrf
    <button class="header__button-logout" type="submit">logout</button>
</form>
@endsection

@section('content')
<div class="admin__content">
    <div class="admin__heading">
        <h2>Admin</h2>
    </div>
    <div class="search-form">
        <form action="/admin" class="form" method="post">
            @csrf
            <div class="search-form__inner">
                <input type="text" class="form__inner-input" placeholder="名前やメールアドレスを入力してください">
                <select name="gender">
                    <option disabled selected>性別</option>
                    <option value="male">男性</option>
                    <option value="female">女性</option>
                    <option value="other">その他</option>
                </select>]
                <select name="contact-type">
                    <option disabled selected>お問い合わせの種類</option>
                    <option value="{{ $contact['categry_id'] }}">{{ $contact['contact-type'] }}</option>
                </select>
                <input class="birth" type="date" name="birth" />
            </div>
            <div class="search-form__button">
                <button class="search-form__button-submit" type="submit">検索</button>
            </div>
        </form>
        <form action="/admin" class="reset-form" method="get">
            @csrf
            <div class="reset-form__button">
                <button class="reset-form__button-reset" type="reset">リセット</button>
            </div>
        </form>
    </div>
    <form action="" class="export-form" method="post">
        @csrf
        <div class="admin__button">
            <div class="export__button">
                <button type="submit" class="export__button-submit">エクスポート</button>
            </div>
            <div class="paginate__button">
                <button type="submit" class="paginate__button-submit">{{ $contact->links() }}</button>
            </div>
        </div>
    </form>
    <div class="admin-table">
        <table class="admin-table__inner">
            <tr class="admin-table__row">
                <th class="admin-table__heading">
                    <span>お名前</span>
                    <span>性別</span>
                    <span>メールアドレス</span>
                    <span>お問い合わせの種類</span>
                </th>
            </tr>
            @foreach ($contacts as $contact)
            <tr class="admin-table__row">
                <td class="admin-table__text">
                    <input type="text" name="name" value="{{ $contact['name'] }}" />
                </td>
                <td class="admin-table__text">
                    <input type="text" name="gender" value="{{ $contact['gender'] }}" />
                </td>
                <td class="admin-table__text">
                    <input type="text" name="email" value="{{ $contact['email'] }}" />
                </td>
                <td class="admin-table__text">
                    <input type="text" name="contact-type" value="{{ $contact['contact-type'] }}" />
                </td>
            </tr>
            @endforeach
        </table>

        <button class="detail__button-submit" id="openModalBtn" type="submit">詳細</button>
        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <p class="title">お名前</p>
                <p class="cntent">{{ $contact['first_name']['last_name'] }}</p>
                <p class="title">性別</p>
                <p class="cntent">{{ $contact['gender'] }}</p>
                <p class="title">メールアドレス</p>
                <p class="cntent">{{ $contact['email'] }}</p>
                <p class="title">電話番号</p>
                <p class="cntent">{{ $contact['tel'] }}</p>
                <p class="title">住所</p>
                <p class="cntent">{{ $contact['address'] }}</p>
                <p class="title">建物名</p>
                <p class="cntent">{{ $contact['building'] }}</p>
                <p class="title">お問い合わせの種類</p>
                <p class="cntent">{{ $contact['content']}}</p>
                <p class="title">お問い合わせ内容</p>
                <p class="cntent">{{ $contact['detail'] }}</p>
            </div>
            <form class="delete-form" action="/categories/delete" method="post">
                @method('DELETE') @csrf
                <div class="delete-form__button">
                    <input type="hidden" name="id" value="{{ $contact['id'] }}">
                    <button class="delete-form__button-submit" type="submit">
                        削除
                    </button>
                </div>
            </form>
        </div>
        <script src="{{ asset('js/script.js') }}"></script>
    </div>
</div>


@endsection