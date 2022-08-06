import{u as p}from"./app.67811e42.js";import{_ as u}from"./Modal.0bd03d02.js";import{_ as h}from"./ConfirmationModal.115037dc.js";import{_ as l}from"./DangerButton.305a98be.js";import{_ as y}from"./SecondaryButton.2caec6f6.js";import{k as T,ay as w,U as x,b1 as e,X as r,a2 as s,A as g,x as i,a1 as t}from"./runtime-dom.esm-bundler.3714f197.js";/* empty css            */import"./_commonjsHelpers.c10bf6cb.js";import"./SectionTitle.62d42adc.js";import"./_plugin-vue_export-helper.cdc0426e.js";const v=t(" Delete Team "),C=t(" Permanently delete this team. "),D=r("div",{class:"max-w-xl text-sm text-gray-600"}," Once a team is deleted, all of its resources and data will be permanently deleted. Before deleting this team, please download any data or information regarding this team that you wish to retain. ",-1),b={class:"mt-5"},k=t(" Delete Team "),$=t(" Delete Team "),B=t(" Are you sure you want to delete this team? Once a team is deleted, all of its resources and data will be permanently deleted. "),N=t(" Cancel "),O=t(" Delete Team "),H={__name:"DeleteTeamForm",props:{team:Object},setup(m){const d=m,a=T(!1),n=p(),c=()=>{a.value=!0},_=()=>{n.delete(route("teams.destroy",d.team),{errorBag:"deleteTeam"})};return(V,o)=>(w(),x(u,null,{title:e(()=>[v]),description:e(()=>[C]),content:e(()=>[D,r("div",b,[s(l,{onClick:c},{default:e(()=>[k]),_:1})]),s(h,{show:a.value,onClose:o[1]||(o[1]=f=>a.value=!1)},{title:e(()=>[$]),content:e(()=>[B]),footer:e(()=>[s(y,{onClick:o[0]||(o[0]=f=>a.value=!1)},{default:e(()=>[N]),_:1}),s(l,{class:g(["ml-3",{"opacity-25":i(n).processing}]),disabled:i(n).processing,onClick:_},{default:e(()=>[O]),_:1},8,["class","disabled"])]),_:1},8,["show"])]),_:1}))}};export{H as default};
//# sourceMappingURL=DeleteTeamForm.f123221e.js.map
