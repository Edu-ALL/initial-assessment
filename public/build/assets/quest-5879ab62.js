import{p as N,I as le,m as G,f as Te,G as Ie,A as ve,aF as Be,aG as Le,y as ye,g as oe,h as pe,$ as De,i as z,aa as Ue,s as A,j as _e,a9 as Fe,k as Re,H as Oe,E as fe,aH as je,aI as Ye,D as he,aw as Me,q as B,a7 as Ne,b as e,af as Ge,V as S,F as ue,R as T,a1 as ze,_ as We,a0 as Qe,n as be,v as ee,aB as we,ad as ge,ag as He,a6 as Ke,C as xe,ae as Je,a4 as Xe,ab as Ze,aA as es,K as _,U as W,L as se,o as i,c as b,w as r,T as Q,S as c,aD as H,a as t,W as g,u as V,Y as L,X as D,d as f,aE as q,Q as F,N as ss,t as ts,aJ as as,P as ls}from"./main-d9d083dd.js";import{c as R,s as K}from"./notification-17c9d469.js";import{r as $}from"./rules-f190b4e6.js";import{b as os}from"./index-8eb98ae5.js";import{m as ke,u as ns}from"./lazy-4a7b236e.js";import{V as J}from"./VForm-46c92d6f.js";import{c as rs}from"./VAvatar-7b08e643.js";import{V as I,a as P,b as U}from"./VTextarea-3d799c82.js";import{V as C}from"./VDivider-e6bde160.js";import{V as Ve}from"./VTextField-cbaf83e5.js";import{V as is,a as us}from"./VRow-f1a803b8.js";import{i as cs}from"./illustration-john-light-13186c6f.js";import{V as ce,c as ds,b as de}from"./VCard-af3277ae.js";import{V as me}from"./VSkeletonLoader-6141fc07.js";import"./_commonjsHelpers-725317a4.js";import"./VField-bce86ab0.js";import"./forwardRefs-e658ad70.js";import"./VImg-8b60c905.js";/* empty css              */const O=rs("v-alert-title"),ms=["success","info","warning","error"],vs=N({border:{type:[Boolean,String],validator:s=>typeof s=="boolean"||["top","end","bottom","start"].includes(s)},borderColor:String,closable:Boolean,closeIcon:{type:le,default:"$close"},closeLabel:{type:String,default:"$vuetify.close"},icon:{type:[Boolean,String,Function,Object],default:null},modelValue:{type:Boolean,default:!0},prominent:Boolean,title:String,text:String,type:{type:String,validator:s=>ms.includes(s)},...G(),...Te(),...Ie(),...ve(),...Be(),...Le(),...ye(),...oe(),...pe(),...De({variant:"flat"})},"VAlert"),X=z()({name:"VAlert",props:vs(),emits:{"click:close":s=>!0,"update:modelValue":s=>!0},setup(s,d){let{emit:u,slots:a}=d;const v=Ue(s,"modelValue"),m=A(()=>{if(s.icon!==!1)return s.type?s.icon??`$${s.type}`:s.icon}),n=A(()=>({color:s.color??s.type,variant:s.variant})),{themeClasses:x}=_e(s),{colorClasses:w,colorStyles:h,variantClasses:p}=Fe(n),{densityClasses:y}=Re(s),{dimensionStyles:l}=Oe(s),{elevationClasses:o}=fe(s),{locationStyles:k}=je(s),{positionClasses:te}=Ye(s),{roundedClasses:Ce}=he(s),{textColorClasses:Pe,textColorStyles:Se}=Me(B(s,"borderColor")),{t:Ee}=Ne(),ne=A(()=>({"aria-label":Ee(s.closeLabel),onClick(ae){v.value=!1,u("click:close",ae)}}));return()=>{const ae=!!(a.prepend||m.value),qe=!!(a.title||s.title),Ae=!!(a.close||s.closable);return v.value&&e(s.tag,{class:["v-alert",s.border&&{"v-alert--border":!!s.border,[`v-alert--border-${s.border===!0?"start":s.border}`]:!0},{"v-alert--prominent":s.prominent},x.value,w.value,y.value,o.value,te.value,Ce.value,p.value,s.class],style:[h.value,l.value,k.value,s.style],role:"alert"},{default:()=>{var re,ie;return[Ge(!1,"v-alert"),s.border&&e("div",{key:"border",class:["v-alert__border",Pe.value],style:Se.value},null),ae&&e("div",{key:"prepend",class:"v-alert__prepend"},[a.prepend?e(ue,{key:"prepend-defaults",disabled:!m.value,defaults:{VIcon:{density:s.density,icon:m.value,size:s.prominent?44:28}}},a.prepend):e(S,{key:"prepend-icon",density:s.density,icon:m.value,size:s.prominent?44:28},null)]),e("div",{class:"v-alert__content"},[qe&&e(O,{key:"title"},{default:()=>{var Y;return[((Y=a.title)==null?void 0:Y.call(a))??s.title]}}),((re=a.text)==null?void 0:re.call(a))??s.text,(ie=a.default)==null?void 0:ie.call(a)]),a.append&&e("div",{key:"append",class:"v-alert__append"},[a.append()]),Ae&&e("div",{key:"close",class:"v-alert__close"},[a.close?e(ue,{key:"close-defaults",defaults:{VBtn:{icon:s.closeIcon,size:"x-small",variant:"text"}}},{default:()=>{var Y;return[(Y=a.close)==null?void 0:Y.call(a,{props:ne.value})]}}):e(T,ze({key:"close-btn",icon:s.closeIcon,size:"x-small",variant:"text"},ne.value),null)])]}})}}});const M=Symbol.for("vuetify:v-expansion-panel"),ys=["default","accordion","inset","popout"],ps=N({color:String,flat:Boolean,focusable:Boolean,static:Boolean,tile:Boolean,variant:{type:String,default:"default",validator:s=>ys.includes(s)},readonly:Boolean,...G(),...We(),...oe(),...pe()},"VExpansionPanels"),_s=z()({name:"VExpansionPanels",props:ps(),emits:{"update:modelValue":s=>!0},setup(s,d){let{slots:u}=d;Qe(s,M);const{themeClasses:a}=_e(s),v=A(()=>s.variant&&`v-expansion-panels--variant-${s.variant}`);return be({VExpansionPanel:{color:B(s,"color"),readonly:B(s,"readonly")},VExpansionPanelTitle:{focusable:B(s,"focusable"),static:B(s,"static")}}),ee(()=>e(s.tag,{class:["v-expansion-panels",{"v-expansion-panels--flat":s.flat,"v-expansion-panels--tile":s.tile},a.value,v.value,s.class],style:s.style},u)),{}}}),fs=N({...G(),...ke()},"VExpansionPanelText"),E=z()({name:"VExpansionPanelText",props:fs(),setup(s,d){let{slots:u}=d;const a=we(M);if(!a)throw new Error("[Vuetify] v-expansion-panel-text needs to be placed inside v-expansion-panel");const{hasContent:v,onAfterLeave:m}=ns(s,a.isSelected);return ee(()=>e(os,{onAfterLeave:m},{default:()=>{var n;return[ge(e("div",{class:["v-expansion-panel-text",s.class],style:s.style},[u.default&&v.value&&e("div",{class:"v-expansion-panel-text__wrapper"},[(n=u.default)==null?void 0:n.call(u)])]),[[He,a.isSelected.value]])]}})),{}}}),$e=N({color:String,expandIcon:{type:le,default:"$expand"},collapseIcon:{type:le,default:"$collapse"},hideActions:Boolean,focusable:Boolean,static:Boolean,ripple:{type:[Boolean,Object],default:!1},readonly:Boolean,...G()},"VExpansionPanelTitle"),j=z()({name:"VExpansionPanelTitle",directives:{Ripple:Ke},props:$e(),setup(s,d){let{slots:u}=d;const a=we(M);if(!a)throw new Error("[Vuetify] v-expansion-panel-title needs to be placed inside v-expansion-panel");const{backgroundColorClasses:v,backgroundColorStyles:m}=xe(s,"color"),n=A(()=>({collapseIcon:s.collapseIcon,disabled:a.disabled.value,expanded:a.isSelected.value,expandIcon:s.expandIcon,readonly:s.readonly}));return ee(()=>{var x;return ge(e("button",{class:["v-expansion-panel-title",{"v-expansion-panel-title--active":a.isSelected.value,"v-expansion-panel-title--focusable":s.focusable,"v-expansion-panel-title--static":s.static},v.value,s.class],style:[m.value,s.style],type:"button",tabindex:a.disabled.value?-1:void 0,disabled:a.disabled.value,"aria-expanded":a.isSelected.value,onClick:s.readonly?void 0:a.toggle},[e("span",{class:"v-expansion-panel-title__overlay"},null),(x=u.default)==null?void 0:x.call(u,n.value),!s.hideActions&&e("span",{class:"v-expansion-panel-title__icon"},[u.actions?u.actions(n.value):e(S,{icon:a.isSelected.value?s.collapseIcon:s.expandIcon},null)])]),[[Je("ripple"),s.ripple]])}),{}}}),hs=N({title:String,text:String,bgColor:String,...G(),...ve(),...Xe(),...ke(),...ye(),...oe(),...$e()},"VExpansionPanel"),Z=z()({name:"VExpansionPanel",props:hs(),emits:{"group:selected":s=>!0},setup(s,d){let{slots:u}=d;const a=Ze(s,M),{backgroundColorClasses:v,backgroundColorStyles:m}=xe(s,"bgColor"),{elevationClasses:n}=fe(s),{roundedClasses:x}=he(s),w=A(()=>(a==null?void 0:a.disabled.value)||s.disabled),h=A(()=>a.group.items.value.reduce((l,o,k)=>(a.group.selected.value.includes(o.id)&&l.push(k),l),[])),p=A(()=>{const l=a.group.items.value.findIndex(o=>o.id===a.id);return!a.isSelected.value&&h.value.some(o=>o-l===1)}),y=A(()=>{const l=a.group.items.value.findIndex(o=>o.id===a.id);return!a.isSelected.value&&h.value.some(o=>o-l===-1)});return es(M,a),be({VExpansionPanelText:{eager:B(s,"eager")},VExpansionPanelTitle:{readonly:B(s,"readonly")}}),ee(()=>{const l=!!(u.text||s.text),o=!!(u.title||s.title);return e(s.tag,{class:["v-expansion-panel",{"v-expansion-panel--active":a.isSelected.value,"v-expansion-panel--before-active":p.value,"v-expansion-panel--after-active":y.value,"v-expansion-panel--disabled":w.value},x.value,v.value,s.class],style:[m.value,s.style]},{default:()=>{var k;return[e("div",{class:["v-expansion-panel__shadow",...n.value]},null),o&&e(j,{key:"title",collapseIcon:s.collapseIcon,color:s.color,expandIcon:s.expandIcon,hideActions:s.hideActions,ripple:s.ripple},{default:()=>[u.title?u.title():s.title]}),l&&e(E,{key:"text"},{default:()=>[u.text?u.text():s.text]}),(k=u.default)==null?void 0:k.call(u)]}})}),{}}}),bs=t("p",{class:"my-0"},[c(" Understand better what academic profile will suit your intended major! "),t("strong",null,"Choose your mission!")],-1),ws={class:"ms-5 my-3"},gs={key:0},xs=t("strong",null," Take a short SAT/IELTS/TOEFL iBT diagnostic test ",-1),ks={type:"I",class:"ms-4 my-3"},Vs={class:"mb-3"},$s=t("span",{style:{color:"rgb(var(--v-theme-error))"}},"*",-1),Cs={key:0},Ps=t("span",{style:{color:"rgb(var(--v-theme-error))"}},"*",-1),Ss={key:1},Es=t("strong",null," Consult your subjects ",-1),qs={type:"I",class:"ms-4 my-3"},As=t("span",{style:{color:"rgb(var(--v-theme-error))"}},"*",-1),Ts={class:"w-100 d-flex justify-center mt-4"},Is=t("div",{class:"bg-warning px-4 py-4 rounded"},[t("h4",null,"You have completed this mission!")],-1),Bs={__name:"academic",setup(s){const d=_(W.getUser().quest["Academic Profiling"]),u=_(),a=_(1),v=_(),m=_(!1),n=_([{answer:[]},{answer:[{id:null,question_id:26,sub_question_id:null,answer_descriptive:null,score:null}]}]),x=async()=>{const y="question/7";try{const l=await q.get(y);l.success&&(v.value=l.data)}catch(l){console.error(l)}},w=async()=>{const{valid:y,errors:l}=await u.value.validate();y?h():document.getElementById(l[0].id).focus()},h=async()=>{if(await R("Are you sure you have completed the mission?")){m.value=!0,p();try{const l=await q.post("answer/7",n.value);l.success?(F().checkMe(),d.value=!0):K("error",l.message),m.value=!1}catch(l){console.error(l),m.value=!1}}},p=()=>{a.value==1?n.value[1].answer[0].score=null:n.value[0].answer=[]};return se(()=>{x()}),(y,l)=>(i(),b(Z,null,{default:r(()=>[e(j,{class:Q(d.value?"text-success":"text-secondary")},{default:r(()=>[e(S,{icon:d.value?"bx-check-circle":"bx-question-mark",class:"me-2"},null,8,["icon"]),c(" Academic Enrichment Area ")]),_:1},8,["class"]),d.value?f("",!0):(i(),b(E,{key:0},{default:r(()=>[e(J,{ref_key:"formData",ref:u,"validate-on":"input","fast-fail":"",disabled:m.value,onSubmit:H(w,["prevent"])},{default:r(()=>[e(X,{color:"warning"},{default:r(()=>[e(O,null,{default:r(()=>[bs]),_:1})]),_:1}),e(I,{modelValue:a.value,"onUpdate:modelValue":l[0]||(l[0]=o=>a.value=o),class:"mt-3"},{default:r(()=>[e(P,{label:"Take a short SAT/IELTS/TOEFL iBT diagnostic test to know what to improve!",value:1}),e(C,{class:"my-2"}),e(P,{label:"Consult your subjects to ensure your best fit! ",value:2})]),_:1},8,["modelValue"]),e(C,{class:"my-3"}),t("ol",ws,[a.value==1?(i(),g("li",gs,[xs,c(" to know what to improve! "),t("ol",ks,[t("li",Vs,[c(" Choose one option "),$s,e(I,{modelValue:n.value[0].answer[0],"onUpdate:modelValue":l[1]||(l[1]=o=>n.value[0].answer[0]=o),rules:V($).required},{default:r(()=>[(i(!0),g(L,null,D(v.value.option25,o=>(i(),b(P,{key:o,label:o.option_answer=="TOEFL"?o.option_answer+" iBT":o.option_answer,value:o},null,8,["label","value"]))),128))]),_:1},8,["modelValue","rules"])]),n.value[0].answer[0]?(i(),g("li",Cs,[c(" Insert your diagnostic test score! "),Ps,e(Ve,{modelValue:n.value[0].answer[0].score,"onUpdate:modelValue":l[2]||(l[2]=o=>n.value[0].answer[0].score=o),class:"mt-3",label:"Score",density:"compact",type:"number",rules:V($).required},null,8,["modelValue","rules"])])):f("",!0)]),e(C,{class:"my-6"})])):f("",!0),a.value==2?(i(),g("li",Ss,[Es,c(" to ensure your best fit! "),t("ol",qs,[t("li",null,[c(" What major are you planning to go to based on your consultation and your subject selection? "),As,e(U,{modelValue:n.value[1].answer[0].answer_descriptive,"onUpdate:modelValue":l[3]||(l[3]=o=>n.value[1].answer[0].answer_descriptive=o),label:"Answer",density:"compact",class:"mt-3",rules:V($).required},null,8,["modelValue","rules"])])])])):f("",!0)]),t("div",Ts,[e(T,{color:"secondary",type:"submit",loading:m.value},{default:r(()=>[e(S,{icon:"bx-save",color:"on-secondary",class:"me-3"}),c(" Complete This Mission ")]),_:1},8,["loading"])])]),_:1},8,["disabled"])]),_:1})),d.value?(i(),b(E,{key:1},{default:r(()=>[Is]),_:1})):f("",!0)]),_:1}))}},Ls=t("p",{class:"my-0"},[c(" Develop your career plan and decide what is best for your future! "),t("strong",null,"Choose your mission!")],-1),Ds={class:"ms-5 my-3"},Us={key:0},Fs=t("strong",null," Take the 5 minute O*NET test ",-1),Rs={type:"I",class:"ms-4 my-3"},Os=t("li",{class:"mb-3"},[c(" Please visit "),t("a",{href:"https://www.mynextmove.org/explore/ip",target:"_blank",rel:"noopener noreferrer"},"O*NET test."),c(),t("span",{style:{color:"rgb(var(--v-theme-error))"}},"*")],-1),js=t("span",{style:{color:"rgb(var(--v-theme-error))"}},"*",-1),Ys={key:1},Ms=t("strong",null," Get to understand more about your dreams! ",-1),Ns={type:"I",class:"ms-4 my-3"},Gs={class:"mb-3"},zs=t("span",{style:{color:"rgb(var(--v-theme-error))"}},"*",-1),Ws=t("span",{style:{color:"rgb(var(--v-theme-error))"}},"*",-1),Qs={class:"w-100 d-flex justify-center mt-4"},Hs=t("div",{class:"bg-warning px-4 py-4 rounded"},[t("h4",null,"You have completed this mission!")],-1),Ks={__name:"exploration",setup(s){const d=_(W.getUser().quest.Exploration),u=_(),a=_(1),v=_(),m=_(!1),n=_([{answer:[]},{answer:[]},{answer:[]}]),x=async()=>{const y="question/5";try{const l=await q.get(y);l.success&&(v.value=l.data,n.value[0].answer=v.value["option21-28"])}catch(l){console.error(l)}},w=async()=>{const{valid:y,errors:l}=await u.value.validate();y?h():document.getElementById(l[0].id).focus()},h=async()=>{if(await R("Are you sure you have completed the mission?")){m.value=!0;try{const l=await q.post("answer/5",n.value);l.success?(F().checkMe(),d.value=!0):K("error",l.message),m.value=!1}catch(l){console.error(l),m.value=!1}}},p=()=>{a.value==1?(x(),n.value[1].answer=[],n.value[2].answer=[]):(n.value[0].answer=[],n.value[1].answer=[],n.value[2].answer=[{id:null,question_id:22,sub_question_id:30,answer_descriptive:""}])};return se(()=>{x()}),(y,l)=>(i(),b(Z,null,{default:r(()=>[e(j,{class:Q(d.value?"text-success":"text-secondary")},{default:r(()=>[e(S,{icon:d.value?"bx-check-circle":"bx-question-mark",class:"me-2"},null,8,["icon"]),c(" Interest Exploration Area ")]),_:1},8,["class"]),d.value?f("",!0):(i(),b(E,{key:0},{default:r(()=>[e(J,{ref_key:"formData",ref:u,"validate-on":"input","fast-fail":"",disabled:m.value,onSubmit:H(w,["prevent"])},{default:r(()=>[e(X,{color:"warning"},{default:r(()=>[e(O,null,{default:r(()=>[Ls]),_:1})]),_:1}),e(I,{modelValue:a.value,"onUpdate:modelValue":l[0]||(l[0]=o=>a.value=o),class:"mt-3",onChange:p},{default:r(()=>[e(P,{label:"Take the 5 minute O*NET test to find out which jobs would fit you! ",value:1}),e(C,{class:"my-2"}),e(P,{label:"Get to understand more about your dreams! Participate in a sharing session!",value:2})]),_:1},8,["modelValue"]),e(C,{class:"my-3"}),t("ol",Ds,[a.value==1?(i(),g("li",Us,[Fs,c(" to find out which jobs would fit you! "),t("ol",Rs,[Os,t("li",null,[c(" After finishing you have to write your score! "),js,e(is,{class:"my-3"},{default:r(()=>[(i(!0),g(L,null,D(n.value[0].answer,(o,k)=>(i(),b(us,{key:k,md:"4",cols:"6",style:{padding:"5px !important"}},{default:r(()=>[e(Ve,{modelValue:n.value[0].answer[k].score,"onUpdate:modelValue":te=>n.value[0].answer[k].score=te,type:"number",min:"0",max:"40",label:o.option_answer,rules:[...V($).required,...V($).maxScore_40],density:"compact"},null,8,["modelValue","onUpdate:modelValue","label","rules"])]),_:2},1024))),128))]),_:1})])]),e(C,{class:"my-6"})])):f("",!0),a.value==2?(i(),g("li",Ys,[Ms,c(" Participate in a sharing session! "),t("ol",Ns,[t("li",Gs,[c(" Speaker Name "),zs,e(I,{modelValue:n.value[1].answer[0],"onUpdate:modelValue":l[1]||(l[1]=o=>n.value[1].answer[0]=o),rules:V($).required},{default:r(()=>[(i(!0),g(L,null,D(v.value["option22-29"],o=>(i(),b(P,{key:o,value:o,label:o.option_answer},null,8,["value","label"]))),128))]),_:1},8,["modelValue","rules"])]),t("li",null,[c(" Reflect on what you just learned! Let us know what was the most valuable lesson you obtained from them? "),Ws,n.value[2].answer[0]?(i(),b(U,{key:0,modelValue:n.value[2].answer[0].answer_descriptive,"onUpdate:modelValue":l[2]||(l[2]=o=>n.value[2].answer[0].answer_descriptive=o),label:"Reflection",density:"compact",class:"mt-3",rules:V($).required},null,8,["modelValue","rules"])):f("",!0)])])])):f("",!0)]),t("div",Qs,[e(T,{color:"secondary",type:"submit",loading:m.value},{default:r(()=>[e(S,{icon:"bx-save",color:"on-secondary",class:"me-3"}),c(" Complete This Mission ")]),_:1},8,["loading"])])]),_:1},8,["disabled"])]),_:1})),d.value?(i(),b(E,{key:1},{default:r(()=>[Hs]),_:1})):f("",!0)]),_:1}))}},Js=t("p",{class:"my-0"},[c(" Set the stage for your success beyond high school and understand how to stand out in a competitive landscape! "),t("strong",null,"Choose your mission!")],-1),Xs={class:"ms-5 my-3"},Zs={key:0},et=t("strong",null," Visit an NGO booth ",-1),st={type:"I",class:"ms-4 my-3"},tt={class:"mb-3"},at=t("span",{style:{color:"rgb(var(--v-theme-error))"}},"*",-1),lt=t("span",{style:{color:"rgb(var(--v-theme-error))"}},"*",-1),ot={key:1},nt=t("strong",null," Participate in STEM+ activities ",-1),rt={type:"I",class:"ms-4 my-3"},it={class:"mb-3"},ut=t("span",{style:{color:"rgb(var(--v-theme-error))"}},"*",-1),ct=t("span",{style:{color:"rgb(var(--v-theme-error))"}},"*",-1),dt={class:"w-100 d-flex justify-center mt-4"},mt=t("div",{class:"bg-warning px-4 py-4 rounded"},[t("h4",null,"You have completed this mission!")],-1),vt={__name:"profile-building",setup(s){const d=_(W.getUser().quest["Profile Building"]),u=_(),a=_(1),v=_(),m=_(!1),n=_([{answer:[]},{answer:[{id:null,question_id:23,sub_question_id:32,answer_descriptive:""}]},{answer:[]},{answer:[]}]),x=async()=>{const y="question/6";try{const l=await q.get(y);l.success&&(v.value=l.data)}catch(l){console.error(l)}},w=async()=>{const{valid:y,errors:l}=await u.value.validate();y?h():document.getElementById(l[0].id).focus()},h=async()=>{if(console.log(n.value),await R("Are you sure you have completed the mission?")){m.value=!0;try{const l=await q.post("answer/6",n.value);l.success?(F().checkMe(),d.value=!0):K("error",l.message),m.value=!1}catch(l){console.error(l),m.value=!1}}},p=()=>{a.value==1?(n.value[1].answer=[{id:null,question_id:23,sub_question_id:32,answer_descriptive:""}],n.value[2].answer=[],n.value[3].answer=[]):(n.value[0].answer=[],n.value[1].answer=[],n.value[3].answer=[{id:null,question_id:24,sub_question_id:34,answer_descriptive:""}])};return se(()=>{x()}),(y,l)=>(i(),b(Z,null,{default:r(()=>[e(j,{class:Q(d.value?"text-success":"text-secondary")},{default:r(()=>[e(S,{icon:d.value?"bx-check-circle":"bx-question-mark",class:"me-2"},null,8,["icon"]),c(" Profile-Building Area ")]),_:1},8,["class"]),d.value?f("",!0):(i(),b(E,{key:0},{default:r(()=>[e(J,{ref_key:"formData",ref:u,"validate-on":"input","fast-fail":"",disabled:m.value,onSubmit:H(w,["prevent"])},{default:r(()=>[e(X,{color:"warning"},{default:r(()=>[e(O,null,{default:r(()=>[Js]),_:1})]),_:1}),e(I,{modelValue:a.value,"onUpdate:modelValue":l[0]||(l[0]=o=>a.value=o),class:"mt-3",onChange:p},{default:r(()=>[e(P,{label:"Visit an NGO booth and be inspired to help out!",value:1}),e(C,{class:"my-2"}),e(P,{label:"Participate in STEM+ activities to gauge what interests you!",value:2})]),_:1},8,["modelValue"]),e(C,{class:"my-3"}),t("ol",Xs,[a.value==1?(i(),g("li",Zs,[et,c(" and be inspired to help out! "),t("ol",st,[t("li",tt,[c(" Which NGO representative did you meet? "),at,e(I,{modelValue:n.value[0].answer[0],"onUpdate:modelValue":l[1]||(l[1]=o=>n.value[0].answer[0]=o),rules:V($).required},{default:r(()=>[(i(!0),g(L,null,D(v.value["option23-31"],o=>(i(),b(P,{key:o,value:o,label:o.option_answer},null,8,["value","label"]))),128))]),_:1},8,["modelValue","rules"])]),t("li",null,[c(" How do you think you can use your skills and/or interests to contribute to their causes? "),lt,e(U,{modelValue:n.value[1].answer[0].answer_descriptive,"onUpdate:modelValue":l[2]||(l[2]=o=>n.value[1].answer[0].answer_descriptive=o),label:"Description",density:"compact",class:"mt-3",rules:V($).required},null,8,["modelValue","rules"])])]),e(C,{class:"my-6"})])):f("",!0),a.value==2?(i(),g("li",ot,[nt,c(" to gauge what interests you! "),t("ol",rt,[t("li",it,[c(" What topic did you learn about in this area? "),ut,e(I,{modelValue:n.value[2].answer[0],"onUpdate:modelValue":l[3]||(l[3]=o=>n.value[2].answer[0]=o),rules:V($).required},{default:r(()=>[(i(!0),g(L,null,D(v.value["option24-33"],o=>(i(),b(P,{key:o,value:o,label:o.option_answer},null,8,["value","label"]))),128))]),_:1},8,["modelValue","rules"])]),t("li",null,[c(" From your observation, what potential project can you think of? "),ct,e(U,{modelValue:n.value[3].answer[0].answer_descriptive,"onUpdate:modelValue":l[4]||(l[4]=o=>n.value[3].answer[0].answer_descriptive=o),label:"Description",density:"compact",class:"mt-3",rules:V($).required},null,8,["modelValue","rules"])])])])):f("",!0)]),t("div",dt,[e(T,{color:"secondary",type:"submit",loading:m.value},{default:r(()=>[e(S,{icon:"bx-save",color:"on-secondary",class:"me-3"}),c(" Complete This Mission ")]),_:1},8,["loading"])])]),_:1},8,["disabled"])]),_:1})),d.value?(i(),b(E,{key:1},{default:r(()=>[mt]),_:1})):f("",!0)]),_:1}))}},yt=t("p",{class:"my-0"}," Just like the saying “work hard, play hard”, take time and refresh at our industry partner booths outside! ",-1),pt={class:"ms-5 my-3"},_t=t("span",{style:{color:"rgb(var(--v-theme-error))"}},"*",-1),ft={class:"w-100 d-flex justify-center mt-4"},ht=t("div",{class:"bg-warning px-4 py-4 rounded"},[t("h4",null,"You have completed this mission!")],-1),bt={__name:"sponsor",setup(s){const d=_(W.getUser().quest.Sponsor),u=_(),a=_(!1),v=_([{answer:[{id:null,question_id:29,sub_question_id:null,answer_descriptive:null,score:null}]}]),m=async()=>{const{valid:x,errors:w}=await u.value.validate();x?n():document.getElementById(w[0].id).focus()},n=async()=>{if(await R("Are you sure you have completed the mission?")){a.value=!0;try{const w=await q.post("answer/9",v.value);w.success?(F().checkMe(),d.value=!0):K("error",w.message),a.value=!1}catch(w){console.error(w),a.value=!1}}};return(x,w)=>(i(),b(Z,null,{default:r(()=>[e(j,{class:Q(d.value?"text-success":"text-secondary")},{default:r(()=>[e(S,{icon:d.value?"bx-check-circle":"bx-question-mark",class:"me-2"},null,8,["icon"]),c(" Industry Partners Area ")]),_:1},8,["class"]),d.value?f("",!0):(i(),b(E,{key:0},{default:r(()=>[e(J,{ref_key:"formData",ref:u,"validate-on":"input","fast-fail":"",disabled:a.value,onSubmit:H(m,["prevent"])},{default:r(()=>[e(X,{color:"warning"},{default:r(()=>[e(O,null,{default:r(()=>[yt]),_:1})]),_:1}),e(C,{class:"my-3"}),t("ol",pt,[t("li",null,[c(" Tell us what booth you visited! "),_t,e(U,{modelValue:v.value[0].answer[0].answer_descriptive,"onUpdate:modelValue":w[0]||(w[0]=h=>v.value[0].answer[0].answer_descriptive=h),label:"Answer",density:"compact",class:"mt-3",rules:V($).required},null,8,["modelValue","rules"])])]),t("div",ft,[e(T,{color:"secondary",type:"submit",loading:a.value},{default:r(()=>[e(S,{icon:"bx-save",color:"on-secondary",class:"me-3"}),c(" Complete This Mission ")]),_:1},8,["loading"])])]),_:1},8,["disabled"])]),_:1})),d.value?(i(),b(E,{key:1},{default:r(()=>[ht]),_:1})):f("",!0)]),_:1}))}},wt=t("p",{class:"my-0"},[c(" Find out what essay can get you accepted into exceptional universities! "),t("strong",null,"Choose your mission!")],-1),gt={class:"ms-5 my-3"},xt={key:0},kt={type:"I",class:"ms-4 my-3"},Vt={class:"mb-3"},$t=t("span",{style:{color:"rgb(var(--v-theme-error))"}},"*",-1),Ct={key:1},Pt={type:"I",class:"ms-4 my-3"},St=t("span",{style:{color:"rgb(var(--v-theme-error))"}},"*",-1),Et={class:"w-100 d-flex justify-center mt-4"},qt=t("div",{class:"bg-warning px-4 py-4 rounded"},[t("h4",null,"You have completed this mission!")],-1),At={__name:"writing",setup(s){const d=_(W.getUser().quest.Writing),u=_(),a=_(1),v=_(!1),m=_([{answer:[{id:null,question_id:27,sub_question_id:35,answer_descriptive:null,score:null}]},{answer:[{id:null,question_id:28,sub_question_id:36,answer_descriptive:null,score:null}]}]),n=async()=>{const{valid:h,errors:p}=await u.value.validate();h?x():document.getElementById(p[0].id).focus()},x=async()=>{if(await R("Are you sure you have completed the mission?")){v.value=!0,w();try{const p=await q.post("answer/8",m.value);p.success?(F().checkMe(),d.value=!0):K("error",p.message),v.value=!1}catch(p){console.error(p),v.value=!1}}},w=()=>{a.value==1?m.value[1].answer[0].answer_descriptive=null:m.value[0].answer[0].answer_descriptive=null};return(h,p)=>(i(),b(Z,null,{default:r(()=>[e(j,{class:Q(d.value?"text-success":"text-secondary")},{default:r(()=>[e(S,{icon:d.value?"bx-check-circle":"bx-question-mark",class:"me-2"},null,8,["icon"]),c(" Essay Writing Area ")]),_:1},8,["class"]),d.value?f("",!0):(i(),b(E,{key:0},{default:r(()=>[e(J,{ref_key:"formData",ref:u,"validate-on":"input","fast-fail":"",disabled:v.value,onSubmit:H(n,["prevent"])},{default:r(()=>[e(X,{color:"warning"},{default:r(()=>[e(O,null,{default:r(()=>[wt]),_:1})]),_:1}),e(I,{modelValue:a.value,"onUpdate:modelValue":p[0]||(p[0]=y=>a.value=y),class:"mt-3"},{default:r(()=>[e(P,{label:"Compare the US and UK/Asia essays",value:1}),e(C,{class:"my-2"}),e(P,{label:"Compare the AI and human-written essays",value:2})]),_:1},8,["modelValue"]),e(C,{class:"my-3"}),t("ol",gt,[a.value==1?(i(),g("li",xt,[c(" Compare the US and UK/Asia essays "),t("ol",kt,[t("li",Vt,[c(" Tell us what makes both these essays different? "),$t,e(U,{modelValue:m.value[0].answer[0].answer_descriptive,"onUpdate:modelValue":p[1]||(p[1]=y=>m.value[0].answer[0].answer_descriptive=y),label:"Answer",density:"compact",class:"mt-3",rules:V($).required},null,8,["modelValue","rules"])])]),e(C,{class:"my-6"})])):f("",!0),a.value==2?(i(),g("li",Ct,[c(" Compare the AI and human-written essays "),t("ol",Pt,[t("li",null,[c(" Tell us what makes both these essays different? "),St,e(U,{modelValue:m.value[1].answer[0].answer_descriptive,"onUpdate:modelValue":p[2]||(p[2]=y=>m.value[1].answer[0].answer_descriptive=y),label:"Answer",density:"compact",class:"mt-3",rules:V($).required},null,8,["modelValue","rules"])])])])):f("",!0)]),t("div",Et,[e(T,{color:"secondary",type:"submit",loading:v.value},{default:r(()=>[e(S,{icon:"bx-save",color:"on-secondary",class:"me-3"}),c(" Complete This Mission ")]),_:1},8,["loading"])])]),_:1},8,["disabled"])]),_:1})),d.value?(i(),b(E,{key:1},{default:r(()=>[qt]),_:1})):f("",!0)]),_:1}))}};const Tt={id:"quest"},It={key:0},Bt={key:1},Lt=t("h5",{class:"text-wrap text-xl text-md-h5 mt-4 mb-2"},[t("strong",null," Welcome to EduALL Quest: Your Path, Your Choice! ")],-1),Dt=t("p",null," Dive into the adventure of learning with EduALL Quest, where YOU get to choose your path to success! It's all about choosing what you like. You get two cool choices for every activity, so you can learn your way. Whether you're a creative thinker, a problem solver, or a mix of both, there's a path waiting for you. Pick what you love and see how fun learning can be! ",-1),Ut={class:"w-100 d-flex justify-center mt-8"},Ft={key:2},Rt={class:"mb-md-8 mb-5",style:{"line-height":"1.2"}},Ot={key:0},jt=t("h3",{class:"mb-2"}," What’s Next? ",-1),Yt={key:0},Mt={class:"ms-5"},Nt={class:"my-2"},Gt=t("li",{class:"my-2"}," Expert guidance from our mentors ",-1),zt=t("li",{class:"my-2"},[c(" Please fill in the feedback to receive the raffle ticket to win EduALL Community Empowerment Program in Bali. "),t("br"),t("a",{href:"https://docs.google.com/forms/d/e/1FAIpQLScEv8nR2zA5o6fsGM-awgBvEXc_YCNtOcZgH3KYgO5RFpaYmg/viewform",target:"_blank",rel:"noopener noreferrer",class:"v-btn v-btn--elevated v-theme--light bg-warning v-btn--density-compact v-btn--size-default v-btn--variant-elevated mt-3"}," Feedback Form ")],-1),Wt={key:1},Qt=t("br",null,null,-1),Ht=t("a",{href:"https://docs.google.com/forms/d/e/1FAIpQLScEv8nR2zA5o6fsGM-awgBvEXc_YCNtOcZgH3KYgO5RFpaYmg/viewform",target:"_blank",rel:"noopener noreferrer",class:"v-btn v-btn--elevated v-theme--light bg-warning v-btn--density-compact v-btn--size-default v-btn--variant-elevated my-3"}," Feedback Form ",-1),Kt=t("br",null,null,-1),Jt=["src","width"],fa={__name:"quest",setup(s){const d=_(),u=_(!1),a=_(ss()),v=_(!1),m=async()=>{u.value=!0;try{const h=await q.get("ranking");d.value=h,u.value=!1}catch(h){u.value=!1,console.log(h)}},n=async()=>{if(await R("Are you sure you have finished the quest?"))try{const p=await q.post("took_quest",{took_quest:1});p.success?(await F().checkMe(),window.location.reload()):showNotif("error",p.message)}catch(p){console.error(p)}},x=()=>{const h=a.value.quest;v.value=Object.values(h).every(p=>p===!0)},w=()=>{ls.push({name:"dashboard"})};return se(()=>{x(),m()}),(h,p)=>{var y,l;return i(),g("div",Tt,[u.value?(i(),g("section",It,[e(me,{type:"card",class:"mb-5"}),(i(),g(L,null,D(4,o=>t("div",{key:o,class:"my-2"},[e(me,{type:"paragraph"})])),64))])):f("",!0),d.value&&!u.value&&((y=a.value.client)==null?void 0:y.took_quest)==0?(i(),g("section",Bt,[e(ce,{style:{"border-bottom":"10px solid rgb(var(--v-theme-primary))"},class:"mb-3"},{default:r(()=>[e(ds,null,{default:r(()=>[Lt]),_:1}),e(de,null,{default:r(()=>[Dt]),_:1})]),_:1}),e(_s,null,{default:r(()=>[(i(!0),g(L,null,D(d.value,(o,k)=>(i(),g("div",{key:k,class:"w-100 my-1"},[o.category=="Exploration"?(i(),b(Ks,{key:0,style:{"border-left":"4px solid rgb(var(--v-theme-primary))"}})):f("",!0),o.category=="Profile Building"?(i(),b(vt,{key:1,style:{"border-left":"4px solid rgb(var(--v-theme-primary))"}})):f("",!0),o.category=="Academic"?(i(),b(Bs,{key:2,style:{"border-left":"4px solid rgb(var(--v-theme-primary))"}})):f("",!0),o.category=="Writing"?(i(),b(At,{key:3,style:{"border-left":"4px solid rgb(var(--v-theme-primary))"}})):f("",!0)]))),128)),e(bt,{class:"w-100 my-1",style:{"border-left":"4px solid rgb(var(--v-theme-primary))"}})]),_:1}),t("div",Ut,[e(T,{color:"primary",onClick:n},{default:r(()=>[c(" I have finished the quest! ")]),_:1})])])):f("",!0),d.value&&!u.value&&((l=a.value.client)==null?void 0:l.took_quest)==1?(i(),g("section",Ft,[e(ce,{class:"position-relative overflow-hidden",style:{"border-bottom":"10px solid rgb(var(--v-theme-primary))"}},{default:r(()=>[e(de,null,{default:r(()=>{var o,k;return[t("h2",Rt,ts(v.value?"Congratulations "+((o=a.value.client)==null?void 0:o.full_name)+" on finishing ALL the quest missions!":"Congratulations "+((k=a.value.client)==null?void 0:k.full_name)+" on Completing the Quest."),1),v.value?f("",!0):(i(),g("p",Ot," Claim your reward now! ")),v.value?f("",!0):(i(),b(T,{key:1,color:"secondary",class:"mb-md-7 mb-5",style:{"white-space":"pre-wrap !important"},onClick:w},{default:r(()=>[c(" Get Your Free Personalized Report ")]),_:1})),t("div",{style:as(h.$vuetify.display.xs?"max-width:70%":"max-width:60%")},[jt,v.value?(i(),g("p",Yt,[c(" Head over to the EduALL booth to earn: "),t("ul",Mt,[t("li",Nt,[c(" Claim your own personalized uni application progress report "),e(T,{density:"compact",color:"primary",class:"mt-2 py-md-2 py-1",style:{height:"auto !important","white-space":"pre-wrap !important"},onClick:w},{default:r(()=>[c(" Get Your Free Personalized Report ")]),_:1})]),Gt,zt])])):(i(),g("p",Wt,[c(" Help us improve by giving us feedback. "),Qt,Ht,Kt,c(" If you need further assistance in understanding your report, stop by the EduALL booth to receive expert guidance from our mentors! ")]))],4),t("img",{src:V(cs),alt:"EduALL Quest",class:"position-absolute",width:h.$vuetify.display.xs?"55%":"28%",style:{bottom:"-5%",right:"-10%"}},null,8,Jt)]}),_:1})]),_:1})])):f("",!0)])}}};export{fa as default};
