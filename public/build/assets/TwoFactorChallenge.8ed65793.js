import{k as u,ay as t,W as s,a2 as o,x as a,b1 as m,I as r,X as l,bp as p,A as k,a1 as n,al as g}from"./runtime-dom.esm-bundler.3714f197.js";import{u as x,H as C}from"./app.67811e42.js";import{J as V}from"./AuthenticationCard.377687db.js";import{_ as w}from"./AuthenticationCardLogo.3e37b33d.js";import{_ as I}from"./Button.05052283.js";import{_ as y}from"./Input.4d723479.js";import{_ as v}from"./Label.6120fd41.js";import{_ as $}from"./ValidationErrors.5eb073ea.js";/* empty css            */import"./_commonjsHelpers.c10bf6cb.js";import"./_plugin-vue_export-helper.cdc0426e.js";const T={class:"mb-4 text-sm text-gray-600"},U=n(" Please confirm access to your account by entering the authentication code provided by your authenticator application. "),B=n(" Please confirm access to your account by entering one of your emergency recovery codes. "),F=["onSubmit"],N={key:0},A={key:1},H={class:"flex items-center justify-end mt-4"},J=["onClick"],P=n(" Use a recovery code "),R=n(" Use an authentication code "),S=n(" Log in "),Y={__name:"TwoFactorChallenge",setup(j){const c=u(!1),e=x({code:"",recovery_code:""}),_=u(null),f=u(null),h=async()=>{c.value^=!0,await g(),c.value?(_.value.focus(),e.code=""):(f.value.focus(),e.recovery_code="")},b=()=>{e.post(route("two-factor.login"))};return(z,i)=>(t(),s(r,null,[o(a(C),{title:"Two-factor Confirmation"}),o(V,null,{logo:m(()=>[o(w)]),default:m(()=>[l("div",T,[c.value?(t(),s(r,{key:1},[B],64)):(t(),s(r,{key:0},[U],64))]),o($,{class:"mb-4"}),l("form",{onSubmit:p(b,["prevent"])},[c.value?(t(),s("div",A,[o(v,{for:"recovery_code",value:"Recovery Code"}),o(y,{id:"recovery_code",ref_key:"recoveryCodeInput",ref:_,modelValue:a(e).recovery_code,"onUpdate:modelValue":i[1]||(i[1]=d=>a(e).recovery_code=d),type:"text",class:"mt-1 block w-full",autocomplete:"one-time-code"},null,8,["modelValue"])])):(t(),s("div",N,[o(v,{for:"code",value:"Code"}),o(y,{id:"code",ref_key:"codeInput",ref:f,modelValue:a(e).code,"onUpdate:modelValue":i[0]||(i[0]=d=>a(e).code=d),type:"text",inputmode:"numeric",class:"mt-1 block w-full",autofocus:"",autocomplete:"one-time-code"},null,8,["modelValue"])])),l("div",H,[l("button",{type:"button",class:"text-sm text-gray-600 hover:text-gray-900 underline cursor-pointer",onClick:p(h,["prevent"])},[c.value?(t(),s(r,{key:1},[R],64)):(t(),s(r,{key:0},[P],64))],8,J),o(I,{class:k(["ml-4",{"opacity-25":a(e).processing}]),disabled:a(e).processing},{default:m(()=>[S]),_:1},8,["class","disabled"])])],40,F)]),_:1})],64))}};export{Y as default};
//# sourceMappingURL=TwoFactorChallenge.8ed65793.js.map
