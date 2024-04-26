@extends('dashboard')
@section('content')
<!--====== App Content ======-->
<div class="app-content">

    <!--====== Section 2 ======-->
    <div class="u-s-p-b-60">

        <!--====== Section Intro ======-->
        <div class="section__intro u-s-m-b-60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section__text-wrap">
                            <h1 class="section__heading u-c-secondary">LOG IN</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Intro ======-->


        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="row row--center">
                    <div class="col-lg-6 col-md-8 u-s-m-b-30">
                        <div class="l-f-o">
                            <div class="l-f-o__pad-box">
                                <h1 class="gl-h1" style="color: white;">PERSONAL INFORMATION</h1>
                                <form class="l-f-o__form" method="POST" action="{{ route('login.custom') }}">
                                    @csrf
                                    <div class="form-group u-s-m-b-30">
                                        <label class="gl-label" for="reg-email">E-MAIL *</label>
                                        <input class="input-text input-text--primary-style" type="text" id="reg-email" name="email" placeholder="Enter E-mail" required autofocus>
                                        @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                    <div class="u-s-m-b-30">
                                        <label class="gl-label" for="reg-password">PASSWORD *</label>
                                        <input class="input-text input-text--primary-style" type="password" id="reg-password" name="password" placeholder="Enter Password" required autofocus>
                                        @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                    <div class="u-s-m-b-15">
                                        <button class="btn btn--e-transparent-brand-b-2" type="submit">LOG IN</button>
                                    </div>
                                    <a class="gl-link" href="{{ url('/dashboard') }}">Return to Store</a>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 2 ======-->
</div>
<!--====== End - App Content ======-->
<style>
    .section__intro,
    .section__heading,
    .gl-label,
    .gl-link {
        color: white;
    }

    .section__heading {
        font-size: 25px;
        /* Đặt kích thước chữ là 25px */
    }
</style>
@endsection