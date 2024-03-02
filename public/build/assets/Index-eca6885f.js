import{T as b}from"./VueSearchSelect-90aaae39.js";import g from"./AppLayout-9d64f69d.js";import{a5 as y,d as _,R as w,s as k,o as r,c as V,w as u,a as e,b as c,u as m,e as i,i as x,t as d,f as D,l as S,j as I,F as C,J as B,L as P,O as T}from"./app-e45a4bc1.js";import{P as j}from"./Pagination-def77c95.js";import{_ as F}from"./_plugin-vue_export-helper-c27b6911.js";import"./Banner-118f53ef.js";import"./Sidebar-4e07fca8.js";import"./Header-2777c726.js";import"./DropdownLink-e6f7bb9d.js";/* empty css                                                                   */const l=s=>(B("data-v-007ce7bb"),s=s(),P(),s),N={class:"row"},O={class:"col-md-12"},E={class:"card"},L={class:"card-body"},R={class:"row"},U={class:"col-md-4"},q={class:"form-group"},J=l(()=>e("label",{class:"col-form-label"},"Select Event",-1)),A={class:"col-md-4"},G={class:"form-group"},$=l(()=>e("label",{class:"col-form-label"},"From Date",-1)),z={class:"col-md-4"},H={class:"form-group"},K=l(()=>e("label",{class:"col-form-label"},"To Date",-1)),M={class:"row"},Q={class:"col-12"},W={class:"card m-b-30"},X=l(()=>e("div",{class:"card-header"},[e("h4",{class:"pl-2"},"Teams")],-1)),Y={class:"card-body"},Z={class:"table-responsive b-0","data-pattern":"priority-columns"},ee={id:"tech-companies-1",class:"table table-striped"},te=l(()=>e("thead",null,[e("tr",null,[e("th",null,"Team Name"),e("th",null,"Gender"),e("th",null,"Joining Date"),e("th",null,"Leaving Date"),e("th",null,"Status"),e("th",null,"Players"),e("th",null,"Actions")])],-1)),oe={key:0,stroke:"currentColor",fill:"currentColor","stroke-width":"0",viewBox:"0 0 16 16",color:"#0cf10c",height:"1em",width:"1em",xmlns:"http://www.w3.org/2000/svg",style:{color:"rgb(12, 241, 12)"}},se=l(()=>e("circle",{cx:"8",cy:"8",r:"8"},null,-1)),le=[se],ae={key:1,stroke:"currentColor",fill:"currentColor","stroke-width":"0",viewBox:"0 0 16 16",color:"#0cf10c",height:"1em",width:"1em",xmlns:"http://www.w3.org/2000/svg",style:{color:"rgb(241, 12, 88)"}},re=l(()=>e("circle",{cx:"8",cy:"8",r:"8"},null,-1)),ce=[re],ie={key:0,class:"btn-group btn-group-sm ml-auto menu-actions align-self-center"},de=l(()=>e("i",{class:"fas fa-chart-bar"},null,-1)),ne={class:"pagination-container"},_e={class:"pagination"},pe={__name:"Index",props:{camps:{type:Object,required:!0},teams:{type:Object,required:!0},prop_filters:Object},setup(s){const n=s,o=y({camp_id:_(n.prop_filters.camp_id?parseInt(n.prop_filters.camp_id):""),from_date:_(n.prop_filters.from_date??""),to_date:_(n.prop_filters.to_date??"")});w(o,()=>{h()},{deep:!0});const h=()=>{T.get(route("club.reports"),o,{preserveState:!0,preserveScroll:!0,replace:!0})};return(f,a)=>{const p=k("VueDatePicker");return r(),V(g,{title:"Reports"},{default:u(()=>[e("div",N,[e("div",O,[e("div",E,[e("div",L,[e("div",R,[e("div",U,[e("div",q,[J,c(m(b),{options:s.camps,modelValue:o.camp_id,"onUpdate:modelValue":a[0]||(a[0]=t=>o.camp_id=t),placeholder:"Select Event"},null,8,["options","modelValue"])])]),e("div",A,[e("div",G,[$,c(p,{position:"left","enable-time-picker":!1,modelValue:o.from_date,"onUpdate:modelValue":a[1]||(a[1]=t=>o.from_date=t),"auto-apply":"",placeholder:"From Date"},null,8,["modelValue"])])]),e("div",z,[e("div",H,[K,c(p,{position:"left","enable-time-picker":!1,modelValue:o.to_date,"onUpdate:modelValue":a[2]||(a[2]=t=>o.to_date=t),"auto-apply":"",placeholder:"To Date"},null,8,["modelValue"])])])])])])])]),e("div",M,[e("div",Q,[e("div",W,[X,e("div",Y,[e("div",Z,[e("table",ee,[te,e("tbody",null,[(r(!0),i(C,null,x(s.teams.data,(t,v)=>(r(),i("tr",{key:v},[e("td",null,d(t.name),1),e("td",null,d(t.gender),1),e("td",null,d(t.pivot?t.pivot.joining_date:""),1),e("td",null,d(t.pivot?t.pivot.leaving_date:""),1),e("td",null,[t.status?(r(),i("svg",oe,le)):(r(),i("svg",ae,ce))]),e("td",null,d(t.players_count),1),e("td",null,[o.camp_id?(r(),i("div",ie,[c(m(S),{href:f.route("club.team.reports",[o.camp_id,t.id]),class:"btn btn-info"},{default:u(()=>[de,D(" Players Reports ")]),_:2},1032,["href"])])):I("",!0)])]))),128))])]),e("div",ne,[e("div",_e,[c(j,{links:s.teams.links},null,8,["links"])])])])])])])])]),_:1})}}},Ve=F(pe,[["__scopeId","data-v-007ce7bb"]]);export{Ve as default};
