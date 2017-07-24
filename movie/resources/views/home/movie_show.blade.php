@extends('home.base')
  @section('content')

<meta name="_token" content="{{ csrf_token() }}"/>
<script>
    //执行评论添加
    function doSubmit(){
      //获取要添加的内容
      var comment = document.myform.comment.value;
      $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
        url:"/films/comment/{{$first->id}}",
        type:"post",
        data:"comment"+comment,
        datatype:"text",
        
      });
      return true;
    }
</script>
  <link rel="stylesheet" href="{{asset('home/css/movie-detail.6b71afde.css')}}">
<div class="banner">
    <div class="wrapper clearfix">
      <div class="celeInfo-left">
        <div class="avater-shadow">
          <img class="avater" src="/uploads/{{$first->picname}}" alt="">
            <div class="movie-ver"><i class="imax3d"></i></div>
        </div>
      </div>
      <div class="celeInfo-right clearfix">
          <div class="movie-brief-container">

              <h3 class="name">{{$first->title}}</h3>
             
              <div class="ename ellipsis">{{$first->engname}}</div>
              <ul>
                <li class="ellipsis">
                {{ $first->region }} / {{ $first->duration }}
                </li>
                <li class="ellipsis">{{ $first->firsttime }} 大陆上映</li>
              </ul>
          </div>
          <div class="action-buyBtn">
              <div class="action clearfix" data-val="{movieid:248645}">
                <a class="wish " data-wish="false" data-score="">
                  <div>
                    <i class="icon wish-icon"></i>
                      <span class="wish-msg" data-act="wish-click">想看</span>
                  </div>
                </a>
                <a class="score-btn ">
                  <div>
                    <i class="icon score-btn-icon"></i>
                    <span class="score-btn-msg" data-act="comment-open-click">
                        评分
                    </span>
                  </div>
                </a>
              </div>
              <a class="btn buy" href="/films/{{$first->id}}/seat" target="_blank">立即购票</a>
          </div>
          <div class="movie-stats-container">
              <div class="movie-index">
                  <p class="movie-index-title">用户评分</p>
                  <div class="movie-index-content score normal-score">
                      <span class="index-left info-num ">
                        <span class="stonefont">{{ $first->score }}</span>
                      </span>
                      <div class="index-right">
                        <div class="star-wrapper">
                          <div class="star-on" style="width: 73%;"></div>
                        </div>
                         <span class="score-num"><span class="stonefont">10078</span>人评分</span>
                      </div>
                  </div>
              </div>
              
              <div class="movie-index">
                <p class="movie-index-title">累计票房</p>
                <div class="movie-index-content box">
                    <span class="stonefont">18.23</span><span class="unit">亿</span>
                </div>
              </div>
          </div>
      </div>
    </div>
</div>

<div class="container" id="app">
<div class="main-content-container clearfix">
  <div class="main-content">
    <div class="tab-container">
      <div class="tab-title-container clearfix">
          <div class="tab-title active" data-act="tab-desc-click">影片基本介绍</div>
      </div>
      <div class="tab-content-container">
          <div class="tab-desc tab-content active" data-val="{tabtype:'desc'}">
              <div class="module">
                  <div class="mod-title">
                    <h3>剧情简介</h3>
                  </div>
                  <div class="mod-content">
                      <span class="dra">{{$first->introduction}}</span>
                  </div>
              </div>
              <div class="module">
                <div class="mod-title">
                  <h3>演职人员</h3>
                    <!-- <a class="more" href="#celebrity" data-act="all-actor-click">全部</a> -->
                </div>
                <div class="mod-content">
                    <div class="celebrity-container clearfix">
                        <div class="celebrity-group">
                            <div class="celebrity-type">
                              导演
                            </div>
                            <ul class="celebrity-list clearfix">
                                <li class="celebrity " data-act="celebrity-click" data-val="{celebrityid:31088}">
                                    
                                    <div class="info">
                                      <a href="" target="_blank" class="name">
                                        {{$first->director}}
                                      </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="celebrity-group">
                          <div class="celebrity-type">
                            演员
                          </div>
                          <ul class="celebrity-list clearfix">
                             
                              <li class="celebrity actor" data-act="celebrity-click" data-val="{celebrityid:1028162}">
                                  
                                  <div class="info">
                                    <a href="" class="name">
                                      {{$first->actor}}
                                    </a>
                                      <br>
                                  </div>
                              </li>
                          </ul>
                        </div>
                    </div>
                </div>
              </div>
                <div class="module">
                  <div class="mod-title">
                    <h3>写短评</h3>
                  </div>
                  <div class="mod-content">
                      <form name="myform" action="{{url('/films/comment')}}/{{$first->id}}" method="post" onsubmit="return doSubmit(); ">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          
                          <textarea name="comment" cols="50" rows="5" placeholder="说点你的看法吧"></textarea><br/><br/>
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          <input type="submit" value="评论">
                      </form>
                  </div>
              </div>
              <div class="module">
                  <div class="mod-title">
                    <h3>热门短评</h3>
                  </div>

                @foreach($comment as $k => $list)
                  <div class="mod-content">
                      <div class="comment-list-container" data-hot="10">
                          <ul>
                              <li class="comment-container " data-val="{commentid:110366644}">
                                <div class="portrait-container">
                                  <div class="portrait">
                                    <img src="ccd73b01aeeb08593763f04b8a06dcc868322.jpg@100w_100h_1e_1c" alt="">
                                  </div>
                                  <i class="level-3-icon"></i>
                                </div>
                                <div class="main">
                                  <div class="main-header clearfix">
                                    <div class="user">

                                      <span class="name">{{$phone[$k]}}</span>

                                      
                                        <span class="tag">购</span>
                                    </div>
                                    <div class="time">
                                        <span >{{$list->created_at}}</span>
                                    </div>
                                    <div class="approve " data-id="110366644">
                                      <i data-act="comment-approve-click" class="approve-icon"></i><span class="num">{{$list->support}}</span>
                                    </div>
                                  </div>
                                  <div class="comment-content">{{$list->comment}}</div>
                                </div>
                              </li>  
                          </ul>
                      </div>
                  </div>
                @endforeach


              </div>
          </div>
      </div>
    </div>
  </div>


<!-- Button trigger modal -->



  <div class="related">
  <div class="module">
    <div class="mod-title">
      <h3>相关资讯</h3>
    </div>
    <div class="mod-content">
        <dl class="news-list">
          <dd class="news-item" data-act="new-click" data-val="{newsid:21786}">
            <div class="news-img">
              <a href="http://maoyan.com/films/news/21786" target="_blank">
                <img class="news-img-default" src="loading_2.e3d934bf.png">
                <img class="news-img-detail" src="944d7de8aadfab163bae5f7fdc4dd063289071.png@140w_86h_1e_1c">
              </a>
            </div>
            <div class="news-main">
              <div class="news-title">
                <a href="http://maoyan.com/films/news/21786" target="_blank">《变形金刚5》今日内地公映，六大看点全揭秘</a>
              </div>
              <div class="news-info">
                <span class="news-source">猫眼电影</span><!--
                --><span><i class="news-icon news-icon-views"></i>13028</span><!--
                --><span><i class="news-icon news-icon-comments"></i>10</span>
              </div>
            </div>
          </dd>
          <dd class="news-item" data-act="new-click" data-val="{newsid:21781}">
            <div class="news-img">
              <a href="http://maoyan.com/films/news/21781" target="_blank">
                <img class="news-img-default" src="loading_2.e3d934bf.png">
                <img class="news-img-detail" src="6f11d3c0f418da629d23e0a27c3b7ea1205883.jpg@140w_86h_1e_1c">
              </a>
            </div>
            <div class="news-main">
              <div class="news-title">
                <a href="http://maoyan.com/films/news/21781" target="_blank">《变形金刚5》票房破亿，午夜场坐收4100万，创系列新高</a>
              </div>
              <div class="news-info">
                <span class="news-source">猫眼电影</span><!--
                --><span><i class="news-icon news-icon-views"></i>8918</span><!--
                --><span><i class="news-icon news-icon-comments"></i>51</span>
              </div>
            </div>
          </dd>
          <dd class="news-item" data-act="new-click" data-val="{newsid:21753}">
            <div class="news-img">
              <a href="http://maoyan.com/films/news/21753" target="_blank">
                <img class="news-img-default" src="loading_2.e3d934bf.png">
                <img class="news-img-detail" src="55696e6f108a3e191dab1562c55de5111126151.png@140w_86h_1e_1c">
              </a>
            </div>
            <div class="news-main">
              <div class="news-title">
                <a href="http://maoyan.com/films/news/21753" target="_blank">这位缺席了第四部的《变形金刚》老面孔，以为自己再也演不上了</a>
              </div>
              <div class="news-info">
                <span class="news-source">猫眼电影</span><!--
                --><span><i class="news-icon news-icon-views"></i>22796</span><!--
                --><span><i class="news-icon news-icon-comments"></i>9</span>
              </div>
            </div>
          </dd>
        </dl>
    </div>
  </div>
  <div class="module">
    <div class="mod-title">
      <h3>相关电影</h3>
    </div>
    <div class="mod-content">
              <div class="related-movies">
<dl class="movie-list">
  <dd>
    <div class="movie-item">
      <a href="http://maoyan.com/films/78379" target="_blank" data-act="movie-click" data-val="{movieid:78379}">
      <div class="movie-poster">
        <img class="poster-default" src="loading_2.e3d934bf.png">
        <img src="85534dd17ed002104db25254d1825728127189.jpg@106w_145h_1e_1c">
      </div>
      </a>
      <div class="movie-ver"></div>
    </div>
    <div class="channel-detail movie-item-title" title="变形金刚4：绝迹重生">
      <a href="http://maoyan.com/films/78379" target="_blank" data-act="movies-click" data-val="{movieId:78379}">变形金刚4：绝迹重生</a>
    </div>
<div class="channel-detail channel-detail-orange"><i class="integer">9.</i><i class="fraction">2</i></div>
  
  </dd><dd>
    <div class="movie-item">
      <a href="http://maoyan.com/films/47" target="_blank" data-act="movie-click" data-val="{movieid:47}">
      <div class="movie-poster">
        <img class="poster-default" src="loading_2.e3d934bf.png">
        <img src="__40729683__8445804.jpg@106w_145h_1e_1c">
      </div>
      </a>
      <div class="movie-ver"></div>
    </div>
    <div class="channel-detail movie-item-title" title="变形金刚3">
      <a href="http://maoyan.com/films/47" target="_blank" data-act="movies-click" data-val="{movieId:47}">变形金刚3</a>
    </div>
<div class="channel-detail channel-detail-orange"><i class="integer">8.</i><i class="fraction">7</i></div>
  
  </dd><dd>
    <div class="movie-item">
      <a href="http://maoyan.com/films/30799" target="_blank" data-act="movie-click" data-val="{movieid:30799}">
      <div class="movie-poster">
        <img class="poster-default" src="loading_2.e3d934bf.png">
        <img src="9813738.jpg@106w_145h_1e_1c">
      </div>
      </a>
      <div class="movie-ver"></div>
    </div>
    <div class="channel-detail movie-item-title" title="变形金刚2">
      <a href="http://maoyan.com/films/30799" target="_blank" data-act="movies-click" data-val="{movieId:30799}">变形金刚2</a>
    </div>
<div class="channel-detail channel-detail-orange"><i class="integer">8.</i><i class="fraction">7</i></div>
  
  </dd><dd>
    <div class="movie-item">
      <a href="http://maoyan.com/films/20652" target="_blank" data-act="movie-click" data-val="{movieid:20652}">
      <div class="movie-poster">
        <img class="poster-default" src="loading_2.e3d934bf.png">
        <img src="__40637604__2861442.jpg@106w_145h_1e_1c">
      </div>
      </a>
      <div class="movie-ver"></div>
    </div>
    <div class="channel-detail movie-item-title" title="变形金刚">
      <a href="http://maoyan.com/films/20652" target="_blank" data-act="movies-click" data-val="{movieId:20652}">变形金刚</a>
    </div>
<div class="channel-detail channel-detail-orange"><i class="integer">8.</i><i class="fraction">9</i></div>
  
  </dd><dd>
    <div class="movie-item">
      <a href="http://maoyan.com/films/248683" target="_blank" data-act="movie-click" data-val="{movieid:248683}">
      <div class="movie-poster">
        <img class="poster-default" src="loading_2.e3d934bf.png">
        <img src="fbe5f97c016c9f4520109dc70f458d4d83363.jpg@106w_145h_1e_1c">
      </div>
      </a>
      <div class="movie-ver"></div>
    </div>
    <div class="channel-detail movie-item-title" title="银河护卫队2">
      <a href="http://maoyan.com/films/248683" target="_blank" data-act="movies-click" data-val="{movieId:248683}">银河护卫队2</a>
    </div>
<div class="channel-detail channel-detail-orange"><i class="integer">9.</i><i class="fraction">0</i></div>
  
  </dd><dd>
    <div class="movie-item">
      <a href="http://maoyan.com/films/247875" target="_blank" data-act="movie-click" data-val="{movieid:247875}">
      <div class="movie-poster">
        <img class="poster-default" src="loading_2.e3d934bf.png">
        <img src="0b7cc256954866593a8e79009acade71487726.jpg@106w_145h_1e_1c">
      </div>
      </a>
      <div class="movie-ver"></div>
    </div>
    <div class="channel-detail movie-item-title" title="金刚狼3：殊死一战">
      <a href="http://maoyan.com/films/247875" target="_blank" data-act="movies-click" data-val="{movieId:247875}">金刚狼3：殊死一战</a>
    </div>
<div class="channel-detail channel-detail-orange"><i class="integer">8.</i><i class="fraction">6</i></div>
  
</dd></dl>

</div>


    </div>
  </div>
  </div>
</div>

</div>

@endsection

