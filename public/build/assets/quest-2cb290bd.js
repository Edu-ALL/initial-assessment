import{p as z,I as le,m as Y,f as Te,G as Ie,A as ve,aC as Be,aD as De,y as ye,g as oe,h as pe,X as Ue,i as W,a6 as Le,s as A,j as _e,a5 as je,k as Oe,H as Re,E as fe,aE as Ne,aF as Ge,D as he,at as Me,q as B,a3 as Fe,b as e,ab as ze,V as S,F as ue,O as T,Z as Ye,W as We,Y as Qe,n as be,v as ee,ay as we,a9 as ge,ac as He,a2 as Ke,C as xe,aa as Je,a0 as Xe,a7 as Ze,ax as es,K as _,U as j,L as se,o as i,c as b,w as r,P as Q,N as d,aA as H,a as t,Q as g,u as V,S as D,R as U,d as f,aB as q,aG as O,t as ss,aH as as,aI as ts}from"./main-4b9e0bb6.js";import{c as R,s as K}from"./notification-17c9d469.js";import{r as $}from"./rules-0d796701.js";import{b as ls}from"./index-1cc47b4b.js";import{m as ke,u as os}from"./lazy-a6335842.js";import{V as J}from"./VForm-c83e419b.js";import{c as ns}from"./VAvatar-2278e709.js";import{V as I,a as P,b as L}from"./VTextarea-f667eafb.js";import{V as C}from"./VDivider-acc28ad1.js";import{V as Ve}from"./VTextField-8cd14f14.js";import{V as rs,a as is}from"./VRow-fb797009.js";import{i as us}from"./illustration-john-light-13186c6f.js";import{V as ce,c as cs,b as de}from"./VCard-fe081baa.js";import{V as me}from"./VSkeletonLoader-2edc10df.js";import"./_commonjsHelpers-725317a4.js";import"./VField-5329a37d.js";import"./forwardRefs-e658ad70.js";import"./VImg-d0673d46.js";/* empty css              */const N=ns("v-alert-title"),ds=["success","info","warning","error"],ms=z({border:{type:[Boolean,String],validator:s=>typeof s=="boolean"||["top","end","bottom","start"].includes(s)},borderColor:String,closable:Boolean,closeIcon:{type:le,default:"$close"},closeLabel:{type:String,default:"$vuetify.close"},icon:{type:[Boolean,String,Function,Object],default:null},modelValue:{type:Boolean,default:!0},prominent:Boolean,title:String,text:String,type:{type:String,validator:s=>ds.includes(s)},...Y(),...Te(),...Ie(),...ve(),...Be(),...De(),...ye(),...oe(),...pe(),...Ue({variant:"flat"})},"VAlert"),X=W()({name:"VAlert",props:ms(),emits:{"click:close":s=>!0,"update:modelValue":s=>!0},setup(s,c){let{emit:u,slots:a}=c;const v=Le(s,"modelValue"),m=A(()=>{if(s.icon!==!1)return s.type?s.icon??`$${s.type}`:s.icon}),n=A(()=>({color:s.color??s.type,variant:s.variant})),{themeClasses:x}=_e(s),{colorClasses:w,colorStyles:h,variantClasses:p}=je(n),{densityClasses:y}=Oe(s),{dimensionStyles:l}=Re(s),{elevationClasses:o}=fe(s),{locationStyles:k}=Ne(s),{positionClasses:ae}=Ge(s),{roundedClasses:Ce}=he(s),{textColorClasses:Pe,textColorStyles:Se}=Me(B(s,"borderColor")),{t:Ee}=Fe(),ne=A(()=>({"aria-label":Ee(s.closeLabel),onClick(te){v.value=!1,u("click:close",te)}}));return()=>{const te=!!(a.prepend||m.value),qe=!!(a.title||s.title),Ae=!!(a.close||s.closable);return v.value&&e(s.tag,{class:["v-alert",s.border&&{"v-alert--border":!!s.border,[`v-alert--border-${s.border===!0?"start":s.border}`]:!0},{"v-alert--prominent":s.prominent},x.value,w.value,y.value,o.value,ae.value,Ce.value,p.value,s.class],style:[h.value,l.value,k.value,s.style],role:"alert"},{default:()=>{var re,ie;return[ze(!1,"v-alert"),s.border&&e("div",{key:"border",class:["v-alert__border",Pe.value],style:Se.value},null),te&&e("div",{key:"prepend",class:"v-alert__prepend"},[a.prepend?e(ue,{key:"prepend-defaults",disabled:!m.value,defaults:{VIcon:{density:s.density,icon:m.value,size:s.prominent?44:28}}},a.prepend):e(S,{key:"prepend-icon",density:s.density,icon:m.value,size:s.prominent?44:28},null)]),e("div",{class:"v-alert__content"},[qe&&e(N,{key:"title"},{default:()=>{var M;return[((M=a.title)==null?void 0:M.call(a))??s.title]}}),((re=a.text)==null?void 0:re.call(a))??s.text,(ie=a.default)==null?void 0:ie.call(a)]),a.append&&e("div",{key:"append",class:"v-alert__append"},[a.append()]),Ae&&e("div",{key:"close",class:"v-alert__close"},[a.close?e(ue,{key:"close-defaults",defaults:{VBtn:{icon:s.closeIcon,size:"x-small",variant:"text"}}},{default:()=>{var M;return[(M=a.close)==null?void 0:M.call(a,{props:ne.value})]}}):e(T,Ye({key:"close-btn",icon:s.closeIcon,size:"x-small",variant:"text"},ne.value),null)])]}})}}});const F=Symbol.for("vuetify:v-expansion-panel"),vs=["default","accordion","inset","popout"],ys=z({color:String,flat:Boolean,focusable:Boolean,static:Boolean,tile:Boolean,variant:{type:String,default:"default",validator:s=>vs.includes(s)},readonly:Boolean,...Y(),...We(),...oe(),...pe()},"VExpansionPanels"),ps=W()({name:"VExpansionPanels",props:ys(),emits:{"update:modelValue":s=>!0},setup(s,c){let{slots:u}=c;Qe(s,F);const{themeClasses:a}=_e(s),v=A(()=>s.variant&&`v-expansion-panels--variant-${s.variant}`);return be({VExpansionPanel:{color:B(s,"color"),readonly:B(s,"readonly")},VExpansionPanelTitle:{focusable:B(s,"focusable"),static:B(s,"static")}}),ee(()=>e(s.tag,{class:["v-expansion-panels",{"v-expansion-panels--flat":s.flat,"v-expansion-panels--tile":s.tile},a.value,v.value,s.class],style:s.style},u)),{}}}),_s=z({...Y(),...ke()},"VExpansionPanelText"),E=W()({name:"VExpansionPanelText",props:_s(),setup(s,c){let{slots:u}=c;const a=we(F);if(!a)throw new Error("[Vuetify] v-expansion-panel-text needs to be placed inside v-expansion-panel");const{hasContent:v,onAfterLeave:m}=os(s,a.isSelected);return ee(()=>e(ls,{onAfterLeave:m},{default:()=>{var n;return[ge(e("div",{class:["v-expansion-panel-text",s.class],style:s.style},[u.default&&v.value&&e("div",{class:"v-expansion-panel-text__wrapper"},[(n=u.default)==null?void 0:n.call(u)])]),[[He,a.isSelected.value]])]}})),{}}}),$e=z({color:String,expandIcon:{type:le,default:"$expand"},collapseIcon:{type:le,default:"$collapse"},hideActions:Boolean,focusable:Boolean,static:Boolean,ripple:{type:[Boolean,Object],default:!1},readonly:Boolean,...Y()},"VExpansionPanelTitle"),G=W()({name:"VExpansionPanelTitle",directives:{Ripple:Ke},props:$e(),setup(s,c){let{slots:u}=c;const a=we(F);if(!a)throw new Error("[Vuetify] v-expansion-panel-title needs to be placed inside v-expansion-panel");const{backgroundColorClasses:v,backgroundColorStyles:m}=xe(s,"color"),n=A(()=>({collapseIcon:s.collapseIcon,disabled:a.disabled.value,expanded:a.isSelected.value,expandIcon:s.expandIcon,readonly:s.readonly}));return ee(()=>{var x;return ge(e("button",{class:["v-expansion-panel-title",{"v-expansion-panel-title--active":a.isSelected.value,"v-expansion-panel-title--focusable":s.focusable,"v-expansion-panel-title--static":s.static},v.value,s.class],style:[m.value,s.style],type:"button",tabindex:a.disabled.value?-1:void 0,disabled:a.disabled.value,"aria-expanded":a.isSelected.value,onClick:s.readonly?void 0:a.toggle},[e("span",{class:"v-expansion-panel-title__overlay"},null),(x=u.default)==null?void 0:x.call(u,n.value),!s.hideActions&&e("span",{class:"v-expansion-panel-title__icon"},[u.actions?u.actions(n.value):e(S,{icon:a.isSelected.value?s.collapseIcon:s.expandIcon},null)])]),[[Je("ripple"),s.ripple]])}),{}}}),fs=z({title:String,text:String,bgColor:String,...Y(),...ve(),...Xe(),...ke(),...ye(),...oe(),...$e()},"VExpansionPanel"),Z=W()({name:"VExpansionPanel",props:fs(),emits:{"group:selected":s=>!0},setup(s,c){let{slots:u}=c;const a=Ze(s,F),{backgroundColorClasses:v,backgroundColorStyles:m}=xe(s,"bgColor"),{elevationClasses:n}=fe(s),{roundedClasses:x}=he(s),w=A(()=>(a==null?void 0:a.disabled.value)||s.disabled),h=A(()=>a.group.items.value.reduce((l,o,k)=>(a.group.selected.value.includes(o.id)&&l.push(k),l),[])),p=A(()=>{const l=a.group.items.value.findIndex(o=>o.id===a.id);return!a.isSelected.value&&h.value.some(o=>o-l===1)}),y=A(()=>{const l=a.group.items.value.findIndex(o=>o.id===a.id);return!a.isSelected.value&&h.value.some(o=>o-l===-1)});return es(F,a),be({VExpansionPanelText:{eager:B(s,"eager")},VExpansionPanelTitle:{readonly:B(s,"readonly")}}),ee(()=>{const l=!!(u.text||s.text),o=!!(u.title||s.title);return e(s.tag,{class:["v-expansion-panel",{"v-expansion-panel--active":a.isSelected.value,"v-expansion-panel--before-active":p.value,"v-expansion-panel--after-active":y.value,"v-expansion-panel--disabled":w.value},x.value,v.value,s.class],style:[m.value,s.style]},{default:()=>{var k;return[e("div",{class:["v-expansion-panel__shadow",...n.value]},null),o&&e(G,{key:"title",collapseIcon:s.collapseIcon,color:s.color,expandIcon:s.expandIcon,hideActions:s.hideActions,ripple:s.ripple},{default:()=>[u.title?u.title():s.title]}),l&&e(E,{key:"text"},{default:()=>[u.text?u.text():s.text]}),(k=u.default)==null?void 0:k.call(u)]}})}),{}}}),hs=t("p",{class:"my-0"},[d(" Understand better what academic profile will suit your intended major! "),t("strong",null,"Choose your mission!")],-1),bs={class:"ms-5 my-3"},ws={key:0},gs=t("strong",null," Take a short SAT/IELTS/TOEFL diagnostic test ",-1),xs={type:"I",class:"ms-4 my-3"},ks={class:"mb-3"},Vs=t("span",{style:{color:"rgb(var(--v-theme-error))"}},"*",-1),$s={key:0},Cs=t("span",{style:{color:"rgb(var(--v-theme-error))"}},"*",-1),Ps={key:1},Ss=t("strong",null," Consult your subjects ",-1),Es={type:"I",class:"ms-4 my-3"},qs=t("span",{style:{color:"rgb(var(--v-theme-error))"}},"*",-1),As={class:"w-100 d-flex justify-center mt-4"},Ts=t("div",{class:"bg-warning px-4 py-4 rounded"},[t("h4",null,"You have completed this mission!")],-1),Is={__name:"academic",setup(s){const c=_(j.getUser().quest["Academic Profiling"]),u=_(),a=_(1),v=_(),m=_(!1),n=_([{answer:[]},{answer:[{id:null,question_id:26,sub_question_id:null,answer_descriptive:null,score:null}]}]),x=async()=>{const y="question/7";try{const l=await q.get(y);l.success&&(v.value=l.data)}catch(l){console.error(l)}},w=async()=>{const{valid:y,errors:l}=await u.value.validate();y?h():document.getElementById(l[0].id).focus()},h=async()=>{if(await R("Are you sure you have completed the mission?")){m.value=!0,p();try{const l=await q.post("answer/7",n.value);l.success?(O().checkMe(),c.value=!0):K("error",l.message),m.value=!1}catch(l){console.error(l),m.value=!1}}},p=()=>{a.value==1?n.value[1].answer[0].score=null:n.value[0].answer=[]};return se(()=>{x()}),(y,l)=>(i(),b(Z,null,{default:r(()=>[e(G,{class:Q(c.value?"text-success":"text-secondary")},{default:r(()=>[e(S,{icon:c.value?"bx-check-circle":"bx-question-mark",class:"me-2"},null,8,["icon"]),d(" Academic Enrichment Area ")]),_:1},8,["class"]),c.value?f("",!0):(i(),b(E,{key:0},{default:r(()=>[e(J,{ref_key:"formData",ref:u,"validate-on":"input","fast-fail":"",disabled:m.value,onSubmit:H(w,["prevent"])},{default:r(()=>[e(X,{color:"warning"},{default:r(()=>[e(N,null,{default:r(()=>[hs]),_:1})]),_:1}),e(I,{modelValue:a.value,"onUpdate:modelValue":l[0]||(l[0]=o=>a.value=o),class:"mt-3"},{default:r(()=>[e(P,{label:"Take a short SAT/IELTS/TOEFL diagnostic test to know what to improve!",value:1}),e(C,{class:"my-2"}),e(P,{label:"Consult your subjects to ensure your best fit! ",value:2})]),_:1},8,["modelValue"]),e(C,{class:"my-3"}),t("ol",bs,[a.value==1?(i(),g("li",ws,[gs,d(" to know what to improve! "),t("ol",xs,[t("li",ks,[d(" Choose one option "),Vs,e(I,{modelValue:n.value[0].answer[0],"onUpdate:modelValue":l[1]||(l[1]=o=>n.value[0].answer[0]=o),rules:V($).required},{default:r(()=>[(i(!0),g(D,null,U(v.value.option25,o=>(i(),b(P,{key:o,label:o.option_answer,value:o},null,8,["label","value"]))),128))]),_:1},8,["modelValue","rules"])]),n.value[0].answer[0]?(i(),g("li",$s,[d(" When chosen, they can insert their score "),Cs,e(Ve,{modelValue:n.value[0].answer[0].score,"onUpdate:modelValue":l[2]||(l[2]=o=>n.value[0].answer[0].score=o),class:"mt-3",label:"Score",density:"compact",type:"number",rules:V($).required},null,8,["modelValue","rules"])])):f("",!0)]),e(C,{class:"my-6"})])):f("",!0),a.value==2?(i(),g("li",Ps,[Ss,d(" to ensure your best fit! "),t("ol",Es,[t("li",null,[d(" What major are you planning to go to based on your consultation and your subject selection? "),qs,e(L,{modelValue:n.value[1].answer[0].answer_descriptive,"onUpdate:modelValue":l[3]||(l[3]=o=>n.value[1].answer[0].answer_descriptive=o),label:"Answer",density:"compact",class:"mt-3",rules:V($).required},null,8,["modelValue","rules"])])])])):f("",!0)]),t("div",As,[e(T,{color:"secondary",type:"submit",loading:m.value},{default:r(()=>[e(S,{icon:"bx-save",color:"on-secondary",class:"me-3"}),d(" Complete This Mission ")]),_:1},8,["loading"])])]),_:1},8,["disabled"])]),_:1})),c.value?(i(),b(E,{key:1},{default:r(()=>[Ts]),_:1})):f("",!0)]),_:1}))}},Bs=t("p",{class:"my-0"},[d(" Develop your career plan and decide what is best for your future! "),t("strong",null,"Choose your mission!")],-1),Ds={class:"ms-5 my-3"},Us={key:0},Ls=t("strong",null," Take the 5 minute ONE*T test ",-1),js={type:"I",class:"ms-4 my-3"},Os=t("li",{class:"mb-3"},[d(" Please visit "),t("a",{href:"https://www.mynextmove.org/explore/ip",target:"_blank",rel:"noopener noreferrer"},"ONE*T test."),d(),t("span",{style:{color:"rgb(var(--v-theme-error))"}},"*")],-1),Rs=t("span",{style:{color:"rgb(var(--v-theme-error))"}},"*",-1),Ns={key:1},Gs=t("strong",null," Get to understand more about your dreams! ",-1),Ms={type:"I",class:"ms-4 my-3"},Fs={class:"mb-3"},zs=t("span",{style:{color:"rgb(var(--v-theme-error))"}},"*",-1),Ys=t("span",{style:{color:"rgb(var(--v-theme-error))"}},"*",-1),Ws={class:"w-100 d-flex justify-center mt-4"},Qs=t("div",{class:"bg-warning px-4 py-4 rounded"},[t("h4",null,"You have completed this mission!")],-1),Hs={__name:"exploration",setup(s){const c=_(j.getUser().quest.Exploration),u=_(),a=_(1),v=_(),m=_(!1),n=_([{answer:[]},{answer:[]},{answer:[]}]),x=async()=>{const y="question/5";try{const l=await q.get(y);l.success&&(v.value=l.data,n.value[0].answer=v.value["option21-28"])}catch(l){console.error(l)}},w=async()=>{const{valid:y,errors:l}=await u.value.validate();y?h():document.getElementById(l[0].id).focus()},h=async()=>{if(await R("Are you sure you have completed the mission?")){m.value=!0;try{const l=await q.post("answer/5",n.value);l.success?(O().checkMe(),c.value=!0):K("error",l.message),m.value=!1}catch(l){console.error(l),m.value=!1}}},p=()=>{a.value==1?(x(),n.value[1].answer=[],n.value[2].answer=[]):(n.value[0].answer=[],n.value[1].answer=[],n.value[2].answer=[{id:null,question_id:22,sub_question_id:30,answer_descriptive:""}])};return se(()=>{x()}),(y,l)=>(i(),b(Z,null,{default:r(()=>[e(G,{class:Q(c.value?"text-success":"text-secondary")},{default:r(()=>[e(S,{icon:c.value?"bx-check-circle":"bx-question-mark",class:"me-2"},null,8,["icon"]),d(" Interest Exploration Area ")]),_:1},8,["class"]),c.value?f("",!0):(i(),b(E,{key:0},{default:r(()=>[e(J,{ref_key:"formData",ref:u,"validate-on":"input","fast-fail":"",disabled:m.value,onSubmit:H(w,["prevent"])},{default:r(()=>[e(X,{color:"warning"},{default:r(()=>[e(N,null,{default:r(()=>[Bs]),_:1})]),_:1}),e(I,{modelValue:a.value,"onUpdate:modelValue":l[0]||(l[0]=o=>a.value=o),class:"mt-3",onChange:p},{default:r(()=>[e(P,{label:"Take the 5 minute ONE*T test to find out which jobs woold fit you! ",value:1}),e(C,{class:"my-2"}),e(P,{label:"Get to understand more about your dreams! Participate in a sharing session!",value:2})]),_:1},8,["modelValue"]),e(C,{class:"my-3"}),t("ol",Ds,[a.value==1?(i(),g("li",Us,[Ls,d(" to find out which jobs woold fit you! "),t("ol",js,[Os,t("li",null,[d(" After finishing you have to write your score! "),Rs,e(rs,{class:"my-3"},{default:r(()=>[(i(!0),g(D,null,U(n.value[0].answer,(o,k)=>(i(),b(is,{key:k,md:"4",cols:"6",style:{padding:"5px !important"}},{default:r(()=>[e(Ve,{modelValue:n.value[0].answer[k].score,"onUpdate:modelValue":ae=>n.value[0].answer[k].score=ae,type:"number",min:"0",max:"40",label:o.option_answer,rules:[...V($).required,...V($).maxScore_40],density:"compact"},null,8,["modelValue","onUpdate:modelValue","label","rules"])]),_:2},1024))),128))]),_:1})])]),e(C,{class:"my-6"})])):f("",!0),a.value==2?(i(),g("li",Ns,[Gs,d(" Participate in a sharing session! "),t("ol",Ms,[t("li",Fs,[d(" Speaker Name "),zs,e(I,{modelValue:n.value[1].answer[0],"onUpdate:modelValue":l[1]||(l[1]=o=>n.value[1].answer[0]=o),rules:V($).required},{default:r(()=>[(i(!0),g(D,null,U(v.value["option22-29"],o=>(i(),b(P,{key:o,value:o,label:o.option_answer},null,8,["value","label"]))),128))]),_:1},8,["modelValue","rules"])]),t("li",null,[d(" Reflect on what you just learned! Let us know what was the most valuable lesson you obtained from them? "),Ys,n.value[2].answer[0]?(i(),b(L,{key:0,modelValue:n.value[2].answer[0].answer_descriptive,"onUpdate:modelValue":l[2]||(l[2]=o=>n.value[2].answer[0].answer_descriptive=o),label:"Reflection",density:"compact",class:"mt-3",rules:V($).required},null,8,["modelValue","rules"])):f("",!0)])])])):f("",!0)]),t("div",Ws,[e(T,{color:"secondary",type:"submit",loading:m.value},{default:r(()=>[e(S,{icon:"bx-save",color:"on-secondary",class:"me-3"}),d(" Complete This Mission ")]),_:1},8,["loading"])])]),_:1},8,["disabled"])]),_:1})),c.value?(i(),b(E,{key:1},{default:r(()=>[Qs]),_:1})):f("",!0)]),_:1}))}},Ks=t("p",{class:"my-0"},[d(" Set the stage for your success beyond high school and understand how to stand out in a competitive landscape! "),t("strong",null,"Choose your mission!")],-1),Js={class:"ms-5 my-3"},Xs={key:0},Zs=t("strong",null," Visit an NGO booth ",-1),ea={type:"I",class:"ms-4 my-3"},sa={class:"mb-3"},aa=t("span",{style:{color:"rgb(var(--v-theme-error))"}},"*",-1),ta=t("span",{style:{color:"rgb(var(--v-theme-error))"}},"*",-1),la={key:1},oa=t("strong",null," Participate in STEM+ activities ",-1),na={type:"I",class:"ms-4 my-3"},ra={class:"mb-3"},ia=t("span",{style:{color:"rgb(var(--v-theme-error))"}},"*",-1),ua=t("span",{style:{color:"rgb(var(--v-theme-error))"}},"*",-1),ca={class:"w-100 d-flex justify-center mt-4"},da=t("div",{class:"bg-warning px-4 py-4 rounded"},[t("h4",null,"You have completed this mission!")],-1),ma={__name:"profile-building",setup(s){const c=_(j.getUser().quest["Profile Building"]),u=_(),a=_(1),v=_(),m=_(!1),n=_([{answer:[]},{answer:[{id:null,question_id:23,sub_question_id:32,answer_descriptive:""}]},{answer:[]},{answer:[]}]),x=async()=>{const y="question/6";try{const l=await q.get(y);l.success&&(v.value=l.data)}catch(l){console.error(l)}},w=async()=>{const{valid:y,errors:l}=await u.value.validate();y?h():document.getElementById(l[0].id).focus()},h=async()=>{if(console.log(n.value),await R("Are you sure you have completed the mission?")){m.value=!0;try{const l=await q.post("answer/6",n.value);l.success?(O().checkMe(),c.value=!0):K("error",l.message),m.value=!1}catch(l){console.error(l),m.value=!1}}},p=()=>{a.value==1?(n.value[1].answer=[{id:null,question_id:23,sub_question_id:32,answer_descriptive:""}],n.value[2].answer=[],n.value[3].answer=[]):(n.value[0].answer=[],n.value[1].answer=[],n.value[3].answer=[{id:null,question_id:24,sub_question_id:34,answer_descriptive:""}])};return se(()=>{x()}),(y,l)=>(i(),b(Z,null,{default:r(()=>[e(G,{class:Q(c.value?"text-success":"text-secondary")},{default:r(()=>[e(S,{icon:c.value?"bx-check-circle":"bx-question-mark",class:"me-2"},null,8,["icon"]),d(" Profile-Building Area ")]),_:1},8,["class"]),c.value?f("",!0):(i(),b(E,{key:0},{default:r(()=>[e(J,{ref_key:"formData",ref:u,"validate-on":"input","fast-fail":"",disabled:m.value,onSubmit:H(w,["prevent"])},{default:r(()=>[e(X,{color:"warning"},{default:r(()=>[e(N,null,{default:r(()=>[Ks]),_:1})]),_:1}),e(I,{modelValue:a.value,"onUpdate:modelValue":l[0]||(l[0]=o=>a.value=o),class:"mt-3",onChange:p},{default:r(()=>[e(P,{label:"Visit an NGO booth and be inspired to help out (encourage NGO to also create a small activity)",value:1}),e(C,{class:"my-2"}),e(P,{label:"Participate in STEM+ activities to gauge what interests you!",value:2})]),_:1},8,["modelValue"]),e(C,{class:"my-3"}),t("ol",Js,[a.value==1?(i(),g("li",Xs,[Zs,d(" and be inspired to help out (encourage NGO to also create a small activity) "),t("ol",ea,[t("li",sa,[d(" Which NGO representative did you meet? "),aa,e(I,{modelValue:n.value[0].answer[0],"onUpdate:modelValue":l[1]||(l[1]=o=>n.value[0].answer[0]=o),rules:V($).required},{default:r(()=>[(i(!0),g(D,null,U(v.value["option23-31"],o=>(i(),b(P,{key:o,value:o,label:o.option_answer},null,8,["value","label"]))),128))]),_:1},8,["modelValue","rules"])]),t("li",null,[d(" How do you think you can use your skills and/or interests to contribute to their causes? "),ta,e(L,{modelValue:n.value[1].answer[0].answer_descriptive,"onUpdate:modelValue":l[2]||(l[2]=o=>n.value[1].answer[0].answer_descriptive=o),label:"Description",density:"compact",class:"mt-3",rules:V($).required},null,8,["modelValue","rules"])])]),e(C,{class:"my-6"})])):f("",!0),a.value==2?(i(),g("li",la,[oa,d(" to gauge what interests you! "),t("ol",na,[t("li",ra,[d(" What topic did you learn about in this area? "),ia,e(I,{modelValue:n.value[2].answer[0],"onUpdate:modelValue":l[3]||(l[3]=o=>n.value[2].answer[0]=o),rules:V($).required},{default:r(()=>[(i(!0),g(D,null,U(v.value["option24-33"],o=>(i(),b(P,{key:o,value:o,label:o.option_answer},null,8,["value","label"]))),128))]),_:1},8,["modelValue","rules"])]),t("li",null,[d(" From your observation, what potential project can you think of? "),ua,e(L,{modelValue:n.value[3].answer[0].answer_descriptive,"onUpdate:modelValue":l[4]||(l[4]=o=>n.value[3].answer[0].answer_descriptive=o),label:"Description",density:"compact",class:"mt-3",rules:V($).required},null,8,["modelValue","rules"])])])])):f("",!0)]),t("div",ca,[e(T,{color:"secondary",type:"submit",loading:m.value},{default:r(()=>[e(S,{icon:"bx-save",color:"on-secondary",class:"me-3"}),d(" Complete This Mission ")]),_:1},8,["loading"])])]),_:1},8,["disabled"])]),_:1})),c.value?(i(),b(E,{key:1},{default:r(()=>[da]),_:1})):f("",!0)]),_:1}))}},va=t("p",{class:"my-0"}," Just like the saying “work hard, play hard”, take time and refresh at our collaborator booths outside! ",-1),ya={class:"ms-5 my-3"},pa=t("span",{style:{color:"rgb(var(--v-theme-error))"}},"*",-1),_a={class:"w-100 d-flex justify-center mt-4"},fa=t("div",{class:"bg-warning px-4 py-4 rounded"},[t("h4",null,"You have completed this mission!")],-1),ha={__name:"sponsor",setup(s){const c=_(j.getUser().quest.Sponsor),u=_(),a=_(!1),v=_([{answer:[{id:null,question_id:29,sub_question_id:null,answer_descriptive:null,score:null}]}]),m=async()=>{const{valid:x,errors:w}=await u.value.validate();x?n():document.getElementById(w[0].id).focus()},n=async()=>{if(await R("Are you sure you have completed the mission?")){a.value=!0;try{const w=await q.post("answer/9",v.value);w.success?(O().checkMe(),c.value=!0):K("error",w.message),a.value=!1}catch(w){console.error(w),a.value=!1}}};return(x,w)=>(i(),b(Z,null,{default:r(()=>[e(G,{class:Q(c.value?"text-success":"text-secondary")},{default:r(()=>[e(S,{icon:c.value?"bx-check-circle":"bx-question-mark",class:"me-2"},null,8,["icon"]),d(" Industry Partners Area ")]),_:1},8,["class"]),c.value?f("",!0):(i(),b(E,{key:0},{default:r(()=>[e(J,{ref_key:"formData",ref:u,"validate-on":"input","fast-fail":"",disabled:a.value,onSubmit:H(m,["prevent"])},{default:r(()=>[e(X,{color:"warning"},{default:r(()=>[e(N,null,{default:r(()=>[va]),_:1})]),_:1}),e(C,{class:"my-3"}),t("ol",ya,[t("li",null,[d(" Tell us what booth you visited! "),pa,e(L,{modelValue:v.value[0].answer[0].answer_descriptive,"onUpdate:modelValue":w[0]||(w[0]=h=>v.value[0].answer[0].answer_descriptive=h),label:"Answer",density:"compact",class:"mt-3",rules:V($).required},null,8,["modelValue","rules"])])]),t("div",_a,[e(T,{color:"secondary",type:"submit",loading:a.value},{default:r(()=>[e(S,{icon:"bx-save",color:"on-secondary",class:"me-3"}),d(" Complete This Mission ")]),_:1},8,["loading"])])]),_:1},8,["disabled"])]),_:1})),c.value?(i(),b(E,{key:1},{default:r(()=>[fa]),_:1})):f("",!0)]),_:1}))}},ba=t("p",{class:"my-0"},[d(" Find out what essay can get you accepted into exceptional universities! "),t("strong",null,"Choose your mission!")],-1),wa={class:"ms-5 my-3"},ga={key:0},xa={type:"I",class:"ms-4 my-3"},ka={class:"mb-3"},Va=t("span",{style:{color:"rgb(var(--v-theme-error))"}},"*",-1),$a={key:1},Ca={type:"I",class:"ms-4 my-3"},Pa=t("span",{style:{color:"rgb(var(--v-theme-error))"}},"*",-1),Sa={class:"w-100 d-flex justify-center mt-4"},Ea=t("div",{class:"bg-warning px-4 py-4 rounded"},[t("h4",null,"You have completed this mission!")],-1),qa={__name:"writing",setup(s){const c=_(j.getUser().quest.Writing),u=_(),a=_(1),v=_(!1),m=_([{answer:[{id:null,question_id:27,sub_question_id:35,answer_descriptive:null,score:null}]},{answer:[{id:null,question_id:28,sub_question_id:36,answer_descriptive:null,score:null}]}]),n=async()=>{const{valid:h,errors:p}=await u.value.validate();h?x():document.getElementById(p[0].id).focus()},x=async()=>{if(await R("Are you sure you have completed the mission?")){v.value=!0,w();try{const p=await q.post("answer/8",m.value);p.success?(O().checkMe(),c.value=!0):K("error",p.message),v.value=!1}catch(p){console.error(p),v.value=!1}}},w=()=>{a.value==1?m.value[1].answer[0].answer_descriptive=null:m.value[0].answer[0].answer_descriptive=null};return(h,p)=>(i(),b(Z,null,{default:r(()=>[e(G,{class:Q(c.value?"text-success":"text-secondary")},{default:r(()=>[e(S,{icon:c.value?"bx-check-circle":"bx-question-mark",class:"me-2"},null,8,["icon"]),d(" Essay Writing Area ")]),_:1},8,["class"]),c.value?f("",!0):(i(),b(E,{key:0},{default:r(()=>[e(J,{ref_key:"formData",ref:u,"validate-on":"input","fast-fail":"",disabled:v.value,onSubmit:H(n,["prevent"])},{default:r(()=>[e(X,{color:"warning"},{default:r(()=>[e(N,null,{default:r(()=>[ba]),_:1})]),_:1}),e(I,{modelValue:a.value,"onUpdate:modelValue":p[0]||(p[0]=y=>a.value=y),class:"mt-3"},{default:r(()=>[e(P,{label:"Compare the US and UK/Asia essays",value:1}),e(C,{class:"my-2"}),e(P,{label:"Compare the AI and handmade essays",value:2})]),_:1},8,["modelValue"]),e(C,{class:"my-3"}),t("ol",wa,[a.value==1?(i(),g("li",ga,[d(" Compare the US and UK/Asia essays "),t("ol",xa,[t("li",ka,[d(" Tell us what makes both these essays different? "),Va,e(L,{modelValue:m.value[0].answer[0].answer_descriptive,"onUpdate:modelValue":p[1]||(p[1]=y=>m.value[0].answer[0].answer_descriptive=y),label:"Answer",density:"compact",class:"mt-3",rules:V($).required},null,8,["modelValue","rules"])])]),e(C,{class:"my-6"})])):f("",!0),a.value==2?(i(),g("li",$a,[d(" Compare the AI and human-written essays "),t("ol",Ca,[t("li",null,[d(" Tell us what makes both these essays different? "),Pa,e(L,{modelValue:m.value[1].answer[0].answer_descriptive,"onUpdate:modelValue":p[2]||(p[2]=y=>m.value[1].answer[0].answer_descriptive=y),label:"Answer",density:"compact",class:"mt-3",rules:V($).required},null,8,["modelValue","rules"])])])])):f("",!0)]),t("div",Sa,[e(T,{color:"secondary",type:"submit",loading:v.value},{default:r(()=>[e(S,{icon:"bx-save",color:"on-secondary",class:"me-3"}),d(" Complete This Mission ")]),_:1},8,["loading"])])]),_:1},8,["disabled"])]),_:1})),c.value?(i(),b(E,{key:1},{default:r(()=>[Ea]),_:1})):f("",!0)]),_:1}))}};const Aa={id:"quest"},Ta={key:0},Ia={key:1},Ba=t("h5",{class:"text-wrap text-xl text-md-h5 mt-4 mb-2"},[t("strong",null," Welcome to EduALL Quest: Your Path, Your Choice! ")],-1),Da=t("p",null," Dive into the adventure of learning with EduALL Quest, where YOU get to choose your path to success! It's all about choosing what you like. You get two cool choices for every activity, so you can learn your way. Whether you're a creative thinker, a problem solver, or a mix of both, there's a path waiting for you. Pick what you love and see how fun learning can be! ",-1),Ua={class:"w-100 d-flex justify-center mt-8"},La={key:2},ja={class:"mb-md-8 mb-5",style:{"line-height":"1.2"}},Oa={key:0},Ra=t("h3",{class:"mb-2"}," What’s Next? ",-1),Na={key:0},Ga={class:"ms-5"},Ma={class:"my-2"},Fa=t("li",{class:"my-2"}," Quest completer exclusive prize (limited) ",-1),za=t("li",{class:"my-2"}," Expert guidance from our mentors ",-1),Ya=t("li",{class:"my-2"}," Raffle ticket to win EduALL Community Empowerment Program in Bali ",-1),Wa={key:1},Qa=["src","width"],yt={__name:"quest",setup(s){const c=_(),u=_(!1),a=_(j.getUser()),v=_(!1),m=async()=>{u.value=!0;try{const h=await q.get("ranking");c.value=h,u.value=!1}catch(h){u.value=!1,console.log(h)}},n=async()=>{if(await R("Are you sure you have finished the quest?"))try{const p=await q.post("took_quest",{took_quest:1});p.success?(await O().checkMe(),window.location.reload()):showNotif("error",p.message)}catch(p){console.error(p)}},x=()=>{const h=a.value.quest;v.value=Object.values(h).every(p=>p===!0)},w=()=>{ts.push({name:"dashboard"})};return se(()=>{x(),m()}),(h,p)=>{var y,l;return i(),g("div",Aa,[u.value?(i(),g("section",Ta,[e(me,{type:"card",class:"mb-5"}),(i(),g(D,null,U(4,o=>t("div",{key:o,class:"my-2"},[e(me,{type:"paragraph"})])),64))])):f("",!0),c.value&&!u.value&&((y=a.value.client)==null?void 0:y.took_quest)==0?(i(),g("section",Ia,[e(ce,{style:{"border-bottom":"10px solid rgb(var(--v-theme-primary))"},class:"mb-3"},{default:r(()=>[e(cs,null,{default:r(()=>[Ba]),_:1}),e(de,null,{default:r(()=>[Da]),_:1})]),_:1}),e(ps,null,{default:r(()=>[(i(!0),g(D,null,U(c.value,(o,k)=>(i(),g("div",{key:k,class:"w-100 my-1"},[o.category=="Exploration"?(i(),b(Hs,{key:0,style:{"border-left":"4px solid rgb(var(--v-theme-primary))"}})):f("",!0),o.category=="Profile Building"?(i(),b(ma,{key:1,style:{"border-left":"4px solid rgb(var(--v-theme-primary))"}})):f("",!0),o.category=="Academic"?(i(),b(Is,{key:2,style:{"border-left":"4px solid rgb(var(--v-theme-primary))"}})):f("",!0),o.category=="Writing"?(i(),b(qa,{key:3,style:{"border-left":"4px solid rgb(var(--v-theme-primary))"}})):f("",!0)]))),128)),e(ha,{class:"w-100 my-1",style:{"border-left":"4px solid rgb(var(--v-theme-primary))"}})]),_:1}),t("div",Ua,[e(T,{color:"primary",onClick:n},{default:r(()=>[d(" I have finished the quest! ")]),_:1})])])):f("",!0),c.value&&!u.value&&((l=a.value.client)==null?void 0:l.took_quest)==1?(i(),g("section",La,[e(ce,{class:"position-relative overflow-hidden",style:{"border-bottom":"10px solid rgb(var(--v-theme-primary))"}},{default:r(()=>[e(de,null,{default:r(()=>{var o,k;return[t("h2",ja,ss(v.value?"Congratulations "+((o=a.value.client)==null?void 0:o.full_name)+" on finishing ALL the quest missions!":"Congratulations "+((k=a.value.client)==null?void 0:k.full_name)+" on Completing the Quest."),1),v.value?f("",!0):(i(),g("p",Oa," Claim your reward now! ")),v.value?f("",!0):(i(),b(T,{key:1,color:"secondary",class:"mb-md-7 mb-5",style:{"white-space":"pre-wrap !important"},onClick:w},{default:r(()=>[d(" Get Your Free Personalized Report ")]),_:1})),t("div",{style:as(h.$vuetify.display.xs?"max-width:70%":"max-width:60%")},[Ra,v.value?(i(),g("p",Na,[d(" Head over to the EduALL booth to earn: "),t("ul",Ga,[t("li",Ma,[d(" Claim your own personalized uni application progress report "),e(T,{density:"compact",color:"primary",class:"mt-2 py-md-2 py-1",style:{height:"auto !important","white-space":"pre-wrap !important"},onClick:w},{default:r(()=>[d(" Get Your Free Personalized Report ")]),_:1})]),Fa,za,Ya])])):(i(),g("p",Wa," If you need further assistance in understanding your report, stop by the EduALL booth to receive expert guidance from our mentors! "))],4),t("img",{src:V(us),alt:"EduALL Quest",class:"position-absolute",width:h.$vuetify.display.xs?"55%":"28%",style:{bottom:"-5%",right:"-10%"}},null,8,Qa)]}),_:1})]),_:1})])):f("",!0)])}}};export{yt as default};
