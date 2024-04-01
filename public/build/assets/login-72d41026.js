import{p as E,ao as R,k as S,a6 as j,aG as M,c as $,x as O,aH as z,d as a,Z as b,L as c,an as G,aP as V,U as v,aO as H,o as J,Q,w as i,e as s,ay as W,b as u,N as Z,O as q,az as K}from"./main-156dd90c.js";import{_ as X}from"./eduall-62475736.js";import{s as _}from"./notification-17c9d469.js";import{r as x}from"./rules-b7c8d60c.js";import{V as Y,b as h}from"./VCard-a82bfca9.js";import{V as ee}from"./VForm-5ad8063f.js";import{V as ae,a as k}from"./VRow-e5a585bc.js";import{a as se,b as w,V as y}from"./VTextField-3e00d707.js";import{m as te,V as g}from"./VCheckboxBtn-a98dc823.js";import{a as oe}from"./VField-52bb28ff.js";import"./_commonjsHelpers-725317a4.js";import"./VAvatar-082d3f4e.js";import"./VImg-1232c280.js";import"./forwardRefs-e658ad70.js";/* empty css              */import"./index-7717879c.js";const le=E({...se(),...R(te(),["inline"])},"VCheckbox"),re=S()({name:"VCheckbox",inheritAttrs:!1,props:le(),emits:{"update:modelValue":o=>!0,"update:focused":o=>!0},setup(o,m){let{attrs:t,slots:n}=m;const l=j(o,"modelValue"),{isFocused:p,focus:d,blur:e}=oe(o),r=M(),C=$(()=>o.id||`checkbox-${r}`);return O(()=>{const[P,U]=z(t),A=w.filterProps(o),B=g.filterProps(o);return a(w,b({class:["v-checkbox",o.class]},P,A,{modelValue:l.value,"onUpdate:modelValue":f=>l.value=f,id:C.value,focused:p.value,style:o.style}),{...n,default:f=>{let{id:L,messagesId:F,isDisabled:I,isReadonly:N,isValid:T}=f;return a(g,b(B,{id:L.value,"aria-describedby":F.value,disabled:I.value,readonly:N.value},U,{error:T.value===!1,modelValue:l.value,"onUpdate:modelValue":D=>l.value=D,onFocus:d,onBlur:e}),n)}})}),{}}});const ie={class:"auth-wrapper d-flex align-center justify-center pa-4"},ne=u("div",{class:"d-flex justify-center mb-10 mt-5"},[u("img",{src:X,alt:"EduALL"})],-1),de=u("h5",{class:"text-h5 mb-7 text-center"}," Welcome to EduALL Assessment Dashboard! 👋🏻 ",-1),ue=u("p",{class:"mb-0"}," Please sign-in ",-1),me={class:"d-flex align-center justify-space-between flex-wrap mt-1 mb-4"},Ae={__name:"login",setup(o){const m=c(),t=c({email:"",password:"",remember:!1}),n=c(!1),l=c(!1),p=async()=>{const{valid:d}=await m.value.validate();if(d){l.value=!0;try{const e=await K.post("admin/signin",t.value);e.success?(V.saveToken(e.data.token),v.saveUser(e.data),window.location.reload()):(t.value.email="",t.value.password="",_("error",e.message,"bottom-end")),l.value=!1}catch(e){_("error",e,"bottom-end"),l.value=!1}}};return G(()=>{var d;V.getToken()&&((d=v.getUser().client)==null?void 0:d.type)==1&&H.push({name:"admin-dashboard"})}),(d,e)=>(J(),Q("div",ie,[a(Y,{class:"auth-card pa-4 pt-7","max-width":"448"},{default:i(()=>[ne,a(h,{class:"pt-2"},{default:i(()=>[de,ue]),_:1}),a(h,null,{default:i(()=>[a(ee,{ref_key:"formData",ref:m,"validate-on":"input","fast-fail":"",disabled:s(l),onSubmit:W(p,["prevent"])},{default:i(()=>[a(ae,null,{default:i(()=>[a(k,{cols:"12"},{default:i(()=>[a(y,{modelValue:s(t).email,"onUpdate:modelValue":e[0]||(e[0]=r=>s(t).email=r),autofocus:"",label:"Email",type:"email",rules:s(x).email},null,8,["modelValue","rules"])]),_:1}),a(k,{cols:"12"},{default:i(()=>[a(y,{modelValue:s(t).password,"onUpdate:modelValue":e[1]||(e[1]=r=>s(t).password=r),label:"Password",placeholder:"············",type:s(n)?"text":"password","append-inner-icon":s(n)?"bx-hide":"bx-show",rules:s(x).minLength_8,"onClick:appendInner":e[2]||(e[2]=r=>n.value=!s(n))},null,8,["modelValue","type","append-inner-icon","rules"]),u("div",me,[a(re,{modelValue:s(t).remember,"onUpdate:modelValue":e[3]||(e[3]=r=>s(t).remember=r),label:"Remember me"},null,8,["modelValue"])]),a(Z,{block:"",type:"submit"},{default:i(()=>[q(" Login ")]),_:1})]),_:1})]),_:1})]),_:1},8,["disabled"])]),_:1})]),_:1})]))}};export{Ae as default};
