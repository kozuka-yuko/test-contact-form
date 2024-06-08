@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('content')

<div class="contact-form__content">
    <div class="contact-form__heading">
        <h2>Contact</h2>
    </div>
    <form action="/contacts/confirm" class="form" method="post">
        @csrf
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">
                    お名前
                </span>
                <span class="form__label--required">
                    ※
                </span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="first_name" placeholder="例:山田" value="{{ old('first_name') }}" />
                    <input type="text" name="last_name" placeholder="例:太郎" value="{{ old('last_name') }}" />
                </div>
                <div class="form__error">
                    <!--ここにerrorバリデーションの記述-->
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">
                        性別
                    </span>
                    <span class="form__label--required">
                        ※
                    </span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <label>
                            <input type="radio" name="gender" value="male">男性
                        </label>
                        <label>
                            <input type="radio" name="gender" value="female">女性
                        </label>
                        <label>
                            <input type="radio" name="gender" value="other">その他
                        </label>
                    </div>
                    <div class="form__error">
                        <!--ここにerrorバリデーションの記述-->
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">
                            メールアドレス
                        </span>
                        <span class="form__label--required">
                            ※
                        </span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <input type="email" name="email" placeholder="例:test.example.com" value="{{ old('email') }}" />
                        </div>
                        <div class="form__error">
                            <!--ここにバリデーションの記述-->
                        </div>
                    </div>
                    <div class="form__group">
                        <div class="form__group-title">
                            <span class="form__label--item">
                                電話番号
                            </span>
                            <span class="form__label--required">
                                ※
                            </span>
                        </div>
                        <div class="form__group-content">
                            <div class="form__input--text">
                                <input type="tel" class="phone-input" name="tel1" placeholder="例:080" value="{{ old('tel1')}}">
                                -
                                <input type="tel" class="phone-input" name="tel2" placeholder="1234" value="{{ old('tel2') }}" />
                                -
                                <input type="tel" class="phone-input" name="tel3" placeholder="5678" value="{{ old('tel3') }}" />
                            </div>
                            <div class="form__error">
                                <!--ここにerrorバリデーションの記述。リクエストに３つの値をくっつけて新たな値を作りバリデーションする必要あり-->
                            </div>
                        </div>
                        <div class="form__group">
                            <div class="form__group-title">
                                <span class="form__label--item">
                                    住所
                                </span>
                                <span class="form__label--required">
                                    ※
                                </span>
                            </div>
                            <div class="form__group-content">
                                <div class="form__input--text">
                                    <input type="text" name="address" placeholder="例:東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}" />
                                </div>
                                <div class="form__error">
                                    <!--ここにバリデーションの記述-->
                                </div>
                            </div>
                            <div class="form__group">
                                <div class="form__group-title">
                                    <span class="form__label--item">
                                        建物名
                                    </span>
                                    <span class="form__label--required">
                                        ※
                                    </span>
                                </div>
                                <div class="form__group-content">
                                    <div class="form__input--text">
                                        <input type="text" name="building" placeholder="例:千駄ヶ谷マンション101" value="{{ old('building') }}" />
                                    </div>
                                    <div class="form__error">
                                        <!--ここにバリデーションの記述-->
                                    </div>
                                </div>
                            </div>
                            <div class="form__group">
                                <div class="form__group-title">
                                    <span class="form__label--item">
                                        お問い合わせの種類
                                    </span>
                                    <span class="form__label--required">
                                        ※
                                    </span>
                                </div>
                                <div class="form__group-content">
                                    <div class="form__input--text">
                                        <select name="contact-type">
                                            <option disabled selected>選択してください</option>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form__error">
                                        <!--ここにバリデーションの記述-->
                                    </div>
                                </div>
                            </div>
                            <div class="form__group">
                                <div class="form__group-title">
                                    <span class="form__label--item">
                                        お問い合わせ内容
                                    </span>
                                    <span class="form__label--required">
                                        ※
                                    </span>
                                </div>
                                <div class="form__group-content">
                                    <div class="form__input--text">
                                        <input type="textarea" name="detail" placeholder="お問い合わせ内容をご記載ください" value="{{ old('contact') }}" />
                                    </div>
                                    <div class="form__error">
                                        <!--ここにバリデーションの記述-->
                                    </div>
                                </div>
                            </div>
                            <div class="contact-form__button">
                                <button class="contact-form__button-submit" type="submit">確認画面</button>
                            </div>
    </form>
</div>
@endsection