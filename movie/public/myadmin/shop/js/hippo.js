!function(){var n="hippo@1.2.28/lib/hippo3.js",t={},e=t;define(n,[],function(n,t,e,o,r){!function(){function n(){function n(){return Math.floor(65536*(1+Math.random())).toString(16).substring(1)}return n()+n()+"-"+n()+"-"+n()+"-"+n()+"-"+n()+n()+n()}function t(n){window.console&&console.log(n)}function o(n,t,e,o,r){var i=new Date;i.setTime(i.getTime()+24*e*60*60*1e3);var a=n+"="+t,u="expires="+i.toUTCString(),r="path="+r,o="domain="+o;document.cookie=[a,u,o,r].join(";")}function r(){var n=document.cookie.match(/_hc.v=([^;]+)/);return n?n[1]:null}function i(){return n()+"."+Math.round(+new Date/1e3)}function a(){for(var n=w.domain.split(".");n.length>2;)n.shift();var e="."+n.join("."),r=i();t("hippo:setHCV",r),o("_hc.v",r,365,e,"/")}function u(n){if(N)return n();if(O)return void L.push(n);O=!0,L.push(n);var e,o=q.DPApp&&q.DPApp.dequeue,r={__type__:"hippo",callback:function(n,e){t("hippo:callback",n,e);var o=q[this._generateCallbackName(n)];o&&o.call(this,e)},_generateCallbackName:function(n){return"DPApp_callback_"+n},_generateCallbackId:function(){var n=Math.floor(1e3*Math.random()),t=+new Date;return+(t+""+n)},dequeue:function(){o&&o()},getRequestId:function(n){function e(){a.onload=a.onerror=null,a.parentNode&&a.parentNode.removeChild(a)}var o=n.success,r=this._generateCallbackId();q[this._generateCallbackName(r)]=function(n){o&&o(n)},t("hippo:callbackId "+r);var i="js://_?method=getRequestId&args=%7B%7D&callbackId="+r;if(V&&"android"==B)q.prompt(i);else{var a=document.createElement("iframe");a.style.display="none",a.onload=a.onerror=e,setTimeout(e,5e3),a.src=i,document.body.appendChild(a)}}};q.DPApp?DPApp.callNative?e=function(n){DPApp.callNative("getRequestId",n)}.bind(DPApp):DPApp.getRequestId&&(e=DPApp.getRequestId):(q.DPApp=r,e=r.getRequestId.bind(r)),P(function(){V&&"ios"==B&&q._DPApp&&q._DPApp.requestId?(mn.reqid=N=q._DPApp.requestId,t("reqid:"+q._DPApp.requestId),L.forEach(function(n){n()}),L=[],O=!1,N=null):e({success:function(n){mn.reqid=N=n.requestId,t("reqid:"+n.requestId),L.forEach(function(n){n()}),L=[],O=!1,V&&"android"==B&&(N=null)}})})}function c(n,t,e,o){if(/com\.dianping/.test(navigator.userAgent)&&!N)return mn.appname="dianping",void u(function(){c(n,t,e,o)});var r=tn+dn(n,t,e);if(o)return void p(r);var i=setTimeout(function(){x[i]=!1;var n=new Image(1,1);R.push(n),f(n),n.src=r,r=null},0);x[i]=r}function f(n){["onload","onerror","onabort"].forEach(function(t){n[t]=function(){try{n.onload=n.onerror=n.onabort=null}catch(e){}"onabort"===t&&n.src&&p(n.src),s(n,R)}})}function s(n,t){for(var e,o=0,r=t.length;r>o;o++)if(e=t[o],e===n){t.splice(o,1);break}}function d(){return new XMLHttpRequest}function p(n){if(!(window.navigator.userAgent.indexOf("MSIE")>-1)){var t=F();/^evt|h5|^event|^e\.|midas|meituan|apollo/.test(location.host)||(n=n.replace(nn,"")),t.open("GET",n,!1),t.withCredentials=!0,t.send()}}function l(n){var t,e,o=encodeURIComponent,r=[];for(t in n)e=n[t],Object(e)!==e&&r.push(t+"="+o(e||""));return r.join("&")}function h(n,t,e){var o;if(t){for(o in t)e&&o in n||(n[o]=t[o]);return n}}function v(n,t){return"string"==typeof n&&Object(t)!==t}function _(n,t){return _n._setPageId(n),_}function m(n,t){mn[n]=t}function g(n){c(un,[],n||pn),pn={}}function D(n,t){return n>0?n:t}function b(){gn=+new Date}function I(){var n,t=q.performance,e=t&&t.timing,o=gn-Dn,r=+new Date-Dn,i={r_pagetiming:1,r_ready:o,r_load:r};e&&h(i,{r_conn:e.connectEnd-e.connectStart,r_recev:e.responseEnd-e.responseStart,r_ready:D(e.domInteractive-e.domLoading,o),r_wait:e.responseStart-e.requestStart,r_load:D(e.loadEventStart-e.domLoading,r)}),((n=ln)||(n=q.DP&&DP.data&&DP.data("hippo_perf_version")))&&(i.test=n),_n.mv(i),bn(q,"load",I)}function P(n){if("complete"===w.readyState)return n();var t=w.documentElement.doScroll,e=t?"readystatechange":"DOMContentLoaded",o=function(){bn(w,e,o),bn(q,"load",o),n()};if(M(w,e,o),M(q,"load",o),t){var r=function(){try{t("left"),o()}catch(n){setTimeout(r,10)}},i=!1;try{i=null==q.frameElement}catch(a){}i&&r()}}var q=window,y=q._hip,w=q.document,A=w.location,E=w.referrer,C=A.href,T=q.screen,S=w.createElement("div"),j="addEventListener",k="removeEventListener",M=S[j]?function(n,t,e,o){n[j](t,e,!!o)}:function(n,t,e){n.attachEvent("on"+t,e)};if(y||(y=q._hip=[]),"undefined"!=typeof e&&e.exports&&(e.exports=y),!y.loaded){y.loaded=!0;var R=[];y.queue=R;var N,O,x={},L=[];r()||a();var V,H=/dp\/com\.dianping\.[\w\.]+\/([\d\.]+)/i,X=function(n){var t,e=n.match(H);return e&&(t=e[1]),t},G=function(n){var t=/android/i,e=/ipad|iphone/i;return t.test(n)?"android":e.test(n)?"ios":void 0},J={eq:function(n,t){return n===t},gt:function(n,t){var e=n?n.split("."):[],o=t?t.split("."):[];return[0,1,2].forEach(function(n){e[n]=e[n]||0,o[n]=o[n]||0}),+e[0]!==+o[0]?+e[0]>+o[0]:+e[1]!==+o[1]?+e[1]>+o[1]:+e[2]>+(o[2]||0)},lt:function(n,t){return!this.gte(n,t)},gte:function(n,t){return this.eq(n,t)||this.gt(n,t)},lte:function(n,t){return this.eq(n,t)||this.lt(n,t)}},U=q.navigator.userAgent,B=G(U),z=X(U);z&&J.gte(z,"8.1.0")&&(V=!0);var F=q.ActiveXObject?function(){if(q.XMLHttpRequest)try{return d()}catch(n){}try{return new q.ActiveXObject("Microsoft.XMLHTTP")}catch(n){}}:d,K=!1;q.onbeforeunload=q.onunload=function(){if(!K){K=!0;var n,t;for(n in x)t=x[n],t&&(clearTimeout(Number(n)),p(t))}};var Q=0,W=0,Y=0,Z="www.dianping.com",$=function(){},nn="//hls."+(/51ping/.test(w.domain)?"51ping":"dianping")+".com";nn=/\.dper\.com/.test(w.domain)?"//hls.dper.com":nn;var tn=nn+"/hippo.gif?",en="__hsr",on="__hsc",rn="__hlh",an="__hlr",un="__pv",cn="__mv",fn=function(){return q.JSON&&JSON.stringify||function(n){var t,e,o=[];for(t in n)e=n[t],Object(e)!==e&&o.push('"'+t+'":"'+(""+e).replace(/"/g,'\\"')+'"');return"{"+o.join(",")+"}"}}(),sn=Array.prototype;sn.forEach||(sn.forEach=function(n,t){for(var e=0,o=this.length;o>e;e++)e in this&&n.call(t,this[e],e,this)});var dn=function(){var n,t,e,o,r={};return(e=T)&&(n=e.height,t=e.width,n&&t&&(r[en]=t+"x"+n),(o=e.colorDepth)&&(r[on]=o+"bit")),function(n,t,e){e=e||{},h(e,mn,!1);var o={__hlt:Z,__ppp:Q,__had:fn(e),force:+new Date};return h(o,r),C&&(o[rn]=C),E&&(o[an]=E),t.push(Y+"|"+W),o[n]=t.join("|"),l(o)}}(),pn={};h(_,{ext:function(n,t){var e;if(Object(n)===n)for(e in n)_.ext(e,n[e]);else v(n,t)&&(pn[n]=t);return _},rxt:function(n){return"string"==typeof n?delete pn[n]:arguments.length||(pn={}),_},pv:function(n,t){return _n._setCityId(n),_n._setShopType(t),_n._setPVInitData(pn),_},mv:function(n,t){return v(n,t)&&(pn[n]=t,_n.mv(pn)),_}}),document.hippo=_;var ln,hn=!0,vn=!0,_n={_setPageId:function(n){Q=n>>>0},_setCityId:function(n){Y=n>>>0},_setShopType:function(n){W=n>>>0},_setPVInitData:function(n){_n._setPVInitData=$,setTimeout(function(){g(n)},0)},_autoPV:function(n){hn=n},_autoPageTiming:function(n){vn=n},_setPageTimingVer:function(n){ln=n},_setReferrer:function(n){E=n},_setHref:function(n){C=n},_setRequestId:function(n){m("reqid",n)},_setGuid:function(n){m("serverguid",n)},_setCustomConst:m,mv:function(n,t){c(cn,["",""],n||pn,t),pn={}},pv:function(n){g(n)}},mn={};y.push=function(n){var t,e;n&&(t=n.shift(),e=_n[t],e&&e.apply(null,n))},y.forEach(function(n){y.push(n)}),hn&&y.push(["_setPVInitData"]),y.length=0;var gn,Dn=q.G_rtop,bn=S[k]?function(n,t,e,o){n[k](t,e,!!o)}:function(n,t,e){n.detachEvent("on"+t,e)};vn&&(P(b),M(q,"load",I))}}()},{main:!0,map:e})}();
//# sourceMappingURL=hippo.js.map