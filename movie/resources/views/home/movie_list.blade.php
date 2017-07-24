@extends('home.base')
  @section('content')
<div class="subnav">
    <ul class="navbar">
      <li>
        <a data-act="subnav-click" data-val="{subnavClick:1}" data-state-val="{subnavId:1}" class="active" href="/films">正在热映</a>
      </li>
      <li>
        <a data-act="subnav-click" href="/films/Type/2">即将上映</a>
      </li>
    </ul>
</div>
<div class="container" id="app">
    <div class="movies-channel">
        <!-- <div class="tags-panel">
          <ul class="tags-lines">
            <li class="tags-line" data-val="{tagTypeName:'cat'}">
              <div class="tags-title">类型 :</div>
              <ul class="tags">
                  <li class="active" data-state-val="{ catTagName:'全部'}">
                    <a data-act="tag-click" data-val="{TagName:'全部'}" href="javascript:void(0);" style="cursor: default;">全部</a>
                  </li>
                  <li>
                    <a data-act="tag-click" data-val="{TagName:'爱情'}" href="http://maoyan.com/films?showType=1&amp;catId=3">爱情</a>
                  </li><li>
                    <a data-act="tag-click" data-val="{TagName:'喜剧'}" href="http://maoyan.com/films?showType=1&amp;catId=2">喜剧</a>
                  </li><li>
                    <a data-act="tag-click" data-val="{TagName:'动画'}" href="http://maoyan.com/films?showType=1&amp;catId=4">动画</a>
                  </li><li>
                    <a data-act="tag-click" data-val="{TagName:'剧情'}" href="http://maoyan.com/films?showType=1&amp;catId=1">剧情</a>
                  </li>
              </ul>
            </li>
            <li class="tags-line tags-line-border" data-val="{tagTypeName:'source'}">
              <div class="tags-title">区域 :</div>
              <ul class="tags">
                  <li class="active" data-state-val="{ sourceTagName:'全部'}">
                    <a data-act="tag-click" data-val="{TagName:'全部'}" href="javascript:void(0);" style="cursor: default;">全部</a>
                  </li>
                  <li>
                    <a data-act="tag-click" data-val="{TagName:'大陆'}" href="http://maoyan.com/films?showType=1&amp;sourceId=2">大陆</a>
                  </li><li>
                    <a data-act="tag-click" data-val="{TagName:'美国'}" href="http://maoyan.com/films?showType=1&amp;sourceId=3">美国</a>
                  </li><li>
                    <a data-act="tag-click" data-val="{TagName:'韩国'}" href="http://maoyan.com/films?showType=1&amp;sourceId=7">韩国</a>
                  </li>
              </ul>
            </li>
            <li class="tags-line tags-line-border" data-val="{tagTypeName:'year'}">
              <div class="tags-title">年代 :</div>
              <ul class="tags">
                  <li class="active" data-state-val="{ yearTagName:'全部'}">
                    <a data-act="tag-click" data-val="{TagName:'全部'}" href="javascript:void(0);" style="cursor: default;">全部</a>
                  </li>
                  <li>
                    <a data-act="tag-click" data-val="{TagName:'2017以后'}" href="http://maoyan.com/films?showType=1&amp;yearId=13">2017以后</a>
                  </li><li>
                    <a data-act="tag-click" data-val="{TagName:'2017'}" href="http://maoyan.com/films?showType=1&amp;yearId=12">2017</a>
                  </li><li>
                    <a data-act="tag-click" data-val="{TagName:'2016'}" href="http://maoyan.com/films?showType=1&amp;yearId=11">2016</a>
                  </li>
              </ul>
            </li>
          </ul>
        </div> -->
        <div class="movies-panel">

            <div class="movies-list">
              <dl class="movie-list">
              @foreach ($flist as $films)
                <dd>
                  <div class="movie-item">
                    <a href="/films/{{ $films->id }}.html" target="_blank" data-act="movie-click">
                      <div class="movie-poster">
                        <!-- <img class="poster-default" src="loading_2.e3d934bf.png"> -->
                        <img src="/uploads/{{$films->picname}}">
                      </div>
                    </a>
                    <div class="channel-action channel-action-sale">
                      <a>购票</a>
                    </div>
                    <div class="movie-ver"><i class="imax3d"></i></div>
                  </div>
                  <div class="channel-detail movie-item-title" title="{{ $films->title }}">
                      <a href="/film/{{ $films->id }}.html" target="_blank" data-act="movies-click">{{ $films->title }}</a>
                  </div>
                  <div class="channel-detail channel-detail-orange"><i class="integer">{{ $films->score }}</i></div>
                </dd>
              @endforeach
              </dl>
            </div>
            <div class="movies-pager">
                <ul class="list-pager">
                    {!! $flist->render() !!}
                   
                </ul>
            </div>
        </div>
    </div>
</div>
  @endsection
