import _ from"./AppLayout-2b2c80aa.js";import h from"./EditButton-7d314e0e.js";import u from"./BackToList-4c330288.js";import{o as s,c as m,w as a,a as t,b as d,g as n,t as o,e as l,j as f,F as b}from"./app-ed6aa4ba.js";import"./Banner-e5179c1b.js";import"./Sidebar-ae5d9fb5.js";import"./Header-37576319.js";import"./DropdownLink-a3e05c10.js";const w={class:"row"},v={class:"col-12"},g={class:"card m-b-30"},k={class:"card-header"},y=t("h4",{class:"pl-4"},"Team Details",-1),x={class:"card-header-right"},B={class:"card-body"},p={class:"table"},S=t("th",null,"Name",-1),C=t("th",null,"Status",-1),L={key:0,stroke:"currentColor",fill:"currentColor","stroke-width":"0",viewBox:"0 0 16 16",color:"#0cf10c",height:"1em",width:"1em",xmlns:"http://www.w3.org/2000/svg",style:{color:"rgb(12, 241, 12)"}},N=t("circle",{cx:"8",cy:"8",r:"8"},null,-1),T=[N],$={key:1,stroke:"currentColor",fill:"currentColor","stroke-width":"0",viewBox:"0 0 16 16",color:"#0cf10c",height:"1em",width:"1em",xmlns:"http://www.w3.org/2000/svg",style:{color:"rgb(241, 12, 88)"}},D=t("circle",{cx:"8",cy:"8",r:"8"},null,-1),V=[D],j=t("th",null,"Birth Year Start Date",-1),E=t("th",null,"Birth Year End Date",-1),F=t("th",null,"Gender",-1),R=t("th",null,null,-1),Y=t("td",null,null,-1),q={class:"row"},A={class:"col-md-12"},G={class:"card"},O=t("div",{class:"card-header"},[t("h4",{class:"pl-4"},"Staff")],-1),z={class:"card-body"},H={id:"teams-table",class:"table table-xs table-striped"},I=t("thead",null,[t("tr",null,[t("th",null,[t("strong",null,"Staff Name")])])],-1),tt={__name:"Show",props:{team:{type:Object,required:!0}},setup(e){return(c,J)=>(s(),m(_,{title:"Teams"},{default:a(()=>[t("div",w,[t("div",v,[t("div",g,[t("div",k,[y,t("div",x,[d(u,{backToListRoute:c.route("club.teams.index"),class:"mr-1"},{default:a(()=>[n(" Back")]),_:1},8,["backToListRoute"]),d(h,{routeLink:c.route("club.teams.edit",e.team.id)},{default:a(()=>[n(" Add")]),_:1},8,["routeLink"])])]),t("div",B,[t("table",p,[t("tr",null,[S,t("td",null,o(e.team.name),1),C,t("td",null,[e.team.status?(s(),l("svg",L,T)):(s(),l("svg",$,V))])]),t("tr",null,[j,t("td",null,o(e.team.start_date),1),E,t("td",null,o(e.team.end_date),1)]),t("tr",null,[F,t("td",null,o(e.team.gender),1),R,Y])])])])])]),t("div",q,[t("div",A,[t("div",G,[O,t("div",z,[t("table",H,[I,t("tbody",null,[(s(!0),l(b,null,f(e.team.staff_members,(r,i)=>(s(),l("tr",{key:i},[t("td",null,o(`${r.user.first_name} ${r.user.last_name}`),1)]))),128))])])])])])])]),_:1}))}};export{tt as default};