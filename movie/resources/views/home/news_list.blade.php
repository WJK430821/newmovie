@extends('home.base')
  @section('content')
  <link rel="stylesheet" href="{{asset('home/css/news-hotNews.d8ee9843.css')}}">
    <div class="container" id="app">
      <div class="hotIndex-container">
    <div class="index-news-container clearfix">
        <div class="popular-container">
    <h4 class="red">热门资讯</h4>
      <ul>
          <li class="top1-list">
            <div>
                <div class="top-info-thumb">
                  <a href="http://maoyan.com/films/news/21707" target="_blank" data-act="news-click" data-val="{newsid:21707}">
                    <img src="6a78a652250bec197025f5f29fc0eed9249573.jpg@120w_72h_1e_1c" alt="">
                    <i class="ranking top-info-icon red-bg">1</i>
                  </a>
                </div>
                <p class="top1-news-content">
                  <a href="http://maoyan.com/films/news/21707" class="two-line" title="历任《变形金刚》女主都在这里了，还是前两部的梅根·福克斯最美" target="_blank" data-act="news-click" data-val="{newsid:21707}">
                    历任《变形金刚》女主都在这里了，还是前两部的梅根·福克斯最美
                  </a>
                </p>
            </div>
          </li>
          <li class="">
            <div>
                <div class="normal-link">
                  <i class="ranking red">2</i>
                  <p class="top10-news-content">
                    <a href="http://maoyan.com/films/news/21721" target="_blank" data-act="news-click" data-val="{newsid:21721}">《变形金刚5》内地预售票房破亿，首周末排片占比超90%</a>
                  </p>
                </div>            </div>
          </li>
          <li class="">
            <div>
                <div class="normal-link">
                  <i class="ranking red">3</i>
                  <p class="top10-news-content">
                    <a href="http://maoyan.com/films/news/21761" target="_blank" data-act="news-click" data-val="{newsid:21761}">《重返·狼群》票房突破2000万，观众评分9.3为2017国产片最高</a>
                  </p>
                </div>            </div>
          </li>
          <li class="">
            <div>
                <div class="normal-link">
                  <i class="ranking ">4</i>
                  <p class="top10-news-content">
                    <a href="http://maoyan.com/films/news/21722" target="_blank" data-act="news-click" data-val="{newsid:21722}">华纳拍《神奇女侠》前就给盖尔·加朵涨薪一倍，吃瓜群众先稳住</a>
                  </p>
                </div>            </div>
          </li>
          <li class="">
            <div>
                <div class="normal-link">
                  <i class="ranking ">5</i>
                  <p class="top10-news-content">
                    <a href="http://maoyan.com/films/news/21764" target="_blank" data-act="news-click" data-val="{newsid:21764}">阿什顿·库彻身价1.6亿美元，投资眼光奇好，连优步都没放过</a>
                  </p>
                </div>            </div>
          </li>
          <li class="">
            <div>
                <div class="normal-link">
                  <i class="ranking ">6</i>
                  <p class="top10-news-content">
                    <a href="http://maoyan.com/films/news/21755" target="_blank" data-act="news-click" data-val="{newsid:21755}">全国粉丝给周星驰的情书：星爷55岁生日快乐</a>
                  </p>
                </div>            </div>
          </li>
          <li class="">
            <div>
                <div class="normal-link">
                  <i class="ranking ">7</i>
                  <p class="top10-news-content">
                    <a href="http://maoyan.com/films/news/21725" target="_blank" data-act="news-click" data-val="{newsid:21725}">不能生就代孕，卡戴珊&amp;侃爷为要三胎真的拼了</a>
                  </p>
                </div>            </div>
          </li>
          <li class="">
            <div>
                <div class="normal-link">
                  <i class="ranking ">8</i>
                  <p class="top10-news-content">
                    <a href="http://maoyan.com/films/news/21771" target="_blank" data-act="news-click" data-val="{newsid:21771}">吴奇隆在北大求学准备转做幕后，暂时不打算跟刘诗诗合体拍戏</a>
                  </p>
                </div>            </div>
          </li>
          <li class="">
            <div>
                <div class="normal-link">
                  <i class="ranking ">9</i>
                  <p class="top10-news-content">
                    <a href="http://maoyan.com/films/news/21711" target="_blank" data-act="news-click" data-val="{newsid:21711}">盖尔·加朵拍《神奇女侠》的片酬只有30万美元，内地演员笑了</a>
                  </p>
                </div>            </div>
          </li>
          <li class="">
            <div>
                <div class="normal-link">
                  <i class="ranking ">10</i>
                  <p class="top10-news-content">
                    <a href="http://maoyan.com/films/news/21758" target="_blank" data-act="news-click" data-val="{newsid:21758}">《欢乐合唱团》里的美少女剪了短发之后，名字也换成男人的</a>
                  </p>
                </div>            </div>
          </li>
      </ul>
  </div>

  <div class="latest-container">
      <h4 class="latest-header red">
        最新资讯
        <a href="/news" class="all-latest" data-act="all-news-click">
          全部
        <span class="arrow red-arrow"></span>
        </a>
      </h4>
    <div class="latest-content clearfix">
        <!-- 资讯 -->
        @foreach ($newlist as $nlist)
          <div class="latest-news-box">
            <a href="/news/{{$nlist->id}}.html" target="_blank" data-act="news-click">
              <img src="{{ env('QINIU_DOMAIN') }}{{$nlist->thumb}}" alt="{{$nlist->title}}">
            </a>
            <p class="latest-news-title">
              <a href="/news/{{$nlist->id}}.html" class="two-line" title="{{$nlist->title}}" target="_blank" data-act="news-click">
                {{$nlist->title}}
              </a>
            </p>
            <div class="info-container">
              <span>猫眼电影</span>
              <span class="images-view-count view-count">{{ $nlist->created_at }}</span>
            </div>
          </div>
        @endforeach
    </div>
  </div>

    </div>
  </div>

    </div>
@endsection
