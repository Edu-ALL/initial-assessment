import{p as F,a0 as I,m as M,h as q,i as E,v as O,b as a,a5 as te,V as se,bs as ie,a8 as J,s as v,J as oe,K as _,L as N,ay as re,q as z,az as de,I as A,bu as ue,y as ce,j as fe,bv as ve,D as be,l as ge,aJ as me,C as ye,au as Ce,x as he,bw as pe,ab as Ve,ae as ke,W as Ie,$ as _e,b9 as Fe,bx as Pe}from"./main-039548f5.js";import{V as xe}from"./index-dced286e.js";import{n as Le,a as Be,s as $e}from"./forwardRefs-e658ad70.js";const Se=F({text:String,onClick:I(),...M(),...q()},"VLabel"),Re=E()({name:"VLabel",props:Se(),setup(e,o){let{slots:n}=o;return O(()=>{var u;return a("label",{class:["v-label",{"v-label--clickable":!!e.onClick},e.class],style:e.style,onClick:e.onClick},[e.text,(u=n.default)==null?void 0:u.call(n)])}),{}}});function we(e){const{t:o}=te();function n(u){let{name:l}=u;const t={prepend:"prependAction",prependInner:"prependAction",append:"appendAction",appendInner:"appendAction",clear:"clear"}[l],c=e[`onClick:${l}`],V=c&&t?o(`$vuetify.input.${t}`,e.label??""):void 0;return a(se,{icon:e[`${l}Icon`],"aria-label":V,onClick:c},null)}return{InputIcon:n}}const Ae=F({focused:Boolean,"onUpdate:focused":I()},"focus");function Me(e){let o=arguments.length>1&&arguments[1]!==void 0?arguments[1]:ie();const n=J(e,"focused"),u=v(()=>({[`${o}--focused`]:n.value}));function l(){n.value=!0}function t(){n.value=!1}return{focusClasses:u,isFocused:n,focus:l,blur:t}}const X=Symbol.for("vuetify:form"),We=F({disabled:Boolean,fastFail:Boolean,readonly:Boolean,modelValue:{type:Boolean,default:null},validateOn:{type:String,default:"input"}},"form");function qe(e){const o=J(e,"modelValue"),n=v(()=>e.disabled),u=v(()=>e.readonly),l=oe(!1),t=_([]),c=_([]);async function V(){const s=[];let i=!0;c.value=[],l.value=!0;for(const d of t.value){const r=await d.validate();if(r.length>0&&(i=!1,s.push({id:d.id,errorMessages:r})),!i&&e.fastFail)break}return c.value=s,l.value=!1,{valid:i,errors:c.value}}function P(){t.value.forEach(s=>s.reset())}function x(){t.value.forEach(s=>s.resetValidation())}return N(t,()=>{let s=0,i=0;const d=[];for(const r of t.value)r.isValid===!1?(i++,d.push({id:r.id,errorMessages:r.errorMessages})):r.isValid===!0&&s++;c.value=d,o.value=i>0?!1:s===t.value.length?!0:null},{deep:!0,flush:"post"}),re(X,{register:s=>{let{id:i,validate:d,reset:r,resetValidation:b}=s;t.value.some(h=>h.id===i),t.value.push({id:i,validate:d,reset:r,resetValidation:b,isValid:null,errorMessages:[]})},unregister:s=>{t.value=t.value.filter(i=>i.id!==s)},update:(s,i,d)=>{const r=t.value.find(b=>b.id===s);r&&(r.isValid=i,r.errorMessages=d)},isDisabled:n,isReadonly:u,isValidating:l,isValid:o,items:t,validateOn:z(e,"validateOn")}),{errors:c,isDisabled:n,isReadonly:u,isValidating:l,isValid:o,items:t,validate:V,reset:P,resetValidation:x}}function Je(){return de(X,null)}const Ee=F({floating:Boolean,...M()},"VFieldLabel"),w=E()({name:"VFieldLabel",props:Ee(),setup(e,o){let{slots:n}=o;return O(()=>a(Re,{class:["v-field-label",{"v-field-label--floating":e.floating},e.class],style:e.style,"aria-hidden":e.floating||void 0},n)),{}}}),Oe=["underlined","outlined","filled","solo","solo-inverted","solo-filled","plain"],De=F({appendInnerIcon:A,bgColor:String,clearable:Boolean,clearIcon:{type:A,default:"$clear"},active:Boolean,centerAffix:{type:Boolean,default:void 0},color:String,baseColor:String,dirty:Boolean,disabled:{type:Boolean,default:null},error:Boolean,flat:Boolean,label:String,persistentClear:Boolean,prependInnerIcon:A,reverse:Boolean,singleLine:Boolean,variant:{type:String,default:"filled",validator:e=>Oe.includes(e)},"onClick:clear":I(),"onClick:appendInner":I(),"onClick:prependInner":I(),...M(),...ue(),...ce(),...q()},"VField"),Te=E()({name:"VField",inheritAttrs:!1,props:{id:String,...Ae(),...De()},emits:{"update:focused":e=>!0,"update:modelValue":e=>!0},setup(e,o){let{attrs:n,emit:u,slots:l}=o;const{themeClasses:t}=fe(e),{loaderClasses:c}=ve(e),{focusClasses:V,isFocused:P,focus:x,blur:s}=Me(e),{InputIcon:i}=we(e),{roundedClasses:d}=be(e),{rtlClasses:r}=ge(),b=v(()=>e.dirty||e.active),h=v(()=>!e.singleLine&&!!(e.label||l.label)),G=me(),m=v(()=>e.id||`input-${G}`),H=v(()=>`${m.value}-messages`),D=_(),L=_(),T=_(),U=v(()=>["plain","underlined"].includes(e.variant)),{backgroundColorClasses:Q,backgroundColorStyles:Y}=ye(z(e,"bgColor")),{textColorClasses:j,textColorStyles:K}=Ce(v(()=>e.error||e.disabled?void 0:b.value&&P.value?e.color:e.baseColor));N(b,p=>{if(h.value){const g=D.value.$el,y=L.value.$el;requestAnimationFrame(()=>{const C=Le(g),f=y.getBoundingClientRect(),$=f.x-C.x,S=f.y-C.y-(C.height/2-f.height/2),k=f.width/.75,R=Math.abs(k-C.width)>1?{maxWidth:he(k)}:void 0,ee=getComputedStyle(g),W=getComputedStyle(y),le=parseFloat(ee.transitionDuration)*1e3||150,ae=parseFloat(W.getPropertyValue("--v-field-label-scale")),ne=W.getPropertyValue("color");g.style.visibility="visible",y.style.visibility="hidden",Be(g,{transform:`translate(${$}px, ${S}px) scale(${ae})`,color:ne,...R},{duration:le,easing:$e,direction:p?"normal":"reverse"}).finished.then(()=>{g.style.removeProperty("visibility"),y.style.removeProperty("visibility")})})}},{flush:"post"});const B=v(()=>({isActive:b,isFocused:P,controlRef:T,blur:s,focus:x}));function Z(p){p.target!==document.activeElement&&p.preventDefault()}return O(()=>{var $,S,k;const p=e.variant==="outlined",g=l["prepend-inner"]||e.prependInnerIcon,y=!!(e.clearable||l.clear),C=!!(l["append-inner"]||e.appendInnerIcon||y),f=()=>l.label?l.label({...B.value,label:e.label,props:{for:m.value}}):e.label;return a("div",_e({class:["v-field",{"v-field--active":b.value,"v-field--appended":C,"v-field--center-affix":e.centerAffix??!U.value,"v-field--disabled":e.disabled,"v-field--dirty":e.dirty,"v-field--error":e.error,"v-field--flat":e.flat,"v-field--has-background":!!e.bgColor,"v-field--persistent-clear":e.persistentClear,"v-field--prepended":g,"v-field--reverse":e.reverse,"v-field--single-line":e.singleLine,"v-field--no-label":!f(),[`v-field--variant-${e.variant}`]:!0},t.value,Q.value,V.value,c.value,d.value,r.value,e.class],style:[Y.value,e.style],onClick:Z},n),[a("div",{class:"v-field__overlay"},null),a(pe,{name:"v-field",active:!!e.loading,color:e.error?"error":typeof e.loading=="string"?e.loading:e.color},{default:l.loader}),g&&a("div",{key:"prepend",class:"v-field__prepend-inner"},[e.prependInnerIcon&&a(i,{key:"prepend-icon",name:"prependInner"},null),($=l["prepend-inner"])==null?void 0:$.call(l,B.value)]),a("div",{class:"v-field__field","data-no-activator":""},[["filled","solo","solo-inverted","solo-filled"].includes(e.variant)&&h.value&&a(w,{key:"floating-label",ref:L,class:[j.value],floating:!0,for:m.value,style:K.value},{default:()=>[f()]}),a(w,{ref:D,for:m.value},{default:()=>[f()]}),(S=l.default)==null?void 0:S.call(l,{...B.value,props:{id:m.value,class:"v-field__input","aria-describedby":H.value},focus:x,blur:s})]),y&&a(xe,{key:"clear"},{default:()=>[Ve(a("div",{class:"v-field__clearable",onMousedown:R=>{R.preventDefault(),R.stopPropagation()}},[l.clear?l.clear():a(i,{name:"clear"},null)]),[[ke,e.dirty]])]}),C&&a("div",{key:"append",class:"v-field__append-inner"},[(k=l["append-inner"])==null?void 0:k.call(l,B.value),e.appendInnerIcon&&a(i,{key:"append-icon",name:"appendInner"},null)]),a("div",{class:["v-field__outline",j.value],style:K.value},[p&&a(Ie,null,[a("div",{class:"v-field__outline__start"},null),h.value&&a("div",{class:"v-field__outline__notch"},[a(w,{ref:L,floating:!0,for:m.value},{default:()=>[f()]})]),a("div",{class:"v-field__outline__end"},null)]),U.value&&h.value&&a(w,{ref:L,floating:!0,for:m.value},{default:()=>[f()]})])])}),{controlRef:T}}});function Ne(e){const o=Object.keys(Te.props).filter(n=>!Fe(n)&&n!=="class"&&n!=="style");return Pe(e,o)}export{Re as V,Me as a,De as b,Te as c,We as d,qe as e,Ne as f,we as g,Ae as m,Je as u};