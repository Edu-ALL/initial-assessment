import{p as S,m as w,h as q,i as N,j as L,k as T,l as J,n as U,q as F,s as O,v as f,c as V,x,d as t,y as g,I as $,z as A,A as j,B as E,C as Q,D as P,E as W,F as G,V as D,G as H,H as K,J as M,K as Y,L as p,M as X,u as Z,U as ee,o as c,a as C,w as s,b as i,t as te,e as h,N as ie,O as B,P as se,f as v,Q as _,R as le,S as ne}from"./main-d0bf6ae2.js";import{i as oe,a as ae}from"./illustration-john-light-481a7251.js";import{V as R,a as y}from"./VRow-aa6ed56d.js";import{V as k,a as re,b,c as de}from"./VCard-3684e2dc.js";import{V as ce}from"./VTooltip-84b3d23c.js";import{V as ue}from"./VDivider-1b85097a.js";/* empty css              */import"./VAvatar-fd3a9d1c.js";import"./VImg-a6c0305f.js";import"./VOverlay-c08935f2.js";import"./lazy-354b45fa.js";const me=S({align:{type:String,default:"center",validator:e=>["center","start"].includes(e)},direction:{type:String,default:"vertical",validator:e=>["vertical","horizontal"].includes(e)},justify:{type:String,default:"auto",validator:e=>["auto","center"].includes(e)},side:{type:String,validator:e=>e==null||["start","end"].includes(e)},lineInset:{type:[String,Number],default:0},lineThickness:{type:[String,Number],default:2},lineColor:String,truncateLine:{type:String,validator:e=>["start","end","both"].includes(e)},...w(),...q(),...N(),...L()},"VTimeline"),ve=T()({name:"VTimeline",props:me(),setup(e,m){let{slots:n}=m;const{themeClasses:d}=J(e),{densityClasses:u}=U(e),{rtlClasses:r}=F();O({VTimelineDivider:{lineColor:f(e,"lineColor")},VTimelineItem:{density:f(e,"density"),lineInset:f(e,"lineInset")}});const a=V(()=>{const l=e.side?e.side:e.density!=="default"?"end":null;return l&&`v-timeline--side-${l}`}),o=V(()=>{const l=["v-timeline--truncate-line-start","v-timeline--truncate-line-end"];switch(e.truncateLine){case"both":return l;case"start":return l[0];case"end":return l[1];default:return null}});return x(()=>t(e.tag,{class:["v-timeline",`v-timeline--${e.direction}`,`v-timeline--align-${e.align}`,`v-timeline--justify-${e.justify}`,o.value,{"v-timeline--inset-line":!!e.lineInset},d.value,u.value,a.value,r.value,e.class],style:[{"--v-timeline-line-thickness":g(e.lineThickness)},e.style]},n)),{}}}),_e=S({dotColor:String,fillDot:Boolean,hideDot:Boolean,icon:$,iconColor:String,lineColor:String,...w(),...A(),...j(),...E()},"VTimelineDivider"),fe=T()({name:"VTimelineDivider",props:_e(),setup(e,m){let{slots:n}=m;const{sizeClasses:d,sizeStyles:u}=Q(e,"v-timeline-divider__dot"),{backgroundColorStyles:r,backgroundColorClasses:a}=P(f(e,"dotColor")),{roundedClasses:o}=W(e,"v-timeline-divider__dot"),{elevationClasses:l}=G(e),{backgroundColorClasses:z,backgroundColorStyles:I}=P(f(e,"lineColor"));return x(()=>t("div",{class:["v-timeline-divider",{"v-timeline-divider--fill-dot":e.fillDot},e.class],style:e.style},[t("div",{class:["v-timeline-divider__before",z.value],style:I.value},null),!e.hideDot&&t("div",{key:"dot",class:["v-timeline-divider__dot",l.value,o.value,d.value],style:u.value},[t("div",{class:["v-timeline-divider__inner-dot",a.value,o.value],style:r.value},[n.default?t(H,{key:"icon-defaults",disabled:!e.icon,defaults:{VIcon:{color:e.iconColor,icon:e.icon,size:e.size}}},n.default):t(D,{key:"icon",color:e.iconColor,icon:e.icon,size:e.size},null)])]),t("div",{class:["v-timeline-divider__after",z.value],style:I.value},null)])),{}}}),he=S({density:String,dotColor:String,fillDot:Boolean,hideDot:Boolean,hideOpposite:{type:Boolean,default:void 0},icon:$,iconColor:String,lineInset:[Number,String],...w(),...K(),...E(),...A(),...j(),...N()},"VTimelineItem"),ye=T()({name:"VTimelineItem",props:he(),setup(e,m){let{slots:n}=m;const{dimensionStyles:d}=M(e),u=Y(0),r=p();return X(r,a=>{var o;a&&(u.value=((o=a.$el.querySelector(".v-timeline-divider__dot"))==null?void 0:o.getBoundingClientRect().width)??0)},{flush:"post"}),x(()=>{var a,o;return t("div",{class:["v-timeline-item",{"v-timeline-item--fill-dot":e.fillDot},e.class],style:[{"--v-timeline-dot-size":g(u.value),"--v-timeline-line-inset":e.lineInset?`calc(var(--v-timeline-dot-size) / 2 + ${g(e.lineInset)})`:g(0)},e.style]},[t("div",{class:"v-timeline-item__body",style:d.value},[(a=n.default)==null?void 0:a.call(n)]),t(fe,{ref:r,hideDot:e.hideDot,icon:e.icon,iconColor:e.iconColor,size:e.size,elevation:e.elevation,dotColor:e.dotColor,fillDot:e.fillDot,rounded:e.rounded},{default:n.icon}),e.density!=="compact"&&t("div",{class:"v-timeline-item__opposite"},[!e.hideOpposite&&((o=n.opposite)==null?void 0:o.call(n))])])}),{}}}),ge=i("span",null," Thank you for completing the questionnaire. Check your results by clicking the button below. ",-1),Ce=i("br",null,null,-1),ke=["src","height"],be=i("h3",null,"Notes",-1),Ve={class:"d-flex justify-between align-center w-100"},De=i("span",{class:"w-100"}," Your Quest ",-1),Se={class:"cursor-pointer text-white"},we={class:"d-flex"},Te={class:"me-4"},xe={key:0},ze=i("strong",null,"Exploration Area",-1),Ie=i("div",{class:"text-caption"}," Discover more about yourself and how it’ll be vital in shaping your future. ",-1),Pe=[ze,Ie],Be={key:1},Re=i("strong",null,"Profile Building Area",-1),Ne=i("div",{class:"text-caption"}," Identify what aspects you can hone to stand out more in an ever-growing competitive landscape. ",-1),$e=[Re,Ne],Ae={key:2},je=i("strong",null,"Academic Profiling Area",-1),Ee=i("div",{class:"text-caption"}," Consult your current scores and understand strategies on how to upgrade your academic profile. ",-1),pe=[je,Ee],qe={key:3},Le=i("strong",null,"Writing Area",-1),Je=i("div",{class:"text-caption"}," Delve deeper into what style of writing you’ll specifically need to master and what personal experiences you can utilize towards that goal. ",-1),Ue=[Le,Je],Fe={key:4},Oe=i("strong",null,"Sponsor Area",-1),Qe=i("div",{class:"text-caption"}," End the journey by refreshing your mind at one of our collaborator booths! ",-1),We=[Oe,Qe],lt={__name:"dashboard",setup(e){const{global:m}=Z(),n=V(()=>m.name.value==="dark"?oe:ae),d=p(ee.getUser()),u=async()=>{var a;const r=(a=d.value.client)==null?void 0:a.id;window.open("/api/report/"+r,"_blank")};return(r,a)=>(c(),C(R,null,{default:s(()=>[t(y,{cols:"12",md:"6"},{default:s(()=>[d.value.client.took_initial_assessment?(c(),C(k,{key:0,class:"text-center text-sm-start mb-4"},{default:s(()=>[t(R,{"no-gutters":""},{default:s(()=>[t(y,{cols:"12",sm:"8",order:"2","order-sm":"1"},{default:s(()=>[t(re,null,{default:s(()=>[i("h3",null," Congratulations "+te(d.value.client.full_name)+"! 🎉 ",1)]),_:1}),t(h(b),null,{default:s(()=>[ge,Ce,t(ie,{variant:"tonal",class:"mt-4",size:"small",onClick:u},{default:s(()=>[B(" Download Result ")]),_:1})]),_:1})]),_:1}),t(y,{cols:"12",sm:"1",order:"1","order-sm":"2",class:"text-center"},{default:s(()=>[i("img",{src:h(n),height:r.$vuetify.display.xs?"150":"175",class:se([r.$vuetify.display.xs?"mt-6 mb-n2":"position-absolute mt-10","john-illustration flip-in-rtl"])},null,10,ke)]),_:1})]),_:1})]),_:1})):v("",!0),t(k,null,{default:s(()=>[t(h(b),null,{default:s(()=>[be]),_:1})]),_:1})]),_:1}),t(y,{cols:"12",md:"6"},{default:s(()=>[t(k,{style:{background:"blue"}},{default:s(()=>[t(de,{class:"my-2 text-white"},{default:s(()=>[i("div",Ve,[De,i("div",Se,[t(ce,{activator:"parent",location:"start"},{default:s(()=>[B(" Download Quest Result ")]),_:1}),t(D,{icon:"bx-download"})])])]),_:1}),t(ue),t(h(b),{class:"text-dark",style:{background:"white"}},{default:s(()=>[t(ve,{align:"start",side:"end"},{default:s(()=>[(c(!0),_(ne,null,le(d.value.quest,(o,l)=>(c(),C(ye,{key:l,"dot-color":o?"success":"primary",size:"small"},{default:s(()=>[i("div",we,[i("strong",Te,[t(D,{icon:o?"bx-check":"bx-question-mark",color:o?"success":"primary"},null,8,["icon","color"])]),l=="Exploration"?(c(),_("div",xe,Pe)):v("",!0),l=="Profile Building"?(c(),_("div",Be,$e)):v("",!0),l=="Academic Profiling"?(c(),_("div",Ae,pe)):v("",!0),l=="Writing"?(c(),_("div",qe,Ue)):v("",!0),l=="Sponsor"?(c(),_("div",Fe,We)):v("",!0)])]),_:2},1032,["dot-color"]))),128))]),_:1})]),_:1})]),_:1})]),_:1})]),_:1}))}};export{lt as default};
