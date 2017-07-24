!function(){function t(t,e){for(var n in e)t[n]=e[n];return t}var e="request@~0.2.0",n="jquery@~1.9.2",i="fx@~1.0.0",a="app-main-citylist@1.0.7/lib/citypicker.js",s="suggest@~0.2.0",o="align@~1.0.0",r="class@~2.0.5",c="app-main-citylist@1.0.7/lib/index.js",l={},u=l;define(c,[e,n,i,a],function(t,e){"use strict";function n(){new c({url:"/ajax/json/index/citylist/getCitylist?do=allCitylist"}).on("success",function(t){200===t.code&&t.msg&&(s(t.msg.html),v.on("click",r))}).send(),new c({url:"/ajax/citylist/guess"}).on("success",function(t){200===t.code&&t.msg&&l(".related").html(t.msg)}).send(),o(l(".nav-citylist .first"),l(".glossary-list")),l(".gl-region .fn-more a").on("click",a("region")),l(".gl-py .fn-more a").on("click",a("py")),i()}function i(){function t(){o.off("complete"),n.css("display","block"),o.start(0,1),s=!0,f&&n.css("position","absolute")}function e(){o.on("complete",function(){n.css("display","none")}),o.start(1,0),s=!1,f&&(n.css("position",""),n.css("top",""))}var n=l("<div>").addClass("toTop").appendTo(document.body),i=200,a=10,s=!1,o=new u(n,{property:"opacity",duration:i});n.on("click",function(){var t,n=i/a,s=0,o=document.documentElement.scrollTop+document.body.scrollTop;g?h.scrollTo(0,0):t=setInterval(function(){var e=o/n;s++,h.scrollBy(0,-e),s>n&&(scrollTo(0,0),clearInterval(t),t=null)},a),e()}),l(h).on("scroll",function(){var i=document.documentElement.scrollTop+document.body.scrollTop;i>x?(s||t(),f&&n.css("top",document.documentElement.clientHeight+i-n.height()-10)):s&&e()})}function a(t){var e="py"===t,n={},i=e?"firstPY":"pID";return n["do"]=e?"getByPY":"getbyprovince",function(){var t=l(this).parent(),a=t.attr("data-v");return n[i]=a,new c({url:"/ajax/json/index/citylist/getCitylist",data:n}).on("success",function(n){var i,a,s=n.code,o=n.msg;200===s&&(e?i=a=t.parent():(a=t.parent(),i=a.parent()),i.removeClass("terms").addClass("terms-open"),a.html(a.html()+o.html),t.remove())}).send(),!1}}function s(t){var e=l("#citySel");new p(e,t,{zIndex:10,autoselect:!0,container:y,panelClass:"autocompleter"}).on("select",function(t){dpga("dp_citylist_new_searchcity"),C=t.data.city,r()})}function o(t,e){var n="Hide",i="this",a="click";t.length&&e.length&&e.length==t.length&&t.each(function(s,o){var r=l(o);r.on(a,function(){var a=l(this);t.removeClass(i),a.addClass(i),e.addClass(n),e.eq(s).removeClass(n),h.scrollTo(0,0)})})}function r(){return C&&location.assign(C),!1}var c=t("request").Ajax,l=t("jquery"),u=t("fx").Tween,p=t("./citypicker"),d=navigator.userAgent,g=/msie/i.test(d),f=/msie 6/i.test(d),h=window,m=l(".fixed-header"),v=l("#qBtn"),y=l(".search-fields-wrapper"),x=m.offset().top,C=null;e.init=n},{main:!0,map:t({"./citypicker":a},u)}),define(a,[s,o,r,n],function(t,e,n){"use strict";function i(t,e){for(var n=[],i=Math.ceil(t.length/e),a=0;i>a;a++)n.push(t.slice(a*e,(a+1)*e));return n}function a(t,e){var n=t.split("|"),i=e.toLowerCase(),a=n[0],s=n[1],o=n[2].toLowerCase();return-1!==a.indexOf(i)||-1!==s.indexOf(i)||-1!==o.indexOf(i)?!0:!1}function s(t,e,n){var s;return s=t?function(t,e){for(var s=[],o=0,r=t.length;r>o;o++){var c=t[o];a(c,e)&&s.push(c)}return s=s.length?i(s,n):[[]]}(e,t):[e.slice(0,n)]}var o=t("suggest"),r=t("align"),c=t("class"),l=t("jquery"),u=c({Implements:"attrs events",initialize:function(t,e,n){function i(n){var i=t.val().trim(),o=c.data=s(i,e,a);c.currentPage=0,c.renderpage(),!c._isCommand(n)&&o[0].length&&(c.suggest.render(i,c._parseData(o[0])),c.get("autoSelect")&&c.suggest.preselect(0),c.show())}var a=12;this.set(n),this.input=t=l(t);var r=this.panel=l("<div>").addClass(this.get("panelClass")).html('<div class="ac_title">输入中文/拼音或↑↓选择</div><ul></ul>').css({position:"absolute",height:"auto","z-index":this.get("zIndex")}),c=this;this.suggest=o(t,{itemActiveClass:"ac_select",container:this.get("container"),panel:this.panel,itemWrapper:"ul",itemRenderer:function(t){var e=l('<li><span style="float:right;display:none">'+t.city_id+"</span><p>"+t.pinyin+"("+t.abbr+")</p>"+t.text+"</li>");return e}}).on("select",function(t){c.input.val(t.data.text),c.close(),c.emit("select",t)}),this._setPanelWidth(),this._setPanelAlign(),this.paginator=l("<div>").addClass("ac_page").appendTo(r),t.on("keyup",i),t.on("click",i)},_setPanelWidth:function(){var t=this.input.outerWidth(),e=this.panel;e.width(["border-left-width","border-right-width","padding-left","padding-right"].reduce(function(t,n){return t-parseInt(e.css(n)||0,10)},t))},_setPanelAlign:function(){r(this.panel).to(this.input,["tl","bl"],{adjust:this.get("adjust")})},_parseData:function(t){return t.map(function(t){var e=t.split("|");return{text:e[0],pinyin:e[1],abbr:e[2],city_id:e[3],city:e[4]}})},_isCommand:function(t){return~[37,38,39,40,13].indexOf(t.keyCode)},renderpage:function(){var t=this,e=t.data,n=e.length,i=t.paginator,a=t.currentPage,s=a-2>0?a-2:0,o=n-1>a+2?a+2:n-1,r=l("<a>").attr("href","#").html("←"),c=l("<a>").attr("href","#").html("→");if(i.empty(),e.length>1){i.css("display","block"),r.appendTo(i);for(var u=s;o>=u;u++){var p=l("<a>").attr("href","#").addClass(u===t.currentPage?"ac_page_select":"ac_page_normal").html(u+1).appendTo(i);!function(e){p.on("click",function(){return t.pageTo(e),!1})}(u)}c.appendTo(i),r.on("click",function(n){n.preventDefault(),n.stopPropagation();var i=t.currentPage-1<0?e.length-1:t.currentPage-1;t.pageTo(i)}),c.on("click",function(n){n.preventDefault(),n.stopPropagation();var i=t.currentPage+1>e.length-1?0:t.currentPage+1;t.pageTo(i)})}else i.css("display","none")},show:function(){this.suggest.show(),this.emit("show")},close:function(){this.suggest.close(),this.emit("close")},pageTo:function(t){var e=this,n=e.data;e.currentPage=t,e.suggest.render(e.input.val(),n[t],!0),e.renderpage()}},{panelClass:{value:""},adjust:{value:{top:0,left:0},validator:function(t){return Object(t)===t},setter:function(t){var e=this.get("adjust");return t.top&&(e.top=t.top),t.left&&(e.left=t.left),e}},zIndex:{value:""},autoSelect:{value:!1},container:{getter:function(t){return t||l(document.body)}}});n.exports=u},{map:u})}();