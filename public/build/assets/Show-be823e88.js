import d from"./AppLayout-2bc15cec.js";import{o as i,c as n,w as a,a as t,b as o,f as r,x as c,D as _,t as s}from"./app-39e77fb3.js";import"./Banner-c4b44bd0.js";import"./Sidebar-8d532025.js";import"./Header-bab8a524.js";import"./DropdownLink-579bae9d.js";const u={class:"row"},h={class:"col-12"},m={class:"card m-b-30"},p={class:"card-header"},f=t("h4",{class:"pl-2"},"Team Details",-1),b={class:"card-header-right"},k={class:"card-body"},v={class:"table"},y=t("th",null,"First Name",-1),B=t("th",null,"Last Name",-1),L=t("th",null,"Birth Year Start Date",-1),N=t("th",null,"Gender",-1),T=t("th",null,null,-1),w=t("td",null,null,-1),q={__name:"Show",props:{player:{type:Object,required:!0}},setup(l){return(e,D)=>(i(),n(d,{title:"Teams"},{default:a(()=>[t("div",u,[t("div",h,[t("div",m,[t("div",p,[f,t("div",b,[o(c,{backToListRoute:e.route("club.teams.index"),class:"mr-1"},{default:a(()=>[r(" Back")]),_:1},8,["backToListRoute"]),o(_,{routeLink:e.route("club.teams.edit",e.team.id)},{default:a(()=>[r(" Add")]),_:1},8,["routeLink"])])]),t("div",k,[t("table",v,[t("tr",null,[y,t("td",null,s(l.player.user.first_name),1),B,t("td",null,s(l.player.user.last_name),1)]),t("tr",null,[L,t("td",null,s(e.team.start_date),1)]),t("tr",null,[N,t("td",null,s(e.team.gender),1),T,w])])])])])])]),_:1}))}};export{q as default};
