import m from"./AppLayout-2b2c80aa.js";import h from"./AddButton-71486649.js";import{o as e,c as p,w as d,a as t,b,g as y,e as a,j as i,t as l,n as v,F as n}from"./app-ed6aa4ba.js";import"./Banner-e5179c1b.js";import"./Sidebar-ae5d9fb5.js";import"./Header-37576319.js";import"./DropdownLink-a3e05c10.js";const f={class:"row"},g={class:"col-12"},k={class:"card m-b-30"},$={class:"card-header"},w=t("h4",{class:"pl-4"},"Parents",-1),N={class:"card-header-right"},x={class:"card-body"},C={class:"table-rep-plugin"},B={class:"table-responsive b-0","data-pattern":"priority-columns"},L={id:"tech-companies-1",class:"table table-striped"},M=t("thead",null,[t("tr",null,[t("th",null,"First Name"),t("th",null,"Last Name"),t("th",null,"Email"),t("th",null,"Phone"),t("th",null,"Players")])],-1),P=["data-target"],V=["aria-labelledby"],F={class:"modal-dialog modal-lg"},j={class:"modal-content"},E={class:"modal-header"},q=["id"],z=t("button",{type:"button",class:"close","data-dismiss":"modal","aria-label":"Close"},[t("span",{"aria-hidden":"true"},"×")],-1),A={class:"modal-body"},D={class:"table-responsive b-0","data-pattern":"priority-columns"},I={key:0},O={key:1},S=t("div",{class:"modal-footer"},[t("button",{type:"button",class:"btn btn-secondary","data-dismiss":"modal"},"Close")],-1),W={__name:"Index",props:{parents:{type:Object,required:!0}},setup(r){return(c,T)=>(e(),p(m,{title:"Camps"},{default:d(()=>[t("div",f,[t("div",g,[t("div",k,[t("div",$,[w,t("div",N,[b(h,{routeLink:c.route("club.parents.create")},{default:d(()=>[y(" Add")]),_:1},8,["routeLink"])])]),t("div",x,[t("div",C,[t("div",B,[t("table",L,[M,t("tbody",null,[(e(!0),a(n,null,i(r.parents,(s,_)=>(e(),a("tr",{key:_},[t("td",null,l(s.user.first_name),1),t("td",null,l(s.user.last_name),1),t("td",null,l(s.user.email),1),t("td",null,l(s.phone),1),t("td",null,[t("button",{type:"button",class:"btn btn-primary waves-effect waves-light","data-toggle":"modal","data-target":`.playersModal${s.id}`},"View ("+l(s.players_count)+")",9,P)]),t("div",{class:v(["modal fade",`playersModal${s.id}`]),tabindex:"-1",role:"dialog","aria-labelledby":`playersModal${s.id}`,"aria-hidden":"true"},[t("div",F,[t("div",j,[t("div",E,[t("h5",{class:"modal-title mt-0",id:`playersModal${s.id}`},"Players",8,q),z]),t("div",A,[t("div",D,[s.players.length?(e(),a("ul",I,[(e(!0),a(n,null,i(s.players,(o,u)=>(e(),a("li",{key:u},l(`${o.user.first_name} ${o.user.last_name}`),1))),128))])):(e(),a("p",O,"No player found."))])]),S])])],10,V)]))),128))])])])])])])])])]),_:1}))}};export{W as default};