import{K as B,b7 as X,p as Z,I as N,a1 as ee,m as ae,f as te,A as le,y as ne,z as se,g as ie,h as oe,Z as re,i as ue,a8 as ce,a5 as de,l as ve,j as fe,ag as ge,J as me,n as E,af as _e,s as L,ax as R,q as k,v as pe,b as l,P as C,$ as w,aA as j,al as W,N as be,r as ye,o as P,c as $,w as b,aC as he,a as t,d as D,S as K,T as xe,t as _,Q as S,V as T,aI as Ve,W as ke}from"./main-f48007bc.js";import{V as Le,c as Pe,b as Se}from"./VCard-4e460f18.js";import{V as Ae}from"./VTextField-8a0187c8.js";import{V as U}from"./VDivider-1de8a617.js";import{V as Ie}from"./VSkeletonLoader-21879cad.js";import{V as Ce}from"./VTable-a6cc7dad.js";import{V as q}from"./VTooltip-b3ebe0fc.js";import"./VAvatar-b21f0733.js";import"./VImg-cefe29a1.js";import"./index-d104eba4.js";import"./VField-e6588e76.js";import"./forwardRefs-e658ad70.js";import"./VOverlay-2fddccd8.js";import"./lazy-16af0335.js";function we(){const e=B([]);X(()=>e.value=[]);function y(r,h){e.value[h]=r}return{refs:e,updateRef:y}}const Be=Z({activeColor:String,start:{type:[Number,String],default:1},modelValue:{type:Number,default:e=>e.start},disabled:Boolean,length:{type:[Number,String],default:1,validator:e=>e%1===0},totalVisible:[Number,String],firstIcon:{type:N,default:"$first"},prevIcon:{type:N,default:"$prev"},nextIcon:{type:N,default:"$next"},lastIcon:{type:N,default:"$last"},ariaLabel:{type:String,default:"$vuetify.pagination.ariaLabel.root"},pageAriaLabel:{type:String,default:"$vuetify.pagination.ariaLabel.page"},currentPageAriaLabel:{type:String,default:"$vuetify.pagination.ariaLabel.currentPage"},firstAriaLabel:{type:String,default:"$vuetify.pagination.ariaLabel.first"},previousAriaLabel:{type:String,default:"$vuetify.pagination.ariaLabel.previous"},nextAriaLabel:{type:String,default:"$vuetify.pagination.ariaLabel.next"},lastAriaLabel:{type:String,default:"$vuetify.pagination.ariaLabel.last"},ellipsis:{type:String,default:"..."},showFirstLastPage:Boolean,...ee(),...ae(),...te(),...le(),...ne(),...se(),...ie({tag:"nav"}),...oe(),...re({variant:"text"})},"VPagination"),Fe=ue()({name:"VPagination",props:Be(),emits:{"update:modelValue":e=>!0,first:e=>!0,prev:e=>!0,next:e=>!0,last:e=>!0},setup(e,y){let{slots:r,emit:h}=y;const n=ce(e,"modelValue"),{t:f,n:F}=de(),{isRtl:v}=ve(),{themeClasses:g}=fe(e),{width:V}=ge(),s=me(-1);E(void 0,{scoped:!0});const{resizeRef:G}=_e(a=>{if(!a.length)return;const{target:i,contentRect:o}=a[0],d=i.querySelector(".v-pagination__list > *");if(!d)return;const m=o.width,I=d.offsetWidth+parseFloat(getComputedStyle(d).marginRight)*2;s.value=M(m,I)}),u=L(()=>parseInt(e.length,10)),c=L(()=>parseInt(e.start,10)),p=L(()=>e.totalVisible!=null?parseInt(e.totalVisible,10):s.value>=0?s.value:M(V.value,58));function M(a,i){const o=e.showFirstLastPage?5:3;return Math.max(0,Math.floor(+((a-i*o)/i).toFixed(2)))}const O=L(()=>{if(u.value<=0||isNaN(u.value)||u.value>Number.MAX_SAFE_INTEGER)return[];if(p.value<=0)return[];if(p.value===1)return[n.value];if(u.value<=p.value)return R(u.value,c.value);const a=p.value%2===0,i=a?p.value/2:Math.floor(p.value/2),o=a?i:i+1,d=u.value-i;if(o-n.value>=0)return[...R(Math.max(1,p.value-1),c.value),e.ellipsis,u.value];if(n.value-d>=(a?1:0)){const m=p.value-1,I=u.value-m+c.value;return[c.value,e.ellipsis,...R(m,I)]}else{const m=Math.max(1,p.value-3),I=m===1?n.value:n.value-Math.ceil(m/2)+c.value;return[c.value,e.ellipsis,...R(m,I),e.ellipsis,u.value]}});function A(a,i,o){a.preventDefault(),n.value=i,o&&h(o,i)}const{refs:Q,updateRef:Y}=we();E({VPaginationBtn:{color:k(e,"color"),border:k(e,"border"),density:k(e,"density"),size:k(e,"size"),variant:k(e,"variant"),rounded:k(e,"rounded"),elevation:k(e,"elevation")}});const H=L(()=>O.value.map((a,i)=>{const o=d=>Y(d,i);if(typeof a=="string")return{isActive:!1,key:`ellipsis-${i}`,page:a,props:{ref:o,ellipsis:!0,icon:!0,disabled:!0}};{const d=a===n.value;return{isActive:d,key:a,page:F(a),props:{ref:o,ellipsis:!1,icon:!0,disabled:!!e.disabled||+e.length<2,color:d?e.activeColor:e.color,"aria-current":d,"aria-label":f(d?e.currentPageAriaLabel:e.pageAriaLabel,a),onClick:m=>A(m,a)}}}})),x=L(()=>{const a=!!e.disabled||n.value<=c.value,i=!!e.disabled||n.value>=c.value+u.value-1;return{first:e.showFirstLastPage?{icon:v.value?e.lastIcon:e.firstIcon,onClick:o=>A(o,c.value,"first"),disabled:a,"aria-label":f(e.firstAriaLabel),"aria-disabled":a}:void 0,prev:{icon:v.value?e.nextIcon:e.prevIcon,onClick:o=>A(o,n.value-1,"prev"),disabled:a,"aria-label":f(e.previousAriaLabel),"aria-disabled":a},next:{icon:v.value?e.prevIcon:e.nextIcon,onClick:o=>A(o,n.value+1,"next"),disabled:i,"aria-label":f(e.nextAriaLabel),"aria-disabled":i},last:e.showFirstLastPage?{icon:v.value?e.firstIcon:e.lastIcon,onClick:o=>A(o,c.value+u.value-1,"last"),disabled:i,"aria-label":f(e.lastAriaLabel),"aria-disabled":i}:void 0}});function z(){var i;const a=n.value-c.value;(i=Q.value[a])==null||i.$el.focus()}function J(a){a.key===j.left&&!e.disabled&&n.value>+e.start?(n.value=n.value-1,W(z)):a.key===j.right&&!e.disabled&&n.value<c.value+u.value-1&&(n.value=n.value+1,W(z))}return pe(()=>l(e.tag,{ref:G,class:["v-pagination",g.value,e.class],style:e.style,role:"navigation","aria-label":f(e.ariaLabel),onKeydown:J,"data-test":"v-pagination-root"},{default:()=>[l("ul",{class:"v-pagination__list"},[e.showFirstLastPage&&l("li",{key:"first",class:"v-pagination__first","data-test":"v-pagination-first"},[r.first?r.first(x.value.first):l(C,w({_as:"VPaginationBtn"},x.value.first),null)]),l("li",{key:"prev",class:"v-pagination__prev","data-test":"v-pagination-prev"},[r.prev?r.prev(x.value.prev):l(C,w({_as:"VPaginationBtn"},x.value.prev),null)]),H.value.map((a,i)=>l("li",{key:a.key,class:["v-pagination__item",{"v-pagination__item--is-active":a.isActive}],"data-test":"v-pagination-item"},[r.item?r.item(a):l(C,w({_as:"VPaginationBtn"},a.props),{default:()=>[a.page]})])),l("li",{key:"next",class:"v-pagination__next","data-test":"v-pagination-next"},[r.next?r.next(x.value.next):l(C,w({_as:"VPaginationBtn"},x.value.next),null)]),e.showFirstLastPage&&l("li",{key:"last",class:"v-pagination__last","data-test":"v-pagination-last"},[r.last?r.last(x.value.last):l(C,w({_as:"VPaginationBtn"},x.value.last),null)])])]})),{}}}),Ne={class:"d-flex justify-between w-100 mb-1 align-baseline"},Re=t("div",{class:"w-100"}," Student List ",-1),$e=t("thead",null,[t("tr",null,[t("th",{class:"text-uppercase"}," Full Name "),t("th",null," School Name "),t("th",null," Grade "),t("th",null," Initial Assessment "),t("th",null," Score "),t("th",null," Quest "),t("th",null,"Action")])],-1),Te={class:"text-center"},qe={class:"text-center"},De={class:"text-center"},Me={class:"d-flex justify-center"},ze={class:"py-2"},Ee={class:"my-0"},je={class:"my-0"},We={class:"my-0"},Ke={class:"my-0"},Ue={class:"text-center"},Ge={class:"d-flex justify-center gap-3"},Oe={class:"text-center"},Qe={class:"d-flex justify-end mt-4"},ua={__name:"student",setup(e){const y=B(1),r=B(null),h=B([]),n=B(!1),f=async()=>{n.value=!0;try{const v=y.value>1?"?page="+y.value:"?page=1",g=r.value?"&q="+r.value:"",V=await he.get("admin/get/clients"+v+g);h.value=V.data,n.value=!1}catch(v){console.error(v),n.value=!1}},F=(v,g)=>Object.values(v).filter(V=>V===g).length;return be(()=>{f()}),(v,g)=>{const V=ye("RouterLink");return P(),$(Le,null,{default:b(()=>[l(Pe,null,{default:b(()=>[t("div",Ne,[Re,l(Ae,{modelValue:r.value,"onUpdate:modelValue":[g[0]||(g[0]=s=>r.value=s),f],label:"Search","prepend-inner-icon":"mdi-magnify",density:"compact",variant:"outlined","hide-details":"","single-line":"",style:{width:"30%"}},null,8,["modelValue"])]),l(U)]),_:1}),l(Se,null,{default:b(()=>[n.value?(P(),$(Ie,{key:0,type:"table"})):D("",!0),n.value?D("",!0):(P(),$(Ce,{key:1},{default:b(()=>[$e,t("tbody",null,[(P(!0),K(ke,null,xe(h.value.data,s=>(P(),K("tr",{key:s},[t("td",null,_(s.full_name),1),t("td",Te,_(s.school),1),t("td",qe,_(s.grade>12?"Not High School":s.grade),1),t("td",De,[t("div",Me,[t("div",null,[l(q,{activator:"parent",location:"left"},{default:b(()=>[S(_(s.filled_ia==1?"Completed":"Not Yet"),1)]),_:2},1024),l(T,{icon:s.filled_ia==1?"bx-message-square-check":"bx-x",style:Ve(s.filled_ia==1?"color:green":"color:red")},null,8,["icon","style"])])])]),t("td",ze,[t("p",Ee," Exploration : "+_(s.report.score.Exploration.toFixed(2)),1),t("p",je," Profile Building : "+_(s.report.score["Profile Building"].toFixed(2)),1),t("p",We," Academic : "+_(s.report.score.Academic.toFixed(2)),1),t("p",Ke," Writing : "+_(s.report.score.Writing.toFixed(2)),1)]),t("td",Ue,[t("div",Ge,[t("div",null,[l(q,{activator:"parent",location:"left"},{default:b(()=>[S(" Success ")]),_:1}),l(T,{icon:"bx-message-square-check",color:"success"}),S(" "+_(F(s.quest,!0)),1)]),t("div",null,[l(q,{color:"success",activator:"parent",location:"right"},{default:b(()=>[S(" Not Yet ")]),_:1}),l(T,{icon:"bx-message-square-x",style:{color:"red"}}),S(" "+_(F(s.quest,!1)),1)])])]),t("td",Oe,[l(V,{to:{name:"student-detail",params:{id:s.uuid}}},{default:b(()=>[l(q,{color:"success",activator:"parent",location:"start"},{default:b(()=>[S(" View Detail ")]),_:1}),l(T,{icon:"bx-user-pin"})]),_:2},1032,["to"])])]))),128))])]),_:1})),l(U),t("div",Qe,[h.value.last_page>0?(P(),$(Fe,{key:0,modelValue:y.value,"onUpdate:modelValue":[g[1]||(g[1]=s=>y.value=s),f],"total-visible":7,length:h.value.last_page},null,8,["modelValue","length"])):D("",!0)])]),_:1})]),_:1})}}};export{ua as default};