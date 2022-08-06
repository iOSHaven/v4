import{u as b,o as n,d,b as s,f as t,w as m,F as w,H as g,t as h,e as c,a as o,c as k,L as x,n as y,l as V,h as p}from"./app.e48a4295.js";import{J as v}from"./AuthenticationCard.22c8738f.js";import{_ as $}from"./AuthenticationCardLogo.a21aceaa.js";import{_ as B}from"./Button.35baf525.js";import{_ as u}from"./Input.76edd3af.js";import{_ as F}from"./Checkbox.88f376c1.js";import{_ as f}from"./Label.183d35eb.js";import{_ as L}from"./ValidationErrors.8c9537f2.js";/* empty css            */import"./_plugin-vue_export-helper.cdc0426e.js";const C={key:0,class:"mb-4 font-medium text-sm text-green-600"},N=["onSubmit"],S={class:"mt-4"},q={class:"block mt-4"},P={class:"flex items-center"},R=o("span",{class:"ml-2 text-sm text-gray-600"},"Remember me",-1),U={class:"flex items-center justify-end mt-4"},E=p(" Forgot your password? "),H=p(" Log in "),O={__name:"Login",props:{canResetPassword:Boolean,status:String},setup(l){const e=b({email:"",password:"",remember:!1}),_=()=>{e.transform(i=>({...i,remember:e.remember?"on":""})).post(route("login"),{onFinish:()=>e.reset("password")})};return(i,a)=>(n(),d(w,null,[s(t(g),{title:"Log in"}),s(v,null,{logo:m(()=>[s($)]),default:m(()=>[s(L,{class:"mb-4"}),l.status?(n(),d("div",C,h(l.status),1)):c("",!0),o("form",{onSubmit:V(_,["prevent"])},[o("div",null,[s(f,{for:"email",value:"Email"}),s(u,{id:"email",modelValue:t(e).email,"onUpdate:modelValue":a[0]||(a[0]=r=>t(e).email=r),type:"email",class:"mt-1 block w-full",required:"",autofocus:""},null,8,["modelValue"])]),o("div",S,[s(f,{for:"password",value:"Password"}),s(u,{id:"password",modelValue:t(e).password,"onUpdate:modelValue":a[1]||(a[1]=r=>t(e).password=r),type:"password",class:"mt-1 block w-full",required:"",autocomplete:"current-password"},null,8,["modelValue"])]),o("div",q,[o("label",P,[s(F,{checked:t(e).remember,"onUpdate:checked":a[2]||(a[2]=r=>t(e).remember=r),name:"remember"},null,8,["checked"]),R])]),o("div",U,[l.canResetPassword?(n(),k(t(x),{key:0,href:i.route("password.request"),class:"underline text-sm text-gray-600 hover:text-gray-900"},{default:m(()=>[E]),_:1},8,["href"])):c("",!0),s(B,{class:y(["ml-4",{"opacity-25":t(e).processing}]),disabled:t(e).processing},{default:m(()=>[H]),_:1},8,["class","disabled"])])],40,N)]),_:1})],64))}};export{O as default};
