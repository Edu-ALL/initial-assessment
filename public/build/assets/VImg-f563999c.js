import{p as V,aL as K,W,bE as Q,b3 as X,m as E,H as Y,k as D,J as Z,x as F,d as r,c as R,bG as M,z as p,D as ee,v as te,E as ne,a2 as re,K as h,L as ae,M as T,aQ as se,a0 as ie,aB as oe,ah as O,ai as le,S as ue,y as ce,aj as de}from"./main-c726d500.js";const ve=V({transition:{type:[Boolean,String,Object],default:"fade-transition",validator:e=>e!==!0}},"transition"),I=(e,o)=>{let{slots:a}=o;const{transition:n,disabled:c,group:d,...f}=e,{component:v=d?Q:X,...S}=typeof n=="object"?n:{};return K(v,W(typeof n=="string"?{name:c?"":n}:S,typeof n=="string"?{}:{disabled:c,group:d},f),a)};function ge(e){return{aspectStyles:R(()=>{const o=Number(e.aspectRatio);return o?{paddingBottom:String(1/o*100)+"%"}:void 0})}}const x=V({aspectRatio:[String,Number],contentClass:String,inline:Boolean,...E(),...Y()},"VResponsive"),U=D()({name:"VResponsive",props:x(),setup(e,o){let{slots:a}=o;const{aspectStyles:n}=ge(e),{dimensionStyles:c}=Z(e);return F(()=>{var d;return r("div",{class:["v-responsive",{"v-responsive--inline":e.inline},e.class],style:[c.value,e.style]},[r("div",{class:"v-responsive__sizer",style:n.value},null),(d=a.additional)==null?void 0:d.call(a),a.default&&r("div",{class:["v-responsive__content",e.contentClass]},[a.default()])])}),{}}});function me(e,o){if(!M)return;const a=o.modifiers||{},n=o.value,{handler:c,options:d}=typeof n=="object"?n:{handler:n,options:{}},f=new IntersectionObserver(function(){var g;let v=arguments.length>0&&arguments[0]!==void 0?arguments[0]:[],S=arguments.length>1?arguments[1]:void 0;const s=(g=e._observe)==null?void 0:g[o.instance.$.uid];if(!s)return;const i=v.some(y=>y.isIntersecting);c&&(!a.quiet||s.init)&&(!a.once||i||s.init)&&c(i,v,S),i&&a.once?H(e,o):s.init=!0},d);e._observe=Object(e._observe),e._observe[o.instance.$.uid]={init:!1,observer:f},f.observe(e)}function H(e,o){var n;const a=(n=e._observe)==null?void 0:n[o.instance.$.uid];a&&(a.observer.unobserve(e),delete e._observe[o.instance.$.uid])}const fe={mounted:me,unmounted:H},Se=fe,ye=V({alt:String,cover:Boolean,color:String,draggable:{type:[Boolean,String],default:void 0},eager:Boolean,gradient:String,lazySrc:String,options:{type:Object,default:()=>({root:void 0,rootMargin:void 0,threshold:void 0})},sizes:String,src:{type:[String,Object],default:""},crossorigin:String,referrerpolicy:String,srcset:String,position:String,...x(),...E(),...p(),...ve()},"VImg"),be=D()({name:"VImg",directives:{intersect:Se},props:ye(),emits:{loadstart:e=>!0,load:e=>!0,error:e=>!0},setup(e,o){let{emit:a,slots:n}=o;const{backgroundColorClasses:c,backgroundColorStyles:d}=ee(te(e,"color")),{roundedClasses:f}=ne(e),v=re("VImg"),S=h(""),s=ae(),i=h(e.eager?"loading":"idle"),g=h(),y=h(),u=R(()=>e.src&&typeof e.src=="object"?{src:e.src.src,srcset:e.srcset||e.src.srcset,lazySrc:e.lazySrc||e.src.lazySrc,aspect:Number(e.aspectRatio||e.src.aspect||0)}:{src:e.src,srcset:e.srcset,lazySrc:e.lazySrc,aspect:Number(e.aspectRatio||0)}),_=R(()=>u.value.aspect||g.value/y.value||0);T(()=>e.src,()=>{z(i.value!=="idle")}),T(_,(t,l)=>{!t&&l&&s.value&&b(s.value)}),se(()=>z());function z(t){if(!(e.eager&&t)&&!(M&&!t&&!e.eager)){if(i.value="loading",u.value.lazySrc){const l=new Image;l.src=u.value.lazySrc,b(l,null)}u.value.src&&ie(()=>{var l;a("loadstart",((l=s.value)==null?void 0:l.currentSrc)||u.value.src),setTimeout(()=>{var m;if(!v.isUnmounted)if((m=s.value)!=null&&m.complete){if(s.value.naturalWidth||C(),i.value==="error")return;_.value||b(s.value,null),i.value==="loading"&&k()}else _.value||b(s.value),w()})})}}function k(){var t;v.isUnmounted||(w(),b(s.value),i.value="loaded",a("load",((t=s.value)==null?void 0:t.currentSrc)||u.value.src))}function C(){var t;v.isUnmounted||(i.value="error",a("error",((t=s.value)==null?void 0:t.currentSrc)||u.value.src))}function w(){const t=s.value;t&&(S.value=t.currentSrc||t.src)}let P=-1;oe(()=>{clearTimeout(P)});function b(t){let l=arguments.length>1&&arguments[1]!==void 0?arguments[1]:100;const m=()=>{if(clearTimeout(P),v.isUnmounted)return;const{naturalHeight:$,naturalWidth:N}=t;$||N?(g.value=N,y.value=$):!t.complete&&i.value==="loading"&&l!=null?P=window.setTimeout(m,l):(t.currentSrc.endsWith(".svg")||t.currentSrc.startsWith("data:image/svg+xml"))&&(g.value=1,y.value=1)};m()}const B=R(()=>({"v-img__img--cover":e.cover,"v-img__img--contain":!e.cover})),L=()=>{var m;if(!u.value.src||i.value==="idle")return null;const t=r("img",{class:["v-img__img",B.value],style:{objectPosition:e.position},src:u.value.src,srcset:u.value.srcset,alt:e.alt,crossorigin:e.crossorigin,referrerpolicy:e.referrerpolicy,draggable:e.draggable,sizes:e.sizes,ref:s,onLoad:k,onError:C},null),l=(m=n.sources)==null?void 0:m.call(n);return r(I,{transition:e.transition,appear:!0},{default:()=>[O(l?r("picture",{class:"v-img__picture"},[l,t]):t,[[de,i.value==="loaded"]])]})},q=()=>r(I,{transition:e.transition},{default:()=>[u.value.lazySrc&&i.value!=="loaded"&&r("img",{class:["v-img__img","v-img__img--preload",B.value],style:{objectPosition:e.position},src:u.value.lazySrc,alt:e.alt,crossorigin:e.crossorigin,referrerpolicy:e.referrerpolicy,draggable:e.draggable},null)]}),A=()=>n.placeholder?r(I,{transition:e.transition,appear:!0},{default:()=>[(i.value==="loading"||i.value==="error"&&!n.error)&&r("div",{class:"v-img__placeholder"},[n.placeholder()])]}):null,G=()=>n.error?r(I,{transition:e.transition,appear:!0},{default:()=>[i.value==="error"&&r("div",{class:"v-img__error"},[n.error()])]}):null,J=()=>e.gradient?r("div",{class:"v-img__gradient",style:{backgroundImage:`linear-gradient(${e.gradient})`}},null):null,j=h(!1);{const t=T(_,l=>{l&&(requestAnimationFrame(()=>{requestAnimationFrame(()=>{j.value=!0})}),t())})}return F(()=>{const t=U.filterProps(e);return O(r(U,W({class:["v-img",{"v-img--booting":!j.value},c.value,f.value,e.class],style:[{width:ce(e.width==="auto"?g.value:e.width)},d.value,e.style]},t,{aspectRatio:_.value,"aria-label":e.alt,role:e.alt?"img":void 0}),{additional:()=>r(ue,null,[r(L,null,null),r(q,null,null),r(J,null,null),r(A,null,null),r(G,null,null)]),default:n.default}),[[le("intersect"),{handler:z,options:e.options},null,{once:!0}]])}),{currentSrc:S,image:s,state:i,naturalWidth:g,naturalHeight:y}}});export{Se as I,I as M,be as V,ve as m};
