@extends('layout.main')

@section('title', 'General News')

@section('general', 'active')
    
@section('content')

<div class="container py-4">
    <form action="{{ route('general') }}" method="GET">
        <div class="row">
            <div class="col-md-2">
                <h2><i class="fas fa-align-justify"></i> General</h2>
            </div>
            <div class="col-md-3">
                <select name="country" class="form-select form-control border-color-quaternary">

                    <option value="us" {{ $selectedCountry == 'us' ? 'selected' : '' }}>United States</option>
                    <option value="ar" {{ $selectedCountry == 'ar' ? 'selected' : '' }}>Argentina </option>
                    <option value="au" {{ $selectedCountry == 'au' ? 'selected' : '' }}>Australia</option>
                    <option value="at" {{ $selectedCountry == 'at' ? 'selected' : '' }}>Austria</option>
                    <option value="be" {{ $selectedCountry == 'be' ? 'selected' : '' }}>Belgium</option>
                    <option value="br" {{ $selectedCountry == 'br' ? 'selected' : '' }}>Brazil</option>
                    <option value="bg" {{ $selectedCountry == 'at' ? 'selected' : '' }}>Bulgaria</option>
                    <option value="ca" {{ $selectedCountry == 'ca' ? 'selected' : '' }}>Canada</option>
                    <option value="cn" {{ $selectedCountry == 'cn' ? 'selected' : '' }}>China</option>
                    <option value="co" {{ $selectedCountry == 'co' ? 'selected' : '' }}>Colombia</option>
                    <option value="cz" {{ $selectedCountry == 'cz' ? 'selected' : '' }}>Czech Republic</option>
                    <option value="eg" {{ $selectedCountry == 'eg' ? 'selected' : '' }}>Egypt</option>
                    <option value="fr" {{ $selectedCountry == 'fr' ? 'selected' : '' }}>France</option>
                    <option value="de" {{ $selectedCountry == 'de' ? 'selected' : '' }}>Germany</option>
                    <option value="gr" {{ $selectedCountry == 'gr' ? 'selected' : '' }}>Greece</option>
                    <option value="hk" {{ $selectedCountry == 'hk' ? 'selected' : '' }}>Hong Kong</option>
                    <option value="hu" {{ $selectedCountry == 'hu' ? 'selected' : '' }}>Hungary</option>
                    <option value="in" {{ $selectedCountry == 'in' ? 'selected' : '' }}>India</option>
                    <option value="id" {{ $selectedCountry == 'id' ? 'selected' : '' }}>Indonesia</option>
                    <option value="ie" {{ $selectedCountry == 'ie' ? 'selected' : '' }}>Ireland</option>
                    <option value="il" {{ $selectedCountry == 'il' ? 'selected' : '' }}>Israel</option>
                    <option value="it" {{ $selectedCountry == 'it' ? 'selected' : '' }}>Italy</option>
                    <option value="lv" {{ $selectedCountry == 'lv' ? 'selected' : '' }}>Latvia</option>
                    <option value="lt" {{ $selectedCountry == 'lt' ? 'selected' : '' }}>Lithuania</option>
                    <option value="my" {{ $selectedCountry == 'my' ? 'selected' : '' }}>Malaysia</option>
                    <option value="mx" {{ $selectedCountry == 'mx' ? 'selected' : '' }}>Mexico</option>
                    <option value="ma" {{ $selectedCountry == 'ma' ? 'selected' : '' }}>Morocco</option>
                    <option value="nl" {{ $selectedCountry == 'nl' ? 'selected' : '' }}>Netherlands</option>
                    <option value="nz" {{ $selectedCountry == 'nz' ? 'selected' : '' }}>New Zealand</option>
                    <option value="ng" {{ $selectedCountry == 'ng' ? 'selected' : '' }}>Nigeria</option>
                    <option value="no" {{ $selectedCountry == 'no' ? 'selected' : '' }}>Norway</option>
                    <option value="ph" {{ $selectedCountry == 'ph' ? 'selected' : '' }}>Philippines</option>
                    <option value="pl" {{ $selectedCountry == 'pl' ? 'selected' : '' }}>Poland</option>
                    <option value="pt" {{ $selectedCountry == 'pt' ? 'selected' : '' }}>Portugal</option>
                    <option value="ro" {{ $selectedCountry == 'ro' ? 'selected' : '' }}>Romania</option>
                    <option value="ru" {{ $selectedCountry == 'ru' ? 'selected' : '' }}>Russia</option>
                    <option value="sa" {{ $selectedCountry == 'sa' ? 'selected' : '' }}>Saudi Arabia</option>
                    <option value="rs" {{ $selectedCountry == 'rs' ? 'selected' : '' }}>Serbia</option>
                    <option value="sg" {{ $selectedCountry == 'sg' ? 'selected' : '' }}>Singapore</option>
                    <option value="sk" {{ $selectedCountry == 'sk' ? 'selected' : '' }}>Slovakia</option>
                    <option value="si" {{ $selectedCountry == 'si' ? 'selected' : '' }}>Slovenia</option>
                    <option value="za" {{ $selectedCountry == 'za' ? 'selected' : '' }}>South Africa</option>
                    <option value="kr" {{ $selectedCountry == 'kr' ? 'selected' : '' }}>South Korea</option>
                    <option value="se" {{ $selectedCountry == 'se' ? 'selected' : '' }}>Sweden</option>
                    <option value="ch" {{ $selectedCountry == 'ch' ? 'selected' : '' }}>Switzerland</option>
                    <option value="tw" {{ $selectedCountry == 'tw' ? 'selected' : '' }}>Taiwan</option>
                    <option value="th" {{ $selectedCountry == 'th' ? 'selected' : '' }}>Thailand</option>
                    <option value="tr" {{ $selectedCountry == 'tr' ? 'selected' : '' }}>Turkey</option>
                    <option value="ua" {{ $selectedCountry == 'ua' ? 'selected' : '' }}>Ukrain</option>
                    <option value="uk" {{ $selectedCountry == 'uk' ? 'selected' : '' }}>United Kingdom</option>
                    <option value="ve" {{ $selectedCountry == 've' ? 'selected' : '' }}>Venezuela</option>
                </select>
            </div>
            <div class="col-md-3">
                <button class="btn btn-primary" type="submit">Filter</button>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col">
            <div class="blog-posts">

                <div class="row">

                    @foreach ($articles->articles as $article)

                        <div class="col-md-4" style="max-height: 530px">
                            <article class="post post-medium border-0 pb-0 mb-5">
                                <div class="post-image">
                                    @php
                                        $cekImage = $article->urlToImage;
                                    @endphp
                                    <!-- is_null($cekImage) bisa dengan pemanggilan seperti ini -->
                                    <a href="{{ $article->url }}"> 
                                        @if($cekImage == null)
                                        <img src="{{ asset('img/new/imgnotfound.png') }}" class="img-fluid rounded-0" alt="No Image Found" style="height: 200px""/>
                                        @else
                                        <img src="{{ $article->urlToImage }}" class="img-fluid rounded-0" style="height: 200px" />
                                        @endif
                                    </a>
                                </div>

                                <div class="post-content">

                                    <h2 class="font-weight-semibold text-5 line-height-6 mt-3 mb-2"><a href="{{ $article->url }}" style="color: #0088CC; font-size: 20px">{{ substr($article->title, 0, 100) }}</a></h2>
                                    <p>{{ substr($article->description, 0, 70) }}...</p>

                                    <div class="post-meta sticky-bottom">
                                        <span><i class="far fa-user"></i><a href="#" style="color: #0088CC;" >{{ $article->author }}</a> </span>
                                        <span><i class="far fa-folder"></i><a href="#" style="color: #0088CC;">{{$category}}</a> </span>
                                        <span><i class="far fa-calendar"></i> <a href="#" style="color: #0088CC;">{{ substr($article->publishedAt, 0, 10) }}</a></span>
                                        <span class="d-block mt-2"><a href="{{ $article->url }}" target="_blank" class="btn btn-primary">Read More</a></span>
                                    </div>

                                </div>
                            </article>
                        </div>
                    @endforeach

                </div>

                <div class="row">
                    <div class="col">
                        <ul class="pagination float-end">
                            <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-left"></i></a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-right"></i></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

    </div>

</div>

@endsection