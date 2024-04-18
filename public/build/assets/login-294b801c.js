import{p as D,ao as E,i as S,a6 as j,aJ as M,s as $,v as J,aK as K,b as a,Z as b,K as c,an as O,aR as V,U as v,aI as Q,o as W,Q as Z,w as i,u as s,aA as q,a as u,O as z,N as G,aB as H}from"./main-2d17238d.js";import{_ as X}from"./eduall-62475736.js";import{s as _}from"./notification-17c9d469.js";import{r as x}from"./rules-8a6c619a.js";import{V as Y,b as h}from"./VCard-cb335aed.js";import{V as ee}from"./VForm-6eb7f7ff.js";import{V as ae,a as w}from"./VRow-76f216cc.js";import{a as se,b as k,V as y}from"./VTextField-adf60d2c.js";import{m as te,V as g}from"./VCheckboxBtn-a0d15b18.js";import{a as oe}from"./VField-898c5fd0.js";import"./_commonjsHelpers-725317a4.js";import"./VAvatar-b5a4d237.js";import"./VImg-b7d59b09.js";import"./forwardRefs-e658ad70.js";/* empty css              */import"./index-bc6eec9f.js";const le=D({...se(),...E(te(),["inline"])},"VCheckbox"),re=S()({name:"VCheckbox",inheritAttrs:!1,props:le(),emits:{"update:modelValue":o=>!0,"update:focused":o=>!0},setup(o,m){let{attrs:t,slots:n}=m;const l=j(o,"modelValue"),{isFocused:p,focus:d,blur:e}=oe(o),r=M(),C=$(()=>o.id||`checkbox-${r}`);return J(()=>{const[P,U]=K(t),A=k.filterProps(o),B=g.filterProps(o);return a(k,b({class:["v-checkbox",o.class]},P,A,{modelValue:l.value,"onUpdate:modelValue":f=>l.value=f,id:C.value,focused:p.value,style:o.style}),{...n,default:f=>{let{id:F,messagesId:I,isDisabled:L,isReadonly:N,isValid:R}=f;return a(g,b(B,{id:F.value,"aria-describedby":I.value,disabled:L.value,readonly:N.value},U,{error:R.value===!1,modelValue:l.value,"onUpdate:modelValue":T=>l.value=T,onFocus:d,onBlur:e}),n)}})}),{}}});const ie={class:"auth-wrapper d-flex align-center justify-center pa-4"},ne=u("div",{class:"d-flex justify-center mb-10 mt-5"},[u("img",{src:X,alt:"EduALL"})],-1),de=u("h5",{class:"text-h5 mb-7 text-center"}," Welcome to EduALL Assessment Dashboard! 👋🏻 ",-1),ue=u("p",{class:"mb-0"}," Please sign-in ",-1),me={class:"d-flex align-center justify-space-between flex-wrap mt-1 mb-4"},Ae={__name:"login",setup(o){const m=c(),t=c({email:"",password:"",remember:!1}),n=c(!1),l=c(!1),p=async()=>{const{valid:d}=await m.value.validate();if(d){l.value=!0;try{const e=await H.post("admin/signin",t.value);e.success?(V.saveToken(e.data.token),v.saveUser(e.data),window.location.reload()):(t.value.email="",t.value.password="",_("error",e.message,"bottom-end")),l.value=!1}catch(e){_("error",e,"bottom-end"),l.value=!1}}};return O(()=>{var d;V.getToken()&&((d=v.getUser().client)==null?void 0:d.type)==1&&Q.push({name:"admin-dashboard"})}),(d,e)=>(W(),Z("div",ie,[a(Y,{class:"auth-card pa-4 pt-7","max-width":"448"},{default:i(()=>[ne,a(h,{class:"pt-2"},{default:i(()=>[de,ue]),_:1}),a(h,null,{default:i(()=>[a(ee,{ref_key:"formData",ref:m,"validate-on":"input","fast-fail":"",disabled:s(l),onSubmit:q(p,["prevent"])},{default:i(()=>[a(ae,null,{default:i(()=>[a(w,{cols:"12"},{default:i(()=>[a(y,{modelValue:s(t).email,"onUpdate:modelValue":e[0]||(e[0]=r=>s(t).email=r),autofocus:"",label:"Email",type:"email",rules:s(x).email},null,8,["modelValue","rules"])]),_:1}),a(w,{cols:"12"},{default:i(()=>[a(y,{modelValue:s(t).password,"onUpdate:modelValue":e[1]||(e[1]=r=>s(t).password=r),label:"Password",placeholder:"············",type:s(n)?"text":"password","append-inner-icon":s(n)?"bx-hide":"bx-show",rules:s(x).minLength_8,"onClick:appendInner":e[2]||(e[2]=r=>n.value=!s(n))},null,8,["modelValue","type","append-inner-icon","rules"]),u("div",me,[a(re,{modelValue:s(t).remember,"onUpdate:modelValue":e[3]||(e[3]=r=>s(t).remember=r),label:"Remember me"},null,8,["modelValue"])]),a(z,{block:"",type:"submit"},{default:i(()=>[G(" Login ")]),_:1})]),_:1})]),_:1})]),_:1},8,["disabled"])]),_:1})]),_:1})]))}};export{Ae as default};