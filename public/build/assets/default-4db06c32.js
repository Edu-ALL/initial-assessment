import{u as v,a as x,V as y,_ as b,b as V,c as i,d as $,F as k,e as B}from"./VSpacer-61c9c6a5.js";import{u as S,c as D,U as C,r as f,o as l,a as u,w as t,b as _,d as e,V as w,t as I,e as s,f as L,g as N}from"./main-156dd90c.js";import{_ as U}from"./_plugin-vue_export-helper-c27b6911.js";import"./eduall-62475736.js";import"./VTooltip-dac8a206.js";import"./VOverlay-65313218.js";import"./forwardRefs-e658ad70.js";import"./lazy-ac5be02b.js";import"./VImg-1232c280.js";import"./notification-17c9d469.js";import"./_commonjsHelpers-725317a4.js";import"./VAvatar-082d3f4e.js";import"./VMenu-276589c7.js";import"./VList-b148adc2.js";import"./index-7717879c.js";import"./ssrBoot-137eea8e.js";import"./VDivider-a8c40c93.js";import"./VListItemAction-d41f40e8.js";/* empty css              */const F={class:"d-flex h-100 align-center"},R={class:"d-md-flex align-center d-none",style:{"user-select":"none"}},T={__name:"DefaultLayoutStudent",setup(g){const m=S();D(()=>m.global.name.value==="light"?v:x);const a=C.getUser();return(r,A)=>{const h=f("IconBtn");return l(),u(B,null,{navbar:t(({toggleVerticalOverlayNavActive:n})=>{var o;return[_("div",F,[e(h,{class:"ms-n3 d-lg-none",onClick:c=>n(!0)},{default:t(()=>[e(w,{icon:"bx-menu"})]),_:2},1032,["onClick"]),_("div",R,[_("h3",null,"Welcome "+I((o=s(a).client)==null?void 0:o.full_name)+" 👋🏻",1)]),e(y),e(b,{class:"me-2"}),e(V)])]}),"vertical-nav-content":t(()=>{var n,o,c,d,p;return[e(i,{item:{title:"Dashboard",icon:"bx-home",to:"/dashboard"}}),e($,{item:{heading:"Pages"}}),((n=s(a).client)==null?void 0:n.is_vip)==0&&(((c=(o=s(a).client)==null?void 0:o.education)==null?void 0:c.grade)>=7||((p=(d=s(a).client)==null?void 0:d.education)==null?void 0:p.grade)<=12)?(l(),u(i,{key:0,item:{title:"Assessment",icon:"bx-notepad",to:"/assessment"}})):L("",!0),e(i,{item:{title:"Quest",icon:"bx-user-check",to:"/quest"}})]}),footer:t(()=>[e(k)]),default:t(()=>[N(r.$slots,"default",{},void 0,!0)]),_:3})}}},q=U(T,[["__scopeId","data-v-713cc126"]]);const ne={__name:"default",setup(g){return(m,a)=>{const r=f("RouterView");return l(),u(q,null,{default:t(()=>[e(r)]),_:1})}}};export{ne as default};