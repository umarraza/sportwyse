import u from"./AppLayout-b2e8a778.js";import{s as h,o as e,c as m,w as a,a as t,b as l,f as n,e as i,i as p,t as o,C as b,F as f}from"./app-7a8b179d.js";import"./Banner-b93de5fb.js";import"./Sidebar-634d55e0.js";import"./Header-0425138d.js";import"./DropdownLink-acdd1c4a.js";const k={class:"row"},v={class:"col-12"},y={class:"card m-b-30"},B={class:"card-header"},L=t("h4",{class:"pl-2"},"Players",-1),g={class:"card-header-right"},w={class:"card-body"},N={class:"table-rep-plugin"},T={class:"table-responsive b-0","data-pattern":"priority-columns"},x={id:"tech-companies-1",class:"table table-striped"},C=t("thead",null,[t("tr",null,[t("th",null,"First Name"),t("th",null,"Last Name"),t("th",null,"Date of Birth"),t("th",null,"Actions")])],-1),F={class:"btn-group btn-group-sm ml-auto menu-actions align-self-center"},q={__name:"Index",props:{players:{type:Object,required:!0}},setup(c){return(r,P)=>{const d=h("BackToList");return e(),m(u,{title:"Players"},{default:a(()=>[t("div",k,[t("div",v,[t("div",y,[t("div",B,[L,t("div",g,[l(d,{backToListRoute:r.route("club.parents.index"),class:"mr-1"},{default:a(()=>[n(" Back to Parents ")]),_:1},8,["backToListRoute"])])]),t("div",w,[t("div",N,[t("div",T,[t("table",x,[C,t("tbody",null,[(e(!0),i(f,null,p(c.players,(s,_)=>(e(),i("tr",{key:_},[t("td",null,o(s.user.first_name),1),t("td",null,o(s.user.last_name),1),t("td",null,o(s.birth_date),1),t("td",null,[t("div",F,[l(b,{routeLink:r.route("club.parent.players.show",s.id)},{default:a(()=>[n("Show")]),_:2},1032,["routeLink"])])])]))),128))])])])])])])])])]),_:1})}}};export{q as default};
