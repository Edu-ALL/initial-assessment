import{i,bC as g,bE as f,m as o,aX as V,p as y,I as k,f as C,y as P,z as S,g as h,h as z,$ as I,j as A,a9 as D,k as b,D as x,B,v as F,b as l,V as R,F as T,af as _}from"./main-3fe15b7c.js";import{V as $}from"./VImg-3901027a.js";function O(a){let r=arguments.length>1&&arguments[1]!==void 0?arguments[1]:"div",s=arguments.length>2?arguments[2]:void 0;return i()({name:s??g(f(a.replace(/__/g,"-"))),props:{tag:{type:String,default:r},...o()},setup(e,u){let{slots:t}=u;return()=>{var n;return V(e.tag,{class:[a,e.class],style:e.style},(n=t.default)==null?void 0:n.call(t))}}})}const j=y({start:Boolean,end:Boolean,icon:k,image:String,text:String,...o(),...C(),...P(),...S(),...h(),...z(),...I({variant:"flat"})},"VAvatar"),X=i()({name:"VAvatar",props:j(),setup(a,r){let{slots:s}=r;const{themeClasses:e}=A(a),{colorClasses:u,colorStyles:t,variantClasses:n}=D(a),{densityClasses:c}=b(a),{roundedClasses:m}=x(a),{sizeClasses:v,sizeStyles:d}=B(a);return F(()=>l(a.tag,{class:["v-avatar",{"v-avatar--start":a.start,"v-avatar--end":a.end},e.value,u.value,c.value,m.value,v.value,n.value,a.class],style:[t.value,d.value,a.style]},{default:()=>[s.default?l(T,{key:"content-defaults",defaults:{VImg:{cover:!0,image:a.image},VIcon:{icon:a.icon}}},{default:()=>[s.default()]}):a.image?l($,{key:"image",src:a.image,alt:"",cover:!0},null):a.icon?l(R,{key:"icon",icon:a.icon},null):a.text,_(!1,"v-avatar")]})),{}}});export{X as V,O as c};
