import{p as G,I as le,m as N,f as Ae,G as Ie,A as ve,aE as Be,aF as Le,y as ye,g as oe,h as pe,Z as De,i as W,a8 as Ue,s as T,j as _e,a7 as Fe,k as Oe,H as Re,E as fe,aG as je,aH as Ye,D as he,au as Me,q as B,a5 as ze,b as e,ad as Ge,V as S,F as ue,P as A,$ as Ne,Y as We,_ as Qe,n as be,v as ee,az as we,ab as ge,ae as He,a4 as Ke,C as xe,ac as Ze,a2 as Je,a9 as Xe,ay as es,K as _,U as F,L as se,o as i,c as b,w as r,R as Q,Q as c,aB as H,a as t,S as g,u as V,W as L,T as D,d as f,aC as q,O,t as ss,aI as ts,aD as as}from"./main-f48007bc.js";import{c as R,s as K}from"./notification-17c9d469.js";import{r as $}from"./rules-71264bbe.js";import{b as ls}from"./index-d104eba4.js";import{m as ke,u as os}from"./lazy-16af0335.js";import{V as Z}from"./VForm-f5f36201.js";import{c as ns}from"./VAvatar-b21f0733.js";import{V as I,a as P,b as U}from"./VTextarea-9f1ce5ce.js";import{V as C}from"./VDivider-1de8a617.js";import{V as Ve}from"./VTextField-8a0187c8.js";import{V as rs,a as is}from"./VRow-4b57cd29.js";import{i as us}from"./illustration-john-light-13186c6f.js";import{V as ce,c as cs,b as de}from"./VCard-4e460f18.js";import{V as me}from"./VSkeletonLoader-21879cad.js";import"./_commonjsHelpers-725317a4.js";import"./VField-e6588e76.js";import"./forwardRefs-e658ad70.js";import"./VImg-cefe29a1.js";/* empty css              */const j=ns("v-alert-title"),ds=["success","info","warning","error"],ms=G({border:{type:[Boolean,String],validator:s=>typeof s=="boolean"||["top","end","bottom","start"].includes(s)},borderColor:String,closable:Boolean,closeIcon:{type:le,default:"$close"},closeLabel:{type:String,default:"$vuetify.close"},icon:{type:[Boolean,String,Function,Object],default:null},modelValue:{type:Boolean,default:!0},prominent:Boolean,title:String,text:String,type:{type:String,validator:s=>ds.includes(s)},...N(),...Ae(),...Ie(),...ve(),...Be(),...Le(),...ye(),...oe(),...pe(),...De({variant:"flat"})},"VAlert"),J=W()({name:"VAlert",props:ms(),emits:{"click:close":s=>!0,"update:modelValue":s=>!0},setup(s,d){let{emit:u,slots:a}=d;const v=Ue(s,"modelValue"),m=T(()=>{if(s.icon!==!1)return s.type?s.icon??`$${s.type}`:s.icon}),n=T(()=>({color:s.color??s.type,variant:s.variant})),{themeClasses:x}=_e(s),{colorClasses:w,colorStyles:h,variantClasses:p}=Fe(n),{densityClasses:y}=Oe(s),{dimensionStyles:l}=Re(s),{elevationClasses:o}=fe(s),{locationStyles:k}=je(s),{positionClasses:te}=Ye(s),{roundedClasses:Ce}=he(s),{textColorClasses:Pe,textColorStyles:Se}=Me(B(s,"borderColor")),{t:Ee}=ze(),ne=T(()=>({"aria-label":Ee(s.closeLabel),onClick(ae){v.value=!1,u("click:close",ae)}}));return()=>{const ae=!!(a.prepend||m.value),qe=!!(a.title||s.title),Te=!!(a.close||s.closable);return v.value&&e(s.tag,{class:["v-alert",s.border&&{"v-alert--border":!!s.border,[`v-alert--border-${s.border===!0?"start":s.border}`]:!0},{"v-alert--prominent":s.prominent},x.value,w.value,y.value,o.value,te.value,Ce.value,p.value,s.class],style:[h.value,l.value,k.value,s.style],role:"alert"},{default:()=>{var re,ie;return[Ge(!1,"v-alert"),s.border&&e("div",{key:"border",class:["v-alert__border",Pe.value],style:Se.value},null),ae&&e("div",{key:"prepend",class:"v-alert__prepend"},[a.prepend?e(ue,{key:"prepend-defaults",disabled:!m.value,defaults:{VIcon:{density:s.density,icon:m.value,size:s.prominent?44:28}}},a.prepend):e(S,{key:"prepend-icon",density:s.density,icon:m.value,size:s.prominent?44:28},null)]),e("div",{class:"v-alert__content"},[qe&&e(j,{key:"title"},{default:()=>{var M;return[((M=a.title)==null?void 0:M.call(a))??s.title]}}),((re=a.text)==null?void 0:re.call(a))??s.text,(ie=a.default)==null?void 0:ie.call(a)]),a.append&&e("div",{key:"append",class:"v-alert__append"},[a.append()]),Te&&e("div",{key:"close",class:"v-alert__close"},[a.close?e(ue,{key:"close-defaults",defaults:{VBtn:{icon:s.closeIcon,size:"x-small",variant:"text"}}},{default:()=>{var M;return[(M=a.close)==null?void 0:M.call(a,{props:ne.value})]}}):e(A,Ne({key:"close-btn",icon:s.closeIcon,size:"x-small",variant:"text"},ne.value),null)])]}})}}});const z=Symbol.for("vuetify:v-expansion-panel"),vs=["default","accordion","inset","popout"],ys=G({color:String,flat:Boolean,focusable:Boolean,static:Boolean,tile:Boolean,variant:{type:String,default:"default",validator:s=>vs.includes(s)},readonly:Boolean,...N(),...We(),...oe(),...pe()},"VExpansionPanels"),ps=W()({name:"VExpansionPanels",props:ys(),emits:{"update:modelValue":s=>!0},setup(s,d){let{slots:u}=d;Qe(s,z);const{themeClasses:a}=_e(s),v=T(()=>s.variant&&`v-expansion-panels--variant-${s.variant}`);return be({VExpansionPanel:{color:B(s,"color"),readonly:B(s,"readonly")},VExpansionPanelTitle:{focusable:B(s,"focusable"),static:B(s,"static")}}),ee(()=>e(s.tag,{class:["v-expansion-panels",{"v-expansion-panels--flat":s.flat,"v-expansion-panels--tile":s.tile},a.value,v.value,s.class],style:s.style},u)),{}}}),_s=G({...N(),...ke()},"VExpansionPanelText"),E=W()({name:"VExpansionPanelText",props:_s(),setup(s,d){let{slots:u}=d;const a=we(z);if(!a)throw new Error("[Vuetify] v-expansion-panel-text needs to be placed inside v-expansion-panel");const{hasContent:v,onAfterLeave:m}=os(s,a.isSelected);return ee(()=>e(ls,{onAfterLeave:m},{default:()=>{var n;return[ge(e("div",{class:["v-expansion-panel-text",s.class],style:s.style},[u.default&&v.value&&e("div",{class:"v-expansion-panel-text__wrapper"},[(n=u.default)==null?void 0:n.call(u)])]),[[He,a.isSelected.value]])]}})),{}}}),$e=G({color:String,expandIcon:{type:le,default:"$expand"},collapseIcon:{type:le,default:"$collapse"},hideActions:Boolean,focusable:Boolean,static:Boolean,ripple:{type:[Boolean,Object],default:!1},readonly:Boolean,...N()},"VExpansionPanelTitle"),Y=W()({name:"VExpansionPanelTitle",directives:{Ripple:Ke},props:$e(),setup(s,d){let{slots:u}=d;const a=we(z);if(!a)throw new Error("[Vuetify] v-expansion-panel-title needs to be placed inside v-expansion-panel");const{backgroundColorClasses:v,backgroundColorStyles:m}=xe(s,"color"),n=T(()=>({collapseIcon:s.collapseIcon,disabled:a.disabled.value,expanded:a.isSelected.value,expandIcon:s.expandIcon,readonly:s.readonly}));return ee(()=>{var x;return ge(e("button",{class:["v-expansion-panel-title",{"v-expansion-panel-title--active":a.isSelected.value,"v-expansion-panel-title--focusable":s.focusable,"v-expansion-panel-title--static":s.static},v.value,s.class],style:[m.value,s.style],type:"button",tabindex:a.disabled.value?-1:void 0,disabled:a.disabled.value,"aria-expanded":a.isSelected.value,onClick:s.readonly?void 0:a.toggle},[e("span",{class:"v-expansion-panel-title__overlay"},null),(x=u.default)==null?void 0:x.call(u,n.value),!s.hideActions&&e("span",{class:"v-expansion-panel-title__icon"},[u.actions?u.actions(n.value):e(S,{icon:a.isSelected.value?s.collapseIcon:s.expandIcon},null)])]),[[Ze("ripple"),s.ripple]])}),{}}}),fs=G({title:String,text:String,bgColor:String,...N(),...ve(),...Je(),...ke(),...ye(),...oe(),...$e()},"VExpansionPanel"),X=W()({name:"VExpansionPanel",props:fs(),emits:{"group:selected":s=>!0},setup(s,d){let{slots:u}=d;const a=Xe(s,z),{backgroundColorClasses:v,backgroundColorStyles:m}=xe(s,"bgColor"),{elevationClasses:n}=fe(s),{roundedClasses:x}=he(s),w=T(()=>(a==null?void 0:a.disabled.value)||s.disabled),h=T(()=>a.group.items.value.reduce((l,o,k)=>(a.group.selected.value.includes(o.id)&&l.push(k),l),[])),p=T(()=>{const l=a.group.items.value.findIndex(o=>o.id===a.id);return!a.isSelected.value&&h.value.some(o=>o-l===1)}),y=T(()=>{const l=a.group.items.value.findIndex(o=>o.id===a.id);return!a.isSelected.value&&h.value.some(o=>o-l===-1)});return es(z,a),be({VExpansionPanelText:{eager:B(s,"eager")},VExpansionPanelTitle:{readonly:B(s,"readonly")}}),ee(()=>{const l=!!(u.text||s.text),o=!!(u.title||s.title);return e(s.tag,{class:["v-expansion-panel",{"v-expansion-panel--active":a.isSelected.value,"v-expansion-panel--before-active":p.value,"v-expansion-panel--after-active":y.value,"v-expansion-panel--disabled":w.value},x.value,v.value,s.class],style:[m.value,s.style]},{default:()=>{var k;return[e("div",{class:["v-expansion-panel__shadow",...n.value]},null),o&&e(Y,{key:"title",collapseIcon:s.collapseIcon,color:s.color,expandIcon:s.expandIcon,hideActions:s.hideActions,ripple:s.ripple},{default:()=>[u.title?u.title():s.title]}),l&&e(E,{key:"text"},{default:()=>[u.text?u.text():s.text]}),(k=u.default)==null?void 0:k.call(u)]}})}),{}}}),hs=t("p",{class:"my-0"},[c(" Understand better what academic profile will suit your intended major! "),t("strong",null,"Choose your mission!")],-1),bs={class:"ms-5 my-3"},ws={key:0},gs=t("strong",null," Take a short SAT/IELTS/TOEFL iBT diagnostic test ",-1),xs={type:"I",class:"ms-4 my-3"},ks={class:"mb-3"},Vs=t("span",{style:{color:"rgb(var(--v-theme-error))"}},"*",-1),$s={key:0},Cs=t("span",{style:{color:"rgb(var(--v-theme-error))"}},"*",-1),Ps={key:1},Ss=t("strong",null," Consult your subjects ",-1),Es={type:"I",class:"ms-4 my-3"},qs=t("span",{style:{color:"rgb(var(--v-theme-error))"}},"*",-1),Ts={class:"w-100 d-flex justify-center mt-4"},As=t("div",{class:"bg-warning px-4 py-4 rounded"},[t("h4",null,"You have completed this mission!")],-1),Is={__name:"academic",setup(s){const d=_(F.getUser().quest["Academic Profiling"]),u=_(),a=_(1),v=_(),m=_(!1),n=_([{answer:[]},{answer:[{id:null,question_id:26,sub_question_id:null,answer_descriptive:null,score:null}]}]),x=async()=>{const y="question/7";try{const l=await q.get(y);l.success&&(v.value=l.data)}catch(l){console.error(l)}},w=async()=>{const{valid:y,errors:l}=await u.value.validate();y?h():document.getElementById(l[0].id).focus()},h=async()=>{if(await R("Are you sure you have completed the mission?")){m.value=!0,p();try{const l=await q.post("answer/7",n.value);l.success?(O().checkMe(),d.value=!0):K("error",l.message),m.value=!1}catch(l){console.error(l),m.value=!1}}},p=()=>{a.value==1?n.value[1].answer[0].score=null:n.value[0].answer=[]};return se(()=>{x()}),(y,l)=>(i(),b(X,null,{default:r(()=>[e(Y,{class:Q(d.value?"text-success":"text-secondary")},{default:r(()=>[e(S,{icon:d.value?"bx-check-circle":"bx-question-mark",class:"me-2"},null,8,["icon"]),c(" Academic Enrichment Area ")]),_:1},8,["class"]),d.value?f("",!0):(i(),b(E,{key:0},{default:r(()=>[e(Z,{ref_key:"formData",ref:u,"validate-on":"input","fast-fail":"",disabled:m.value,onSubmit:H(w,["prevent"])},{default:r(()=>[e(J,{color:"warning"},{default:r(()=>[e(j,null,{default:r(()=>[hs]),_:1})]),_:1}),e(I,{modelValue:a.value,"onUpdate:modelValue":l[0]||(l[0]=o=>a.value=o),class:"mt-3"},{default:r(()=>[e(P,{label:"Take a short SAT/IELTS/TOEFL iBT diagnostic test to know what to improve!",value:1}),e(C,{class:"my-2"}),e(P,{label:"Consult your subjects to ensure your best fit! ",value:2})]),_:1},8,["modelValue"]),e(C,{class:"my-3"}),t("ol",bs,[a.value==1?(i(),g("li",ws,[gs,c(" to know what to improve! "),t("ol",xs,[t("li",ks,[c(" Choose one option "),Vs,e(I,{modelValue:n.value[0].answer[0],"onUpdate:modelValue":l[1]||(l[1]=o=>n.value[0].answer[0]=o),rules:V($).required},{default:r(()=>[(i(!0),g(L,null,D(v.value.option25,o=>(i(),b(P,{key:o,label:o.option_answer=="TOEFL"?o.option_answer+" iBT":o.option_answer,value:o},null,8,["label","value"]))),128))]),_:1},8,["modelValue","rules"])]),n.value[0].answer[0]?(i(),g("li",$s,[c(" Insert your diagnostic test score! "),Cs,e(Ve,{modelValue:n.value[0].answer[0].score,"onUpdate:modelValue":l[2]||(l[2]=o=>n.value[0].answer[0].score=o),class:"mt-3",label:"Score",density:"compact",type:"number",rules:V($).required},null,8,["modelValue","rules"])])):f("",!0)]),e(C,{class:"my-6"})])):f("",!0),a.value==2?(i(),g("li",Ps,[Ss,c(" to ensure your best fit! "),t("ol",Es,[t("li",null,[c(" What major are you planning to go to based on your consultation and your subject selection? "),qs,e(U,{modelValue:n.value[1].answer[0].answer_descriptive,"onUpdate:modelValue":l[3]||(l[3]=o=>n.value[1].answer[0].answer_descriptive=o),label:"Answer",density:"compact",class:"mt-3",rules:V($).required},null,8,["modelValue","rules"])])])])):f("",!0)]),t("div",Ts,[e(A,{color:"secondary",type:"submit",loading:m.value},{default:r(()=>[e(S,{icon:"bx-save",color:"on-secondary",class:"me-3"}),c(" Complete This Mission ")]),_:1},8,["loading"])])]),_:1},8,["disabled"])]),_:1})),d.value?(i(),b(E,{key:1},{default:r(()=>[As]),_:1})):f("",!0)]),_:1}))}},Bs=t("p",{class:"my-0"},[c(" Develop your career plan and decide what is best for your future! "),t("strong",null,"Choose your mission!")],-1),Ls={class:"ms-5 my-3"},Ds={key:0},Us=t("strong",null," Take the 5 minute O*NET test ",-1),Fs={type:"I",class:"ms-4 my-3"},Os=t("li",{class:"mb-3"},[c(" Please visit "),t("a",{href:"https://www.mynextmove.org/explore/ip",target:"_blank",rel:"noopener noreferrer"},"O*NET test."),c(),t("span",{style:{color:"rgb(var(--v-theme-error))"}},"*")],-1),Rs=t("span",{style:{color:"rgb(var(--v-theme-error))"}},"*",-1),js={key:1},Ys=t("strong",null," Get to understand more about your dreams! ",-1),Ms={type:"I",class:"ms-4 my-3"},zs={class:"mb-3"},Gs=t("span",{style:{color:"rgb(var(--v-theme-error))"}},"*",-1),Ns=t("span",{style:{color:"rgb(var(--v-theme-error))"}},"*",-1),Ws={class:"w-100 d-flex justify-center mt-4"},Qs=t("div",{class:"bg-warning px-4 py-4 rounded"},[t("h4",null,"You have completed this mission!")],-1),Hs={__name:"exploration",setup(s){const d=_(F.getUser().quest.Exploration),u=_(),a=_(1),v=_(),m=_(!1),n=_([{answer:[]},{answer:[]},{answer:[]}]),x=async()=>{const y="question/5";try{const l=await q.get(y);l.success&&(v.value=l.data,n.value[0].answer=v.value["option21-28"])}catch(l){console.error(l)}},w=async()=>{const{valid:y,errors:l}=await u.value.validate();y?h():document.getElementById(l[0].id).focus()},h=async()=>{if(await R("Are you sure you have completed the mission?")){m.value=!0;try{const l=await q.post("answer/5",n.value);l.success?(O().checkMe(),d.value=!0):K("error",l.message),m.value=!1}catch(l){console.error(l),m.value=!1}}},p=()=>{a.value==1?(x(),n.value[1].answer=[],n.value[2].answer=[]):(n.value[0].answer=[],n.value[1].answer=[],n.value[2].answer=[{id:null,question_id:22,sub_question_id:30,answer_descriptive:""}])};return se(()=>{x()}),(y,l)=>(i(),b(X,null,{default:r(()=>[e(Y,{class:Q(d.value?"text-success":"text-secondary")},{default:r(()=>[e(S,{icon:d.value?"bx-check-circle":"bx-question-mark",class:"me-2"},null,8,["icon"]),c(" Interest Exploration Area ")]),_:1},8,["class"]),d.value?f("",!0):(i(),b(E,{key:0},{default:r(()=>[e(Z,{ref_key:"formData",ref:u,"validate-on":"input","fast-fail":"",disabled:m.value,onSubmit:H(w,["prevent"])},{default:r(()=>[e(J,{color:"warning"},{default:r(()=>[e(j,null,{default:r(()=>[Bs]),_:1})]),_:1}),e(I,{modelValue:a.value,"onUpdate:modelValue":l[0]||(l[0]=o=>a.value=o),class:"mt-3",onChange:p},{default:r(()=>[e(P,{label:"Take the 5 minute O*NET test to find out which jobs would fit you! ",value:1}),e(C,{class:"my-2"}),e(P,{label:"Get to understand more about your dreams! Participate in a sharing session!",value:2})]),_:1},8,["modelValue"]),e(C,{class:"my-3"}),t("ol",Ls,[a.value==1?(i(),g("li",Ds,[Us,c(" to find out which jobs would fit you! "),t("ol",Fs,[Os,t("li",null,[c(" After finishing you have to write your score! "),Rs,e(rs,{class:"my-3"},{default:r(()=>[(i(!0),g(L,null,D(n.value[0].answer,(o,k)=>(i(),b(is,{key:k,md:"4",cols:"6",style:{padding:"5px !important"}},{default:r(()=>[e(Ve,{modelValue:n.value[0].answer[k].score,"onUpdate:modelValue":te=>n.value[0].answer[k].score=te,type:"number",min:"0",max:"40",label:o.option_answer,rules:[...V($).required,...V($).maxScore_40],density:"compact"},null,8,["modelValue","onUpdate:modelValue","label","rules"])]),_:2},1024))),128))]),_:1})])]),e(C,{class:"my-6"})])):f("",!0),a.value==2?(i(),g("li",js,[Ys,c(" Participate in a sharing session! "),t("ol",Ms,[t("li",zs,[c(" Speaker Name "),Gs,e(I,{modelValue:n.value[1].answer[0],"onUpdate:modelValue":l[1]||(l[1]=o=>n.value[1].answer[0]=o),rules:V($).required},{default:r(()=>[(i(!0),g(L,null,D(v.value["option22-29"],o=>(i(),b(P,{key:o,value:o,label:o.option_answer},null,8,["value","label"]))),128))]),_:1},8,["modelValue","rules"])]),t("li",null,[c(" Reflect on what you just learned! Let us know what was the most valuable lesson you obtained from them? "),Ns,n.value[2].answer[0]?(i(),b(U,{key:0,modelValue:n.value[2].answer[0].answer_descriptive,"onUpdate:modelValue":l[2]||(l[2]=o=>n.value[2].answer[0].answer_descriptive=o),label:"Reflection",density:"compact",class:"mt-3",rules:V($).required},null,8,["modelValue","rules"])):f("",!0)])])])):f("",!0)]),t("div",Ws,[e(A,{color:"secondary",type:"submit",loading:m.value},{default:r(()=>[e(S,{icon:"bx-save",color:"on-secondary",class:"me-3"}),c(" Complete This Mission ")]),_:1},8,["loading"])])]),_:1},8,["disabled"])]),_:1})),d.value?(i(),b(E,{key:1},{default:r(()=>[Qs]),_:1})):f("",!0)]),_:1}))}},Ks=t("p",{class:"my-0"},[c(" Set the stage for your success beyond high school and understand how to stand out in a competitive landscape! "),t("strong",null,"Choose your mission!")],-1),Zs={class:"ms-5 my-3"},Js={key:0},Xs=t("strong",null," Visit an NGO booth ",-1),et={type:"I",class:"ms-4 my-3"},st={class:"mb-3"},tt=t("span",{style:{color:"rgb(var(--v-theme-error))"}},"*",-1),at=t("span",{style:{color:"rgb(var(--v-theme-error))"}},"*",-1),lt={key:1},ot=t("strong",null," Participate in STEM+ activities ",-1),nt={type:"I",class:"ms-4 my-3"},rt={class:"mb-3"},it=t("span",{style:{color:"rgb(var(--v-theme-error))"}},"*",-1),ut=t("span",{style:{color:"rgb(var(--v-theme-error))"}},"*",-1),ct={class:"w-100 d-flex justify-center mt-4"},dt=t("div",{class:"bg-warning px-4 py-4 rounded"},[t("h4",null,"You have completed this mission!")],-1),mt={__name:"profile-building",setup(s){const d=_(F.getUser().quest["Profile Building"]),u=_(),a=_(1),v=_(),m=_(!1),n=_([{answer:[]},{answer:[{id:null,question_id:23,sub_question_id:32,answer_descriptive:""}]},{answer:[]},{answer:[]}]),x=async()=>{const y="question/6";try{const l=await q.get(y);l.success&&(v.value=l.data)}catch(l){console.error(l)}},w=async()=>{const{valid:y,errors:l}=await u.value.validate();y?h():document.getElementById(l[0].id).focus()},h=async()=>{if(console.log(n.value),await R("Are you sure you have completed the mission?")){m.value=!0;try{const l=await q.post("answer/6",n.value);l.success?(O().checkMe(),d.value=!0):K("error",l.message),m.value=!1}catch(l){console.error(l),m.value=!1}}},p=()=>{a.value==1?(n.value[1].answer=[{id:null,question_id:23,sub_question_id:32,answer_descriptive:""}],n.value[2].answer=[],n.value[3].answer=[]):(n.value[0].answer=[],n.value[1].answer=[],n.value[3].answer=[{id:null,question_id:24,sub_question_id:34,answer_descriptive:""}])};return se(()=>{x()}),(y,l)=>(i(),b(X,null,{default:r(()=>[e(Y,{class:Q(d.value?"text-success":"text-secondary")},{default:r(()=>[e(S,{icon:d.value?"bx-check-circle":"bx-question-mark",class:"me-2"},null,8,["icon"]),c(" Profile-Building Area ")]),_:1},8,["class"]),d.value?f("",!0):(i(),b(E,{key:0},{default:r(()=>[e(Z,{ref_key:"formData",ref:u,"validate-on":"input","fast-fail":"",disabled:m.value,onSubmit:H(w,["prevent"])},{default:r(()=>[e(J,{color:"warning"},{default:r(()=>[e(j,null,{default:r(()=>[Ks]),_:1})]),_:1}),e(I,{modelValue:a.value,"onUpdate:modelValue":l[0]||(l[0]=o=>a.value=o),class:"mt-3",onChange:p},{default:r(()=>[e(P,{label:"Visit an NGO booth and be inspired to help out!",value:1}),e(C,{class:"my-2"}),e(P,{label:"Participate in STEM+ activities to gauge what interests you!",value:2})]),_:1},8,["modelValue"]),e(C,{class:"my-3"}),t("ol",Zs,[a.value==1?(i(),g("li",Js,[Xs,c(" and be inspired to help out! "),t("ol",et,[t("li",st,[c(" Which NGO representative did you meet? "),tt,e(I,{modelValue:n.value[0].answer[0],"onUpdate:modelValue":l[1]||(l[1]=o=>n.value[0].answer[0]=o),rules:V($).required},{default:r(()=>[(i(!0),g(L,null,D(v.value["option23-31"],o=>(i(),b(P,{key:o,value:o,label:o.option_answer},null,8,["value","label"]))),128))]),_:1},8,["modelValue","rules"])]),t("li",null,[c(" How do you think you can use your skills and/or interests to contribute to their causes? "),at,e(U,{modelValue:n.value[1].answer[0].answer_descriptive,"onUpdate:modelValue":l[2]||(l[2]=o=>n.value[1].answer[0].answer_descriptive=o),label:"Description",density:"compact",class:"mt-3",rules:V($).required},null,8,["modelValue","rules"])])]),e(C,{class:"my-6"})])):f("",!0),a.value==2?(i(),g("li",lt,[ot,c(" to gauge what interests you! "),t("ol",nt,[t("li",rt,[c(" What topic did you learn about in this area? "),it,e(I,{modelValue:n.value[2].answer[0],"onUpdate:modelValue":l[3]||(l[3]=o=>n.value[2].answer[0]=o),rules:V($).required},{default:r(()=>[(i(!0),g(L,null,D(v.value["option24-33"],o=>(i(),b(P,{key:o,value:o,label:o.option_answer},null,8,["value","label"]))),128))]),_:1},8,["modelValue","rules"])]),t("li",null,[c(" From your observation, what potential project can you think of? "),ut,e(U,{modelValue:n.value[3].answer[0].answer_descriptive,"onUpdate:modelValue":l[4]||(l[4]=o=>n.value[3].answer[0].answer_descriptive=o),label:"Description",density:"compact",class:"mt-3",rules:V($).required},null,8,["modelValue","rules"])])])])):f("",!0)]),t("div",ct,[e(A,{color:"secondary",type:"submit",loading:m.value},{default:r(()=>[e(S,{icon:"bx-save",color:"on-secondary",class:"me-3"}),c(" Complete This Mission ")]),_:1},8,["loading"])])]),_:1},8,["disabled"])]),_:1})),d.value?(i(),b(E,{key:1},{default:r(()=>[dt]),_:1})):f("",!0)]),_:1}))}},vt=t("p",{class:"my-0"}," Just like the saying “work hard, play hard”, take time and refresh at our industry partner booths outside! ",-1),yt={class:"ms-5 my-3"},pt=t("span",{style:{color:"rgb(var(--v-theme-error))"}},"*",-1),_t={class:"w-100 d-flex justify-center mt-4"},ft=t("div",{class:"bg-warning px-4 py-4 rounded"},[t("h4",null,"You have completed this mission!")],-1),ht={__name:"sponsor",setup(s){const d=_(F.getUser().quest.Sponsor),u=_(),a=_(!1),v=_([{answer:[{id:null,question_id:29,sub_question_id:null,answer_descriptive:null,score:null}]}]),m=async()=>{const{valid:x,errors:w}=await u.value.validate();x?n():document.getElementById(w[0].id).focus()},n=async()=>{if(await R("Are you sure you have completed the mission?")){a.value=!0;try{const w=await q.post("answer/9",v.value);w.success?(O().checkMe(),d.value=!0):K("error",w.message),a.value=!1}catch(w){console.error(w),a.value=!1}}};return(x,w)=>(i(),b(X,null,{default:r(()=>[e(Y,{class:Q(d.value?"text-success":"text-secondary")},{default:r(()=>[e(S,{icon:d.value?"bx-check-circle":"bx-question-mark",class:"me-2"},null,8,["icon"]),c(" Industry Partners Area ")]),_:1},8,["class"]),d.value?f("",!0):(i(),b(E,{key:0},{default:r(()=>[e(Z,{ref_key:"formData",ref:u,"validate-on":"input","fast-fail":"",disabled:a.value,onSubmit:H(m,["prevent"])},{default:r(()=>[e(J,{color:"warning"},{default:r(()=>[e(j,null,{default:r(()=>[vt]),_:1})]),_:1}),e(C,{class:"my-3"}),t("ol",yt,[t("li",null,[c(" Tell us what booth you visited! "),pt,e(U,{modelValue:v.value[0].answer[0].answer_descriptive,"onUpdate:modelValue":w[0]||(w[0]=h=>v.value[0].answer[0].answer_descriptive=h),label:"Answer",density:"compact",class:"mt-3",rules:V($).required},null,8,["modelValue","rules"])])]),t("div",_t,[e(A,{color:"secondary",type:"submit",loading:a.value},{default:r(()=>[e(S,{icon:"bx-save",color:"on-secondary",class:"me-3"}),c(" Complete This Mission ")]),_:1},8,["loading"])])]),_:1},8,["disabled"])]),_:1})),d.value?(i(),b(E,{key:1},{default:r(()=>[ft]),_:1})):f("",!0)]),_:1}))}},bt=t("p",{class:"my-0"},[c(" Find out what essay can get you accepted into exceptional universities! "),t("strong",null,"Choose your mission!")],-1),wt={class:"ms-5 my-3"},gt={key:0},xt={type:"I",class:"ms-4 my-3"},kt={class:"mb-3"},Vt=t("span",{style:{color:"rgb(var(--v-theme-error))"}},"*",-1),$t={key:1},Ct={type:"I",class:"ms-4 my-3"},Pt=t("span",{style:{color:"rgb(var(--v-theme-error))"}},"*",-1),St={class:"w-100 d-flex justify-center mt-4"},Et=t("div",{class:"bg-warning px-4 py-4 rounded"},[t("h4",null,"You have completed this mission!")],-1),qt={__name:"writing",setup(s){const d=_(F.getUser().quest.Writing),u=_(),a=_(1),v=_(!1),m=_([{answer:[{id:null,question_id:27,sub_question_id:35,answer_descriptive:null,score:null}]},{answer:[{id:null,question_id:28,sub_question_id:36,answer_descriptive:null,score:null}]}]),n=async()=>{const{valid:h,errors:p}=await u.value.validate();h?x():document.getElementById(p[0].id).focus()},x=async()=>{if(await R("Are you sure you have completed the mission?")){v.value=!0,w();try{const p=await q.post("answer/8",m.value);p.success?(O().checkMe(),d.value=!0):K("error",p.message),v.value=!1}catch(p){console.error(p),v.value=!1}}},w=()=>{a.value==1?m.value[1].answer[0].answer_descriptive=null:m.value[0].answer[0].answer_descriptive=null};return(h,p)=>(i(),b(X,null,{default:r(()=>[e(Y,{class:Q(d.value?"text-success":"text-secondary")},{default:r(()=>[e(S,{icon:d.value?"bx-check-circle":"bx-question-mark",class:"me-2"},null,8,["icon"]),c(" Essay Writing Area ")]),_:1},8,["class"]),d.value?f("",!0):(i(),b(E,{key:0},{default:r(()=>[e(Z,{ref_key:"formData",ref:u,"validate-on":"input","fast-fail":"",disabled:v.value,onSubmit:H(n,["prevent"])},{default:r(()=>[e(J,{color:"warning"},{default:r(()=>[e(j,null,{default:r(()=>[bt]),_:1})]),_:1}),e(I,{modelValue:a.value,"onUpdate:modelValue":p[0]||(p[0]=y=>a.value=y),class:"mt-3"},{default:r(()=>[e(P,{label:"Compare the US and UK/Asia essays",value:1}),e(C,{class:"my-2"}),e(P,{label:"Compare the AI and human-written essays",value:2})]),_:1},8,["modelValue"]),e(C,{class:"my-3"}),t("ol",wt,[a.value==1?(i(),g("li",gt,[c(" Compare the US and UK/Asia essays "),t("ol",xt,[t("li",kt,[c(" Tell us what makes both these essays different? "),Vt,e(U,{modelValue:m.value[0].answer[0].answer_descriptive,"onUpdate:modelValue":p[1]||(p[1]=y=>m.value[0].answer[0].answer_descriptive=y),label:"Answer",density:"compact",class:"mt-3",rules:V($).required},null,8,["modelValue","rules"])])]),e(C,{class:"my-6"})])):f("",!0),a.value==2?(i(),g("li",$t,[c(" Compare the AI and human-written essays "),t("ol",Ct,[t("li",null,[c(" Tell us what makes both these essays different? "),Pt,e(U,{modelValue:m.value[1].answer[0].answer_descriptive,"onUpdate:modelValue":p[2]||(p[2]=y=>m.value[1].answer[0].answer_descriptive=y),label:"Answer",density:"compact",class:"mt-3",rules:V($).required},null,8,["modelValue","rules"])])])])):f("",!0)]),t("div",St,[e(A,{color:"secondary",type:"submit",loading:v.value},{default:r(()=>[e(S,{icon:"bx-save",color:"on-secondary",class:"me-3"}),c(" Complete This Mission ")]),_:1},8,["loading"])])]),_:1},8,["disabled"])]),_:1})),d.value?(i(),b(E,{key:1},{default:r(()=>[Et]),_:1})):f("",!0)]),_:1}))}};const Tt={id:"quest"},At={key:0},It={key:1},Bt=t("h5",{class:"text-wrap text-xl text-md-h5 mt-4 mb-2"},[t("strong",null," Welcome to EduALL Quest: Your Path, Your Choice! ")],-1),Lt=t("p",null," Dive into the adventure of learning with EduALL Quest, where YOU get to choose your path to success! It's all about choosing what you like. You get two cool choices for every activity, so you can learn your way. Whether you're a creative thinker, a problem solver, or a mix of both, there's a path waiting for you. Pick what you love and see how fun learning can be! ",-1),Dt={class:"w-100 d-flex justify-center mt-8"},Ut={key:2},Ft={class:"mb-md-8 mb-5",style:{"line-height":"1.2"}},Ot={key:0},Rt=t("h3",{class:"mb-2"}," What’s Next? ",-1),jt={key:0},Yt={class:"ms-5"},Mt={class:"my-2"},zt=t("li",{class:"my-2"}," Expert guidance from our mentors ",-1),Gt=t("li",{class:"my-2"},[c(" Please fill in the feedback to receive the raffle ticket to win EduALL Community Empowerment Program in Bali. "),t("br"),t("a",{href:"https://docs.google.com/forms/d/e/1FAIpQLScEv8nR2zA5o6fsGM-awgBvEXc_YCNtOcZgH3KYgO5RFpaYmg/viewform",target:"_blank",rel:"noopener noreferrer",class:"v-btn v-btn--elevated v-theme--light bg-warning v-btn--density-compact v-btn--size-default v-btn--variant-elevated mt-3"}," Feedback Form ")],-1),Nt={key:1},Wt=t("br",null,null,-1),Qt=t("a",{href:"https://docs.google.com/forms/d/e/1FAIpQLScEv8nR2zA5o6fsGM-awgBvEXc_YCNtOcZgH3KYgO5RFpaYmg/viewform",target:"_blank",rel:"noopener noreferrer",class:"v-btn v-btn--elevated v-theme--light bg-warning v-btn--density-compact v-btn--size-default v-btn--variant-elevated my-3"}," Feedback Form ",-1),Ht=t("br",null,null,-1),Kt=["src","width"],_a={__name:"quest",setup(s){const d=_(),u=_(!1),a=_(F.getUser()),v=_(!1),m=async()=>{u.value=!0;try{const h=await q.get("ranking");d.value=h,u.value=!1}catch(h){u.value=!1,console.log(h)}},n=async()=>{if(await R("Are you sure you have finished the quest?"))try{const p=await q.post("took_quest",{took_quest:1});p.success?(await O().checkMe(),window.location.reload()):showNotif("error",p.message)}catch(p){console.error(p)}},x=()=>{const h=a.value.quest;v.value=Object.values(h).every(p=>p===!0)},w=()=>{as.push({name:"dashboard"})};return se(()=>{x(),m()}),(h,p)=>{var y,l;return i(),g("div",Tt,[u.value?(i(),g("section",At,[e(me,{type:"card",class:"mb-5"}),(i(),g(L,null,D(4,o=>t("div",{key:o,class:"my-2"},[e(me,{type:"paragraph"})])),64))])):f("",!0),d.value&&!u.value&&((y=a.value.client)==null?void 0:y.took_quest)==0?(i(),g("section",It,[e(ce,{style:{"border-bottom":"10px solid rgb(var(--v-theme-primary))"},class:"mb-3"},{default:r(()=>[e(cs,null,{default:r(()=>[Bt]),_:1}),e(de,null,{default:r(()=>[Lt]),_:1})]),_:1}),e(ps,null,{default:r(()=>[(i(!0),g(L,null,D(d.value,(o,k)=>(i(),g("div",{key:k,class:"w-100 my-1"},[o.category=="Exploration"?(i(),b(Hs,{key:0,style:{"border-left":"4px solid rgb(var(--v-theme-primary))"}})):f("",!0),o.category=="Profile Building"?(i(),b(mt,{key:1,style:{"border-left":"4px solid rgb(var(--v-theme-primary))"}})):f("",!0),o.category=="Academic"?(i(),b(Is,{key:2,style:{"border-left":"4px solid rgb(var(--v-theme-primary))"}})):f("",!0),o.category=="Writing"?(i(),b(qt,{key:3,style:{"border-left":"4px solid rgb(var(--v-theme-primary))"}})):f("",!0)]))),128)),e(ht,{class:"w-100 my-1",style:{"border-left":"4px solid rgb(var(--v-theme-primary))"}})]),_:1}),t("div",Dt,[e(A,{color:"primary",onClick:n},{default:r(()=>[c(" I have finished the quest! ")]),_:1})])])):f("",!0),d.value&&!u.value&&((l=a.value.client)==null?void 0:l.took_quest)==1?(i(),g("section",Ut,[e(ce,{class:"position-relative overflow-hidden",style:{"border-bottom":"10px solid rgb(var(--v-theme-primary))"}},{default:r(()=>[e(de,null,{default:r(()=>{var o,k;return[t("h2",Ft,ss(v.value?"Congratulations "+((o=a.value.client)==null?void 0:o.full_name)+" on finishing ALL the quest missions!":"Congratulations "+((k=a.value.client)==null?void 0:k.full_name)+" on Completing the Quest."),1),v.value?f("",!0):(i(),g("p",Ot," Claim your reward now! ")),v.value?f("",!0):(i(),b(A,{key:1,color:"secondary",class:"mb-md-7 mb-5",style:{"white-space":"pre-wrap !important"},onClick:w},{default:r(()=>[c(" Get Your Free Personalized Report ")]),_:1})),t("div",{style:ts(h.$vuetify.display.xs?"max-width:70%":"max-width:60%")},[Rt,v.value?(i(),g("p",jt,[c(" Head over to the EduALL booth to earn: "),t("ul",Yt,[t("li",Mt,[c(" Claim your own personalized uni application progress report "),e(A,{density:"compact",color:"primary",class:"mt-2 py-md-2 py-1",style:{height:"auto !important","white-space":"pre-wrap !important"},onClick:w},{default:r(()=>[c(" Get Your Free Personalized Report ")]),_:1})]),zt,Gt])])):(i(),g("p",Nt,[c(" Help us improve by giving us feedback. "),Wt,Qt,Ht,c(" If you need further assistance in understanding your report, stop by the EduALL booth to receive expert guidance from our mentors! ")]))],4),t("img",{src:V(us),alt:"EduALL Quest",class:"position-absolute",width:h.$vuetify.display.xs?"55%":"28%",style:{bottom:"-5%",right:"-10%"}},null,8,Kt)]}),_:1})]),_:1})])):f("",!0)])}}};export{_a as default};