@extends('layout.master')

@section('title', "首页")

@section('asset')
    <link rel="stylesheet" href="/css/wel.css" />
@endsection

@section('content')

    <div class="row">
        <div class="small-0 medium-2 columns">
            <ul class="menu vertical hide-for-small-only">
                <li class="cat"><a href="/good">所有商品</a></li>
                @foreach($cats as $cat)
                    <li class="cat"><a
                                href="/good?cat_id={{ $cat->id }}">{{ $cat->cat_name }}</a></li>
                @endforeach
            </ul>
            <ul class="menu show-for-small-only" style="background-color: white;margin-bottom: 15px">
                <li class="cat"><a href="/good">所有商品</a></li>
                @foreach($cats as $cat)
                    <li class="cat"><a
                                href="/good?cat_id={{ $cat->id }}">{{ $cat->cat_name }}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="small-12 medium-10 columns">
            <div class="row">
                <div class="small-12 medium-8 columns">
                    <div class="row">
                    @if(count($stargoods) > 0)
                        <div class="orbit" role="region" aria-label="热销商品" data-orbit>
                            <ul class="orbit-container">
                                @if(count($stargoods) > 1)
                                    <button class="orbit-previous"><span class="show-for-sr">←</span>&#9664;&#xFE0E;</button>
                                    <button class="orbit-next"><span class="show-for-sr">→</span>&#9654;&#xFE0E;</button>
                                @endif
                                @foreach($stargoods as $good)
                                    <li class="orbit-slide">
                                        <a href="/good/{{ $good->id }}"><img class="orbit-image"
                                                                             src="/good/{{ sha1($good->id) }}/titlepic"
                                                                             alt="{{ $good->name }}"/>
                                            <figcaption class="orbit-caption">{{ $good->good_name }}</figcaption>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <br/>
                    @endif
                    </div>
                    @if(count($newgoods)>0)
                        <h3>新品</h3>
                        <div class="row small-up-2 medium-up-2 large-up-4">
                            @foreach($newgoods as $good)
                                <div class="columns">
                                    <div class="good">
                                        <a href="/good/{{ $good->id }}">
                                            <div class="card">
                                                <div class="card-divider" style="padding:0;">
                                                    <img src="/good/{{ sha1($good->id) }}/titlepic"/>
                                                </div>
                                                <div class="details" style="position:absolute;z-index:200;width:200px;height:100px;display:none;">
                                                    <div class="det-d hide-for-small-only" style="position:absolute;z-index:200;top:-40%;left:+2%;color:white;font-size:12px;">
                                                        售价：￥{{ $good->price }}<br/>
                                                        @if($good->count==0)
                                                            无库存QAQ
                                                        @else
                                                            库存：{{ $good->count }}
                                                        @endif
                                                    </div>
                                                    <div class="det-d show-for-small-only" style="position:absolute;z-index:200;top:-50%;left:+2%;color:white;font-size:15px;">
                                                        售价：￥{{ $good->price }}<br/>
                                                        @if($good->count==0)
                                                            无库存QAQ
                                                        @else
                                                            库存：{{ $good->count }}
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="card-section sec-name"style=";white-space: nowrap;overflow: hidden;text-overflow: ellipsis;font-size:15px;padding:10px 10px">
                                                    {{ $good->good_name }}
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    <h3>随便看看</h3>
                    @foreach($cats as $cat)
                        @if(count($catgoods[$cat->cat_name]))
                            <h4>{{ $cat->cat_name }}</h4>
                            <div class="row small-up-2 medium-up-2 large-up-4">
                                @foreach($catgoods[$cat->cat_name] as $good)
                                    <div class="columns">
                                        <div class="good">
                                            <a href="/good/{{ $good->id }}">
                                                <div class="card">
                                                    <div class="card-divider" style="padding:0;">
                                                        <img src="/good/{{ sha1($good->id) }}/titlepic"/>
                                                    </div>
                                                    <div class="details" style="position:absolute;z-index:200;width:200px;height:100px;display:none;">
                                                        <div style="position:absolute;z-index:200;top:-40%;left:+1%;color:white;font-size:12px;">
                                                            售价：￥{{ $good->price }}<br/>
                                                            @if($good->count==0)
                                                                无库存QAQ
                                                            @else
                                                                库存：{{ $good->count }}
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="card-section" style=";white-space: nowrap;overflow: hidden;text-overflow: ellipsis;font-size:15px;padding:10px 10px">
                                                        {{ $good->good_name }}
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="small-12 medium-4 columns">
                    <div class="row">
                        <div class="medium-10 medium-offset-2 columns">
                            <div class="card">
                                <h4 class="card-divider">公告</h4>
                                @foreach($announces as $announce)
                                    <a href="/announcement/{{ $announce->id }}" class="card-item">
                                        <div class="card-section">{{ $announce->title }}</div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="/js/good/cat.js"></script>
            <script src="/js/good/editfav.js"></script>
            <script src="/js/jquery.color.js"></script>
        </div>
    </div>
@endsection
