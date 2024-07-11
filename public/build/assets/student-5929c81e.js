import{K as B,bb as Q,p as Z,I as R,a3 as ee,m as ae,f as te,A as le,y as ne,z as se,g as ie,h as oe,$ as re,i as ue,aa as ce,a7 as de,l as ve,j as fe,ai as ge,J as me,n as E,ah as _e,s as L,az as N,q as k,v as be,b as l,R as C,a1 as w,aC as j,an as W,O as pe,r as ye,o as P,c as $,w as p,aE as he,a as t,d as D,W as K,X as xe,t as _,S,V as T,aJ as Ve,Y as ke}from"./main-d9d083dd.js";import{V as Le,c as Pe,b as Se}from"./VCard-af3277ae.js";import{V as Ae}from"./VTextField-cbaf83e5.js";import{V as O}from"./VDivider-e6bde160.js";import{V as Ie}from"./VSkeletonLoader-6141fc07.js";import{V as Ce}from"./VTable-b371556b.js";import{V as q}from"./VTooltip-05f5282e.js";import"./VAvatar-7b08e643.js";import"./VImg-8b60c905.js";import"./index-8eb98ae5.js";import"./VField-bce86ab0.js";import"./forwardRefs-e658ad70.js";import"./VOverlay-603536d7.js";import"./lazy-4a7b236e.js";function we(){const e=B([]);Q(()=>e.value=[]);function y(r,h){e.value[h]=r}return{refs:e,updateRef:y}}const Be=Z({activeColor:String,start:{type:[Number,String],default:1},modelValue:{type:Number,default:e=>e.start},disabled:Boolean,length:{type:[Number,String],default:1,validator:e=>e%1===0},totalVisible:[Number,String],firstIcon:{type:R,default:"$first"},prevIcon:{type:R,default:"$prev"},nextIcon:{type:R,default:"$next"},lastIcon:{type:R,default:"$last"},ariaLabel:{type:String,default:"$vuetify.pagination.ariaLabel.root"},pageAriaLabel:{type:String,default:"$vuetify.pagination.ariaLabel.page"},currentPageAriaLabel:{type:String,default:"$vuetify.pagination.ariaLabel.currentPage"},firstAriaLabel:{type:String,default:"$vuetify.pagination.ariaLabel.first"},previousAriaLabel:{type:String,default:"$vuetify.pagination.ariaLabel.previous"},nextAriaLabel:{type:String,default:"$vuetify.pagination.ariaLabel.next"},lastAriaLabel:{type:String,default:"$vuetify.pagination.ariaLabel.last"},ellipsis:{type:String,default:"..."},showFirstLastPage:Boolean,...ee(),...ae(),...te(),...le(),...ne(),...se(),...ie({tag:"nav"}),...oe(),...re({variant:"text"})},"VPagination"),Fe=ue()({name:"VPagination",props:Be(),emits:{"update:modelValue":e=>!0,first:e=>!0,prev:e=>!0,next:e=>!0,last:e=>!0},setup(e,y){let{slots:r,emit:h}=y;const n=ce(e,"modelValue"),{t:f,n:F}=de(),{isRtl:v}=ve(),{themeClasses:g}=fe(e),{width:V}=ge(),s=me(-1);E(void 0,{scoped:!0});const{resizeRef:U}=_e(a=>{if(!a.length)return;const{target:i,contentRect:o}=a[0],d=i.querySelector(".v-pagination__list > *");if(!d)return;const m=o.width,I=d.offsetWidth+parseFloat(getComputedStyle(d).marginRight)*2;s.value=M(m,I)}),u=L(()=>parseInt(e.length,10)),c=L(()=>parseInt(e.start,10)),b=L(()=>e.totalVisible!=null?parseInt(e.totalVisible,10):s.value>=0?s.value:M(V.value,58));function M(a,i){const o=e.showFirstLastPage?5:3;return Math.max(0,Math.floor(+((a-i*o)/i).toFixed(2)))}const Y=L(()=>{if(u.value<=0||isNaN(u.value)||u.value>Number.MAX_SAFE_INTEGER)return[];if(b.value<=0)return[];if(b.value===1)return[n.value];if(u.value<=b.value)return N(u.value,c.value);const a=b.value%2===0,i=a?b.value/2:Math.floor(b.value/2),o=a?i:i+1,d=u.value-i;if(o-n.value>=0)return[...N(Math.max(1,b.value-1),c.value),e.ellipsis,u.value];if(n.value-d>=(a?1:0)){const m=b.value-1,I=u.value-m+c.value;return[c.value,e.ellipsis,...N(m,I)]}else{const m=Math.max(1,b.value-3),I=m===1?n.value:n.value-Math.ceil(m/2)+c.value;return[c.value,e.ellipsis,...N(m,I),e.ellipsis,u.value]}});function A(a,i,o){a.preventDefault(),n.value=i,o&&h(o,i)}const{refs:G,updateRef:J}=we();E({VPaginationBtn:{color:k(e,"color"),border:k(e,"border"),density:k(e,"density"),size:k(e,"size"),variant:k(e,"variant"),rounded:k(e,"rounded"),elevation:k(e,"elevation")}});const X=L(()=>Y.value.map((a,i)=>{const o=d=>J(d,i);if(typeof a=="string")return{isActive:!1,key:`ellipsis-${i}`,page:a,props:{ref:o,ellipsis:!0,icon:!0,disabled:!0}};{const d=a===n.value;return{isActive:d,key:a,page:F(a),props:{ref:o,ellipsis:!1,icon:!0,disabled:!!e.disabled||+e.length<2,color:d?e.activeColor:e.color,"aria-current":d,"aria-label":f(d?e.currentPageAriaLabel:e.pageAriaLabel,a),onClick:m=>A(m,a)}}}})),x=L(()=>{const a=!!e.disabled||n.value<=c.value,i=!!e.disabled||n.value>=c.value+u.value-1;return{first:e.showFirstLastPage?{icon:v.value?e.lastIcon:e.firstIcon,onClick:o=>A(o,c.value,"first"),disabled:a,"aria-label":f(e.firstAriaLabel),"aria-disabled":a}:void 0,prev:{icon:v.value?e.nextIcon:e.prevIcon,onClick:o=>A(o,n.value-1,"prev"),disabled:a,"aria-label":f(e.previousAriaLabel),"aria-disabled":a},next:{icon:v.value?e.prevIcon:e.nextIcon,onClick:o=>A(o,n.value+1,"next"),disabled:i,"aria-label":f(e.nextAriaLabel),"aria-disabled":i},last:e.showFirstLastPage?{icon:v.value?e.firstIcon:e.lastIcon,onClick:o=>A(o,c.value+u.value-1,"last"),disabled:i,"aria-label":f(e.lastAriaLabel),"aria-disabled":i}:void 0}});function z(){var i;const a=n.value-c.value;(i=G.value[a])==null||i.$el.focus()}function H(a){a.key===j.left&&!e.disabled&&n.value>+e.start?(n.value=n.value-1,W(z)):a.key===j.right&&!e.disabled&&n.value<c.value+u.value-1&&(n.value=n.value+1,W(z))}return be(()=>l(e.tag,{ref:U,class:["v-pagination",g.value,e.class],style:e.style,role:"navigation","aria-label":f(e.ariaLabel),onKeydown:H,"data-test":"v-pagination-root"},{default:()=>[l("ul",{class:"v-pagination__list"},[e.showFirstLastPage&&l("li",{key:"first",class:"v-pagination__first","data-test":"v-pagination-first"},[r.first?r.first(x.value.first):l(C,w({_as:"VPaginationBtn"},x.value.first),null)]),l("li",{key:"prev",class:"v-pagination__prev","data-test":"v-pagination-prev"},[r.prev?r.prev(x.value.prev):l(C,w({_as:"VPaginationBtn"},x.value.prev),null)]),X.value.map((a,i)=>l("li",{key:a.key,class:["v-pagination__item",{"v-pagination__item--is-active":a.isActive}],"data-test":"v-pagination-item"},[r.item?r.item(a):l(C,w({_as:"VPaginationBtn"},a.props),{default:()=>[a.page]})])),l("li",{key:"next",class:"v-pagination__next","data-test":"v-pagination-next"},[r.next?r.next(x.value.next):l(C,w({_as:"VPaginationBtn"},x.value.next),null)]),e.showFirstLastPage&&l("li",{key:"last",class:"v-pagination__last","data-test":"v-pagination-last"},[r.last?r.last(x.value.last):l(C,w({_as:"VPaginationBtn"},x.value.last),null)])])]})),{}}}),Re={class:"d-flex justify-between w-100 mb-1 align-baseline"},Ne=t("div",{class:"w-100"}," Student List ",-1),$e=t("thead",null,[t("tr",null,[t("th",{class:"text-uppercase"}," Full Name "),t("th",null," School Name "),t("th",null," Grade "),t("th",null," Initial Assessment "),t("th",null," Score "),t("th",null," Quest "),t("th",null,"Action")])],-1),Te={class:"text-center"},qe={class:"text-center"},De={class:"text-center"},Me={class:"d-flex justify-center"},ze={class:"py-2"},Ee={class:"my-0"},je={class:"my-0"},We={class:"my-0"},Ke={class:"my-0"},Oe={class:"text-center"},Ue={class:"d-flex justify-center gap-3"},Ye={class:"text-center"},Ge={class:"d-flex justify-end mt-4"},ua={__name:"student",setup(e){const y=B(1),r=B(null),h=B([]),n=B(!1),f=async()=>{n.value=!0;try{const v=y.value>1?"?page="+y.value:"?page=1",g=r.value?"&q="+r.value:"",V=await he.get("admin/get/clients"+v+g);h.value=V.data,n.value=!1}catch(v){console.error(v),n.value=!1}},F=(v,g)=>Object.values(v).filter(V=>V===g).length;return pe(()=>{f()}),(v,g)=>{const V=ye("RouterLink");return P(),$(Le,null,{default:p(()=>[l(Pe,null,{default:p(()=>[t("div",Re,[Ne,l(Ae,{modelValue:r.value,"onUpdate:modelValue":[g[0]||(g[0]=s=>r.value=s),f],label:"Search","prepend-inner-icon":"mdi-magnify",density:"compact",variant:"outlined","hide-details":"","single-line":"",style:{width:"30%"}},null,8,["modelValue"])]),l(O)]),_:1}),l(Se,null,{default:p(()=>[n.value?(P(),$(Ie,{key:0,type:"table"})):D("",!0),n.value?D("",!0):(P(),$(Ce,{key:1},{default:p(()=>[$e,t("tbody",null,[(P(!0),K(ke,null,xe(h.value.data,s=>(P(),K("tr",{key:s},[t("td",null,_(s.full_name),1),t("td",Te,_(s.school),1),t("td",qe,_(s.grade>12?"Not High School":s.grade),1),t("td",De,[t("div",Me,[t("div",null,[l(q,{activator:"parent",location:"left"},{default:p(()=>[S(_(s.filled_ia==1?"Completed":"Not Yet"),1)]),_:2},1024),l(T,{icon:s.filled_ia==1?"bx-message-square-check":"bx-x",style:Ve(s.filled_ia==1?"color:green":"color:red")},null,8,["icon","style"])])])]),t("td",ze,[t("p",Ee," Exploration : "+_(s.report.score.Exploration.toFixed(2)),1),t("p",je," Profile Building : "+_(s.report.score["Profile Building"].toFixed(2)),1),t("p",We," Academic : "+_(s.report.score.Academic.toFixed(2)),1),t("p",Ke," Writing : "+_(s.report.score.Writing.toFixed(2)),1)]),t("td",Oe,[t("div",Ue,[t("div",null,[l(q,{activator:"parent",location:"left"},{default:p(()=>[S(" Success ")]),_:1}),l(T,{icon:"bx-message-square-check",color:"success"}),S(" "+_(F(s.quest,!0)),1)]),t("div",null,[l(q,{color:"success",activator:"parent",location:"right"},{default:p(()=>[S(" Not Yet ")]),_:1}),l(T,{icon:"bx-message-square-x",style:{color:"red"}}),S(" "+_(F(s.quest,!1)),1)])])]),t("td",Ye,[l(V,{to:{name:"student-detail",params:{id:s.uuid}}},{default:p(()=>[l(q,{color:"success",activator:"parent",location:"start"},{default:p(()=>[S(" View Detail ")]),_:1}),l(T,{icon:"bx-user-pin"})]),_:2},1032,["to"])])]))),128))])]),_:1})),l(O),t("div",Ge,[h.value.last_page>0?(P(),$(Fe,{key:0,modelValue:y.value,"onUpdate:modelValue":[g[1]||(g[1]=s=>y.value=s),f],"total-visible":7,length:h.value.last_page},null,8,["modelValue","length"])):D("",!0)])]),_:1})]),_:1})}}};export{ua as default};
