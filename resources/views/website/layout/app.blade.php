<html>
<head>
  <title>@yield('title') - {{ config('app.name') }}</title>
  <link rel="apple-touch-icon" sizes="180x180" href="{{asset('front/apple-touch-icon-1492ab936540997d44a343352c35d44c3ccf46c338c5f349eddf486416407344.png')}}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{asset('front/favicon-32x32-b0d570e93eaf074bf006dfa50261ee179664b8d77c514e82f896e12e7042c48a.png')}}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{asset('front/favicon-16x16-39b67b68b387d4c917c8ba7681cd8c15f991be9046087142d6ada16410642e2e.png')}}">
  <link rel="manifest" href="/assets/favicon/manifest-5345817f72143625c23f33da65b687ac8e77a1fe52a1a52c7a2b8979afeb5f5c.json">
  <link rel="mask-icon" href="/assets/favicon/safari-pinned-tab-8b7b48f487ae2890d62e4f679f13c9646723e48f3eaa5dbeaf739ea98feed8c5.svg" color="#5bbad5">
  <link rel="shortcut icon" href="/assets/favicon/favicon-056128748516d55458c10891cf05efe40b80b7a187923938fdd2169a61e5f55b.ico">
  <meta name="msapplication-config" content="/assets/favicon/browserconfig-aec392763f77371b4b64dd6608bac3e7fc8ec5dd6a7b2a7e50a71c15d687b534.xml">
  <meta name="theme-color" content="#ffffff">
  <link rel="stylesheet" media="screen" href="/front/css/spectre.min-8fe2945f938f3bf25dd78cd97008b92c6b229093744d61acea4477b1af7b0649.css">
  <link rel="stylesheet" media="screen" href="/front/css/spectre-icons.min-530240f87105099a4f51acef098ab76b2452b827dc272e35a3b5819cecb2212f.css">
  <link rel="stylesheet" media="screen" href="/front/css/spectre-exp.min-48aa2167ac9a17d26c9a60c873cd8eeec567d929e00707c5b65dfbe48634cdcf.css">
  <link rel="stylesheet" media="screen" href="/front/css/awesomplete-51072edaba8e0e837266a2667583223ee5ff2c81ec31c99cdc66e3f4229c7275.css">
  <script src="/front/css/awesomplete.min-80441c6f2d473f67b9628d52e9201279bdad7f8d94f36e114d40882683a52fc5.js"></script>
  <link rel="stylesheet" media="all" href="/front/css/application-519f914acde584c7fa64d7db7fac58a7c4e73656a6e99abd0ff21592ec6ec1e9.css" data-turbolinks-track="true">
  <script src="/front/css/application-8124dc1b28ea47a49364364f1507d08fb14a81a0ddc6c0607f1c6a0faf34fbc7.js/" data-turbolinks-track="true"></script>
  <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,700&display=swap" rel="stylesheet"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <meta name="csrf-param" content="authenticity_token">
  <meta name="csrf-token" content="iyt68k5jgyk80cxf7sV42nfiBL+MqJhTGDC78b7SvzkwptonqsAxvu3eaQ1eoHaWDaawrKbCdHFLcZ5K8HP2Xw==">
  </head>
  <style>
  .menuMargin{
    margin-left: 10px;
  }
  .menuFont{
    font-size: .8rem !important;
  }
  </style>
<body cz-shortcut-listen="true">
  <section class="section section-header">
    <section class="grid-header @if(\Request::route()->getName() == 'front.kitaab' ||  \Request::route()->getName()  == 'front.home') @else container @endif">
      <nav class="navbar">
        <section class="navbar-section">
          <a class="navbar-brand mr-10" href="/">Home </a>
            <!--<a class="btn btn-link menuFont" href="{{route('front.kitaab')}}"><i class="fa fa-book"></i> Books</a>-->
        </section>
        <section class="navbar-section"></section>
        <!-- <i class="fa fa-key fa-fw"></i> -->
        <section class="navbar-section">
            <a class="btn btn-link menuFont " href="{{route('about')}}"><i class="fa fa-info-circle"></i> About </a>
            <a class="btn btn-link menuMargin menuFont" href="/"><i class="fa fa-question-circle"></i> FAQ's</a>
        </section>
      </nav>
    </section>
  </section>
  @yield('content')
</body>
</html>