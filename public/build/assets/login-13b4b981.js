import{p as G,G as H,aO as J,i as Y,H as X,a8 as Z,a5 as ee,s as v,K as g,n as te,L as O,al as ae,v as le,aK as oe,b as l,W as se,$ as R,aP as ne,aQ as U,M as ue,N as ie,o as D,S as re,c as j,w as c,d as q,U as K,aI as w,aB as ce,P as M,Q as F,a as b,aC as de,aR as me}from"./main-e07c5191.js";import{_ as fe}from"./eduall-62475736.js";import{s as N}from"./notification-17c9d469.js";import{V as $,a as T}from"./VRow-3cac53ac.js";import{V as ve,b as L}from"./VCard-80277c32.js";import{V as pe}from"./VSkeletonLoader-bc5a9a79.js";import{V as _e}from"./VForm-c7feeca4.js";import{m as ge,b as be,a as he,c as ye}from"./VField-59538942.js";import{V as ke}from"./VOverlay-4c495867.js";import"./_commonjsHelpers-725317a4.js";/* empty css              */import"./VAvatar-08b8a8ec.js";import"./VImg-8d8b45dc.js";import"./forwardRefs-e658ad70.js";import"./index-2701031a.js";import"./lazy-3bc2fc74.js";const Ve=G({autofocus:Boolean,divider:String,focusAll:Boolean,label:{type:String,default:"$vuetify.input.otp"},length:{type:[Number,String],default:6},modelValue:{type:[Number,String],default:void 0},placeholder:String,type:{type:String,default:"number"},...H(),...ge(),...J(be({variant:"outlined"}),["baseColor","bgColor","class","color","disabled","error","loading","rounded","style","theme","variant"])},"VOtpInput"),xe=Y()({name:"VOtpInput",props:Ve(),emits:{finish:e=>!0,"update:focused":e=>!0,"update:modelValue":e=>!0},setup(e,S){let{attrs:I,emit:V,slots:m}=S;const{dimensionStyles:A}=X(e),{isFocused:p,focus:_,blur:P}=he(e),n=Z(e,"modelValue","",t=>String(t).split(""),t=>t.join("")),{t:a}=ee(),f=v(()=>Number(e.length)),h=v(()=>Array(f.value).fill(0)),s=g(-1),y=g(),d=g([]),k=v(()=>d.value[s.value]);function C(){if(e.type==="number"&&/[^0-9]/g.test(k.value.value)){k.value.value="";return}const t=n.value.slice(),o=k.value.value;t[s.value]=o;let u=null;s.value>n.value.length?u=n.value.length+1:s.value+1!==f.value&&(u="next"),n.value=t,u&&U(y.value,u)}function B(t){const o=n.value.slice(),u=s.value;let i=null;["ArrowLeft","ArrowRight","Backspace","Delete"].includes(t.key)&&(t.preventDefault(),t.key==="ArrowLeft"?i="prev":t.key==="ArrowRight"?i="next":["Backspace","Delete"].includes(t.key)&&(o[s.value]="",n.value=o,s.value>0&&t.key==="Backspace"?i="prev":requestAnimationFrame(()=>{var r;(r=d.value[u])==null||r.select()})),requestAnimationFrame(()=>{i!=null&&U(y.value,i)}))}function E(t,o){var u,i;o.preventDefault(),o.stopPropagation(),n.value=(((u=o==null?void 0:o.clipboardData)==null?void 0:u.getData("Text"))??"").split(""),(i=d.value)==null||i[t].blur()}function Q(){n.value=[]}function W(t,o){_(),s.value=o}function z(){P(),s.value=-1}return te({VField:{color:v(()=>e.color),bgColor:v(()=>e.color),baseColor:v(()=>e.baseColor),disabled:v(()=>e.disabled),error:v(()=>e.error),variant:v(()=>e.variant)}},{scoped:!0}),O(n,t=>{t.length===f.value&&V("finish",t.join(""))},{deep:!0}),O(s,t=>{t<0||ae(()=>{var o;(o=d.value[t])==null||o.select()})}),le(()=>{var u;const[t,o]=oe(I);return l("div",R({class:["v-otp-input",{"v-otp-input--divided":!!e.divider},e.class],style:[e.style]},t),[l("div",{ref:y,class:"v-otp-input__content",style:[A.value]},[h.value.map((i,r)=>l(se,null,[e.divider&&r!==0&&l("span",{class:"v-otp-input__divider"},[e.divider]),l(ye,{focused:p.value&&e.focusAll||s.value===r,key:r},{...m,loader:void 0,default:()=>l("input",{ref:x=>d.value[r]=x,"aria-label":a(e.label,r+1),autofocus:r===0&&e.autofocus,autocomplete:"one-time-code",class:["v-otp-input__field"],disabled:e.disabled,inputmode:e.type==="number"?"numeric":"text",min:e.type==="number"?0:void 0,maxlength:"1",placeholder:e.placeholder,type:e.type==="number"?"text":e.type,value:n.value[r],onInput:C,onFocus:x=>W(x,r),onBlur:z,onKeydown:B,onPaste:x=>E(r,x)},null)})])),l("input",R({class:"v-otp-input-input",type:"hidden"},o,{value:n.value.join("")}),null),l(ke,{contained:!0,"content-class":"v-otp-input__loader","model-value":!!e.loading,persistent:!0},{default:()=>{var i;return[((i=m.loader)==null?void 0:i.call(m))??l(ne,{color:typeof e.loading=="boolean"?void 0:e.loading,indeterminate:!0,size:"24",width:"2"},null)]}}),(u=m.default)==null?void 0:u.call(m)])])}),{blur:()=>{var t;(t=d.value)==null||t.some(o=>o.blur())},focus:()=>{var t;(t=d.value)==null||t[0].focus()},reset:Q,isFocused:p}}});const we={class:"auth-wrapper d-flex align-center justify-center pa-4"},Se=b("div",{class:"d-flex justify-center mb-10 mt-5"},[b("img",{src:fe,alt:""})],-1),Ae=b("h5",{class:"text-h5 mb-1"}," Welcome to EduALL Assessment! 👋🏻 ",-1),Ce=b("p",{class:"mb-0"},[F(" Please sign in with your ticket number "),b("br"),F(" to begin the adventure. ")],-1),Be=b("h5",{class:"mb-3"}," I don't have a ticket number, ",-1),Fe={href:"https://registration.edu-all.com/form/event?ft=cta&ev=evt-0014&et=offline&as=attend&s=ots&t=self&a=true"},We={__name:"login",props:{ticket:String},setup(e){const S=e,{global:I}=ue(),V=g(!0),m=g(null),A=g(!1),p=g(!1),_=g({ticket_id:""}),P=async()=>{if(_.value.ticket_id.length==4){p.value=!0;try{const a=await de.post("signin",{ticket_no:_.value.ticket_id});a.success?(K.saveUser(a.data),me.saveToken(a.data.token),window.location.reload()):(_.value.ticket_id="",N("error",a.message,"bottom-end")),p.value=!1}catch(a){N("error",a,"bottom-end"),p.value=!1}}else A.value=!0},n=()=>{var f,h,s,y,d,k,C,B;const a=K.getUser();a&&((f=a.client)!=null&&f.is_vip||((s=(h=a.client)==null?void 0:h.education)==null?void 0:s.grade)<7?(y=a.client)!=null&&y.took_quest?w.push({name:"dashboard"}):w.push({name:"dashboard"}):((d=a.client)==null?void 0:d.took_initial_assessment)==1&&((k=a.client)==null?void 0:k.took_quest)==0?w.push({name:"dashboard"}):((C=a.client)==null?void 0:C.took_initial_assessment)==1&&((B=a.client)==null?void 0:B.took_quest)==1?w.push({name:"dashboard"}):w.push({name:"assessment"}),setTimeout(()=>{N("success","You`ve successfully logged in","bottom-end")},1e3))};return ie(()=>{const a=localStorage.getItem("mode");a&&(I.name.value=a),S.ticket&&(_.value.ticket_id=S.ticket),setTimeout(()=>{V.value=!1},2e3),n()}),(a,f)=>(D(),re("div",we,[V.value?(D(),j($,{key:0,class:"justify-center"},{default:c(()=>[l(T,{md:"4"},{default:c(()=>[l(pe,{class:"mx-auto border",type:"image, article, paragraph, button",elevation:"12"})]),_:1})]),_:1})):q("",!0),V.value?q("",!0):(D(),j(ve,{key:1,class:"auth-card pa-4 pt-7","max-width":"500"},{default:c(()=>[Se,l(L,{class:"pt-2 text-center pb-3"},{default:c(()=>[Ae,Ce]),_:1}),l(L,null,{default:c(()=>[l(_e,{ref_key:"formData",ref:m,onSubmit:ce(P,["prevent"])},{default:c(()=>[l($,null,{default:c(()=>[l(T,{cols:"12",class:"pb-0"},{default:c(()=>[l(xe,{modelValue:_.value.ticket_id,"onUpdate:modelValue":f[0]||(f[0]=h=>_.value.ticket_id=h),title:"Ticket Number",type:"text",length:"4",loading:p.value,error:A.value},null,8,["modelValue","loading","error"])]),_:1}),l(T,{cols:"12",class:""},{default:c(()=>[l(M,{block:"",type:"submit",loading:p.value},{default:c(()=>[F(" Sign In ")]),_:1},8,["loading"])]),_:1})]),_:1})]),_:1},512)]),_:1}),l(L,{class:"text-center"},{default:c(()=>[Be,b("a",Fe,[l(M,{block:"",color:"secondary",type:"button"},{default:c(()=>[F(" Sign Up Now ")]),_:1})])]),_:1})]),_:1}))]))}};export{We as default};
