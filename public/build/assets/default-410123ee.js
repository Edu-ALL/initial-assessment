import{u as v,a as x,_ as y,b,c as i,d as V,F as $,e as k}from"./UserProfile-6d4e4365.js";import{u as B,c as S,U as D,r as f,o as l,a as u,w as t,b as _,d as e,V as C,t as w,e as s,f as I,g as L}from"./main-4d564748.js";import{_ as N}from"./_plugin-vue_export-helper-c27b6911.js";import{V as U}from"./VSpacer-e82487e5.js";import"./eduall-62475736.js";import"./VTooltip-21eda8ac.js";import"./VOverlay-626725c0.js";import"./VAvatar-3488a1fc.js";import"./VImg-daf37cfd.js";import"./lazy-9e42ab0c.js";import"./notification-17c9d469.js";import"./_commonjsHelpers-725317a4.js";import"./VMenu-bd094667.js";import"./index-62bac941.js";import"./ssrBoot-1d282432.js";import"./VDivider-45333b76.js";/* empty css              */const F={class:"d-flex h-100 align-center"},R={class:"d-md-flex align-center d-none",style:{"user-select":"none"}},T={__name:"DefaultLayoutStudent",setup(g){const m=B();S(()=>m.global.name.value==="light"?v:x);const a=D.getUser();return(r,A)=>{const h=f("IconBtn");return l(),u(k,null,{navbar:t(({toggleVerticalOverlayNavActive:o})=>{var n;return[_("div",F,[e(h,{class:"ms-n3 d-lg-none",onClick:c=>o(!0)},{default:t(()=>[e(C,{icon:"bx-menu"})]),_:2},1032,["onClick"]),_("div",R,[_("h3",null,"Welcome "+w((n=s(a).client)==null?void 0:n.full_name)+" 👋🏻",1)]),e(U),e(y,{class:"me-2"}),e(b)])]}),"vertical-nav-content":t(()=>{var o,n,c,d,p;return[e(i,{item:{title:"Dashboard",icon:"bx-home",to:"/dashboard"}}),e(V,{item:{heading:"Pages"}}),((o=s(a).client)==null?void 0:o.is_vip)==0&&(((c=(n=s(a).client)==null?void 0:n.education)==null?void 0:c.grade)>=7||((p=(d=s(a).client)==null?void 0:d.education)==null?void 0:p.grade)<=12)?(l(),u(i,{key:0,item:{title:"Assessment",icon:"bx-notepad",to:"/assessment"}})):I("",!0),e(i,{item:{title:"Quest",icon:"bx-user-check",to:"/quest"}})]}),footer:t(()=>[e($)]),default:t(()=>[L(r.$slots,"default",{},void 0,!0)]),_:3})}}},q=N(T,[["__scopeId","data-v-713cc126"]]);const ae={__name:"default",setup(g){return(m,a)=>{const r=f("RouterView");return l(),u(q,null,{default:t(()=>[e(r)]),_:1})}}};export{ae as default};
