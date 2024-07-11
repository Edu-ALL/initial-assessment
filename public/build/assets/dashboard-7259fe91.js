import{p as I,m as z,f as W,g as N,h as G,i as P,j as Q,k as U,l as Y,n as H,q as y,s as T,v as B,b as t,x as C,I as q,y as L,z as F,A as J,B as K,C as R,D as X,E as Z,V as x,F as ee,G as te,H as ie,J as se,K as M,L as O,M as oe,N as b,O as ne,P as le,Q as $,o as c,c as g,w as o,a as i,t as ae,u as f,R as p,S as w,T as V,d as _,W as h,X as re,Y as de}from"./main-d9d083dd.js";import{i as ce}from"./illustration-john-light-13186c6f.js";import{V as A,a as k}from"./VRow-f1a803b8.js";import{V as D,a as ue,b as S,c as me}from"./VCard-af3277ae.js";import{V as ve}from"./VTooltip-05f5282e.js";import{V as _e}from"./VDivider-e6bde160.js";/* empty css              */import"./VAvatar-7b08e643.js";import"./VImg-8b60c905.js";import"./VOverlay-603536d7.js";import"./forwardRefs-e658ad70.js";import"./lazy-4a7b236e.js";const fe="/build/assets/illustration-john-dark-7ad2aad1.png",j="/build/assets/summer-program-3295bc56.jpeg";const he=I({align:{type:String,default:"center",validator:e=>["center","start"].includes(e)},direction:{type:String,default:"vertical",validator:e=>["vertical","horizontal"].includes(e)},justify:{type:String,default:"auto",validator:e=>["auto","center"].includes(e)},side:{type:String,validator:e=>e==null||["start","end"].includes(e)},lineInset:{type:[String,Number],default:0},lineThickness:{type:[String,Number],default:2},lineColor:String,truncateLine:{type:String,validator:e=>["start","end","both"].includes(e)},...z(),...W(),...N(),...G()},"VTimeline"),ye=P()({name:"VTimeline",props:he(),setup(e,v){let{slots:a}=v;const{themeClasses:r}=Q(e),{densityClasses:u}=U(e),{rtlClasses:m}=Y();H({VTimelineDivider:{lineColor:y(e,"lineColor")},VTimelineItem:{density:y(e,"density"),lineInset:y(e,"lineInset")}});const l=T(()=>{const s=e.side?e.side:e.density!=="default"?"end":null;return s&&`v-timeline--side-${s}`}),n=T(()=>{const s=["v-timeline--truncate-line-start","v-timeline--truncate-line-end"];switch(e.truncateLine){case"both":return s;case"start":return s[0];case"end":return s[1];default:return null}});return B(()=>t(e.tag,{class:["v-timeline",`v-timeline--${e.direction}`,`v-timeline--align-${e.align}`,`v-timeline--justify-${e.justify}`,n.value,{"v-timeline--inset-line":!!e.lineInset},r.value,u.value,l.value,m.value,e.class],style:[{"--v-timeline-line-thickness":C(e.lineThickness)},e.style]},a)),{}}}),ge=I({dotColor:String,fillDot:Boolean,hideDot:Boolean,icon:q,iconColor:String,lineColor:String,...z(),...L(),...F(),...J()},"VTimelineDivider"),ke=P()({name:"VTimelineDivider",props:ge(),setup(e,v){let{slots:a}=v;const{sizeClasses:r,sizeStyles:u}=K(e,"v-timeline-divider__dot"),{backgroundColorStyles:m,backgroundColorClasses:l}=R(y(e,"dotColor")),{roundedClasses:n}=X(e,"v-timeline-divider__dot"),{elevationClasses:s}=Z(e),{backgroundColorClasses:d,backgroundColorStyles:E}=R(y(e,"lineColor"));return B(()=>t("div",{class:["v-timeline-divider",{"v-timeline-divider--fill-dot":e.fillDot},e.class],style:e.style},[t("div",{class:["v-timeline-divider__before",d.value],style:E.value},null),!e.hideDot&&t("div",{key:"dot",class:["v-timeline-divider__dot",s.value,n.value,r.value],style:u.value},[t("div",{class:["v-timeline-divider__inner-dot",l.value,n.value],style:m.value},[a.default?t(ee,{key:"icon-defaults",disabled:!e.icon,defaults:{VIcon:{color:e.iconColor,icon:e.icon,size:e.size}}},a.default):t(x,{key:"icon",color:e.iconColor,icon:e.icon,size:e.size},null)])]),t("div",{class:["v-timeline-divider__after",d.value],style:E.value},null)])),{}}}),Ce=I({density:String,dotColor:String,fillDot:Boolean,hideDot:Boolean,hideOpposite:{type:Boolean,default:void 0},icon:q,iconColor:String,lineInset:[Number,String],...z(),...te(),...J(),...L(),...F(),...N()},"VTimelineItem"),be=P()({name:"VTimelineItem",props:Ce(),setup(e,v){let{slots:a}=v;const{dimensionStyles:r}=ie(e),u=se(0),m=M();return O(m,l=>{var n;l&&(u.value=((n=l.$el.querySelector(".v-timeline-divider__dot"))==null?void 0:n.getBoundingClientRect().width)??0)},{flush:"post"}),B(()=>{var l,n;return t("div",{class:["v-timeline-item",{"v-timeline-item--fill-dot":e.fillDot},e.class],style:[{"--v-timeline-dot-size":C(u.value),"--v-timeline-line-inset":e.lineInset?`calc(var(--v-timeline-dot-size) / 2 + ${C(e.lineInset)})`:C(0)},e.style]},[t("div",{class:"v-timeline-item__body",style:r.value},[(l=a.default)==null?void 0:l.call(a)]),t(ke,{ref:m,hideDot:e.hideDot,icon:e.icon,iconColor:e.iconColor,size:e.size,elevation:e.elevation,dotColor:e.dotColor,fillDot:e.fillDot,rounded:e.rounded},{default:a.icon}),e.density!=="compact"&&t("div",{class:"v-timeline-item__opposite"},[!e.hideOpposite&&((n=a.opposite)==null?void 0:n.call(a))])])}),{}}}),pe=i("span",null," Thank you for completing the assessment. Check your results by clicking the button below. ",-1),we=i("br",null,null,-1),Ve=i("br",null,null,-1),De=["src","height"],Se=i("p",null," Every year, 150+ of our mentees have gotten into their dream universities. It's time for your turn! ",-1),Te=i("p",{class:"my-3"}," Get a FREE Initial Consultation at EduALL! ",-1),xe={href:"https://edu-all.com/public/id-en/sign-me/admission-mentoring",target:"_blank",rel:"noopener noreferrer"},Ie={href:"https://bit.ly/portofolio-powerup",target:"_blank",rel:"noopener noreferrer"},ze=["src"],Pe={class:"d-flex justify-between align-center w-100"},Be=i("span",{class:"w-100"}," Report Activity ",-1),Ee={class:"d-flex"},Re={class:"me-4"},$e={key:0},Ae=i("strong",null,"Interest Exploration Area",-1),je=i("div",{class:"text-caption"}," Discover more about yourself and how it’ll be vital in shaping your future. ",-1),Ne=[Ae,je],qe={key:1},Le=i("strong",null,"Profile-Building Area",-1),Fe=i("div",{class:"text-caption"}," Identify what aspects you can hone to stand out more in an ever-growing competitive landscape. ",-1),Je=[Le,Fe],Me={key:2},Oe=i("strong",null,"Academic Enrichment Area",-1),We=i("div",{class:"text-caption"}," Consult your current scores and understand strategies on how to upgrade your academic profile. ",-1),Ge=[Oe,We],Qe={key:3},Ue=i("strong",null,"Essay Writing Area",-1),Ye=i("div",{class:"text-caption"}," Delve deeper into what style of writing you’ll specifically need to master and what personal experiences you can utilize towards that goal. ",-1),He=[Ue,Ye],Ke={key:4},Xe=i("strong",null,"Industry Partners Area",-1),Ze=i("div",{class:"text-caption"}," End the journey by refreshing your mind at one of our collaborator booths! ",-1),et=[Xe,Ze],tt={href:"https://bit.ly/portofolio-powerup",target:"_blank",rel:"noopener noreferrer"},it=["src"],ft={__name:"dashboard",setup(e){const{global:v}=oe(),a=T(()=>v.name.value==="dark"?fe:ce),r=M(b()),u=async l=>{var s;const n=(s=r.value.client)==null?void 0:s.id;l=="result"?window.open("/api/report/"+n,"_blank"):window.open("/api/report/"+n+"/summary","_blank")},m=async()=>{var n;const l=(n=r.value.client)==null?void 0:n.id;window.open("/api/report_quest/"+l,"_blank")};return ne(()=>{le.push("/assessment"),$().checkMe(),r.value=b()}),O(()=>{$().checkMe(),r.value=b()}),(l,n)=>(c(),g(A,null,{default:o(()=>[t(k,{cols:"12",md:"6"},{default:o(()=>{var s;return[((s=r.value.client)==null?void 0:s.took_initial_assessment)==1?(c(),g(D,{key:0,class:"text-center text-sm-start mb-1"},{default:o(()=>[t(A,{"no-gutters":""},{default:o(()=>[t(k,{cols:"12",sm:"8",order:"2","order-sm":"1"},{default:o(()=>[t(ue,null,{default:o(()=>{var d;return[i("h3",null,"Congratulations "+ae((d=r.value.client)==null?void 0:d.full_name)+"! 🎉",1)]}),_:1}),t(f(S),null,{default:o(()=>[pe,we,Ve,t(p,{class:"my-1 me-2",size:"small",onClick:n[0]||(n[0]=d=>u("result"))},{default:o(()=>[w(" Your Personalized Report ")]),_:1})]),_:1})]),_:1}),t(k,{cols:"12",sm:"1",order:"1","order-sm":"2",class:"text-center"},{default:o(()=>[i("img",{src:f(a),height:l.$vuetify.display.xs?"150":"175",class:V([l.$vuetify.display.xs?"mt-6 mb-n2":"position-absolute mt-10","john-illustration flip-in-rtl"])},null,10,De)]),_:1})]),_:1})]),_:1})):_("",!0),t(D,{class:"text-center text-sm-start my-3"},{default:o(()=>[t(f(S),null,{default:o(()=>[Se,Te,i("a",xe,[t(p,{color:"secondary",size:"small"},{default:o(()=>[w(" Schedule Now! ")]),_:1})])]),_:1})]),_:1}),i("a",Ie,[i("img",{src:f(j),class:V(["w-100 rounded shadow",l.$vuetify.display.xs?"d-none":"d-none mt-5"])},null,10,ze)])]}),_:1}),t(k,{cols:"12",md:"6"},{default:o(()=>[t(D,{style:{"border-bottom":"5px solid #1414ff"},class:"d-none"},{default:o(()=>[t(me,{class:"my-1"},{default:o(()=>{var s;return[i("div",Pe,[Be,((s=r.value.client)==null?void 0:s.took_quest)==1?(c(),g(p,{key:0,density:"compact",color:"primary",class:"px-2",style:{"min-width":"10px !important"},onClick:m},{default:o(()=>[t(ve,{activator:"parent",location:"start"},{default:o(()=>[w(" Download ")]),_:1}),t(x,{icon:"bx-download",class:"py-1"})]),_:1})):_("",!0)])]}),_:1}),t(_e),t(f(S),{class:"text-dark"},{default:o(()=>[t(ye,{align:"start",side:"end"},{default:o(()=>[(c(!0),h(de,null,re(r.value.quest,(s,d)=>(c(),g(be,{key:d,"dot-color":s?"success":"primary",size:"small"},{default:o(()=>[i("div",Ee,[i("strong",Re,[t(x,{icon:s?"bx-check":"bx-question-mark",color:s?"success":"primary"},null,8,["icon","color"])]),d=="Exploration"?(c(),h("div",$e,Ne)):_("",!0),d=="Profile Building"?(c(),h("div",qe,Je)):_("",!0),d=="Academic Profiling"?(c(),h("div",Me,Ge)):_("",!0),d=="Writing"?(c(),h("div",Qe,He)):_("",!0),d=="Sponsor"?(c(),h("div",Ke,et)):_("",!0)])]),_:2},1032,["dot-color"]))),128))]),_:1})]),_:1})]),_:1}),i("a",tt,[i("img",{src:f(j),class:V(["w-100 rounded shadow",l.$vuetify.display.xs?"d-block mt-5":"d-block"])},null,10,it)])]),_:1})]),_:1}))}};export{ft as default};
