import{p as x,I as B,T as N,m as D,f as z,h as H,i as q,a6 as U,aJ as $,s as o,ax as Z,ag as O,n as Q,q as r,v as E,b as d,a2 as W,J as P,K as X,aK as Y,Z as G,a9 as p,aa as ee,S as le,V as te,ay as ae,k as ne,ap as k,at as oe,C as re,ar as ue,aj as ie}from"./main-4b9e0bb6.js";import{V as ce}from"./VField-5329a37d.js";const L=Symbol.for("vuetify:selection-control-group"),R=x({color:String,disabled:{type:Boolean,default:null},defaultsTarget:String,error:Boolean,id:String,inline:Boolean,falseIcon:B,trueIcon:B,ripple:{type:Boolean,default:!0},multiple:{type:Boolean,default:null},name:String,readonly:{type:Boolean,default:null},modelValue:null,type:String,valueComparator:{type:Function,default:N},...D(),...z(),...H()},"SelectionControlGroup"),se=x({...R({defaultsTarget:"VSelectionControl"})},"VSelectionControlGroup"),ye=q()({name:"VSelectionControlGroup",props:se(),emits:{"update:modelValue":e=>!0},setup(e,u){let{slots:m}=u;const l=U(e,"modelValue"),a=$(),y=o(()=>e.id||`v-selection-control-group-${a}`),c=o(()=>e.name||y.value),t=new Set;return Z(L,{modelValue:l,forceUpdate:()=>{t.forEach(n=>n())},onForceUpdate:n=>{t.add(n),O(()=>{t.delete(n)})}}),Q({[e.defaultsTarget]:{color:r(e,"color"),disabled:r(e,"disabled"),density:r(e,"density"),error:r(e,"error"),inline:r(e,"inline"),modelValue:l,multiple:o(()=>!!e.multiple||e.multiple==null&&Array.isArray(l.value)),name:c,falseIcon:r(e,"falseIcon"),trueIcon:r(e,"trueIcon"),readonly:r(e,"readonly"),ripple:r(e,"ripple"),type:r(e,"type"),valueComparator:r(e,"valueComparator")}}),E(()=>{var n;return d("div",{class:["v-selection-control-group",{"v-selection-control-group--inline":e.inline},e.class],style:e.style,role:e.type==="radio"?"radiogroup":void 0},[(n=m.default)==null?void 0:n.call(m)])}),{}}}),de=x({label:String,baseColor:String,trueValue:null,falseValue:null,value:null,...D(),...R()},"VSelectionControl");function me(e){const u=ae(L,void 0),{densityClasses:m}=ne(e),l=U(e,"modelValue"),a=o(()=>e.trueValue!==void 0?e.trueValue:e.value!==void 0?e.value:!0),y=o(()=>e.falseValue!==void 0?e.falseValue:!1),c=o(()=>!!e.multiple||e.multiple==null&&Array.isArray(l.value)),t=o({get(){const f=u?u.modelValue.value:l.value;return c.value?k(f).some(i=>e.valueComparator(i,a.value)):e.valueComparator(f,a.value)},set(f){if(e.readonly)return;const i=f?a.value:y.value;let v=i;c.value&&(v=f?[...k(l.value),i]:k(l.value).filter(C=>!e.valueComparator(C,a.value))),u?u.modelValue.value=v:l.value=v}}),{textColorClasses:n,textColorStyles:b}=oe(o(()=>{if(!(e.error||e.disabled))return t.value?e.color:e.baseColor})),{backgroundColorClasses:V,backgroundColorStyles:S}=re(o(()=>t.value&&!e.error&&!e.disabled?e.color:void 0)),h=o(()=>t.value?e.trueIcon:e.falseIcon);return{group:u,densityClasses:m,trueValue:a,falseValue:y,model:t,textColorClasses:n,textColorStyles:b,backgroundColorClasses:V,backgroundColorStyles:S,icon:h}}const Ce=q()({name:"VSelectionControl",directives:{Ripple:W},inheritAttrs:!1,props:de(),emits:{"update:modelValue":e=>!0},setup(e,u){let{attrs:m,slots:l}=u;const{group:a,densityClasses:y,icon:c,model:t,textColorClasses:n,textColorStyles:b,backgroundColorClasses:V,backgroundColorStyles:S,trueValue:h}=me(e),f=$(),i=P(!1),v=P(!1),C=X(),g=o(()=>e.id||`input-${f}`),I=o(()=>!e.disabled&&!e.readonly);a==null||a.onForceUpdate(()=>{C.value&&(C.value.checked=t.value)});function T(s){I.value&&(i.value=!0,ue(s.target,":focus-visible")!==!1&&(v.value=!0))}function w(){i.value=!1,v.value=!1}function j(s){s.stopPropagation()}function J(s){I.value&&(e.readonly&&a&&ie(()=>a.forceUpdate()),t.value=s.target.checked)}return E(()=>{var _,A;const s=l.label?l.label({label:e.label,props:{for:g.value}}):e.label,[K,M]=Y(m),F=d("input",G({ref:C,checked:t.value,disabled:!!e.disabled,id:g.value,onBlur:w,onFocus:T,onInput:J,"aria-disabled":!!e.disabled,type:e.type,value:h.value,name:e.name,"aria-checked":e.type==="checkbox"?t.value:void 0},M),null);return d("div",G({class:["v-selection-control",{"v-selection-control--dirty":t.value,"v-selection-control--disabled":e.disabled,"v-selection-control--error":e.error,"v-selection-control--focused":i.value,"v-selection-control--focus-visible":v.value,"v-selection-control--inline":e.inline},y.value,e.class]},K,{style:e.style}),[d("div",{class:["v-selection-control__wrapper",n.value],style:b.value},[(_=l.default)==null?void 0:_.call(l,{backgroundColorClasses:V,backgroundColorStyles:S}),p(d("div",{class:["v-selection-control__input"]},[((A=l.input)==null?void 0:A.call(l,{model:t,textColorClasses:n,textColorStyles:b,backgroundColorClasses:V,backgroundColorStyles:S,inputNode:F,icon:c.value,props:{onFocus:T,onBlur:w,id:g.value}}))??d(le,null,[c.value&&d(te,{key:"icon",icon:c.value},null),F])]),[[ee("ripple"),e.ripple&&[!e.disabled&&!e.readonly,null,["center","circle"]]]])]),s&&d(ce,{for:g.value,onClick:j},{default:()=>[s]})])}),{isFocused:i,input:C}}}),be={required:[e=>!e||e.length===0?"Field is required":!0],email:[e=>!!e||"Email is required",e=>/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(e)||"Email must be valid"],maxLength_3:[e=>(e==null?void 0:e.length)<=3?!0:"This field has a maximum of 3 options"],minLength_8:[e=>(e==null?void 0:e.length)>=8?!0:"This field has a minimum of 8 characters"],not_zero:[e=>!e||e==0?"Field cannot be 0":!0],maxScore_9:[e=>e>9?"The score cannot be more than the maximum score":!0],maxScore_40:[e=>e>40?"The score cannot be more than the maximum score (40)":!0],maxScore_120:[e=>e>120?"The score cannot be more than the maximum score":!0],maxScore_1600:[e=>e>1600?"The score cannot be more than the maximum score":!0]};export{Ce as V,R as a,ye as b,de as m,be as r};
