import{bh as Pe,bi as Ce,p as G,L as H,a1 as q,a3 as ce,M,Z as I,bj as He,bk as me,bl as ne,bm as oe,bn as ye,c as C,a0 as Q,bo as ge,y as R,_ as he,Y as ue,bp as Ae,bq as Ie,a2 as fe,af as pe,br as be,W as j,aa as De,K as X,X as Ve,a4 as We,bs as Te,ad as je,b2 as qe,b4 as $e,m as ze,H as Ye,j as Xe,k as Ge,a7 as Ke,l as Ue,q as Ze,D as Je,v as Qe,J as et,aB as tt,bt as nt,x as ot,d as W,bu as at,ah as rt,aj as it,ai as lt,S as st,b3 as ct,bv as ut}from"./main-c726d500.js";import{g as ft,B as ae,e as we,n as vt,a as dt,s as mt}from"./VAvatar-2ce92d19.js";import{m as yt,u as gt}from"./lazy-8ac31d29.js";import{m as ht,M as bt}from"./VImg-f563999c.js";const K=new WeakMap;function wt(e,t){Object.keys(t).forEach(n=>{if(Pe(n)){const o=Ce(n),a=K.get(e);if(t[n]==null)a==null||a.forEach(r=>{const[l,i]=r;l===o&&(e.removeEventListener(o,i),a.delete(r))});else if(!a||![...a].some(r=>r[0]===o&&r[1]===t[n])){e.addEventListener(o,t[n]);const r=a||new Set;r.add([o,t[n]]),K.has(e)||K.set(e,r)}}else t[n]==null?e.removeAttribute(n):e.setAttribute(n,t[n])})}function Et(e,t){Object.keys(t).forEach(n=>{if(Pe(n)){const o=Ce(n),a=K.get(e);a==null||a.forEach(r=>{const[l,i]=r;l===o&&(e.removeEventListener(o,i),a.delete(r))})}else e.removeAttribute(n)})}function Le(e){if(typeof e.getRootNode!="function"){for(;e.parentNode;)e=e.parentNode;return e!==document?null:document}const t=e.getRootNode();return t!==document&&t.getRootNode({composed:!0})!==document?null:t}function St(e){let t=arguments.length>1&&arguments[1]!==void 0?arguments[1]:!1;for(;e;){if(t?xt(e):ve(e))return e;e=e.parentElement}return document.scrollingElement}function Z(e,t){const n=[];if(t&&e&&!t.contains(e))return n;for(;e&&(ve(e)&&n.push(e),e!==t);)e=e.parentElement;return n}function ve(e){if(!e||e.nodeType!==Node.ELEMENT_NODE)return!1;const t=window.getComputedStyle(e);return t.overflowY==="scroll"||t.overflowY==="auto"&&e.scrollHeight>e.clientHeight}function xt(e){if(!e||e.nodeType!==Node.ELEMENT_NODE)return!1;const t=window.getComputedStyle(e);return["scroll","auto"].includes(t.overflowY)}function kt(e){for(;e;){if(window.getComputedStyle(e).position==="fixed")return!0;e=e.offsetParent}return!1}function re(e,t){return{x:e.x+t.x,y:e.y+t.y}}function Ot(e,t){return{x:e.x-t.x,y:e.y-t.y}}function Ee(e,t){if(e.side==="top"||e.side==="bottom"){const{side:n,align:o}=e,a=o==="left"?0:o==="center"?t.width/2:o==="right"?t.width:o,r=n==="top"?0:n==="bottom"?t.height:n;return re({x:a,y:r},t)}else if(e.side==="left"||e.side==="right"){const{side:n,align:o}=e,a=n==="left"?0:n==="right"?t.width:n,r=o==="top"?0:o==="center"?t.height/2:o==="bottom"?t.height:o;return re({x:a,y:r},t)}return re({x:t.width/2,y:t.height/2},t)}const Me={static:At,connected:Tt},Pt=G({locationStrategy:{type:[String,Function],default:"static",validator:e=>typeof e=="function"||e in Me},location:{type:String,default:"bottom"},origin:{type:String,default:"auto"},offset:[Number,String,Array]},"VOverlay-location-strategies");function Ct(e,t){const n=H({}),o=H();q&&ce(()=>!!(t.isActive.value&&e.locationStrategy),r=>{var l,i;M(()=>e.locationStrategy,r),I(()=>{window.removeEventListener("resize",a),o.value=void 0}),window.addEventListener("resize",a,{passive:!0}),typeof e.locationStrategy=="function"?o.value=(l=e.locationStrategy(t,e,n))==null?void 0:l.updateLocation:o.value=(i=Me[e.locationStrategy](t,e,n))==null?void 0:i.updateLocation});function a(r){var l;(l=o.value)==null||l.call(o,r)}return{contentStyles:n,updateLocation:o}}function At(){}function pt(e,t){t?e.style.removeProperty("left"):e.style.removeProperty("right");const n=vt(e);return t?n.x+=parseFloat(e.style.right||0):n.x-=parseFloat(e.style.left||0),n.y-=parseFloat(e.style.top||0),n}function Tt(e,t,n){(Array.isArray(e.target.value)||kt(e.target.value))&&Object.assign(n.value,{position:"fixed",top:0,[e.isRtl.value?"right":"left"]:0});const{preferredAnchor:a,preferredOrigin:r}=He(()=>{const u=me(t.location,e.isRtl.value),f=t.origin==="overlap"?u:t.origin==="auto"?ne(u):me(t.origin,e.isRtl.value);return u.side===f.side&&u.align===oe(f).align?{preferredAnchor:ye(u),preferredOrigin:ye(f)}:{preferredAnchor:u,preferredOrigin:f}}),[l,i,d,v]=["minWidth","minHeight","maxWidth","maxHeight"].map(u=>C(()=>{const f=parseFloat(t[u]);return isNaN(f)?1/0:f})),m=C(()=>{if(Array.isArray(t.offset))return t.offset;if(typeof t.offset=="string"){const u=t.offset.split(" ").map(parseFloat);return u.length<2&&u.push(0),u}return typeof t.offset=="number"?[t.offset,0]:[0,0]});let g=!1;const k=new ResizeObserver(()=>{g&&O()});M([e.target,e.contentEl],(u,f)=>{let[A,p]=u,[w,h]=f;w&&!Array.isArray(w)&&k.unobserve(w),A&&!Array.isArray(A)&&k.observe(A),h&&k.unobserve(h),p&&k.observe(p)},{immediate:!0}),I(()=>{k.disconnect()});function O(){if(g=!1,requestAnimationFrame(()=>g=!0),!e.target.value||!e.contentEl.value)return;const u=ft(e.target.value),f=pt(e.contentEl.value,e.isRtl.value),A=Z(e.contentEl.value),p=12;A.length||(A.push(document.documentElement),e.contentEl.value.style.top&&e.contentEl.value.style.left||(f.x-=parseFloat(document.documentElement.style.getPropertyValue("--v-body-scroll-x")||0),f.y-=parseFloat(document.documentElement.style.getPropertyValue("--v-body-scroll-y")||0)));const w=A.reduce((S,b)=>{const c=b.getBoundingClientRect(),y=new ae({x:b===document.documentElement?0:c.x,y:b===document.documentElement?0:c.y,width:b.clientWidth,height:b.clientHeight});return S?new ae({x:Math.max(S.left,y.left),y:Math.max(S.top,y.top),width:Math.min(S.right,y.right)-Math.max(S.left,y.left),height:Math.min(S.bottom,y.bottom)-Math.max(S.top,y.top)}):y},void 0);w.x+=p,w.y+=p,w.width-=p*2,w.height-=p*2;let h={anchor:a.value,origin:r.value};function D(S){const b=new ae(f),c=Ee(S.anchor,u),y=Ee(S.origin,b);let{x:L,y:F}=Ot(c,y);switch(S.anchor.side){case"top":F-=m.value[0];break;case"bottom":F+=m.value[0];break;case"left":L-=m.value[0];break;case"right":L+=m.value[0];break}switch(S.anchor.align){case"top":F-=m.value[1];break;case"bottom":F+=m.value[1];break;case"left":L-=m.value[1];break;case"right":L+=m.value[1];break}return b.x+=L,b.y+=F,b.width=Math.min(b.width,d.value),b.height=Math.min(b.height,v.value),{overflows:we(b,w),x:L,y:F}}let B=0,P=0;const s={x:0,y:0},T={x:!1,y:!1};let ee=-1;for(;!(ee++>10);){const{x:S,y:b,overflows:c}=D(h);B+=S,P+=b,f.x+=S,f.y+=b;{const y=ge(h.anchor),L=c.x.before||c.x.after,F=c.y.before||c.y.after;let $=!1;if(["x","y"].forEach(x=>{if(x==="x"&&L&&!T.x||x==="y"&&F&&!T.y){const V={anchor:{...h.anchor},origin:{...h.origin}},z=x==="x"?y==="y"?oe:ne:y==="y"?ne:oe;V.anchor=z(V.anchor),V.origin=z(V.origin);const{overflows:N}=D(V);(N[x].before<=c[x].before&&N[x].after<=c[x].after||N[x].before+N[x].after<(c[x].before+c[x].after)/2)&&(h=V,$=T[x]=!0)}}),$)continue}c.x.before&&(B+=c.x.before,f.x+=c.x.before),c.x.after&&(B-=c.x.after,f.x-=c.x.after),c.y.before&&(P+=c.y.before,f.y+=c.y.before),c.y.after&&(P-=c.y.after,f.y-=c.y.after);{const y=we(f,w);s.x=w.width-y.x.before-y.x.after,s.y=w.height-y.y.before-y.y.after,B+=y.x.before,f.x+=y.x.before,P+=y.y.before,f.y+=y.y.before}break}const te=ge(h.anchor);return Object.assign(n.value,{"--v-overlay-anchor-origin":`${h.anchor.side} ${h.anchor.align}`,transformOrigin:`${h.origin.side} ${h.origin.align}`,top:R(ie(P)),left:e.isRtl.value?void 0:R(ie(B)),right:e.isRtl.value?R(ie(-B)):void 0,minWidth:R(te==="y"?Math.min(l.value,u.width):l.value),maxWidth:R(Se(he(s.x,l.value===1/0?0:l.value,d.value))),maxHeight:R(Se(he(s.y,i.value===1/0?0:i.value,v.value)))}),{available:s,contentBox:f}}return M(()=>[a.value,r.value,t.offset,t.minWidth,t.minHeight,t.maxWidth,t.maxHeight],()=>O()),Q(()=>{const u=O();if(!u)return;const{available:f,contentBox:A}=u;A.height>f.y&&requestAnimationFrame(()=>{O(),requestAnimationFrame(()=>{O()})})}),{updateLocation:O}}function ie(e){return Math.round(e*devicePixelRatio)/devicePixelRatio}function Se(e){return Math.ceil(e*devicePixelRatio)/devicePixelRatio}let le=!0;const J=[];function Lt(e){!le||J.length?(J.push(e),se()):(le=!1,e(),se())}let xe=-1;function se(){cancelAnimationFrame(xe),xe=requestAnimationFrame(()=>{const e=J.shift();e&&e(),J.length?se():le=!0})}const U={none:null,close:Ft,block:Rt,reposition:Nt},Mt=G({scrollStrategy:{type:[String,Function],default:"block",validator:e=>typeof e=="function"||e in U}},"VOverlay-scroll-strategies");function Bt(e,t){if(!q)return;let n;ue(async()=>{n==null||n.stop(),t.isActive.value&&e.scrollStrategy&&(n=Ae(),await Q(),n.active&&n.run(()=>{var o;typeof e.scrollStrategy=="function"?e.scrollStrategy(t,e,n):(o=U[e.scrollStrategy])==null||o.call(U,t,e,n)}))}),I(()=>{n==null||n.stop()})}function Ft(e){function t(n){e.isActive.value=!1}Be(e.targetEl.value??e.contentEl.value,t)}function Rt(e,t){var l;const n=(l=e.root.value)==null?void 0:l.offsetParent,o=[...new Set([...Z(e.targetEl.value,t.contained?n:void 0),...Z(e.contentEl.value,t.contained?n:void 0)])].filter(i=>!i.classList.contains("v-overlay-scroll-blocked")),a=window.innerWidth-document.documentElement.offsetWidth,r=(i=>ve(i)&&i)(n||document.documentElement);r&&e.root.value.classList.add("v-overlay--scroll-blocked"),o.forEach((i,d)=>{i.style.setProperty("--v-body-scroll-x",R(-i.scrollLeft)),i.style.setProperty("--v-body-scroll-y",R(-i.scrollTop)),i!==document.documentElement&&i.style.setProperty("--v-scrollbar-offset",R(a)),i.classList.add("v-overlay-scroll-blocked")}),I(()=>{o.forEach((i,d)=>{const v=parseFloat(i.style.getPropertyValue("--v-body-scroll-x")),m=parseFloat(i.style.getPropertyValue("--v-body-scroll-y")),g=i.style.scrollBehavior;i.style.scrollBehavior="auto",i.style.removeProperty("--v-body-scroll-x"),i.style.removeProperty("--v-body-scroll-y"),i.style.removeProperty("--v-scrollbar-offset"),i.classList.remove("v-overlay-scroll-blocked"),i.scrollLeft=-v,i.scrollTop=-m,i.style.scrollBehavior=g}),r&&e.root.value.classList.remove("v-overlay--scroll-blocked")})}function Nt(e,t,n){let o=!1,a=-1,r=-1;function l(i){Lt(()=>{var m,g;const d=performance.now();(g=(m=e.updateLocation).value)==null||g.call(m,i),o=(performance.now()-d)/(1e3/60)>2})}r=(typeof requestIdleCallback>"u"?i=>i():requestIdleCallback)(()=>{n.run(()=>{Be(e.targetEl.value??e.contentEl.value,i=>{o?(cancelAnimationFrame(a),a=requestAnimationFrame(()=>{a=requestAnimationFrame(()=>{l(i)})})):l(i)})})}),I(()=>{typeof cancelIdleCallback<"u"&&cancelIdleCallback(r),cancelAnimationFrame(a)})}function Be(e,t){const n=[document,...Z(e)];n.forEach(o=>{o.addEventListener("scroll",t,{passive:!0})}),I(()=>{n.forEach(o=>{o.removeEventListener("scroll",t)})})}const _t=Symbol.for("vuetify:v-menu"),Ht=G({closeDelay:[Number,String],openDelay:[Number,String]},"delay");function It(e,t){let n=()=>{};function o(l){n==null||n();const i=Number(l?e.openDelay:e.closeDelay);return new Promise(d=>{n=Ie(i,()=>{t==null||t(l),d(l)})})}function a(){return o(!0)}function r(){return o(!1)}return{clearDelay:n,runOpenDelay:a,runCloseDelay:r}}const Dt=G({target:[String,Object],activator:[String,Object],activatorProps:{type:Object,default:()=>({})},openOnClick:{type:Boolean,default:void 0},openOnHover:Boolean,openOnFocus:{type:Boolean,default:void 0},closeOnContentClick:Boolean,...Ht()},"VOverlay-activator");function Vt(e,t){let{isActive:n,isTop:o}=t;const a=fe("useActivator"),r=H();let l=!1,i=!1,d=!0;const v=C(()=>e.openOnFocus||e.openOnFocus==null&&e.openOnHover),m=C(()=>e.openOnClick||e.openOnClick==null&&!e.openOnHover&&!v.value),{runOpenDelay:g,runCloseDelay:k}=It(e,s=>{s===(e.openOnHover&&l||v.value&&i)&&!(e.openOnHover&&n.value&&!o.value)&&(n.value!==s&&(d=!0),n.value=s)}),O=H(),u={onClick:s=>{s.stopPropagation(),r.value=s.currentTarget||s.target,n.value||(O.value=[s.clientX,s.clientY]),n.value=!n.value},onMouseenter:s=>{var T;(T=s.sourceCapabilities)!=null&&T.firesTouchEvents||(l=!0,r.value=s.currentTarget||s.target,g())},onMouseleave:s=>{l=!1,k()},onFocus:s=>{De(s.target,":focus-visible")!==!1&&(i=!0,s.stopPropagation(),r.value=s.currentTarget||s.target,g())},onBlur:s=>{i=!1,s.stopPropagation(),k()}},f=C(()=>{const s={};return m.value&&(s.onClick=u.onClick),e.openOnHover&&(s.onMouseenter=u.onMouseenter,s.onMouseleave=u.onMouseleave),v.value&&(s.onFocus=u.onFocus,s.onBlur=u.onBlur),s}),A=C(()=>{const s={};if(e.openOnHover&&(s.onMouseenter=()=>{l=!0,g()},s.onMouseleave=()=>{l=!1,k()}),v.value&&(s.onFocusin=()=>{i=!0,g()},s.onFocusout=()=>{i=!1,k()}),e.closeOnContentClick){const T=pe(_t,null);s.onClick=()=>{n.value=!1,T==null||T.closeParents()}}return s}),p=C(()=>{const s={};return e.openOnHover&&(s.onMouseenter=()=>{d&&(l=!0,d=!1,g())},s.onMouseleave=()=>{l=!1,k()}),s});M(o,s=>{s&&(e.openOnHover&&!l&&(!v.value||!i)||v.value&&!i&&(!e.openOnHover||!l))&&(n.value=!1)}),M(n,s=>{s||setTimeout(()=>{O.value=void 0})},{flush:"post"});const w=H();ue(()=>{w.value&&Q(()=>{r.value=be(w.value)})});const h=H(),D=C(()=>e.target==="cursor"&&O.value?O.value:h.value?be(h.value):Fe(e.target,a)||r.value),B=C(()=>Array.isArray(D.value)?void 0:D.value);let P;return M(()=>!!e.activator,s=>{s&&q?(P=Ae(),P.run(()=>{Wt(e,a,{activatorEl:r,activatorEvents:f})})):P&&P.stop()},{flush:"post",immediate:!0}),I(()=>{P==null||P.stop()}),{activatorEl:r,activatorRef:w,target:D,targetEl:B,targetRef:h,activatorEvents:f,contentEvents:A,scrimEvents:p}}function Wt(e,t,n){let{activatorEl:o,activatorEvents:a}=n;M(()=>e.activator,(d,v)=>{if(v&&d!==v){const m=i(v);m&&l(m)}d&&Q(()=>r())},{immediate:!0}),M(()=>e.activatorProps,()=>{r()}),I(()=>{l()});function r(){let d=arguments.length>0&&arguments[0]!==void 0?arguments[0]:i(),v=arguments.length>1&&arguments[1]!==void 0?arguments[1]:e.activatorProps;d&&wt(d,j(a.value,v))}function l(){let d=arguments.length>0&&arguments[0]!==void 0?arguments[0]:i(),v=arguments.length>1&&arguments[1]!==void 0?arguments[1]:e.activatorProps;d&&Et(d,j(a.value,v))}function i(){let d=arguments.length>0&&arguments[0]!==void 0?arguments[0]:e.activator;const v=Fe(d,t);return o.value=(v==null?void 0:v.nodeType)===Node.ELEMENT_NODE?v:void 0,o.value}}function Fe(e,t){var o,a;if(!e)return;let n;if(e==="parent"){let r=(a=(o=t==null?void 0:t.proxy)==null?void 0:o.$el)==null?void 0:a.parentNode;for(;r!=null&&r.hasAttribute("data-no-activator");)r=r.parentNode;n=r}else typeof e=="string"?n=document.querySelector(e):"$el"in e?n=e.$el:n=e;return n}function jt(){if(!q)return X(!1);const{ssr:e}=Ve();if(e){const t=X(!1);return We(()=>{t.value=!0}),t}else return X(!0)}function qt(){const t=fe("useScopeId").vnode.scopeId;return{scopeId:t?{[t]:""}:void 0}}const ke=Symbol.for("vuetify:stack"),Y=Te([]);function $t(e,t,n){const o=fe("useStack"),a=!n,r=pe(ke,void 0),l=Te({activeChildren:new Set});je(ke,l);const i=X(+t.value);ce(e,()=>{var g;const m=(g=Y.at(-1))==null?void 0:g[1];i.value=m?m+10:+t.value,a&&Y.push([o.uid,i.value]),r==null||r.activeChildren.add(o.uid),I(()=>{if(a){const k=$e(Y).findIndex(O=>O[0]===o.uid);Y.splice(k,1)}r==null||r.activeChildren.delete(o.uid)})});const d=X(!0);a&&ue(()=>{var g;const m=((g=Y.at(-1))==null?void 0:g[0])===o.uid;setTimeout(()=>d.value=m)});const v=C(()=>!l.activeChildren.size);return{globalTop:qe(d),localTop:v,stackStyles:C(()=>({zIndex:i.value}))}}function zt(e){return{teleportTarget:C(()=>{const n=e.value;if(n===!0||!q)return;const o=n===!1?document.body:typeof n=="string"?document.querySelector(n):n;if(o==null)return;let a=o.querySelector(":scope > .v-overlay-container");return a||(a=document.createElement("div"),a.className="v-overlay-container",o.appendChild(a)),a})}}function Yt(){return!0}function Re(e,t,n){if(!e||Ne(e,n)===!1)return!1;const o=Le(t);if(typeof ShadowRoot<"u"&&o instanceof ShadowRoot&&o.host===e.target)return!1;const a=(typeof n.value=="object"&&n.value.include||(()=>[]))();return a.push(t),!a.some(r=>r==null?void 0:r.contains(e.target))}function Ne(e,t){return(typeof t.value=="object"&&t.value.closeConditional||Yt)(e)}function Xt(e,t,n){const o=typeof n.value=="function"?n.value:n.value.handler;t._clickOutside.lastMousedownWasOutside&&Re(e,t,n)&&setTimeout(()=>{Ne(e,n)&&o&&o(e)},0)}function Oe(e,t){const n=Le(e);t(document),typeof ShadowRoot<"u"&&n instanceof ShadowRoot&&t(n)}const Gt={mounted(e,t){const n=a=>Xt(a,e,t),o=a=>{e._clickOutside.lastMousedownWasOutside=Re(a,e,t)};Oe(e,a=>{a.addEventListener("click",n,!0),a.addEventListener("mousedown",o,!0)}),e._clickOutside||(e._clickOutside={lastMousedownWasOutside:!1}),e._clickOutside[t.instance.$.uid]={onClick:n,onMousedown:o}},unmounted(e,t){e._clickOutside&&(Oe(e,n=>{var r;if(!n||!((r=e._clickOutside)!=null&&r[t.instance.$.uid]))return;const{onClick:o,onMousedown:a}=e._clickOutside[t.instance.$.uid];n.removeEventListener("click",o,!0),n.removeEventListener("mousedown",a,!0)}),delete e._clickOutside[t.instance.$.uid])}};function Kt(e){const{modelValue:t,color:n,...o}=e;return W(ct,{name:"fade-transition",appear:!0},{default:()=>[e.modelValue&&W("div",j({class:["v-overlay__scrim",e.color.backgroundColorClasses.value],style:e.color.backgroundColorStyles.value},o),null)]})}const Ut=G({absolute:Boolean,attach:[Boolean,String,Object],closeOnBack:{type:Boolean,default:!0},contained:Boolean,contentClass:null,contentProps:null,disabled:Boolean,opacity:[Number,String],noClickAnimation:Boolean,modelValue:Boolean,persistent:Boolean,scrim:{type:[Boolean,String],default:!0},zIndex:{type:[Number,String],default:2e3},...Dt(),...ze(),...Ye(),...yt(),...Pt(),...Mt(),...Xe(),...ht()},"VOverlay"),tn=Ge()({name:"VOverlay",directives:{ClickOutside:Gt},inheritAttrs:!1,props:{_disableGlobalStack:Boolean,...Ut()},emits:{"click:outside":e=>!0,"update:modelValue":e=>!0,afterLeave:()=>!0},setup(e,t){let{slots:n,attrs:o,emit:a}=t;const r=Ke(e,"modelValue"),l=C({get:()=>r.value,set:E=>{E&&e.disabled||(r.value=E)}}),{teleportTarget:i}=zt(C(()=>e.attach||e.contained)),{themeClasses:d}=Ue(e),{rtlClasses:v,isRtl:m}=Ze(),{hasContent:g,onAfterLeave:k}=gt(e,l),O=Je(C(()=>typeof e.scrim=="string"?e.scrim:null)),{globalTop:u,localTop:f,stackStyles:A}=$t(l,Qe(e,"zIndex"),e._disableGlobalStack),{activatorEl:p,activatorRef:w,target:h,targetEl:D,targetRef:B,activatorEvents:P,contentEvents:s,scrimEvents:T}=Vt(e,{isActive:l,isTop:f}),{dimensionStyles:ee}=et(e),te=jt(),{scopeId:S}=qt();M(()=>e.disabled,E=>{E&&(l.value=!1)});const b=H(),c=H(),{contentStyles:y,updateLocation:L}=Ct(e,{isRtl:m,contentEl:c,target:h,isActive:l});Bt(e,{root:b,contentEl:c,targetEl:D,isActive:l,updateLocation:L});function F(E){a("click:outside",E),e.persistent?N():l.value=!1}function $(){return l.value&&u.value}q&&M(l,E=>{E?window.addEventListener("keydown",x):window.removeEventListener("keydown",x)},{immediate:!0}),tt(()=>{q&&window.removeEventListener("keydown",x)});function x(E){var _,de;E.key==="Escape"&&u.value&&(e.persistent?N():(l.value=!1,(_=c.value)!=null&&_.contains(document.activeElement)&&((de=p.value)==null||de.focus())))}const V=nt();ce(()=>e.closeOnBack,()=>{ut(V,E=>{u.value&&l.value?(E(!1),e.persistent?N():l.value=!1):E()})});const z=H();M(()=>l.value&&(e.absolute||e.contained)&&i.value==null,E=>{if(E){const _=St(b.value);_&&_!==document.scrollingElement&&(z.value=_.scrollTop)}});function N(){e.noClickAnimation||c.value&&dt(c.value,[{transformOrigin:"center"},{transform:"scale(1.03)"},{transformOrigin:"center"}],{duration:150,easing:mt})}function _e(){k(),a("afterLeave")}return ot(()=>{var E;return W(st,null,[(E=n.activator)==null?void 0:E.call(n,{isActive:l.value,props:j({ref:w,targetRef:B},P.value,e.activatorProps)}),te.value&&g.value&&W(at,{disabled:!i.value,to:i.value},{default:()=>[W("div",j({class:["v-overlay",{"v-overlay--absolute":e.absolute||e.contained,"v-overlay--active":l.value,"v-overlay--contained":e.contained},d.value,v.value,e.class],style:[A.value,{"--v-overlay-opacity":e.opacity,top:R(z.value)},e.style],ref:b},S,o),[W(Kt,j({color:O,modelValue:l.value&&!!e.scrim},T.value),null),W(bt,{appear:!0,persisted:!0,transition:e.transition,target:h.value,onAfterLeave:_e},{default:()=>{var _;return[rt(W("div",j({ref:c,class:["v-overlay__content",e.contentClass],style:[ee.value,y.value]},s.value,e.contentProps),[(_=n.default)==null?void 0:_.call(n,{isActive:l})]),[[it,l.value],[lt("click-outside"),{handler:F,closeConditional:$,include:()=>[p.value]}]])]}})])]})])}),{activatorEl:p,target:h,animateClick:N,contentEl:c,globalTop:u,localTop:f,updateLocation:L}}});export{tn as V,_t as a,St as g,Ut as m,qt as u};
