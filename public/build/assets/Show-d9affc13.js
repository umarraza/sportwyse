import n from"./AppLayout-59249bfa.js";import{o,c as d,w as l,a as t,b as c,f as r,x as _,D as h,t as s,e as i}from"./app-39e77fb3.js";import"./Banner-c4b44bd0.js";import"./Sidebar-dd8420fe.js";import"./Header-9c3ffb0c.js";import"./DropdownLink-579bae9d.js";const u={class:"row"},m={class:"col-12"},f={class:"card m-b-30"},w={class:"card-header"},k=t("h4",{class:"pl-2"},"Team Details",-1),g={class:"card-header-right"},v={class:"card-body"},b={class:"table"},x=t("th",null,"Name",-1),y=t("th",null,"Status",-1),B={key:0,stroke:"currentColor",fill:"currentColor","stroke-width":"0",viewBox:"0 0 16 16",color:"#0cf10c",height:"1em",width:"1em",xmlns:"http://www.w3.org/2000/svg",style:{color:"rgb(12, 241, 12)"}},p=t("circle",{cx:"8",cy:"8",r:"8"},null,-1),C=[p],D={key:1,stroke:"currentColor",fill:"currentColor","stroke-width":"0",viewBox:"0 0 16 16",color:"#0cf10c",height:"1em",width:"1em",xmlns:"http://www.w3.org/2000/svg",style:{color:"rgb(241, 12, 88)"}},T=t("circle",{cx:"8",cy:"8",r:"8"},null,-1),L=[T],N=t("th",null,"Birth Year Start Date",-1),S=t("th",null,"Birth Year End Date",-1),V=t("th",null,"Gender",-1),$=t("th",null,null,-1),E=t("td",null,null,-1),z={__name:"Show",props:{team:{type:Object,required:!0}},setup(e){return(a,R)=>(o(),d(n,{title:"Teams"},{default:l(()=>[t("div",u,[t("div",m,[t("div",f,[t("div",w,[k,t("div",g,[c(_,{backToListRoute:a.route("staff.teams.index"),class:"mr-1"},{default:l(()=>[r(" Back")]),_:1},8,["backToListRoute"]),c(h,{routeLink:a.route("staff.teams.edit",e.team.id)},{default:l(()=>[r(" Add")]),_:1},8,["routeLink"])])]),t("div",v,[t("table",b,[t("tr",null,[x,t("td",null,s(e.team.name),1),y,t("td",null,[e.team.status?(o(),i("svg",B,C)):(o(),i("svg",D,L))])]),t("tr",null,[N,t("td",null,s(e.team.start_date),1),S,t("td",null,s(e.team.end_date),1)]),t("tr",null,[V,t("td",null,s(e.team.gender),1),$,E])])])])])])]),_:1}))}};export{z as default};
