import{k as E,d as m,W as D,b4 as re,p as x,af as $,K as B,ad as j,b5 as T,L as I,a7 as Z,c as p,aC as we,a2 as et,aA as Ce,b6 as tt,I as M,m as U,i as q,v as k,x as _,G as H,ah as ke,aj as nt,aZ as ue,a_ as Ve,h as Pe,H as Ie,B as Ae,z as xe,a$ as at,j as Le,ap as Oe,ae as lt,b1 as st,M as Ee,l as Me,b0 as Be,aq as it,n as Te,J as De,F as Fe,E as $e,b7 as ot,ai as rt,at as ut,S as ce,V as de,ag as ct,aY as dt,b8 as A,a5 as ne,D as vt,s as ft,aH as Q,b9 as mt,a0 as yt,ba as ve,bb as gt}from"./main-4d564748.js";import{a as pt}from"./index-62bac941.js";import{u as ht}from"./ssrBoot-1d282432.js";import{M as bt}from"./VImg-daf37cfd.js";import{a as R,d as St,s as fe,b as wt,g as Ct,n as kt,c as je,V as me,f as Vt}from"./VAvatar-3488a1fc.js";import{V as Pt}from"./VDivider-45333b76.js";import{m as It,u as At,a as ye,V as ge}from"./VOverlay-626725c0.js";const xt=x({target:[Object,Array]},"v-dialog-transition"),Lt=E()({name:"VDialogTransition",props:xt(),setup(e,s){let{slots:t}=s;const n={onBeforeEnter(l){l.style.pointerEvents="none",l.style.visibility="hidden"},async onEnter(l,a){var c;await new Promise(d=>requestAnimationFrame(d)),await new Promise(d=>requestAnimationFrame(d)),l.style.visibility="";const{x:i,y:o,sx:f,sy:y,speed:g}=he(e.target,l),r=R(l,[{transform:`translate(${i}px, ${o}px) scale(${f}, ${y})`,opacity:0},{}],{duration:225*g,easing:St});(c=pe(l))==null||c.forEach(d=>{R(d,[{opacity:0},{opacity:0,offset:.33},{}],{duration:225*2*g,easing:fe})}),r.finished.then(()=>a())},onAfterEnter(l){l.style.removeProperty("pointer-events")},onBeforeLeave(l){l.style.pointerEvents="none"},async onLeave(l,a){var c;await new Promise(d=>requestAnimationFrame(d));const{x:i,y:o,sx:f,sy:y,speed:g}=he(e.target,l);R(l,[{},{transform:`translate(${i}px, ${o}px) scale(${f}, ${y})`,opacity:0}],{duration:125*g,easing:wt}).finished.then(()=>a()),(c=pe(l))==null||c.forEach(d=>{R(d,[{},{opacity:0,offset:.2},{opacity:0}],{duration:125*2*g,easing:fe})})},onAfterLeave(l){l.style.removeProperty("pointer-events")}};return()=>e.target?m(re,D({name:"dialog-transition"},n,{css:!1}),t):m(re,{name:"dialog-transition"},t)}});function pe(e){var t;const s=(t=e.querySelector(":scope > .v-card, :scope > .v-sheet, :scope > .v-list"))==null?void 0:t.children;return s&&[...s]}function he(e,s){const t=Ct(e),n=kt(s),[l,a]=getComputedStyle(s).transformOrigin.split(" ").map(b=>parseFloat(b)),[i,o]=getComputedStyle(s).getPropertyValue("--v-overlay-anchor-origin").split(" ");let f=t.left+t.width/2;i==="left"||o==="left"?f-=t.width/2:(i==="right"||o==="right")&&(f+=t.width/2);let y=t.top+t.height/2;i==="top"||o==="top"?y-=t.height/2:(i==="bottom"||o==="bottom")&&(y+=t.height/2);const g=t.width/n.width,r=t.height/n.height,c=Math.max(1,g,r),d=g/c||0,v=r/c||0,u=n.width*n.height/(window.innerWidth*window.innerHeight),h=u>.12?Math.min(1.5,(u-.12)*10+1):1;return{x:f-(l+n.left),y:y-(a+n.top),sx:d,sy:v,speed:h}}const ee=Symbol.for("vuetify:list");function _e(){const e=$(ee,{hasPrepend:B(!1),updateHasPrepend:()=>null}),s={hasPrepend:B(!1),updateHasPrepend:t=>{t&&(s.hasPrepend.value=t)}};return j(ee,s),e}function Ge(){return $(ee,null)}const Ot={open:e=>{let{id:s,value:t,opened:n,parents:l}=e;if(t){const a=new Set;a.add(s);let i=l.get(s);for(;i!=null;)a.add(i),i=l.get(i);return a}else return n.delete(s),n},select:()=>null},Ke={open:e=>{let{id:s,value:t,opened:n,parents:l}=e;if(t){let a=l.get(s);for(n.add(s);a!=null&&a!==s;)n.add(a),a=l.get(a);return n}else n.delete(s);return n},select:()=>null},Et={open:Ke.open,select:e=>{let{id:s,value:t,opened:n,parents:l}=e;if(!t)return n;const a=[];let i=l.get(s);for(;i!=null;)a.push(i),i=l.get(i);return new Set(a)}},ae=e=>{const s={select:t=>{let{id:n,value:l,selected:a}=t;if(n=T(n),e&&!l){const i=Array.from(a.entries()).reduce((o,f)=>{let[y,g]=f;return g==="on"?[...o,y]:o},[]);if(i.length===1&&i[0]===n)return a}return a.set(n,l?"on":"off"),a},in:(t,n,l)=>{let a=new Map;for(const i of t||[])a=s.select({id:i,value:!0,selected:new Map(a),children:n,parents:l});return a},out:t=>{const n=[];for(const[l,a]of t.entries())a==="on"&&n.push(l);return n}};return s},Ne=e=>{const s=ae(e);return{select:n=>{let{selected:l,id:a,...i}=n;a=T(a);const o=l.has(a)?new Map([[a,l.get(a)]]):new Map;return s.select({...i,id:a,selected:o})},in:(n,l,a)=>{let i=new Map;return n!=null&&n.length&&(i=s.in(n.slice(0,1),l,a)),i},out:(n,l,a)=>s.out(n,l,a)}},Mt=e=>{const s=ae(e);return{select:n=>{let{id:l,selected:a,children:i,...o}=n;return l=T(l),i.has(l)?a:s.select({id:l,selected:a,children:i,...o})},in:s.in,out:s.out}},Bt=e=>{const s=Ne(e);return{select:n=>{let{id:l,selected:a,children:i,...o}=n;return l=T(l),i.has(l)?a:s.select({id:l,selected:a,children:i,...o})},in:s.in,out:s.out}},Tt=e=>{const s={select:t=>{let{id:n,value:l,selected:a,children:i,parents:o}=t;n=T(n);const f=new Map(a),y=[n];for(;y.length;){const r=y.shift();a.set(r,l?"on":"off"),i.has(r)&&y.push(...i.get(r))}let g=o.get(n);for(;g;){const r=i.get(g),c=r.every(v=>a.get(v)==="on"),d=r.every(v=>!a.has(v)||a.get(v)==="off");a.set(g,c?"on":d?"off":"indeterminate"),g=o.get(g)}return e&&!l&&Array.from(a.entries()).reduce((c,d)=>{let[v,u]=d;return u==="on"?[...c,v]:c},[]).length===0?f:a},in:(t,n,l)=>{let a=new Map;for(const i of t||[])a=s.select({id:i,value:!0,selected:new Map(a),children:n,parents:l});return a},out:(t,n)=>{const l=[];for(const[a,i]of t.entries())i==="on"&&!n.has(a)&&l.push(a);return l}};return s},F=Symbol.for("vuetify:nested"),Re={id:B(),root:{register:()=>null,unregister:()=>null,parents:I(new Map),children:I(new Map),open:()=>null,openOnSelect:()=>null,select:()=>null,opened:I(new Set),selected:I(new Map),selectedValues:I([])}},Dt=x({selectStrategy:[String,Function],openStrategy:[String,Object],opened:Array,selected:Array,mandatory:Boolean},"nested"),Ft=e=>{let s=!1;const t=I(new Map),n=I(new Map),l=Z(e,"opened",e.opened,r=>new Set(r),r=>[...r.values()]),a=p(()=>{if(typeof e.selectStrategy=="object")return e.selectStrategy;switch(e.selectStrategy){case"single-leaf":return Bt(e.mandatory);case"leaf":return Mt(e.mandatory);case"independent":return ae(e.mandatory);case"single-independent":return Ne(e.mandatory);case"classic":default:return Tt(e.mandatory)}}),i=p(()=>{if(typeof e.openStrategy=="object")return e.openStrategy;switch(e.openStrategy){case"list":return Et;case"single":return Ot;case"multiple":default:return Ke}}),o=Z(e,"selected",e.selected,r=>a.value.in(r,t.value,n.value),r=>a.value.out(r,t.value,n.value));we(()=>{s=!0});function f(r){const c=[];let d=r;for(;d!=null;)c.unshift(d),d=n.value.get(d);return c}const y=et("nested"),g={id:B(),root:{opened:l,selected:o,selectedValues:p(()=>{const r=[];for(const[c,d]of o.value.entries())d==="on"&&r.push(c);return r}),register:(r,c,d)=>{c&&r!==c&&n.value.set(r,c),d&&t.value.set(r,[]),c!=null&&t.value.set(c,[...t.value.get(c)||[],r])},unregister:r=>{if(s)return;t.value.delete(r);const c=n.value.get(r);if(c){const d=t.value.get(c)??[];t.value.set(c,d.filter(v=>v!==r))}n.value.delete(r),l.value.delete(r)},open:(r,c,d)=>{y.emit("click:open",{id:r,value:c,path:f(r),event:d});const v=i.value.open({id:r,value:c,opened:new Set(l.value),children:t.value,parents:n.value,event:d});v&&(l.value=v)},openOnSelect:(r,c,d)=>{const v=i.value.select({id:r,value:c,selected:new Map(o.value),opened:new Set(l.value),children:t.value,parents:n.value,event:d});v&&(l.value=v)},select:(r,c,d)=>{y.emit("click:select",{id:r,value:c,path:f(r),event:d});const v=a.value.select({id:r,value:c,selected:new Map(o.value),children:t.value,parents:n.value,event:d});v&&(o.value=v),g.root.openOnSelect(r,c,d)},children:t,parents:n}};return j(F,g),g.root},He=(e,s)=>{const t=$(F,Re),n=Symbol(Ce()),l=p(()=>e.value!==void 0?e.value:n),a={...t,id:l,open:(i,o)=>t.root.open(l.value,i,o),openOnSelect:(i,o)=>t.root.openOnSelect(l.value,i,o),isOpen:p(()=>t.root.opened.value.has(l.value)),parent:p(()=>t.root.parents.value.get(l.value)),select:(i,o)=>t.root.select(l.value,i,o),isSelected:p(()=>t.root.selected.value.get(T(l.value))==="on"),isIndeterminate:p(()=>t.root.selected.value.get(l.value)==="indeterminate"),isLeaf:p(()=>!t.root.children.value.get(l.value)),isGroupActivator:t.isGroupActivator};return!t.isGroupActivator&&t.root.register(l.value,t.id.value,s),we(()=>{!t.isGroupActivator&&t.root.unregister(l.value)}),s&&j(F,a),a},$t=()=>{const e=$(F,Re);j(F,{...e,isGroupActivator:!0})},jt=tt({name:"VListGroupActivator",setup(e,s){let{slots:t}=s;return $t(),()=>{var n;return(n=t.default)==null?void 0:n.call(t)}}}),_t=x({activeColor:String,baseColor:String,color:String,collapseIcon:{type:M,default:"$collapse"},expandIcon:{type:M,default:"$expand"},prependIcon:M,appendIcon:M,fluid:Boolean,subgroup:Boolean,title:String,value:null,...U(),...q()},"VListGroup"),be=E()({name:"VListGroup",props:_t(),setup(e,s){let{slots:t}=s;const{isOpen:n,open:l,id:a}=He(k(e,"value"),!0),i=p(()=>`v-list-group--id-${String(a.value)}`),o=Ge(),{isBooted:f}=ht();function y(d){l(!n.value,d)}const g=p(()=>({onClick:y,class:"v-list-group__header",id:i.value})),r=p(()=>n.value?e.collapseIcon:e.expandIcon),c=p(()=>({VListItem:{active:n.value,activeColor:e.activeColor,baseColor:e.baseColor,color:e.color,prependIcon:e.prependIcon||e.subgroup&&r.value,appendIcon:e.appendIcon||!e.subgroup&&r.value,title:e.title,value:e.value}}));return _(()=>m(e.tag,{class:["v-list-group",{"v-list-group--prepend":o==null?void 0:o.hasPrepend.value,"v-list-group--fluid":e.fluid,"v-list-group--subgroup":e.subgroup,"v-list-group--open":n.value},e.class],style:e.style},{default:()=>[t.activator&&m(H,{defaults:c.value},{default:()=>[m(jt,null,{default:()=>[t.activator({props:g.value,isOpen:n.value})]})]}),m(bt,{transition:{component:pt},disabled:!f.value},{default:()=>{var d;return[ke(m("div",{class:"v-list-group__items",role:"group","aria-labelledby":i.value},[(d=t.default)==null?void 0:d.call(t)]),[[nt,n.value]])]}})]})),{}}});const Gt=je("v-list-item-subtitle"),Kt=je("v-list-item-title"),Nt=x({active:{type:Boolean,default:void 0},activeClass:String,activeColor:String,appendAvatar:String,appendIcon:M,baseColor:String,disabled:Boolean,lines:String,link:{type:Boolean,default:void 0},nav:Boolean,prependAvatar:String,prependIcon:M,ripple:{type:[Boolean,Object],default:!0},slim:Boolean,subtitle:[String,Number],title:[String,Number],value:null,onClick:ue(),onClickOnce:ue(),...Ve(),...U(),...Pe(),...Ie(),...Ae(),...xe(),...at(),...q(),...Le(),...Oe({variant:"text"})},"VListItem"),Se=E()({name:"VListItem",directives:{Ripple:lt},props:Nt(),emits:{click:e=>!0},setup(e,s){let{attrs:t,slots:n,emit:l}=s;const a=st(e,t),i=p(()=>e.value===void 0?a.href.value:e.value),{select:o,isSelected:f,isIndeterminate:y,isGroupActivator:g,root:r,parent:c,openOnSelect:d}=He(i,!1),v=Ge(),u=p(()=>{var S;return e.active!==!1&&(e.active||((S=a.isActive)==null?void 0:S.value)||f.value)}),h=p(()=>e.link!==!1&&a.isLink.value),b=p(()=>!e.disabled&&e.link!==!1&&(e.link||a.isClickable.value||e.value!=null&&!!v)),w=p(()=>e.rounded||e.nav),V=p(()=>e.color??e.activeColor),L=p(()=>({color:u.value?V.value??e.baseColor:e.baseColor,variant:e.variant}));Ee(()=>{var S;return(S=a.isActive)==null?void 0:S.value},S=>{S&&c.value!=null&&r.open(c.value,!0),S&&d(S)},{immediate:!0});const{themeClasses:G}=Me(e),{borderClasses:W}=Be(e),{colorClasses:Y,colorStyles:X,variantClasses:O}=it(L),{densityClasses:C}=Te(e),{dimensionStyles:K}=De(e),{elevationClasses:Ye}=Fe(e),{roundedClasses:Xe}=$e(w),ze=p(()=>e.lines?`v-list-item--${e.lines}-line`:void 0),z=p(()=>({isActive:u.value,select:o,isSelected:f.value,isIndeterminate:y.value}));function le(S){var N;l("click",S),!(g||!b.value)&&((N=a.navigate)==null||N.call(a,S),e.value!=null&&o(!f.value,S))}function Je(S){(S.key==="Enter"||S.key===" ")&&(S.preventDefault(),le(S))}return _(()=>{const S=h.value?"a":e.tag,N=n.title||e.title!=null,Ze=n.subtitle||e.subtitle!=null,se=!!(e.appendAvatar||e.appendIcon),Qe=!!(se||n.append),ie=!!(e.prependAvatar||e.prependIcon),J=!!(ie||n.prepend);return v==null||v.updateHasPrepend(J),e.activeColor&&ot("active-color",["color","base-color"]),ke(m(S,{class:["v-list-item",{"v-list-item--active":u.value,"v-list-item--disabled":e.disabled,"v-list-item--link":b.value,"v-list-item--nav":e.nav,"v-list-item--prepend":!J&&(v==null?void 0:v.hasPrepend.value),"v-list-item--slim":e.slim,[`${e.activeClass}`]:e.activeClass&&u.value},G.value,W.value,Y.value,C.value,Ye.value,ze.value,Xe.value,O.value,e.class],style:[X.value,K.value,e.style],href:a.href.value,tabindex:b.value?v?-2:0:void 0,onClick:le,onKeydown:b.value&&!h.value&&Je},{default:()=>{var oe;return[ut(b.value||u.value,"v-list-item"),J&&m("div",{key:"prepend",class:"v-list-item__prepend"},[n.prepend?m(H,{key:"prepend-defaults",disabled:!ie,defaults:{VAvatar:{density:e.density,image:e.prependAvatar},VIcon:{density:e.density,icon:e.prependIcon},VListItemAction:{start:!0}}},{default:()=>{var P;return[(P=n.prepend)==null?void 0:P.call(n,z.value)]}}):m(ce,null,[e.prependAvatar&&m(me,{key:"prepend-avatar",density:e.density,image:e.prependAvatar},null),e.prependIcon&&m(de,{key:"prepend-icon",density:e.density,icon:e.prependIcon},null)]),m("div",{class:"v-list-item__spacer"},null)]),m("div",{class:"v-list-item__content","data-no-activator":""},[N&&m(Kt,{key:"title"},{default:()=>{var P;return[((P=n.title)==null?void 0:P.call(n,{title:e.title}))??e.title]}}),Ze&&m(Gt,{key:"subtitle"},{default:()=>{var P;return[((P=n.subtitle)==null?void 0:P.call(n,{subtitle:e.subtitle}))??e.subtitle]}}),(oe=n.default)==null?void 0:oe.call(n,z.value)]),Qe&&m("div",{key:"append",class:"v-list-item__append"},[n.append?m(H,{key:"append-defaults",disabled:!se,defaults:{VAvatar:{density:e.density,image:e.appendAvatar},VIcon:{density:e.density,icon:e.appendIcon},VListItemAction:{end:!0}}},{default:()=>{var P;return[(P=n.append)==null?void 0:P.call(n,z.value)]}}):m(ce,null,[e.appendIcon&&m(de,{key:"append-icon",density:e.density,icon:e.appendIcon},null),e.appendAvatar&&m(me,{key:"append-avatar",density:e.density,image:e.appendAvatar},null)]),m("div",{class:"v-list-item__spacer"},null)])]}}),[[rt("ripple"),b.value&&e.ripple]])}),{}}}),Rt=x({color:String,inset:Boolean,sticky:Boolean,title:String,...U(),...q()},"VListSubheader"),Ht=E()({name:"VListSubheader",props:Rt(),setup(e,s){let{slots:t}=s;const{textColorClasses:n,textColorStyles:l}=ct(k(e,"color"));return _(()=>{const a=!!(t.default||e.title);return m(e.tag,{class:["v-list-subheader",{"v-list-subheader--inset":e.inset,"v-list-subheader--sticky":e.sticky},n.value,e.class],style:[{textColorStyles:l},e.style]},{default:()=>{var i;return[a&&m("div",{class:"v-list-subheader__text"},[((i=t.default)==null?void 0:i.call(t))??e.title])]}})}),{}}}),Ut=x({items:Array,returnObject:Boolean},"VListChildren"),Ue=E()({name:"VListChildren",props:Ut(),setup(e,s){let{slots:t}=s;return _e(),()=>{var n,l;return((n=t.default)==null?void 0:n.call(t))??((l=e.items)==null?void 0:l.map(a=>{var c,d;let{children:i,props:o,type:f,raw:y}=a;if(f==="divider")return((c=t.divider)==null?void 0:c.call(t,{props:o}))??m(Pt,o,null);if(f==="subheader")return((d=t.subheader)==null?void 0:d.call(t,{props:o}))??m(Ht,o,null);const g={subtitle:t.subtitle?v=>{var u;return(u=t.subtitle)==null?void 0:u.call(t,{...v,item:y})}:void 0,prepend:t.prepend?v=>{var u;return(u=t.prepend)==null?void 0:u.call(t,{...v,item:y})}:void 0,append:t.append?v=>{var u;return(u=t.append)==null?void 0:u.call(t,{...v,item:y})}:void 0,title:t.title?v=>{var u;return(u=t.title)==null?void 0:u.call(t,{...v,item:y})}:void 0},r=be.filterProps(o);return i?m(be,D({value:o==null?void 0:o.value},r),{activator:v=>{let{props:u}=v;const h={...o,...u,value:e.returnObject?y:o.value};return t.header?t.header({props:h}):m(Se,h,g)},default:()=>m(Ue,{items:i},t)}):t.item?t.item({props:o}):m(Se,D(o,{value:e.returnObject?y:o.value}),g)}))}}}),qt=x({items:{type:Array,default:()=>[]},itemTitle:{type:[String,Array,Function],default:"title"},itemValue:{type:[String,Array,Function],default:"value"},itemChildren:{type:[Boolean,String,Array,Function],default:"children"},itemProps:{type:[Boolean,String,Array,Function],default:"props"},returnObject:Boolean,valueComparator:{type:Function,default:dt}},"list-items");function te(e,s){const t=A(s,e.itemTitle,s),n=A(s,e.itemValue,t),l=A(s,e.itemChildren),a=e.itemProps===!0?typeof s=="object"&&s!=null&&!Array.isArray(s)?"children"in s?ne(s,["children"]):s:void 0:A(s,e.itemProps),i={title:t,value:n,...a};return{title:String(i.title??""),value:i.value,props:i,children:Array.isArray(l)?qe(e,l):void 0,raw:s}}function qe(e,s){const t=[];for(const n of s)t.push(te(e,n));return t}function sn(e){const s=p(()=>qe(e,e.items)),t=p(()=>s.value.some(a=>a.value===null));function n(a){return t.value||(a=a.filter(i=>i!==null)),a.map(i=>e.returnObject&&typeof i=="string"?te(e,i):s.value.find(o=>e.valueComparator(i,o.value))||te(e,i))}function l(a){return e.returnObject?a.map(i=>{let{raw:o}=i;return o}):a.map(i=>{let{value:o}=i;return o})}return{items:s,transformIn:n,transformOut:l}}function Wt(e){return typeof e=="string"||typeof e=="number"||typeof e=="boolean"}function Yt(e,s){const t=A(s,e.itemType,"item"),n=Wt(s)?s:A(s,e.itemTitle),l=A(s,e.itemValue,void 0),a=A(s,e.itemChildren),i=e.itemProps===!0?ne(s,["children"]):A(s,e.itemProps),o={title:n,value:l,...i};return{type:t,title:o.title,value:o.value,props:o,children:t==="item"&&a?We(e,a):void 0,raw:s}}function We(e,s){const t=[];for(const n of s)t.push(Yt(e,n));return t}function Xt(e){return{items:p(()=>We(e,e.items))}}const zt=x({baseColor:String,activeColor:String,activeClass:String,bgColor:String,disabled:Boolean,expandIcon:String,collapseIcon:String,lines:{type:[Boolean,String],default:"one"},slim:Boolean,nav:Boolean,...Dt({selectStrategy:"single-leaf",openStrategy:"list"}),...Ve(),...U(),...Pe(),...Ie(),...Ae(),itemType:{type:String,default:"type"},...qt(),...xe(),...q(),...Le(),...Oe({variant:"text"})},"VList"),on=E()({name:"VList",props:zt(),emits:{"update:selected":e=>!0,"update:opened":e=>!0,"click:open":e=>!0,"click:select":e=>!0},setup(e,s){let{slots:t}=s;const{items:n}=Xt(e),{themeClasses:l}=Me(e),{backgroundColorClasses:a,backgroundColorStyles:i}=vt(k(e,"bgColor")),{borderClasses:o}=Be(e),{densityClasses:f}=Te(e),{dimensionStyles:y}=De(e),{elevationClasses:g}=Fe(e),{roundedClasses:r}=$e(e),{open:c,select:d}=Ft(e),v=p(()=>e.lines?`v-list--${e.lines}-line`:void 0),u=k(e,"activeColor"),h=k(e,"baseColor"),b=k(e,"color");_e(),ft({VListGroup:{activeColor:u,baseColor:h,color:b,expandIcon:k(e,"expandIcon"),collapseIcon:k(e,"collapseIcon")},VListItem:{activeClass:k(e,"activeClass"),activeColor:u,baseColor:h,color:b,density:k(e,"density"),disabled:k(e,"disabled"),lines:k(e,"lines"),nav:k(e,"nav"),slim:k(e,"slim"),variant:k(e,"variant")}});const w=B(!1),V=I();function L(C){w.value=!0}function G(C){w.value=!1}function W(C){var K;!w.value&&!(C.relatedTarget&&((K=V.value)!=null&&K.contains(C.relatedTarget)))&&O()}function Y(C){if(V.value){if(C.key==="ArrowDown")O("next");else if(C.key==="ArrowUp")O("prev");else if(C.key==="Home")O("first");else if(C.key==="End")O("last");else return;C.preventDefault()}}function X(C){w.value=!0}function O(C){if(V.value)return Q(V.value,C)}return _(()=>m(e.tag,{ref:V,class:["v-list",{"v-list--disabled":e.disabled,"v-list--nav":e.nav,"v-list--slim":e.slim},l.value,a.value,o.value,f.value,g.value,v.value,r.value,e.class],style:[i.value,y.value,e.style],tabindex:e.disabled||w.value?-1:0,role:"listbox","aria-activedescendant":void 0,onFocusin:L,onFocusout:G,onFocus:W,onKeydown:Y,onMousedown:X},{default:()=>[m(Ue,{items:n.value,returnObject:e.returnObject},t)]})),{open:c,select:d,focus:O}}});const Jt=x({id:String,...ne(It({closeDelay:250,closeOnContentClick:!0,locationStrategy:"connected",openDelay:300,scrim:!1,scrollStrategy:"reposition",transition:{component:Lt}}),["absolute"])},"VMenu"),rn=E()({name:"VMenu",props:Jt(),emits:{"update:modelValue":e=>!0},setup(e,s){let{slots:t}=s;const n=Z(e,"modelValue"),{scopeId:l}=At(),a=Ce(),i=p(()=>e.id||`v-menu-${a}`),o=I(),f=$(ye,null),y=B(0);j(ye,{register(){++y.value},unregister(){--y.value},closeParents(u){setTimeout(()=>{!y.value&&(u==null||u&&!mt(u,o.value.contentEl))&&(n.value=!1,f==null||f.closeParents())},40)}});async function g(u){var w,V,L;const h=u.relatedTarget,b=u.target;await yt(),n.value&&h!==b&&((w=o.value)!=null&&w.contentEl)&&((V=o.value)!=null&&V.globalTop)&&![document,o.value.contentEl].includes(b)&&!o.value.contentEl.contains(b)&&((L=ve(o.value.contentEl)[0])==null||L.focus())}Ee(n,u=>{u?(f==null||f.register(),document.addEventListener("focusin",g,{once:!0})):(f==null||f.unregister(),document.removeEventListener("focusin",g))});function r(u){f==null||f.closeParents(u)}function c(u){var h,b,w;e.disabled||u.key==="Tab"&&(gt(ve((h=o.value)==null?void 0:h.contentEl,!1),u.shiftKey?"prev":"next",L=>L.tabIndex>=0)||(n.value=!1,(w=(b=o.value)==null?void 0:b.activatorEl)==null||w.focus()))}function d(u){var b;if(e.disabled)return;const h=(b=o.value)==null?void 0:b.contentEl;h&&n.value?u.key==="ArrowDown"?(u.preventDefault(),Q(h,"next")):u.key==="ArrowUp"&&(u.preventDefault(),Q(h,"prev")):["ArrowDown","ArrowUp"].includes(u.key)&&(n.value=!0,u.preventDefault(),setTimeout(()=>setTimeout(()=>d(u))))}const v=p(()=>D({"aria-haspopup":"menu","aria-expanded":String(n.value),"aria-owns":i.value,onKeydown:d},e.activatorProps));return _(()=>{const u=ge.filterProps(e);return m(ge,D({ref:o,id:i.value,class:["v-menu",e.class],style:e.style},u,{modelValue:n.value,"onUpdate:modelValue":h=>n.value=h,absolute:!0,activatorProps:v.value,"onClick:outside":r,onKeydown:c},l),{activator:t.activator,default:function(){for(var h=arguments.length,b=new Array(h),w=0;w<h;w++)b[w]=arguments[w];return m(H,{root:"VMenu"},{default:()=>{var V;return[(V=t.default)==null?void 0:V.call(t,...b)]}})}})}),Vt({id:i,ΨopenChildren:y},o)}});export{Lt as V,rn as a,on as b,Se as c,Kt as d,Gt as e,qt as m,sn as u};