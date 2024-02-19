import m from"./AppLayout-b2e8a778.js";import{o as l,c as f,w as r,a as t,b as n,f as c,B as p,e as a,i as b,t as o,u as i,l as d,C as w,D as g,F as y,O as v}from"./app-7a8b179d.js";import"./Banner-b93de5fb.js";import"./Sidebar-634d55e0.js";import"./Header-0425138d.js";import"./DropdownLink-acdd1c4a.js";const k={class:"row"},C={class:"col-12"},x={class:"card m-b-30"},B={class:"card-header"},L=t("h4",{class:"pl-2"},"Teams",-1),$={class:"card-header-right"},D={class:"card-body"},N={class:"table-rep-plugin"},S={class:"table-responsive b-0","data-pattern":"priority-columns"},T={id:"tech-companies-1",class:"table table-striped"},A=t("thead",null,[t("tr",null,[t("th",null,"Team Name"),t("th",null,"Staff"),t("th",null,"Gender"),t("th",null,"Start Date"),t("th",null,"End Date"),t("th",null,"Status"),t("th",null,"Players"),t("th",null,"Actions")])],-1),O={key:0,stroke:"currentColor",fill:"currentColor","stroke-width":"0",viewBox:"0 0 16 16",color:"#0cf10c",height:"1em",width:"1em",xmlns:"http://www.w3.org/2000/svg",style:{color:"rgb(12, 241, 12)"}},V=t("circle",{cx:"8",cy:"8",r:"8"},null,-1),E=[V],F={key:1,stroke:"currentColor",fill:"currentColor","stroke-width":"0",viewBox:"0 0 16 16",color:"#0cf10c",height:"1em",width:"1em",xmlns:"http://www.w3.org/2000/svg",style:{color:"rgb(241, 12, 88)"}},P=t("circle",{cx:"8",cy:"8",r:"8"},null,-1),j=[P],q={class:"btn-group btn-group-sm ml-auto menu-actions align-self-center"},G=["onClick"],I=t("i",{class:"fa fa-trash"},null,-1),z=[I],X={__name:"Index",props:{teams:{type:Object,required:!0}},setup(u){const _=s=>{confirm("Are you sure you want to delete this team?")&&v.delete(route("club.teams.destroy",s))};return(s,H)=>(l(),f(m,{title:"Camps"},{default:r(()=>[t("div",k,[t("div",C,[t("div",x,[t("div",B,[L,t("div",$,[n(p,{routeLink:s.route("club.teams.create")},{default:r(()=>[c(" Add")]),_:1},8,["routeLink"])])]),t("div",D,[t("div",N,[t("div",S,[t("table",T,[A,t("tbody",null,[(l(!0),a(y,null,b(u.teams,(e,h)=>(l(),a("tr",{key:h},[t("td",null,o(e.name),1),t("td",null,[n(i(d),{href:"",class:""},{default:r(()=>[c(o(e.staff_members_count),1)]),_:2},1024)]),t("td",null,o(e.gender),1),t("td",null,o(e.start_date),1),t("td",null,o(e.end_date),1),t("td",null,[e.status?(l(),a("svg",O,E)):(l(),a("svg",F,j))]),t("td",null,[n(i(d),{href:s.route("club.teams.players.index",e.id)},{default:r(()=>[c("Players ("+o(e.players_count)+")",1)]),_:2},1032,["href"])]),t("td",null,[t("div",q,[n(w,{routeLink:s.route("club.teams.show",e.id)},null,8,["routeLink"]),n(g,{routeLink:s.route("club.teams.edit",e.id)},null,8,["routeLink"]),t("button",{type:"button",class:"btn btn-danger btn-sm waves-effect waves-light",onClick:J=>_(e.id)},z,8,G)])])]))),128))])])])])])])])])]),_:1}))}};export{X as default};
