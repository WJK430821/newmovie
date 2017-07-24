@extends('home.base')
  @section('content')
<link rel="stylesheet" href="{{asset('home/css/news-detail.babc5c81.css')}}">
<div class="container">
  <div class="news-page">
    <div class="news-related">
      <div class="module">
        <div class="mod-title">
          <h3>正在热映电影</h3>
        </div>
        <div class="mod-content">
            <div class="related-movies">
              <dl class="movie-list">
              @foreach ($filmlist as $fllist)
                <dd>
                  <div class="movie-item">
                    <a href="/films/{{$fllist->id}}.html" target="_blank" data-act="movie-click">
                    <div class="movie-poster">
                      <img class="poster-default" src="loading_2.e3d934bf.png">
                      <img src="/uploads/{{$fllist->picname}}">
                    </div>
                    </a>
                    <div class="movie-ver"></div>
                  </div>
                  <div class="channel-detail movie-item-title" title="{{$fllist->title}}">
                    <a href="http://maoyan.com/films/341601" target="_blank" data-act="movies-click" data-val="{movieId:341601}">{{$fllist->title}}</a>
                  </div>
                  <div class="channel-detail channel-detail-orange">评分:{{$fllist->score}}</div> 
                </dd>
                @endforeach
              </dl>
            </div>
        </div>
      </div>
    </div>
    <div class="news-main">
      <div class="news-title">
        <h1>{{$newshow->title}}</h1>
        <div class="news-subtitle">
          熊猫电影&nbsp;&nbsp;
          {{$newshow->created_at}}&nbsp;&nbsp;
          <span class="news-icon-views"></span>
          1077
        </div>
      </div>
      <div class="news-content">
        <p><?php echo htmlspecialchars_decode($newshow['content']);?></p>
      </div>
      
      <div class="news-action" data-val="{ newsid: 22216 }">
        <span class="news-action-block like-news" data-act="like-news" data-val="{ liked: true }">
          <span class="like-icon"></span>&nbsp;&nbsp;
          <span class="like-news-count" data-count="2">
            2
          </span>
        </span>
      </div>

    </div>
  </div>
</div>
@endsection