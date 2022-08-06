import{r as u,u as f,o as y,c as w,w as e,a as c,b as t,f as a,D as h,n as v,h as s}from"./app.e48a4295.js";import{_ as k}from"./Modal.089e279d.js";import{_ as x}from"./DialogModal.51dcdf1c.js";import{_ as m}from"./DangerButton.b19f88f3.js";import{_ as D}from"./Input.76edd3af.js";import{_ as g}from"./InputError.70a24d53.js";import{_ as C}from"./SecondaryButton.e4d28cb2.js";/* empty css            */import"./SectionTitle.de548672.js";import"./_plugin-vue_export-helper.cdc0426e.js";const b=s(" Delete Account "),V=s(" Permanently delete your account. "),$=c("div",{class:"max-w-xl text-sm text-gray-600"}," Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain. ",-1),A={class:"mt-5"},U=s(" Delete Account "),B=s(" Delete Account "),F=s(" Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account. "),K={class:"mt-4"},N=s(" Cancel "),P=s(" Delete Account "),L={__name:"DeleteUserForm",setup(I){const r=u(!1),n=u(null),o=f({password:""}),_=()=>{r.value=!0,setTimeout(()=>n.value.focus(),250)},i=()=>{o.delete(route("current-user.destroy"),{preserveScroll:!0,onSuccess:()=>l(),onError:()=>n.value.focus(),onFinish:()=>o.reset()})},l=()=>{r.value=!1,o.reset()};return(O,d)=>(y(),w(k,null,{title:e(()=>[b]),description:e(()=>[V]),content:e(()=>[$,c("div",A,[t(m,{onClick:_},{default:e(()=>[U]),_:1})]),t(x,{show:r.value,onClose:l},{title:e(()=>[B]),content:e(()=>[F,c("div",K,[t(D,{ref_key:"passwordInput",ref:n,modelValue:a(o).password,"onUpdate:modelValue":d[0]||(d[0]=p=>a(o).password=p),type:"password",class:"mt-1 block w-3/4",placeholder:"Password",onKeyup:h(i,["enter"])},null,8,["modelValue","onKeyup"]),t(g,{message:a(o).errors.password,class:"mt-2"},null,8,["message"])])]),footer:e(()=>[t(C,{onClick:l},{default:e(()=>[N]),_:1}),t(m,{class:v(["ml-3",{"opacity-25":a(o).processing}]),disabled:a(o).processing,onClick:i},{default:e(()=>[P]),_:1},8,["class","disabled"])]),_:1},8,["show"])]),_:1}))}};export{L as default};
