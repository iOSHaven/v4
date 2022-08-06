import{r as u,u as p,o as h,c as w,w as e,a as r,b as o,n as y,f as l,h as t}from"./app.e48a4295.js";import{_ as T}from"./Modal.089e279d.js";import{_ as g}from"./ConfirmationModal.6ebf111d.js";import{_ as i}from"./DangerButton.b19f88f3.js";import{_ as v}from"./SecondaryButton.e4d28cb2.js";/* empty css            */import"./SectionTitle.de548672.js";import"./_plugin-vue_export-helper.cdc0426e.js";const x=t(" Delete Team "),C=t(" Permanently delete this team. "),D=r("div",{class:"max-w-xl text-sm text-gray-600"}," Once a team is deleted, all of its resources and data will be permanently deleted. Before deleting this team, please download any data or information regarding this team that you wish to retain. ",-1),b={class:"mt-5"},$=t(" Delete Team "),k=t(" Delete Team "),B=t(" Are you sure you want to delete this team? Once a team is deleted, all of its resources and data will be permanently deleted. "),N=t(" Cancel "),O=t(" Delete Team "),H={__name:"DeleteTeamForm",props:{team:Object},setup(m){const d=m,s=u(!1),n=p(),c=()=>{s.value=!0},_=()=>{n.delete(route("teams.destroy",d.team),{errorBag:"deleteTeam"})};return(V,a)=>(h(),w(T,null,{title:e(()=>[x]),description:e(()=>[C]),content:e(()=>[D,r("div",b,[o(i,{onClick:c},{default:e(()=>[$]),_:1})]),o(g,{show:s.value,onClose:a[1]||(a[1]=f=>s.value=!1)},{title:e(()=>[k]),content:e(()=>[B]),footer:e(()=>[o(v,{onClick:a[0]||(a[0]=f=>s.value=!1)},{default:e(()=>[N]),_:1}),o(i,{class:y(["ml-3",{"opacity-25":l(n).processing}]),disabled:l(n).processing,onClick:_},{default:e(()=>[O]),_:1},8,["class","disabled"])]),_:1},8,["show"])]),_:1}))}};export{H as default};
